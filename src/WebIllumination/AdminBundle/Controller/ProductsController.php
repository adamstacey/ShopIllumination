<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Product;
use WebIllumination\AdminBundle\Entity\ProductDescription;
use WebIllumination\AdminBundle\Entity\ProductPrice;
use WebIllumination\AdminBundle\Entity\ProductToDepartment;
use WebIllumination\AdminBundle\Entity\ProductOption;
use WebIllumination\AdminBundle\Entity\ProductToOption;
use WebIllumination\AdminBundle\Entity\ProductFeature;
use WebIllumination\AdminBundle\Entity\ProductToFeature;
use WebIllumination\AdminBundle\Entity\ProductLink;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\Image;

class ProductsController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		$brandService = $this->get('web_illumination_admin.brand_service');
		$departmentService = $this->get('web_illumination_admin.department_service');
		
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Get the filters session
    	$filters = $this->get('session')->get('filters');
    	
    	// Get the brands for the filters
    	$brands = apc_fetch('kitchen_appliance_centre_full_brand_list');
    	if (!$brands)
    	{
    		// Get a list of brands
    		$brands = $brandService->getFullBrandList();
    		apc_store('kitchen_appliance_centre_full_brand_list', $brands);
    	}
    	
    	// Get the departments for the filters
    	$departments = apc_fetch('kitchen_appliance_centre_full_department_list');
    	if (!$departments)
    	{
    		// Get a list of departments
    		$departments = $departmentService->getFullDepartmentList();
    		apc_store('kitchen_appliance_centre_full_department_list', $departments);
    	}
    	
    	// Setup the data array
    	$data = array('brands' => $brands, 'departments' => $departments);
    	    	
        return $this->render('WebIlluminationAdminBundle:Products:index.html.twig', array('settings' => $settings['admin']['products'], 'filters' => $filters['admin']['products'], 'data' => $data));
    }
    
    // Rebuild product headers
    public function rebuildProductHeadersAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $productService = $this->get('web_illumination_admin.product_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
		// Get the entity manager
   		$em = $this->getDoctrine()->getManager();
    	
    	// Get the products
    	$products = $productService->getAllProducts('en', 'GBP');
    	
    	// Get product count
    	$productCount = 0;
    	
    	// Rebuild the headers
    	foreach ($products as $product)
    	{
    		// Limit
    		$productCount++;
    		
    		if ($productCount >= 570)
    		{
    			error_log('Rebuilding Header: '.$productCount);
	    		// Get the product description
	    		$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $product->getProductId()));
	    		
	    		// Generate the seo data
				$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\BrandDescription')->findOneBy(array('brandId' => $product->getBrandId()));
				$departmentGroups = explode('^', $product->getDepartmentIds());
				$departments = explode('|', $departmentGroups[0]);
				if (sizeof($departments) > 1)
				{
					$departmentId = $departments[(sizeof($departments) - 2)];
				} else {
					$departmentId = 0;
				}
				$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentId));
				$header = $product->getProduct();
				$pageTitle = $product->getProduct().' ('.$product->getProductCode().')';
				if ($departmentDescriptionObject)
				{
					$pageTitle .= ' - '.$departmentDescriptionObject->getName();
				}
				if ($brandDescriptionObject)
				{
					$pageTitle .= ' - '.$brandDescriptionObject->getBrand();
					$header = $brandDescriptionObject->getBrand().' - '.$header;
				}
				
				// Update the product description
				$productDescriptionObject->setHeader($header);
				$productDescriptionObject->setPageTitle($pageTitle);
				$em->persist($productDescriptionObject);
	    		$em->flush();
	    		
	    		// Update the product index
				$product->setHeader($header);
				$em->persist($product);
	    		$em->flush();
    		}
    	}
   		error_log('Cleared APC Cache!');
   		apc_clear_cache();
    	apc_clear_cache('opcode');
	    apc_clear_cache('user');
   		
        // Set success message
		$this->get('session')->getFlashBag()->add('success', 'The headers have been rebuilt.');
        
        // Forward to the product
		return $this->redirect($this->get('router')->generate('admin_products'));
    }
    
    // Get the listing
	public function ajaxGetListingAction(Request $request)
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
	
		// Get the settings
		$sessionSettings = $this->get('session')->get('settings');
		$settings = $sessionSettings['admin']['products'];
		
		// Get the filters
		$sessionFilters = $this->get('session')->get('filters');
		$filters = $sessionFilters['admin']['products'];
		
		// Get submitted data
		$status = $request->request->get('status');
		$availableForPurchase = $request->request->get('availableForPurchase');
		$hidePrice = $request->request->get('hidePrice');
		$showPriceOutOfHours = $request->request->get('showPriceOutOfHours');
		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
		$featureComparison = $request->request->get('featureComparison');
		$downloadable = $request->request->get('downloadable');
		$specialOffer = $request->request->get('specialOffer');
		$recommended = $request->request->get('recommended');
		$accessory = $request->request->get('accessory');
		$new = $request->request->get('new');
		$productCode = $request->request->get('productCode');
		$name = $request->request->get('name');
		$description = $request->request->get('description');
		$costPriceFrom = $request->request->get('costPriceFrom');
		$costPriceTo = $request->request->get('costPriceTo');
		$recommendedRetailPriceFrom = $request->request->get('recommendedRetailPriceFrom');
		$recommendedRetailPriceTo = $request->request->get('recommendedRetailPriceTo');
		$listPriceFrom = $request->request->get('listPriceFrom');
		$listPriceTo = $request->request->get('listPriceTo');
		$discountFrom = $request->request->get('discountFrom');
		$discountTo = $request->request->get('discountTo');
		$brand = $request->request->get('brand');
		$department = $request->request->get('department');
		$sortOrder = ($request->request->get('sortOrder')?$request->request->get('sortOrder'):$settings['listingSortOrder']);
		$sortOrderObject = explode(':', $sortOrder);
		$sort = ($sortOrderObject[0]?$sortOrderObject[0]:$settings['listingSort']);
		$order = ($sortOrderObject[1]?$sortOrderObject[1]:$settings['listingOrder']);
		$page = ($request->request->get('page')?$request->request->get('page'):1);
		$maxResults = ($request->request->get('maxResults')?$request->request->get('maxResults'):$settings['listingMaxResults']);
		
		// Update settings
		$settings['listingSortOrder'] = $sortOrder;
		$settings['listingSort'] = $sort;
		$settings['listingOrder'] = $order;
		$settings['listingMaxResults'] = $maxResults;
		$sessionSettings['admin']['products'] = $settings;
		$this->get('session')->set('settings', $sessionSettings);
		
		// Update filters
		$filters['status'] = $status;
		$filters['availableForPurchase'] = $availableForPurchase;
		$filters['hidePrice'] = $hidePrice;
		$filters['showPriceOutOfHours'] = $showPriceOutOfHours;
		$filters['membershipCardDiscountAvailable'] = $membershipCardDiscountAvailable;
		$filters['featureComparison'] = $featureComparison;
		$filters['downloadable'] = $downloadable;
		$filters['specialOffer'] = $specialOffer;
		$filters['recommended'] = $recommended;
		$filters['accessory'] = $accessory;
		$filters['new'] = $new;
		$filters['productCode'] = $productCode;
		$filters['name'] = $name;
		$filters['description'] = $description;
		$filters['costPriceFrom'] = $costPriceFrom;
		$filters['costPriceTo'] = $costPriceTo;
		$filters['recommendedRetailPriceFrom'] = $recommendedRetailPriceFrom;
		$filters['recommendedRetailPriceTo'] = $recommendedRetailPriceTo;
		$filters['listPriceFrom'] = $listPriceFrom;
		$filters['listPriceTo'] = $listPriceTo;
		$filters['discountFrom'] = $discountFrom;
		$filters['discountTo'] = $discountTo;
		$filters['brand'] = $brand;
		$filters['department'] = $department;
		$sessionFilters['admin']['products'] = $filters;
		$this->get('session')->set('filters', $sessionFilters);
		
   		// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the items
    	$items = $productService->getAdminListing($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, false, false, $sort, $order, $page, $maxResults);
    	   		    	
        return $this->render('WebIlluminationAdminBundle:Products:ajaxGetListing.html.twig', array('settings' => $settings, 'filters' => $filters, 'items' => $items));
    }
            
    // Get listing count
    public function ajaxGetListingCountAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$status = $request->request->get('status');
    		$availableForPurchase = $request->request->get('availableForPurchase');
    		$hidePrice = $request->request->get('hidePrice');
    		$showPriceOutOfHours = $request->request->get('showPriceOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$featureComparison = $request->request->get('featureComparison');
    		$downloadable = $request->request->get('downloadable');
    		$specialOffer = $request->request->get('specialOffer');
    		$recommended = $request->request->get('recommended');
    		$accessory = $request->request->get('accessory');
    		$new = $request->request->get('new');
    		$productCode = $request->request->get('productCode');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
    		$costPriceFrom = $request->request->get('costPriceFrom');
    		$costPriceTo = $request->request->get('costPriceTo');
    		$recommendedRetailPriceFrom = $request->request->get('recommendedRetailPriceFrom');
    		$recommendedRetailPriceTo = $request->request->get('recommendedRetailPriceTo');
    		$listPriceFrom = $request->request->get('listPriceFrom');
    		$listPriceTo = $request->request->get('listPriceTo');
    		$discountFrom = $request->request->get('discountFrom');
    		$discountTo = $request->request->get('discountTo');
    		$brand = $request->request->get('brand');
    		$department = $request->request->get('department');
	   		
	   		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
	    	// Get the listing count
	    	$listingCount = $productService->getAdminListingCount($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, false, false);
	    		        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get listing pagination
    public function ajaxGetListingPaginationAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$systemService = $this->get('web_illumination_admin.system_service');
	    	
	    	// Initialise the session
	    	$systemService->initialiseSettingsSession();
	    	
    		// Get the settings
    		$sessionSettings = $this->get('session')->get('settings');
    		$settings = $sessionSettings['admin']['products'];
    		
    		// Get submitted data
    		$status = $request->request->get('status');
    		$availableForPurchase = $request->request->get('availableForPurchase');
    		$hidePrice = $request->request->get('hidePrice');
    		$showPriceOutOfHours = $request->request->get('showPriceOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$featureComparison = $request->request->get('featureComparison');
    		$downloadable = $request->request->get('downloadable');
    		$specialOffer = $request->request->get('specialOffer');
    		$recommended = $request->request->get('recommended');
    		$accessory = $request->request->get('accessory');
    		$new = $request->request->get('new');
    		$productCode = $request->request->get('productCode');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
    		$costPriceFrom = $request->request->get('costPriceFrom');
    		$costPriceTo = $request->request->get('costPriceTo');
    		$recommendedRetailPriceFrom = $request->request->get('recommendedRetailPriceFrom');
    		$recommendedRetailPriceTo = $request->request->get('recommendedRetailPriceTo');
    		$listPriceFrom = $request->request->get('listPriceFrom');
    		$listPriceTo = $request->request->get('listPriceTo');
    		$discountFrom = $request->request->get('discountFrom');
    		$discountTo = $request->request->get('discountTo');
    		$brand = $request->request->get('brand');
    		$department = $request->request->get('department');
    		$page = ($request->request->get('page')?$request->request->get('page'):1);
    		$maxResults = ($request->request->get('maxResults')?$request->request->get('maxResults'):$settings['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
	   		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
	    	// Get the listing pagingation
	    	$pagination = $productService->getAdminListingPagination($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, false, false, $maxResults);
	        	        
	       return $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
    	}
    	
    	throw new AccessDeniedException();
    }
	
	// Update via Ajax
    public function ajaxUpdateAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   			
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$status = $request->query->get('status');
    		
    		// Get the product object
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		if (!$productObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Update the product
    		$productObject->setStatus($status);
    		$em->persist($productObject);
    		$em->flush();
    		
    		// Build the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
	    
    // Delete
    public function ajaxDeleteAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   			
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
	        
	        // Delete the product
			$productDeleted = $productService->deleteProduct($id);
			if ($productDeleted)
			{
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
			
				return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'error')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Add
    public function addAction(Request $request)
    {   		
   		// Get the services
   		$systemService = $this->get('web_illumination_admin.system_service');
   		$seoService = $this->get('web_illumination_admin.seo_service');
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	$departmentService = $this->get('web_illumination_admin.department_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Add a product
    	if ($request->getMethod() == 'POST')
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$brandId = $request->request->get('brand-id');
    		$departmentId = $request->request->get('department-id');
    		$prefix = trim($request->request->get('prefix'));
    		$tagline = trim($request->request->get('tagline'));
    		$productCode = strtoupper(trim($request->request->get('product-code')));
    		$deliveryBand = $request->request->get('delivery-band');
    		$description = $request->request->get('description');
    		
    		// Add the product object
    		$productObject = new Product();
    		$productObject->setProductGroupId(0);
    		$productObject->setStatus('h');
    		$productObject->setChecked(1);
    		$productObject->setAvailableForPurchase(1);
    		$productObject->setBrandId($brandId);
    		$productObject->setProductCode($productCode);
    		$productObject->setProductGroupCode('');
    		$productObject->setAlternativeProductCodes(implode(', ', $seoService->generateAlternativeProductCodes($productCode)));
    		$productObject->setMpn('');
    		$productObject->setEan('');
    		$productObject->setUpc('');
    		$productObject->setJan('');
    		$productObject->setIsbn('');
    		$productObject->setDeliveryBand($deliveryBand);
    		$productObject->setInheritedDeliveryBand($deliveryBand);
    		$productObject->setDeliveryCost(0.0000);
    		$productObject->setWeight(0.00);
    		$productObject->setLength(0.00);
    		$productObject->setWidth(0.00);
    		$productObject->setHeight(0.00);
    		$productObject->setHidePrice(0);
    		$productObject->setShowPriceOutOfHours(0);
    		$productObject->setFeatureComparison(0);
    		$productObject->setDownloadable(0);
    		$productObject->setSpecialOffer(0);
    		$productObject->setRecommended(0);
    		$productObject->setAccessory(0);
    		$productObject->setNew(0);
    		$productObject->setSampleRequest(0);
    		$productObject->setMembershipCardDiscountAvailable(1);
    		$productObject->setMaximumMembershipCardDiscount(0.0000);
    		$em->persist($productObject);
    		$em->flush();
			
			// Generate the seo data
			$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\BrandDescription')->findOneBy(array('brandId' => $brandId));
			$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentId));
			$pageTitle = $productCode;
			$header = $productCode;
			$metaKeywords = $productCode;
			if ($brandDescriptionObject)
			{
				$pageTitle = $brandDescriptionObject->getBrand().' '.$pageTitle;
				$header = $brandDescriptionObject->getBrand().' '.$header;
				$metaKeywords .= ' '.$brandDescriptionObject->getBrand();
			}
			if ($prefix)
			{
				$pageTitle .= ' '.$prefix;
				$header .= ' '.$prefix;
				$metaKeywords .= ' '.$prefix;
			}
			if ($tagline)
			{
				$pageTitle .= ' '.$tagline;
				$header .= ' '.$tagline;
				$metaKeywords .= ' '.$tagline;
			}
			if ($departmentDescriptionObject)
			{
				$pageTitle .= ' '.$departmentDescriptionObject->getName();
				$header .= ' '.$departmentDescriptionObject->getName();
				$metaKeywords .= ' '.$departmentDescriptionObject->getName();
			}
			$metaKeywords = $seoService->generateKeywords($metaKeywords);
			$url = $seoService->createUrl($pageTitle, '');
			$shortDescription = $seoService->shortenContent($description, 160);
			
			// Add the product description object
			$productDescriptionObject = new ProductDescription();
			$productDescriptionObject->setProductId($productObject->getId());
			$productDescriptionObject->setLocale('en');
			$productDescriptionObject->setProduct('');
			$productDescriptionObject->setDescription($description);
			$productDescriptionObject->setPrefix($prefix);
			$productDescriptionObject->setTagline($tagline);
			$productDescriptionObject->setShortDescription($shortDescription);
			$productDescriptionObject->setPageTitle($pageTitle);
			$productDescriptionObject->setHeader($header);
			$productDescriptionObject->setMetaDescription($shortDescription);
			$productDescriptionObject->setMetaKeywords($metaKeywords);
			$productDescriptionObject->setSearchWords($metaKeywords);
			$em->persist($productDescriptionObject);
			$em->flush();
			
			// Add the product to department
			$productToDepartmentObject = new ProductToDepartment();
			$productToDepartmentObject->setProductId($productObject->getId());
			$productToDepartmentObject->setDepartmentId($departmentId);
			$productToDepartmentObject->setDisplayOrder(1);
			$em->persist($productToDepartmentObject);
			
			// Add the product price object
			$productPriceObject = new ProductPrice();
			$productPriceObject->setSupplierId(0);
			$productPriceObject->setProductId($productObject->getId());
			$productPriceObject->setCostPrice(0.0000);
			$productPriceObject->setRecommendedRetailPrice(0.0000);
			$productPriceObject->setListPrice(0.0000);
			$productPriceObject->setCurrencyCode('GBP');
			$productPriceObject->setDisplayOrder(1);
			$em->persist($productPriceObject);
			
			// Add the image object
			$imageObject = new Image();
			$imageObject->setLocale('en');
			$imageObject->setTitle($productDescriptionObject->getHeader());
			$imageObject->setAlignment('');
			$imageObject->setDescription('');
			$imageObject->setLink('');
			$imageObject->setObjectType('product');
			$imageObject->setImageType('product');
			$imageObject->setObjectId($productObject->getId());
			$imageObject->setDisplayOrder(1);
			$imageObject->setOriginalPath('/uploads/images/product/product/no-image-large.jpg');
			$imageObject->setThumbnailPath('/uploads/images/product/product/no-image-thumbnail.jpg');
			$imageObject->setMediumPath('/uploads/images/product/product/no-image-medium.jpg');
			$imageObject->setLargePath('/uploads/images/product/product/no-image-large.jpg');
			$em->persist($imageObject);
			
			// Add the routing
			$routingObject = new Routing();
			$routingObject->setObjectId($productObject->getId());
			$routingObject->setObjectType('product');
			$routingObject->setLocale('en');
			$routingObject->setUrl($url);
			$em->persist($routingObject);
			
			// Flush the database
			$em->flush();
						
			// Build the product index
			$productService->rebuildProduct($productObject->getId());
			
			if ($deliveryBand < 1)
			{
				$productService->updateProductDeliveryBand($productObject->getId(), 'en');
			}
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
			
			// Set success message
		    $this->get('session')->getFlashBag()->add('success', 'The product "'.$pageTitle.'" has been added.');
		    
		    // Forward to the product
		    return $this->redirect($this->get('router')->generate('admin_products_update', array('id' => $productObject->getId())));
    	}
    	
    	// Get the brands
    	$brands = apc_fetch('kitchen_appliance_centre_full_brand_list');
    	if (!$brands)
    	{
    		// Get a list of brands
    		$brands = $brandService->getFullBrandList();
    		apc_store('kitchen_appliance_centre_full_brand_list', $brands);
    	}
    	
    	// Get the departments
    	$departments = apc_fetch('kitchen_appliance_centre_full_department_list');
    	if (!$departments)
    	{
    		// Get a list of departments
    		$departments = $departmentService->getFullDepartmentList();
    		apc_store('kitchen_appliance_centre_full_department_list', $departments);
    	}
    	
    	// Setup the data array
    	$data = array('brands' => $brands, 'departments' => $departments);
    	    	
    	return $this->render('WebIlluminationAdminBundle:Products:add.html.twig', array('settings' => $settings['admin']['products'], 'data' => $data));
    }
    
    // Price import
    public function priceImportAction(Request $request)
    {   		
   		// Get the services
   		$systemService = $this->get('web_illumination_admin.system_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get default data
    	$action = 'check';
    	$header = 0;
    	
    	// Setup the data array
    	$data = array();
    	$data['action'] = 'check';
    	$data['header'] = 0;
    	$data['resetRecommendedRetailPrice'] = 1;
    	$data['importFile'] = '';
    	
    	// Update the prices
    	if ($request->getMethod() == 'POST')
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$action = $request->request->get('action');
    		$header = $request->request->get('header');
    		$resetRecommendedRetailPrice = $request->request->get('reset-recommended-retail-price');
    		$importFileName = $request->request->get('import-file');
    		$importFile = $this->getTemporaryUploadRootDir().'/'.$importFileName;
    		$importFileExtension = $this->getExtension($importFile);
    		$delimiter = ($importFileExtension == 'csv'?',':"\t");
    		
    		// Read file
    		$importFileHandle = fopen($importFile, 'r');
    		$priceIssuesFound = array();
    		$noUpdatesRequired = array();
    		$pricesUpdated = array();
    		$totalImports = 0;
		    while (($fileLine = fgets($importFileHandle, filesize($importFile))) !== false)
		    {
	    		$lineObject = explode($delimiter, $fileLine);
	    		if (sizeof($lineObject) == 2)
	    		{
		    		$importContent = array();
		    		$importContent['productCode'] = $lineObject[0];
		    		$importContent['newPrice'] = $lineObject[1] * 1;
		    		if ($importContent['productCode'] && ($importContent['newPrice'] > 0))
		    		{
		    			$totalImports++;
			    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->findOneBy(array('productCode' => $importContent['productCode']));
			    		if ($productObject)
			    		{
				    		$importContent['productId'] = $productObject->getId();
				    		$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $importContent['productId']));
				    		$productPriceObject = $em->getRepository('KAC\SiteBundle\Entity\ProductPrice')->findOneBy(array('productId' => $importContent['productId'], 'displayOrder' => 1), array('listPrice' => 'ASC'));
				    		if ($productIndexObject && $productPriceObject)
				    		{
				    			$importContent['pageTitle'] = $productIndexObject->getPageTitle();
					    		$importContent['existingPrice'] = $productPriceObject->getListPrice() * 1;
					    		if ($importContent['existingPrice'] == $importContent['newPrice'])
					    		{
					    			$noUpdatesRequired[] = $importContent;
					    		} else {
					    			$pricesUpdated[] = $importContent;
					    		}
					    		
					    		// Check if prices need to be updated
					    		if ($action == 'update')
					    		{
					    			$productPriceObject->setListPrice($importContent['newPrice']);
					    			if ($resetRecommendedRetailPrice > 0)
					    			{
						    			$productPriceObject->setRecommendedRetailPrice($importContent['newPrice']);
					    			}
					    			$em->persist($productPriceObject);
					    			$productIndexObject->setListPrice($importContent['newPrice']);
					    			if ($resetRecommendedRetailPrice > 0)
					    			{
						    			$productIndexObject->setRecommendedRetailPrice($importContent['newPrice']);
					    			}
					    			$em->persist($productIndexObject);
					    			
					    			// Flush the database
					    			$em->flush();
					    		}					    		
				    		} else {
					    		$priceIssuesFound[] = $importContent;
				    		}
			    		} else {
					    	$priceIssuesFound[] = $importContent;
				    	}
		    		}
	    		}
			}
			fclose($importFileHandle);
			
			// Update the data array
			if ($action == 'check')
			{
				$action = 'update';
			}
	    	$data['action'] = $action;
	    	$data['header'] = $header;
	    	$data['importFile'] = $importFileName;
	    	$data['totalImports'] = $totalImports;
	    	$data['priceIssuesFound'] = $priceIssuesFound;
	    	$data['noUpdatesRequired'] = $noUpdatesRequired;
	    	$data['pricesUpdated'] = $pricesUpdated;
						
			// Set success message
		    $this->get('session')->getFlashBag()->add('success', 'The prices have been successfully imported.');
    	}
    	    	
    	return $this->render('WebIlluminationAdminBundle:Products:priceImport.html.twig', array('data' => $data));
    }  
    
    // Update
    public function updateAction(Request $request, $id)
    {   		
   		// Get the services
    	$systemService = $this->get('web_illumination_admin.system_service');
    	$googleService = $this->get('web_illumination_admin.google_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the entity manager
    	$em = $this->getDoctrine()->getManager();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Get the brands
    	$brands = apc_fetch('kitchen_appliance_centre_full_brand_list');
    	if (!$brands)
    	{
    		// Get a list of brands
    		$brands = $brandService->getFullBrandList();
    		apc_store('kitchen_appliance_centre_full_brand_list', $brands);
    	}
    	
    	// Get the product option groups
		$productOptionGroupObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductOptionGroup')->findBy(array(), array('productOptionGroup' => 'ASC'));
		
		// Get the product options
		$productOptionObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductOption')->findBy(array(), array('productOption' => 'ASC'));
    	    	
    	// Get the product
    	$product = $productService->getProduct($id, 'en', 'GBP');
    	
    	// Get any products from the Google product search API
		//$productSearch = $googleService->getProductSearchData($product['productCode'], $product['product']);
		$productSearch = array();
		
		// Get the products
    	$products = $productService->getAllProducts();
    	
    	// Get the competitor descriptions
    	//$competitorDescriptions = $googleService->getRankedDescriptions($product['header']);
    	$competitorDescriptions = '';
    	
    	// Setup the data array
    	$data = array('brands' => $brands, 'productOptionGroupObjects' => $productOptionGroupObjects, 'productOptionObjects' => $productOptionObjects, 'product' => $product, 'productSearch' => $productSearch, 'products' => $products, 'competitorDescriptions' => $competitorDescriptions);
    	    	    	
		return $this->render('WebIlluminationAdminBundle:Products:update.html.twig', array('settings' => $settings['admin']['products'], 'data' => $data));
    }
    
    // Update the general section
    public function ajaxUpdateGeneralSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$status = $request->request->get('status');
    		$availableForPurchase = $request->request->get('availableForPurchase');
    		$prefix = trim($request->request->get('prefix'));
    		$tagline = trim($request->request->get('tagline'));
    		$brandId = $request->request->get('brandId');
    		$productCode = trim($request->request->get('productCode'));
    		$deliveryBand = trim($request->request->get('deliveryBand'));
    		$featureComparison = $request->request->get('featureComparison');
    		$downloadable = $request->request->get('downloadable');
    		$specialOffer = $request->request->get('specialOffer');
    		$recommended = $request->request->get('recommended');
    		$accessory = $request->request->get('accessory');
    		$new = $request->request->get('new');
    		
    		// Check for changes for the purposes of resetting the SEO
    		$resetSeo = false;
    		
    		// Get the product objects
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $id));
    		if (!$productObject || !$productDescriptionObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Check if the SEO needs resetting
    		if ($prefix != $productDescriptionObject->getPrefix())
    		{
    			$resetSeo = true;
    		}
    		if ($tagline != $productDescriptionObject->getTagline())
    		{
    			$resetSeo = true;
    		}
    		if ($brandId != $productObject->getBrandId())
    		{
    			$resetSeo = true;
    		}
    		if ($productCode != $productObject->getProductCode())
    		{
    			$resetSeo = true;
    		}
    		
    		// ADS!!! Temporary prevent reset
    		$resetSeo = false;
	   		
	        // Update the product
	        $productObject->setStatus($status);
	        $productObject->setAvailableForPurchase($availableForPurchase);
	        $productObject->setBrandId($brandId);
	        $productObject->setProductCode($productCode);
	        $productObject->setDeliveryBand($deliveryBand);
	        $productObject->setInheritedDeliveryBand($deliveryBand);
	        $productObject->setFeatureComparison($featureComparison);
	        $productObject->setDownloadable($downloadable);
	        $productObject->setSpecialOffer($specialOffer);
	        $productObject->setRecommended($recommended);
	        $productObject->setAccessory($accessory);
	        $productObject->setNew($new);
	        $em->persist($productObject);
			$em->flush();
			
			// Update the product description
	        $productDescriptionObject->setPrefix($prefix);
	        $productDescriptionObject->setTagline($tagline);
	        $em->persist($productDescriptionObject);
			$em->flush();
	        
	        // Refresh the product index
			$productService->rebuildProduct($id);
			
			if ($deliveryBand < 1)
			{
				$productService->updateProductDeliveryBand($id, 'en');
			}
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'resetSeo' => $resetSeo)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update the description section
    public function ajaxUpdateDescriptionSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$seoService = $this->get('web_illumination_admin.seo_service');
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$description = trim($request->request->get('description'));
    		$shortDescription = trim($request->request->get('shortDescription'));
    		if (!$shortDescription)
    		{
		    	// Get short description
    			$shortDescription = $seoService->shortenContent($description, 160);
    		}
    		
    		// Get the product objects
    		$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $id));
    		$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $id));
    		if (!$productDescriptionObject || !$productIndexObject)
    		{
    			throw new AccessDeniedException();
    		}
	   					
			// Update the product description
	        $productDescriptionObject->setDescription($description);
	        $productDescriptionObject->setShortDescription($shortDescription);
	        $em->persist($productDescriptionObject);
			$em->flush();
	        
	        // Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'shortDescription' => $shortDescription)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get short description
    public function ajaxGetShortDescriptionAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
	    	// Get the services
	    	$seoService = $this->get('web_illumination_admin.seo_service');
	    	
	    	// Get submitted data
	    	$description = $request->request->get('description');
	    	
	    	// Get short description
	    	$shortDescription = $seoService->shortenContent($description, 160);
	    	
	    	return new Response($shortDescription);
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get description
    public function ajaxGetDescriptionAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
	    	// Get the services
	    	$seoService = $this->get('web_illumination_admin.seo_service');
	    	
	    	// Get submitted data
	    	$shortDescription = $request->request->get('shortDescription');
	    	
	    	// Get description
	    	$description = $seoService->convertToHtml($shortDescription);
	    	
	    	return new Response($description);
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get the prices
    public function ajaxGetPricesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$productId = $request->query->get('productId');
    		    		
    		// Get the prices
    		$prices = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductPrice')->findBy(array('productId' => $productId), array('displayOrder' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:Products:ajaxGetPrices.html.twig', array('productId' => $productId, 'prices' => $prices));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a price
    public function ajaxAddPriceAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    			    	
	    	return $this->render('WebIlluminationAdminBundle:Products:ajaxAddPrice.html.twig', array('id' => $id, 'productId' => $productId));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a price
    public function ajaxUpdatePriceAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$supplierId = $request->query->get('supplierId');
    		$costPrice = $request->query->get('costPrice');
    		$recommendedRetailPrice = $request->query->get('recommendedRetailPrice');
    		$listPrice = $request->query->get('listPrice');
    		$currencyCode = $request->query->get('currencyCode');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find price
    		$priceObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductPrice')->find($id);
    		if (!$priceObject)
    		{
    			$priceObject = new ProductPrice();
    		}
    		$priceObject->setProductId($productId);
    		$priceObject->setSupplierId($supplierId);
    		$priceObject->setCostPrice($costPrice);
    		$priceObject->setRecommendedRetailPrice($recommendedRetailPrice);
    		$priceObject->setListPrice($listPrice);
    		$priceObject->setCurrencyCode($currencyCode);    		
    		$priceObject->setDisplayOrder($displayOrder);
		    $em->persist($priceObject);
		    $em->flush();
		    		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $priceObject->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a price
    public function ajaxDeletePriceAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find price
    		$price = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductPrice')->find($id);
    		if ($price)
    		{
    			// Get the product id
    			$productId = $price->getProductId();
    			
    			// Remove the price from the database
				$em->remove($price);
				$em->flush();
				
				// Refresh the product index
				$productService->rebuildProduct($productId);
				
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Update price settings section
    public function ajaxUpdatePriceSettingsSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$hidePrice = $request->request->get('hidePrice');
    		$showPriceOutOfHours = $request->request->get('showPriceOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$maximumMembershipCardDiscount = trim($request->request->get('maximumMembershipCardDiscount'));
    		
    		// Get the product objects
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		if (!$productObject)
    		{
    			throw new AccessDeniedException();
    		}
    			   		
	        // Update the product
	        $productObject->setHidePrice($hidePrice);
	        $productObject->setShowPriceOutOfHours($showPriceOutOfHours);
	        $productObject->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
	        $productObject->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
	        $em->persist($productObject);
			$em->flush();
	        
	        // Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get the options
    public function ajaxGetOptionsAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$systemService = $this->get('web_illumination_admin.system_service');
	    	
	    	// Initialise the session
	    	$systemService->initialiseSettingsSession();
    	
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get submitted data
    		$productId = $request->query->get('productId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		    		
    		// Get the options
	    	$options = array();
	    	$productToOptionsObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToOption')->findBy(array('productId' => $productId), array('displayOrder' => 'ASC'));
			foreach ($productToOptionsObject as $productToOptionObject)
			{
				$option = array();
				$productOptionGroupObject = $em->getRepository('KAC\SiteBundle\Entity\ProductOptionGroup')->find($productToOptionObject->getProductOptionGroupId());
				$productOptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductOption')->find($productToOptionObject->getProductOptionId());
				$option['id'] = $productToOptionObject->getId();
				$option['productOptionGroupId'] = $productOptionGroupObject->getId();
				$option['productOptionGroup'] = $productOptionGroupObject->getProductOptionGroup();
				$option['productOptionId'] = $productOptionObject->getId();
				$option['productOption'] = $productOptionObject->getProductOption();
				$option['price'] = $productToOptionObject->getPrice();
				$option['priceType'] = $productToOptionObject->getPriceType();
				$option['priceUse'] = $productToOptionObject->getPriceUse();
				$options[$productOptionGroupObject->getProductOptionGroup()][] = $option;
			}
			
			// Get the product option groups
			$productOptionGroupObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductOptionGroup')->findBy(array(), array('productOptionGroup' => 'ASC'));
			
			// Get the product options
			$productOptionObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductOption')->findBy(array(), array('productOption' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:Products:ajaxGetOptions.html.twig', array('settings' => $settings['admin']['products'], 'productId' => $productId, 'options' => $options, 'productOptionGroupObjects' => $productOptionGroupObjects, 'productOptionObjects' => $productOptionObjects));
		}

    	throw new AccessDeniedException();
    }
    
    // Add an option
    public function ajaxAddOptionGroupAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$displayOrder = $request->query->get('displayOrder');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
			// Get the first product option
			$productOptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductOption')->findOneBy(array('productOptionGroupId' => $id), array('productOption' => 'ASC'));
			if (!$productOptionObject)
			{
				throw new AccessDeniedException();
			}
			
			// Add the new option group
			$productToOptionObject = new ProductToOption();
			$productToOptionObject->setActive(1);
			$productToOptionObject->setProductId($productId);
			$productToOptionObject->setProductOptionGroupId($id);
			$productToOptionObject->setProductOptionId($productOptionObject->getId());
			$productToOptionObject->setPrice(0.0000);
			$productToOptionObject->setPriceType('a');
			$productToOptionObject->setPriceUse('i');
			$productToOptionObject->setDisplayOrder($displayOrder);
			$em->persist($productToOptionObject);
		    $em->flush();
			
	    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete an option group
    public function ajaxDeleteOptionGroupAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find option
    		$options = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToOption')->findBy(array('productOptionGroupId' => $id, 'productId' => $productId));
    		if ($options)
    		{
    			foreach ($options as $optionObject)
    			{
    				if ($optionObject)
    				{
    					// Remove the option from the database
						$em->remove($optionObject);
    				}
    			}
    			
				// Flush the database
				$em->flush();
				
				// Refresh the product index
				$productService->rebuildProduct($productId);
				
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Add an option
    public function ajaxAddOptionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$optionGroupId = $request->query->get('optionGroupId');
    		$productId = $request->query->get('productId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get the product options
			$productOptionObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductOption')->findBy(array('productOptionGroupId' => $optionGroupId), array('productOption' => 'ASC'));
    			    	
	    	return $this->render('WebIlluminationAdminBundle:Products:ajaxAddOption.html.twig', array('id' => $id, 'optionGroupId' => $optionGroupId, 'productId' => $productId, 'productOptionObjects' => $productOptionObjects));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update an option
    public function ajaxUpdateOptionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	    	
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$productOptionGroupId = $request->query->get('productOptionGroupId');
    		$productOptionId = $request->query->get('productOptionId');
    		$productOption = $request->query->get('productOption');
    		$price = $request->query->get('price');
    		$priceType = $request->query->get('priceType');
    		$priceUse = $request->query->get('priceUse');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find product option
    		$productOptionObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductOption')->find($productOptionId);
    		if (!$productOptionObject)
    		{
    			$productOptionObject = new ProductOption();
    			$productOptionObject->setProductOptionGroupId($productOptionGroupId);
    			$productOptionObject->setActive(1);
    			$productOptionObject->setProductOption($productOption);
    			$productOptionObject->setLocale('en');
    			$em->persist($productOptionObject);
			    $em->flush();
			    $productOptionId = $productOptionObject->getId();
    		}
    		
    		// Find option
    		$productToOptionObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToOption')->find($id);
    		if (!$productToOptionObject)
    		{
    			$productToOptionObject = new ProductToOption();
    			$productToOptionObject->setActive(1);
    		}
    		$productToOptionObject->setProductId($productId);
    		$productToOptionObject->setProductOptionGroupId($productOptionGroupId);
    		$productToOptionObject->setProductOptionId($productOptionId);
    		$productToOptionObject->setPrice($price);
    		$productToOptionObject->setPriceType($priceType);
    		$productToOptionObject->setPriceUse($priceUse);    		
    		$productToOptionObject->setDisplayOrder($displayOrder);
		    $em->persist($productToOptionObject);
		    $em->flush();
		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $productToOptionObject->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete an option
    public function ajaxDeleteOptionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		$optionGroupId = $request->query->get('optionGroupId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find option
    		$option = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToOption')->find($id);
    		if ($option)
    		{
    			// Remove the option from the database
				$em->remove($option);
				$em->flush();
								
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex, 'optionGroupId' => $optionGroupId)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }

	// Get the features
    public function ajaxGetFeaturesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$systemService = $this->get('web_illumination_admin.system_service');
	    	
	    	// Initialise the session
	    	$systemService->initialiseSettingsSession();
    	
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get submitted data
    		$productId = $request->query->get('productId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		    		
    		// Get the features
	    	$features = array();
	    	$productToFeaturesObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findBy(array('productId' => $productId), array('displayOrder' => 'ASC'));
			foreach ($productToFeaturesObject as $productToFeatureObject)
			{
				$feature = array();
				$productFeatureGroupObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeatureGroup')->find($productToFeatureObject->getProductFeatureGroupId());
				$productFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->find($productToFeatureObject->getProductFeatureId());
				if ($productFeatureGroupObject && $productFeatureObject)
				{
					$feature['id'] = $productToFeatureObject->getId();
					$feature['productFeatureGroupId'] = $productFeatureGroupObject->getId();
					$feature['productFeatureGroup'] = $productFeatureGroupObject->getProductFeatureGroup();
					$feature['productFeatureId'] = $productFeatureObject->getId();
					$feature['productFeature'] = $productFeatureObject->getProductFeature();
					$features[$productFeatureGroupObject->getProductFeatureGroup()][] = $feature;
				}
			}
			
			// Get the product feature groups
			$productFeatureGroupObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductFeatureGroup')->findBy(array(), array('productFeatureGroup' => 'ASC'));
			
			// Get the product features
			$productFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->findBy(array(), array('productFeature' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:Products:ajaxGetFeatures.html.twig', array('settings' => $settings['admin']['products'], 'productId' => $productId, 'features' => $features, 'productFeatureGroupObjects' => $productFeatureGroupObjects, 'productFeatureObjects' => $productFeatureObjects));
		}

    	throw new AccessDeniedException();
    }
    
    // Add an feature
    public function ajaxAddFeatureGroupAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$displayOrder = $request->query->get('displayOrder');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
			// Get the first product feature
			$productFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->findOneBy(array('productFeatureGroupId' => $id), array('productFeature' => 'ASC'));
			if (!$productFeatureObject)
			{
				throw new AccessDeniedException();
			}
			
			// Add the new feature group
			$productToFeatureObject = new ProductToFeature();
			$productToFeatureObject->setActive(1);
			$productToFeatureObject->setProductId($productId);
			$productToFeatureObject->setProductFeatureGroupId($id);
			$productToFeatureObject->setProductFeatureId($productFeatureObject->getId());
			$productToFeatureObject->setDisplayOrder($displayOrder);
			$em->persist($productToFeatureObject);
		    $em->flush();
			
	    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete an feature group
    public function ajaxDeleteFeatureGroupAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	    	
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find feature
    		$features = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findBy(array('productFeatureGroupId' => $id, 'productId' => $productId));
    		if ($features)
    		{
    			foreach ($features as $featureObject)
    			{
    				if ($featureObject)
    				{
    					// Remove the feature from the database
						$em->remove($featureObject);
    				}
    			}
    			
    			// Refresh the product index
				$productService->rebuildProduct($productId);
				
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
    			
				// Flush the database
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Add an feature
    public function ajaxAddFeatureAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$featureGroupId = $request->query->get('featureGroupId');
    		$productId = $request->query->get('productId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get the product features
			$productFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->findBy(array('productFeatureGroupId' => $featureGroupId), array('productFeature' => 'ASC'));
    			    	
	    	return $this->render('WebIlluminationAdminBundle:Products:ajaxAddFeature.html.twig', array('id' => $id, 'featureGroupId' => $featureGroupId, 'productId' => $productId, 'productFeatureObjects' => $productFeatureObjects));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update an feature
    public function ajaxUpdateFeatureAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	    	
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$productFeatureGroupId = $request->query->get('productFeatureGroupId');
    		$productFeatureId = $request->query->get('productFeatureId');
    		$productFeature = $request->query->get('productFeature');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find product feature
    		$productFeatureObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductFeature')->find($productFeatureId);
    		if (!$productFeatureObject)
    		{
    			$productFeatureObject = new ProductFeature();
    			$productFeatureObject->setProductFeatureGroupId($productFeatureGroupId);
    			$productFeatureObject->setActive(1);
    			$productFeatureObject->setProductFeature($productFeature);
    			$productFeatureObject->setLocale('en');
    			$em->persist($productFeatureObject);
			    $em->flush();
			    $productFeatureId = $productFeatureObject->getId();
    		}
    		
    		// Find feature
    		$productToFeatureObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->find($id);
    		if (!$productToFeatureObject)
    		{
    			$productToFeatureObject = new ProductToFeature();
    			$productToFeatureObject->setActive(1);
    		}
    		$productToFeatureObject->setProductId($productId);
    		$productToFeatureObject->setProductFeatureGroupId($productFeatureGroupId);
    		$productToFeatureObject->setProductFeatureId($productFeatureId);		
    		$productToFeatureObject->setDisplayOrder($displayOrder);
		    $em->persist($productToFeatureObject);
		    $em->flush();
		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $productToFeatureObject->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete an feature
    public function ajaxDeleteFeatureAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		$featureGroupId = $request->query->get('featureGroupId');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find feature
    		$feature = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->find($id);
    		if ($feature)
    		{
    			// Remove the feature from the database
				$em->remove($feature);
				$em->flush();
								
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex, 'featureGroupId' => $featureGroupId)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Get the related products
    public function ajaxGetRelatedProductsAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$productId = $request->query->get('productId');
    		    		
    		// Get the related products
    		$relatedProducts = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->findBy(array('productId' => $productId, 'linkType' => 'related'), array('displayOrder' => 'ASC'));
    		
    		// Get the products
	    	$products = $productService->getAllProducts();
    		
		    return $this->render('WebIlluminationAdminBundle:Products:ajaxGetRelatedProducts.html.twig', array('productId' => $productId, 'relatedProducts' => $relatedProducts, 'products' => $products));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a related product
    public function ajaxAddRelatedProductAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		
    		// Get the products
	    	$products = $productService->getAllProducts();
    			    	
	    	return $this->render('WebIlluminationAdminBundle:Products:ajaxAddRelatedProduct.html.twig', array('id' => $id, 'productId' => $productId, 'products' => $products));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a related product
    public function ajaxUpdateRelatedProductAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$productLinkId = $request->query->get('productLinkId');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find related product
    		$relatedProductObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->find($id);
    		if (!$relatedProductObject)
    		{
    			$relatedProductObject = new ProductLink();
    			$relatedProductObject->setActive(1);
    			$relatedProductObject->setLinkType('related');
    		}
    		$relatedProductObject->setProductId($productId);
    		$relatedProductObject->setProductLinkId($productLinkId);
    		$relatedProductObject->setDisplayOrder($displayOrder);
		    $em->persist($relatedProductObject);
		    $em->flush();
		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    		    		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $relatedProductObject->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a related product
    public function ajaxDeleteRelatedProductAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find related product
    		$relatedProduct = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->find($id);
    		if ($relatedProduct)
    		{
    			// Get the product id
    			$productId = $relatedProduct->getProductId();
    			
    			// Remove the price from the database
				$em->remove($relatedProduct);
				$em->flush();
				
				// Refresh the product index
				$productService->rebuildProduct($productId);
				
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Get the cheaper alternatives
    public function ajaxGetCheaperAlternativesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$productId = $request->query->get('productId');
    		    		
    		// Get the cheaper alternatives
    		$cheaperAlternatives = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->findBy(array('productId' => $productId, 'linkType' => 'cheaper'), array('displayOrder' => 'ASC'));
    		
    		// Get the products
	    	$products = $productService->getAllProducts();
    		
		    return $this->render('WebIlluminationAdminBundle:Products:ajaxGetCheaperAlternatives.html.twig', array('productId' => $productId, 'cheaperAlternatives' => $cheaperAlternatives, 'products' => $products));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a cheaper alternative
    public function ajaxAddCheaperAlternativeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		
    		// Get the products
	    	$products = $productService->getAllProducts();
    			    	
	    	return $this->render('WebIlluminationAdminBundle:Products:ajaxAddCheaperAlternative.html.twig', array('id' => $id, 'productId' => $productId, 'products' => $products));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a cheaper alternative
    public function ajaxUpdateCheaperAlternativeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$productId = $request->query->get('productId');
    		$productLinkId = $request->query->get('productLinkId');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find cheaper alternative
    		$cheaperAlternativeObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->find($id);
    		if (!$cheaperAlternativeObject)
    		{
    			$cheaperAlternativeObject = new ProductLink();
    			$cheaperAlternativeObject->setActive(1);
    			$cheaperAlternativeObject->setLinkType('cheaper');
    		}
    		$cheaperAlternativeObject->setProductId($productId);
    		$cheaperAlternativeObject->setProductLinkId($productLinkId);
    		$cheaperAlternativeObject->setDisplayOrder($displayOrder);
		    $em->persist($cheaperAlternativeObject);
		    $em->flush();
		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    		    		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $cheaperAlternativeObject->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a cheaper alternative
    public function ajaxDeleteCheaperAlternativeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find cheaper alternative
    		$cheaperAlternative = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductLink')->find($id);
    		if ($cheaperAlternative)
    		{
    			// Get the product id
    			$productId = $cheaperAlternative->getProductId();
    			
    			// Remove the cheaper alternative
				$em->remove($cheaperAlternative);
				$em->flush();
				
				// Refresh the product index
				$productService->rebuildProduct($productId);
				
				// Clear the full product index so it is rebuilt
				$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
				foreach ($indexObjects as $indexObject)
				{
					$indexObject->setRebuild(1);
					$em->persist($indexObject);
	    			$em->flush();
				}
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
        
    // Update the unique product identifiers section
    public function ajaxUpdateUniqueProductIdentifiersSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$mpn = $request->request->get('mpn');
    		$ean = $request->request->get('ean');
    		$upc = $request->request->get('upc');
    		$jan = $request->request->get('jan');
    		$isbn = $request->request->get('isbn');
    		
    		// Get the product object
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		if (!$productObject)
    		{
    			throw new AccessDeniedException();
    		}
    			   		
	        // Update the product
	        $productObject->setMpn($mpn);
	        $productObject->setEan($ean);
	        $productObject->setUpc($upc);
	        $productObject->setJan($jan);
	        $productObject->setIsbn($isbn);
	        $em->persist($productObject);
			$em->flush();
			
	        // Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update the package dimensions section
    public function ajaxUpdatePackageDimensionsSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$weight = $request->request->get('weight');
    		$length = $request->request->get('length');
    		$width = $request->request->get('width');
    		$height = $request->request->get('height');
    		
    		// Get the product object
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		if (!$productObject)
    		{
    			throw new AccessDeniedException();
    		}
    			   		
	        // Update the product
	        $productObject->setWeight($weight);
	        $productObject->setlength($length);
	        $productObject->setWidth($width);
	        $productObject->setHeight($height);
	        $em->persist($productObject);
			$em->flush();
			
	        // Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update SEO section
    public function ajaxUpdateSeoSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
    		$seoService = $this->get('web_illumination_admin.seo_service');
	    	$productService = $this->get('web_illumination_admin.product_service');
    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$url = trim($request->request->get('url'));
    		$pageTitle = trim($request->request->get('pageTitle'));
    		$header = trim($request->request->get('header'));
    		$metaDescription = trim($request->request->get('metaDescription'));
    		$metaKeywords = trim($request->request->get('metaKeywords'));
    		$searchWords = trim($request->request->get('searchWords'));
    		$alternativeProductCodes = trim($request->request->get('alternativeProductCodes'));
    		
    		// Get the product objects
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $id));
    		$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $id));
    		$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product'));
    		if (!$productObject || !$productDescriptionObject || !$productIndexObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    		
    		// Generate the new url
    		$url = $seoService->createUrl($url, $previousUrl);
    		
    		if (!$pageTitle)
    		{
    			$productToDepartmentObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findOneBy(array('productId' => $id), array('displayOrder' => 'ASC'));
    			if ($productToDepartmentObject)
    			{
    				$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $productToDepartmentObject->getDepartmentId()));
    			}
    			if ($departmentDescriptionObject)
    			{
    				$pageTitle = $productDescriptionObject->getProduct().' ('.$productObject->getProductCode().') - '.$departmentDescriptionObject->getName().' - '.$productIndexObject->getBrand();
    			} else {
    				$pageTitle = $productDescriptionObject->getProduct().' ('.$productObject->getProductCode().') - '.$productIndexObject->getBrand();
    			}
    		}
    		if (!$header)
    		{
    			$header = $productDescriptionObject->getProduct();
    		}
    		if (!$metaDescription)
    		{
    			if ($productDescriptionObject->getShortDescription())
    			{
    				$shortDescription = $seoService->shortenContent($productDescriptionObject->getDescription(), 160);
    				if ($shortDescription)
    				{
    					// Update the product description
				        $productDescriptionObject->setShortDescription($shortDescription);
				        $em->persist($productDescriptionObject);
						$em->flush();
				        
				        // Update the product index
				        $productIndexObject->setShortDescription($shortDescription);
				        $em->persist($productIndexObject); 
						$em->flush();
    				}
    			}
    			$metaDescription = $productDescriptionObject->getShortDescription();
    		}
    		if (!$metaKeywords)
    		{
    			$metaKeywords = $seoService->generateKeywords($productDescriptionObject->getProduct().' '.$productObject->getProductCode().' '.$productIndexObject->getBrand());
    		}
    		if (!$searchWords)
    		{
    			$searchWords = $seoService->generateKeywords($productDescriptionObject->getProduct().' '.$productObject->getProductCode().' '.$productIndexObject->getBrand());
    		}
    		if (!$alternativeProductCodes)
    		{
    			$alternativeProductCodes = implode(', ', $seoService->generateAlternativeProductCodes($productObject->getProductCode()));
    		}
    		
    		// Setup the seo data to return
    		$seo = array();
	   		
	   		// Update the product
	        $productObject->setAlternativeProductCodes($alternativeProductCodes);
	        $em->persist($productObject);
			$em->flush();
			
			// Update the product description
	        $productDescriptionObject->setPageTitle($pageTitle);
	        $productDescriptionObject->setHeader($header);
	        $productDescriptionObject->setMetaDescription($metaDescription);
	        $productDescriptionObject->setMetaKeywords($metaKeywords);
	        $productDescriptionObject->setSearchWords($searchWords);
	        $em->persist($productDescriptionObject);
			$em->flush();
			
			// Update the routing
	        $routingObject->setUrl($url);
	        $em->persist($routingObject); 
			$em->flush();
			
			// Setup any redirects if required
			if ($previousUrl != $url)
			{
				$seoService->updateRedirects($id, 'product', $previousUrl, $url);
			}
			
			// Update the SEO data
			$seo['pageTitle'] = $pageTitle;
    		$seo['header'] = $header;
    		$seo['metaDescription'] = $metaDescription;
    		$seo['metaKeywords'] = $metaKeywords;
    		$seo['searchWords'] = $searchWords;
    		$seo['alternativeProductCodes'] = $alternativeProductCodes;
    		$seo['url'] = $url;
						
			// Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'seo' => $seo)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
   	
   	// Reset SEO
    public function ajaxResetSeoAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
    		$seoService = $this->get('web_illumination_admin.seo_service');
	    	$productService = $this->get('web_illumination_admin.product_service');
    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$id = $request->query->get('id');
    		
    		// Get the product objects
    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($id);
    		$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $id));
    		$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $id));
    		$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product'));
    		if (!$productObject || !$productDescriptionObject || !$productIndexObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    		
    		// Generate the seo data
    		$productToDepartmentObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findOneBy(array('productId' => $id), array('displayOrder' => 'ASC'));
			$departmentDescriptionObject = false;
			if ($productToDepartmentObject)
			{
				$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $productToDepartmentObject->getDepartmentId()));
			}
    		$pageTitle = $productObject->getProductCode();
			$header = $productObject->getProductCode();
			$metaKeywords = $productObject->getProductCode();
			if ($productIndexObject->getBrand())
			{
				$pageTitle = $productIndexObject->getBrand().' '.$pageTitle;
				$header = $productIndexObject->getBrand().' '.$header;
				$metaKeywords .= ' '.$productIndexObject->getBrand();
			}
			if ($productDescriptionObject->getPrefix())
			{
				$pageTitle .= ' '.$productDescriptionObject->getPrefix();
				$header .= ' '.$productDescriptionObject->getPrefix();
				$metaKeywords .= ' '.$productDescriptionObject->getPrefix();
			}
			if ($productDescriptionObject->getTagline())
			{
				$pageTitle .= ' '.$productDescriptionObject->getTagline();
				$header .= ' '.$productDescriptionObject->getTagline();
				$metaKeywords .= ' '.$productDescriptionObject->getTagline();
			}
			if ($departmentDescriptionObject)
			{
				$pageTitle .= ' '.$departmentDescriptionObject->getName();
				$header .= ' '.$departmentDescriptionObject->getName();
				$metaKeywords .= ' '.$departmentDescriptionObject->getName();
			}
			$metaKeywords = $seoService->generateKeywords($metaKeywords);
			$searchWords = $metaKeywords;
    		$url = $seoService->createUrl($pageTitle, $previousUrl);
    		if ($productDescriptionObject->getShortDescription())
			{
				$shortDescription = $seoService->shortenContent($productDescriptionObject->getDescription(), 160);
				if ($shortDescription)
				{
					// Update the product description
			        $productDescriptionObject->setShortDescription($shortDescription);
			        $em->persist($productDescriptionObject);
					$em->flush();
			        
			        // Update the product index
			        $productIndexObject->setShortDescription($shortDescription);
			        $em->persist($productIndexObject); 
					$em->flush();
				}
			}
			$metaDescription = $productDescriptionObject->getShortDescription();
    		$alternativeProductCodes = implode(', ', $seoService->generateAlternativeProductCodes($productObject->getProductCode()));
    		    	   	
    	   	// Setup the seo data to return
    		$seo = array();
	   		
	   		// Update the product
	        $productObject->setAlternativeProductCodes($alternativeProductCodes);
	        $em->persist($productObject);
			$em->flush();
			
			// Update the product description
	        $productDescriptionObject->setPageTitle($pageTitle);
	        $productDescriptionObject->setHeader($header);
	        $productDescriptionObject->setMetaDescription($metaDescription);
	        $productDescriptionObject->setMetaKeywords($metaKeywords);
	        $productDescriptionObject->setSearchWords($searchWords);
	        $em->persist($productDescriptionObject);
			$em->flush();
	        			
			// Update the routing
	        $routingObject->setUrl($url);
	        $em->persist($routingObject); 
			$em->flush();
			
			// Setup any redirects if required
			if ($previousUrl != $url)
			{
				$seoService->updateRedirects($id, 'product', $previousUrl, $url);
			}
			
			// Update the SEO data
			$seo['pageTitle'] = $pageTitle;
    		$seo['header'] = $header;
    		$seo['metaDescription'] = $metaDescription;
    		$seo['metaKeywords'] = $metaKeywords;
    		$seo['searchWords'] = $searchWords;
    		$seo['alternativeProductCodes'] = $alternativeProductCodes;
    		$seo['url'] = $url;
						
			// Refresh the product index
			$productService->rebuildProduct($id);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'seo' => $seo)), ENT_NOQUOTES));
    	}	    	    	
    	
		throw new AccessDeniedException();
		    
    }
   	
    // Get the statistics vists 
    public function ajaxGetStatisticsVisitsAction($id)
    {	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
    	// Setup URLs
    	$urls = array();
    	$urls[] = 'ga:pagePath==/'.$web_address->url.'.html';
    	foreach ($redirects as $redirect)
    	{
    		$urls[] = 'ga:pagePath==/'.$redirect->redirectFrom.'.html';
    	}
    	$url = implode(',', $urls);
    	
    	// Get the services
    	$google_service = $this->get('web_illumination_admin.google_service');
    	
    	// Get the statistics
    	$statistics = $google_service->getStatisticsVisits($url);
    	
    	return $this->render('WebIlluminationAdminBundle:Brands:ajaxGetStatisticsVisits.html.twig', array('statistics' => $statistics));
    }
    
    // Get the statistics referrers 
    public function ajaxGetStatisticsReferrersAction($id)
    {	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
    	// Setup URLs
    	$urls = array();
    	$urls[] = 'ga:pagePath==/'.$web_address->url.'.html';
    	foreach ($redirects as $redirect)
    	{
    		$urls[] = 'ga:pagePath==/'.$redirect->redirectFrom.'.html';
    	}
    	$url = implode(',', $urls);
    	
    	// Get the services
    	$google_service = $this->get('web_illumination_admin.google_service');
    	
    	// Get the statistics
    	$statistics = $google_service->getStatisticsReferrers($url);
    	
    	return $this->render('WebIlluminationAdminBundle:Brands:ajaxGetStatisticsReferrers.html.twig', array('statistics' => $statistics));
    }
    
    // Rebuild product 
    public function ajaxRebuildProductAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$productId = $request->query->get('productId');
		    		    
		    // Refresh the product index
			$productService->rebuildProduct($productId);
			
			// Clear the full product index so it is rebuilt
			$indexObjects = $em->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'products'));
			foreach ($indexObjects as $indexObject)
			{
				$indexObject->setRebuild(1);
				$em->persist($indexObject);
    			$em->flush();
			}
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Get the root temporary upload directory
    public function getTemporaryUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploads/temporary';
    }
        
    // Generate a clean filename
    public function cleanFilename($filename = '')
    {	
    	if ($filename != '')
    	{
	    	// Add spaces to ending HTMl tags
	    	$filename = preg_replace("/<\/([^\s])>/", "</$1> ", $filename);
	    	
	    	// Strip tags
	    	$filename = strip_tags($filename);
	    	
	    	// Convert all HTML entities
	    	$filename = html_entity_decode($filename);
	    	
	    	// Replace any white space
	    	$filename = preg_replace("/[\r\n\t\s]+/s", "-", $filename);
	    	
	    	// Replace any dashes
	    	$filename = preg_replace("/[\-]+/s", "-", $filename);
	    	$filename = str_replace('--', '-', $filename);
	    	
	    	// Convert to lowercase
	    	$filename = strtolower($filename);
	    	
	    	// Remove any unexpected characters
	    	$filename = preg_replace("/[^a-zA-Z0-9\-]?/", "", $filename);
	    }
 
    	return $filename;
    }
    
    // Get an extension
    public function getExtension($filename = '')
    {	
    	if ($filename != '')
    	{
	    	// Split the filename
	    	$filenameInfo = explode('.', $filename);
	    	
	    	// Get the extension
	    	return strtolower($filenameInfo[(sizeof($filenameInfo) - 1)]);
	    	
	    }
 
    	return false;
    }
}