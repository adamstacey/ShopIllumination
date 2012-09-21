<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Departent;
use WebIllumination\AdminBundle\Entity\DepartentDescription;
use WebIllumination\AdminBundle\Entity\Routing;

class DepartmentsController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		$departmentService = $this->get('web_illumination_admin.department_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Get the filters session
    	$filters = $this->get('session')->get('filters');
    	
    	// Get the departments for the filters
    	$departments = apc_fetch('kitchen_appliance_centre_full_department_list');
    	if (!$departments)
    	{
    		// Get a list of departments
    		$departments = $departmentService->getFullDepartmentList();
    		apc_store('kitchen_appliance_centre_full_department_list', $departments);
    	}
    	
    	// Setup the data array
    	$data = array('departments' => $departments);
    	    	
        return $this->render('WebIlluminationAdminBundle:Departments:index.html.twig', array('settings' => $settings['admin']['departments'], 'filters' => $filters['admin']['departments'], 'data' => $data));
    }
        
    // Get the listing
	public function ajaxGetListingAction(Request $request)
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
    		$settings = $sessionSettings['admin']['departments'];
    		
    		// Get the filters
    		$sessionFilters = $this->get('session')->get('filters');
    		$filters = $sessionFilters['admin']['departments'];
    		
    		// Get submitted data
    		$status = $request->request->get('status');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
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
    		$sessionSettings['admin']['departments'] = $settings;
    		$this->get('session')->set('settings', $sessionSettings);
    		
    		// Update filters
    		$filters['status'] = $status;
    		$filters['hidePrices'] = $hidePrices;
    		$filters['showPricesOutOfHours'] = $showPricesOutOfHours;
    		$filters['membershipCardDiscountAvailable'] = $membershipCardDiscountAvailable;
    		$filters['name'] = $name;
    		$filters['description'] = $description;
    		$filters['department'] = $department;
    		$sessionFilters['admin']['departments'] = $filters;
    		$this->get('session')->set('filters', $sessionFilters);
    		
	   		// Get the services
	    	$departmentService = $this->get('web_illumination_admin.department_service');
	    	
	    	// Get the items
	    	$items = $departmentService->getAdminListing($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department, $sort, $order, $page, $maxResults);
	    	if (!$items)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Create response    	    	    	   		    
	    	$response = $this->render('WebIlluminationAdminBundle:Departments:ajaxGetListing.html.twig', array('settings' => $settings, 'filters' => $filters, 'items' => $items));
			$response->headers->set('Connection', 'Keep-Alive');
			return $response;
	    }
	    
	    throw new AccessDeniedException();
    }
            
    // Get listing count
    public function ajaxGetListingCountAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$status = $request->request->get('status');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
    		$department = $request->request->get('department');
	   		
	   		// Get the services
	    	$departmentService = $this->get('web_illumination_admin.department_service');
	    	
	    	// Get the listing count
	    	$listingCount = $departmentService->getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department);
	    		        	
	    	// Create response    	    	    	   		    
    		$response = new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount)), ENT_NOQUOTES));
			$response->headers->set('Connection', 'Keep-Alive');
			return $response;        
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
    		$settings = $sessionSettings['admin']['departments'];
    		
    		// Get submitted data
    		$status = $request->request->get('status');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
    		$department = $request->request->get('department');
    		$page = ($request->request->get('page')?$request->request->get('page'):1);
    		$maxResults = ($request->request->get('maxResults')?$request->request->get('maxResults'):$settings['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	   		// Get the services
	    	$departmentService = $this->get('web_illumination_admin.department_service');
	    	
	    	// Get the listing pagingation
	    	$pagination = $departmentService->getAdminListingPagination($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department, $maxResults);
	       
	       	// Create response    	    	    	   		    
			$response = $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
			$response->headers->set('Connection', 'Keep-Alive');
			return $response;
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
   			$em = $this->getDoctrine()->getEntityManager();
   			
    		// Get the services
	    	$departmentService = $this->get('web_illumination_admin.department_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$status = $request->query->get('status');
    		
    		// Get the departmemt object
    		$departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($id);
    		if (!$departmentObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Update the department
    		$departmentObject->setStatus($status);
    		$em->persist($departmentObject);
    		$em->flush();
    		
    		// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
    		// Get the services
	    	$productService = $this->get('web_illumination_admin.product_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
	        
	        // Delete the department
			$productDeleted = $productService->deleteProduct($id);
			if ($productDeleted)
			{
				// Clear the full department index so it is rebuilt
				$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$brandId = $request->request->get('brand-id');
    		$departmentId = $request->request->get('department-id');
    		$product = trim($request->request->get('product'));
    		$productCode = strtoupper(trim($request->request->get('product-code')));
    		$description = $request->request->get('description');
    		
    		// Add the product object
    		$productObject = new Product();
    		$productObject->setStatus('h');
    		$productObject->setAvailableForPurchase(1);
    		$productObject->setBrandId($brandId);
    		$productObject->setProductCode($productCode);
    		$productObject->setAlternativeProductCodes(implode(', ', $seoService->generateAlternativeProductCodes($productCode)));
    		$productObject->setMpn('');
    		$productObject->setEan('');
    		$productObject->setUpc('');
    		$productObject->setJan('');
    		$productObject->setIsbn('');
    		$productObject->setDeliveryBand(0.0000);
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
    		$productObject->setMembershipCardDiscountAvailable(1);
    		$productObject->setMaximumMembershipCardDiscount(0.0000);
    		$em->persist($productObject);
    		$em->flush();
			
			// Generate the seo data
			$brandDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $brandId));
			$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentId));
			$pageTitle = $product.' ('.$productCode.')';
			$header = $product;
			$metaKeywords = $product.' '.$productCode;
			if ($departmentDescriptionObject)
			{
				$pageTitle .= ' - '.$departmentDescriptionObject->getName();
				$metaKeywords .= ' '.$departmentDescriptionObject->getName();
			}
			if ($brandDescriptionObject)
			{
				$pageTitle .= ' - '.$brandDescriptionObject->getBrand();
				$header = $brandDescriptionObject->getBrand().' - '.$header;
				$metaKeywords .= ' '.$brandDescriptionObject->getBrand();
			}
			$metaKeywords = $seoService->generateKeywords($metaKeywords);
			$url = $seoService->createUrl($pageTitle, '');
			$shortDescription = $seoService->shortenContent($description, 160);
			
			// Add the product description object
			$productDescriptionObject = new ProductDescription();
			$productDescriptionObject->setProductId($productObject->getId());
			$productDescriptionObject->setLocale('en');
			$productDescriptionObject->setProduct($product);
			$productDescriptionObject->setDescription($description);
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
			$imageObject->setDefaultImage(1);
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
			
			// Set success message
		    $this->get('session')->setFlash('success', 'The product "'.$pageTitle.'" has been added.');
		    
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
    		apc_store('kitchen_appliance_centre_department_list', $departments);
    	}
    	
    	// Setup the data array
    	$data = array('brands' => $brands, 'departments' => $departments);
    	    	
    	return $this->render('WebIlluminationAdminBundle:Products:add.html.twig', array('settings' => $settings['admin']['products'], 'data' => $data));
    }  
    
    // Update
    public function updateAction(Request $request, $id)
    {   		
   		// Get the services
    	$systemService = $this->get('web_illumination_admin.system_service');
    	$departmentService = $this->get('web_illumination_admin.department_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the entity manager
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	    	    	
    	// Get the department
    	$department = $departmentService->getDepartment($id, 'en');
    	    	
    	// Setup the data array
    	$data = array('department' => $department);
    	    	    	
		return $this->render('WebIlluminationAdminBundle:Departments:update.html.twig', array('settings' => $settings['admin']['departments'], 'data' => $data));
    }
    
    // Update the general section
    public function ajaxUpdateGeneralSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$status = $request->request->get('status');
    		$department = $request->request->get('department');
    		
    		// Check for changes for the purposes of resetting the SEO
    		$resetSeo = false;
    		
    		// Get the product objects
    		$departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($id);
    		$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $id));
    		if (!$departmentObject || !$departmentDescriptionObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Check if the SEO needs resetting
    		if ($department != $departmentDescriptionObject->getName())
    		{
    			$resetSeo = true;
    		}
	   		
	        // Update the department
	        $departmentObject->setStatus($status);
	        $em->persist($departmentObject);
			$em->flush();
			
			// Update the department description
	        $departmentDescriptionObject->setName($department);
	        $em->persist($departmentDescriptionObject);
			$em->flush();
	        
	        // Build the department index
			$objectIndexObjects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => $id, 'objectType' => 'department'));
			foreach ($objectIndexObjects as $objectIndexObject)
			{
				$objectIndexObject->setRebuild(1);
				$em->persist($objectIndexObject);
    			$em->flush();
			}
			
			// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
	    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$description = trim($request->request->get('description'));
    		$shortDescription = trim($request->request->get('shortDescription'));
    		if (!$shortDescription)
    		{
		    	// Get short description
    			$shortDescription = $seoService->shortenContent($description, 160);
    		}
    		
    		// Get the department objects
    		$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $id));
    		if (!$departmentDescriptionObject)
    		{
    			throw new AccessDeniedException();
    		}
	   					
			// Update the product description
	        $departmentDescriptionObject->setDescription($description);
	        $departmentDescriptionObject->setShortDescription($shortDescription);
	        $em->persist($departmentDescriptionObject);
			$em->flush();
	        
	        // Build the department index
			$objectIndexObjects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => $id, 'objectType' => 'department'));
			foreach ($objectIndexObjects as $objectIndexObject)
			{
				$objectIndexObject->setRebuild(1);
				$em->persist($objectIndexObject);
    			$em->flush();
			}
			
			// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
        
    // Update price settings section
    public function ajaxUpdatePriceSettingsSectionAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$maximumMembershipCardDiscount = trim($request->request->get('maximumMembershipCardDiscount'));
    		
    		// Get the department object
    		$departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($id);
    		if (!$departmentObject)
    		{
    			throw new AccessDeniedException();
    		}
    			   		
	        // Update the department
	        $departmentObject->setHidePrices($hidePrices);
	        $departmentObject->setShowPricesOutOfHours($showPricesOutOfHours);
	        $departmentObject->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
	        $departmentObject->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
	        $em->persist($departmentObject);
			$em->flush();
	        
	        // Build the department index
			$objectIndexObjects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => $id, 'objectType' => 'department'));
			foreach ($objectIndexObjects as $objectIndexObject)
			{
				$objectIndexObject->setRebuild(1);
				$em->persist($objectIndexObject);
    			$em->flush();
			}
			
			// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$url = trim($request->request->get('url'));
    		$pageTitle = trim($request->request->get('pageTitle'));
    		$header = trim($request->request->get('header'));
    		$metaDescription = trim($request->request->get('metaDescription'));
    		$metaKeywords = trim($request->request->get('metaKeywords'));
    		$searchWords = trim($request->request->get('searchWords'));
    		
    		// Get the department object
    		$departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($id);
    		$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $id));
    		$routingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'department'));
    		if (!$departmentObject || !$departmentDescriptionObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    		
    		// Generate the new url
    		$url = $seoService->createUrl($url, $previousUrl);
    		
    		if (!$pageTitle)
    		{
    			$pageTitle = $departmentDescriptionObject->getDeprtment();
    		}
    		if (!$header)
    		{
    			$header = $departmentDescriptionObject->getDeprtment();
    		}
    		if (!$metaDescription)
    		{
    			if ($departmentDescriptionObject->getShortDescription())
    			{
    				$shortDescription = $seoService->shortenContent($departmentDescriptionObject->getDescription(), 160);
    				if ($shortDescription)
    				{
    					// Update the department description
				        $departmentDescriptionObject->setShortDescription($shortDescription);
				        $em->persist($departmentDescriptionObject);
						$em->flush();
    				}
    			}
    			$metaDescription = $departmentDescriptionObject->getShortDescription();
    		}
    		if (!$metaKeywords)
    		{
    			$metaKeywords = $seoService->generateKeywords($departmentDescriptionObject->getBrand());
    		}
    		if (!$searchWords)
    		{
    			$searchWords = $seoService->generateKeywords($departmentDescriptionObject->getBrand());
    		}
    		
    		// Setup the seo data to return
    		$seo = array();
	   					
			// Update the product description
	        $departmentDescriptionObject->setPageTitle($pageTitle);
	        $departmentDescriptionObject->setHeader($header);
	        $departmentDescriptionObject->setMetaDescription($metaDescription);
	        $departmentDescriptionObject->setMetaKeywords($metaKeywords);
	        $departmentDescriptionObject->setSearchWords($searchWords);
	        $em->persist($departmentDescriptionObject);
			$em->flush();
			
			// Update the routing
	        $routingObject->setUrl($url);
	        $em->persist($routingObject); 
			$em->flush();
			
			// Setup any redirects if required
			if ($previousUrl != $url)
			{
				$seoService->updateRedirects($id, 'department', $previousUrl, $url);
			}
			
			// Update the SEO data
			$seo['pageTitle'] = $pageTitle;
    		$seo['header'] = $header;
    		$seo['metaDescription'] = $metaDescription;
    		$seo['metaKeywords'] = $metaKeywords;
    		$seo['searchWords'] = $searchWords;
    		$seo['url'] = $url;
						
			// Build the department index
			$objectIndexObjects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => $id, 'objectType' => 'department'));
			foreach ($objectIndexObjects as $objectIndexObject)
			{
				$objectIndexObject->setRebuild(1);
				$em->persist($objectIndexObject);
    			$em->flush();
			}
			
			// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->query->get('id');
    		
    		// Get the product objects
    		$productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
    		$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $id));
    		$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $id));
    		$routingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product'));
    		if (!$productObject || !$productDescriptionObject || !$productIndexObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    	   	
    	   	// Generate the seo data
			$productToDepartmentObject = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findOneBy(array('productId' => $id), array('displayOrder' => 'ASC'));
			$departmentDescriptionObject = false;
			if ($productToDepartmentObject)
			{
				$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $productToDepartmentObject->getDepartmentId()));
			}
			if ($departmentDescriptionObject)
			{
				$pageTitle = $productDescriptionObject->getProduct().' ('.$productObject->getProductCode().') - '.$departmentDescriptionObject->getName().' - '.$productIndexObject->getBrand();
			} else {
				$pageTitle = $productDescriptionObject->getProduct().' ('.$productObject->getProductCode().') - '.$productIndexObject->getBrand();
			}
			$url = $seoService->createUrl($pageTitle, $previousUrl);
			$header = $productDescriptionObject->getProduct();
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
    		$metaKeywords = $seoService->generateKeywords($productDescriptionObject->getProduct().' '.$productObject->getProductCode().' '.$productIndexObject->getBrand());
    		$searchWords = $seoService->generateKeywords($productDescriptionObject->getProduct().' '.$productObject->getProductCode().' '.$productIndexObject->getBrand());
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
			
			// Clear the full department index so it is rebuilt
			$indexObjects = $em->getRepository('WebIlluminationAdminBundle:ObjectIndex')->findBy(array('objectKey' => 'all', 'objectType' => 'departments'));
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
    	$web_address = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
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
    	$web_address = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
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
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
}