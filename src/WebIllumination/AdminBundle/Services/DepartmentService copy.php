<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\ObjectIndex;

class DepartmentService {

	protected $container;
	protected $singleItemTitle;
	protected $multipleItemsTitle;
	protected $singleItemDescription;
	protected $multipleItemsDescription;
	protected $singleItemClass;
	protected $multipleItemsClass;
	protected $singleItemPath;
	protected $multipleItemsPath;
	protected $listingSortOrder;
	protected $listingSort;
	protected $listingOrder;
	protected $listingMaxResults;

    public function __construct($container)
    {
        $this->container = $container;
        $this->singleItemTitle = 'Department';
        $this->multipleItemsTitle = 'Departments';
        $this->singleItemDescription = 'department';
        $this->multipleItemsDescription = 'departments';
        $this->singleItemClass = 'department';
        $this->multipleItemsClass = 'departments';
        $this->singleItemPath = 'department';
        $this->multipleItemsPath = 'departments';
        $this->singleItemModel = 'Department';
        $this->multipleItemsModel = 'Departments';
        $this->listingSortOrder = 'dd.department:ASC';
        $this->listingSort = 'dd.department';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
    }
    
    // Initialise the admin order session
    public function initialiseAdminDepartmentSession()
    {	
  		// Get the settings session
    	$sessionSettings = $this->container->get('session')->get('settings');
    	if (!isset($sessionSettings['admin']['departments']))
    	{
    		// Setup the settings
    		$settings = array();
   			$settings['singleItemTitle'] = $this->singleItemTitle;
   			$settings['multipleItemsTitle'] = $this->multipleItemsTitle;
   			$settings['singleItemDescription'] = $this->singleItemDescription;
   			$settings['multipleItemsDescription'] = $this->multipleItemsDescription;
   			$settings['singleItemClass'] = $this->singleItemClass;
   			$settings['multipleItemsClass'] = $this->multipleItemsClass;
   			$settings['singleItemPath'] = $this->singleItemPath;
   			$settings['multipleItemsPath'] = $this->multipleItemsPath;
   			$settings['singleItemModel'] = $this->singleItemModel;
   			$settings['multipleItemsModel'] = $this->multipleItemsModel;
   			$settings['listingSortOrder'] = $this->listingSortOrder;
   			$settings['listingSort'] = $this->listingSort;
   			$settings['listingOrder'] = $this->listingOrder;
   			$settings['listingMaxResults'] = $this->listingMaxResults;
    	} else {
    		$settings = $sessionSettings['admin']['departments'];
    	}
    	
    	// Get the filters session
    	$sessionFilters = $this->container->get('session')->get('filters');
    	if (!isset($sessionFilters['admin']['departments']))
    	{
    		// Setup the filters
    		$filters = array();
    		$filters['status'] = '';
    		$filters['hidePrices'] = '';
    		$filters['showPricesOutOfHours'] = '';
    		$filters['membershipCardDiscountAvailable'] = '';
    		$filters['name'] = '';
    		$filters['description'] = '';
    		$filters['department'] = '';
   		} else {
   			$filters = $sessionFilters['admin']['departments'];
   		}
    	
    	// Update the session
    	$sessionSettings['admin']['departments'] = $settings;
    	$sessionFilters['admin']['departments'] = $filters;
    	$this->container->get('session')->set('settings', $sessionSettings);
    	$this->container->get('session')->set('filters', $sessionFilters);
    	
    	return true;
    }
    
    // Get listing
    public function getAdminListing($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$systemService = $this->container->get('web_illumination_admin.system_service');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	if ($department > 0)
    	{
    		$departments = $this->getAllDepartments($department, $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, false, false, false, false, 0, 0);
    	} else {
    		$departments = $this->getAllDepartments(0, $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, false, false, false, false, 0, 0);
    	}
    	
    	/*$qb->select(array('d, dd'));
    	$qb->from('WebIllumination\SiteBundle\Entity\Department', 'd');
    	$qb->innerJoin('d', 'WebIllumination\SiteBundle\Entity\DepartmentDescription', 'dd', 'ON', $qb->expr()->eq('d.id', 'dd.departmentId'));
    	if ($status != '')
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.status', $qb->expr()->literal($status)));
    		}
    	}
    	if ($hidePrices != '')
    	{
    		$options = explode('|', $hidePrices);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.hidePrices', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.hidePrices', $qb->expr()->literal($hidePrices)));
    		}
    	}
    	if ($showPricesOutOfHours != '')
    	{
    		$options = explode('|', $showPricesOutOfHours);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.showPricesOutOfHours', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.showPricesOutOfHours', $qb->expr()->literal($showPricesOutOfHours)));
    		}
    	}
    	if ($membershipCardDiscountAvailable != '')
    	{
    		$options = explode('|', $membershipCardDiscountAvailable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.membershipCardDiscountAvailable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.membershipCardDiscountAvailable', $qb->expr()->literal($membershipCardDiscountAvailable)));
    		}
    	}
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('dd.department', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($description != '')
    	{
    		$qb->andWhere($qb->expr()->like('dd.description', $qb->expr()->literal('%'.$description.'%')));
    	}
		if ($department)
    	{
    		$departments = explode('|', $department);
    		if (sizeof($departments) > 1)
    		{
    			$departmentsExpression = $qb->expr()->orx();
    			foreach ($departments as $department)
    			{
    				$departmentsExpression->add($qb->expr()->like('d.departmentPath', $qb->expr()->literal('%|'.$department.'|%')));
    			}
    			$qb->andWhere($departmentsExpression);
    		} else {
    			$qb->andWhere($qb->expr()->like('d.departmentPath', $qb->expr()->literal('%|'.$department.'|%')));
    		}
    	}
    	$qb->addOrderBy($sort, $order);
    	$qb->setFirstResult($firstResult);
	   	$qb->setMaxResults($maxResults);	   	
    	$query = $qb->getQuery();*/

		// Get the departments
		//$departments = $em->createQuery($query)->getResult();
				
   		return $departments;
    }
    
    // Get listing count
    public function getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("d.id"));
    	$qb->from('WebIllumination\SiteBundle\Entity\Department', 'd');
    	$qb->join('d', 'WebIllumination\SiteBundle\Entity\DepartmentDescription', 'dd', 'd.id = dd.departmentId');
    	if ($status != '')
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.status', $qb->expr()->literal($status)));
    		}
    	}
    	if ($hidePrices != '')
    	{
    		$options = explode('|', $hidePrices);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.hidePrices', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.hidePrices', $qb->expr()->literal($hidePrices)));
    		}
    	}
    	if ($showPricesOutOfHours != '')
    	{
    		$options = explode('|', $showPricesOutOfHours);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.showPricesOutOfHours', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.showPricesOutOfHours', $qb->expr()->literal($showPricesOutOfHours)));
    		}
    	}
    	if ($membershipCardDiscountAvailable != '')
    	{
    		$options = explode('|', $membershipCardDiscountAvailable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('d.membershipCardDiscountAvailable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('d.membershipCardDiscountAvailable', $qb->expr()->literal($membershipCardDiscountAvailable)));
    		}
    	}
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('dd.department', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($description != '')
    	{
    		$qb->andWhere($qb->expr()->like('dd.description', $qb->expr()->literal('%'.$description.'%')));
    	}
		if ($department)
    	{
    		$departments = explode('|', $department);
    		if (sizeof($departments) > 1)
    		{
    			$departmentsExpression = $qb->expr()->orx();
    			foreach ($departments as $department)
    			{
    				$departmentsExpression->add($qb->expr()->like('d.departmentPath', $qb->expr()->literal('%|'.$department.'|%')));
    			}
    			$qb->andWhere($departmentsExpression);
    		} else {
    			$qb->andWhere($qb->expr()->like('d.departmentPath', $qb->expr()->literal('%|'.$department.'|%')));
    		}
    	}
    	$query = $qb->getQuery();
		
		// Get the listing count
		$listingCount = $query->getSingleScalarResult();
		
   		return $listingCount;
    }
        
    // Get listing pagination
    public function getAdminListingPagination($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department, $sort, $order, $page, $maxResults)
    {    	
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Get the number of results
    	$listingCount = $this->getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $department);
    	
    	// Check if there is only one page of results
    	if ($listingCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$pagination = ceil($listingCount / $maxResults);
    	
   		return $pagination;
    }
    
    // Get a department
    public function getDepartment($id, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$seoService = $this->container->get('web_illumination_admin.seo_service');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Check if the department is already stored
    	$departmentIndexObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ObjectIndex')->findOneBy(array('objectKey' => $id, 'objectType' => 'department', 'locale' => $locale));
    	    	
   		// Check if the department needs rebuilding
   		$rebuildDepartment = true;
   		if ($departmentIndexObject)
   		{
   			if ($departmentIndexObject->getRebuild() < 1)
   			{
   				$rebuildDepartment = false;
   			}
   		}
   		
   		// Get the department
   		if ($rebuildDepartment)
   		{
	   		// Setup the department
	    	$department = array();
		   		
	   		// Get the department
	   		$departmentObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->find($id);
	    	$departmentDescriptionObject = $em->getRepository('WebIllumination\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
	    	if (!$departmentObject || !$departmentDescriptionObject)
		    {
	        	return false;
	    	}
	    	$department['id'] = $departmentObject->getId();
	    	$department['parentId'] = $departmentObject->getParentId();
	    	$department['status'] = $departmentObject->getStatus();
	    	$department['departmentPath'] = $departmentObject->getDepartmentPath();
	    	$department['hidePrices'] = $departmentObject->getHidePrices();
	    	$department['showPricesOutOfHours'] = $departmentObject->getShowPricesOutOfHours();
	    	$department['membershipCardDiscountAvailable'] = $departmentObject->getMembershipCardDiscountAvailable();
	    	$department['maximumMembershipCardDiscount'] = $departmentObject->getMaximumMembershipCardDiscount();
	    	$department['displayOrder'] = $departmentObject->getDisplayOrder();
	    	$department['departmentId'] = $departmentDescriptionObject->getDepartmentId();
	    	$department['locale'] = $departmentDescriptionObject->getLocale();
	    	$department['department'] = $departmentDescriptionObject->getName();
	    	$department['description'] = $departmentDescriptionObject->getDescription();
	    	$department['shortDescription'] = $departmentDescriptionObject->getShortDescription();
	    	$department['menuTitle'] = $departmentDescriptionObject->getMenuTitle();
	    	$department['pageTitle'] = $departmentDescriptionObject->getPageTitle();
	    	$department['header'] = $departmentDescriptionObject->getHeader();
	    	$department['metaDescription'] = $departmentDescriptionObject->getMetaDescription();
	    	$department['metaKeywords'] = $departmentDescriptionObject->getMetaKeywords();
	    	$department['searchWords'] = $departmentDescriptionObject->getSearchWords();
	    	$department['updatedAt'] = $departmentDescriptionObject->getUpdatedAt();
	    	
	    	// Get the product count
	    	$department['productCount'] = $productService->getProductListingCount($departmentObject->getId(), false, false, false, false, 0, 0, $currencyCode, 'GBP');
	    	
	    	// Get the routing
	    	$routingObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'department', 'locale' => $locale));
	    	if (!$routingObject)
	    	{
	    		// Add routing
	    		$routingObject = new Routing();
	    		$routingObject->setObjectId($id);
	    		$routingObject->setObjectType('department');
	    		$routingObject->setLocale('en');
	    		$routingObject->setUrl($seoService->createUrl($departmentDescriptionObject->getHeader()));
			    $em->persist($routingObject);
			    $em->flush();
	    	}
	    	$department['url'] = $routingObject->getUrl();
				    
			// Check for the department object
	   		if (!$departmentIndexObject)
	   		{
	   			$departmentIndexObject = new ObjectIndex();
	   			$departmentIndexObject->setObjectKey($id);
	   			$departmentIndexObject->setObjectType('department');
	   			$departmentIndexObject->setLocale($locale);
	   		}
	   		
	   		// Update the department object
	   		$departmentIndexObject->setObjectData(base64_encode(serialize($department)));
	   		$departmentIndexObject->setRebuild(0);
	   		$em->persist($departmentIndexObject);
		    $em->flush();
   		}   		
   		
    	return unserialize(base64_decode($departmentIndexObject->getObjectData()));
    }
    
    // Get a department
    public function getDepartmentOld($id, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Check if the object is stored
    	$department = apc_fetch('ride_direct_department_'.$id);
    	if (!$department)
    	{
	    	// Get the services
	    	$doctrineService = $this->container->get('doctrine');
	    	$seoService = $this->container->get('web_illumination_admin.seo_service');
	    	$productService = $this->container->get('web_illumination_admin.product_service');
	    	
	    	// Get the entity manager
	    	$em = $doctrineService->getEntityManager();
	    	/*
	    	// Check if the department is already stored
	    	$departmentObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ObjectIndex')->findOneBy(array('objectKey' => $id, 'objectType' => 'department', 'locale' => $locale));
	    	    	
	   		// Check if the department needs rebuilding
	   		$rebuildDepartment = true;
	   		if ($departmentObject)
	   		{
	   			if ($departmentObject->getRebuild() < 1)
	   			{
	   				$rebuildDepartment = false;
	   			}
	   		}
	   		
	   		// Get the department
	   		if ($rebuildDepartment)
	   		{
	   		*/
		   		// Setup the department
		    	$department = array();
		   		
		   		// Get the department
		   		$department['department'] = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->find($id);
		    	$department['description'] = $em->getRepository('WebIllumination\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
		    	if (!$department['department'] || !$department['description'])
			    {
		        	return false;
		    	}
		   	    	    	
		    	// Get the routing
		    	$department['routing'] = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'department', 'locale' => $locale));
		    	if (!$department['routing'])
		    	{
		    		// Add routing
		    		$department['routing'] = new Routing();
		    		$department['routing']->setObjectId($id);
		    		$department['routing']->setObjectType('department');
		    		$department['routing']->setLocale('en');
		    		$department['routing']->setUrl($seoService->createUrl($department['description']->getHeader()));
				    $em->persist($department['routing']);
				    $em->flush();
		    	}
		    	
		    	// Get the products
		    	$department['products'] = array();
	    		$subDepartmentIndexList = $this->getSubDepartmentIndexList($id, $locale, $currencyCode);
	    		if (sizeof($subDepartmentIndexList) > 0)
	    		{
					$productToDepartments = $em
						->createQuery("SELECT ptd FROM WebIllumination\SiteBundle\Entity\ProductToDepartment ptd WHERE ptd.departmentId IN (:departments)")
						->setParameter('departments', $subDepartmentIndexList)
						->getResult();
					foreach($productToDepartments as $productToDepartment)
					{
						$department['products'][$productToDepartment->getProductId()] = $productService->getProduct($productToDepartment->getProductId());
					}
				}
		    		    	
		    	// Get the redirects
		    	$department['redirects'] = $em->getRepository('WebIllumination\SiteBundle\Entity\Redirect')->findBy(array('objectId' => $id, 'objectType' => 'department'), array('redirectFrom' => 'ASC'));
		    	/*	
		    	// Check for the department object
		   		if (!$departmentObject)
		   		{
		   			$departmentObject = new ObjectIndex();
		   			$departmentObject->setObjectKey($id);
		   			$departmentObject->setObjectType('department');
		   			$departmentObject->setLocale($locale);
		   		}
		   		
		   		// Update the department object
		   		$departmentObject->setObjectData(base64_encode(serialize($department)));
		   		$departmentObject->setRebuild(0);
		   		$em->persist($departmentObject);
			    $em->flush();
			    */
			    
			    apc_store('ride_direct_product_'.$id, $department);
	   		//}   		
	   	}
   		
   		return $department;
   		
    	//return unserialize(base64_decode($departmentObject->getObjectData()));
    }
    
    // Get the list of all sub departments for a department
    public function getSubDepartmentList($parentId, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Add parent department
    	$departments[] = $parentId;
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findBy(array('parentId' => $parentId), array('displayOrder' => 'ASC'));
		
		// Make sure some departments exist
		if (sizeof($subDepartments) > 0 )
		{
	        foreach ($subDepartments as $subDepartment)
	        {
	        	$departments[] = $subDepartment->getId();
	    		$subSubDepartments = $this->getSubDepartmentList($subDepartment->getId(), $locale, $currencyCode);
	    		if (sizeof($subSubDepartments) > 0 )
	    		{
	    			$departments = array_merge($departments, $subSubDepartments);
	    		}
	        }
		}
		
		// Return the departments
		return array_unique($departments);

    }
    
    // Get the index list of all sub departments for a department
    public function getSubDepartmentIndexList($parentId, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Add parent department
    	$departments[] = $parentId;
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findBy(array('parentId' => $parentId), array('displayOrder' => 'ASC'));
		
		// Make sure some departments exist
		if (sizeof($subDepartments) > 0 )
		{
	        foreach ($subDepartments as $subDepartment)
	        {
	        	$departments[] = $subDepartment->getId();
	    		$subSubDepartments = $this->getSubDepartmentIndexList($subDepartment->getId(), $locale, $currencyCode);
	    		if (sizeof($subSubDepartments) > 0 )
	    		{
	    			$departments = array_merge($departments, $subSubDepartments);
	    		}
	        }
		}
		
		// Return the departments
		return array_unique($departments);

    }
    
    // Get the sub departments
    public function getSubDepartments($parentId, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findBy(array('parentId' => $parentId), array('displayOrder' => 'ASC'));
		
		// Make sure some departments exist
		if (sizeof($subDepartments) > 0 )
		{
	        foreach ($subDepartments as $subDepartment)
	        {
	    		$department = $this->getDepartment($subDepartment->getId(), $locale, $currencyCode);
	    		$department['subDepartments'] = $this->getSubDepartments($subDepartment->getId(), $locale, $currencyCode);
	    		$departments[$subDepartment->getId()] = $department;
	        }
		}
		
		// Return the departments
		return $departments;

    }
    
    // Get the full department list
    public function getFullDepartmentList($parentId = 0, $level = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Get the sub departments
    	$subDepartments = $em
            ->createQuery("
            	SELECT 
            	d.id, d.parentId, d.status, d.departmentPath, d.hidePrices, d.showPricesOutOfHours, d.displayOrder, 
            	dd.department, dd.description, dd.shortDescription, dd.menuTitle, dd.pageTitle, dd.header, dd.metaDescription, dd.metaKeywords, dd.searchWords, 
            	r.url 
            	FROM WebIllumination\SiteBundle\Entity\Department d, WebIllumination\SiteBundle\Entity\DepartmentDescription dd, WebIllumination\SiteBundle\Entity\Routing r
            	WHERE d.id = dd.departmentId AND d.id = r.objectId AND d.parentId = '".$parentId."' AND r.objectType = 'department' 
            	ORDER BY d.displayOrder 
            	")
            ->getResult();
		
		// Make sure some departments exist
		if (sizeof($subDepartments) > 0 )
		{
	        foreach ($subDepartments as $subDepartment)
	        {
	        	$productCount = $productService->getProductListingCount($subDepartment['id'], false, false, false, false, 0, 0, $locale, $currencyCode);
	    		$department = array();
	    		$department['id'] = $subDepartment['id'];
	    		$department['level'] = $level;
	    		$department['productCount'] = $productCount;
	    		$department['parentId'] = $subDepartment['parentId'];
	    		$department['department'] = $subDepartment['department'];
	    		$departments[] = $department;
	    		$subDepartments = $this->getFullDepartmentList($subDepartment['id'], ($level + 1), $locale, $currencyCode);
	    		if (sizeof($subDepartments) > 1)
	    		{
	    			$departments = array_merge($departments, $subDepartments);
	    		}
	        }
		}
		
		// Return the departments
		return $departments;
    }
    
    // Get departments
    public function getDepartments($locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Check if the departments are already stored
    	$objectIndexObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ObjectIndex')->findOneBy(array('objectKey' => 'all', 'objectType' => 'departments', 'locale' => $locale));
    	    	
   		// Check if the departments need rebuilding
   		$rebuildDepartments = true;
   		if ($objectIndexObject)
   		{
   			if ($objectIndexObject->getRebuild() < 1)
   			{
   				$rebuildDepartments = false;
   			}
   		}
   		
   		// Get the departments
   		if ($rebuildDepartments)
   		{
	   		// Setup departments
	    	$departments = array();
	   		
	   		// Get the departments
	   		foreach ($em->getRepository('WebIllumination\SiteBundle\Entity\DepartmentDescription')->findBy(array(), array('department' => 'ASC')) as $departmentDescriptionObject)
	   		{
	   			$department = $this->getDepartment($departmentDescriptionObject->getDepartmentId(), $locale, $currencyCode);
	   			error_log('Department Count: '.$department['productCount']);
	   			if (($department['status'] == 'a'))
	   			{
	   				$departments[$departmentDescriptionObject->getDepartmentId()] = $department;
	   			}
	   		}
	   			    	
	    	// Check for the index object
	   		if (!$objectIndexObject)
	   		{
	   			$objectIndexObject = new ObjectIndex();
	   			$objectIndexObject->setObjectKey('all');
	   			$objectIndexObject->setObjectType('departments');
	   			$objectIndexObject->setLocale($locale);
	   		}
	   		
	   		// Update the index object
	   		$objectIndexObject->setObjectData(base64_encode(serialize($departments)));
	   		$objectIndexObject->setRebuild(0);
	   		$em->persist($objectIndexObject);
		    $em->flush();
   		}   		
   		
    	return unserialize(base64_decode($objectIndexObject->getObjectData()));
    }
    
    // Get the departments
    public function getAllDepartments($parentId, $status = false, $hidePrices = false, $showPricesOutOfHours = false, $membershipCardDiscountAvailable = false, $name = false, $description = false, $selectedBrands = false, $selectedDepartment = false, $selectedOptions = false, $selectedFeatures = false, $selectedPriceFrom = 0, $selectedPriceTo = 0, $locale = 'en', $currencyCode = 'GBP', $level = 0)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
        // Get the sub departments
		$query = "SELECT ";
        $query .= "d.id, d.parentId, d.status, d.departmentPath, d.hidePrices, d.showPricesOutOfHours, d.displayOrder, ";
        $query .= "dd.department, dd.description, dd.shortDescription, dd.menuTitle, dd.pageTitle, dd.header, dd.metaDescription, dd.metaKeywords, dd.searchWords, ";
        $query .= "r.url ";
        $query .= "FROM WebIllumination\SiteBundle\Entity\Department d, WebIllumination\SiteBundle\Entity\DepartmentDescription dd, WebIllumination\SiteBundle\Entity\Routing r ";
        $query .= "WHERE d.id = dd.departmentId AND d.id = r.objectId AND r.objectType = 'department' AND d.parentId = '".$parentId."' ";
		if ($status)
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(d.status = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND d.status = '".$options."' ";
    		}
    	}
    	if ($hidePrices)
    	{
    		$options = explode('|', $hidePrices);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(d.hidePrices = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND d.hidePrices = '".$options."' ";
    		}
    	}
		if ($showPricesOutOfHours)
    	{
    		$options = explode('|', $showPricesOutOfHours);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(d.showPricesOutOfHours = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND d.showPricesOutOfHours = '".$options."' ";
    		}
    	}
    	if ($membershipCardDiscountAvailable)
    	{
    		$options = explode('|', $membershipCardDiscountAvailable);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(d.membershipCardDiscountAvailable = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND d.membershipCardDiscountAvailable = '".$options."' ";
    		}
    	}
    	if ($name)
    	{
    		$query .= "AND dd.department LIKE '%".$name."%' ";
    	}
    	if ($description)
    	{
    		$query .= "AND dd.description LIKE '%".$description."%' ";
    	}
        $query .= "ORDER BY d.displayOrder";
    	$subDepartments = $em->createQuery($query)->getResult();
		
		// Increase the level
		$level++;
		
		// Make sure some departments exist
		if (sizeof($subDepartments) > 0 )
		{
	        foreach ($subDepartments as $subDepartment)
	        {
	        	$productCount = $productService->getProductListingCount($subDepartment['id'], $selectedBrands, $selectedDepartment, $selectedOptions, $selectedFeatures, $selectedPriceFrom, $selectedPriceTo, $locale, $currencyCode);      	
	        	if ($productCount > 0)
	        	{
		    		$department = array();
		    		$department['id'] = $subDepartment['id'];
		    		$department['level'] = $level;
		    		$department['productCount'] = $productCount;
		    		$department['parentId'] = $subDepartment['parentId'];
		    		$department['status'] = $subDepartment['status'];
		    		$department['departmentPath'] = $subDepartment['departmentPath'];
		    		$department['hidePrices'] = $subDepartment['hidePrices'];
		    		$department['showPricesOutOfHours'] = $subDepartment['showPricesOutOfHours'];
		    		$department['display_order'] = $subDepartment['displayOrder'];
		    		$department['department'] = $subDepartment['department'];
		    		$department['description'] = $subDepartment['description'];
		    		$department['shortDescription'] = $subDepartment['shortDescription'];
		    		$department['menuTitle'] = str_replace(' & ', ' &amp; ', str_replace(' and ', ' &amp; ', $subDepartment['menuTitle']));
		    		if ($subDepartment['parentId'] < 1)
		    		{
		    			$department['menuTitle'] = str_replace('&amp; ', '&amp;<br />', $department['menuTitle']);
		    			if (strpos($department['menuTitle'], '<br />') === false)
		    			{
		    				if (sizeof(explode(' ', $department['menuTitle'])) > 1)
		    				{
		    					$department['menuTitle'] = preg_replace('/ /', '<br />', $department['menuTitle'], 1);
		    				}
		    			}
		    			if (sizeof(explode(' ', $department['menuTitle'])) < 2)
		    			{
		    				$department['menuTitle'] = '<span>'.$department['menuTitle'].'</span>';
		    			}
		    		}
		    		$department['pageTitle'] = $subDepartment['pageTitle'];
		    		$department['header'] = $subDepartment['header'];
		    		$department['metaDescription'] = $subDepartment['metaDescription'];
		    		$department['metaKeywords'] = $subDepartment['metaKeywords'];
		    		$department['searchWords'] = $subDepartment['searchWords'];
		    		$department['url'] = $subDepartment['url'];
		    		$department['departments'] = $this->getAllDepartments($subDepartment['id'], $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $selectedBrands, $selectedDepartment, $selectedOptions, $selectedFeatures, $selectedPriceFrom, $selectedPriceTo, $locale, $currencyCode, $level);
		    		$departments[$subDepartment['id']] = $department;
		    	}
	        }
		}
		
		// Return the departments
		return $departments;

    }
    
    // TODO: REMOVE TEMPORARY IMAGE PROCESSING FROM IMAGES
    public function processProductIndexImages()
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get images with http in original path
    	$productIndexes = $em->getRepository('WebIllumination\SiteBundle\Entity\ProductIndex')->findBy(array('thumbnailPath' => ''));
		
		// Process the images
		foreach ($productIndexes as $productIndex)
		{
			$image = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findOneBy(array('objectId' => $productIndex->getProductId(), 'objectType' => 'product'));
			if ($image)
			{
				$productIndex->setThumbnailPath($image->getThumbnailPath());
				$em->persist($productIndex);
				$em->flush();
			}
		}
		
		return false; 
	}
	
    public function processProductImages()
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get images with http in original path
		$images = $em
			->createQuery("SELECT i FROM WebIllumination\SiteBundle\Entity\Image i WHERE i.originalPath LIKE :originalPath AND i.objectType = :objectType AND i.imageType = :imageType AND i.locale = :locale")
			->setParameter('originalPath', 'http://%')
			->setParameter('objectType', 'product')
			->setParameter('imageType', 'product')
			->setParameter('locale', 'en')
			->getResult();
		
		// Process the images
		$imageCount = 0;
		foreach ($images as $image)
		{
			// Get the paths and filenames
			$cleanedTitle = $this->cleanFilename($image->getTitle());
			$imagePath = $this->getUploadRootDir().'/'.$image->getObjectType().'/'.$image->getImageType();
			$filePath = $this->getUploadDir().'/'.$image->getObjectType().'/'.$image->getImageType();
			$originalImageFilename = $cleanedTitle.'-original-'.$image->getId().'.'.$this->getExtension($image->getOriginalPath());
			$thumbnailImageFilename = $cleanedTitle.'-thumbnail-'.$image->getId().'.jpg';
			$mediumImageFilename = $cleanedTitle.'-medium-'.$image->getId().'.jpg';
			$largeImageFilename = $cleanedTitle.'-large-'.$image->getId().'.jpg';
    				
			// Process the original image
			copy($image->getOriginalPath(), $imagePath.'/'.$originalImageFilename);
			$image->setOriginalPath('/'.$filePath.'/'.$originalImageFilename);
		    
		    // Process the large image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$largeImageFilename, 800, 800, 800, 800, 'fit', 80, true);
		    $image->setLargePath('/'.$filePath.'/'.$largeImageFilename);
		    
		    // Process the medium image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$mediumImageFilename, 250, 250, 250, 250, 'fit', 80, true);
		    $image->setMediumPath('/'.$filePath.'/'.$mediumImageFilename);
		    
		    // Process the thumbnail
	    	$this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$thumbnailImageFilename, 100, 100, 100, 100, 'gallery', 60, false);
		    $image->setThumbnailPath('/'.$filePath.'/'.$thumbnailImageFilename);
		    
		    $productIndex = $em->getRepository('WebIllumination\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $image->getObjectId()));
			if ($productIndex)
			{
				$productIndex->setThumbnailPath('/'.$filePath.'/'.$thumbnailImageFilename);
				$productIndex->setLargePath('/'.$filePath.'/'.$largeImageFilename);
			}
		    
		    $em->flush();
			    				
		}
		
		return false;    	
    }
    
    // Resize image
    public function resizeImage($originalImagePath, $newImagePath, $imageWidth, $imageHeight, $canvasWidth, $canvasHeight, $process = 'fit', $imageQuality = 80, $watermark = true)
    {
		try
		{
			// Create a blank canvas
			$canvas = new \Imagick();
			$canvas->newImage($canvasWidth, $canvasHeight, 'white');
			
			// Setup the watermark
			if ($watermark)
			{
				$watermark = new \Imagick("uploads/images/ride-direct-water-mark.png");
				$watermark->thumbnailImage($canvasWidth, $canvasHeight, true);
			}
			
			// Resize the image
	   		$image = new \Imagick($originalImagePath);
			$image->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
			$image->setImageMatte(true);
			
			// Resize the image
			switch ($process)
			{
				case 'gallery':
					$originalImageWidth = $image->getImageWidth();
					$originalImageHeight = $image->getImageHeight();
					$widthRatio = $imageWidth / $originalImageWidth;
					$heightRatio = $imageHeight / $originalImageHeight;
					if ($widthRatio > $heightRatio)
					{
						$ratio = $widthRatio;
					} else {
						$ratio = $heightRatio;
					}
					$newWidth = $originalImageWidth * $ratio;
					$newHeight = $originalImageHeight * $ratio;
					$image->thumbnailImage($newWidth, $newHeight);
				case 'normal':
					$image->thumbnailImage($imageWidth, null);
					break;
				case 'fixed':
					$image->thumbnailImage($imageWidth, $imageHeight);
					break;
				case 'cropped':
					$image->cropThumbnailImage($imageWidth, $imageHeight);			
					break;
				case 'fit':
				default:
					$image->thumbnailImage($imageWidth, $imageHeight, true);
					break;
			}
	    	
			// Get the image geometry
			$geometry = $image->getImageGeometry();
			 
			// Get the overlay x and y coordinates
			$x = ($canvasWidth - $geometry['width']) / 2;
			$y = ($canvasHeight - $geometry['height']) / 2;

			// Add the image to the canvas and save
			$canvas->compositeImage($image, \Imagick::COMPOSITE_OVER, $x, $y);
			if ($watermark)
			{
				$canvas->compositeImage($watermark, \Imagick::COMPOSITE_OVER, 0, 0);
			}
	    	$canvas->setImageFormat('jpeg');
			$canvas->setImageCompressionQuality($imageQuality);
			$canvas->writeImage($newImagePath);
			
			// Flush objects
			$image->clear();
			$canvas->clear();
			
			return true;
		} catch (Exception $exception) {
	    	return false;
		}
    }
    
    // Get the root temporary upload directory
    public function getTemporaryUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploads/temporary';
    }
    
    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

	// Get the upload directory
    public function getUploadDir()
    {
        return 'uploads/images';
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