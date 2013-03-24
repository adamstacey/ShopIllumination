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
	public function pageRequestAction(Request $request, $url, $results = 0, $page = 0, $sort = 0, $order = 0, $brand = 0, $brandId = 0, $group = 0, $priceFrom = 0, $priceTo = 0, $brands = 0, $options = 0, $features = 0)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $seoService = $this->get('web_illumination_admin.seo_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    	
   		// Tidy up URL
   		$url = trim($url);
   		
   		// Check for old index.php queries
   		if (($url == 'index.php') || ($url == 'image.php'))
   		{
	   		switch ($request->query->get('target'))
	   		{
		   		case 'products':
		   			switch ($request->query->get('mode'))
			   		{
				   		case 'search':
				   			$mid = $request->query->get('mid');
				   			$cid = $request->query->get('cid');
				   			$q = $request->query->get('q');
				   			if ($mid)
				   			{
					   			$midRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findOneBy(array('brand' => $mid, 'locale' => 'en'));
					   			if ($midRoutingObject)
					   			{
						   			$midRouting = $midRoutingObject->getBrand();
						   			$midRouting = $seoService->generateUrl(urldecode($midRouting));
					   			}
				   			}
				   			if ($cid)
				   			{
					   			$cidRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $cid, 'locale' => 'en'));
					   			if ($cidRoutingObject)
					   			{
						   			$cidRouting = $cidRoutingObject->getUrl();
					   			}
				   			}
				   			$q = $seoService->generateUrl(urldecode($q));
					   		$qObjects = explode('-', $q);
					   		if (sizeof($qObjects) > 3)
					   		{
						   		$q = $qObjects[sizeof($qObjects) - 3].'-'.$qObjects[sizeof($qObjects) - 2].'-'.$qObjects[sizeof($qObjects) - 1];
					   		}
					   		if (($midRouting) && ($cidRouting))
					   		{
					   			$this->resetProductSearch();
						   		return $this->redirect($this->get('router')->generate('department_with_brand', array('brand' => $midRouting, 'url' => $cidRouting)), 301);
					   		} elseif ($midRouting) {
					   			$this->resetProductSearch();
					   			return $this->redirect($this->get('router')->generate('page_request', array('url' => $midRouting)), 301);
					   		} elseif ($cidRouting) {
					   			$this->resetProductSearch();
						   		return $this->redirect($this->get('router')->generate('page_request', array('url' => $cidRouting)), 301);
					   		} else {
					   			$this->resetProductSearch();
						   		return $this->redirect($this->get('router')->generate('products_product_search', array('search' => $q)), '301');
					   		}
				   			break;
				   	}
		   			break;
		   		case 'forms':
		   		case 'pages':
		   			$this->resetProductSearch();
		   			return $this->redirect($this->get('router')->generate('content_contact_us', array()), 301);
		   			break;
		   		default:
		   			// Set error message
					$this->get('session')->getFlashBag()->add('error', 'Sorry, you cannot access this page directly.');
					    
				    // Forward to the last catalogue page
				    return $this->redirect($this->get('router')->generate('homepage'));
	   		}	
   		}
   		   		
   		// Check for the home page
   		if (($url == '') || ($url == 'index'))
   		{
   			$this->resetProductSearch();
			return $this->forward('WebIlluminationShopBundle:System:index');
   		}
   		
   		// Remove the page listings from the URL from the old site
   		if (strrpos($url, '-page-full_list') !== false)
   		{
   			$url = str_replace('-page-full_list', '', $url);
   		} elseif (strrpos($url, '-page-') !== false) {
	   		$url = substr($url, 0, strrpos($url, '-page-'));
   		}
   		
   		// Try and find the routing
   		$routingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('url' => $url, 'locale' => 'en'));
   		if (!$routingObject)
   		{
   			$redirectObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->findOneBy(array('redirectFrom' => $url));
   			if ($redirectObject)
   			{
   				$this->resetProductSearch();
   				return $this->redirect($this->get('router')->generate('page_request', array('url' => $redirectObject->getRedirectTo())), $redirectObject->getRedirectCode());
   			}
   		}
   		if ($routingObject)
   		{
   			switch ($routingObject->getObjectType())
   			{
   				case 'brand':
   					$this->resetProductSearch();
   					return $this->forward('WebIlluminationShopBundle:Brands:index', array('id' => $routingObject->getObjectId()));
   					break;
   				case 'department':
   					// Get the current route
   					$route = $this->getRequest()->get('_route');
   					
   					// Update the product listing settings
   					$productListingSettings = $this->get('session')->get('productListingSettings');
   					if ($sort)
   					{
   						switch ($sort)
   						{
   							case 'listPrice':
   							case 'savings':
   							case 'discount':
   							case 'product':
   							case 'createdAt':
		   						$productListingSettings['sort'] = $sort;
		   						break;
	   					}
   					}
   					if ($order)
   					{
   						$order = strtoupper($order);
	   					switch ($order)
   						{
   							case 'DESC':
   							case 'ASC':
		   						$productListingSettings['order'] = $order;
		   						break;
	   					}
   					}
   					$productListingSettings['sortOrder'] = $productListingSettings['sort'].':'.$productListingSettings['order'];
   					if ($results > 0)
   					{
   						switch ($results)
   						{
   							case 10:
   							case 20:
   							case 50:
   							case 100:
   							case 99999999:
		   						$productListingSettings['maxResults'] = $results;
		   						if ($results == 99999999)
		   						{
			   						$systemService->resetDepartmentListingsPages();
		   						}
		   						break;
	   					}
   					}
   					$this->get('session')->set('productListingSettings', $productListingSettings);
   					
   					// Check for page
   					if ($page < 1)
   					{
	   					$page = 1;
   					}
   					
   					// Check for group
   					if (!$group)
   					{
	   					$group = '';
   					}
   					
   					// Check for a brand
					$brandId = 0;
					if ($brand)
					{
						// Get the routing for the brand
						$brandRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('url' => $brand, 'objectType' => 'brand', 'locale' => 'en'));
						if ($brandRoutingObject)
						{
							$brandId = $brandRoutingObject->getObjectId();
						}
					}
					
					// Check for brands
					if (!$brands)
					{
						$brands = '';
					}
					
					// Check for options
					if (!$options)
					{
						$options = '';
					}
					
					// Check for features
					if (!$features)
					{
						$features = '';
					}
   					
   					// Update the department listing
   					if ($group)
   					{
	   					$brandId = 0;
	   					$brand = '';
	   					$brands = '';
   						$systemService->addUrlToDepartmentHistory($group.'/'.$url);
   						$systemService->checkDepartmentListing($group.'/'.$url);
   						$systemService->updateDepartmentListing($group.'/'.$url, $page, $group, $brand, $brandId, $priceFrom, $priceTo, $brands, $options, $features);
   					} elseif ($brandId > 0)	{
   						$brands = '';
   						$systemService->addUrlToDepartmentHistory($brand.'/'.$url);
   						$systemService->checkDepartmentListing($brand.'/'.$url);
   						$systemService->updateDepartmentListing($brand.'/'.$url, $page, $group, $brand, $brandId, $priceFrom, $priceTo, $brands, $options, $features);
   					} else {
	   					$systemService->addUrlToDepartmentHistory($url);
   						$systemService->checkDepartmentListing($url);
   						$systemService->updateDepartmentListing($url, $page, $group, $brand, $brandId, $priceFrom, $priceTo, $brands, $options, $features);
   					}
   					if ($route == 'page_request')
   					{
	   					$systemService->updateDepartmentListing($url);
   					}
   					$this->resetProductSearch();
//   					return $this->forward('WebIlluminationShopBundle:Departments:index', array('id' => $routingObject->getObjectId(), 'url' => $url, 'brand' => $brand, 'group' => $group));
   					return $this->forward('KACSiteBundle:Listing:index', array('departmentId' => $routingObject->getObjectId(), 'brandId' => $brand), $request->query->all());
   					break;
   				case 'product':
   					// Check the status of the product
   					$productObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Product')->findOneBy(array('id' => $routingObject->getObjectId()));
   					if ($productObject)
   					{
	   					if ($productObject->getStatus() == 'a')
	   					{
		   					return $this->forward('WebIlluminationShopBundle:Products:index', array('id' => $routingObject->getObjectId()));		
	   					} else {
	   						$productToDepartmentObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findOneBy(array('productId' => $routingObject->getObjectId(), 'displayOrder' => '1'));
	   						$departmentRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $productToDepartmentObject->getDepartmentId(), 'objectType' => 'department', 'locale' => 'en'));
	   						if ($productToDepartmentObject && $departmentRoutingObject)
	   						{
		   						return $this->forward('WebIlluminationShopBundle:Departments:index', array('id' => $productToDepartmentObject->getDepartmentId(), 'url' => $departmentRoutingObject->getUrl(), 'brand' => 0, 'group' => 0));
	   						} else {
		   						$search = $seoService->generateUrl($url);
						   		$searchObjects = explode('-', $search);
						   		if (sizeof($searchObjects) > 3)
						   		{
							   		$search = $searchObjects[sizeof($searchObjects) - 3].'-'.$searchObjects[sizeof($searchObjects) - 2].'-'.$searchObjects[sizeof($searchObjects) - 1];
						   		}
						   		return $this->forward('WebIlluminationShopBundle:Products:productSearch', array('search' => $search));
	   						}
	   					}
   					} else {
	   					$search = $seoService->generateUrl($url);
				   		$searchObjects = explode('-', $search);
				   		if (sizeof($searchObjects) > 3)
				   		{
					   		$search = $searchObjects[sizeof($searchObjects) - 3].'-'.$searchObjects[sizeof($searchObjects) - 2].'-'.$searchObjects[sizeof($searchObjects) - 1];
				   		}
				   		return $this->forward('WebIlluminationShopBundle:Products:productSearch', array('search' => $search));
   					}
   					break;
   			}
   		}
   		
   		// Check if the original address had a .html in and redirect if it doesn't exist
   		$fullUrl = $request->server->get('REQUEST_URI');
   		if (strpos($fullUrl, '.html') === false)
   		{
	   		return $this->redirect($this->get('router')->generate('page_request', array('url' => $url)));
   		}
   		
   		// Try and search for what the visitor has come through with
   		$search = $seoService->generateUrl($url);
   		$searchObjects = explode('-', $search);
   		if (sizeof($searchObjects) > 3)
   		{
	   		$search = $searchObjects[sizeof($searchObjects) - 3].'-'.$searchObjects[sizeof($searchObjects) - 2].'-'.$searchObjects[sizeof($searchObjects) - 1];
   		}
   		//mail('acfstacey@gmail.com', '404: '.$url, '404: '.$url);
   		//return $this->redirect($this->get('router')->generate('products_product_search', array('search' => $search)), '301');
   		return $this->forward('WebIlluminationShopBundle:Products:productSearch', array('search' => $search));

    }
    
    // Product redirect
	public function productRedirectAction($id, $description)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Check to see if product exists
	    $routingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => 'en'));
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