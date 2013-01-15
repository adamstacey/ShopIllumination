<?php

namespace WebIllumination\SiteBundle\Controller;

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
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Description;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

class ListingController extends Controller
{
    /**
     * @Route("/products", name="listing_products")
     * @Route("/department/{departmentId}", name="listing_department", defaults={"departmentId" = null})
     * @Route("//brand/{brandId}", name="listing_brand", defaults={"brandId" = null})
     * @Route("/department/{departmentId}/brand/{brandId}", name="listing_department_brand", defaults={"departmentId" = null, "brandId" = null})
     * @Method({"GET"})
     * @Template()
     */
	public function indexAction(Request $request, $departmentId=null, $brandId=null)
    {
        /**
         * Define variable types
         * @var $department \WebIllumination\SiteBundle\Entity\Department
         * @var $brand \WebIllumination\SiteBundle\Entity\Brand
         * @var $departmentToFeature \WebIllumination\SiteBundle\Entity\DepartmentToFeature
         */
        $em = $this->getDoctrine()->getManager();

        // If department was specified fetch from the database
        $department = null;
        $departmentPath = array();

        if($departmentId) {
            $department = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->find($departmentId);
            if(!$department) {
                throw new NotFoundHttpException("Department not found");
            }

            // Build department path
            $departmentPath = array();
            $tempDepartment = $department;
            while($tempDepartment->getParent() !== null) {
                array_unshift($departmentPath, $tempDepartment);
                $tempDepartment = $tempDepartment->getParent();
            }
        }
        // If brand was specified fetch from the database
        $brand = null;

        if($brandId) {
            $brand = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->find($brandId);
            if(!$brand) {
                throw new NotFoundHttpException("Brand not found");
            }
        }

        // Fetch products from solr
        /** @var $solarium \Solarium_Client */
        $solarium = $this->get('solarium.client');

        $select = $solarium->createSelect();
        $helper = $select->getHelper();

        $query = '*';

        $filters = $request->query->get('filter', array());

        // Filter queries
        if($department) {
            $select->createFilterQuery('department')->setQuery('department:'.$helper->escapePhrase($department->getDescription()->getName()));
        }
        if($brand) {
            $select->createFilterQuery('brand')->setQuery('brand:'.$helper->escapePhrase($brand->getDescription()->getName ()));
        }

        //Facets
        $facetSet = $select->getFacetSet();
        $featureGroups = array();
        // Do not include the brand filters if the user is on the brand listing
        if(!$brand) {
            $facetSet->createFacetField('brands')->setField('brand')->setSort('index')->setMinCount(1);
        }
        if($department) {
            $facetSet->createFacetField('departments')->setField('department_path')->setSort('index')->setMinCount(1);
            foreach($department->getFeatures() as $departmentToFeature)
            {
                $featureGroups[] = $departmentToFeature->getProductFeature()->getProductFeatureGroup();
                $facetSet->createFacetField($departmentToFeature->getProductFeature()->getProductFeatureGroup())
                    ->setField('attr_feature_'.$departmentToFeature->getProductFeature()->getProductFeatureGroup());
            }
        }

        // Sort results (If the user has entered a query they cannot sort)
        $sort = explode(':', $request->query->get('sort_order', 'header_sort:asc'));
        if(count($sort) === 2 && in_array($sort[0], array('header_sort', 'list_price', 'created_at'))) {
            $sortCol = $sort[0];
            $sortDir = ($sort[1] == 'asc') ? Solarium_Query_Select::SORT_ASC : Solarium_Query_Select::SORT_DESC;

            $select->addSort($helper->escapeTerm($sortCol), $sortDir);
        }

        $select->setQuery($query);

        // Setup paginator
        try {
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                array($solarium, $select),
                $request->query->get('page', 1),
                $request->query->get('limit', 20)
            );
            $pagination->setTemplate('WebIlluminationAdminBundle:Includes:pagination.html.twig');
            $pagination->setSortableTemplate('WebIlluminationAdminBundle:Includes:sortable.html.twig');

            $facets = $pagination->getCustomParameter('result')->getFacetSet();
        } catch (\Solarium_Client_HttpException $e) {
            throw new HttpException(500, 'There seems to be an issue with our search engine. Please check later.');
        }

        return array(
            'pagination' => $pagination,
            'facets' => $facets,
            'featureGroups' => $featureGroups,
            'department' => $department,
            'department_path' => $departmentPath,
            'brand' => $brand
        );
    }
}