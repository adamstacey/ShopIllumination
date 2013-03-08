<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OrdersnewController extends Controller
{
	protected $settings;
	protected $listing;
	protected $filter;

    public function __construct()
    {
    	// Setup settings
    	$settings = array();
    	$settings['singleTitle'] = 'Order';
		$settings['multipleTitle'] = 'Orders';
		$settings['singleDescription'] = 'order';
		$settings['multipleDescription'] = 'order';
		$settings['singleClass'] = 'order';
		$settings['multipleClass'] = 'orders';
		$settings['singlePath'] = 'ordersnew';
		$settings['multiplePath'] = 'ordersnew';
		$settings['singleModel'] = 'Order';
		$settings['multipleModel'] = 'Orders';
		$this->settings = $settings;
		
		// Setup listing
    	$listing = array();
    	$listing['sortable'] = false;
    	$listing['search'] = '';
    	$listing['sort'] = 'createdAt';
		$listing['order'] = 'ASC';
		$listing['sortOrder'] = 'createdAt:ASC';
		$listing['maxResults'] = 50;
		$listing['currentPage'] = 1;
		$this->listing = $listing;
		
		// Setup filter
		$filter = array();
    	$filter['name'] = '';
		$filter['statuses'] = '';
		$filter['empty'] = 1;
		$this->filter = $filter;
    }
    
	// Index
    public function indexAction(Request $request)
    {
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Setup listing
    	$sessionListing = $this->get('session')->get('listing');
		if (isset($sessionListing['admin'][$this->settings['singleClass']]))
		{
			$listing = $sessionListing['admin'][$this->settings['singleClass']];
			$this->listing = $listing;
		} else {
			$sessionListing['admin'][$this->settings['singleClass']] = $this->listing;
			$this->get('session')->set('listing', $sessionListing);
		}
		
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$status = $request->request->get('status');
    		$delete = $request->request->get('delete');
    		    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
	    			if ($itemObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					// Delete all discounts
	    					$itemDiscountObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Discount')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
	    					foreach ($itemDiscountObjects as $itemDiscountObject)
	    					{
	    						// Delete the item
		    					if ($itemDiscountObject)
		    					{
			    					$em->remove($itemDiscountObject);
			    					$em->flush();
		    					}
		    				}
		    				
		    				// Delete all notes
	    					$itemNoteObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Note')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
	    					foreach ($itemNoteObjects as $itemNoteObject)
	    					{
	    						// Delete the item
		    					if ($itemNoteObject)
		    					{
			    					$em->remove($itemNoteObject);
			    					$em->flush();
		    					}
		    				}
		    				
		    				// Delete all products
	    					$itemProductObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Product')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
	    					foreach ($itemProductObjects as $itemProductObject)
	    					{
	    						// Delete the item
		    					if ($itemProductObject)
		    					{
			    					$em->remove($itemProductObject);
			    					$em->flush();
		    					}
		    				}		    					
			    		} else {
				    		$itemStatus = $status[$id];
			    			$itemObject->setStatus($itemStatus);
			    			$em->persist($itemObject);
			    			$em->flush();
			    			$service->rebuildDepartmentIndexObject($id, 'en');
			    		}
	    			}
    			}
    		} else {
    			if (!$this->listing['sortable'])
    			{
		    		// Notify user
		    		$this->get('session')->setFlash('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
		    	}
    		}
    		    		
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->setFlash('success', 'The selected '.$this->settings['multipleDescription'].' have been deleted.');
    		} else {
	    		$this->get('session')->setFlash('success', 'The selected '.$this->settings['multipleDescription'].' have been updated.');
    		}
    		
    		// Forward
    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
    	}
		
		// Setup filter
    	$sessionFilter = $this->get('session')->get('filter');
		if (isset($sessionFilter['admin'][$this->settings['singleClass']]))
		{
			$filter = $sessionFilter['admin'][$this->settings['singleClass']];
			$this->filter = $filter;
		} else {
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
		// Check for the quick search and update the filters
		if ($this->listing['search'])
		{
			$filter['name'] = $this->listing['search'];
			$filter['statuses'] = '';
			$filter['empty'] = 1;
			$this->filter = $filter;
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['statistics'] = array();
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($parentId);
    	
    	// Get the department
    	$departmentIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $parentId));
    	$data['department'] = $departmentIndexObject;
    	    	
    	// Get the number of items
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index', 'i');
    	if ($parentId > 0)
    	{
    		$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal($parentId)));
    	} else {
	    	$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal(0)));
    	}
    	if ($this->filter['name'])
    	{
    		$qb->andWhere($qb->expr()->like('i.name', $qb->expr()->literal('%'.$this->filter['name'].'%')));
    	} 
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
		$itemCount = $qb->getQuery()->getSingleScalarResult();
		$this->listing['itemCount'] = $itemCount;
				
		// Get the pagination
    	if ($itemCount <= $this->listing['maxResults'])
    	{
    		$pagination = 1;
    	} else {
	    	$pagination = ceil($itemCount / $this->listing['maxResults']);
    	}
    	$this->listing['pagination'] = $pagination;
    	$this->listing['previousPage'] = $this->listing['currentPage'] - 1;
    	$this->listing['nextPage'] = $this->listing['currentPage'] + 1;
    	$this->listing['firstResult'] = ($this->listing['currentPage'] - 1) * $this->listing['maxResults'];
    	
    	// Get the items
		$qb = $em->createQueryBuilder();
    	$qb->select('i');
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index', 'i');
    	if ($parentId > 0)
    	{
    		$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal($parentId)));
    	} else {
	    	$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal(0)));
    	}
    	if ($this->filter['name'])
    	{
    		$qb->andWhere($qb->expr()->like('i.name', $qb->expr()->literal('%'.$this->filter['name'].'%')));
    	}
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
	    $qb->addOrderBy('i.'.$this->listing['sort'], $this->listing['order']);
    	$qb->setFirstResult($this->listing['firstResult']);
	   	$qb->setMaxResults($this->listing['maxResults']);
		$items = $qb->getQuery()->getResult();
		$data['items'] = $items;
		
		// Get the listing
		$data['listing'] = $this->listing;
		
		// Get the filter
		$data['filter'] = $this->filter;
		
		// Get the parent id
		$data['parentId'] = $parentId;
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':index.html.twig', array('data' => $data));
    }
    
    // Update listing
    public function updateListingAction(Request $request, $parentId)
    {
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get listings data
    		$search = $request->request->get('search');
    		$sortOrder = $request->request->get('sort-order');
    		$sortOrderParts = explode(':', $sortOrder);
    		$sort = $sortOrderParts[0];
    		$order = $sortOrderParts[1];
    		$sortable = false;
    		$maxResults = $request->request->get('max-results');
    		$currentPage = $request->request->get('current-page');
    		if ($sort == 'displayOrder')
    		{
	    		$sortable = true;
	    		$maxResults = 99999999;
    		}
    		
    		// Update the listing session
    		$sessionListing = $this->get('session')->get('listing');
    		$sessionListing['admin'][$this->settings['singleClass']]['search'] = $search;
    		$sessionListing['admin'][$this->settings['singleClass']]['sortable'] = $sortable;
    		$sessionListing['admin'][$this->settings['singleClass']]['sortOrder'] = $sortOrder;
    		$sessionListing['admin'][$this->settings['singleClass']]['sort'] = $sort;
    		$sessionListing['admin'][$this->settings['singleClass']]['order'] = $order;
    		$sessionListing['admin'][$this->settings['singleClass']]['maxResults'] = $maxResults;
    		$sessionListing['admin'][$this->settings['singleClass']]['currentPage'] = $currentPage;
			$this->get('session')->set('listing', $sessionListing);    
			
    		// Get filters data
    		$emptyFilters = true;
    		$filters = $request->request->get('filters');
    		$sessionFilter = $this->get('session')->get('filter');
    		$sessionFilter['admin'][$this->settings['singleClass']]['empty'] = 1;
    		foreach ($filters as $index => $filter)
    		{
    			if ($index != 'empty')
    			{
    				$filter = trim($filter);
	    			$sessionFilter['admin'][$this->settings['singleClass']][$index] = $filter;
		    		if ($filter != '')
		    		{
			    		$emptyFilters = false;
			    	}
	    		}
    		}
    		if (!$emptyFilters)
    		{
	    		$sessionFilter['admin'][$this->settings['singleClass']]['empty'] = 0;
    		}
    		
    		// Update the filter session
			$this->get('session')->set('filter', $sessionFilter);    		
    	}
		
		// Forward
    	return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
    }
    
    // Add
    public function addAction(Request $request, $parentId)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$seoService = $this->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
    	// Add
    	if ($request->getMethod() == 'POST')
    	{
    		// Get submitted data
    		$parentId = $request->request->get('parent-id');
    		$status = $request->request->get('status');
    		$departmentPath = $parentId;
    		$hidePrices = 0;
    		$showPricesOutOfHours = 0;
    		$membershipCardDiscountAvailable = 0;
    		$maximumMembershipCardDiscount = 0.0000;
    		$displayOrder = 999999;
    		$locale = 'en';
    		$name = trim($request->request->get('name'));
    		$description = $seoService->cleanHtml($request->request->get('description'));
    		$shortDescription = $seoService->removeHtml($request->request->get('short-description'));
    		$menuTitle = $seoService->getMenuTitle($name);
    		$pageTitle = $name;
    		$header = $name;
    		$metaDescription = $seoService->shortenContent($shortDescription, 160);
    		$metaKeywords = $seoService->generateKeywords($name.' '.$shortDescription);
    		$searchWords = $metaKeywords;
    		$googleDepartment = $request->request->get('google-department');
    		$ebayDepartment = '';
    		$amazonDepartment = '';
    		$url = $seoService->generateUrl($pageTitle);
    		$addAnother = $request->request->get('add-another');
    		
    		// Add object
    		$object = new Department();
    		$object->setParentId($parentId);
    		$object->setStatus($status);
    		$object->setDepartmentPath($departmentPath);
    		$object->setHidePrices($hidePrices);
    		$object->setShowPricesOutOfHours($showPricesOutOfHours);
    		$object->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
    		$object->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
    		$object->setDisplayOrder($displayOrder);
    		$em->persist($object);
    		$em->flush();
    		$id = $object->getId();
    		
    		// Add object description
    		$objectDescription = new DepartmentDescription();
    		$objectDescription->setDepartmentId($id);
    		$objectDescription->setLocale($locale);
    		$objectDescription->setName($name);
    		$objectDescription->setDescription($description);
    		$objectDescription->setShortDescription($shortDescription);
    		$objectDescription->setMenuTitle($menuTitle);
    		$objectDescription->setPageTitle($pageTitle);
    		$objectDescription->setHeader($header);
    		$objectDescription->setMetaDescription($metaDescription);
    		$objectDescription->setMetaKeywords($metaKeywords);
    		$objectDescription->setSearchWords($searchWords);
    		$objectDescription->setGoogleDepartment($googleDepartment);
    		$objectDescription->setEbayDepartment($ebayDepartment);
    		$objectDescription->setAmazonDepartment($amazonDepartment);
    		$em->persist($objectDescription);
    		$em->flush();
    		
    		// Rebuild path
    		$service->rebuildPath($id);
    		
    		// Get the parent routing
    		$parentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $parentId, 'objectType' => 'department'));
    		
    		// Setup the routing
    		if ($parentRoutingObject)
    		{
	    		$routingUrl = $seoService->createUrl($parentRoutingObject->getUrl().'/'.$url);
    		} else {
	    		$routingUrl = $seoService->createUrl($url);
    		}
    		$routingObject = new Routing();
    		$routingObject->setObjectId($id);
    		$routingObject->setObjectType('department');
    		$routingObject->setLocale($locale);
    		$routingObject->setUrl($routingUrl);
    		$em->persist($routingObject);
    		$em->flush();
    		
    		// Rebuild the object indexes
    		$service->rebuildDepartmentIndexObject($id, $locale);
    		if ($parentId > 0)
    		{
    			$service->rebuildDepartmentIndexObject($parentId, $locale);
    		}
    		
    		// Notify user
    		$this->get('session')->setFlash('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$name.'"</strong> has been added.');
    		
    		// Forward
    		if ($addAnother > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_add', array('parentId' => $parentId)));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_add');
    	$data['parentId'] = $parentId;
    	$data['mode'] = 'add';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($parentId);
    	
    	// Get the departments
    	$departments = $service->getFullDepartmentList();
    	$data['departments'] = $departments;
    	
    	// Get the taxonomy
    	$taxonomy = array();
    	$taxonomyGoogle = $em->getRepository('WebIlluminationAdminBundle:Taxonomy')->findBy(array('objectType' => 'google', 'locale' => 'en'), array('name' => 'ASC'));
    	$taxonomy['google'] = $taxonomyGoogle;
    	$data['taxonomy'] = $taxonomy;
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }
    
    // Update
    public function updateAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$seoService = $this->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
    		$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
			if (!$itemObject || !$itemDescriptionObject)
			{
				// Notify user
				$this->get('session')->setFlash('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id)));
    		}
			
    		// Get the existing information
    		$existingParentId = $itemObject->getParentId();
    		
    		// Get submitted data
    		$parentId = $request->request->get('parent-id');
    		if ($parentId == $id)
    		{
	    		$parentId = $existingParentId;
    		}
    		$status = $request->request->get('status');
    		$name = $request->request->get('name');
    		$existingName = $itemDescriptionObject->getName();
    		$existingPageTitle = $itemDescriptionObject->getPageTitle();
    		$shortDescription = $request->request->get('short-description');
    		$description = $request->request->get('description');
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update object
    		$itemObject->setParentId($parentId);
    		$itemObject->setStatus($status);
    		$em->persist($itemObject);
    		$em->flush();
    		$itemDescriptionObject->setName($name);
    		$itemDescriptionObject->setShortDescription($shortDescription);
    		$itemDescriptionObject->setDescription($description);
    		$em->persist($itemDescriptionObject);
    		$em->flush();
    		
    		// Rebuild the path
    		$service->rebuildPath($id);
    		
    		// Rebuild the routing
    		$service->rebuildRouting($id, 'en');
    		
    		// Check to see if the paths need updating
    		if ($parentId != $existingParentId)
    		{
    			// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the paths (need to do all paths first before building routes as routes are based on paths)
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildPath($relatedIndexObject->getDepartmentId());
	    			}
	    		}
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
	    		
	    		// Rebuild the existing and new parent department indexes
	    		if ($parentId > 0)
	    		{
	    			$service->rebuildDepartmentIndexObject($parentId, 'en');
	    		}
	    		if ($existingParentId > 0)
	    		{
	    			$service->rebuildDepartmentIndexObject($existingParentId, 'en');
	    		}
    		}
    		    		
    		// Check to see if the page title needs changing
    		if (($existingName == $existingPageTitle) && ($name != $existingName))
    		{
    			// Update the page title
	    		$itemDescriptionObject->setPageTitle($name);
	    		$em->persist($itemDescriptionObject);
	    		$em->flush();
	    		
	    		// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
    		}
    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->setFlash('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	
    	// Get the departments
    	$departments = $service->getFullDepartmentList();
    	$data['departments'] = $departments;
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }
    
     // Update settings
    public function updateSettingsAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
			if (!$itemObject)
			{
				// Notify user
				$this->get('session')->setFlash('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_settings', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$hidePrices = $request->request->get('hide-prices');
    		$showPricesOutOfHours = $request->request->get('show-prices-out-of-hours');
    		$membershipCardDiscountAvailable = $request->request->get('membership-card-discount-available');
    		$maximumMembershipCardDiscount = $request->request->get('maximum-membership-card-discount');
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update objects
    		$itemObject->setHidePrices($hidePrices);
    		$itemObject->setShowPricesOutOfHours($showPricesOutOfHours);
    		$itemObject->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
    		$itemObject->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
    		$em->persist($itemObject);
    		$em->flush();
    		    		    		    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->setFlash('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_settings', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_settings', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemSettings.html.twig', array('data' => $data));
    }
    
    
    
    
    
    // Update images
    public function updateImagesAction(Request $request, $parentId)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
				
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$redirectFrom = $request->request->get('redirect-from');
    		$redirectCode = $request->request->get('redirect-code');
    		$displayOrder = $request->request->get('display-order');
    		$delete = $request->request->get('delete');
    		
    		// Check if the display order needs updating
			if ($this->listing['sortable'] && ($delete < 1))
			{
    			foreach ($displayOrder as $id => $value)
    			{
    				// Get the item
    				$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
    				if ($itemObject)
    				{
		    			$itemObject->setDisplayOrder($value);
		    			$em->persist($itemObject);
		    			$em->flush();
		    			$service->rebuildObjectIndex($id, 'en');
		    		}
    			}
			}
    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $id => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
	    			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
	    			if ($itemObject && $itemDescriptionObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					// Get the current parent id
	    					$parentId = $itemObject->getParentId();
	    					
	    					// Get all related departments
	    					$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' ORDER BY di.departmentPath ASC")->getResult();
	    					foreach ($relatedIndexObjects as $relatedIndexObject)
	    					{
	    						// Delete the item
		    					$relatedItemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($relatedIndexObject->getDepartmentId());
		    					if ($relatedItemObject)
		    					{
			    					$em->remove($relatedItemObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any item descriptions
		    					$relatedItemDescriptionObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findBy(array($this->settings['singleClass'].'Id' => $relatedIndexObject->getDepartmentId()));
		    					foreach ($relatedItemDescriptionObjects as $relatedItemDescriptionObject)
		    					{
			    					$em->remove($relatedItemDescriptionObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any product associations
		    					$relatedProductToDepartmentObjects = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('departmentId' => $relatedIndexObject->getDepartmentId()));
		    					foreach ($relatedProductToDepartmentObjects as $relatedProductToDepartmentObject)
		    					{
			    					$em->remove($relatedProductToDepartmentObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any images
		    					$relatedImageObjects = $em->getRepository('WebIlluminationAdminBundle:Image')->findBy(array('objectId' => $relatedIndexObject->getDepartmentId(), 'objectType' => 'department'));
		    					foreach ($relatedImageObjects as $relatedImageObject)
		    					{
			    					$em->remove($relatedImageObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any guarantees
		    					$relatedGuaranteeObjects = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $relatedIndexObject->getDepartmentId(), 'objectType' => 'department'));
		    					foreach ($relatedGuaranteeObjects as $relatedGuaranteeObject)
		    					{
			    					$em->remove($relatedGuaranteeObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any redirects
		    					$relatedRedirectObjects = $em->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $relatedIndexObject->getDepartmentId(), 'objectType' => 'department'));
		    					foreach ($relatedRedirectObjects as $relatedRedirectObject)
		    					{
			    					$em->remove($relatedRedirectObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any routings
		    					$relatedRoutingObjects = $em->getRepository('WebIlluminationAdminBundle:Routing')->findBy(array('objectId' => $relatedIndexObject->getDepartmentId(), 'objectType' => 'department'));
		    					foreach ($relatedRoutingObjects as $relatedRoutingObject)
		    					{
			    					$em->remove($relatedRoutingObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete the item index
		    					$em->remove($relatedIndexObject);
		    					$em->flush();
	    					}
	    					
							// Rebuild the parent object index
							if ($parentId > 0)
							{
								$service->rebuildDepartmentIndexObject($parentId, 'en');
							}
			    		} else {
				    		$itemStatus = $status[$id];
			    			$itemObject->setStatus($itemStatus);
			    			$em->persist($itemObject);
			    			$em->flush();
			    			$service->rebuildDepartmentIndexObject($id, 'en');
			    		}
	    			}
    			}
    		} else {
    			if (!$this->listing['sortable'])
    			{
		    		// Notify user
		    		$this->get('session')->setFlash('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
		    	}
    		}
    		    		
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->setFlash('success', 'The selected '.$this->settings['multipleDescription'].' have been deleted.');
    		} else {
	    		$this->get('session')->setFlash('success', 'The selected '.$this->settings['multipleDescription'].' have been updated.');
    		}
    		
    		// Forward
    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
    	}
		
		// Setup filter
    	$sessionFilter = $this->get('session')->get('filter');
		if (isset($sessionFilter['admin'][$this->settings['singleClass']]))
		{
			$filter = $sessionFilter['admin'][$this->settings['singleClass']];
			$this->filter = $filter;
		} else {
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
		// Check for the quick search and update the filters
		if ($this->listing['search'])
		{
			$filter['name'] = $this->listing['search'];
			$filter['statuses'] = '';
			$filter['empty'] = 1;
			$this->filter = $filter;
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['statistics'] = array();
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($parentId);
    	
    	// Get the department
    	$departmentIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $parentId));
    	$data['department'] = $departmentIndexObject;
    	    	
    	// Get the number of items
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index', 'i');
    	if ($parentId > 0)
    	{
    		$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal($parentId)));
    	} else {
	    	$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal(0)));
    	}
    	if ($this->filter['name'])
    	{
    		$qb->andWhere($qb->expr()->like('i.name', $qb->expr()->literal('%'.$this->filter['name'].'%')));
    	} 
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
		$itemCount = $qb->getQuery()->getSingleScalarResult();
		$this->listing['itemCount'] = $itemCount;
				
		// Get the pagination
    	if ($itemCount <= $this->listing['maxResults'])
    	{
    		$pagination = 1;
    	} else {
	    	$pagination = ceil($itemCount / $this->listing['maxResults']);
    	}
    	$this->listing['pagination'] = $pagination;
    	$this->listing['previousPage'] = $this->listing['currentPage'] - 1;
    	$this->listing['nextPage'] = $this->listing['currentPage'] + 1;
    	$this->listing['firstResult'] = ($this->listing['currentPage'] - 1) * $this->listing['maxResults'];
    	
    	// Get the items
		$qb = $em->createQueryBuilder();
    	$qb->select('i');
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index', 'i');
    	if ($parentId > 0)
    	{
    		$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal($parentId)));
    	} else {
	    	$qb->andWhere($qb->expr()->eq('i.parentId', $qb->expr()->literal(0)));
    	}
    	if ($this->filter['name'])
    	{
    		$qb->andWhere($qb->expr()->like('i.name', $qb->expr()->literal('%'.$this->filter['name'].'%')));
    	}
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
	    $qb->addOrderBy('i.'.$this->listing['sort'], $this->listing['order']);
    	$qb->setFirstResult($this->listing['firstResult']);
	   	$qb->setMaxResults($this->listing['maxResults']);
		$items = $qb->getQuery()->getResult();
		$data['items'] = $items;
		
		// Get the listing
		$data['listing'] = $this->listing;
		
		// Get the filter
		$data['filter'] = $this->filter;
		
		// Get the parent id
		$data['parentId'] = $parentId;
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemRedirects.html.twig', array('data' => $data));
    }
    
    
    
    
    
    
    
    
    // Update redirects
    public function updateRedirectsAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
				
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$redirectFrom = $request->request->get('redirect-from');
    		$redirectCode = $request->request->get('redirect-code');
    		$goBack = $request->request->get('go-back');
    		$delete = $request->request->get('delete');
    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:Redirect')->find($itemId);
	    			if ($itemObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					$em->remove($itemObject);
			    			$em->flush();
			    		} else {
				    		$itemRedirectFrom = $redirectFrom[$itemId];
				    		$itemRedirectCode = $redirectCode[$itemId];
			    			$itemObject->setRedirectFrom($itemRedirectFrom);
			    			$itemObject->setRedirectCode($itemRedirectCode);
			    			$em->persist($itemObject);
			    			$em->flush();
			    		}
	    			}
    			}
    		}
    		    		
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->setFlash('success', 'The selected redirects have been deleted.');
    		} else {
	    		$this->get('session')->setFlash('success', 'The selected redirects have been updated.');
    		}
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_redirects', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_redirects', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the items
		$items = $em->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectType' => 'department', 'objectId' => $id), array('redirectFrom' => 'ASC'));
		$data['items'] = $items;
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemRedirects.html.twig', array('data' => $data));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    // Update search engine optimisation
    public function updateSearchEngineOptimisationAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$seoService = $this->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
			$itemRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $id, 'locale' => 'en'));
			if (!$itemDescriptionObject || !$itemRoutingObject)
			{
				// Notify user
				$this->get('session')->setFlash('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_search_engine_optimsation', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$pageTitle = trim($request->request->get('page-title'));
    		$existingPageTitle = $itemDescriptionObject->getPageTitle();
    		$header = trim($request->request->get('header'));
    		$metaDescription = trim($request->request->get('meta-description'));
    		$searchWords = trim($request->request->get('search-words'));
    		$googleDepartment = $request->request->get('google-department');
    		$existingUrl = $itemIndexObject->getUrl();
    		$url = $seoService->createUrl(trim($request->request->get('url')), $existingUrl);
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update objects
    		$itemDescriptionObject->setPageTitle($pageTitle);
    		$itemDescriptionObject->setHeader($header);
    		$itemDescriptionObject->setMetaDescription($metaDescription);
    		$itemDescriptionObject->setMetaKeywords($searchWords);
    		$itemDescriptionObject->setSearchWords($searchWords);
    		$itemDescriptionObject->setGoogleDepartment($googleDepartment);
    		$itemDescriptionObject->setMetaDescription($metaDescription);
    		$em->persist($itemDescriptionObject);
    		$em->flush();
    		$itemRoutingObject->setUrl($url);
    		$em->persist($itemRoutingObject);
    		$em->flush();
    		    		    		
    		// Check to see if the routing needs changing
    		if ($pageTitle != $existingPageTitle)
    		{
    			// Rebuild the routing
    			$service->rebuildRouting($id, 'en');
    			
	    		// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
    		} elseif ($url != $existingUrl) {
	    		// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
    		}
    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->setFlash('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_search_engine_optimisation', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_search_engine_optimisation', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	    	
    	// Get the taxonomy
    	$taxonomy = array();
    	$taxonomyGoogle = $em->getRepository('WebIlluminationAdminBundle:Taxonomy')->findBy(array('objectType' => 'google', 'locale' => 'en'), array('name' => 'ASC'));
    	$taxonomy['google'] = $taxonomyGoogle;
    	$data['taxonomy'] = $taxonomy;
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemSearchEngineOptimisation.html.twig', array('data' => $data));
    }    
}