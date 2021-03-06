<?php 

namespace WebIllumination\AdminBundle\Services;

use KAC\SiteBundle\Entity\Department;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\DepartmentIndex;
use WebIllumination\AdminBundle\Entity\BrandToDepartment;
use WebIllumination\AdminBundle\Entity\DepartmentToFeature;

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
	protected $singleItemModel;
	protected $multipleItemsModel;
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
        $this->listingSortOrder = 'dd.name:ASC';
        $this->listingSort = 'dd.name';
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
    	$em = $doctrineService->getManager();
    	    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	if ($department > 0)
    	{
    		$departments = $this->getAllDepartments($department, $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, false, false, false, false, 0, 0);
    	} else {
    		$departments = $this->getAllDepartments(0, $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, false, false, false, false, 0, 0);
    	}
    	
    	/*$qb->select(array('d, dd'));
    	$qb->from('WebIlluminationAdminBundle:Department', 'd');
    	$qb->innerJoin('d', 'WebIlluminationAdminBundle:DepartmentDescription', 'dd', 'ON', $qb->expr()->eq('d.id', 'dd.departmentId'));
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
    		$qb->andWhere($qb->expr()->like('dd.name', $qb->expr()->literal('%'.$name.'%')));
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
    	$em = $doctrineService->getManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("d.id"));
    	$qb->from('WebIlluminationAdminBundle:Department', 'd');
    	$qb->join('d', 'WebIlluminationAdminBundle:DepartmentDescription', 'dd', 'd.id = dd.departmentId');
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
    		$qb->andWhere($qb->expr()->like('dd.name', $qb->expr()->literal('%'.$name.'%')));
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
    	$em = $doctrineService->getManager();
    	
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
    	$em = $doctrineService->getManager();
    	
   		// Setup the department
    	$department = array();

        /**
         * @var $departmentObject Department
         * @var $departmentDescriptionObject Department\Description
         */
        $departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
    	$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Department\Description')->findOneBy(array('department' => $id, 'locale' => $locale));
    	if (!$departmentObject || !$departmentDescriptionObject)
	    {
        	return false;
    	}
    	$department['id'] = $departmentObject->getId();
    	$department['parentId'] = $departmentObject->getParent()->getId();
    	$department['status'] = $departmentObject->getStatus();
    	$department['departmentPath'] = $departmentObject->getDepartmentPath();
    	$department['hidePrices'] = $departmentObject->getHidePrices();
    	$department['showPricesOutOfHours'] = $departmentObject->getShowPricesOutOfHours();
    	$department['membershipCardDiscountAvailable'] = $departmentObject->getMembershipCardDiscountAvailable();
    	$department['maximumMembershipCardDiscount'] = $departmentObject->getMaximumMembershipCardDiscount();
    	$department['displayOrder'] = $departmentObject->getDisplayOrder();
    	$department['departmentId'] = $departmentDescriptionObject->getDepartment()->getId();
    	$department['locale'] = $departmentDescriptionObject->getLocale();
    	$department['name'] = $departmentDescriptionObject->getName();
    	$department['description'] = $departmentDescriptionObject->getDescription();
    	$department['menuTitle'] = $departmentDescriptionObject->getMenuTitle();
    	$department['pageTitle'] = $departmentDescriptionObject->getPageTitle();
    	$department['header'] = $departmentDescriptionObject->getHeader();
    	$department['metaDescription'] = $departmentDescriptionObject->getMetaDescription();
    	$department['metaKeywords'] = $departmentDescriptionObject->getMetaKeywords();
    	$department['searchWords'] = $departmentDescriptionObject->getMetaKeywords();
    	$department['updatedAt'] = $departmentDescriptionObject->getUpdatedAt();
    	
    	// Get the department paths
    	$departmentPaths = array();
//    	$departmentPathIds = explode('|', $department['departmentPath']);
//		foreach ($departmentPathIds as $departmentPathId)
//		{
//			$departmentPathDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentPathId));
//			$departmentPathRoutingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $departmentPathId, 'locale' => 'en', 'objectType' => 'department'));
//			if ($departmentPathDescriptionObject && $departmentPathRoutingObject)
//			{
//				$departmentPath = array();
//				$departmentPath['department'] = $departmentPathDescriptionObject->getName();
//				$departmentPath['routing'] = $departmentPathRoutingObject->getUrl();
//				$departmentPaths[] = $departmentPath;
//			}
//		}
		$department['departmentPaths'] = $departmentPaths;
    	
    	// Get the product count
    	$department['productCount'] = 0;
    	
    	// Get the routing
    	$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Department\Routing')->findOneBy(array('objectId' => $id, 'locale' => $locale));
    	if (!$routingObject)
    	{
    		// Add routing
    		$routingObject = new Department\Routing();
    		$routingObject->setObjectId($id);
    		$routingObject->setLocale('en');
    		$routingObject->setUrl($seoService->createUrl($departmentDescriptionObject->getHeader()));
		    $em->persist($routingObject);
		    $em->flush();
    	}
    	$department['url'] = $routingObject->getUrl();
				       		
    	return $department;
    }

    // Get the list of all sub departments for a department
    public function getSubDepartmentList($parentId, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Add parent department
    	$departments[] = $parentId;
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('KAC\SiteBundle\Entity\Department')->findBy(array('parent' => $parentId), array('displayOrder' => 'ASC'));
		
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
    	$em = $doctrineService->getManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Add parent department
    	$departments[] = $parentId;
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('KAC\SiteBundle\Entity\Department')->findBy(array('parent' => $parentId), array('displayOrder' => 'ASC'));
		
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
    	$em = $doctrineService->getManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Get the sub departments
    	$subDepartments = $em->getRepository('KAC\SiteBundle\Entity\Department')->findBy(array('parent' => $parentId), array('displayOrder' => 'ASC'));
		
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
    	$em = $doctrineService->getManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
    	// Get the sub departments
    	$subDepartmentObjects = $em->getRepository('KAC\SiteBundle\Entity\Department')->findBy(array('parent' => $parentId), array('displayOrder' => 'ASC'));
		
		// Make sure some departments exist
		if (sizeof($subDepartmentObjects) > 0 )
		{
	        foreach ($subDepartmentObjects as $subDepartmentObject)
	        {
	        	$productCount = 0;
	    		$department = array();
	    		$department['id'] = $subDepartmentObject->getDepartmentId();
	    		$department['level'] = $level;
	    		$department['productCount'] = $productCount;
	    		$department['parentId'] = $subDepartmentObject->getParentId();
	    		$department['name'] = $subDepartmentObject->getName();
	    		$departments[] = $department;
	    		$subDepartments = $this->getFullDepartmentList($subDepartmentObject->getId(), ($level + 1), $locale, $currencyCode);
	    		if (sizeof($subDepartments) > 0)
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
    	$em = $doctrineService->getManager();
    	
   		// Setup departments
    	$departments = array();
   		
   		// Get the departments
   		foreach ($em->getRepository('KAC\SiteBundle\Entity\Department\Description')->findBy(array(), array('name' => 'ASC')) as $departmentDescriptionObject)
   		{
   			$department = $this->getDepartment($departmentDescriptionObject->getDepartmentId(), $locale, $currencyCode);
   			if (($department['status'] == 'a'))
   			{
   				$departments[$departmentDescriptionObject->getDepartmentId()] = $department;
   			}
   		}
	   			    	   		
    	return $departments;
    }
    
    // Get the departments
    public function getAllDepartments($parentId, $status = false, $hidePrices = false, $showPricesOutOfHours = false, $membershipCardDiscountAvailable = false, $name = false, $description = false, $selectedBrands = false, $selectedGroup = false, $selectedOptions = false, $selectedFeatures = false, $selectedPriceFrom = 0, $selectedPriceTo = 0, $locale = 'en', $currencyCode = 'GBP', $level = 0)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	
    	// Setup the departments array
    	$departments = array();
    	
        // Get the sub departments
		$query = "SELECT ";
        $query .= "d.id, d.status, d.departmentPath, d.hidePrices, d.showPricesOutOfHours, d.displayOrder, ";
        $query .= "dd.name, dd.description, dd.menuTitle, dd.pageTitle, dd.header, dd.metaDescription, dd.metaKeywords, ";
        $query .= "r.url ";
        $query .= "FROM KAC\SiteBundle\Entity\Department d, KAC\SiteBundle\Entity\Department\Description dd, KAC\SiteBundle\Entity\Department\Routing r ";
        $query .= "WHERE d.id = dd.department AND d.id = r.objectId AND d.parent = '".$parentId."' ";
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
    		$query .= "AND dd.name LIKE '%".$name."%' ";
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
	        	$productCount = $productService->getProductListingCount($subDepartment['id'], $selectedBrands, $selectedGroup, $selectedOptions, $selectedFeatures, $selectedPriceFrom, $selectedPriceTo, $locale, $currencyCode);
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
		    		$department['name'] = $subDepartment['name'];
		    		$department['description'] = $subDepartment['description'];
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
		    		$department['departments'] = $this->getAllDepartments($subDepartment['id'], $status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $selectedBrands, $selectedGroup, $selectedOptions, $selectedFeatures, $selectedPriceFrom, $selectedPriceTo, $locale, $currencyCode, $level);
		    		$departments[$subDepartment['id']] = $department;
		    	}
	        }
		}
		
		// Return the departments
		return $departments;

    }
    
    // Get the breadcrumbs
    public function getBreadcrumbs($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the object
    	$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
    	if (!$departmentObject)
    	{
	    	return false;
    	}	
    	
    	// Get the breadcrumbs
    	$breadcrumbs = array();
    	foreach (explode('|', $departmentObject->getDepartmentPath()) as $departmentId)
    	{
	    	$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentId, 'locale' => $locale));
	    	if ($departmentDescriptionObject)
	    	{
		    	$breadcrumb = array();
		    	$breadcrumb['departmentId'] = $departmentId;
		    	$breadcrumb['name'] = $departmentDescriptionObject->getName();
		    	$breadcrumbs[] = $breadcrumb;
	    	}
    	}
		    
    	return $breadcrumbs;
	}
	
	// Get the available departments that have product feature groups
	public function getProductFeatureGroupDepartments($locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
		// Get the product feature group departments
    	$productFeatureGroupDepartments = array();
    	$qb = $em->createQueryBuilder();
    	$qb->select('DISTINCT dtf.departmentId');
    	$qb->from('WebIlluminationAdminBundle:DepartmentToFeature', 'dtf');
    	$productFeatureGroupDepartmentIds = $qb->getQuery()->getResult();
    	foreach ($productFeatureGroupDepartmentIds as $productFeatureGroupDepartmentId)
    	{
    		$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($productFeatureGroupDepartmentId['departmentId']);
    		if ($departmentObject)
    		{
	    		$productFeatureGroupDepartment = array();
	    		foreach (explode('|', $departmentObject->getDepartmentPath()) as $departmentPathId)
	    		{
		    		$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentPathId, 'locale' => $locale));
		    		if ($departmentDescriptionObject)
		    		{
			    		$productFeatureGroupDepartment[] = $departmentDescriptionObject->getName();
		    		}
	    		}
	    		$productFeatureGroupDepartments[$productFeatureGroupDepartmentId['departmentId']] = implode(' > ', $productFeatureGroupDepartment);
    		}
    	}
    	
    	return $productFeatureGroupDepartments;
	}
	
	// Get the product feature groups
    public function getProductFeatureGroups($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the product feature groups
    	$productFeatureGroupIds = array();
    	$productToDepartmentObjects = $em->createQuery("SELECT pi FROM WebIlluminationAdminBundle:ProductIndex pi WHERE pi.departmentIds LIKE '%|".$id."|%'")->getResult();
    	foreach ($productToDepartmentObjects as $productToDepartmentObject)
    	{
	    	$productToFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findBy(array('productId' => $productToDepartmentObject->getProductId()));
	    	foreach ($productToFeatureObjects as $productToFeatureObject)
	    	{
	    		$productFeatureGroupIds[] = $productToFeatureObject->getProductFeatureGroupId();
	    	}
    	}
    	if (sizeof($productFeatureGroupIds) > 0)
    	{
	    	$productFeatureGroupIds = array_unique($productFeatureGroupIds);
	    	$productFeatureGroupObjects = $em->createQuery("SELECT pfg FROM WebIlluminationAdminBundle:ProductFeatureGroup pfg WHERE pfg.id IN ('".join("', '", $productFeatureGroupIds)."') AND pfg.locale = '".$locale."' ORDER BY pfg.productFeatureGroup")->getResult();
	    	return $productFeatureGroupObjects;
	    }
		    
    	return array();
	}
	
	// Get the brands
    public function getBrands($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$seoService = $this->container->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the department
		$departmentIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id));
    	
    	// Get the product feature groups
    	$brandIds = array();
    	$productToDepartmentObjects = $em->createQuery("SELECT pi.brandId FROM WebIlluminationAdminBundle:ProductIndex pi WHERE pi.departmentIds LIKE '%|".$id."|%'")->getResult();
    	foreach ($productToDepartmentObjects as $productToDepartmentObject)
    	{
    		$brandIds[] = $productToDepartmentObject['brandId'];
    	}
    	if (sizeof($brandIds) > 0)
    	{
	    	$brandIds = array_unique($brandIds);
	    	$brandIndexObjects = $em->createQuery("SELECT bi FROM WebIlluminationAdminBundle:BrandIndex bi WHERE bi.brandId IN ('".join("', '", $brandIds)."') AND bi.locale = '".$locale."' ORDER BY bi.brand")->getResult();
	    	
	    	// Check to make sure the brand to department is setup
	    	foreach ($brandIndexObjects as $brandIndexObject)
	    	{
		    	$brandToDepartmentObject = $em->getRepository('KAC\SiteBundle\Entity\BrandToDepartment')->findOneBy(array('departmentId' => $id, 'brandId' => $brandIndexObject->getBrandId()));
		    	if (!$brandToDepartmentObject)
		    	{
		    		$brandId = $brandIndexObject->getBrandId();
		    		$pageTitle = $brandIndexObject->getBrand().' '.$departmentIndexObject->getName();
		    		$metaKeywords = $seoService->generateKeywords($pageTitle);
		    		$metaDescription = $departmentIndexObject->getMetaDescription();
			    	$brandToDepartmentObject = new BrandToDepartment();
			    	$brandToDepartmentObject->setBrandId($brandId);
			    	$brandToDepartmentObject->setDepartmentId($id);
			    	$brandToDepartmentObject->setDeliveryBand(0.0000);
			    	$brandToDepartmentObject->setPageTitle($pageTitle);
			    	$brandToDepartmentObject->setHeader($pageTitle);
			    	$brandToDepartmentObject->setMetadescription($metaDescription);
			    	$brandToDepartmentObject->setMetaKeywords($metaKeywords);
			    	$brandToDepartmentObject->setSearchWords($metaKeywords);
			    	$em->persist($brandToDepartmentObject);
			    	$em->flush();
			    }
	    	}
	    	
	    	return $brandIndexObjects;
	    }
		    
    	return array();
	}
	
	// Get the products
    public function getProducts($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the department
		$departmentIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id));
    	
    	// Get the product feature groups
    	$productIds = array();
    	$productToDepartmentObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findBy(array('departmentId' => $id, 'displayOrder' => '1'));
    	foreach ($productToDepartmentObjects as $productToDepartmentObject)
    	{
    		$productIds[] = $productToDepartmentObject->getProductId();
    	}
    	if (sizeof($productIds) > 0)
    	{
	    	$productIds = array_unique($productIds);
	    	$productIndexObjects = $em->createQuery("SELECT pi FROM WebIlluminationAdminBundle:ProductIndex pi WHERE pi.productId IN ('".join("', '", $productIds)."') AND pi.locale = '".$locale."' ORDER BY pi.pageTitle")->getResult();
	    		    	
	    	return $productIndexObjects;
	    }
		    
    	return array();
	}
	
	// Get the product feature groups from the products
	public function getProductFeatureGroupsFromProducts($id, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the products
		$productFeaturesAdded = 0;
		$products = $this->getProducts($id, $locale);
		if (sizeof($products) > 0)
		{
			$productFeatureGroupIds = array();
			foreach ($products as $product)
			{
    			$productToFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findBy(array('productId' => $product->getProductId()), array('displayOrder' => 'ASC'));
    			foreach ($productToFeatureObjects as $productToFeatureObject)
    			{
	    			if ($productToFeatureObject)
	    			{
		    			$productFeatureGroupIds[] = $productToFeatureObject->getProductFeatureGroupId();
	    			}
    			}
			}
			$productFeatureGroupIds = array_unique($productFeatureGroupIds);
			foreach ($productFeatureGroupIds as $productFeatureGroupId)
			{
				$departmentToFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentToFeature')->findOneBy(array('departmentId' => $id, 'productFeatureGroupId' => $productFeatureGroupId));
				if (!$departmentToFeatureObject)
				{
	    			$departmentToFeatureObject = new DepartmentToFeature();
					$departmentToFeatureObject->setActive(1);
					$departmentToFeatureObject->setDepartmentId($id);
					$departmentToFeatureObject->setProductFeatureGroupId($productFeatureGroupId);
					$departmentToFeatureObject->setDefaultProductFeatureId(0);
					$departmentToFeatureObject->setDisplayOnFilter(0);
					$departmentToFeatureObject->setDisplayOnListing(0);
	    			$departmentToFeatureObject->setDisplayOnProduct(1);
	    			$departmentToFeatureObject->setDisplayOrder(1);
	    			$em->persist($departmentToFeatureObject);
	    			$em->flush();
	    			$productFeaturesAdded++;
	    		}
			}
		}
		
		return $productFeaturesAdded;
	}
	
	// Get the product feature groups from a department
	public function getProductFeatureGroupsFromDepartment($id, $departmentId, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the product feature groups
		$productFeaturesAdded = 0;
		$departmentToFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\DepartmentToFeature')->findBy(array('departmentId' => $departmentId));
		if (sizeof($departmentToFeatureObjects) > 0)
		{
			foreach ($departmentToFeatureObjects as $departmentToFeatureObject)
			{
				$departmentToFeatureCheckObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentToFeature')->findOneBy(array('departmentId' => $id, 'productFeatureGroupId' => $departmentToFeatureObject->getProductFeatureGroupId()));
				if (!$departmentToFeatureCheckObject)
				{
	    			$newDepartmentToFeatureObject = new DepartmentToFeature();
					$newDepartmentToFeatureObject->setActive($departmentToFeatureObject->getActive());
					$newDepartmentToFeatureObject->setDepartmentId($id);
					$newDepartmentToFeatureObject->setProductFeatureGroupId($departmentToFeatureObject->getProductFeatureGroupId());
					$newDepartmentToFeatureObject->setDefaultProductFeatureId($departmentToFeatureObject->getDefaultProductFeatureId());
					$newDepartmentToFeatureObject->setDisplayOnFilter($departmentToFeatureObject->getDisplayOnFilter());
					$newDepartmentToFeatureObject->setDisplayOnListing($departmentToFeatureObject->getDisplayOnListing());
	    			$newDepartmentToFeatureObject->setDisplayOnProduct($departmentToFeatureObject->getDisplayOnProduct());
	    			$newDepartmentToFeatureObject->setDisplayOrder($departmentToFeatureObject->getDisplayOrder());
	    			$em->persist($newDepartmentToFeatureObject);
	    			$em->flush();
	    			$productFeaturesAdded++;
	    		}
			}
		}
		
		return $productFeaturesAdded;
	}
	
	// Get the products product feature groups
	public function getProductProductFeatureGroups($id, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the products
		$products = $this->getProducts($id, $locale);
		
		// Get the department features
		$departmentToFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\DepartmentToFeature')->findBy(array('departmentId' => $id), array('displayOrder' => 'ASC'));
		
		// Check to make sure all products match the features in the departments
		if (sizeof($products) > 0)
		{
			foreach ($products as $product)
			{
				foreach ($departmentToFeatureObjects as $departmentToFeatureObject)
				{
					// Get the product feature to check
					$productToFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findOneBy(array('departmentId' => $id), array('displayOrder' => 'ASC'));
				}
				
				
    			$productToFeatureObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findBy(array('productId' => $product->getProductId()), array('displayOrder' => 'ASC'));
    			foreach ($productToFeatureObjects as $productToFeatureObject)
    			{
	    			if ($productToFeatureObject)
	    			{
		    			$productFeatureGroupIds[] = $productToFeatureObject->getProductFeatureGroupId();
	    			}
    			}
			}
			$productFeatureGroupIds = array_unique($productFeatureGroupIds);
			foreach ($productFeatureGroupIds as $productFeatureGroupId)
			{
				$departmentToFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentToFeature')->findOneBy(array('departmentId' => $id, 'productFeatureGroupId' => $productFeatureGroupId));
				if (!$departmentToFeatureObject)
				{
	    			$departmentToFeatureObject = new DepartmentToFeature();
					$departmentToFeatureObject->setActive(1);
					$departmentToFeatureObject->setDepartmentId($id);
					$departmentToFeatureObject->setProductFeatureGroupId($productFeatureGroupId);
					$departmentToFeatureObject->setDefaultProductFeatureId(0);
					$departmentToFeatureObject->setDisplayOnFilter(0);
					$departmentToFeatureObject->setDisplayOnListing(0);
	    			$departmentToFeatureObject->setDisplayOnProduct(1);
	    			$departmentToFeatureObject->setDisplayOrder(1);
	    			$em->persist($departmentToFeatureObject);
	    			$em->flush();
	    			$productFeaturesAdded++;
	    		}
			}
		}
		
		return $productFeaturesAdded;
	}
	
	// Update the product delivery bands
	public function updateProductDeliveryBands($id, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
				
		// Get the product indexes
		$productToDepartmentObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findBy(array('departmentId' => $id));
				
		// Update the products
		$count = 0;
		foreach ($productToDepartmentObjects as $productToDepartmentObject)
		{
			// Update the delivery band
			$count++;
			$productService->updateProductDeliveryBand($productToDepartmentObject->getProductId(), $locale);
			error_log('Updating product delivery band ('.$count.' of '.sizeof($productToDepartmentObject).'): '.$productToDepartmentObject->getProductId());
		}

	    return true;
	}
	
	// Update the department delivery band
	public function updateDepartmentDeliveryBand($id)
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
				
		// Get the department objects
		$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
		$departmentIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id));
				
		// Update the departments
		if ($departmentIndexObject)
		{
			// Set a default delivery band
			$inheritedDeliveryBand = 6;
			
			// Check if the department already has a delivery band
			if ($departmentIndexObject->getDeliveryBand() > 0)
			{
				$inheritedDeliveryBand = $departmentIndexObject->getDeliveryBand();
			} else {
				// Get the department ids
				$departmentIds = array_reverse(explode('|', substr(substr($departmentIndexObject->getDepartmentPath(), 1), 0, -1)));
				array_shift($departmentIds);
				
				// Update the department delivery bands
				foreach ($departmentIds as $departmentId)
				{
					$departmentPathIndexObject =  $em->getRepository('KAC\SiteBundle\Entity\Department')->find($departmentId);
					if ($departmentPathIndexObject)
					{
						if ($departmentPathIndexObject->getDeliveryBand() > 0)
						{
							$inheritedDeliveryBand = $departmentPathIndexObject->getDeliveryBand();
							break;
						}
					}
				}
			}
			
			// Update the delivery band
			$departmentObject->setInheritedDeliveryBand($inheritedDeliveryBand);
			$em->persist($departmentObject);
			$em->flush();
			$departmentIndexObject->setInheritedDeliveryBand($inheritedDeliveryBand);
			$em->persist($departmentIndexObject);
			$em->flush();
		}

	    return true;
	}
	
	// Update the department delivery bands
	public function updateDepartmentDeliveryBands($id)
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
				
		// Get the department indexes
		$departmentIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
				
		// Update the departments
		foreach ($departmentIndexObjects as $departmentIndexObject)
		{
			$this->updateDepartmentDeliveryBand($departmentIndexObject->getDepartmentId());
		}

	    return true;
	}
		
	// Update the products from template
	public function updateProductsFromTemplate($id, $templateField, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the department index
		$itemIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
		
		// Get the product indexes
		$productIndexObjects = $this->getProducts($id, $locale);
		
		// Get the template
		$template = array();
		switch ($templateField)
		{
			case 'page-title':
				$template = $itemIndexObject->getPageTitleTemplate();
				break;
			case 'header':
				$template = $itemIndexObject->getHeaderTemplate();
				break;
			case 'meta-description':
				$template = $itemIndexObject->getMetaDescriptionTemplate();
				break;
		}
		
		// Get the template parts
		$templateParts = explode('^', $template);
		
		// Get the previews
		$templatePreviews = array();
		foreach ($productIndexObjects as $productIndexObject)
		{
			$templatePreview = array();
			foreach ($templateParts as $templatePart)
			{
				switch ($templatePart)
				{
					case 'brand':
						if ($productIndexObject->getBrand() != '')
						{
							$templatePreview[] = trim($productIndexObject->getBrand());
						}
						break;
					case 'productCode':
						if ($productIndexObject->getProductCode() != '')
						{
							$templatePreview[] = trim($productIndexObject->getProductCode());
						}
						break;
					case 'department':
						if ($itemIndexObject->getName() != '')
						{
							$templatePreview[] = trim($itemIndexObject->getName());
						}
						break;
					case 'productExtraKeyword':
						if ($productIndexObject->getPrefix() != '')
						{
							$templatePreview[] = trim($productIndexObject->getPrefix());
						}
						break;
					case 'keyMessage':
						if ($productIndexObject->getTagline() != '')
						{
							$templatePreview[] = trim($productIndexObject->getTagline());
						}
						break;
					default:
						$templatePartParts = explode('|', $templatePart);
						$templatePartName = false;
						$templatePartValue = false;
						if (isset($templatePartParts[0]))
						{
							$templatePartName = $templatePartParts[0];
						}
						if (isset($templatePartParts[1]))
						{
							$templatePartValue = $templatePartParts[1];
						}
						if ($templatePartName && $templatePartValue)
						{
							if ($templatePartName == 'productFeatureGroup')
							{
								$productToFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findOneBy(array('productFeatureGroupId' => $templatePartValue, 'productId' => $productIndexObject->getProductId()));
								if ($productToFeatureObject)
								{
									$productFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->find($productToFeatureObject->getProductFeatureId());
									if ($productFeatureObject)
									{
										$productFeatureValue = $productFeatureObject->getProductFeature();
										if (($productFeatureValue != '') && ($productFeatureValue != '*** NOT SET ***') && ($productFeatureValue != 'Yes') && ($productFeatureValue != 'NO') && ($productFeatureValue != 'UNKNOWN'))
										{
											$templatePreview[] = trim($templatePartValue);
										}
									}
								}
							} elseif ($templatePartName == 'freeText') {
								$templatePreview[] = trim($templatePartValue);
							}
						}
						break;
				}
			}
			
			// Check if an update is required
			switch ($templateField)
			{
				case 'page-title':
					if ($productIndexObject->getPageTitle() != $templatePreview)
					{
						$productIndexObject->setPageTitle($templatePreview);
						$em->persist($productIndexObject);
						$em->flush();
						$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $productIndexObject->getProductId(), 'locale' => $locale));
						if ($productDescriptionObject)
						{
							$productDescriptionObject->setPageTitle($templatePreview);
							$em->persist($productDescriptionObject);
							$em->flush();
						}
					}
					break;
				case 'header':
					if ($productIndexObject->getHeader() != $templatePreview)
					{
						$productIndexObject->setHeader($templatePreview);
						$em->persist($productIndexObject);
						$em->flush();
						$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $productIndexObject->getProductId(), 'locale' => $locale));
						if ($productDescriptionObject)
						{
							$productDescriptionObject->setHeader($templatePreview);
							$em->persist($productDescriptionObject);
							$em->flush();
						}
					}
					break;
				case 'meta-description':
					if ($productIndexObject->getMetaDescription() != $templatePreview)
					{
						$productIndexObject->setMetaDescription($templatePreview);
						$em->persist($productIndexObject);
						$em->flush();
						$productDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\ProductDescription')->findOneBy(array('productId' => $productIndexObject->getProductId(), 'locale' => $locale));
						if ($productDescriptionObject)
						{
							$productDescriptionObject->setMetaDescription($templatePreview);
							$em->persist($productDescriptionObject);
							$em->flush();
						}
					}
					break;
			}
		}

	    return true;
	}
	
	// Get the template content
	public function getTemplateContent($id, $templateField, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the department index
		$itemIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
		
		// Get the template
		$template = false;
		switch ($templateField)
		{
			case 'page-title':
				$template = $itemIndexObject->getPageTitleTemplate();
				break;
			case 'header':
				$template = $itemIndexObject->getHeaderTemplate();
				break;
			case 'meta-description':
				$template = $itemIndexObject->getMetaDescriptionTemplate();
				break;
		}
		
		// Get the template content
		$templateContent = '';
	    if ($template)
	    {
	    	$templatePartsCount = 0;
			$templateParts = explode('^', $template);
			foreach ($templateParts as $templatePart)
			{
				$templatePartsCount++;
				switch ($templatePart)
				{
					case 'brand':
						$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="brand">Brand<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
						break;
					case 'productCode':
						$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="productCode">Product Code<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
						break;
					case 'department':
						$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="department">Department<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
						break;
					case 'productExtraKeyword':
						$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="productExtraKeyword">Product Extra Keyword<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
						break;
					case 'keyMessage':
						$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="keyMessage">Key Message<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
						break;
					default:
						$templatePartParts = explode('|', $templatePart);
						$templatePartName = false;
						$templatePartValue = false;
						if (isset($templatePartParts[0]))
						{
							$templatePartName = $templatePartParts[0];
						}
						if (isset($templatePartParts[1]))
						{
							$templatePartValue = $templatePartParts[1];
						}
						if ($templatePartName && $templatePartValue)
						{
							if ($templatePartName == 'productFeatureGroup')
							{
								$productFeatureGroupObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeatureGroup')->find($templatePartValue);
								if ($productFeatureGroupObject)
								{
									$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="productFeatureGroup|'.$templatePartValue.'">Feature Group: '.$productFeatureGroupObject->getProductFeatureGroup().'<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
								}
							} elseif ($templatePartName == 'freeText') {
								$templateContent .= '<li data-flat-sortable-list-object="'.$templateField.'-template" id="flat-sortable-list-'.$templateField.'-item-'.$templatePartsCount.'" data-value="freeText|'.$templatePartValue.'">Free Text: '.$templatePartValue.'<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
							}
						}
						break;
				}
			}
	    }
	    
	    return $templateContent;
	}
	
	// Get the template product previews
	public function getTemplateProductPreviews($id, $templateField, $locale = 'en')
	{
		// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
		
		// Get the department index
		$itemIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
		
		// Get the product indexes
		$productIndexObjects = $this->getProducts($id, $locale);
		
		// Get the template
		$template = array();
		switch ($templateField)
		{
			case 'page-title':
				$template = $itemIndexObject->getPageTitleTemplate();
				break;
			case 'header':
				$template = $itemIndexObject->getHeaderTemplate();
				break;
			case 'meta-description':
				$template = $itemIndexObject->getMetaDescriptionTemplate();
				break;
		}
		
		// Get the template parts
		$templateParts = explode('^', $template);
		
		// Get the previews
		$templatePreviews = array();
		foreach ($productIndexObjects as $productIndexObject)
		{
			$templatePreview = array();
			foreach ($templateParts as $templatePart)
			{
				switch ($templatePart)
				{
					case 'brand':
						if ($productIndexObject->getBrand() != '')
						{
							$templatePreview[] = trim($productIndexObject->getBrand());
						}
						break;
					case 'productCode':
						if ($productIndexObject->getProductCode() != '')
						{
							$templatePreview[] = trim($productIndexObject->getProductCode());
						}
						break;
					case 'department':
						if ($itemIndexObject->getName() != '')
						{
							$templatePreview[] = trim($itemIndexObject->getName());
						}
						break;
					case 'productExtraKeyword':
						if ($productIndexObject->getPrefix() != '')
						{
							$templatePreview[] = trim($productIndexObject->getPrefix());
						}
						break;
					case 'keyMessage':
						if ($productIndexObject->getTagline() != '')
						{
							$templatePreview[] = trim($productIndexObject->getTagline());
						}
						break;
					default:
						$templatePartParts = explode('|', $templatePart);
						$templatePartName = false;
						$templatePartValue = false;
						if (isset($templatePartParts[0]))
						{
							$templatePartName = $templatePartParts[0];
						}
						if (isset($templatePartParts[1]))
						{
							$templatePartValue = $templatePartParts[1];
						}
						if ($templatePartName && $templatePartValue)
						{
							if ($templatePartName == 'productFeatureGroup')
							{
								$productToFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductToFeature')->findOneBy(array('productFeatureGroupId' => $pageTitlePartValue, 'productId' => $productIndexObject->getProductId()));
								if ($productToFeatureObject)
								{
									$productFeatureObject = $em->getRepository('KAC\SiteBundle\Entity\ProductFeature')->find($productToFeatureObject->getProductFeatureId());
									if ($productFeatureObject)
									{
										$productFeatureValue = $productFeatureObject->getProductFeature();
										if (($productFeatureValue != '') && ($productFeatureValue != '*** NOT SET ***') && ($productFeatureValue != 'Yes') && ($productFeatureValue != 'NO') && ($productFeatureValue != 'UNKNOWN'))
										{
											$templatePreview[] = trim($templatePartValue);
										}
									}
								}
							} elseif ($templatePartName == 'freeText') {
								$templatePreview[] = trim($templatePartValue);
							}
						}
						break;
				}
			}
			$templatePreviews[] = implode(' ', $templatePreview);
		}

	    return $templatePreviews;
	}
    
    // Rebuild the department index
    public function rebuildDepartmentIndex($locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the departments
    	$departmentObjects = $em->getRepository('KAC\SiteBundle\Entity\Department')->findAll();
    	
    	// Rebuild the department index
    	foreach ($departmentObjects as $departmentObject)
    	{
	    	$this->rebuildDepartmentIndexObject($departmentObject->getId(), $locale);
    	}
		    
    	return true;
	}
	
	// Rebuild a department index object
    public function rebuildDepartmentIndexObject($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the objects
    	$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
    	$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
    	$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'department', 'locale' => $locale));
    	
    	// Check the objects both exist
    	if (!$departmentObject || !$departmentDescriptionObject || !$routingObject)
    	{
	    	return false;
    	}
    	
    	// Get any sub departments
    	$subDepartmentObjects = $em->getRepository('KAC\SiteBundle\Entity\Department')->findBy(array('parent' => $id));
    	$departmentCount = sizeof($subDepartmentObjects);
    	if ($departmentCount > 0)
    	{
	    	$departmentIds = array();
	    	$departments = array();
	    	foreach ($subDepartmentObjects as $subDepartmentObject)
	    	{
	    		$subDepartmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $subDepartmentObject->getId(), 'locale' => $locale));
	    		if ($subDepartmentDescriptionObject)
	    		{
		    		$departmentIds[] = $subDepartmentObject->getId();
		    		$departments[] = $subDepartmentDescriptionObject->getName();
		    	} else {
			    	$departmentCount--;
		    	}
	    	}
	    	$departmentIds = '|'.implode('|', $departmentIds).'|';
	    	$departments = '|'.implode('|', $departments).'|';
    	} else {
    		$departmentIds = '';
	    	$departments = '';
    	}
    	
    	// Get product count
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("pi.id"));
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$id.'|%')));
		$productCount = $qb->getQuery()->getSingleScalarResult();
		
		// Get direct product count
		$productToDepartmentObjects = $em->getRepository('KAC\SiteBundle\Entity\ProductToDepartment')->findBy(array('departmentId' => $id, 'displayOrder' => '1'));
		$directProductCount = sizeof($productToDepartmentObjects);
		
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("pi.id"));
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$id.'|%')));
		$productCount = $qb->getQuery()->getSingleScalarResult();
		
		// Update the index    	
    	$departmentIndexObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentIndex')->findOneBy(array('departmentId' => $id));
    	if (!$departmentIndexObject)
    	{
    		$departmentIndexObject = new DepartmentIndex();
    		$departmentIndexObject->setDepartmentId($id);
    	}
    	$departmentIndexObject->setParentId($departmentObject->getParentId());
		$departmentIndexObject->setStatus($departmentObject->getStatus());
		$departmentIndexObject->setDepartmentPath('|'.$departmentObject->getDepartmentPath().'|');
		$departmentIndexObject->setHidePrices($departmentObject->getHidePrices());
		$departmentIndexObject->setShowPricesOutOfHours($departmentObject->getShowPricesOutOfHours());
		$departmentIndexObject->setMembershipCardDiscountAvailable($departmentObject->getMembershipCardDiscountAvailable());
		$departmentIndexObject->setMaximumMembershipCardDiscount($departmentObject->getMaximumMembershipCardDiscount());
		$departmentIndexObject->setDeliveryBand($departmentObject->getDeliveryBand());
		$departmentIndexObject->setInheritedDeliveryBand($departmentObject->getInheritedDeliveryBand());
		$departmentIndexObject->setCheckDeliveryBand($departmentObject->getCheckDeliveryBand());
		$departmentIndexObject->setDisplayOrder($departmentObject->getDisplayOrder());
    	$departmentIndexObject->setLocale($locale);
    	$departmentIndexObject->setDeliveryBandNotes($departmentDescriptionObject->getDeliveryBandNotes());
		$departmentIndexObject->setName($departmentDescriptionObject->getName());
		$departmentIndexObject->setGoogleDepartment($departmentDescriptionObject->getGoogleDepartment());
		$departmentIndexObject->setEbayDepartment($departmentDescriptionObject->getEbayDepartment());
		$departmentIndexObject->setAmazonDepartment($departmentDescriptionObject->getAmazonDepartment());
		$departmentIndexObject->setDescription($departmentDescriptionObject->getDescription());
		$departmentIndexObject->setMenuTitle($departmentDescriptionObject->getMenuTitle());
		$departmentIndexObject->setPageTitle($departmentDescriptionObject->getPageTitle());
		$departmentIndexObject->setPageTitleTemplate($departmentDescriptionObject->getPageTitleTemplate());
		$departmentIndexObject->setHeader($departmentDescriptionObject->getHeader());
		$departmentIndexObject->setMetaDescription($departmentDescriptionObject->getMetaDescription());
		$departmentIndexObject->setMetaDescriptionTemplate($departmentDescriptionObject->getMetaDescriptionTemplate());
		$departmentIndexObject->setMetaKeywords($departmentDescriptionObject->getMetaKeywords());
		$departmentIndexObject->setSearchWords($departmentDescriptionObject->getSearchWords());
		$departmentIndexObject->setUrl($routingObject->getUrl());
		$departmentIndexObject->setDepartmentCount($departmentCount);
		$departmentIndexObject->setDepartmentIds($departmentIds);
		$departmentIndexObject->setDepartments($departments);
		$departmentIndexObject->setProductCount($productCount);
		$departmentIndexObject->setDirectProductCount($directProductCount);
    	$em->persist($departmentIndexObject);
		$em->flush();
		    
    	return true;
	}
	
	// Rebuild path
    public function rebuildPath($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the department object
    	$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
    	
    	// Build the path
    	$existingDepartmentPath = $departmentObject->getDepartmentPath();
    	$parentId = $departmentObject->getParent()->getId();
    	$departmentPath = $parentId.'|'.$id;
    	while ($parentId > 0)
    	{
	    	$parentDepartmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($parentId);
	    	if ($parentDepartmentObject)
	    	{
		    	$parentId = $parentDepartmentObject->getParentId();
		    	$departmentPath = $parentDepartmentObject->getId().'|'.$departmentPath;
	    	} else {
		    	$parentId = 0;
	    	}
    	}
    	
    	// Update the department path
    	if ($departmentPath != $existingDepartmentPath)
    	{
	    	$departmentObject->setDepartmentPath($departmentPath);
	    	$em->persist($departmentObject);
	    	$em->flush();
	    	return true;
    	}
		    
    	return false;
	}
	
	// Rebuild routing
    public function rebuildRouting($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$seoService = $this->container->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $doctrineService->getManager();
    	
    	// Get the object
    	$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->find($id);
    	$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $id, 'locale' => $locale));
    	if (!$departmentObject || !$departmentDescriptionObject)
    	{
	    	return false;
    	}
    	
    	// Get the routing
    	$parentRoutingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $departmentObject->getParentId(), 'locale' => $locale));
    	$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $id, 'locale' => $locale));
    	
    	// Get the URLs
    	$existingUrl = $routingObject->getUrl();
    	$url = $seoService->generateUrl($departmentDescriptionObject->getPageTitle());
    	
    	// Setup the routing
    	if ($parentRoutingObject)
    	{
	    	$routingUrl = $seoService->createUrl($parentRoutingObject->getUrl().'/'.$url, $routingObject->getUrl());
    	} else {
	    	$routingUrl = $seoService->createUrl($url, $routingObject->getUrl());
    	}
    	$routingObject->setUrl($routingUrl);
    	$em->persist($routingObject);
    	$em->flush();
    	
    	// Setup any redirects if required
		if ($existingUrl != $routingUrl)
		{
			$seoService->updateRedirects($id, 'department', $existingUrl, $routingUrl);
		}
				    
    	return true;
	}
}