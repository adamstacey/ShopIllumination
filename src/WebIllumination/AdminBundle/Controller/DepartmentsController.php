<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Department;
use WebIllumination\AdminBundle\Entity\DepartmentDescription;
use WebIllumination\AdminBundle\Entity\DepartmentToFeature;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\Redirect;
use WebIllumination\AdminBundle\Entity\BrandToDepartment;

class DepartmentsController extends Controller
{
	protected $settings;
	protected $listing;
	protected $filter;

    public function __construct()
    {
    	// Setup settings
    	$settings = array();
    	$settings['singleTitle'] = 'Department';
		$settings['multipleTitle'] = 'Departments';
		$settings['singleDescription'] = 'department';
		$settings['multipleDescription'] = 'departments';
		$settings['singleClass'] = 'department';
		$settings['multipleClass'] = 'departments';
		$settings['singlePath'] = 'department';
		$settings['multiplePath'] = 'departments';
		$settings['singleModel'] = 'Department';
		$settings['multipleModel'] = 'Departments';
		$this->settings = $settings;
		
		// Setup listing
    	$listing = array();
    	$listing['sortable'] = true;
    	$listing['search'] = '';
    	$listing['sort'] = 'displayOrder';
		$listing['order'] = 'ASC';
		$listing['sortOrder'] = 'displayOrder:ASC';
		$listing['maxResults'] = 99999999;
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
    public function indexAction(Request $request, $parentId)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$productService = $this->get('web_illumination_admin.product_service');    	
    	    	
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
    		$deliveryBand = $request->request->get('delivery-band');
    		$displayOrder = $request->request->get('display-order');
    		$delete = $request->request->get('delete');
    		    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
	    			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $itemId));
	    			if ($itemObject && $itemDescriptionObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					// Get the current parent id
	    					$parentId = $itemObject->getParentId();
	    					
	    					// Get all related departments
	    					$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$itemId."|%' ORDER BY di.departmentPath ASC")->getResult();
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
		    					
		    					// Delete any feature templates
		    					$relatedDepartmentToFeatureObjects = $em->getRepository('WebIlluminationAdminBundle:DepartmentToFeature')->findBy(array('departmentId' => $relatedIndexObject->getDepartmentId()));
		    					foreach ($relatedDepartmentToFeatureObjects as $relatedDepartmentToFeatureObject)
		    					{
			    					$em->remove($relatedDepartmentToFeatureObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any brand associations
		    					$relatedBrandToDepartmentObjects = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->findBy(array('departmentId' => $relatedIndexObject->getDepartmentId()));
		    					foreach ($relatedBrandToDepartmentObjects as $relatedBrandToDepartmentObject)
		    					{
			    					$em->remove($relatedBrandToDepartmentObject);
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
				    		$itemStatus = $status[$itemId];
				    		$itemExistingStatus = $itemObject->getStatus();
				    		$itemDeliveryBand = $deliveryBand[$itemId];
				    		$itemExistingDeliveryBand = $itemObject->getDeliveryBand();
				    		$itemDisplayOrder = $displayOrder[$itemId];
				    		$itemExistingDisplayOrder = $itemObject->getDisplayOrder();
				    		if (($itemStatus != $itemExistingStatus) || ($itemDeliveryBand != $itemExistingDeliveryBand) || ($itemDisplayOrder != $itemExistingDisplayOrder))
				    		{
					    		$itemObject->setStatus($itemStatus);
				    			$itemObject->setDeliveryBand($itemDeliveryBand);
				    			if ($itemDeliveryBand > 0)
				    			{
					    			$itemObject->setInheritedDeliveryBand($itemDeliveryBand);
				    			}
				    			$itemObject->setDisplayOrder($itemDisplayOrder);
				    			$em->persist($itemObject);
				    			$em->flush();
				    			$service->rebuildDepartmentIndexObject($itemId, 'en');
				    			if ($itemDeliveryBand != $itemExistingDeliveryBand)
				    			{
				    				// Update the department delivery bands
				    				$service->updateDepartmentDeliveryBands($itemId);

				    				// Update the delivery bands for the products
				    				$service->updateProductDeliveryBands($itemId, 'en');
				    			}
				    		}
			    		}
	    			}
    			}
    		} else {
    			if (!$this->listing['sortable'])
    			{
		    		// Notify user
		    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $parentId)));
		    	}
    		}
    		    		
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been deleted.');
    		} else {
	    		$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been updated.');
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
    		$deliveryBand = 0.0000;
    		$parentDepartmentIndexObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentIndex')->findOneBy(array('departmentId' => $parentId, 'locale' => 'en'));
    		$checkDeliveryBand = $parentDepartmentIndexObject->getCheckDeliveryBand();
    		$inheritedDeliveryBand = $parentDepartmentIndexObject->getInheritedDeliveryBand();
    		$displayOrder = 999999;
    		$locale = 'en';
    		$name = trim($request->request->get('name'));
    		$description = $seoService->cleanHtml($request->request->get('description'));
    		$menuTitle = $seoService->getMenuTitle($name);
    		$pageTitle = $name;
    		$header = $name;
    		$metaDescription = $seoService->shortenContent($description, 160);
    		$metaKeywords = $seoService->generateKeywords($name.' '.$description);
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
    		$object->setDeliveryBand($deliveryBand);
    		$object->setCheckDeliveryBand($checkDeliveryBand);
    		$object->setInheritedDeliveryBand($inheritedDeliveryBand);
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
    		$objectDescription->setMenuTitle($menuTitle);
    		$objectDescription->setPageTitle($pageTitle);
    		$objectDescription->setPageTitleTemplate('');
    		$objectDescription->setDeliveryBandNotes('');
    		$objectDescription->setHeader($header);
    		$objectDescription->setHeaderTemplate('');
    		$objectDescription->setMetaDescription($metaDescription);
    		$objectDescription->setMetaDescriptionTemplate('');
    		$objectDescription->setMetaKeywords($metaKeywords);
    		$objectDescription->setSearchWords($searchWords);
    		$objectDescription->setGoogleDepartment($googleDepartment);
    		$objectDescription->setEbayDepartment($ebayDepartment);
    		$objectDescription->setAmazonDepartment($amazonDepartment);
    		$em->persist($objectDescription);
    		$em->flush();
    		
    		// Rebuild path
    		$service->rebuildPath($id);
    		
    		// Add the routing
	    	$routingUrl = $seoService->createUrl($url);
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
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$name.'"</strong> has been added.');
    		
    		// Forward
    		if ($addAnother > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_add', array('parentId' => $parentId)));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $object->getId())));
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
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
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
    		$description = $seoService->cleanHtml($request->request->get('description'));
    		$metaDescription = $itemDescriptionObject->getMetaDescription();
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update object
    		$itemObject->setParentId($parentId);
    		$itemObject->setStatus($status);
    		$em->persist($itemObject);
    		$em->flush();
    		$itemDescriptionObject->setName($name);
    		$itemDescriptionObject->setDescription($description);
    		if (!$metaDescription)
    		{
	    		$metaDescription = $seoService->shortenContent($description, 160);
	    		$itemDescriptionObject->setMetaDescription($metaDescription);
    		}
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
    		    		    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
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
    
    // Update templates
    public function updateTemplatesAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
		
		// Check for any product updates
		$productsUpdated = false;
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
			if (!$itemDescriptionObject)
			{
				// Notify user
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_templates', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$pageTitleTemplate = trim($request->request->get('page-title-template'));
    		$headerTemplate = trim($request->request->get('header-template'));
    		$metaDescriptionTemplate = trim($request->request->get('meta-description-template'));
    		$goBack = $request->request->get('go-back');
    		$extraAction = $request->request->get('extra-action');
    		
    		// Check if any extra actions are required
    		if (strpos($extraAction, 'getTemplatesFromDepartment') !== false)
    		{
	    		// Get any new product features added
	    		$departmentId = str_replace('getTemplatesFromDepartment|', '', $extraAction);
    			$templatesAdded = $service->getTemplatesFromDepartment($id, $departmentId, 'en');
    			
    			// Notify user
    			if ($templatesAdded)
    			{
    				$this->get('session')->getFlashBag()->add('success', 'The templates from the selected department have been used and the department has been updated.');
    			} else {
	    			$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem using the templates from the selected department. Please try again.');
    			}
    			
    			// Forward
    			return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_templates', array('id' => $id)));
    		} else {
	    		switch ($extraAction)
	    		{
	    			// Update the products from the department templates
		    		case 'updateProductsFromTemplates':
		    			// Get any new product updates
		    			$productUpdates = $service->updateProductsFromTemplates($id, 'en');
		    			$productsUpdated= true;	    			
		    			break;
	    		}
	    	}
    		
    		if (!$productsUpdated)
    		{
	    		// Update objects
	    		$itemDescriptionObject->setPageTitleTemplate($pageTitleTemplate);
	    		$itemDescriptionObject->setHeaderTemplate($headerTemplate);
	    		$itemDescriptionObject->setMetaDescriptionTemplate($metaDescriptionTemplate);
	    		$em->persist($itemDescriptionObject);
	    		$em->flush();
	    		    		    		    		
	    		// Rebuild the index
	    		$service->rebuildDepartmentIndexObject($id, 'en');
	    		
	    		// Notify user
	    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
	    		
	    		// Forward
	    		if ($goBack > 0)
	    		{
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
	    		} else {
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_templates', array('id' => $id)));
	    		}
	    	}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_templates', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Check if there were any product updates
    	if ($productsUpdated)
    	{
    		$data['productUpdates'] = $productUpdates;
    	}
    	$data['productsUpdated'] = $productsUpdated;
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	
    	// Get the product feature groups
	    $data['productFeatureGroups'] = $service->getProductFeatureGroups($id, 'en');
	    
	    // Get the current page title template content
	    $data['pageTitleTemplate'] = $service->getTemplateContent($id, 'page-title', 'en');
	    
	    // Get the current page title product previews
	    $data['pageTitleTemplateProductPreviews'] = $service->getTemplateProductPreviews($id, 'page-title', 'en');
	    
	    // Get the current header template content
	    $data['headerTemplate'] = $service->getTemplateContent($id, 'header', 'en');
	    
	    // Get the current header product previews
	    $data['headerTemplateProductPreviews'] = $service->getTemplateProductPreviews($id, 'header', 'en');	    
	    
	    // Get the current meta description template content
	    $data['metaDescriptionTemplate'] = $service->getTemplateContent($id, 'meta-description', 'en');
	    
	    // Get the current meta description product previews
	    $data['metaDescriptionTemplateProductPreviews'] = $service->getTemplateProductPreviews($id, 'meta-description', 'en');
	    
	    // Get the departments
    	$departments = $service->getFullDepartmentList();
    	$data['departments'] = $departments;
    	        
        $response = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemTemplates.html.twig', array('data' => $data));
		$response->headers->set('Connection', 'Keep-Alive');
		$response->headers->set('Content-Type', 'text/html; charset=utf-8');
		return $response;
    }
    
    // Update pricing
    public function updatePricingAction(Request $request, $id)
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
			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
			if (!$itemObject || !$itemDescriptionObject)
			{
				// Notify user
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_pricing', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$hidePrices = $request->request->get('hide-prices');
    		$showPricesOutOfHours = $request->request->get('show-prices-out-of-hours');
    		$membershipCardDiscountAvailable = $request->request->get('membership-card-discount-available');
    		$maximumMembershipCardDiscount = $request->request->get('maximum-membership-card-discount');
    		$pageTitleTemplate = trim($request->request->get('page-title-template'));
    		$metaDescriptionTemplate = trim($request->request->get('meta-description-template'));
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update objects
    		$itemObject->setHidePrices($hidePrices);
    		$itemObject->setShowPricesOutOfHours($showPricesOutOfHours);
    		$itemObject->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
    		$itemObject->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
    		$em->persist($itemObject);
    		$em->flush();
    		$itemDescriptionObject->setPageTitleTemplate($pageTitleTemplate);
    		$itemDescriptionObject->setMetaDescriptionTemplate($metaDescriptionTemplate);
    		$em->persist($itemDescriptionObject);
    		$em->flush();
    		    		    		    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_pricing', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_pricing', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	
    	// Get the product feature groups
	    $data['productFeatureGroups'] = $service->getProductFeatureGroups($id, 'en');
	    
	    // Get the current page title template content
	    $data['pageTitleTemplate'] = $service->getPageTitleTemplateContent($id, 'en');
	    
	    // Get the current page title product previews
	    $data['pageTitleTemplateProductPreviews'] = $service->getPageTitleTemplateProductPreviews($id, 'en');
	    	    
	    // Get the current meta description template content
	    $data['metaDescriptionTemplate'] = $service->getMetaDescriptionTemplateContent($id, 'en');
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemPricing.html.twig', array('data' => $data));
    }
    
    // Update product features
    public function updateProductFeaturesAction(Request $request, $id)
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
    		$productFeatureGroupId = $request->request->get('product-feature-group-id');
    		$defaultProductFeatureId = $request->request->get('default-product-feature-id');
    		$displayOnFilter = $request->request->get('display-on-filter');
    		$displayOnListing = $request->request->get('display-on-listing');
    		$displayOnProduct = $request->request->get('display-on-product');
    		$addItem = $request->request->get('add-item');
    		$addProductFeatureGroupId = $request->request->get('add-product-feature-group-id');
    		$addDefaultProductFeatureId = $request->request->get('add-default-product-feature-id');
    		$addDisplayOnFilter = $request->request->get('add-display-on-filter');
    		$addDisplayOnListing = $request->request->get('add-display-on-listing');
    		$addDisplayOnProduct = $request->request->get('add-display-on-product');
    		$displayOrder = $request->request->get('display-order');
    		$goBack = $request->request->get('go-back');
    		$delete = $request->request->get('delete');
    		$extraAction = $request->request->get('extra-action');
    		
    		// Check if any extra actions are required
    		if (strpos($extraAction, 'getProductFeaturesFromDepartment') !== false)
    		{
	    		// Get any new product features added
	    		$departmentId = str_replace('getProductFeaturesFromDepartment|', '', $extraAction);
    			$productFeaturesAdded = $service->getProductFeatureGroupsFromDepartment($id, $departmentId, 'en');
    			
    			// Notify user
    			if ($productFeaturesAdded > 0)
    			{
    				$this->get('session')->getFlashBag()->add('success', '<strong>'.$productFeaturesAdded.'</strong> new product feature'.($productFeaturesAdded != 1?'s':'').' have been found through the selected department and added.');
    			} else {
	    			$this->get('session')->getFlashBag()->add('notice', 'There are no new product features to add. This could be because the product features in the selected department already match what is in this department.');
    			}
    			
    			// Forward
    			return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_product_features', array('id' => $id)));
    		} else {
	    		switch ($extraAction)
	    		{
	    			// Get the product features from the products directly in the departments
		    		case 'getProductFeaturesFromProducts':
		    			// Get any new product features added
		    			$productFeaturesAdded = $service->getProductFeatureGroupsFromProducts($id, 'en');
		    			
		    			// Notify user
		    			if ($productFeaturesAdded > 0)
		    			{
		    				$this->get('session')->getFlashBag()->add('success', '<strong>'.$productFeaturesAdded.'</strong> new product feature'.($productFeaturesAdded != 1?'s':'').' have been found through the products associated with this department and added.');
		    			} else {
			    			$this->get('session')->getFlashBag()->add('notice', 'There are no new product features to add. This could be because there are no products directly associated to this department, so there are no available product features.');
		    			}
		    			
		    			// Forward
		    			return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_product_features', array('id' => $id)));
		    			break;
	    		}
	    	}
    		    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$departmentToFeatureObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentToFeature')->find($itemId);
	    			if ($departmentToFeatureObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					$em->remove($departmentToFeatureObject);
			    			$em->flush();
			    		} else {
				    		$itemProductFeatureGroupId = $productFeatureGroupId[$itemId];
				    		$itemDefaultProductFeatureId = $defaultProductFeatureId[$itemId];
				    		$itemDisplayOnFilter = 0;
						    if (isset($displayOnFilter[$itemId]))
						    {
							    $itemDisplayOnFilter = $displayOnFilter[$itemId];
						    }
						    $itemDisplayOnListing = 0;
						    if (isset($displayOnListing[$itemId]))
						    {
							    $itemDisplayOnListing = $displayOnListing[$itemId];
						    }
						    $itemDisplayOnProduct = 0;
						    if (isset($displayOnProduct[$itemId]))
						    {
							    $itemDisplayOnProduct = $displayOnProduct[$itemId];
						    }
						    $itemDisplayOrder = $displayOrder[$itemId];
			    			$departmentToFeatureObject->setProductFeatureGroupId($itemProductFeatureGroupId);
			    			$departmentToFeatureObject->setDefaultProductFeatureId($itemDefaultProductFeatureId);
			    			$departmentToFeatureObject->setDisplayOnFilter($itemDisplayOnFilter);
			    			$departmentToFeatureObject->setDisplayOnListing($itemDisplayOnListing);
			    			$departmentToFeatureObject->setDisplayOnProduct($itemDisplayOnProduct);
			    			$departmentToFeatureObject->setDisplayOrder($itemDisplayOrder);
			    			$em->persist($departmentToFeatureObject);
			    			$em->flush();
			    		}
	    			}
    			}
    		}
    		
    		// Run through all added items
    		if (sizeof($addItem) > 0)
    		{
    			foreach ($addItem as $itemId => $item)
    			{
    				$itemProductFeatureGroupId = $addProductFeatureGroupId[$itemId];
				    $itemDefaultProductFeatureId = $addDefaultProductFeatureId[$itemId];
				    $itemDisplayOnFilter = 0;
				    if (isset($addDisplayOnFilter[$itemId]))
				    {
					    $itemDisplayOnFilter = $addDisplayOnFilter[$itemId];
				    }
				    $itemDisplayOnListing = 0;
				    if (isset($addDisplayOnListing[$itemId]))
				    {
					    $itemDisplayOnListing = $addDisplayOnListing[$itemId];
				    }
				    $itemDisplayOnProduct = 0;
				    if (isset($addDisplayOnProduct[$itemId]))
				    {
					    $itemDisplayOnProduct = $addDisplayOnProduct[$itemId];
				    }
				    if ($itemProductFeatureGroupId)
				    {
					    $departmentToFeatureObject = new DepartmentToFeature();
	    				$departmentToFeatureObject->setActive(1);
	    				$departmentToFeatureObject->setDepartmentId($id);
	    				$departmentToFeatureObject->setProductFeatureGroupId($itemProductFeatureGroupId);
	    				$departmentToFeatureObject->setDefaultProductFeatureId($itemDefaultProductFeatureId);
		    			$departmentToFeatureObject->setDisplayOnFilter($itemDisplayOnFilter);
		    			$departmentToFeatureObject->setDisplayOnListing($itemDisplayOnListing);
		    			$departmentToFeatureObject->setDisplayOnProduct($itemDisplayOnProduct);
		    			$departmentToFeatureObject->setDisplayOrder(1);
		    			$em->persist($departmentToFeatureObject);
		    			$em->flush();
		    		}
    			}
    		}
    		 
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->getFlashBag()->add('success', 'The selected product features have been deleted.');
    		} else {
		    	$this->get('session')->getFlashBag()->add('success', 'The selected product features have been updated.');
	    	}
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_product_features', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_product_features', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the items
		$data['items'] = $em->getRepository('WebIlluminationAdminBundle:DepartmentToFeature')->findBy(array('departmentId' => $id), array('displayOrder' => 'ASC'));
		
		// Get the existing product feature group ids
		$existingProductFeatureGroupIds = array();
		foreach ($data['items'] as $item)
		{
			$existingProductFeatureGroupIds[] = $item->getProductFeatureGroupId();
		}
		$data['existingProductFeatureGroupIds'] = '|'.implode('|', $existingProductFeatureGroupIds).'|';
		
		// Get the product feature groups
		$data['productFeatureGroups'] = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->findBy(array('active' => 1, 'locale' => 'en'), array('productFeatureGroup' => 'ASC'));
		
		// Get the product features
		$data['productFeatures'] = $em->getRepository('WebIlluminationAdminBundle:ProductFeature')->findBy(array('active' => 1, 'locale' => 'en'), array('productFeature' => 'ASC'));
		
		// Get the departments
    	$departments = $service->getFullDepartmentList();
    	$data['departments'] = $departments;
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	    	    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemProductFeatures.html.twig', array('data' => $data));
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
    		$addItem = $request->request->get('add-item');
    		$addRedirectFrom = $request->request->get('add-redirect-from');
    		$addRedirectCode = $request->request->get('add-redirect-code');
    		$goBack = $request->request->get('go-back');
    		$delete = $request->request->get('delete');
    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$redirectObject = $em->getRepository('WebIlluminationAdminBundle:Redirect')->find($itemId);
	    			if ($redirectObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					$em->remove($redirectObject);
			    			$em->flush();
			    		} else {
				    		$itemRedirectFrom = $redirectFrom[$itemId];
				    		$itemRedirectCode = $redirectCode[$itemId];
			    			$redirectObject->setRedirectFrom($itemRedirectFrom);
			    			$redirectObject->setRedirectCode($itemRedirectCode);
			    			$em->persist($redirectObject);
			    			$em->flush();
			    		}
	    			}
    			}
    		}
    		
    		// Run through all added items
    		if (sizeof($addItem) > 0)
    		{
    			foreach ($addItem as $itemId => $item)
    			{
    				$itemRedirectFrom = $addRedirectFrom[$itemId];
				    $itemRedirectCode = $addRedirectCode[$itemId];
				    if ($itemRedirectFrom && $itemRedirectCode)
				    {
					    $redirectObject = new Redirect();
	    				$redirectObject->setObjectId($id);
	    				$redirectObject->setObjectType('department');
	    				$redirectObject->setRedirectFrom($itemRedirectFrom);
	    				$redirectObject->setRedirectTo($itemIndexObject->getUrl());
		    			$redirectObject->setRedirectCode($itemRedirectCode);
		    			$em->persist($redirectObject);
		    			$em->flush();
		    		}
    			}
    		}
    		    		
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->getFlashBag()->add('success', 'The selected redirects have been deleted.');
    		} else {
	    		$this->get('session')->getFlashBag()->add('success', 'The selected redirects have been updated.');
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
    
    // Update delivery
    public function updateDeliveryAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
		$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id, 'locale' => 'en'));
		$itemIndexObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Index')->findOneBy(array($this->settings['singleClass'].'Id' => $id, 'locale' => 'en'));
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
			if (!$itemObject || !$itemDescriptionObject)
			{
				// Notify user
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_delivery', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$deliveryBand = $request->request->get('delivery-band');
    		$existingDeliveryBand = $itemObject->getDeliveryBand();
    		$checkDeliveryBand = $request->request->get('check-delivery-band');
    		$existingCheckDeliveryBand = $itemObject->getCheckDeliveryBand();
    		$deliveryBandNotes = $request->request->get('delivery-band-notes');
    		$existingDeliveryBandNotes = $itemDescriptionObject->getDeliveryBandNotes();
    		$brandDeliveryBands = $request->request->get('brand-delivery-band');
    		$productDeliveryBands = $request->request->get('product-delivery-band');
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update objects
    		if (($deliveryBand != $existingDeliveryBand) || ($checkDeliveryBand != $existingCheckDeliveryBand) || ($deliveryBandNotes != $existingDeliveryBandNotes))
    		{
	    		$itemObject->setDeliveryBand($deliveryBand);
	    		$itemObject->setCheckDeliveryBand($checkDeliveryBand);
	    		if ($deliveryBand > 0)
	    		{
		    		$itemObject->setInheritedDeliveryBand($deliveryBand);
	    		}
	    		$em->persist($itemObject);
	    		$em->flush();
	    		$itemDescriptionObject->setDeliveryBandNotes($deliveryBandNotes);
	    		$em->persist($itemDescriptionObject);
	    		$em->flush();
	    		
	    		if ($deliveryBand != $existingDeliveryBand)
	    		{
		    		// Update the department delivery bands
		    		$service->updateDepartmentDeliveryBands($id);
		    		
		    		// Update the delivery bands for the products
		    		$service->updateProductDeliveryBands($id, 'en');
		    	}
	    		
	    		// Rebuild the index
	    		$service->rebuildDepartmentIndexObject($id, 'en');
	    	}
	    	
	    	// Update brand departments
	    	if (sizeof($brandDeliveryBands) > 0)
	    	{
		    	foreach ($brandDeliveryBands as $itemId => $brandDeliveryBand)
		    	{
			    	// Get the product objects
					$brandToDepartmentObject = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->find($itemId);
					if ($brandToDepartmentObject)
					{
						$brandToDepartmentObject->setDeliveryBand($brandDeliveryBand);
						$em->persist($brandToDepartmentObject);
			    		$em->flush();
		    		}
		    	}
		    	
		    	// Update the department delivery bands
	    		$service->updateDepartmentDeliveryBands($id);
	    		
	    		// Update the delivery bands for the products
	    		$service->updateProductDeliveryBands($id, 'en');
	    	}
	    	
	    	// Update products
	    	if (sizeof($productDeliveryBands) > 0)
	    	{
		    	foreach ($productDeliveryBands as $itemId => $productDeliveryBand)
		    	{
			    	// Get the product objects
					$productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($itemId);
					$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $itemId));
					if ($productObject && $productIndexObject)
					{
						if ($productDeliveryBand > 0)
						{
							$productObject->setDeliveryBand($productDeliveryBand);
							$productObject->setInheritedDeliveryBand($productDeliveryBand);
							$em->persist($productObject);
				    		$em->flush();
				    		$productIndexObject->setDeliveryBand($productDeliveryBand);
							$productIndexObject->setInheritedDeliveryBand($productDeliveryBand);
							$em->persist($productIndexObject);
				    		$em->flush();
				    	} else {
					    	$productObject->setDeliveryBand(0.0000);
							$productObject->setInheritedDeliveryBand(0.0000);
							$em->persist($productObject);
				    		$em->flush();
				    		$productIndexObject->setDeliveryBand(0.0000);
							$productIndexObject->setInheritedDeliveryBand(0.0000);
							$em->persist($productIndexObject);
				    		$em->flush();
				    		$productService->updateProductDeliveryBand($itemId, 'en');
				    	}
		    		}
		    	}
	    	}
    		    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('parentId' => $itemIndexObject->getParentId())));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_delivery', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemIndexObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_delivery', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the breadcrumbs
    	$data['breadcrumbs'] = $service->getBreadcrumbs($itemIndexObject->getParentId());
    	
    	// Get the brands
    	$data['brands'] = $service->getBrands($id, 'en');
    	
    	// Get the brand to departments
    	$data['brandToDepartments'] = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->findBy(array('departmentId' => $id));
    	
    	// Get the products
    	$data['products'] = $em->createQuery("SELECT pi.productId, pi.deliveryBand, pi.inheritedDeliveryBand, pi.pageTitle, pi.brand FROM WebIlluminationAdminBundle:ProductIndex pi WHERE pi.departmentIds LIKE '%|".$id."|%' ORDER BY pi.pageTitle ASC")->getResult();
	        	    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemDelivery.html.twig', array('data' => $data));
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
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_search_engine_optimsation', array('id' => $id)));
    		}
			
    		// Get submitted data
    		$pageTitle = trim($request->request->get('page-title'));
    		$brandToDepartmentPageTitle = $request->request->get('brand-to-department-page-title');
    		$header = trim($request->request->get('header'));
    		$brandToDepartmentHeader = $request->request->get('brand-to-department-header');
    		$metaDescription = trim($request->request->get('meta-description'));
    		$brandToDepartmentMetaDescription = $request->request->get('brand-to-department-meta-description');
    		$searchWords = trim($request->request->get('search-words'));
    		$brandToDepartmentSearchWords = $request->request->get('brand-to-department-search-words');
    		$googleDepartment = $request->request->get('google-department');
    		$existingUrl = $itemIndexObject->getUrl();
    		$url = $seoService->createUrl(trim($request->request->get('url')), $existingUrl);
    		$brandToDepartmentUrl = $request->request->get('brand-to-department-url');
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update objects
    		$itemDescriptionObject->setPageTitle($pageTitle);
    		$itemDescriptionObject->setHeader($header);
    		$itemDescriptionObject->setMetaDescription($metaDescription);
    		$itemDescriptionObject->setMetaKeywords($searchWords);
    		$itemDescriptionObject->setSearchWords($searchWords);
    		$itemDescriptionObject->setGoogleDepartment($googleDepartment);
    		$em->persist($itemDescriptionObject);
    		$em->flush();
    		$itemRoutingObject->setUrl($url);
    		$em->persist($itemRoutingObject);
    		$em->flush();
    		
    		// Setup any redirects if required
    		if ($existingUrl != $url)
    		{
				$seoService->updateRedirects($id, 'department', $existingUrl, $url);
			}
    		
    		// Update the brand departments
    		foreach ($brandToDepartmentPageTitle as $brandId => $brandToDepartmentPageTitleData)
    		{
    			// Update the brand department
	    		$brandToDepartmentObject = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->findOneBy(array('brandId' => $brandId, 'departmentId' => $id));
	    		if (!$brandToDepartmentObject)
	    		{
	    			$brandToDepartmentObject = new BrandToDepartment();
			    	$brandToDepartmentObject->setBrandId($brandId);
			    	$brandToDepartmentObject->setDepartmentId($id);
			    	$brandToDepartmentObject->setDeliveryBand(0.0000);
	    		}
	    		$brandToDepartmentObject->setPageTitle($brandToDepartmentPageTitle[$brandId]);
	    		$brandToDepartmentObject->setHeader($brandToDepartmentHeader[$brandId]);
	    		$brandToDepartmentObject->setMetaDescription($brandToDepartmentMetaDescription[$brandId]);
	    		$brandToDepartmentObject->setMetaKeywords($brandToDepartmentSearchWords[$brandId]);
	    		$brandToDepartmentObject->setSearchWords($brandToDepartmentSearchWords[$brandId]);
	    		$em->persist($brandToDepartmentObject);
	    		$em->flush();
	    		
	    		// Update the routing
	    		$brandToDepartmentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $brandToDepartmentObject->getId(), 'objectType' => 'brandToDepartment', 'locale' => 'en'));
	    		if (!$brandToDepartmentRoutingObject)
	    		{
	    			$brandToDepartmentRoutingObject = new Routing();
			    	$brandToDepartmentRoutingObject->setObjectId($brandToDepartmentObject->getId());
			    	$brandToDepartmentRoutingObject->setObjectType('brandToDepartment');
			    	$brandToDepartmentRoutingObject->setLocale('en');
			    	$brandToDepartmentRoutingObject->setUrl('');
			    	$em->persist($brandToDepartmentRoutingObject);
			    	$em->flush();
	    		}
	    		$existingUrl = $brandToDepartmentRoutingObject->getUrl();
	    		$url = $seoService->createUrl(trim($brandToDepartmentUrl[$brandId]), $existingUrl);
	    		$brandToDepartmentRoutingObject->setUrl($url);
		    	$em->persist($brandToDepartmentRoutingObject);
		    	$em->flush();
		    	
		    	// Setup any redirects if required
		    	if ($existingUrl != $url)
    			{
					$seoService->updateRedirects($brandToDepartmentObject->getId(), 'brandToDepartment', $existingUrl, $url);
				}
    		}
    		    	
    		// Rebuild the routing	    		
    		$service->rebuildRouting($id, 'en');    			
    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
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
    	
    	// Get the brands
    	$data['brands'] = $service->getBrands($id, 'en');
    	
    	// Get the brand to departments
    	$data['brandToDepartments'] = $em->getRepository('WebIlluminationAdminBundle:BrandToDepartment')->findBy(array('departmentId' => $id));
    	
    	// Get the brand to departments routings
    	$brandToDepartmentsRouting = array();
    	foreach ($data['brandToDepartments'] as $brandToDepartmentObject)
    	{
	    	$brandToDepartmentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $brandToDepartmentObject->getId(), 'objectType' => 'brandToDepartment', 'locale' => 'en'));
	    	if ($brandToDepartmentRoutingObject)
	    	{
		    	$brandToDepartmentsRouting[$brandToDepartmentObject->getId()] = $brandToDepartmentRoutingObject->getUrl();
	    	}
    	}
    	$data['brandToDepartmentsRouting'] = $brandToDepartmentsRouting;
	        	    	
    	// Get the taxonomy
    	$taxonomy = array();
    	$taxonomyGoogle = $em->getRepository('WebIlluminationAdminBundle:Taxonomy')->findBy(array('objectType' => 'google', 'locale' => 'en'), array('name' => 'ASC'));
    	$taxonomy['google'] = $taxonomyGoogle;
    	$data['taxonomy'] = $taxonomy;
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemSearchEngineOptimisation.html.twig', array('data' => $data));
    }    
}