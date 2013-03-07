<?php

namespace KAC\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KAC\AdminBundle\Entity\Category;
use KAC\AdminBundle\Entity\CategoryDescription;
use KAC\AdminBundle\Entity\WebAddress;
use KAC\AdminBundle\Entity\Redirect;
use KAC\AdminBundle\Entity\ObjectIndex;

class DataController extends Controller
{
	// Index page
	public function googleProductsAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    $productService = $this->get('kac_admin.product_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
		// Get the entity manager
   		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the products
    	$products = $productService->getProducts('en', 'GBP');
   		   		    	
        return $this->render('KACShopBundle:Data:googleProducts.xml.twig', array('products' => $products));
    }
    
    // XML sitemap page
	public function xmlSitemapAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    $brandService = $this->get('kac_admin.brand_service');
	    $departmentService = $this->get('kac_admin.department_service');
	    $productService = $this->get('kac_admin.product_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
		// Get the entity manager
   		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the brands
    	$brands = $brandService->getBrands('en');
    	
    	// Get the departments
    	$departments = $departmentService->getDepartments('en', 'GBP');
    	
    	// Get the products
    	$products = $productService->getProducts('en', 'GBP');
   		   		    	
        return $this->render('KACShopBundle:Data:sitemap.xml.twig', array('brands' => $brands, 'departments' => $departments, 'products' => $products));
    }
}