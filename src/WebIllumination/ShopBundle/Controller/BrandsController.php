<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BrandsController extends Controller
{
	
	// Index page
	public function indexAction($id)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $brandService = $this->get('web_illumination_admin.brand_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
    	
    	// Get the brand
    	$brand = $brandService->getBrand($id);
	    if (!$brand)
	    {
        	throw $this->createNotFoundException('Sorry, the brand was not found.');
    	}
   		    	
        return $this->render('WebIlluminationShopBundle:Brands:index.html.twig', array('brand' => $brand));
    }
    
}