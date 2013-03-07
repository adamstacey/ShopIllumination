<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{
	// Product info page
	public function indexAction($id)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $productService = $this->get('web_illumination_admin.product_service');
	    $basketService = $this->get('web_illumination_admin.basket_service');
	    	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Get the department history
   		$departmentHistory = $this->get('session')->get('departmentHistory');
	    
    	// Get the product
    	$product = $productService->getProduct($id, 'en', 'GBP');
    	
    	// Get the delivery options
   		$delivery = $basketService->getDeliveryDetails($product['deliveryBand']);
   		
   		// Get the product listing settings
    	$productListingSettings = $this->get('session')->get('productListingSettings');
    	
    	// Get the department listing settings
    	$lastUrl = $departmentHistory[0];
    	$departmentListings = $this->get('session')->get('departmentListings');
    	if (isset($departmentListings[$lastUrl]))
    	{
    		$departmentListing = $departmentListings[$lastUrl];
    	} else {
	    	$departmentListing = $departmentListings['index'];
    	}
    	
    	// Get the back url
    	$backUrl = $systemService->getLastDepartmentUrl();
    	if (!$backUrl)
    	{
	    	$backUrl = $this->generateUrl('page_request', array('url' => $product['listingUrl']));
    	}

    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:index.html.twig', array('backUrl' => $backUrl, 'product' => $product, 'delivery' => $delivery, 'productListingSettings' => $productListingSettings, 'departmentListing' => $departmentListing));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Product search page
	public function productSearchAction($search)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Check if the page is being indexed by a search engine
	    $noAjax = (isset($_GET['_escaped_fragment_'])?1:0);
	    
	    // Tidy up the search
	    $search = str_replace('-', ' ', $search);
	    
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:productSearch.html.twig', array('noAjax' => $noAjax, 'search' => $search));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Product test page
	public function testAction(Request $request)
    {
    	/*$productCode = $request->request->get('productCode');
    	echo '<form method="post" action="'.$this->get('router')->generate('products_test').'"><p>Enter a product code, department, brand or brand department.</p><input type="text" name="productCode" value="'.$productCode.'" /><input type="submit" value="Submit" /></form>';
    	if ($productCode != '')
    	{
		   	$curl = curl_init('https://www.google.co.uk/search?tbm=shop&hl=en&q='.$productCode);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$productSearchData = curl_exec($curl);
			$productSearchData = str_replace("\r", "", $productSearchData);
			$productSearchData = str_replace("\n", "", $productSearchData);
			$productSearchData = str_replace("\t", "", $productSearchData);
			$productSearchData = preg_replace("/[\s]+/s", " ", $productSearchData);
	    	$productSearchData = str_replace('> <', '><', $productSearchData);
		    $catalogueLink = substr($productSearchData, strpos($productSearchData, '<div class="pslimain"><h3 class="r"><a href="') + strlen('<div class="pslimain"><h3 class="r"><a href="'));
		    $catalogueLink = substr($catalogueLink, 0, strpos($catalogueLink, '"'));
		    $catalogueLink = html_entity_decode($catalogueLink);
		    echo '<p>Found the link <a href="'.$catalogueLink.'">'.$catalogueLink.'</a> for the Google Shopping page.</p>';
		    $curl = curl_init($catalogueLink);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$productSearchData = curl_exec($curl);
			$productSearchData = str_replace("\r", "", $productSearchData);
			$productSearchData = str_replace("\n", "", $productSearchData);
			$productSearchData = str_replace("\t", "", $productSearchData);
			$productSearchData = preg_replace("/[\s]+/s", " ", $productSearchData);
	    	$productSearchData = str_replace('> <', '><', $productSearchData);
	    	$productDescription = substr($productSearchData, strpos($productSearchData, '<div class="product-desc">') + strlen('<div class="product-desc">'));
		    $productDescription = substr($productDescription, 0, strpos($productDescription, '</div>'));
		    $productDescription = html_entity_decode($productDescription);
		    echo '<p>The following general description was found for <strong>'.$productCode.'</strong>.</p>';
		    echo '<hr />';
		    echo '<p>'.$productDescription.'</p>';
		    echo '<hr />';
		}*/
	    
	    $response = new Response('<p><strong>Completed!</strong>');
	    //$response->headers->set('Content-Type', 'text/plain');
	    //$response->sendHeaders();
	    	        	    	    	   		    	
        return $response;
    }
	
	// Get product count
    public function getProductListingCountAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {			
		// Collect data
		$departmentId = $department['id'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
   		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the product count
    	$productCount = $productService->getProductListingCount($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	$productCountTitle = 'No Products Found';    	
		if (($productCount > 1) || ($productCount < 1))
		{
			if ($productCount < 1)
			{
				$productCountTitle = 'No Products Found';
			} else {
				$productCountTitle = 'Found '.$productCount.' Products';
			}
		} else {
			$productCountTitle = 'Found 1 Product';
		}
    	
    	// Create response    	    	    	   		    
    	$response = new Response($productCountTitle);
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
	
	// Get product count
    public function ajaxGetProductListingCountAction(Request $request)
    {	
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$brands = $request->query->get('brands');
		$group = $request->query->get('group');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$locale = 'en';
		$currencyCode = 'GBP';
   		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the product count
    	$productCount = $productService->getProductListingCount($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = new Response(htmlspecialchars(json_encode(array('response' => 'success', 'productCount' => $productCount)), ENT_NOQUOTES));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get product listing pagination
    public function getProductListingPaginationAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {	
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Collect data
		$departmentId = $department['id'];
		$sort = $productListingSettings['sort'];
		$order = $productListingSettings['order'];
		$page = $departmentListing['page'];
		$maxResults = $productListingSettings['maxResults'];
		$brandId = $departmentListing['brandId'];
		$brand = $departmentListing['brand'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$previousPage = $page - 1;
		$nextPage = $page + 1;
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the product pagingation
    	$productPagination = $productService->getProductListingPagination($departmentId, $maxResults, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListingPagination.html.twig', array('noAjax' => 1, 'url' => $url, 'brandId' => $brandId, 'brand' => $brand, 'group' => $group, 'page' => $page, 'maxResults' => $maxResults, 'productPagination' => $productPagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get product listing pagination
    public function ajaxGetProductListingPaginationAction(Request $request)
    {	
		// Get the product listing settings
		$productListingSettings = $this->get('session')->get('productListingSettings');
		
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$brandId = $request->query->get('brandId');
		$brand = '';
		$group = $request->query->get('group');
		$departmentId = $request->query->get('departmentId');
		$page = $request->query->get('page');
		$maxResults = $request->query->get('maxResults');
		$brands = $request->query->get('brands');
		$departments = $request->query->get('departments');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$previousPage = $page - 1;
		$nextPage = $page + 1;
		$locale = 'en';
		$currencyCode = 'GBP';
		
		// Get the brand
		if ($brandId > 0)
		{
    		$brandRoutingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $brandId, 'objectType' => 'brand', 'locale' => $locale));
    		if ($brandRoutingObject)
    		{
	    		$brand = $brandRoutingObject->getUrl();
    		}
    	}
   		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the product pagingation
    	$productPagination = $productService->getProductListingPagination($departmentId, $maxResults, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListingPagination.html.twig', array('noAjax' => 0, 'url' => $url, 'brandId' => $brandId, 'brand' => $brand, 'group' => $group, 'page' => $page, 'maxResults' => $maxResults, 'productPagination' => $productPagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
	
	// Get a product listing
	public function getProductListingAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Collect data
		$departmentId = $department['id'];
		$sort = $productListingSettings['sort'];
		$order = $productListingSettings['order'];
		$page = $departmentListing['page'];
		$maxResults = $productListingSettings['maxResults'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
		
    	// Get the products
    	$products = $productService->getProductListing($departmentId, $sort, $order, $page, $maxResults, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListing.html.twig', array('noAjax' => 1, 'url' => $url, 'products' => $products, 'group' => $group));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
	
	// Get a product listing
	public function ajaxGetProductListingAction(Request $request)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	$systemService = $this->get('web_illumination_admin.system_service');
    	
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$sortOrder = $request->query->get('sortOrder');
		$sortOrderObject = explode(':', $sortOrder);
		$sort = $sortOrderObject[0];
		$order = $sortOrderObject[1];
		$maxResults = $request->query->get('maxResults');
		$page = $request->query->get('page');
		$group = $request->query->get('group');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$brands = $request->query->get('brands');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$locale = 'en';
		$currencyCode = 'GBP';
		
		// Update product listing settings
		$systemService->updateProductListingSettings($sortOrder, $sort, $order, $maxResults);
		
		// Update the department listings
		$systemService->updateDepartmentListing($url, $page, $group, '', 0, $priceFrom, $priceTo, $brands, $options, $features);
		
    	// Get the products
    	$products = $productService->getProductListing($departmentId, $sort, $order, $page, $maxResults, $brands, $group, false, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListing.html.twig', array('noAjax' => 0, 'url' => $url, 'products' => $products, 'group' => $group));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get a product price
	public function ajaxGetProductPriceAction(Request $request)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Get the product listing settings
		$productListingSettings = $this->get('session')->get('productListingSettings');
		
		// Get submitted data
		$productId = $request->query->get('productId');
		$selectedOptions = $request->query->get('selectedOptions');
		
		// Get the product
		$product = $productService->getProduct($productId, 'en', 'GBP');
		
		// Setup the price
		$price = array();
		
		// Get the price
		$price = $productService->getPrice($productId, $selectedOptions);
		
		// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductPrice.html.twig', array('noAjax' => 0, 'price' => $price, 'product' => $product));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get a product search
	public function getProductSearchAction($search)
    {
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the product
    	$products = $productService->getProductSearch($search, 'en', 'GBP');
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductSearch.html.twig', array('noAjax' => 1, 'products' => $products, 'search' => $search));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get a product search
	public function ajaxGetProductSearchAction(Request $request)
    {
		// Get submitted data
		$search = $request->query->get('search');
		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the product
    	$products = $productService->getProductSearch($search, 'en', 'GBP');
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductSearch.html.twig', array('noAjax' => 0, 'products' => $products, 'search' => $search));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing brand filter
	public function getProductListingBrandFilterAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
		// Collect data
		$departmentId = $department['id'];
		$selectedBrands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the brands
    	$brands = $productService->getProductListingBrandFilter($departmentId, $selectedBrands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListingBrandFilter.html.twig', array('noAjax' => 1, 'brands' => $brands));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing brand filter
	public function ajaxGetProductListingBrandFilterAction(Request $request)
    {
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$selectedBrands = $request->query->get('brands');
		$group = $request->query->get('group');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$locale = 'en';
		$currencyCode = 'GBP';
		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the brands
    	$brands = $productService->getProductListingBrandFilter($departmentId, $selectedBrands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListingBrandFilter.html.twig', array('noAjax' => 0, 'brands' => $brands));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing department filter
	public function getProductListingDepartmentFilterAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {		
		// Get the services
    	$systemService = $this->get('web_illumination_admin.system_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
		// Collect data
		$departmentId = $department['id'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the departments
    	$departments = $productService->getProductListingDepartmentFilter($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Update the department URLs
    	foreach ($departments as $key => $department)
    	{
	    	$departments[$key]['url'] = $systemService->getDepartmentUrl($department['url'], $url, $departmentBrand, $departmentGroup);
    	}
    	   		    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListingDepartmentFilter.html.twig', array('noAjax' => 1, 'departments' => $departments));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing department filter
	public function ajaxGetProductListingDepartmentFilterAction(Request $request)
    {
    	// Get the services
    	$systemService = $this->get('web_illumination_admin.system_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$brands = $request->query->get('brands');
		$group = $request->query->get('group');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$locale = 'en';
		$currencyCode = 'GBP';
		
		// Check if we are on a brand department page
		$departmentBrandName = '';
	    if ($departmentBrand)
	    {
	    	$departmentBrandId = 0;
			$brandRoutingObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('url' => $departmentBrand, 'locale' => 'en', 'objectType' => 'brand'));
			if ($brandRoutingObject)
			{
    			$departmentBrandId = $brandRoutingObject->getObjectId();
			}
			$brandDescriptionObject = false;
			if ($departmentBrandId > 0)
			{
    			$brandDescriptionObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $departmentBrandId));
			}
			if ($brandDescriptionObject)
			{
    			$departmentBrandName = $brandDescriptionObject->getBrand();
			}
		}
    	
    	// Get the departments
    	$departments = $productService->getProductListingDepartmentFilter($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Update the department URLs
    	foreach ($departments as $key => $department)
    	{
    		if ($departmentBrandName)
    		{
	    		$departments[$key]['department'] = $departmentBrandName.' '.$department['department'];
	    	}
	    	$departments[$key]['url'] = $systemService->getDepartmentUrl($department['url'], $url, $departmentBrand, $departmentGroup);
    	}
    	   		    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListingDepartmentFilter.html.twig', array('noAjax' => 0, 'departments' => $departments));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing price filter
	public function getProductListingPriceFilterAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Collect data
		$departmentId = $department['id'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$features = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the prices
    	$prices = $productService->getProductListingPriceFilter($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListingPriceFilter.html.twig', array('noAjax' => 1, 'prices' => $prices));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing price filter
	public function ajaxGetProductListingPriceFilterAction(Request $request)
    {
	    // Get the services
    	$productService = $this->get('web_illumination_admin.product_service');

		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$brands = $request->query->get('brands');
		$group = $request->query->get('group');
		$options = $request->query->get('options');
		$features = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the prices
    	$prices = $productService->getProductListingPriceFilter($departmentId, $brands, $group, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListingPriceFilter.html.twig', array('noAjax' => 0, 'prices' => $prices));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing feature filter
	public function getProductListingFeatureFilterAction($url, $departmentBrand, $departmentGroup, $department, $productListingSettings, $departmentListing)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Collect data
		$departmentId = $department['id'];
		$brands = $departmentListing['brands'];
		$group = $departmentListing['group'];
		$options = $departmentListing['options'];
		$selectedFeatures = $departmentListing['features'];
		$priceFrom = $departmentListing['priceFrom'];
		$priceTo = $departmentListing['priceTo'];
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the features
    	$featureGroups = $productService->getProductListingFeatureFilter($departmentId, $brands, $group, $options, $selectedFeatures, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:getProductListingFeatureFilter.html.twig', array('noAjax' => 1, 'featureGroups' => $featureGroups));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
    
    // Get the product listing feature filter
	public function ajaxGetProductListingFeatureFilterAction(Request $request)
    {
		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
		
		// Get submitted data
		$url = $request->query->get('url');
		$departmentBrand = $request->query->get('departmentBrand');
		$departmentGroup = $request->query->get('departmentGroup');
		$departmentId = $request->query->get('departmentId');
		$brands = $request->query->get('brands');
		$group = $request->query->get('group');
		$options = $request->query->get('options');
		$selectedFeatures = $request->query->get('features');
		$priceFrom = $request->query->get('priceFrom');
		$priceTo = $request->query->get('priceTo');
		$locale = 'en';
		$currencyCode = 'GBP';
    	
    	// Get the features
    	$featureGroups = $productService->getProductListingFeatureFilter($departmentId, $brands, $group, $options, $selectedFeatures, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Create response    	    	    	   		    
    	$response = $this->render('WebIlluminationShopBundle:Products:ajaxGetProductListingFeatureFilter.html.twig', array('noAjax' => 0, 'featureGroups' => $featureGroups));
		$response->headers->set('Connection', 'Keep-Alive');
		return $response;
    }
}