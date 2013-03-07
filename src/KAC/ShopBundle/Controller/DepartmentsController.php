<?php

namespace KAC\ShopBundle\Controller;
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
use KAC\SiteBundle\Entity\Product\Description;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\ProductToFeature;

/**
 * @Route("/department")
 */
class DepartmentsController extends Controller
{
    /**
     * @Route("/{id}/{brandId}", name="department_index", defaults={"brandId" = null})
     * @Method({"GET"})
     * @Template()
     */
	public function indexAction(Request $request, $id, $brandId=null)
    {
        /**
         * Define variable types
         * @var $department \KAC\SiteBundle\Entity\Department
         * @var $brand \KAC\SiteBundle\Entity\Brand
         * @var $departmentToFeature \KAC\SiteBundle\Entity\DepartmentToFeature
         */
        $em = $this->getDoctrine()->getManager();

        // Fetch department
        $department = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
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

        $select = $solarium->createSelect();
        $helper = $select->getHelper();

        $query = '*';

        $filters = $request->query->get('filter', array());

        //Facets
        $facetSet = $select->getFacetSet();
        $facetSet->createFacetField('brands')->setField('brand')->setSort('index');
        $facetSet->createFacetField('departments')->setField('department_path')->setSort('index');
        foreach($department->getFeatures() as $departmentToFeature)
        {
            $facetSet->createFacetField($departmentToFeature->getProductFeature()->getProductFeatureGroup())
                ->setField('attr_feature_'.$departmentToFeature->getProductFeature()->getProductFeatureGroup());
        }

        // Sort results (If the user has entered a query they cannot sort)
        $sort = explode(':', $request->query->get('sort_order', 'header_sort:asc'));
        if(count($sort) === 2 && in_array($sort[0], array('header_sort', 'list_price', 'created_at'))) {
            $sortCol = $sort[0];
            $sortDir = ($sort[1] == 'asc') ? Solarium_Query_Select::SORT_ASC : Solarium_Query_Select::SORT_DESC;

            $select->addSort($helper->escapeTerm($sortCol), $sortDir);
        }

        $select->setQuery($query);

        try {
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                array($solarium, $select),
                $request->query->get('page', 1),
                $request->query->get('limit', 20)
            );
            $pagination->setTemplate('KACAdminBundle:Includes:pagination.html.twig');
            $pagination->setSortableTemplate('KACAdminBundle:Includes:sortable.html.twig');

            $facets = $pagination->getCustomParameter('result')->getFacetSet();
        } catch (\Solarium_Client_HttpException $e) {
            throw new HttpException(500, 'There seems to be an issue with our search engine. Please check later.');
        }

        return array('pagination' => $pagination, 'facets' => $facets, 'department' => $department, 'department_path' => $departmentPath, 'brand' => $brand);
    }
}