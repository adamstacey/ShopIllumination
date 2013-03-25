<?php

namespace WebIllumination\AdminBundle\Controller;
use KAC\SiteBundle\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BrandsController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Get the filters session
    	$filters = $this->get('session')->get('filters');
    	    	    	
        return $this->render('WebIlluminationAdminBundle:Brands:index.html.twig', array('settings' => $settings['admin']['brands'], 'filters' => $filters['admin']['brands'], 'data' => array()));
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
    		$settings = $sessionSettings['admin']['brands'];
    		
    		// Get the filters
    		$sessionFilters = $this->get('session')->get('filters');
    		$filters = $sessionFilters['admin']['brands'];
    		
    		// Get submitted data
    		$status = $request->request->get('status');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
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
    		$sessionSettings['admin']['brands'] = $settings;
    		$this->get('session')->set('settings', $sessionSettings);
    		
    		// Update filters
    		$filters['status'] = $status;
    		$filters['hidePrices'] = $hidePrices;
    		$filters['showPricesOutOfHours'] = $showPricesOutOfHours;
    		$filters['membershipCardDiscountAvailable'] = $membershipCardDiscountAvailable;
    		$filters['name'] = $name;
    		$filters['description'] = $description;
    		$sessionFilters['admin']['brands'] = $filters;
    		$this->get('session')->set('filters', $sessionFilters);
    		
	   		// Get the services
	    	$brandService = $this->get('web_illumination_admin.brand_service');
	    	
	    	// Get the items
	    	$items = $brandService->getAdminListing($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $sort, $order, $page, $maxResults);
	    	if (!$items)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:Brands:ajaxGetListing.html.twig', array('settings' => $settings, 'filters' => $filters, 'items' => $items));
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
	   		
	   		// Get the services
	    	$brandService = $this->get('web_illumination_admin.brand_service');
	    	
	    	// Get the listing count
	    	$listingCount = $brandService->getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description);
	    		        	        
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
    		$settings = $sessionSettings['admin']['brands'];
    		
    		// Get submitted data
    		$status = $request->request->get('status');
    		$hidePrices = $request->request->get('hidePrices');
    		$showPricesOutOfHours = $request->request->get('showPricesOutOfHours');
    		$membershipCardDiscountAvailable = $request->request->get('membershipCardDiscountAvailable');
    		$name = $request->request->get('name');
    		$description = $request->request->get('description');
    		$page = ($request->request->get('page')?$request->request->get('page'):1);
    		$maxResults = ($request->request->get('maxResults')?$request->request->get('maxResults'):$settings['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	   		// Get the services
	    	$brandService = $this->get('web_illumination_admin.brand_service');
	    	
	    	// Get the listing pagingation
	    	$pagination = $brandService->getAdminListingPagination($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $maxResults);
	        	        
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
   			$em = $this->getDoctrine()->getEntityManager();
   				    	
    		// Get submitted data
    		$id = $request->query->get('id');
    		$status = $request->query->get('status');
    		
    		// Get the product object
    		$brandObject = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($id);
    		if (!$brandObject)
    		{
    			throw new NotFoundHttpException();
    		}
    		
    		// Update the brand
    		$brandObject->setStatus($status);
    		$em->persist($brandObject);
    		$em->flush();
			 
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
	    	$brandService = $this->get('web_illumination_admin.brand_service');
	    	
    		// Get submitted data
    		$id = $request->query->get('id');
	        
	        // Delete the brand
			$brandDeleted = $brandService->deleteBrand($id);
			if ($brandDeleted)
			{
				return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
			}
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'error')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Delete
    public function deleteAction(Request $request, $id)
    {
		// Get the services
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	
        // Delete the brand
		$brandDeleted = $brandService->deleteBrand($id);
		if ($brandDeleted)
		{
			// Set success message
		    $this->get('session')->setFlash('success', 'The brand was successfully deleted.');
		    
		    // Forward to the brands
		    return $this->redirect($this->get('router')->generate('admin_brands', array()));
		}
        
        // Set error message
	    $this->get('session')->setFlash('error', 'Sorry there was a problem deleting the brand. Please try again.');
	    
	    // Forward to the brand
	    return $this->redirect($this->get('router')->generate('admin_brands_update', array('id' => $id)));
    }
    
    // Add
    public function addAction(Request $request)
    {   		
   		// Get the services
   		$systemService = $this->get('web_illumination_admin.system_service');
   		$seoService = $this->get('web_illumination_admin.seo_service');
    	
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
    		$brand = trim($request->request->get('brand'));
    		$description = $seoService->cleanHtml(trim($request->request->get('description')));
    		$logoImage = trim($request->request->get('logoImage'));
    		
    		// Add the product object
    		$brandObject = new Brand();
    		$brandObject->setStatus('a');
    		$brandObject->setRequestABrochure(0);
    		$brandObject->setBrochureWebAddress('');
    		$brandObject->setRequestASample(0);
    		$brandObject->setSampleWebAddress('');
    		$brandObject->setHidePrices(0);
    		$brandObject->setShowPricesOutOfHours(0);
    		$brandObject->setMembershipCardDiscountAvailable(1);
    		$brandObject->setMaximumMembershipCardDiscount(0.0000);
    		$em->persist($brandObject);
    		$em->flush();
			
			// Generate the seo data
			if ($description == '')
			{
				$description = $brand.' brought to you by Kitchen Appliance Centre and delivered to the UK and Ireland';
			}
			$metaDescription = $seoService->shortenContent($description, 160);
			$metaKeywords = $seoService->generateKeywords($brand);
			$url = $seoService->createUrl($brand, '');
			
			// Add the product description object
			$brandDescriptionObject = new Brand\Description();
			$brandDescriptionObject->setBrand($brandObject);
			$brandDescriptionObject->setLogoImage(null);
			$brandDescriptionObject->setLocale('en');
			$brandDescriptionObject->setName($brand);
			$brandDescriptionObject->setDescription($description);
			$brandDescriptionObject->setAbout('');
			$brandDescriptionObject->setHistory('');
			$brandDescriptionObject->setMoreInformation('');
			$brandDescriptionObject->setPageTitle($brand);
			$brandDescriptionObject->setHeader($brand);
			$brandDescriptionObject->setMetaDescription($metaDescription);
			$brandDescriptionObject->setMetaKeywords($metaKeywords);
			$brandDescriptionObject->setSearchWords($metaKeywords);
			$em->persist($brandDescriptionObject);
			$em->flush();
			
			// Add the logo
    		if ($logoImage)
    		{
				// Get the image service
	    		$imageService = $this->get('web_illumination_admin.image_service');
    		    		
			    // Process the logo
			    $logoImageObject = $imageService->processImage($logoImage, $brand, '', '', '', 1, 'brand', 'logo', $brandObject->getId(), 'en');
			    
			    // Update the brand description
	        	$brandDescriptionObject->setLogoImage($logoImageObject);
	        	$em->persist($brandDescriptionObject);
				$em->flush();	        	
    		}
						
			// Add the routing
			$routingObject = new Brand\Routing();
			$routingObject->setObjectId($brandObject->getId());
			$routingObject->setLocale('en');
			$routingObject->setUrl($url);
			$em->persist($routingObject);
			$em->flush();
		
			// Set success message
		    $this->get('session')->setFlash('success', 'The brand "'.$brand.'" has been added.');
		    
		    // Forward to the product
		    return $this->redirect($this->get('router')->generate('admin_brands_update', array('id' => $brandObject->getId())));
    	}
    	    	
    	// Setup the data array
    	$data = array();
    	    	
    	return $this->render('WebIlluminationAdminBundle:Brands:add.html.twig', array('settings' => $settings['admin']['brands'], 'data' => $data));
    }  
    
    // Update
    public function updateAction(Request $request, $id)
    {   		
   		// Get the services
    	$systemService = $this->get('web_illumination_admin.system_service');
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the entity manager
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	    	    	
    	// Get the brand
    	$brand = $brandService->getBrand($id, 'en');
    	    	
    	// Setup the data array
    	$data = array('brand' => $brand);
    	    	    	
		return $this->render('WebIlluminationAdminBundle:Brands:update.html.twig', array('settings' => $settings['admin']['brands'], 'data' => $data));
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
    		$brand = trim($request->request->get('brand'));
    		$logoImage = trim($request->request->get('logoImage'));
    		
    		// Check for changes for the purposes of resetting the SEO
    		$resetSeo = false;
    		
    		// Update the logo details
	        $logo = false;
    		
    		// Get the brand objects
    		$brandObject = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($id);
    		$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findOneBy(array('brand' => $id));
    		if (!$brandObject || !$brandDescriptionObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Check if the SEO needs resetting
    		if ($brand != $brandDescriptionObject->getBrand())
    		{
    			$resetSeo = true;
    		}
    		
    		// Update the logo
    		if ($logoImage)
    		{
    			// Get the image object if it exists
				$logoImageObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Image')->find($brandDescriptionObject->getLogoImageId());
			
				// Get the image service
	    		$imageService = $this->get('web_illumination_admin.image_service');
    		    		
				if ($logoImageObject)
			    {
			    	// Update the logo
			    	$logoImageObject = $imageService->updateImage($logoImageObject, $logoImage, $brand, '', '', '', 1);
			    } else {
			    	// Process the logo
			    	if ($logoImage)
			    	{
			    		$logoImageObject = $imageService->processImage($logoImage, $brand, '', '', '', 1, 'brand', 'logo', $brandObject->getId(), 'en');
			    	}
			    }
			    
			    // Update the brand description
	        	$brandDescriptionObject->setLogoImage($logoImageObject);
	        	
	        	// Update the logo details
	        	$logo = array();
	        	$logo['id'] = $logoImageObject->getId();
	        	$logo['title'] = $logoImageObject->getTitle();
	        	$logo['thumbnail'] = $logoImageObject->getThumbnailPath().'?version='.date("dmYHis");
	        	$logo['thumbnailWidth'] = $logoImageObject->getThumbnailWidth();
	        	$logo['thumbnailHeight'] = $logoImageObject->getThumbnailHeight();
	        	$logo['large'] = $logoImageObject->getLargePath().'?version='.date("dmYHis");
	        	$logo['largeWidth'] = $logoImageObject->getLargeWidth();
	        	$logo['largeHeight'] = $logoImageObject->getLargeHeight();
    		}
	   		
	        // Update the brand
	        $brandObject->setStatus($status);
	        $em->persist($brandObject);
			$em->flush();
			
			// Update the brand description
	        $brandDescriptionObject->setBrand($brand);
	        $em->persist($brandDescriptionObject);
			$em->flush();
	                
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'resetSeo' => $resetSeo, 'logo' => $logo)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Delete logo image
    public function ajaxDeleteLogoImageAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
   		
    		// Find image
    		$imageObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Image')->find($id);
    		if ($imageObject)
    		{
    			// Get the object id
    			$objectId = $imageObject->getObjectId();
    			
    			// Get the services
	    		$imageService = $this->get('web_illumination_admin.image_service');
	    		
	    		// Delete the image
	    		$imageService->deleteImage($imageObject);
	    		
	    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    		}

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
    		$description = $seoService->cleanHtml(trim($request->request->get('description')));
    		$about = $seoService->cleanHtml(trim($request->request->get('about')));
    		$history = $seoService->cleanHtml(trim($request->request->get('history')));
    		$moreInformation = $seoService->cleanHtml(trim($request->request->get('moreInformation')));
    		
    		// Get the product objects
    		$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findOneBy(array('brand' => $id));
    		if (!$brandDescriptionObject)
    		{
    			throw new AccessDeniedException();
    		}
	   					
			// Update the product description
	        $brandDescriptionObject->setDescription($description);
	        $brandDescriptionObject->setAbout($about);
	        $brandDescriptionObject->setHistory($history);
	        $brandDescriptionObject->setMoreInformation($moreInformation);
	        $em->persist($brandDescriptionObject);
			$em->flush();
	        
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
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
    		
    		// Get the brand object
    		$brandObject = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($id);
    		if (!$brandObject)
    		{
    			throw new AccessDeniedException();
    		}
    			   		
	        // Update the brand
	        $brandObject->setHidePrices($hidePrices);
	        $brandObject->setShowPricesOutOfHours($showPricesOutOfHours);
	        $brandObject->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
	        $brandObject->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
	        $em->persist($brandObject);
			$em->flush();

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
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->request->get('id');
    		$url = trim($request->request->get('url'));
    		$pageTitle = trim($request->request->get('pageTitle'));
    		$header = trim($request->request->get('header'));
    		$metaDescription = trim($request->request->get('metaDescription'));
    		$metaKeywords = trim($request->request->get('metaKeywords'));
    		$searchWords = trim($request->request->get('searchWords'));
    		
    		// Get the brand objects
    		$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\EntityBrand\Description')->findOneBy(array('brand' => $id));
    		$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Routing')->findOneBy(array('objectId' => $id));
    		if (!$brandDescriptionObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    		
    		// Generate the new url
    		$url = $seoService->createUrl($url, $previousUrl);
    		
    		if (!$pageTitle)
    		{
    			$pageTitle = $brandDescriptionObject->getBrand();
    		}
    		if (!$header)
    		{
    			$header = $brandDescriptionObject->getBrand();
    		}
    		if (!$metaDescription)
    		{
    			$metaDescription = $seoService->shortenContent($brandDescriptionObject->getDescription(), 160);
    		}
    		if (!$metaKeywords)
    		{
    			$metaKeywords = $seoService->generateKeywords($brandDescriptionObject->getBrand());
    		}
    		if (!$searchWords)
    		{
    			$searchWords = $seoService->generateKeywords($brandDescriptionObject->getBrand());
    		}
    		
    		// Setup the seo data to return
    		$seo = array();
	   		
			// Update the product description
	        $brandDescriptionObject->setPageTitle($pageTitle);
	        $brandDescriptionObject->setHeader($header);
	        $brandDescriptionObject->setMetaDescription($metaDescription);
	        $brandDescriptionObject->setMetaKeywords($metaKeywords);
	        $brandDescriptionObject->setSearchWords($searchWords);
	        $em->persist($brandDescriptionObject);
			$em->flush();
			
			// Update the routing
	        $routingObject->setUrl($url);
	        $em->persist($routingObject); 
			$em->flush();
			
			// Setup any redirects if required
			if ($previousUrl != $url)
			{
				$seoService->updateRedirects($id, 'brand', $previousUrl, $url);
			}
			
			// Update the SEO data
			$seo['pageTitle'] = $pageTitle;
    		$seo['header'] = $header;
    		$seo['metaDescription'] = $metaDescription;
    		$seo['metaKeywords'] = $metaKeywords;
    		$seo['searchWords'] = $searchWords;
    		$seo['url'] = $url;
	                
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
    	
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
    		
    		// Get submitted data
    		$id = $request->query->get('id');
    		
    		// Get the brand objects
    		$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findOneBy(array('brand' => $id));
    		$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Routing')->findOneBy(array('objectId' => $id));
    		if (!$brandDescriptionObject || !$routingObject)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Setup the previous URL
    		$previousUrl = $routingObject->getUrl();
    	   	
    	   	// Generate the seo data
			$pageTitle = $brandDescriptionObject->getBrand();
			$url = $seoService->createUrl($pageTitle, $previousUrl);
			$header = $brandDescriptionObject->getBrand();
			$metaDescription = $seoService->shortenContent($brandDescriptionObject->getDescription(), 160);;
    		$metaKeywords = $seoService->generateKeywords($brandDescriptionObject->getBrand());
    		$searchWords = $seoService->generateKeywords($brandDescriptionObject->getBrand());
    		    	   	
    	   	// Setup the seo data to return
    		$seo = array();
	   		
			// Update the brand description
	        $brandDescriptionObject->setPageTitle($pageTitle);
	        $brandDescriptionObject->setHeader($header);
	        $brandDescriptionObject->setMetaDescription($metaDescription);
	        $brandDescriptionObject->setMetaKeywords($metaKeywords);
	        $brandDescriptionObject->setSearchWords($searchWords);
	        $em->persist($brandDescriptionObject);
			$em->flush();
	        			
			// Update the routing
	        $routingObject->setUrl($url);
	        $em->persist($routingObject); 
			$em->flush();
			
			// Setup any redirects if required
			if ($previousUrl != $url)
			{
				$seoService->updateRedirects($id, 'brand', $previousUrl, $url);
			}
			
			// Update the SEO data
			$seo['pageTitle'] = $pageTitle;
    		$seo['header'] = $header;
    		$seo['metaDescription'] = $metaDescription;
    		$seo['metaKeywords'] = $metaKeywords;
    		$seo['searchWords'] = $searchWords;
    		$seo['url'] = $url;
						
	       	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'seo' => $seo)), ENT_NOQUOTES));
    	}	    	    	
    	
		throw new AccessDeniedException();
		    
    }
   	
    // Get the statistics vists 
    public function ajaxGetStatisticsVisitsAction($id)
    {	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Brand\Routing')->findOneBy(array('objectId' => $id, 'locale' => 'en'));
    	
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
    	$web_address = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Brand\Routing')->findOneBy(array('objectId' => $id, 'locale' => 'en'));
    	
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
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
}