<?php

namespace WebIllumination\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Description;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use Craue\FormFlowBundle\Form\FormFlow;
use WebIllumination\SiteBundle\Entity\ProductToFeature;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Solarium_Query_Select;

/**
 * @Route("/products")
 */
class ProductController extends Controller
{
    /**
     * @Route("/", name="admin_products_index")
     * @Method({"GET"})
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

        return array('pagination' => $pagination, 'facets' => $facets, 'searching' => $searching);
    }

    /**
     * @Route("/", name="admin_products_index_post")
     * @Method({"POST"})
     */
    public function indexPostAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        switch($request->request->get('_action'))
        {
            case 'update':
                $status = $request->request->get('status');
                foreach($request->request->get('_selected', array()) as $productId)
                {
                    $product = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->find($productId);
                    if($product)
                    {
                        $product->setStatus($status[$productId]);
                        $em->persist($product);
                        $em->flush();
                    }
                }

                break;
            case 'delete':
                die("Wut");
                foreach($request->request->get('_selected', array()) as $productId)
                {
                    $product = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->find($productId);
                    if($product)
                    {
                        $em->remove($product);
                        $em->flush();
                    }
                }

                break;
        }

        return $this->redirect($this->generateUrl('admin_products_index'));
    }

    /**
     * @Route("/new", name="admin_products_new")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $this->getManager()->createProduct();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('web_illumination_admin.form.flow.new_product');
        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm($product);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($product);
            } else {
                if($product->getType() === 's')
                {
                    // Create variant for single product
                    $variant = new Variant();
                    $variant->setProductCode($product->getProductCode());
                    foreach($product->getPrices() as $price)
                    {
                        $variant->addPrice($price);
                    }
                    foreach($product->getFeatureGroups() as $productToFeature)
                    {
                        $variant->addFeature($productToFeature);
                    }
                    $product->addVariant($variant);
                }

                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_products_index'));
            }
        }

        return array(
            'form' => $form->createView(),
            'flow' => $flow,
        );
    }

    /**
     * @Route("/{id}/edit", name="admin_products_edit")
     * @Template()
     */
    public function editAction($id)
    {
    }

    /**
     * @Route("/{id}/delete", name="admin_products_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($id);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $em->remove($product);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_products_index'));
    }

    /**
     * Fetch project manager from container
     *
     * @return \WebIllumination\SiteBundle\Manager\ProductManager
     */
    private function getManager()
    {
        return $this->get('web_illumination_site.manager.product');
    }
}
