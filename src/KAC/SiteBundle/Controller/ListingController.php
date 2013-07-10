<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\Expr;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Solarium_Query_Select;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\Product\Description;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\ProductToDepartment;

class ListingController extends Controller
{
    /**
     * @Route("/products", name="listing_products")
     * @Route("/department/{departmentId}", name="listing_department", defaults={"departmentId" = null})
     * @Route("//brand/{brandId}", name="listing_brand", defaults={"brandId" = null})
     * @Route("/department/{departmentId}/brand/{brandId}", name="listing_department_brand", defaults={"departmentId" = null, "brandId" = null})
     * @Method({"GET"})
     */
	public function indexAction(Request $request, $departmentId=null, $brandId=null, $admin=false, $all=false)
    {
        // Ensure user has the correct permissions
        if ($admin === true && $this->get('security.context')->isGranted('ROLE_ADMIN') === false) {
            throw new AccessDeniedException();
        }

        /**
         * Define variable types
         * @var $department \KAC\SiteBundle\Entity\Department
         * @var $brand \KAC\SiteBundle\Entity\Brand
         * @var $departmentToFeature \KAC\SiteBundle\Entity\DepartmentToFeature
         */

        $em = $this->getDoctrine()->getManager();

        // If department was specified fetch from the database
        $department = null;

        if($departmentId) {
            $department = $em->getRepository("KACSiteBundle:Department")->find($departmentId);
        }

        // If brand was specified fetch from the database
        $brand = null;

        if($brandId) {
            $brand = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($brandId);
            if(!$brand) {
                throw new NotFoundHttpException("Brand not found");
            }
        }

        // Fetch products from solr
        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        $query = $solarium->createSelect();
        $helper = $query->getHelper();

        // Set query string
        if($request->query->get('q')) {
            $escapedQuery = $query->getHelper()->escapeTerm($request->query->get('q'));

            $dismax = $query->getDisMax();
            $dismax->setQueryFields(array('product_code^5', 'header^2', 'brand^1.5', 'page_title', 'short_description', 'search_words', 'text'));
            $dismax->setPhraseFields(array('short_description^30'));
            $dismax->setQueryParser('edismax');

            $query->setQuery($escapedQuery);
        } else {
            $query->setQuery('*');
        }

        // Sort results (If the user has entered a query they cannot sort)
        $sort = explode(':', $request->query->get('sort_order', 'low_price:asc'));
        if(count($sort) === 2 && in_array($sort[0], array('header_sort', 'low_price', 'high_price', 'created_at'))) {
            $sortCol = $sort[0];
            $sortDir = ($sort[1] == 'asc') ? Solarium_Query_Select::SORT_ASC : Solarium_Query_Select::SORT_DESC;

            if (($sortCol == 'low_price') && ($sortDir == 'asc'))
            {
                $query->addSort('accessory', 'asc');
            }
            $query->addSort($helper->escapeTerm($sortCol), $sortDir);

        }
        // Add secondary sort for accessory
        $query->addSort('accessory', 'asc');

        $filters = $request->query->get('filter', array());
        $flags = array('brand', 'department_path');

        // Facets
        $facetSet = $query->getFacetSet();
        $featureGroups = array();
        $facetSet->createFacetField('departments')->setField('department_path')->setSort('index')->setMinCount(1)->setPrefix($request->query->get('filter[department_path]', '', true));
        // Add brand facet if user is not on the brand listing
        if(!$brand) {
            $facetSet->createFacetField('brands')->setField('brand')->setSort('index')->setMinCount(1)->addExclude('brand');
        }
        // Add feature facets if it should be displayed
        if($department) {
            foreach($department->getFeatures() as $departmentToFeature)
            {
                if($departmentToFeature->getDisplayOnFilter())
                {
                    $flags[] = 'attr_feature_'.str_replace(' ', '', $departmentToFeature->getFeatureGroup()->getName());
                    $featureGroups[] = $departmentToFeature->getFeatureGroup()->getName();
                    $facetSet->createFacetField($helper->escapeTerm('feature_'.str_replace(' ', '', $departmentToFeature->getFeatureGroup()->getName())))
                        ->setField('attr_feature_'.$departmentToFeature->getFeatureGroup()->getName())
                        ->setMinCount(1)
                        ->addExclude('attr_feature_'.$departmentToFeature->getFeatureGroup()->getName());
                }
            }
        }

        // Filtering
        if($department) {
            // Get path
            $departmentFilterPath = "";
            $currDepartment = $department;
            do {
                $departmentFilterPath = $currDepartment . "|" . $departmentFilterPath;
                $currDepartment = $currDepartment->getParent();
            } while ($currDepartment !== null);
            $query->createFilterQuery('department')->setQuery('department_path:'.$helper->escapePhrase(ltrim(rtrim($departmentFilterPath, "|"), "|")));
        }
        if($brand) {
            $query->createFilterQuery('brand')->addTag('brand')->setQuery('brand:'.$helper->escapePhrase($brand->getDescription()->getName ()));
        }

        // If all was set the limit flag
        if($all)
        {
            $request->query->set('limit', 99999999);
        }

        // Add filters for any flags that the user has set
        foreach($flags as $flag)
        {
            if(array_key_exists($flag, $filters))
            {
                $filter = $filters[$flag];
                if(is_array($filter))
                {
                    array_walk($filter, function(&$item) use ($flag, $helper) {
                        if(!empty($item)) {
                            $item = $helper->escapeTerm($flag).':'.$helper->escapePhrase($item);
                        }
                    });
                    $query->createFilterQuery($flag)->addTag($flag)->setQuery(implode(' OR ', $filter));
                } else {
                    if(!empty($filter)) {
                        $query->createFilterQuery($flag)->addTag($flag)->setQuery($helper->escapeTerm($flag).':'.$helper->escapePhrase($filter));
                    }
                }

            }
        }

        // Create stats query, clone query so that
        $statsQuery = clone $query;
        $statsQuery->setRows(0);

        $stats = $statsQuery->getStats();
        $stats->createField('low_price');
        $stats->createField('high_price');

        // Deal with price filtering separately
        if(array_key_exists('low_price', $filters)) {
            if(!empty($filters['low_price'])) {
                $query->createFilterQuery('low_price')->addTag('low_price')->setQuery($helper->escapeTerm('low_price').':['.$helper->escapeTerm($filters['low_price']).' TO *]');
            }
        }
        if(array_key_exists('high_price', $filters)) {
            if(!empty($filters['low_price'])) {
                $query->createFilterQuery('high_price')->addTag('high_price')->setQuery($helper->escapeTerm('high_price').':[* TO '.$helper->escapeTerm($filters['high_price']).']');
            }
        }

        try {
            // Setup paginator
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                array($solarium, $query),
                $request->query->get('page', 1),
                $request->query->get('limit', 20)
            );
            $pagination->setTemplate('KACSiteBundle:Includes:pagination.html.twig');
            $pagination->setSortableTemplate('KACSiteBundle:Includes:sortable.html.twig');

            $facets = $pagination->getCustomParameter('result')->getFacetSet();
            $stats = $solarium->select($statsQuery)->getStats();
        } catch (\Solarium_Client_HttpException $e) {
            throw new HttpException(500, 'There seems to be an issue with our search engine. Please check later.');
        }

        return $this->render('KACSiteBundle:Listing:index.html.twig', array(
            'admin' => $admin,
            'brand' => $brand,
            'department' => $department,
            'facets' => $facets,
            'featureGroups' => $featureGroups,
            'pagination' => $pagination,
            'stats' => $stats,
        ));
    }

    /**
     * @Route("/admin/products", name="admin_listing_products")
     * @Route("/admin/department/{departmentId}", name="admin_listing_department", defaults={"departmentId" = null})
     * @Route("/admin/brand/{brandId}", name="admin_listing_brand", defaults={"brandId" = null})
     * @Route("/admin/department/{departmentId}/brand/{brandId}", name="admin_listing_department_brand", defaults={"departmentId" = null, "brandId" = null})
     * @Method({"GET"})
     */
    public function indexAdminAction(Request $request, $departmentId=null, $brandId=null)
    {
        return $this->indexAction($request, $departmentId, $brandId, true);
    }

    /**
     * @Route("/popular_brands", name="popular_brands")
     * @Route("/popular_brands/d{departmentId}", name="popular_brands_d")
     */
    public function popularBrandsAction(Request $request,  $departmentId=null)
    {
        $products = $this->getPopularProducts($departmentId);
        $brands = array();

        foreach($products as $item)
        {
            /**
             * @var $product Product
             */
            $product = $item[0];

            $brand = $product->getBrand();
            if(array_key_exists($brand->getId(), $brands)) {
                $brands[$brand->getId()]['total'] += $item['total'];
            } else {
                $brands[$brand->getId()] = array(
                    0 => $product->getBrand(),
                    'total' => $item['total'],
                );
            }
        }

        // Remove unneeded elements
        $brands = array_values(array_slice($brands, 0, 5));

        $response = $this->render('KACSiteBundle:Listing:popularBrands.html.twig', array(
            'brands' => $brands,
        ));
        $response->setSharedMaxAge(3600);

        return $response;
    }

    /**
     * @Route("/popular_products", name="popular_products")
     * @Route("/popular_products/d{departmentId}", name="popular_products_d")
     * @Route("/popular_products/b{departmentId}", name="popular_products_b")
     * @Route("/popular_products/d{departmentId}/b{brandId}", name="popular_products_db")
     */
    public function popularProductsAction(Request $request, $departmentId=null, $brandId=null)
    {
        $products = $this->getPopularProducts($departmentId, $brandId);

        // Remove unneeded elements
        $products = array_slice($products, 0, 5);

        $response = $this->render('KACSiteBundle:Listing:popularProducts.html.twig', array(
            'products' => $products,
        ));
        $response->setSharedMaxAge(3600);

        return $response;
    }

    private function getPopularProducts($departmentId=null, $brandId=null)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();
        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        $query = $solarium->createSelect();
        $helper = $query->getHelper();
        $query->setQuery('*');
        $query->setFields(array('id'));

        $department = null;

        if($departmentId) {
            $department = $em->getRepository("KACSiteBundle:Department")->find($departmentId);
        }

        // If brand was specified fetch from the database
        $brand = null;

        if($brandId) {
            $brand = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($brandId);
            if(!$brand) {
                throw new NotFoundHttpException("Brand not found");
            }
        }

        if($department) {
            // Get path
            $departmentFilterPath = "";
            $currDepartment = $department;
            do {
                $departmentFilterPath = $currDepartment . "|" . $departmentFilterPath;
                $currDepartment = $currDepartment->getParent();
            } while ($currDepartment !== null);
            $query->createFilterQuery('department')->setQuery('department_path:'.$helper->escapePhrase(ltrim(rtrim($departmentFilterPath, "|"), "|")));
        }
        if($brand) {
            $query->createFilterQuery('brand')->addTag('brand')->setQuery('brand:'.$helper->escapePhrase($brand->getDescription()->getName ()));
        }
        $results = $solarium->execute($query);

        $products = array();
        foreach($results as $document)
        {
            $qb = $em->createQueryBuilder();
            $result = $qb->select('p, count(op.id) AS total')
                ->from('KAC\SiteBundle\Entity\Product', 'p')
                ->leftJoin('KAC\SiteBundle\Entity\Order\Product', 'op', Expr\Join::WITH, $qb->expr()->eq('op.variant', 'p.id'))
                ->where($qb->expr()->eq('p.id', '?1'))
                ->groupBy('op.variant')
                ->orderBy('total', 'ASC')
                ->setParameter(1, $document->id)
                ->setMaxResults(1)
                ->getQuery()
                ->execute();


            if($result && count($result) > 0)
            {
                $products[] = $result[0];
            }
        }

        // Sort array
        usort($products, function($a, $b) {
            if ($a['total'] == $b['total']) {
                return 0;
            }
            return ($a['total'] > $b['total']) ? -1 : 1;
        });

        return $products;
    }

    public function departmentTreeAction(Request $request, $departmentId=null, $brandId=null)
    {
        $em = $this->getDoctrine()->getManager();

        if($departmentId) {
            $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('id' => $departmentId, 'status' => 'a'), array('displayOrder' => 'ASC'));
        } else {
            $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('lvl' => 1, 'status' => 'a'), array('displayOrder' => 'ASC'));
        }

        $response = $this->render('KACSiteBundle:Listing:departmentTree.html.twig', array(
            'departments' => $departments,
            'brandId' => $brandId,
        ));
        $response->setSharedMaxAge(3600);

        return $response;
    }
}