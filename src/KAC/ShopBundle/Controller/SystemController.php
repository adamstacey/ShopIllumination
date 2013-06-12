<?php

namespace KAC\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SystemController extends Controller
{
    // Section redirect
	public function sectionRedirectAction($id, $page, $description)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    return $this->redirect($this->get('router')->generate('shop_homepage'), 301);
    }
    
    // Home page redirect
	public function homePageRedirectAction($page)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    return $this->redirect($this->get('router')->generate('shop_homepage'), 301);
    }
	
	// Home page
	public function indexAction()
    {
   		// Get the services
    	$productService = $this->get('kac_admin.product_service');
	    $systemService = $this->get('kac_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
    	
    	// Get the special offers
    	$specialOffers = $productService->getSpecialOffers('en', 'GBP');
    	
        // Create response    	    	    	   		    
    	$response = $this->render('KACShopBundle:System:index.html.twig', array('specialOffers' => $specialOffers));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Main menu
	public function mainMenuAction($locale = 'en')
    {
//   		// Get the services
//    	$brandService = $this->get('kac_admin.brand_service');
//    	$departmentService = $this->get('kac_admin.department_service');
//
//    	// Get a list of departments
//    	$brands = $brandService->getBrands($locale);
//
//		// Get a list of departments
//		$departments = $departmentService->getAllDepartments(0, '', '', '', '', '', '', false, false, false, false, 0, 0);
    	
        return $this->render('KACShopBundle:System:mainMenu.html.twig', array('departments' => array(), 'brands' => array()));
    }
    
    // Reset the product search
    public function resetProductSearch()
    {
   		// Get the basket session
    	$basket = $this->get('session')->get('basket');
   		
    	// Reset the product search
    	$basket['productSearch'] = false;
   		
		// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
        return true;
    }
}