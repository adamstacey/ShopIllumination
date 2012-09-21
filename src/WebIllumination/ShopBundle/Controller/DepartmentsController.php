<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DepartmentsController extends Controller
{
	
	// Index page
	public function indexAction(Request $request, $id, $url, $brand, $group)
    {    	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $departmentService = $this->get('web_illumination_admin.department_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Check if the page is being indexed by a search engine
	    $noAjax = (isset($_GET['_escaped_fragment_'])?1:0);
	    
    	// Get the department
    	$department = $departmentService->getDepartment($id, 'en', 'GBP');
    	
    	// Get the product listing settings
    	$productListingSettings = $this->get('session')->get('productListingSettings');
    	    	
    	// Get the department listing
    	$departmentListings = $this->get('session')->get('departmentListings');
    	if ($group)
    	{
	    	if (isset($departmentListings[$group.'/'.$url]))
	    	{
	    		$departmentListing = $departmentListings[$group.'/'.$url];
	    	} else {
		    	$departmentListing = $departmentListings['index'];
	    	}
    	} elseif ($brand) {
	    	if (isset($departmentListings[$brand.'/'.$url]))
	    	{
	    		$departmentListing = $departmentListings[$brand.'/'.$url];
	    	} else {
		    	$departmentListing = $departmentListings['index'];
	    	}
	    } else {
		    if (isset($departmentListings[$url]))
	    	{
	    		$departmentListing = $departmentListings[$url];
	    	} else {
		    	$departmentListing = $departmentListings['index'];
	    	}
	    }
	    
	    // Check if we are on a brand department page
	    if ($brand)
	    {
	    	$brandId = 0;
			$brandRoutingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('url' => $brand, 'locale' => 'en', 'objectType' => 'brand'));
			if ($brandRoutingObject)
			{
    			$brandId = $brandRoutingObject->getObjectId();
			}
			$brandDescriptionObject = false;
			if ($brandId > 0)
			{
    			$brandDescriptionObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $brandId));
			}
			$brandName = '';
			if ($brandDescriptionObject)
			{
    			$brandName = $brandDescriptionObject->getBrand();
			}
			
			// Update the department path URLs
    		foreach ($department['departmentPaths'] as $key => $departmentPath)
    		{
	    		if ($brandName)
	    		{
		    		$department['departmentPaths'][$key]['department'] = $brandName.' '.$departmentPath['department'];
	    		}
	    		$department['departmentPaths'][$key]['routing'] = $systemService->getDepartmentUrl($departmentPath['routing'], false, $brand, $group);
	    	}
	    	
	    	// Update the department
	    	if ($brandName)
	    	{
	    		$department['pageTitle'] = $brandName.' '.$department['pageTitle'];
	    		$department['header'] = $brandName.' '.$department['header'];
	    	}
	    } else {
		    // Update the department path URLs
    		foreach ($department['departmentPaths'] as $key => $departmentPath)
    		{
	    		$department['departmentPaths'][$key]['routing'] = $systemService->getDepartmentUrl($departmentPath['routing'], false, $brand, $group);
	    	}
	    }
		
		// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Departments:index.html.twig', array('noAjax' => $noAjax, 'url' => $url, 'brand' => $brand, 'group' => $group, 'department' => $department, 'productListingSettings' => $productListingSettings, 'departmentListing' => $departmentListing));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
}