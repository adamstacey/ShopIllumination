<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Category;
use WebIllumination\AdminBundle\Entity\CategoryDescription;
use WebIllumination\AdminBundle\Entity\WebAddress;
use WebIllumination\AdminBundle\Entity\Redirect;
use WebIllumination\AdminBundle\Entity\ObjectIndex;

class DataController extends Controller
{
	// Index page
	public function googleProductsAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $productService = $this->get('web_illumination_admin.product_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
		// Get the entity manager
   		$em = $this->getDoctrine()->getManager();
    	
    	// Get the products
    	$products = $productService->getProducts('en', 'GBP');
   		   		    	
        return $this->render('WebIlluminationShopBundle:Data:googleProducts.xml.twig', array('products' => $products));
    }
    
    // XML sitemap page
	public function xmlSitemapAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $brandService = $this->get('web_illumination_admin.brand_service');
	    $departmentService = $this->get('web_illumination_admin.department_service');
	    $productService = $this->get('web_illumination_admin.product_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
		// Get the entity manager
   		$em = $this->getDoctrine()->getManager();
    	
    	// Get the brands
    	$brands = $brandService->getBrands('en');
    	
    	// Get the departments
    	$departments = $departmentService->getDepartments('en', 'GBP');
    	
    	// Get the products
    	$products = $productService->getProducts('en', 'GBP');
   		   		    	
        return $this->render('WebIlluminationShopBundle:Data:sitemap.xml.twig', array('brands' => $brands, 'departments' => $departments, 'products' => $products));
    }
}