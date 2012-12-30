<?php

namespace WebIllumination\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use Craue\FormFlowBundle\Form\FormFlow;
use WebIllumination\SiteBundle\Entity\ProductToFeature;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Solarium_Query_Select;

class ProductController extends Controller
{
    /**
     * @Route("/", name="admin_products")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        $select = $solarium->createSelect();
        $helper = $select->getHelper();

        $query = trim($request->query->get('q'));
        $searching = !empty($query);
        if(empty($query))
        {
            $query = '*';

            $filters = $request->query->get('filter', array());

            // Filtering
            $flags = array('brand', 'department_path', 'status', 'available_for_purchase', 'hide_price', 'show_price_out_of_hours', 'membership_discount_available', 'feature_comparison', 'download', 'special_offer', 'recommended', 'accessory', 'new');
            foreach($flags as $flag)
            {
                if(array_key_exists($flag, $filters))
                {
                    $filter = $filters[$flag];
                    array_walk($filter, function(&$item) use ($flag, $helper) {
                        if(is_array($item) && count($item) == 2)
                        {
                            $item = $helper->escapeTerm($flag).':'.$helper->escapePhrase($item[0]).' TO '.$helper->escapePhrase($item[1]);
                        } else {
                            $item = $helper->escapeTerm($flag).':'.$helper->escapePhrase($item);
                        }
                    });
                    $select->createFilterQuery($flag)->setQuery(implode(' OR ', $filter));
                }
            }
            //Facets
            $facetSet = $select->getFacetSet();
            $facetSet->createFacetField('brands')->setField('brand')->setSort('index');
            $facetSet->createFacetField('departments')->setField('department_path')->setSort('index');

            // Sort results (If the user has entered a query they cannot sort)
            $sort = explode(':', $request->query->get('sort_order', 'header_sort:asc'));
            if(count($sort) === 2 && in_array($sort[0], array('header_sort', 'list_price', 'created_at'))) {
                $sortCol = $sort[0];
                $sortDir = ($sort[1] == 'asc') ? Solarium_Query_Select::SORT_ASC : Solarium_Query_Select::SORT_DESC;

                $select->addSort($helper->escapeTerm($sortCol), $sortDir);
            }
        } else {
            $query = $select->getHelper()->escapeTerm($query);

            $dismax = $select->getDisMax();
            $dismax->setQueryFields(array('product_code^5', 'header^2', 'brand^1.5', 'page_title', 'short_description', 'search_words', 'text'));
            $dismax->setPhraseFields(array('short_description^30'));
            $dismax->setQueryParser('edismax');
        }

        $select->setQuery($query);

        try {
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                array($solarium, $select),
                $request->query->get('page', 1),
                $request->query->get('limit', 10)
            );
            $pagination->setTemplate('WebIlluminationAdminBundle:Includes:pagination.html.twig');
            $pagination->setSortableTemplate('WebIlluminationAdminBundle:Includes:sortable.html.twig');

            $facets = $pagination->getCustomParameter('result')->getFacetSet();
        } catch (\Solarium_Client_HttpException $e) {
            throw new HttpException(500, 'There seems to be an issue with our search engine. Please check later.');
        }

        return array('filters' => $filters, 'pagination' => $pagination, 'facets' => $facets, 'searching' => $searching);
    }

    /**
     * @Route("/add", name="admin_product_add")
     * @Template()
     */
    public function addAction()
    {
        $product = new Product();
        $product->addDepartment(new ProductToDepartment());
        $product->addFeature(new ProductToFeature());

        $flow = $this->get('web_illumination_admin.form.flow.new_product_group');
        $flow->bind($product);

        // form of the current step
        $form = $flow->createForm($product);
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep()) {
                // form for the next step
                $form = $flow->createForm($product);
            } else {
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_products'));
            }
        }

        return array(
            'form' => $form->createView(),
            'flow' => $flow,
        );
    }

    /**
     * @Route("/add/group", name="admin_product_add_group")
     * @Template()
     */
    public function addGroupAction()
    {
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->addDepartment(new ProductToDepartment());
        $product->addFeatureGroup(new ProductToFeature());

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('web_illumination_admin.form.flow.new_product_group');
        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm($product);
        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep()) {
                // Get features
                if($flow->getCurrentStep() == 2)
                {

                }

                // Get next form step
                $form = $flow->createForm($product);
            } else {
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_products'));
            }
        }

        return array(
            'form' => $form->createView(),
            'flow' => $flow,
        );
    }

    /**
     * @Route("/{id}/update", name="admin_products_update")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        // Get the filters session
        $filters = $this->get('session')->get('filters');
        // Get the settings session
        $settings = $this->get('session')->get('settings');

        // Fetch products
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();
        // Fetch brands
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->findAll();
        // Fetch departments
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $this->get('request')->query->get('page', 1),
            10
        );

        return array('filters' => $filters, 'settings' => $settings, 'pagination' => $paginator);
    }
}
