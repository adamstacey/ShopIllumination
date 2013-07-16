<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Bug;

class BugsController extends Controller
{
	protected $settings;
	protected $listing;
	protected $filter;

    public function __construct()
    {
    	// Setup settings
    	$settings = array();
    	$settings['singleTitle'] = 'Bug';
		$settings['multipleTitle'] = 'Bugs';
		$settings['singleDescription'] = 'bug';
		$settings['multipleDescription'] = 'bugs';
		$settings['singleClass'] = 'bug';
		$settings['multipleClass'] = 'bugs';
		$settings['singlePath'] = 'bug';
		$settings['multiplePath'] = 'bugs';
		$settings['singleModel'] = 'Bug';
		$settings['multipleModel'] = 'Bugs';
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
    	$filter['id'] = '';
    	$filter['bug'] = '';
		$filter['dateFrom'] = '';
		$filter['dateTo'] = '';
		$filter['dateFromFormatted'] = '';
		$filter['dateToFormatted'] = '';
		$filter['statuses'] = '';
		$filter['priorities'] = '';
		$filter['assignedToContactIds'] = '';
		$filter['ownerContactIds'] = '';
		$filter['empty'] = 1;
		$this->filter = $filter;
    }
    
	// Index
    public function indexAction(Request $request)
    {
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
		
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
    		$priority = $request->request->get('priority');
    		$assignedToContactId = $request->request->get('assigned-to-contact-id');
    		$displayOrder = $request->request->get('display-order');
    		$delete = $request->request->get('delete');
    		
    		// Check if the display order needs updating
			if ($this->listing['sortable'] && ($delete < 1))
			{
    			foreach ($displayOrder as $id => $value)
    			{
    				// Get the item
    				$itemObject = $em->getRepository('KAC\SiteBundle\Entity'.$this->settings['singleModel'])->find($id);
    				if ($itemObject)
    				{
		    			$itemObject->setDisplayOrder($value);
		    			$em->persist($itemObject);
		    			$em->flush();
		    		}
    			}
			}
    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $id => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('KAC\SiteBundle\Entity'.$this->settings['singleModel'])->find($id);
	    			if ($itemObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
			    			$em->remove($itemObject);
			    			$em->flush();
			    		} else {
				    		$itemStatus = $status[$id];
			    			$itemPriority = $priority[$id];
			    			$itemAssignedToContactId = $assignedToContactId[$id];
			    			$itemObject->setStatus($itemStatus);
			    			$itemObject->setPriority($itemPriority);
			    			$itemObject->setAssignedToContactId($itemAssignedToContactId);
			    			$em->persist($itemObject);
			    			$em->flush();
			    		}
	    			}
    			}
    		} else {
    			if (!$this->listing['sortable'])
    			{
		    		// Notify user
		    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
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
    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
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
			$filter['id'] = '';
			$filter['bug'] = '';
			if (is_numeric($this->listing['search']))
			{
				$filter['id'] = $this->listing['search'];
			} else {
				$filter['bug'] = $this->listing['search'];
			}
			$filter['dateFrom'] = '';
			$filter['dateTo'] = '';
			$filter['dateFromFormatted'] = '';
			$filter['dateToFormatted'] = '';
			$filter['statuses'] = '';
			$filter['priorities'] = '';
			$filter['assignedToContactIds'] = '';
			$filter['ownerContactIds'] = '';
			$filter['empty'] = 1;
			$this->filter = $filter;
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['statistics'] = array();
    	
    	// Get any statistics
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('1')));
		$statisticCount = $qb->getQuery()->getSingleScalarResult();
		$statistic = array();
		$statistic['description'] = 'Not Started';
		$statistic['filterUpdateObject'] = 'update-listing-statuses';
		$statistic['filterValue'] = '1';
		$statistic['colour'] = 'red';
		$statistic['statistic'] = $statisticCount;
		$data['statistics'][] = $statistic;
		
		$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('2')));
		$statisticCount = $qb->getQuery()->getSingleScalarResult();
		$statistic = array();
		$statistic['description'] = 'More Information Required';
		$statistic['filterUpdateObject'] = 'update-listing-statuses';
		$statistic['filterValue'] = '2';
		$statistic['colour'] = 'blue';
		$statistic['statistic'] = $statisticCount;
		$data['statistics'][] = $statistic;
		
		$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('3')));
		$statisticCount = $qb->getQuery()->getSingleScalarResult();
		$statistic = array();
		$statistic['description'] = 'In Progress';
		$statistic['filterUpdateObject'] = 'update-listing-statuses';
		$statistic['filterValue'] = '3';
		$statistic['colour'] = 'orange';
		$statistic['statistic'] = $statisticCount;
		$data['statistics'][] = $statistic;
		
		$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('4')));
		$statisticCount = $qb->getQuery()->getSingleScalarResult();
		$statistic = array();
		$statistic['description'] = 'Ready for Testing';
		$statistic['filterUpdateObject'] = 'update-listing-statuses';
		$statistic['filterValue'] = '4';
		$statistic['colour'] = 'yellow';
		$statistic['statistic'] = $statisticCount;
		$data['statistics'][] = $statistic;
		
		$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('5')));
		$statisticCount = $qb->getQuery()->getSingleScalarResult();
		$statistic = array();
		$statistic['description'] = 'Closed';
		$statistic['filterUpdateObject'] = 'update-listing-statuses';
		$statistic['filterValue'] = '5';
		$statistic['colour'] = 'grey';
		$statistic['statistic'] = $statisticCount;
		$data['statistics'][] = $statistic;
    	
    	// Get the number of items
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	if ($this->filter['bug'])
    	{
    		$qb->andWhere($qb->expr()->like('i.bug', $qb->expr()->literal('%'.$this->filter['bug'].'%')));
    	}
    	if ($this->filter['id'])
    	{
    		$qb->andWhere($qb->expr()->like('i.id', $qb->expr()->literal('%'.$this->filter['id'].'%')));
    	}
    	if ($this->filter['dateFrom'])
    	{
    		$qb->andWhere($qb->expr()->gte('i.createdAt', $qb->expr()->literal($this->filter['dateFrom']." 00:00:00")));
    	}
    	if ($this->filter['dateTo'])
    	{
    		$qb->andWhere($qb->expr()->lte('i.createdAt', $qb->expr()->literal($this->filter['dateTo']." 23:59:59")));
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
    	if ($this->filter['priorities'])
    	{
    		$option = $this->filter['priorities'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.priority', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.priority', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['assignedToContactIds'])
    	{
    		$option = $this->filter['assignedToContactIds'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.assignedToContactId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.assignedToContactId', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['ownerContactIds'])
    	{
    		$option = $this->filter['ownerContactIds'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.ownerContactId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.ownerContactId', $qb->expr()->literal($option)));
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
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	if ($this->filter['id'])
    	{
    		$qb->andWhere($qb->expr()->like('i.id', $qb->expr()->literal('%'.$this->filter['id'].'%')));
    	}
    	if ($this->filter['bug'])
    	{
    		$qb->andWhere($qb->expr()->like('i.bug', $qb->expr()->literal('%'.$this->filter['bug'].'%')));
    	}
    	if ($this->filter['dateFrom'])
    	{
    		$qb->andWhere($qb->expr()->gte('i.createdAt', $qb->expr()->literal($this->filter['dateFrom']." 00:00:00")));
    	}
    	if ($this->filter['dateTo'])
    	{
    		$qb->andWhere($qb->expr()->lte('i.createdAt', $qb->expr()->literal($this->filter['dateTo']." 23:59:59")));
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
    	if ($this->filter['priorities'])
    	{
    		$option = $this->filter['priorities'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.priority', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.priority', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['assignedToContactIds'])
    	{
    		$option = $this->filter['assignedToContactIds'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.assignedToContactId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.assignedToContactId', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['ownerContactIds'])
    	{
    		$option = $this->filter['ownerContactIds'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.ownerContactId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.ownerContactId', $qb->expr()->literal($option)));
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
    	
    	// Get the administrators
    	$administrators = $em->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array('objectType' => 'administrator'), array('firstName' => 'ASC', 'lastName' => 'ASC'));
    	$data['administrators'] = $administrators;
    	
    	// Get the current administrator logged in
    	$administrator = $this->get('session')->get('admin');
    	$data['administrator'] = $administrator;
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':index.html.twig', array('data' => $data));
    }
    
    // Update listing
    public function updateListingAction(Request $request)
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
    	return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    }
    
    // Add
    public function addAction(Request $request)
    {
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
		
    	// Add
    	if ($request->getMethod() == 'POST')
    	{    		
    		// Get submitted data
    		$bug = $request->request->get('bug');
    		$testScenario = $request->request->get('test-scenario');
    		$operatingSystem = $request->request->get('operating-system');
    		$internetBrowser = $request->request->get('internet-browser');
    		$url = ($request->request->get('url') == 'http://'?'':$request->request->get('url'));
    		$priority = $request->request->get('priority');
    		$ownerContactId = $request->request->get('owner-contact-id');
    		$addAnother = $request->request->get('add-another');
    		
    		// Add object
    		$bugObject = new Bug();
    		$bugObject->setBug($bug);
    		$bugObject->setTestScenario($testScenario);
    		$bugObject->setOperatingSystem($operatingSystem);
    		$bugObject->setInternetBrowser($internetBrowser);
    		$bugObject->setUrl($url);
    		$bugObject->setStatus(1);
    		$bugObject->setPriority($priority);
    		$bugObject->setOwnerContactId($ownerContactId);
    		$bugObject->setAssignedToContactId(9); // Assigned to Adam Stacey by default
    		$bugObject->setDisplayOrder(0);
    		$em->persist($bugObject);
    		$em->flush();
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'Thank you, the bug has been reported and assigned to the development team.');
    		
    		// Forward
    		if ($addAnother > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_bugs_add'));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_bugs'));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['listing'] = $this->listing;
    	$data['formAction'] = $this->get('router')->generate('admin_bugs_add');
    	$data['mode'] = 'add';
    	
    	// Get the administrators
    	$administrators = $em->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array('objectType' => 'administrator'), array('firstName' => 'ASC', 'lastName' => 'ASC'));
    	$data['administrators'] = $administrators;
    	
    	// Get the current administrator logged in
    	$administrator = $this->get('session')->get('admin');
    	$data['administrator'] = $administrator;
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }
    
    // Update
    public function updateAction(Request $request, $id)
    {
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
		
		// Get the item
		$bugObject = $em->getRepository('KAC\SiteBundle\Entity'.$this->settings['singleModel'])->find($id);
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{    		
    		// Get submitted data
    		$bug = $request->request->get('bug');
    		$testScenario = $request->request->get('test-scenario');
    		$operatingSystem = $request->request->get('operating-system');
    		$internetBrowser = $request->request->get('internet-browser');
    		$url = ($request->request->get('url') == 'http://'?'':$request->request->get('url'));
    		$status = $request->request->get('status');
    		$priority = $request->request->get('priority');
    		$ownerContactId = $request->request->get('owner-contact-id');
    		$assignedToContactId = $request->request->get('assigned-to-contact-id');
    		$goBack = $request->request->get('go-back');
    		
    		// Add object
    		$bugObject->setBug($bug);
    		$bugObject->setTestScenario($testScenario);
    		$bugObject->setOperatingSystem($operatingSystem);
    		$bugObject->setInternetBrowser($internetBrowser);
    		$bugObject->setUrl($url);
    		$bugObject->setStatus($status);
    		$bugObject->setPriority($priority);
    		$bugObject->setOwnerContactId($ownerContactId);
    		$bugObject->setAssignedToContactId($assignedToContactId);
    		$em->persist($bugObject);
    		$em->flush();
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'Bug #'.$id.' has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_bugs'));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_bugs_update', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['listing'] = $this->listing;
    	$data['item'] = $bugObject;
    	$data['formAction'] = $this->get('router')->generate('admin_bugs_update', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the administrators
    	$administrators = $em->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array('objectType' => 'administrator'), array('firstName' => 'ASC', 'lastName' => 'ASC'));
    	$data['administrators'] = $administrators;
    	
    	// Get the current administrator logged in
    	$administrator = $this->get('session')->get('admin');
    	$data['administrator'] = $administrator;
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }    
}