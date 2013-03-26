<?php 

namespace WebIllumination\AdminBundle\Services;

use KAC\SiteBundle\Entity\Brand;
use Symfony\Component\HttpFoundation\Request;

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
        $this->listingSortOrder = 'bd.name:ASC';
        $this->listingSort = 'bd.name';
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
        $query .= "FROM KAC\SiteBundle\Entity\Brand b, KAC\SiteBundle\Entity\Brand\Description bd ";
        $query .= "WHERE b.id = bd.brand ";
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
    		$query .= "AND bd.name LIKE '%".$name."%' ";
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
        $query .= "FROM KAC\SiteBundle\Entity\Brand b, KAC\SiteBundle\Entity\Brand\Description bd ";
        $query .= "WHERE b.id = bd.brand ";
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
    		$query .= "AND bd.name LIKE '%".$name."%' ";
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

        /**
         * Get the brand object
         * @var $brandObject Brand
         * @var $brandDescriptionObject Brand\Description
         */
        $brandObject = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($id);
    	$brandDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findOneBy(array('brand' => $id, 'locale' => $locale));
    	if (!$brandObject || !$brandDescriptionObject)
	    {
        	return false;
    	}
    	$brand['id'] = $brandObject->getId();
    	$brand['brandId'] = $brandDescriptionObject->getBrand()->getId();
    	$brand['logoImageId'] = $brandDescriptionObject->getLogoImage();
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
    	$brand['productCount'] = 0;
    	
    	// Get the contacts
    	$brand['contacts'] = $contactService->getContacts($id, 'brand');
    	    	
    	// Get the routing
    	$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Brand\Routing')->findOneBy(array('objectId' => $id, 'locale' => $locale));
    	if (!$routingObject)
    	{
    		// Add routing
    		$routingObject = new Brand\Routing();
    		$routingObject->setObjectId($id);
    		$routingObject->setLocale('en');
    		$routingObject->setUrl($seoService->createUrl($brandDescriptionObject->getHeader()));
		    $em->persist($routingObject);
		    $em->flush();
    	}
    	$brand['url'] = $routingObject->getUrl();
    	
//    	// Get the logo
//    	$brand['logo'] = array();
//    	$imageObject = $brandDescriptionObject->getLogoImage();
//    	if ($imageObject)
//    	{
//    		$logo = array();
//    		$logo['originalPath'] = $imageObject->getOriginalPath();
//    		list($logo['originalWidth'], $logo['originalHeight']) = getimagesize($this->getUploadRootDir().$logo['originalPath']);
//    		$logo['thumbnailPath'] = $imageObject->getThumbnailPath();
//    		list($logo['thumbnailWidth'], $logo['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$logo['thumbnailPath']);
//    		$logo['mediumPath'] = $imageObject->getMediumPath();
//    		list($logo['mediumWidth'], $logo['mediumHeight']) = getimagesize($this->getUploadRootDir().$logo['mediumPath']);
//    		$logo['largePath'] = $imageObject->getLargePath();
//    		list($logo['largeWidth'], $logo['largeHeight']) = getimagesize($this->getUploadRootDir().$logo['largePath']);
//    		$logo['title'] = $imageObject->getTitle();
//    		$logo['link'] = $imageObject->getLink();
//    		$logo['description'] = $imageObject->getDescription();
//    		$logo['alignment'] = $imageObject->getAlignment();
//    		$brand['logo'] = $logo;
//    	}
//
//    	// Get the images
//    	$images = array();
//    	$imagesObject = $em->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array('objectId' => $id, 'objectType' => 'brand', 'imageType' => 'gallery', 'locale' => $locale), array('displayOrder' => 'ASC'));
//    	foreach ($imagesObject as $imageObject)
//    	{
//    		$image = array();
//    		$image['originalPath'] = $imageObject->getOriginalPath();
//    		list($image['originalWidth'], $image['originalHeight']) = getimagesize($this->getUploadRootDir().$image['originalPath']);
//    		$image['thumbnailPath'] = $imageObject->getThumbnailPath();
//    		list($image['thumbnailWidth'], $image['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$image['thumbnailPath']);
//    		$image['mediumPath'] = $imageObject->getMediumPath();
//    		list($image['mediumWidth'], $image['mediumHeight']) = getimagesize($this->getUploadRootDir().$image['mediumPath']);
//    		$image['largePath'] = $imageObject->getLargePath();
//    		list($image['largeWidth'], $image['largeHeight']) = getimagesize($this->getUploadRootDir().$image['largePath']);
//    		$image['title'] = $imageObject->getTitle();
//    		$image['link'] = $imageObject->getLink();
//    		$image['description'] = $imageObject->getDescription();
//    		$image['alignment'] = $imageObject->getAlignment();
//    		$images[] = $image;
//    	}
//    	$brand['images'] = $images;
    	
    	// Get the guarantees
    	$guarantees = array();
//    	$guaranteeObjects = $em->getRepository('KAC\SiteBundle\Entity\Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'brand'), array('displayOrder' => 'ASC'));
//		foreach ($guaranteeObjects as $guaranteeObject)
//		{
//			if ($guaranteeObject)
//			{
//				$guaranteeLengthObject = $em->getRepository('KAC\SiteBundle\Entity\Guarantee\Length')->find($guaranteeObject->getGuaranteeLengthId());
//				$guaranteeTypeObject = $em->getRepository('KAC\SiteBundle\Entity\Guarantee\Type')->find($guaranteeObject->getGuaranteeTypeId());
//				if ($guaranteeLengthObject && $guaranteeTypeObject)
//				{
//					$guarantee = array();
//					$guarantee['id'] = $guaranteeObject->getId();
//					$guarantee['displayOrder'] = $guaranteeObject->getDisplayOrder();
//					$guarantee['guaranteeLengthId'] = $guaranteeObject->getGuaranteeLengthId();
//					$guarantee['guaranteeLength'] = $guaranteeLengthObject->getGuaranteeLength();
//					$guarantee['guaranteeTitle'] = $guaranteeLengthObject->getGuaranteeTitle();
//					$guarantee['guaranteeTypeId'] = $guaranteeObject->getGuaranteeTypeId();
//					$guarantee['guaranteeType'] = $guaranteeTypeObject->getGuaranteeType();
//					$guarantees[$guaranteeObject->getId()] = $guarantee;
//				}
//			}
//		}
		$brand['guarantees'] = $guarantees;
		
		// Get the departments
    	$departments = array();
        //TODO: Fix this section!
//    	$departmentIds = array();
//    	$productIndexObjects = $em->getRepository('KAC\SiteBundle\Entity\Product')->findBy(array('brand' => $id, 'locale' => 'en'));
//		foreach ($productIndexObjects as $productIndexObject)
//        {
//			foreach ($productIndexObject->getDepartments() as $departmentIdGroup)
//			{
//				$departmentId = 0;
//				$departmentIds = explode('|', $departmentIdGroup);
//				if (sizeof($departmentIds) > 2)
//				{
//					$departmentId = $departmentIds[2];
//				}
//				if ($departmentId > 0)
//				{
//					// Check if the department has been added
//					if (isset($departments[$departmentId]))
//					{
//						$departments[$departmentId]['productCount']++;
//					} else {
//						$departmentObject = $em->getRepository('KAC\SiteBundle\Entity\Department')->findOneBy(array('id' => $departmentId, 'status' => 'a'));
//						$departmentDescriptionObject = $em->getRepository('KAC\SiteBundle\Entity\DepartmentDescription')->findOneBy(array('departmentId' => $departmentId, 'locale' => 'en'));
//						$routingObject = $em->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $departmentId, 'objectType' => 'department'));
//						if ($departmentObject && $departmentDescriptionObject && $routingObject)
//						{
//							$department = array();
//							$department['id'] = $departmentId;
//							$department['productCount'] = 1;
//							$department['name'] = $departmentDescriptionObject->getName();
//							$department['url'] = $routingObject->getUrl();
//							$departments[$departmentId] = $department;
//						}
//					}
//				}
//			}
//		}
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

        // Setup brands
        $brands = array();

        // Get the brands
        foreach ($em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findBy(array(), array('name' => 'ASC')) as $brandDescriptionObject)
        {
            $brand = $this->getBrand($brandDescriptionObject->getBrand()->getId(), $locale);
            if (($brand['status'] == 'a') && ($brand['productCount'] > 0))
            {
                $brands[$brandDescriptionObject->getBrand()->getId()] = $brand;
            }
        }
   		
    	return $brands;
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
   		$brandDescriptions = $em->getRepository('KAC\SiteBundle\Entity\Brand\Description')->findBy(array('locale' => 'en'), array('name' => 'ASC'));
   		foreach ($brandDescriptions as $brandDescriptionObject)
   		{
   			$brand = array();
   			$brand['id'] = $brandDescriptionObject->getBrand()->getId();
   			$brand['brand'] = $brandDescriptionObject->getName();
   			$brands[] = $brand;
   		}
   			   	   		
    	return $brands;
    }

    public function deleteBrand($id)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getEntityManager();

        // Remove product associations
        $products = $em->getRepository('KAC\SiteBundle\Entity\Product')->findBy(array('brand' => $id));
        foreach ($products as $productObject)
        {
            // Remove any links to this product
            $links = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array('linkedProduct' => $productObject->getId()));
            foreach ($links as $link)
            {
                $em->remove($link);
            }

            $em->remove($productObject);
        }

        $brandObject = $em->getRepository('KAC\SiteBundle\Entity\Brand')->find($id);
        if (!$brandObject)
        {
            error_log('Can\'t find the brand!');
            return false;
        } else {
            $em->remove($brandObject);
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
		if (1===0)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'You have not uploaded a logo for this brand. A logo is a key part of brand awareness and is critical to pushing the brand including selling the products.';
			$warning['section'] = '#general';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check the descriptions
		if (1==0)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'The description is what sells the brand and it is important that you explain how a potential customer will benefit from buying something from this brand.';
			$warning['section'] = '#description';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check the SEO
		if (1===0)
		{
			$warning = array();
			$warning['status'] = 'error';
			$warning['message'] = 'Search engine optimisation is critical to the success of your site. It is strongly recommended that all the information in this section is completed.';
			$warning['section'] = '#seo';
			$warning['icon'] = 'circle-close';
			$warnings[] = $warning;
		}
		
		// Check for images
		if (1===0)
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
}

