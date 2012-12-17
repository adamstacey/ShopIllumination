<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\BrandIndex;
use WebIllumination\AdminBundle\Entity\ObjectIndex;

class BrandService {

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
        $this->singleItemTitle = 'Brand';
        $this->multipleItemsTitle = 'Brands';
        $this->singleItemDescription = 'brand';
        $this->multipleItemsDescription = 'brands';
        $this->singleItemClass = 'brand';
        $this->multipleItemsClass = 'brands';
        $this->singleItemPath = 'brand';
        $this->multipleItemsPath = 'brands';
        $this->singleItemModel = 'Brand';
        $this->multipleItemsModel = 'Brands';
        $this->listingSortOrder = 'bd.brand:ASC';
        $this->listingSort = 'bd.brand';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
    }
    
    // Initialise the admin order session
    public function initialiseAdminBrandSession()
    {	
  		// Get the settings session
    	$sessionSettings = $this->container->get('session')->get('settings');
    	if (!isset($sessionSettings['admin']['brands']))
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
    		$settings = $sessionSettings['admin']['brands'];
    	}
    	
    	// Get the filters session
    	$sessionFilters = $this->container->get('session')->get('filters');
    	if (!isset($sessionFilters['admin']['brands']))
    	{
    		// Setup the filters
    		$filters = array();
    		$filters['status'] = '';
    		$filters['hidePrices'] = '';
    		$filters['showPricesOutOfHours'] = '';
    		$filters['membershipCardDiscountAvailable'] = '';
    		$filters['name'] = '';
    		$filters['description'] = '';
   		} else {
   			$filters = $sessionFilters['admin']['brands'];
   		}
    	
    	// Update the session
    	$sessionSettings['admin']['brands'] = $settings;
    	$sessionFilters['admin']['brands'] = $filters;
    	$this->container->get('session')->set('settings', $sessionSettings);
    	$this->container->get('session')->set('filters', $sessionFilters);
    	
    	return true;
    }
    
    // Get listing
    public function getAdminListing($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $sort, $order, $page, $maxResults)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$systemService = $this->container->get('web_illumination_admin.system_service');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Calculate the first result
    	$firstResult = ($page - 1) * $maxResults;
    	
    	// Setup the brands array
    	$brands = array();
    	
        // Get the brands
		$query = "SELECT b.id ";
        $query .= "FROM WebIllumination\SiteBundle\Entity\Brand b, WebIllumination\SiteBundle\Entity\BrandDescription bd ";
        $query .= "WHERE b.id = bd.brandId ";
		if ($status)
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(b.status = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.status = '".$options."' ";
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
					$optionWhere = "(b.hidePrices = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.hidePrices = '".$options."' ";
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
					$optionWhere = "(b.showPricesOutOfHours = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.showPricesOutOfHours = '".$options."' ";
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
					$optionWhere = "(b.membershipCardDiscountAvailable = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.membershipCardDiscountAvailable = '".$options."' ";
    		}
    	}
    	if ($name)
    	{
    		$query .= "AND bd.brand LIKE '%".$name."%' ";
    	}
    	if ($description)
    	{
    		$query .= "AND bd.description LIKE '%".$description."%' ";
    	}
        $query .= "ORDER BY ".$sort." ".$order;
        
    	$brandObjects = $em->createQuery($query)->setFirstResult($firstResult)->setMaxResults($maxResults)->getResult();
				
        foreach ($brandObjects as $brandObject)
        {
        	if ($brandObject)
        	{
	    		$brand = $this->getBrand($brandObject['id']);
	    		$brands[$brandObject['id']] = $brand;
	    	}
	    }
				
   		return $brands;
    }
    
    // Get listing count
    public function getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$systemService = $this->container->get('web_illumination_admin.system_service');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Setup the brands array
    	$brands = array();
    	
        // Get the brands
		$query = "SELECT COUNT(b.id) ";
        $query .= "FROM WebIllumination\SiteBundle\Entity\Brand b, WebIllumination\SiteBundle\Entity\BrandDescription bd ";
        $query .= "WHERE b.id = bd.brandId ";
		if ($status)
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$optionWhere = array();
				foreach ($options as $option)
				{
					$optionWhere = "(b.status = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.status = '".$options."' ";
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
					$optionWhere = "(b.hidePrices = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.hidePrices = '".$options."' ";
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
					$optionWhere = "(b.showPricesOutOfHours = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.showPricesOutOfHours = '".$options."' ";
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
					$optionWhere = "(b.membershipCardDiscountAvailable = '".$option."')";
				}
				$query .= "AND (".join(' OR ', $optionWhere).") ";
    		} else {
    			$query .= "AND b.membershipCardDiscountAvailable = '".$options."' ";
    		}
    	}
    	if ($name)
    	{
    		$query .= "AND bd.brand LIKE '%".$name."%' ";
    	}
    	if ($description)
    	{
    		$query .= "AND bd.description LIKE '%".$description."%' ";
    	}
		
		// Get the listing count
		$listingCount = $em->createQuery($query)->getSingleScalarResult();
		
   		return $listingCount;
    }
        
    // Get listing pagination
    public function getAdminListingPagination($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description, $maxResults)
    {    	
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Get the number of results
    	$listingCount = $this->getAdminListingCount($status, $hidePrices, $showPricesOutOfHours, $membershipCardDiscountAvailable, $name, $description);
    	
    	// Check if there is only one page of results
    	if ($listingCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$pagination = ceil($listingCount / $maxResults);
    	
   		return $pagination;
    }
    
    // Get a brand
    public function getBrand($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$seoService = $this->container->get('web_illumination_admin.seo_service');
    	$productService = $this->container->get('web_illumination_admin.product_service');
    	$contactService = $this->container->get('web_illumination_admin.contact_service');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
   		// Setup the brand
    	$brand = array();
   		
   		// Get the brand
   		$brandObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->find($id);
    	$brandDescriptionObject = $em->getRepository('WebIllumination\SiteBundle\Entity\BrandDescription')->findOneBy(array('brandId' => $id, 'locale' => $locale));
    	if (!$brandObject || !$brandDescriptionObject)
	    {
        	return false;
    	}
    	$brand['id'] = $brandObject->getId();
    	$brand['brandId'] = $brandDescriptionObject->getBrandId();
    	$brand['logoImageId'] = $brandDescriptionObject->getLogoImageId();
    	$brand['status'] = $brandObject->getStatus();
    	$brand['statusColour'] = $brandObject->getStatusColour();
    	$brand['requestABrochure'] = $brandObject->getRequestABrochure();
    	$brand['brochureWebAddress'] = $brandObject->getBrochureWebAddress();
    	$brand['requestASample'] = $brandObject->getRequestASample();
    	$brand['sampleWebAddress'] = $brandObject->getSampleWebAddress();
    	$brand['hidePrices'] = $brandObject->getHidePrices();
    	$brand['showPricesOutOfHours'] = $brandObject->getShowPricesOutOfHours();
    	$brand['membershipCardDiscountAvailable'] = $brandObject->getMembershipCardDiscountAvailable();
    	$brand['maximumMembershipCardDiscount'] = $brandObject->getMaximumMembershipCardDiscount();
    	$brand['locale'] = $brandDescriptionObject->getLocale();
    	$brand['brand'] = $brandDescriptionObject->getBrand();
    	$brand['description'] = $brandDescriptionObject->getDescription();
    	$brand['about'] = $brandDescriptionObject->getAbout();
    	$brand['history'] = $brandDescriptionObject->getHistory();
    	$brand['moreInformation'] = $brandDescriptionObject->getMoreInformation();
    	$brand['pageTitle'] = $brandDescriptionObject->getPageTitle();
    	$brand['header'] = $brandDescriptionObject->getHeader();
    	$brand['metaDescription'] = $brandDescriptionObject->getMetaDescription();
    	$brand['metaKeywords'] = $brandDescriptionObject->getMetaKeywords();
    	$brand['searchWords'] = $brandDescriptionObject->getSearchWords();
    	$brand['updatedAt'] = $brandDescriptionObject->getUpdatedAt();
    	
    	// Get the product count
    	$brand['productCount'] = $productService->getProductListingCount('', $brandObject->getId(), false, false, false, 0, 0, $locale, 'GBP');
    	
    	// Get the contacts
    	$brand['contacts'] = $contactService->getContacts($id, 'brand');
    	    	
    	// Get the routing
    	$routingObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => $locale));
    	if (!$routingObject)
    	{
    		// Add routing
    		$routingObject = new Routing();
    		$routingObject->setObjectId($id);
    		$routingObject->setObjectType('brand');
    		$routingObject->setLocale('en');
    		$routingObject->setUrl($seoService->createUrl($brandDescriptionObject->getHeader()));
		    $em->persist($routingObject);
		    $em->flush();
    	}
    	$brand['url'] = $routingObject->getUrl();
    	
    	// Get the logo
    	$brand['logo'] = array();
    	$imageObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->find($brandDescriptionObject->getLogoImageId());
    	if ($imageObject)
    	{
    		$logo = array();
    		$logo['originalPath'] = $imageObject->getOriginalPath();
    		list($logo['originalWidth'], $logo['originalHeight']) = getimagesize($this->getUploadRootDir().$logo['originalPath']);
    		$logo['thumbnailPath'] = $imageObject->getThumbnailPath();
    		list($logo['thumbnailWidth'], $logo['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$logo['thumbnailPath']);
    		$logo['mediumPath'] = $imageObject->getMediumPath();
    		list($logo['mediumWidth'], $logo['mediumHeight']) = getimagesize($this->getUploadRootDir().$logo['mediumPath']);
    		$logo['largePath'] = $imageObject->getLargePath();
    		list($logo['largeWidth'], $logo['largeHeight']) = getimagesize($this->getUploadRootDir().$logo['largePath']);
    		$logo['title'] = $imageObject->getTitle();
    		$logo['link'] = $imageObject->getLink();
    		$logo['description'] = $imageObject->getDescription();
    		$logo['alignment'] = $imageObject->getAlignment();
    		$brand['logo'] = $logo;
    	}
    	
    	// Get the images
    	$images = array();
    	$imagesObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findBy(array('objectId' => $id, 'objectType' => 'brand', 'imageType' => 'gallery', 'locale' => $locale), array('displayOrder' => 'ASC'));
    	foreach ($imagesObject as $imageObject)
    	{
    		$image = array();
    		$image['originalPath'] = $imageObject->getOriginalPath();
    		list($image['originalWidth'], $image['originalHeight']) = getimagesize($this->getUploadRootDir().$image['originalPath']);
    		$image['thumbnailPath'] = $imageObject->getThumbnailPath();
    		list($image['thumbnailWidth'], $image['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$image['thumbnailPath']);
    		$image['mediumPath'] = $imageObject->getMediumPath();
    		list($image['mediumWidth'], $image['mediumHeight']) = getimagesize($this->getUploadRootDir().$image['mediumPath']);
    		$image['largePath'] = $imageObject->getLargePath();
    		list($image['largeWidth'], $image['largeHeight']) = getimagesize($this->getUploadRootDir().$image['largePath']);
    		$image['title'] = $imageObject->getTitle();
    		$image['link'] = $imageObject->getLink();
    		$image['description'] = $imageObject->getDescription();
    		$image['alignment'] = $imageObject->getAlignment();
    		$images[] = $image;
    	}
    	$brand['images'] = $images;
    	
    	// Get the guarantees
    	$guarantees = array();
    	$guaranteeObjects = $em->getRepository('WebIllumination\SiteBundle\Entity\Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'brand'), array('displayOrder' => 'ASC'));
		foreach ($guaranteeObjects as $guaranteeObject)
		{
			if ($guaranteeObject)
			{				
				$guaranteeLengthObject = $em->getRepository('WebIllumination\SiteBundle\Entity\GuaranteeLength')->find($guaranteeObject->getGuaranteeLengthId());
				$guaranteeTypeObject = $em->getRepository('WebIllumination\SiteBundle\Entity\GuaranteeType')->find($guaranteeObject->getGuaranteeTypeId());
				if ($guaranteeLengthObject && $guaranteeTypeObject)
				{
					$guarantee = array();
					$guarantee['id'] = $guaranteeObject->getId();
					$guarantee['displayOrder'] = $guaranteeObject->getDisplayOrder();
					$guarantee['guaranteeLengthId'] = $guaranteeObject->getGuaranteeLengthId();
					$guarantee['guaranteeLength'] = $guaranteeLengthObject->getGuaranteeLength();
					$guarantee['guaranteeTitle'] = $guaranteeLengthObject->getGuaranteeTitle();
					$guarantee['guaranteeTypeId'] = $guaranteeObject->getGuaranteeTypeId();
					$guarantee['guaranteeType'] = $guaranteeTypeObject->getGuaranteeType();
					$guarantees[$guaranteeObject->getId()] = $guarantee;
				}
			}
		}
		$brand['guarantees'] = $guarantees;
		
		// Get the departments
    	$departments = array();
    	$departmentIds = array();
    	$productIndexObjects = $em->getRepository('WebIllumination\SiteBundle\Entity\ProductIndex')->findBy(array('brandId' => $id, 'locale' => 'en'));
		foreach ($productIndexObjects as $productIndexObject)
		{
			$departmentIdGroups = explode('^', $productIndexObject->getDepartmentIds());
			foreach ($departmentIdGroups as $departmentIdGroup)
			{
				$departmentId = 0;
				$departmentIds = explode('|', $departmentIdGroup);
				if (sizeof($departmentIds) > 2)
				{
					$departmentId = $departmentIds[2];
				}
				if ($departmentId > 0)
				{
					// Check if the department has been added
					if (isset($departments[$departmentId]))
					{
						$departments[$departmentId]['productCount']++;
					} else {
						$departmentObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findOneBy(array('id' => $departmentId, 'status' => 'a'));
						$departmentDescriptionObject = $em->getRepository('WebIllumination\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentId, 'locale' => 'en'));
						$routingObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $departmentId, 'objectType' => 'department'));
						if ($departmentObject && $departmentDescriptionObject && $routingObject)
						{
							$department = array();
							$department['id'] = $departmentId;
							$department['productCount'] = 1;
							$department['name'] = $departmentDescriptionObject->getName();
							$department['url'] = $routingObject->getUrl();
							$departments[$departmentId] = $department;
						}
					}
				}
			}
		}
		$brand['departments'] = $departments;
		usort($brand['departments'], array($this, "sortDepartmentsByName"));
    	   		
    	return $brand;
    }
    
    // Get brands
    public function getBrands($locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Check if the brands are already stored
    	$objectIndexObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ObjectIndex')->findOneBy(array('objectKey' => 'all', 'objectType' => 'brands', 'locale' => $locale));
    	    	
   		// Check if the brands need rebuilding
   		$rebuildBrands = true;
   		if ($objectIndexObject)
   		{
   			if ($objectIndexObject->getRebuild() < 1)
   			{
   				$rebuildBrands = false;
   			}
   		}
   		
   		// Get the brands
   		if ($rebuildBrands)
   		{
	   		// Setup brands
	    	$brands = array();
	   		
	   		// Get the brands
	   		foreach ($em->getRepository('WebIllumination\SiteBundle\Entity\BrandDescription')->findBy(array(), array('brand' => 'ASC')) as $brandDescriptionObject)
	   		{
	   			$brand = $this->getBrand($brandDescriptionObject->getBrandId(), $locale);
	   			if (($brand['status'] == 'a') && ($brand['productCount'] > 0))
	   			{
	   				$brands[$brandDescriptionObject->getBrandId()] = $brand;
	   			}
	   		}
	   			    	
	    	// Check for the index object
	   		if (!$objectIndexObject)
	   		{
	   			$objectIndexObject = new ObjectIndex();
	   			$objectIndexObject->setObjectKey('all');
	   			$objectIndexObject->setObjectType('brands');
	   			$objectIndexObject->setLocale($locale);
	   		}
	   		
	   		// Update the index object
	   		$objectIndexObject->setObjectData(base64_encode(serialize($brands)));
	   		$objectIndexObject->setRebuild(0);
	   		$em->persist($objectIndexObject);
		    $em->flush();
   		}   		
   		
    	return unserialize(base64_decode($objectIndexObject->getObjectData()));
    }
    
    // Get full list of brands
    public function getFullBrandList($locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
   		// Setup brands
    	$brands = array();
   		
   		// Get the brands
   		$brandDescriptions = $em->getRepository('WebIllumination\SiteBundle\Entity\BrandDescription')->findBy(array('locale' => 'en'), array('brand' => 'ASC'));
   		foreach ($brandDescriptions as $brandDescriptionObject)
   		{
   			$brand = array();
   			$brand['id'] = $brandDescriptionObject->getBrandId();
   			$brand['brand'] = $brandDescriptionObject->getBrand();
   			$brands[] = $brand;
   		}
   			   	   		
    	return $brands;
    }
    
    // Delete a brand
    public function deleteBrand($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getEntityManager();
    
   		// Get the brand
   		$brandObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->find($id);
    	if (!$brandObject)
	    {
	    	error_log('Can\'t find the brand!');
        	return false;
    	} else {
    		$em->remove($brandObject);
    	}
    	
    	// Get the brand descriptions
	    $brandDescriptions = $em->getRepository('WebIllumination\SiteBundle\Entity\BrandDescription')->findBy(array('brandId' => $id));
	    if (!$brandDescriptions)
	    {
	    	error_log('Can\'t find the brand description!');
	    	return false;
	    } else {
		    foreach ($brandDescriptions as $brandDescriptionObject)
		    {
	    		if ($brandDescriptionObject)
	    		{
	    			$em->remove($brandDescriptionObject);
	    		}
	    	}
    	}
    	
    	// Get the object index
   		$objectIndex = $em->getRepository('WebIllumination\SiteBundle\Entity\ObjectIndex')->findOneBy(array('objectKey' => $id, 'objectType' => 'brand'));
		if ($objectIndex)
		{
			$em->remove($objectIndex);
		}
	    	    	
	    // Get the images
	    $images = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	foreach ($images as $imageObject)
    	{
    		if ($imageObject)
    		{
    			$em->remove($imageObject);
    		}
    	}
    	
    	// Get the guarantees
	    $guarantees = $em->getRepository('WebIllumination\SiteBundle\Entity\Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	foreach ($guarantees as $guaranteeObject)
    	{
    		if ($guaranteeObject)
    		{
    			$em->remove($guaranteeObject);
    		}
    	}
	    	    	
    	// Get the routings
    	$routings = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	foreach ($routings as $routingObject)
		{
			if ($routingObject)
    		{
    			$em->remove($routingObject);
    		}
		}
		
		// Get the redirects
    	$redirects = $em->getRepository('WebIllumination\SiteBundle\Entity\Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	foreach ($redirects as $redirectObject)
		{
			if ($routingObject)
    		{
    			$em->remove($redirectObject);
    		}
		}
		
		// Remove product associations
		$products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findBy(array('brandId' => $id));
   		foreach ($products as $productObject)
		{
			if ($productObject)
    		{
    			$productObject->setBrandId(0);
    			$em->persist($productObject);
    		}
		}
		
   		// Flush the database
   		$em->flush();
   		
   		return true;
    }
    
    public function getBrandWarnings($id, $locale = 'en')
	{
		// Get the brand
		$brand = $this->getBrand($id, $locale);
		
		// Setup the warnings
		$warnings = array();
		
		// Check the status of the product
		if ($brand['brand']->getStatus() == 'h')
		{
			$warning = array();
			$warning['status'] = 'highlight';
			$warning['message'] = 'This brand is currently <strong>hidden</strong> and cannot be accessed by users visiting the site without a direct link.';
			$warning['section'] = '#general';
			$warning['icon'] = 'alert';
			$warnings[] = $warning;
		} elseif ($brand['brand']->getStatus() == 'd') {
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'This brand is currently <strong>disabled</strong> and cannot be accessed by users or search engines visiting your site.';
			$warning['section'] = '#general';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check for the logo
		if (!$logo_image)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'You have not uploaded a logo for this brand. A logo is a key part of brand awareness and is critical to pushing the brand including selling the products.';
			$warning['section'] = '#general';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check the descriptions
		if (!$brand_description->description)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'The description is what sells the brand and it is important that you explain how a potential customer will benefit from buying something from this brand.';
			$warning['section'] = '#description';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check the SEO
		if (!$web_address->url || !$brand_description->pageTitle || !$brand_description->header || !$brand_description->metaDescription || !$brand_description->metaKeywords || !$brand_description->searchWords)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'Search engine optimisation is critical to the success of your site. It is strongly recommended that all the information in this section is completed.';
			$warning['section'] = '#seo';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check for images
		if (sizeof($images) < 1)
		{
			$warning = array();
			$warning['status'] = 'highlight';
			$warning['message'] = 'You have not uploaded an image for this brand. Lifestyle images of a brand are a good way to show off the brand and the range of products.';
			$warning['section'] = '#images';
			$warning['icon'] = 'alert';
			$warnings[] = $warning;
		}
		
        return $warnings;
	}
    
    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web';
    }
    
    // Sort the departments by name
	static function sortDepartmentsByName($a, $b)
	{
	    return $a['name']>$b['name'];
	}
	
	
	
	// Rebuild the brand index
    public function rebuildBrandIndex($locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getEntityManager();
    	
    	// Get the brands
    	$brandObjects = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->findAll();
    	
    	// Rebuild the brand index
    	foreach ($brandObjects as $brandObject)
    	{
	    	$this->rebuildBrandIndexObject($brandObject->getId(), $locale);
    	}
		    
    	return true;
	}
	
	// Rebuild a brand index object
    public function rebuildBrandIndexObject($id, $locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getEntityManager();
    	
    	// Get the objects
    	$brandObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->find($id);
    	$brandDescriptionObject = $em->getRepository('WebIllumination\SiteBundle\Entity\BrandDescription')->findOneBy(array('brandId' => $id, 'locale' => $locale));
    	$routingObject = $em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => $locale));
    	
    	// Check the objects both exist
    	if (!$brandObject || !$brandDescriptionObject || !$routingObject)
    	{
	    	return false;
    	}
    	
    	// Get product count
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("pi.id"));
    	$qb->from('WebIllumination\SiteBundle\Entity\ProductIndex', 'pi');
    	$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($id)));
		$productCount = $qb->getQuery()->getSingleScalarResult();
		
		// Update the index    	
    	$brandIndexObject = $em->getRepository('WebIllumination\SiteBundle\Entity\BrandIndex')->findOneBy(array('brandId' => $id));
    	if (!$brandIndexObject)
    	{
    		$brandIndexObject = new BrandIndex();
    		$brandIndexObject->setBrandId($id);
    	}
		$brandIndexObject->setStatus($brandObject->getStatus());
		$brandIndexObject->setRequestABrochure($brandObject->getRequestABrochure());
		$brandIndexObject->setBrochureWebAddress($brandObject->getBrochureWebAddress());
		$brandIndexObject->setRequestASample($brandObject->getRequestASample());
		$brandIndexObject->setSampleWebAddress($brandObject->getSampleWebAddress());
		$brandIndexObject->setHidePrices($brandObject->getHidePrices());
		$brandIndexObject->setShowPricesOutOfHours($brandObject->getShowPricesOutOfHours());
		$brandIndexObject->setMembershipCardDiscountAvailable($brandObject->getMembershipCardDiscountAvailable());
		$brandIndexObject->setMaximumMembershipCardDiscount($brandObject->getMaximumMembershipCardDiscount());
		$brandIndexObject->setLogoImageId($brandDescriptionObject->getLogoImageId());
    	$brandIndexObject->setLocale($locale);
		$brandIndexObject->setBrand($brandDescriptionObject->getBrand());
		$brandIndexObject->setDescription($brandDescriptionObject->getDescription());
		$brandIndexObject->setAbout($brandDescriptionObject->getAbout());
		$brandIndexObject->setHistory($brandDescriptionObject->getHistory());
		$brandIndexObject->setMoreInformation($brandDescriptionObject->getMoreInformation());
		$brandIndexObject->setPageTitle($brandDescriptionObject->getPageTitle());
		$brandIndexObject->setHeader($brandDescriptionObject->getHeader());
		$brandIndexObject->setMetaDescription($brandDescriptionObject->getMetaDescription());
		$brandIndexObject->setMetaKeywords($brandDescriptionObject->getMetaKeywords());
		$brandIndexObject->setSearchWords($brandDescriptionObject->getSearchWords());
		$brandIndexObject->setUrl($routingObject->getUrl());
		$brandIndexObject->setProductCount($productCount);
    	$em->persist($brandIndexObject);
		$em->flush();
		    
    	return true;
	}
}

