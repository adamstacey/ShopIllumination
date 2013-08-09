<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\Expr;
use KAC\SiteBundle\Entity\Department;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
	public function indexAction(Request $request, $departmentId = null, $brandId = null, $admin = false, $all = false)
    {
        /**
         * Define variable types
         * @var $department \KAC\SiteBundle\Entity\Department
         * @var $brand \KAC\SiteBundle\Entity\Brand
         * @var $departmentToFeature \KAC\SiteBundle\Entity\DepartmentToFeature
         */
        $em = $this->getDoctrine()->getManager();

        // If department was specified fetch from the database
        $department = null;
        if ($departmentId)
        {
            $department = $em->getRepository("KACSiteBundle:Department")->find($departmentId);
        }

        $showMaiaPromotion = false;
        $maiaDepartments = array(1, 1038, 41, 146, 1215, 1158, 1159, 1048, 1154, 43, 1129, 1168, 1130, 985, 1152, 1153, 1160, 1161, 1163, 1167, 1166, 1162);
        if (in_array($departmentId, $maiaDepartments))
        {
            $showMaiaPromotion = true;
        }

        // If brand was specified fetch from the database
        $brand = null;
        if ($brandId)
        {
            $brand = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($brandId);
        }
        // Get the correct template
        if($brand && !$department && $brand->getTemplate())
        {
            $template = $brand->getTemplate();
        } elseif (!$brand && $department && $department->getTemplate()) {
            $template = $department->getTemplate();
        } elseif ($brand && $department && $brand->getTemplate()) {
            $template = $brand->getTemplate();
        } elseif ($brand && $department && $department->getTemplate()) {
            $template = $department->getTemplate();
        } else {
            $template = 'standard';
        }

        // Fetch products from solr
        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');
        $query = $solarium->createSelect();
        $helper = $query->getHelper();

        // Set query string
        $query->setQuery('*');

        // Sort results (If the user has entered a query they cannot sort)
        $sort = explode(':', $request->query->get('sort_order', 'low_price:asc'));
        if (count($sort) === 2 && in_array($sort[0], array('header_sort', 'low_price', 'high_price', 'created_at')))
        {
            $sortCol = $sort[0];
            $sortDir = ($sort[1] == 'asc') ? Solarium_Query_Select::SORT_ASC : Solarium_Query_Select::SORT_DESC;
            if (($sortCol == 'low_price') && ($sortDir == 'asc'))
            {
                $query->addSort('accessory', 'asc');
            }
            $query->addSort($helper->escapeTerm($sortCol), $sortDir);
        }
        $filters = $request->query->get('filter', array());
        $flags = array('brand', 'department_path');

        // Facets
        $facetSet = $query->getFacetSet();
        $featureGroups = array();
        $facetSet->createFacetField('departments')->setField('department_path')->setSort('index')->setMinCount(1)->setPrefix($request->query->get('filter[department_path]', '', true));

        // Add brand facet if user is not on the brand listing
        if (!$brand)
        {
            $facetSet->createFacetField('brands')->setField('brand')->setSort('index')->setMinCount(1)->addExclude('brand');
        }

        // Add feature facets if it should be displayed
        if ($department)
        {
            foreach($department->getFeatures() as $departmentToFeature)
            {
                if ($departmentToFeature->getDisplayOnFilter())
                {
                    $flags[] = trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", htmlentities('attr_feature_'.$departmentToFeature->getFeatureGroup()->getName())));
                    $featureGroups[] = array(
                        trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", $departmentToFeature->getFeatureGroup()->getName())),
                        $departmentToFeature->getFeatureGroup()->getName()
                    );
                    $facetSet->createFacetField($helper->escapeTerm(trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", htmlentities('feature_'.$departmentToFeature->getFeatureGroup()->getName())))))
                        ->setField(trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", htmlentities('attr_feature_'.$departmentToFeature->getFeatureGroup()->getName()))))
                        ->setMinCount(1)
                        ->addExclude(trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", htmlentities('attr_feature_'.$departmentToFeature->getFeatureGroup()->getName()))));
                }
            }
        }

        // Filtering
        if ($department)
        {
            // Get path
            $departmentFilterPath = "";
            $currDepartment = $department;
            do {
                $departmentFilterPath = $currDepartment . "|" . $departmentFilterPath;
                $currDepartment = $currDepartment->getParent();
            } while ($currDepartment !== null);
            $query->createFilterQuery('department')->setQuery('department_path:'.$helper->escapePhrase(ltrim(rtrim($departmentFilterPath, "|"), "|")));
        }
        if ($brand)
        {
            $query->createFilterQuery('brand')->addTag('brand')->setQuery('brand:'.$helper->escapePhrase($brand->getDescription()->getName ()));
        }

        // If all was set the limit flag
        if ($all)
        {
            $request->query->set('limit', 99999999);
        }

        // Ensure that only the correct products are shown
        if(!$this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $query->createFilterQuery('status')->setQuery('status:a');
        }

        // Add filters for any flags that the user has set
        foreach ($flags as $flag)
        {
            if (array_key_exists($flag, $filters))
            {
                $filter = $filters[$flag];
                if (is_array($filter))
                {
                    array_walk($filter, function(&$item) use ($flag, $helper) {
                        if (!empty($item))
                        {
                            $item = $helper->escapeTerm($flag).':'.$helper->escapePhrase($item);
                        }
                    });
                    $query->createFilterQuery($flag)->addTag($flag)->setQuery(implode(' OR ', $filter));
                } else {
                    if (!empty($filter))
                    {
                        $query->createFilterQuery($flag)->addTag($flag)->setQuery($helper->escapeTerm($flag).':'.$helper->escapePhrase($filter));
                    }
                }
            }
        }

        // Template specific filtering/sorting
        if(in_array($template, array('maia'))) {
            // Force alphabetical sort
            $query->addSort('header_sort', 'asc');
        }

        // Create stats query, clone query so that
        $statsQuery = clone $query;
        $statsQuery->setRows(0);
        $stats = $statsQuery->getStats();
        $stats->createField('low_price');
        $stats->createField('high_price');

        // Deal with price filtering separately
        if (array_key_exists('low_price', $filters))
        {
            if (!empty($filters['low_price']))
            {
                $query->createFilterQuery('low_price')->addTag('low_price')->setQuery($helper->escapeTerm('low_price').':['.$helper->escapeTerm($filters['low_price']).' TO *]');
            }
        }
        if (array_key_exists('high_price', $filters))
        {
            if (!empty($filters['low_price']))
            {
                $query->createFilterQuery('high_price')->addTag('high_price')->setQuery($helper->escapeTerm('high_price').':[* TO '.$helper->escapeTerm($filters['high_price']).']');
            }
        }

        try {
            // Setup paginator
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                array($solarium, $query),
                $request->query->get('page', 1),
                $request->query->get('limit', 21)
            );
            $pagination->setTemplate('KACSiteBundle:Includes:pagination.html.twig');
            $pagination->setSortableTemplate('KACSiteBundle:Includes:sortable.html.twig');
            $facets = $pagination->getCustomParameter('result')->getFacetSet();
            $stats = $solarium->select($statsQuery)->getStats();
        } catch (\Solarium_Client_HttpException $e) {
            throw new HttpException(500, 'There seems to be an issue with our search engine. Please check later.');
        }

        return $this->render('KACSiteBundle:Listing:Templates/'.$template.'.html.twig', array(
            'brand' => $brand,
            'department' => $department,
            'facets' => $facets,
            'featureGroups' => $featureGroups,
            'pagination' => $pagination,
            'stats' => $stats,
            'showMaiaPromotion' => $showMaiaPromotion,
        ));
    }

    /**
     * @Route("/search.html", name="listing_search")
     * @Method({"GET"})
     */
	public function searchAction(Request $request, $departmentId = null, $brandId = null, $all = false)
    {
        // Check if there is an exact match with the product code
        if (!$request->isXmlHttpRequest())
        {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('KAC\SiteBundle\Entity\Product\Variant')->findOneBy(array(
                'productCode' => $request->query->get('q')
            ));
            if($product)
            {
                return $this->redirect($this->generateUrl('routing', array(
                    'url' => $product->getUrl()
                )));
            }
        }

        // Fetch products from solr
        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');
        $query = $solarium->createSelect();
        $helper = $query->getHelper();

        // Set query string
        if ($request->query->get('q'))
        {
//            if($this->get('security.context')->isGranted('ROLE_ADMIN'))
//            {
//                $queryString = $request->query->get('q');
//            } else {
//                $queryString = $query->getHelper()->escapeTerm($request->query->get('q'));
//            }
            $queryString = trim($request->query->get('q'));

            $dismax = $query->getDisMax();
            $dismax->setQueryFields(array('product_code^5', 'header^2', 'brand^3.5', 'page_title', 'short_description', 'search_words', 'text'));
            $dismax->setPhraseFields(array('product_code^5', 'short_description^30'));
            $dismax->setQueryParser('edismax');
            $query->setQuery($queryString);
        } else {
            $query->setQuery('*');
        }
        $filters = $request->query->get('filter', array());
        $flags = array('brand', 'department_path');

        // Facets
        $facetSet = $query->getFacetSet();
        $featureGroups = array();
        $facetSet->createFacetField('departments')->setField('department')->setSort('index')->setMinCount(1)->setPrefix($request->query->get('filter[department_path]', '', true));
        // Add brand facet if user is not on the brand listing
        $facetSet->createFacetField('brands')->setField('brand')->setSort('index')->setMinCount(1)->addExclude('brand');

        // If all was set the limit flag
        if ($all)
        {
            $request->query->set('limit', 99999999);
        }

        // Ensure that only the correct products are shown
        if(!$this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            $query->createFilterQuery('status')->setQuery('status:a');
        }

        // Add filters for any flags that the user has set
        foreach ($flags as $flag)
        {
            if (array_key_exists($flag, $filters))
            {
                $filter = $filters[$flag];
                if (is_array($filter))
                {
                    array_walk($filter, function(&$item) use ($flag, $helper) {
                        if(!empty($item)) {
                            $item = $helper->escapeTerm($flag).':'.$helper->escapePhrase($item);
                        }
                    });
                    $query->createFilterQuery($flag)->addTag($flag)->setQuery(implode(' OR ', $filter));
                } else {
                    if (!empty($filter))
                    {
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
        if (array_key_exists('low_price', $filters))
        {
            if (!empty($filters['low_price']))
            {
                $query->createFilterQuery('low_price')->addTag('low_price')->setQuery($helper->escapeTerm('low_price').':['.$helper->escapeTerm($filters['low_price']).' TO *]');
            }
        }
        if (array_key_exists('high_price', $filters))
        {
            if (!empty($filters['low_price']))
            {
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

            /**
             * @var $result \Solarium_Result_Select
             */
            $result = $pagination->getCustomParameter('result');
            $facets = $result->getFacetSet();
            $stats = $solarium->select($statsQuery)->getStats();
        } catch (\Solarium_Client_HttpException $e) {
            $msg = 'There seems to be an issue with our search engine. Please check later.';
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(array('status' => 'error', 'message' => $msg), 500);
            } else  {
                throw new HttpException(500, $msg);
            }
        }

        if ($request->isXmlHttpRequest()) {
            $data = array();
            foreach($pagination as $document)
            {
                $data[] = array(
                    'header' => $document->header,
                    'url' => $this->generateUrl('routing', array('url' => $document->url)),
                    'price' => $document->low_price,
                    'thumbnail' => $document->thumbnail_path,
                    'value' => $document->header,
                    'tokens' => array_merge(explode(' ', $document->header), $document->product_code),
                );
            }

            return new JsonResponse($data);
        } else {
            return $this->render('KACSiteBundle:Listing:search.html.twig', array(
                'query' => $query,
                'facets' => $facets,
                'featureGroups' => $featureGroups,
                'pagination' => $pagination,
                'stats' => $stats,
            ));
        }
    }

    /**
     * @Route("/listing-routes.json", name="listing_routes")
     */
    public function departmentFeedAction()
    {
        $data = array();
        $em = $this->getDoctrine()->getManager();

        // Fetch the departments
        $routing = $em->getRepository("KAC\SiteBundle\Entity\Routing")->findAll();
        foreach ($routing as $route)
        {
            if ($route instanceof Brand\Routing)
            {
                $data[] = array(
                    'header' => $route->getBrand()->getDescription()->getHeader(),
                    'url' => $this->generateUrl('routing', array('url' => $route->getUrl())),
                    'type' => 'brand',
                    'value' => $route->getBrand()->getDescription()->getHeader(),
                    'tokens' => explode(' ', $route->getBrand()->getDescription()->getHeader()),
                );
            } elseif ($route instanceof Brand\DepartmentRouting) {
                $data[] = array(
                    'header' => $route->getBrand()->getDescription()->getHeader() . ' ' . $route->getDepartment()->getDescription()->getHeader(),
                    'url' => $this->generateUrl('routing', array('url' => $route->getUrl())),
                    'type' => 'brand_with_department',
                    'value' => $route->getBrand()->getDescription()->getHeader() . ' ' . $route->getDepartment()->getDescription()->getHeader(),
                    'tokens' => explode(' ', $route->getBrand()->getDescription()->getHeader() . ' ' . $route->getDepartment()->getDescription()->getHeader()),
                );
            } elseif ($route instanceof Department\Routing) {
                $data[] = array(
                    'header' => $route->getDepartment()->getDescription()->getHeader(),
                    'url' => $this->generateUrl('routing', array('url' => $route->getUrl())),
                    'type' => 'department',
                    'value' => $route->getDepartment()->getDescription()->getHeader(),
                    'tokens' => explode(' ', $route->getDepartment()->getDescription()->getHeader()),
                );
            }
        }

        $response = new JsonResponse($data);
        $response->setSharedMaxAge(3600);
        return $response;
    }

    public function departmentTreeAction(Request $request, $departmentId = null, $brandId = null)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        if ($departmentId)
        {
            if($brandId)
            {
                $qb = $em->getRepository("KACSiteBundle:Department")->createQueryBuilder('d');
                $departments = $qb->join('KAC\SiteBundle\Entity\BrandToDepartment', 'btd', Expr\Join::WITH, $qb->expr()->eq('btd.department', 'd.id'))
                    ->where($qb->expr()->eq('btd.brand', '?1'))
                    ->andWhere($qb->expr()->eq('d.id', '?2'))
                    ->andWhere($qb->expr()->eq('d.status', $qb->expr()->literal('a')))
                    ->orderBy('d.displayOrder')
                    ->setParameter(1, $brandId)
                    ->setParameter(2, $departmentId)
                    ->getQuery()
                    ->execute();
            } else {
                $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('id' => $departmentId, 'status' => 'a'), array('displayOrder' => 'ASC'));
            }
        } else {
            if($brandId)
            {
                $qb = $em->getRepository("KACSiteBundle:Department")->createQueryBuilder('d');
                $departments = $qb->join('KAC\SiteBundle\Entity\BrandToDepartment', 'btd', Expr\Join::WITH, $qb->expr()->eq('btd.department', 'd.id'))
                    ->where($qb->expr()->eq('btd.brand', '?1'))
                    ->andWhere($qb->expr()->eq('d.lvl', $qb->expr()->literal(1)))
                    ->andWhere($qb->expr()->eq('d.status', $qb->expr()->literal('a')))
                    ->orderBy('d.displayOrder')
                    ->setParameter(1, $brandId)
                    ->getQuery()
                    ->execute();
            } else {
                $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('lvl' => 1, 'status' => 'a'), array('displayOrder' => 'ASC'));
            }
        }

        $response = $this->render('KACSiteBundle:Listing:departmentTree.html.twig', array(
            'departments' => $departments,
            'brandId' => $brandId,
        ));
        $response->setSharedMaxAge(3600);

        return $response;
    }

    public function popularBrandsAction(Request $request, $departmentId = null)
    {
        $brands = $this->getPopularBrands($departmentId, 8);

        $response = $this->render('KACSiteBundle:Listing:popularBrands.html.twig', array(
            'brands' => $brands,
            'departmentId' => $departmentId,
        ));
        $response->setSharedMaxAge(432000);

        return $response;
    }

    public function popularProductsAction(Request $request, $departmentId = null, $brandId = null)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        $brand = null;
        $department = null;

        if($departmentId)
        {
            $department = $em->getRepository("KACSiteBundle:Department")->find($departmentId);
        }
        if ($brandId)
        {
            $brand = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($brandId);
        }

        $products = $this->getPopularProducts($departmentId, $brandId, 5);

        $response = $this->render('KACSiteBundle:Listing:popularProducts.html.twig', array(
            'products' => $products,
            'department' => $department,
            'brand' => $brand,
        ));
        $response->setSharedMaxAge(432000);

        return $response;
    }

    private function getPopularBrands($departmentId = null, $num=null)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        // If not department was specified we can fetch the popular products just using SQL
        if(!$departmentId)
        {
            $qb = $em->createQueryBuilder();
            $qb->select('b, count(op.id) AS total')
                ->from('KAC\SiteBundle\Entity\Brand', 'b')
                ->join('KAC\SiteBundle\Entity\Product', 'p', Expr\Join::WITH, $qb->expr()->eq('p.brand', 'b.id'))
                ->join('KAC\SiteBundle\Entity\Order\Product', 'op', Expr\Join::WITH, $qb->expr()->eq('op.product', 'p.id'))
                ->groupBy('op.product')
                ->orderBy('p.accessory', 'ASC')
                ->addOrderBy('total', 'DESC');
            $qb->where($qb->expr()->gt('op.unitCost', ':unitCost'))
                ->setParameter('unitCost', 200);
            if($num)
            {
                $qb->setMaxResults($num);
            }

            return $qb->getQuery()->execute();
        } else {
            $products = $this->getPopularProducts($departmentId);
            $brands = array();

            foreach ($products as $item)
            {
                /**
                 * @var $product Product
                 */
                $product = $item[0];

                $brand = $product->getBrand();
                if (array_key_exists($brand->getId(), $brands))
                {
                    $brands[$brand->getId()]['total'] += $item['total'];
                } else {
                    $brands[$brand->getId()] = array(
                        0 => $product->getBrand(),
                        'total' => $item['total'],
                    );
                }
            }

            // Remove unneeded elements
            if($num)
            {
                $brands = array_values(array_slice($brands, 0, $num));
            }

            return $brands;
        }
    }

    private function getPopularProducts($departmentIds = null, $brandId = null, $num=null)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        // If no department was specified we can fetch the popular products just using SQL
        if(!$departmentIds)
        {
            $qb = $em->createQueryBuilder();
            $qb->select('p, count(op.id) AS total')
                ->from('KAC\SiteBundle\Entity\Product', 'p')
                ->join('KAC\SiteBundle\Entity\Order\Product', 'op', Expr\Join::WITH, $qb->expr()->eq('op.product', 'p.id'))
                ->groupBy('op.product')
                ->orderBy('p.accessory', 'ASC')
                ->addOrderBy('total', 'DESC');
            $qb->where($qb->expr()->gt('op.unitCost', ':unitCost'))
                ->setParameter('unitCost', 200);
            if($brandId)
            {
                $qb->andWhere($qb->expr()->eq('p.brand', ':brand'))
                    ->setParameter('brand', $brandId);
            }
            if($num)
            {
                $qb->setMaxResults($num);
            }

            return $qb->getQuery()->execute();
        } else {
            $ids = array();
            if(!is_array($departmentIds)) $departmentIds = array($departmentIds);

            foreach($departmentIds as $departmentId)
            {
                $query = $solarium->createSelect();
                $helper = $query->getHelper();
                $query->setQuery('*');
                $query->setFields(array('id'));
                $query->setRows(99999999);

                // Get the department
                $department = $em->getRepository("KACSiteBundle:Department")->find($departmentId);

                // If brand was specified fetch from the database
                $brand = null;
                if ($brandId)
                {
                    $brand = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($brandId);
                }

                if ($department)
                {
                    // Get path
                    $departmentFilterPath = "";
                    $currDepartment = $department;
                    do {
                        $departmentFilterPath = $currDepartment . "|" . $departmentFilterPath;
                        $currDepartment = $currDepartment->getParent();
                    } while ($currDepartment !== null);
                    $query->createFilterQuery('department')->setQuery('department_path:'.$helper->escapePhrase(ltrim(rtrim($departmentFilterPath, "|"), "|")));
                }

                if ($brand)
                {
                    $query->createFilterQuery('brand')->addTag('brand')->setQuery('brand:'.$helper->escapePhrase($brand->getDescription()->getName ()));
                }
                $results = $solarium->execute($query);

                foreach ($results as $document)
                {
                    $ids[] = $document->id;
                }
            }

            if(count($ids) <= 0)
            {
                return array();
            }

            $qb = $em->createQueryBuilder();
            $products = $qb->select('p, count(op.id) AS total')
                ->from('KAC\SiteBundle\Entity\Product', 'p')
                ->leftJoin('KAC\SiteBundle\Entity\Order\Product', 'op', Expr\Join::WITH, $qb->expr()->eq('op.product', 'p.id'))
                ->where($qb->expr()->in('p.id', '?1'))
                ->groupBy('op.product')
                ->orderBy('p.accessory', 'ASC')
                ->addOrderBy('total', 'DESC')
                ->setParameter(1, $ids)
                ->getQuery()
                ->execute();

            if($num)
            {
                $products = array_values(array_slice($products, 0, $num));
            }

            return $products;
        }
    }
}