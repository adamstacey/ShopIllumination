<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SystemController extends Controller
{
	// Page request
	public function pageRequestAction($url, $results = false, $page = false, $brand = false, $group = false)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    	
   		// Tidy up URL
   		$url = strtolower(trim($url));
   		   		
   		// Check for the home page
   		if (($url == '') || ($url == 'index'))
   		{
			return $this->forward('WebIlluminationShopBundle:System:index');
   		}
   		
   		// Setup redirect code
   		$redirectCode = false;
   		
   		// Try and find the routing
   		$routingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('url' => $url, 'locale' => 'en'));
   		if (!$routingObject)
   		{
   			$redirectObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Redirect')->findOneBy(array('redirectFrom' => $url));
   			if ($redirectObject)
   			{
   				return $this->redirect($this->get('router')->generate('page_request', array('url' => $redirectObject->getRedirectTo())), $redirectObject->getRedirectCode());
   			}
   		}
   		if ($routingObject)
   		{
   			switch ($routingObject->getObjectType())
   			{
   				case 'brand':
   					return $this->forward('WebIlluminationShopBundle:Brands:index', array('id' => $routingObject->getObjectId()));
   					break;
   				case 'department':
   					$systemService->addCataloguePageToHistory($url);
   					if ($brand)
   					{
   						// Get the routing for the brand
   						$brandRoutingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('url' => $brand, 'locale' => 'en'));
   						if ($brandRoutingObject)
   						{
   							if ($brandRoutingObject->getObjectType() == 'brand')
   							{
   								$brandId = $brandRoutingObject->getObjectId();
   								
   								// Get the catalogue page history
		    					$cataloguePageHistory = $this->get('session')->get('cataloguePageHistory');
		    					
		    					// Reset the filters
		    					$cataloguePageHistory['pages'][$url]['filter'] = array();
					   			$cataloguePageHistory['pages'][$url]['filter']['priceRange'] = array();
					   			$cataloguePageHistory['pages'][$url]['filter']['priceRange']['from'] = 0;
					   			$cataloguePageHistory['pages'][$url]['filter']['priceRange']['to'] = 0;
					   			$cataloguePageHistory['pages'][$url]['filter']['brands'] = array($brandId);
					   			$cataloguePageHistory['pages'][$url]['filter']['department'] = '';
					   			$cataloguePageHistory['pages'][$url]['filter']['options'] = array();
					   			$cataloguePageHistory['pages'][$url]['filter']['features'] = array();
					   			
					   			// Update the session
						    	$this->get('session')->set('cataloguePageHistory', $cataloguePageHistory);
   							}
   						}
   						
   						// View all
   						if ($all)
   						{
   							// Get the catalogue page history
	    					$cataloguePageHistory = $this->get('session')->get('cataloguePageHistory');
	    					
	    					// Reset the settings
					    	$cataloguePageHistory['pages'][$url]['maxResults'] = 99999999;
					    	$cataloguePageHistory['pages'][$url]['page'] = 1;
				   			
				   			// Update the session
					    	$this->get('session')->set('cataloguePageHistory', $cataloguePageHistory);
					    	
					    	// Get the product listing settings
	    					$productListingSettings = $this->get('session')->get('productListingSettings');
	    					
	    					// Reset the settings
					    	$productListingSettings['maxResults'] = 99999999;
				   			
				   			// Update the session
					    	$this->get('session')->set('productListingSettings', $productListingSettings);
   						}
   					}
   					return $this->forward('WebIlluminationShopBundle:Departments:index', array('id' => $routingObject->getObjectId(), 'url' => $url, 'brand' => $brand, 'all' => $all));
   					break;
   				case 'product':
   					return $this->forward('WebIlluminationShopBundle:Products:index', array('id' => $routingObject->getObjectId()));
   					break;
   			}
   		}
   		    	
        return $this->render('WebIlluminationShopBundle:System:pageNotFound.html.twig', array());
    }
    
    // Product redirect
	public function productRedirectAction($id, $description)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Check to see if product exists
	    $routingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => 'en'));
	    if ($routingObject)
	    {
	    	return $this->redirect($this->get('router')->generate('page_request', array('url' => $routingObject->getUrl())), 301);
	    }
	    	   		   		    	
        return $this->render('WebIlluminationShopBundle:System:pageNotFound.html.twig', array());
    }
    
    // Section redirect
	public function sectionRedirectAction($id, $page, $description)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    return $this->redirect($this->get('router')->generate('shop_homepage'), 301);
    }
    
    // Home page redirect
	public function homePageRedirectAction($page)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    return $this->redirect($this->get('router')->generate('shop_homepage'), 301);
    }
	
	// Home page
	public function indexAction()
    {
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
    	
    	// Get the special offers
    	$specialOffers = $productService->getSpecialOffers('en', 'GBP');
    	
        // Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:System:index.html.twig', array('specialOffers' => $specialOffers));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Main menu
	public function mainMenuAction($locale = 'en')
    {
   		// Get the services
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	$departmentService = $this->get('web_illumination_admin.department_service');
   		
    	// Get a list of departments
    	$brands = $brandService->getBrands($locale);
   		
		// Get a list of departments
		$departments = $departmentService->getAllDepartments(0, '', '', '', '', '', '', false, false, false, false, 0, 0);
    	
        return $this->render('WebIlluminationShopBundle:System:mainMenu.html.twig', array('departments' => $departments, 'brands' => $brands));
    }
}