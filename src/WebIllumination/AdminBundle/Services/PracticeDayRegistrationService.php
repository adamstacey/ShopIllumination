<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class PracticeDayRegistrationService {

	protected $container;
	protected $listingSortOrder;
	protected $listingSort;
	protected $listingOrder;
	protected $listingMaxResults;

    public function __construct($container)
    {
        $this->container = $container;
        $this->listingSortOrder = 'name:ASC';
        $this->listingSort = 'name';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
    }
    
    // Initialise the admin practice day registration session
    public function initialiseAdminPracticeDayRegistrationSession()
    {	
  		// Get the settings session
    	$settings = $this->container->get('session')->get('settings');
    	
    	// Get the practice day registration settings
    	$practiceDayRegistrationSettings = $settings['admin']['practiceDayRegistrations'];
    	
    	// If there is no settings setup the session
    	if (!is_array($practiceDayRegistrationSettings))
    	{
    		// Setup the settings
    		$practiceDayRegistrationSettings = array();
   			$practiceDayRegistrationSettings['listingSortOrder'] = $this->listingSortOrder;
   			$practiceDayRegistrationSettings['listingSort'] = $this->listingSort;
   			$practiceDayRegistrationSettings['listingOrder'] = $this->listingOrder;
   			$practiceDayRegistrationSettings['listingMaxResults'] = $this->listingMaxResults;
   		} else {
   			if (!isset($practiceDayRegistrationSettings['listingSortOrder']))
   			{
   				$practiceDayRegistrationSettings['listingSortOrder'] = $this->listingSortOrder;
   			}
   			if (!isset($practiceDayRegistrationSettings['listingSort']))
   			{
   				$practiceDayRegistrationSettings['listingSort'] = $this->listingSort;
   			}
   			if (!isset($practiceDayRegistrationSettings['listingOrder']))
   			{
   				$practiceDayRegistrationSettings['listingOrder'] = $this->listingOrder;
   			}
   			if (!isset($practiceDayRegistrationSettings['listingMaxResults']))
   			{
   				$practiceDayRegistrationSettings['listingMaxResults'] = $this->listingMaxResults;
   			}
    	}
    	
    	// Update the session
    	$settings['admin']['practiceDayRegistrations'] = $practiceDayRegistrationSettings;
    	$this->container->get('session')->set('settings', $settings);
    	
    	return true;
    }    
    
    // Get listing
    public function getListing($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip, $sort, $order, $page, $maxResults)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$systemService = $this->container->get('web_illumination_admin.system_service');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	    	
    	// Calculate the first result
    	$firstResult = ($page - 1) * $maxResults;
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pdr');
    	$qb->from('WebIlluminationAdminBundle:PracticeDayRegistration', 'pdr');
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.name', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($membershipNumber != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.membershipNumber', $qb->expr()->literal('%'.$membershipNumber.'%')));
    	}
    	if ($emailAddress != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.emailAddress', $qb->expr()->literal('%'.$emailAddress.'%')));
    	}
    	if ($contactNumber != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.contactNumber', $qb->expr()->literal('%'.$contactNumber.'%')));
    	}
    	if ($postZipCode != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.postZipCode', $qb->expr()->literal('%'.$postZipCode.'%')));
    	}
    	if ($age != '')
    	{
    		$options = explode('|', $age);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.age', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.age', $qb->expr()->literal($age)));
    		}
    	}
    	if ($day != '')
    	{
    		$options = explode('|', $day);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.day', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.day', $qb->expr()->literal($day)));
    		}
    	}
    	if ($vip != '')
    	{
    		$options = explode('|', $vip);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.vip', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.vip', $qb->expr()->literal($vip)));
    		}
    	}
    	$qb->addOrderBy('pdr.'.$sort, $order);
    	$qb->setFirstResult($firstResult);
	   	$qb->setMaxResults($maxResults);	   	
    	$query = $qb->getQuery();

		// Get the membership cards
		$membershipCards = $query->getResult();
				
   		return $membershipCards;
    }
    
    // Get listing count
    public function getListingCount($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("pdr.id"));
    	$qb->from('WebIlluminationAdminBundle:PracticeDayRegistration', 'pdr');
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.name', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($membershipNumber != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.membershipNumber', $qb->expr()->literal('%'.$membershipNumber.'%')));
    	}
    	if ($emailAddress != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.emailAddress', $qb->expr()->literal('%'.$emailAddress.'%')));
    	}
    	if ($contactNumber != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.contactNumber', $qb->expr()->literal('%'.$contactNumber.'%')));
    	}
    	if ($postZipCode != '')
    	{
    		$qb->andWhere($qb->expr()->like('pdr.postZipCode', $qb->expr()->literal('%'.$postZipCode.'%')));
    	}
    	if ($age != '')
    	{
    		$options = explode('|', $age);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.age', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.age', $qb->expr()->literal($age)));
    		}
    	}
    	if ($day != '')
    	{
    		$options = explode('|', $day);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.day', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.day', $qb->expr()->literal($day)));
    		}
    	}
    	if ($vip != '')
    	{
    		$options = explode('|', $vip);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pdr.vip', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pdr.vip', $qb->expr()->literal($vip)));
    		}
    	}
    	$query = $qb->getQuery();
		
		// Get the listing count
		$listingCount = $query->getSingleScalarResult();
		
   		return $listingCount;
    }
    
    // Get listing pagination
    public function getListingPagination($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip, $maxResults)
    {    	    	
    	// Get the number of results
    	$listingCount = $this->getListingCount($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip);
    	
    	// Check if there is only one page of results
    	if ($listingCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$pagination = ceil($listingCount / $maxResults);
    	
   		return $pagination;
    }
}