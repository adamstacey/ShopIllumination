<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\ProductIndex;
use WebIllumination\AdminBundle\Entity\ObjectIndex;

class ProductService {

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
	protected $membershipCardDiscount;

    public function __construct($container)
    {
        $this->container = $container;
        $this->singleItemTitle = 'Product';
        $this->multipleItemsTitle = 'Products';
        $this->singleItemDescription = 'product';
        $this->multipleItemsDescription = 'products';
        $this->singleItemClass = 'product';
        $this->multipleItemsClass = 'products';
        $this->singleItemPath = 'product';
        $this->multipleItemsPath = 'products';
        $this->singleItemModel = 'Product';
        $this->multipleItemsModel = 'Products';
        $this->listingSortOrder = 'product:ASC';
        $this->listingSort = 'product';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
        $this->membershipCardDiscount = 10;
    }
    
    // Initialise the admin order session
    public function initialiseAdminProductSession()
    {	
  		// Get the settings session
    	$sessionSettings = $this->container->get('session')->get('settings');
    	if (!isset($sessionSettings['admin']['products']))
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
    		$settings = $sessionSettings['admin']['products'];
    	}
    	
    	// Get the filters session
    	$sessionFilters = $this->container->get('session')->get('filters');
    	if (!isset($sessionFilters['admin']['products']))
    	{
    		// Setup the filters
    		$filters = array();
    		$filters['status'] = '';
    		$filters['availableForPurchase'] = '';
    		$filters['hidePrice'] = '';
    		$filters['showPriceOutOfHours'] = '';
    		$filters['membershipCardDiscountAvailable'] = '';
    		$filters['featureComparison'] = '';
    		$filters['downloadable'] = '';
    		$filters['specialOffer'] = '';
    		$filters['recommended'] = '';
    		$filters['accessory'] = '';
    		$filters['new'] = '';
    		$filters['productCode'] = '';
    		$filters['name'] = '';
    		$filters['description'] = '';
    		$filters['costPriceFrom'] = 0;
    		$filters['costPriceTo'] = 10000;
    		$filters['recommendedRetailPriceFrom'] = 0;
    		$filters['recommendedRetailPriceTo'] = 10000;
    		$filters['listPriceFrom'] = 0;
    		$filters['listPriceTo'] = 10000;
    		$filters['discountFrom'] = 0;
    		$filters['discountTo'] = 1000;
    		$filters['brand'] = '';
    		$filters['department'] = '';
   		} else {
   			$filters = $sessionFilters['admin']['products'];
   		}
    	
    	// Update the session
    	$sessionSettings['admin']['products'] = $settings;
    	$sessionFilters['admin']['products'] = $filters;
    	$this->container->get('session')->set('settings', $sessionSettings);
    	$this->container->get('session')->set('filters', $sessionFilters);
    	
    	return true;
    }
    
    // Get product search
    public function getProductSearch($search, $locale = 'en', $currencyCode = 'GBP')
    {
    	if (strlen($search) >= 3)
    	{
	    	// Get the services
	    	$doctrineService = $this->container->get('doctrine');
	    	
	    	// Split the keywords
	    	$search = explode(' ', $search);
		    	
	    	// Get the entity manager
	    	$em = $doctrineService->getEntityManager();
	    	
	    	// Get the query builder
	    	$qb = $em->createQueryBuilder();
	    	
	    	// Build the query
	    	$qb->select('pi');
	    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
	    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
	    	foreach ($search as $keyword)
	    	{
		    	$qb->andWhere($qb->expr()->orx(
		    		$qb->expr()->like('pi.searchWords', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.alternativeProductCodes', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.brand', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.departments', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.productOptions', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.product', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.header', $qb->expr()->literal('%'.$keyword.'%')),
		    		$qb->expr()->like('pi.productCode', $qb->expr()->literal('%'.$keyword.'%'))
		    	));
		    }
	    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    		$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    		$qb->addOrderBy('pi.accessory', 'ASC');
	    	$qb->addOrderBy('pi.listPrice', 'ASC');
	    	$qb->setFirstResult(0);
		   	$qb->setMaxResults(90);
	    	
	    	$query = $qb->getQuery();
			
			$products = $query->getResult();   		
	   		return $products;
	   	}
	   	
	   	return false;
    }
    
    // Get special offers
    public function getSpecialOffers($locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	$qb->andWhere($qb->expr()->lt('pi.listPrice', 'pi.recommendedRetailPrice'));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
		$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	$qb->addOrderBy('pi.listPrice', 'DESC');
    	$qb->setFirstResult(0);
	   	$qb->setMaxResults(30);
    	$query = $qb->getQuery();
		
		$products = $query->getResult();   		
   		return $products;
    }
    
    // Get all products
    public function getAllProducts($locale = 'en', $currencyCode = 'GBP')
    {
    	$products = apc_fetch('kitchen_appliance_centre_all_products');
    	if (!$products)
    	{
	    	// Get the services
	    	$doctrineService = $this->container->get('doctrine');
		    	
	    	// Get the entity manager
	    	$em = $doctrineService->getEntityManager();
	    	
	    	// Get the query builder
	    	$qb = $em->createQueryBuilder();
	    	
	    	// Build the query
	    	$qb->select('pi');
	    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
	    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
	    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
	    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
	    	$query = $qb->getQuery();
	
			// Get the products
			$products = $query->getResult();
			
			apc_store('kitchen_appliance_centre_all_products');
		}
		
   		return $products;
    }
    
    // Get listing
    public function getAdminListing($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, $features, $options, $sort, $order, $page, $maxResults)
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
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	if ($status != '')
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.status', $qb->expr()->literal($status)));
    		}
    	}
    	if ($availableForPurchase != '')
    	{
    		$options = explode('|', $availableForPurchase);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.availableForPurchase', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.availableForPurchase', $qb->expr()->literal($availableForPurchase)));
    		}
    	}
    	if ($hidePrice != '')
    	{
    		$options = explode('|', $hidePrice);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.hidePrice', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.hidePrice', $qb->expr()->literal($hidePrice)));
    		}
    	}
    	if ($showPriceOutOfHours != '')
    	{
    		$options = explode('|', $showPriceOutOfHours);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.showPriceOutOfHours', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.showPriceOutOfHours', $qb->expr()->literal($showPriceOutOfHours)));
    		}
    	}
    	if ($membershipCardDiscountAvailable != '')
    	{
    		$options = explode('|', $membershipCardDiscountAvailable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.membershipCardDiscountAvailable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.membershipCardDiscountAvailable', $qb->expr()->literal($membershipCardDiscountAvailable)));
    		}
    	}
    	if ($featureComparison != '')
    	{
    		$options = explode('|', $featureComparison);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.featureComparison', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.featureComparison', $qb->expr()->literal($featureComparison)));
    		}
    	}
    	if ($downloadable != '')
    	{
    		$options = explode('|', $downloadable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.downloadable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.downloadable', $qb->expr()->literal($downloadable)));
    		}
    	}
    	if ($specialOffer != '')
    	{
    		$options = explode('|', $specialOffer);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.specialOffer', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.specialOffer', $qb->expr()->literal($specialOffer)));
    		}
    	}
    	if ($recommended != '')
    	{
    		$options = explode('|', $recommended);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.recommended', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.recommended', $qb->expr()->literal($recommended)));
    		}
    	}
    	if ($accessory != '')
    	{
    		$options = explode('|', $accessory);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.accessory', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.accessory', $qb->expr()->literal($accessory)));
    		}
    	}
    	if ($new != '')
    	{
    		$options = explode('|', $new);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.new', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.new', $qb->expr()->literal($new)));
    		}
    	}
    	if ($productCode != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.alternativeProductCodes', $qb->expr()->literal('%'.$productCode.'%')));
    	}
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.header', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($description != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.description', $qb->expr()->literal('%'.$description.'%')));
    	}
    	if ($costPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.costPrice', $qb->expr()->literal($costPriceFrom)));
    	}
    	if ($costPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.costPrice', $qb->expr()->literal($costPriceTo)));
    	}
    	if ($recommendedRetailPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.recommendedRetailPrice', $qb->expr()->literal($recommendedRetailPriceFrom)));
    	}
    	if ($recommendedRetailPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.recommendedRetailPrice', $qb->expr()->literal($recommendedRetailPriceTo)));
    	}
    	if ($listPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($listPriceFrom)));
    	}
    	if ($listPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($listPriceTo)));
    	}
    	if ($discountFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.discount', $qb->expr()->literal($discountFrom)));
    	}
    	if ($discountTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.discount', $qb->expr()->literal($discountTo)));
    	}
		if ($brand)
    	{
    		$brands = explode('|', $brand);
    		if (sizeof($brands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $brands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($brand)));
    		}
    	}
		if ($department)
    	{
    		$departments = explode('|', $department);
    		if (sizeof($departments) > 1)
    		{
    			$departmentsExpression = $qb->expr()->orx();
    			foreach ($departments as $department)
    			{
    				$departmentsExpression->add($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$department.'|%')));
    			}
    			$qb->andWhere($departmentsExpression);
    		} else {
    			$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$department.'|%')));
    		}
    	}		
    	$qb->addOrderBy('pi.'.$sort, $order);
    	$qb->setFirstResult($firstResult);
	   	$qb->setMaxResults($maxResults);	   	
    	$query = $qb->getQuery();

		// Get the products
		$products = $query->getResult();
				
   		return $products;
    }
    
    // Get listing count
    public function getAdminListingCount($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, $features, $options)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("pi.id"));
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	if ($status != '')
    	{
    		$options = explode('|', $status);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.status', $qb->expr()->literal($status)));
    		}
    	}
    	if ($availableForPurchase != '')
    	{
    		$options = explode('|', $availableForPurchase);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.availableForPurchase', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.availableForPurchase', $qb->expr()->literal($availableForPurchase)));
    		}
    	}
    	if ($hidePrice != '')
    	{
    		$options = explode('|', $hidePrice);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.hidePrice', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.hidePrice', $qb->expr()->literal($hidePrice)));
    		}
    	}
    	if ($showPriceOutOfHours != '')
    	{
    		$options = explode('|', $showPriceOutOfHours);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.showPriceOutOfHours', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.showPriceOutOfHours', $qb->expr()->literal($showPriceOutOfHours)));
    		}
    	}
    	if ($membershipCardDiscountAvailable != '')
    	{
    		$options = explode('|', $membershipCardDiscountAvailable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.membershipCardDiscountAvailable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.membershipCardDiscountAvailable', $qb->expr()->literal($membershipCardDiscountAvailable)));
    		}
    	}
    	if ($featureComparison != '')
    	{
    		$options = explode('|', $featureComparison);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.featureComparison', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.featureComparison', $qb->expr()->literal($featureComparison)));
    		}
    	}
    	if ($downloadable != '')
    	{
    		$options = explode('|', $downloadable);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.downloadable', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.downloadable', $qb->expr()->literal($downloadable)));
    		}
    	}
    	if ($specialOffer != '')
    	{
    		$options = explode('|', $specialOffer);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.specialOffer', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.specialOffer', $qb->expr()->literal($specialOffer)));
    		}
    	}
    	if ($recommended != '')
    	{
    		$options = explode('|', $recommended);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.recommended', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.recommended', $qb->expr()->literal($recommended)));
    		}
    	}
    	if ($accessory != '')
    	{
    		$options = explode('|', $accessory);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.accessory', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.accessory', $qb->expr()->literal($accessory)));
    		}
    	}
    	if ($new != '')
    	{
    		$options = explode('|', $new);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.new', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.new', $qb->expr()->literal($new)));
    		}
    	}
    	if ($productCode != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.alternativeProductCodes', $qb->expr()->literal('%'.$productCode.'%')));
    	}
    	if ($name != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.header', $qb->expr()->literal('%'.$name.'%')));
    	}
    	if ($description != '')
    	{
    		$qb->andWhere($qb->expr()->like('pi.description', $qb->expr()->literal('%'.$description.'%')));
    	}
    	if ($costPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.costPrice', $qb->expr()->literal($costPriceFrom)));
    	}
    	if ($costPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.costPrice', $qb->expr()->literal($costPriceTo)));
    	}
    	if ($recommendedRetailPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.recommendedRetailPrice', $qb->expr()->literal($recommendedRetailPriceFrom)));
    	}
    	if ($recommendedRetailPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.recommendedRetailPrice', $qb->expr()->literal($recommendedRetailPriceTo)));
    	}
    	if ($listPriceFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($listPriceFrom)));
    	}
    	if ($listPriceTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($listPriceTo)));
    	}
    	if ($discountFrom != '')
    	{
    		$qb->andWhere($qb->expr()->gte('pi.discount', $qb->expr()->literal($discountFrom)));
    	}
    	if ($discountTo != '')
    	{
    		$qb->andWhere($qb->expr()->lte('pi.discount', $qb->expr()->literal($discountTo)));
    	}
		if ($brand)
    	{
    		$brands = explode('|', $brand);
    		if (sizeof($brands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $brands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($brand)));
    		}
    	}
		if ($department)
    	{
    		$departments = explode('|', $department);
    		if (sizeof($departments) > 1)
    		{
    			$departmentsExpression = $qb->expr()->orx();
    			foreach ($departments as $department)
    			{
    				$departmentsExpression->add($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$department.'|%')));
    			}
    			$qb->andWhere($departmentsExpression);
    		} else {
    			$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$department.'|%')));
    		}
    	}
    	$query = $qb->getQuery();
		
		// Get the listing count
		$listingCount = $query->getSingleScalarResult();
		
   		return $listingCount;
    }
        
    // Get listing pagination
    public function getAdminListingPagination($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, $features, $options, $maxResults)
    {    	
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Get the number of results
    	$listingCount = $this->getAdminListingCount($status, $availableForPurchase, $hidePrice, $showPriceOutOfHours, $membershipCardDiscountAvailable, $featureComparison, $downloadable, $specialOffer, $recommended, $accessory, $new, $productCode, $name, $description, $costPriceFrom, $costPriceTo, $recommendedRetailPriceFrom, $recommendedRetailPriceTo, $listPriceFrom, $listPriceTo, $discountFrom, $discountTo, $brand, $department, $features, $options);
    	
    	// Check if there is only one page of results
    	if ($listingCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$pagination = ceil($listingCount / $maxResults);
    	
   		return $pagination;
    }
    
    // Get product listing
    public function getProductListing($departmentId, $sort = 'listPrice', $order = 'ASC', $page = 1, $maxResults = 99999999, $brands = false, $departments = false, $options = false, $features = false, $priceFrom = 0, $priceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	    	
    	// Calculate the first result
    	$firstResult = ($page - 1) * $maxResults;
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	if ($brands)
    	{
    		if (!is_array($brands))
    		{
    			$brands = explode(',', $brands);
    		}
    		if (sizeof($brands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $brands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($brands[0])));
    		}
    	}
    	if ($departments)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departments.'|%')));
    	}
    	if ($features)
    	{
    		if (!is_array($features))
    		{
    			$features = explode(',', $features);
    		}
    		$featuresQb = $qb->expr()->orx();
    		foreach ($features as $feature)
    		{
    			$featuresQb->add($qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%|'.$feature.'|%')));
    		}
    		$qb->andWhere($featuresQb);
    	}
    	if ($priceFrom > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($priceFrom)));
    	}
    	if ($priceTo > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($priceTo)));
    	}
    	if (($departmentId != '1036') && ($departmentId != '918') && ($departmentId != '158'))
    	{
    		$qb->addOrderBy('pi.accessory', 'ASC');
    	}
    	$qb->addOrderBy('pi.'.$sort, $order);
    	$qb->setFirstResult($firstResult);
	   	$qb->setMaxResults($maxResults);	   	
    	$query = $qb->getQuery();

		// Get the products
		$products = $query->getResult();
		
		// Check if the prices should be shown or not
		foreach ($products as $product)
		{	
	    	if (($product->getHidePrice() > 0) && ($product->getShowPriceOutOfHours() > 0))
			{
				$currentDay = date("D");
				$currentTime = date("G");
				switch ($currentDay)
				{				
					case 'Sat':
					case 'Sun':
						$product->setHidePrice(0);
						break;
					case 'Mon':
					case 'Tue':
					case 'Wed':
					case 'Thu':
					case 'Fri':
						if (($currentTime < 7) || ($currentTime > 17))
						{
							$product->setHidePrice(0);
						}
						break;
				}
				$em->persist($product);
			    $em->flush();
			}
		}
		
		// Get the refreshed products
		$products = $query->getResult();
		
   		return $products;
    }
    
    // Get product listing count
    public function getProductListingCount($departmentId, $selectedGroup = false, $selectedBrands = false, $selectedDepartment = false, $selectedOptions = false, $selectedFeatures = false, $selectedPriceFrom = 0, $selectedPriceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("pi.id"));
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	if ($departmentId > 0)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	}
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	if ($selectedBrands)
    	{
    		$selectedBrands = explode(',', $selectedBrands);
    		if (sizeof($selectedBrands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $selectedBrands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($selectedBrands[0])));
    		}
    	}
    	if ($selectedDepartment)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$selectedDepartment.'|%')));
    	}
    	if ($selectedFeatures)
    	{
    		$selectedFeatures = explode(',', $selectedFeatures);
    		$featuresQb = $qb->expr()->orx();
    		foreach ($selectedFeatures as $feature)
    		{
    			$featuresQb->add($qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%|'.$feature.'|%')));
    		}
    		$qb->andWhere($featuresQb);
    	}
    	if ($selectedPriceFrom > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($selectedPriceFrom)));
    	}
    	if ($selectedPriceTo > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($selectedPriceTo)));
    	}
    	$query = $qb->getQuery();
		
		// Get the product count
		$productCount = $query->getSingleScalarResult();
		
   		return $productCount;
    }
    
    // Get product listing pagination
    public function getProductListingPagination($departmentId, $maxResults = 99999999, $brands = false, $departments = false, $options = false, $features = false, $priceFrom = 0, $priceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {    	
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Save the max results
    	$this->container->get('session')->set('maxResults', $maxResults);
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Get the number of results
    	$productCount = $this->getProductListingCount($departmentId, $brands, $departments, $options, $features, $priceFrom, $priceTo, $locale, $currencyCode);
    	
    	// Check if there is only one page of results
    	if ($productCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$productPagingation = ceil($productCount / $maxResults);
    	
   		return $productPagingation;
    }
    
    // Get the brands filter
    public function getProductListingBrandFilter($departmentId, $selectedBrands = false, $departments = false, $options = false, $features = false, $priceFrom = 0, $priceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	if ($departments)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departments.'|%')));
    	}
    	/*if ($features)
    	{
    		if (!is_array($features))
    		{
    			$features = explode(',', $features);
    		}
    		$featuresQb = $qb->expr()->orx();
    		foreach ($features as $feature)
    		{
    			$featuresQb->add($qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%|'.$feature.'|%')));
    		}
    		$qb->andWhere($featuresQb);
    	}*/
    	if ($priceFrom > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($priceFrom)));
    	}
    	if ($priceTo > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($priceTo)));
    	}
    	$query = $qb->getQuery();
    	
    	// Get the products
		$products = $query->getResult();
		
		// Get the selected brands
		$selectedBrands = explode(',', $selectedBrands);
		
		// Get the brands
		$brands = array();
		foreach ($products as $product)
		{
			if (isset($brands[$product->getBrandId()]))
			{
				$brands[$product->getBrandId()]['productCount']++;
			} else {
				$brand = array();
				$brand['id'] = $product->getBrandId();
				$brand['brand'] = $product->getBrand();
				$brand['productCount'] = 1;
				if (in_array($product->getBrandId(), $selectedBrands))
				{
					$brand['selected'] = true;
				} else {
					$brand['selected'] = false;
				}
				$brands[$product->getBrandId()] = $brand;
			}
		}
		
		return $brands;
	
	}
	
	// Get the price filter
    public function getProductListingPriceFilter($departmentId, $brands = false, $departments = false, $options = false, $features = false, $priceFrom = 0, $priceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	if ($brands)
    	{
    		if (!is_array($brands))
    		{
    			$brands = explode(',', $brands);
    		}
    		if (sizeof($brands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $brands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($brands[0])));
    		}
    	}
    	/*if ($departments)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departments.'|%')));
    	}*/
    	/*if ($features)
    	{
    		if (!is_array($features))
    		{
    			$features = explode(',', $features);
    		}
    		$featuresQb = $qb->expr()->orx();
    		foreach ($features as $feature)
    		{
    			$featuresQb->add($qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%|'.$feature.'|%')));
    		}
    		$qb->andWhere($featuresQb);
    	}*/
    	$query = $qb->getQuery();
    	
    	// Get the products
		$products = $query->getResult();
		
		$cheapestPrice = 100000;
		$mostExpensivePrice = 0;
		foreach ($products as $product)
		{
			if ($product->getListPrice() < $cheapestPrice)
			{
				$cheapestPrice = $product->getListPrice();
			}
			if ($product->getListPrice() > $mostExpensivePrice)
			{
				$mostExpensivePrice = $product->getListPrice();
			}
		}
		
		$prices = array();
		$prices['cheapestPrice'] = floor($cheapestPrice);
		$prices['mostExpensivePrice'] = ceil($mostExpensivePrice);
				
		return $prices;
	
	}
	
	// Get the departments filter
    public function getProductListingDepartmentFilter($departmentId, $selectedBrands = false, $selectedDepartment = false, $selectedOptions = false, $selectedFeatures = false, $selectedPriceFrom = 0, $selectedPriceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {	
    	// Get the services
    	$departmentService = $this->container->get('web_illumination_admin.department_service');
    	
   		// Get a list of departments
   		$departments = $departmentService->getAllDepartments($departmentId, false, false, false, false, false, false, $selectedBrands, $selectedDepartment, $selectedOptions, $selectedFeatures, $selectedPriceFrom, $selectedPriceTo, $locale, $currencyCode);
   		
		return $departments;
	
	}
	
	// Get the options filter
    public function getProductListingFeatureFilter($departmentId, $brands = false, $departments = false, $options = false, $selectedFeatures = false, $priceFrom = 0, $priceTo = 0, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->eq('pi.status', $qb->expr()->literal('a')));
    	$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	if ($brands)
    	{
    		if (!is_array($brands))
    		{
    			$brands = explode(',', $brands);
    		}
    		if (sizeof($brands) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('pi.brandId', $brands));
    		} else {
    			$qb->andWhere($qb->expr()->eq('pi.brandId', $qb->expr()->literal($brands[0])));
    		}
    	}
    	if ($departments)
    	{
    		$qb->andWhere($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departments.'|%')));
    	}
    	/*if ($selectedFeatures)
    	{
    		if (!is_array($selectedFeatures))
    		{
    			$selectedFeatures = explode(',', $selectedFeatures);
    		}
    		$featuresQb = $qb->expr()->orx();
    		foreach ($selectedFeatures as $feature)
    		{
    			$featuresQb->add($qb->expr()->like('pi.productFeatures', $qb->expr()->literal('%|'.$feature.'|%')));
    		}
    		$qb->andWhere($featuresQb);
    	}*/
    	if ($priceFrom > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('pi.listPrice', $qb->expr()->literal($priceFrom)));
    	}
    	if ($priceTo > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('pi.listPrice', $qb->expr()->literal($priceTo)));
    	}
    	$query = $qb->getQuery();
    	
    	// Get the products
		$products = $query->getResult();
		
		// Get the features
		$features = array();
		
		foreach ($products as $product)
		{
			$productIndexFeatureObjects = $product->getProductFeatures();
			$productIndexFeatureObjects = explode('|', $productIndexFeatureObjects);
			foreach ($productIndexFeatureObjects as $productIndexFeatureObject)
			{
				if ($productIndexFeatureObject)
				{
					$productIndexFeatureObject = explode(':', $productIndexFeatureObject);
					$productIndexFeatureGroup = $productIndexFeatureObject[0];
					$productIndexFeature = $productIndexFeatureObject[1];
					if ($productIndexFeatureGroup && $productIndexFeature)
					{
						if (!isset($features[$productIndexFeatureGroup]))
						{
							$features[$productIndexFeatureGroup] = array();
						}
						if (isset($features[$productIndexFeatureGroup][$productIndexFeature]))
						{
							$features[$productIndexFeatureGroup][$productIndexFeature]['productCount']++;
						} else {
							$feature = array();
							$feature['productFeatureGroup'] = $productIndexFeatureGroup;
							$feature['productFeature'] = $productIndexFeature;
							$feature['productCount'] = 1;
							if (is_array($selectedFeatures))
							{
								if (in_array($productIndexFeatureObject, $selectedFeatures))
								{
									$feature['selected'] = true;
								} else {
									$feature['selected'] = false;
								}
							} else {
								$feature['selected'] = false;
							}
							$features[$productIndexFeatureGroup][$productIndexFeature] = $feature;
						}
					}
				}
			}
		}
		
		// Sort the features
		ksort($features);
		foreach ($features as $featureGroup => $feature)
		{
			usort($features[$featureGroup], array($this, "sortProductFeaturesByFeature"));
		}
		
		return $features;
	
	}
	
	// Sort the product features by feature
	static function sortProductFeaturesByFeature($a, $b)
	{
	    return strcmp($a['productFeature'], $b['productFeature']);
	}
	
	// Sort the product features by product count
	static function sortProductFeaturesByProductCount($a, $b)
	{
	    return $a['productCount']<$b['productCount'];
	}
	
   	// Get products
    public function getProducts($locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
		// Setup products
    	$products = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findBy(array(), array('header' => 'ASC'));
	   		   				   			    	   		
    	return $products;
    }
        
    // Get a product
    public function getProduct($id, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Check if the object is stored
    	$product = apc_fetch('kitchen_appliance_centre_product_'.$id);
    	if (!$product)
    	{
	    	// Get the services
	    	$doctrineService = $this->container->get('doctrine');
	    	$seoService = $this->container->get('web_illumination_admin.seo_service');
	    	
	    	// Get the entity manager
	    	$em = $doctrineService->getEntityManager();

	   		// Setup the product
	    	$product = array();
	   		
	   		// Get the product
	   		$productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
	    	$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $id, 'locale' => $locale));
	    	if (!$productObject || !$productDescriptionObject)
		    {
	        	return false;
	    	} 
	    	$product['id'] = $productObject->getId();
	    	$product['productId'] = $productObject->getId();
	    	$product['availableForPurchase'] = $productObject->getAvailableForPurchase();
	    	$product['status'] = $productObject->getStatus();
	    	$product['product'] = $productDescriptionObject->getProduct();
	    	$product['prefix'] = $productDescriptionObject->getPrefix();
	    	$product['tagline'] = $productDescriptionObject->getTagline();
	    	$product['productCode'] = $productObject->getProductCode();
	    	$product['alternativeProductCodes'] = $productObject->getAlternativeProductCodes();
	    	$product['description'] = $productDescriptionObject->getDescription();
	    	$product['shortDescription'] = $productDescriptionObject->getShortDescription();
	    	$product['pageTitle'] = $productDescriptionObject->getPageTitle();
	    	$product['header'] = $productDescriptionObject->getHeader();
	    	$product['metaDescription'] = $productDescriptionObject->getMetaDescription();
	    	$product['metaKeywords'] = $productDescriptionObject->getMetaKeywords();
	    	$product['searchWords'] = $productDescriptionObject->getSearchWords();
	    	$product['deliveryBand'] = $productObject->getDeliveryBand();
	    	$product['deliveryCost'] = $productObject->getDeliveryCost();
	    	$product['weight'] = $productObject->getWeight();
	    	$product['length'] = $productObject->getLength();
	    	$product['width'] = $productObject->getWidth();
	    	$product['height'] = $productObject->getHeight();
	    	$product['mpn'] = $productObject->getMpn();
	    	$product['ean'] = $productObject->getEan();
	    	$product['upc'] = $productObject->getUpc();
	    	$product['jan'] = $productObject->getJan();
	    	$product['isbn'] = $productObject->getIsbn();
	    	$product['featureComparison'] = $productObject->getFeatureComparison();
	    	$product['downloadable'] = $productObject->getDownloadable();
	    	$product['specialOffer'] = $productObject->getSpecialOffer();
	    	$product['recommended'] = $productObject->getRecommended();
	    	$product['accessory'] = $productObject->getAccessory();
	    	$product['new'] = $productObject->getNew();
	    	$product['hidePrice'] = $productObject->getHidePrice();
	    	$product['showPriceOutOfHours'] = $productObject->getShowPriceOutOfHours();
	    	$product['membershipCardDiscountAvailable'] = $productObject->getMembershipCardDiscountAvailable();
	    	$product['maximumMembershipCardDiscount'] = $productObject->getMaximumMembershipCardDiscount();
	    	$product['updatedAt'] = $productObject->getUpdatedAt();
	    	
	    	// Get the brand
	    	$brandObject = $em->getRepository('WebIlluminationAdminBundle:Brand')->find($productObject->getBrandId());
	    	$brandDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $productObject->getBrandId(), 'locale' => $locale));
	    	$brandRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $productObject->getBrandId(), 'locale' => 'en', 'objectType' => 'brand'));
	    	$product['brand'] = array();
	    	if ($brandObject && $brandDescriptionObject && $brandRoutingObject)
	    	{
		    	$product['brand']['id'] = $productObject->getBrandId();
		    	$product['brand']['brand'] = $brandDescriptionObject->getBrand();
		    	$product['brand']['routing'] = $brandRoutingObject->getUrl();
		    	$product['brand']['membershipCardDiscountAvailable'] = $brandObject->getMembershipCardDiscountAvailable();
		    	$product['brand']['maximumMembershipCardDiscount'] = $brandObject->getMaximumMembershipCardDiscount();
		    	
		    	// Get the guarantees
		    	$guarantees = array();
		    	$guaranteeObjects = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $productObject->getBrandId(), 'objectType' => 'brand'), array('displayOrder' => 'ASC'));
				foreach ($guaranteeObjects as $guaranteeObject)
				{
					if ($guaranteeObject)
					{				
						$guaranteeLengthObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeLength')->find($guaranteeObject->getGuaranteeLengthId());
						$guaranteeTypeObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeType')->find($guaranteeObject->getGuaranteeTypeId());
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
				$product['brand']['guarantees'] = $guarantees;
		    	
		    	// Check the hide price and show price out of hours status for the brand
		    	if ($brandObject->getHidePrices() > 0)
		    	{
		    		$product['hidePrice'] = 1;
		    	}
		    	if ($brandObject->getShowPricesOutOfHours() > 0)
		    	{
		    		$product['showPriceOutOfHours'] = 1;
		    	}
		    }
	    	
	    	// Get the departments
	    	$departments = array();
	    	$productToDepartments = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('productId' => $id), array('displayOrder' => 'ASC'));
	    	$departmentCount = 0;
	    	foreach ($productToDepartments as $productToDepartmentObject)
	    	{
	    		if ($productToDepartmentObject)
	    		{
	    			$departmentObject = $em->getRepository('WebIlluminationAdminBundle:Department')->find($productToDepartmentObject->getDepartmentId());
	    			$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $productToDepartmentObject->getDepartmentId()));
	    			$departmentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $productToDepartmentObject->getDepartmentId(), 'locale' => 'en', 'objectType' => 'department'));
	    			if ($departmentObject && $departmentDescriptionObject && $departmentRoutingObject)
	    			{
	    				$departmentCount++;
	    				$department = array();
	    				$department['id'] = $productToDepartmentObject->getDepartmentId();
	    				$department['membershipCardDiscountAvailable'] = $departmentObject->getMembershipCardDiscountAvailable();
	    				$department['maximumMembershipCardDiscount'] = $departmentObject->getMaximumMembershipCardDiscount();
	    				$department['department'] = $departmentDescriptionObject->getName();
	    				$department['pathIds'] = $departmentObject->getDepartmentPath();
	    				$department['path'] = array();
	    				$departmentPathCount = 0;
	    				$departmentPathIds = explode('|', $department['pathIds']);
	    				foreach ($departmentPathIds as $departmentPathId)
	    				{
	    					$departmentPathDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentPathId));
	    					$departmentPathRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $departmentPathId, 'locale' => 'en', 'objectType' => 'department'));
	    					if ($departmentPathDescriptionObject && $departmentPathRoutingObject)
	    					{
	    						$departmentPathCount++;
	    						$departmentPath = array();
	    						$departmentPath['department'] = $departmentPathDescriptionObject->getName();
	    						$departmentPath['routing'] = $departmentPathRoutingObject->getUrl();
	    						$department['path'][] = $departmentPath;
	    						if ((sizeof($departmentPathIds) == $departmentPathCount) && ($departmentCount == 1))
	    						{
	    							$product['listingUrl'] = $departmentPath['routing'];
	    						}
	    					}
	    				}
	    				$departments[] = $department;
	    				
	    				// Check the hide price and show price out of hours status for the brand
				    	if ($departmentObject->getHidePrices() > 0)
				    	{
				    		$product['hidePrice'] = 1;
				    	}
				    	if ($departmentObject->getShowPricesOutOfHours() > 0)
				    	{
				    		$product['showPriceOutOfHours'] = 1;
				    	}
	    			}
	    		}
	    	}
	    	$product['departments'] = $departments;
	    	
	    	// Get the prices
	    	$prices = array();
	    	$productPrices = $em->getRepository('WebIlluminationAdminBundle:ProductPrice')->findBy(array('productId' => $id, 'currencyCode' => $currencyCode), array('displayOrder' => 'ASC'));
	    	foreach ($productPrices as $productPriceObject)
	    	{
	    		$productPrice = array();
	    		$productPrice['costPrice'] = $productPriceObject->getCostPrice();
	    		$productPrice['costPriceExcludingVat'] = $productPriceObject->getCostPriceExcludingVat();
	    		$productPrice['recommendedRetailPrice'] = $productPriceObject->getRecommendedRetailPrice();
	    		$productPrice['recommendedRetailPriceExcludingVat'] = $productPriceObject->getRecommendedRetailPriceExcludingVat();
	    		$productPrice['listPrice'] = $productPriceObject->getListPrice();
	    		$productPrice['listPriceExcludingVat'] = $productPriceObject->getListPriceExcludingVat();
	    		$productPrice['profit'] = $productPriceObject->getProfit();
	    		$productPrice['profitExcludingVat'] = $productPriceObject->getProfitExcludingVat();
	    		$productPrice['profitPercentageClass'] = $productPriceObject->getProfitPercentageClass();
	    		$productPrice['markupPercentage'] = $productPriceObject->getMarkupPercentage();
	    		$productPrice['markupPercentageClass'] = $productPriceObject->getMarkupPercentageClass();
				$productPrice['discount'] = $productPriceObject->getDiscount();
	    		$productPrice['savings'] = $productPriceObject->getSavings();
	    		$productPrice['currencyCode'] = $productPriceObject->getCurrencyCode();
	    		
	    		// Calculate the membership card price
	    		$membershipCardDiscountAvailable = true;
	    		$bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
	    		if ($product['membershipCardDiscountAvailable'] > 0)
	    		{
		    		if ($product['maximumMembershipCardDiscount'] > 0)
		    		{
		    			$bestMembershipCardDiscountAvailable = $product['maximumMembershipCardDiscount'];
		    		} else {
			    		foreach ($product['departments'] as $department)
			    		{
			    			if ($department['membershipCardDiscountAvailable'] > 0)
			    			{
			    				if ($department['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
			    				{
			    					$bestMembershipCardDiscountAvailable = $department['maximumMembershipCardDiscount'];
			    				}
			    			} else {
			    				$membershipCardDiscountAvailable = false;
			    				break;
			    			}
			    		}
			    		if ($product['brand']['membershipCardDiscountAvailable'] > 0)
		    			{
		    				if ($product['brand']['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
		    				{
		    					$bestMembershipCardDiscountAvailable = $product['brand']['maximumMembershipCardDiscount'];
		    				}
		    			} else {
		    				$membershipCardDiscountAvailable = false;
		    			}
		    		}
	    		} else {
	    			$membershipCardDiscountAvailable = false;
	    		}
	    		if ($membershipCardDiscountAvailable)
	    		{
	    			$productPrice['membershipCardPrice'] = $productPrice['recommendedRetailPrice'] - ($productPrice['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
	    		} else {
	    			$productPrice['membershipCardPrice'] = $productPrice['listPrice'];
	    		}
	    		$prices[] = $productPrice;
	    	}
	    	$product['prices'] = $prices;
	    		    	
	    	// Get the images
	    	$images = array();
	    	$imagesObject = $em->getRepository('WebIlluminationAdminBundle:Image')->findBy(array('objectId' => $id, 'objectType' => 'product', 'imageType' => 'product', 'locale' => $locale), array('displayOrder' => 'ASC'));
	    	foreach ($imagesObject as $imageObject)
	    	{
	    		$image = array();
	    		$image['originalPath'] = $imageObject->getOriginalPath();
	    		if (file_exists($this->getUploadRootDir().$image['originalPath']) && ($image['originalPath'] != ''))
	    		{
		    		list($image['originalWidth'], $image['originalHeight']) = getimagesize($this->getUploadRootDir().$image['originalPath']);
		    	}
		    	$image['thumbnailPath'] = $imageObject->getThumbnailPath();
		    	if (file_exists($this->getUploadRootDir().$image['thumbnailPath']) && ($image['thumbnailPath'] != ''))
	    		{
		    		list($image['thumbnailWidth'], $image['thumbnailHeight']) = getimagesize($this->getUploadRootDir().$image['thumbnailPath']);
		    	}
		    	$image['mediumPath'] = $imageObject->getMediumPath();
		    	if (file_exists($this->getUploadRootDir().$image['mediumPath']) && ($image['mediumPath'] != ''))
	    		{
	    			list($image['mediumWidth'], $image['mediumHeight']) = getimagesize($this->getUploadRootDir().$image['mediumPath']);
	    		}
	    		$image['largePath'] = $imageObject->getLargePath();
	    		if (file_exists($this->getUploadRootDir().$image['largePath']) && ($image['largePath'] != ''))
	    		{
	    			list($image['largeWidth'], $image['largeHeight']) = getimagesize($this->getUploadRootDir().$image['largePath']);
	    		}
	    		$image['title'] = $imageObject->getTitle();
	    		$images[] = $image;
	    	}
	    	$product['images'] = $images; 
	    	
	    	// Get the related products
	    	$relatedProducts = array();
			$relatedProductsObject = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id, 'linkType' => 'related', 'active' => 1));
			foreach ($relatedProductsObject as $relatedProductObject)
			{
				$relatedProduct = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $relatedProductObject->getProductLinkId()));
				$relatedProducts[] = $relatedProduct;
			}
			$product['relatedProducts'] = $relatedProducts;
			
			// Get the cheaper alternatives
	    	$cheaperAlternatives = array();
			$cheaperAlternativesObject = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id, 'linkType' => 'cheaper-alternative', 'active' => 1));
			foreach ($cheaperAlternativesObject as $cheaperAlternativeObject)
			{
				$cheaperAlternative = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $cheaperAlternativeObject->getProductLinkId()));
				$cheaperAlternatives[] = $cheaperAlternative;
			}
			$product['cheaperAlternatives'] = $cheaperAlternatives;
			
			// Get the options
	    	$productOptions = array();
	    	$productToOptionsObject = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->findBy(array('productId' => $id, 'active' => 1), array('displayOrder' => 'ASC'));
			foreach ($productToOptionsObject as $productToOptionObject)
			{
				$productOption = array();
				$productOptionGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductOptionGroup')->find($productToOptionObject->getProductOptionGroupId());
				$productOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductOption')->find($productToOptionObject->getProductOptionId());
				$productOption['id'] = $productToOptionObject->getId();
				$productOption['productOptionGroupId'] = $productOptionGroupObject->getId();
				$productOption['productOptionGroup'] = $productOptionGroupObject->getProductOptionGroup();
				$productOption['productOptionId'] = $productOptionObject->getId();
				$productOption['productOption'] = $productOptionObject->getProductOption();
				$productOption['price'] = $productToOptionObject->getPrice();
				$productOption['priceType'] = $productToOptionObject->getPriceType();
				$productOption['priceUse'] = $productToOptionObject->getPriceUse();
				$productOptions[$productOptionGroupObject->getProductOptionGroup()][] = $productOption;
			}
			$product['productOptions'] = $productOptions;
			
			// Get the features
	    	$productFeatures = array();
	    	$productToFeaturesObject = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findBy(array('productId' => $id, 'active' => 1), array('displayOrder' => 'ASC'));
			foreach ($productToFeaturesObject as $productToFeatureObject)
			{
				$productFeature = array();
				$productFeatureGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->find($productToFeatureObject->getProductFeatureGroupId());
				$productFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeature')->find($productToFeatureObject->getProductFeatureId());
				if ($productFeatureGroupObject && $productFeatureObject)
				{
					$productFeature['id'] = $productToFeatureObject->getId();
					$productFeature['productFeatureGroupId'] = $productFeatureGroupObject->getId();
					$productFeature['productFeatureGroup'] = $productFeatureGroupObject->getProductFeatureGroup();
					$productFeature['filter'] = $productFeatureGroupObject->getFilter();
					$productFeature['productFeatureId'] = $productFeatureObject->getId();
					$productFeature['productFeature'] = $productFeatureObject->getProductFeature();
					$productFeatures[$productFeatureGroupObject->getProductFeatureGroup()][] = $productFeature;
				}
			}
			$product['productFeatures'] = $productFeatures;
	    	
	    	// Get the routing
	    	$routingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'product', 'locale' => $locale));
	    	if (!$routingObject)
	    	{
	    		// Add routing
	    		$routingObject = new Routing();
	    		$routingObject->setObjectId($id);
	    		$routingObject->setObjectType('product');
	    		$routingObject->setLocale($locale);
	    		$routingObject->setUrl($seoService->createUrl($productDescriptionObject->getHeader()));
			    $em->persist($routingObject);
			    $em->flush();
	    	}
	    	$product['url'] = $routingObject->getUrl();
	    	
	    	// Get the guarantees
	    	$guarantees = array();
	    	$guaranteeObjects = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'product'), array('displayOrder' => 'ASC'));
			foreach ($guaranteeObjects as $guaranteeObject)
			{
				if ($guaranteeObject)
				{				
					$guaranteeLengthObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeLength')->find($guaranteeObject->getGuaranteeLengthId());
					$guaranteeTypeObject = $em->getRepository('WebIlluminationAdminBundle:GuaranteeType')->find($guaranteeObject->getGuaranteeTypeId());
					if ($guaranteeLengthObject && $guaranteeTypeObject)
					{
						$guarantee = array();
						$guarantee['id'] = $guaranteeObject->getId();
						$guarantee['displayOrder'] = $guaranteeObject->getDisplayOrder();
						$guarantee['guaranteeLengthId'] = $guaranteeObject->getGuaranteeLengthId();
						$guarantee['guaranteeLength'] = $guaranteeLengthObject->getGuaranteeLength();
						$guarantee['guaranteeTypeId'] = $guaranteeObject->getGuaranteeTypeId();
						$guarantee['guaranteeType'] = $guaranteeTypeObject->getGuaranteeType();
						$guarantees[$guaranteeObject->getId()] = $guarantee;
					}
				}
			}
			$product['guarantees'] = $guarantees;
	    		    		    	
	    	apc_store('kitchen_appliance_centre_product_'.$id, $product);
   		}
   		
   		// Check if the prices should be shown or not    	
    	if (($product['hidePrice'] > 0) && ($product['showPriceOutOfHours'] > 0))
		{
			$currentDay = date("D");
			$currentTime = date("G");
			switch ($currentDay)
			{				
				case 'Sat':
				case 'Sun':
					$product['hidePrice'] = 0;
					break;
				case 'Mon':
				case 'Tue':
				case 'Wed':
				case 'Thu':
				case 'Fri':
					if (($currentTime < 7) || ($currentTime > 17))
					{
						$product['hidePrice'] = 0;
					}
					break;
			}
		}
   		
   		return $product;
    }
    
    // Rebuild the product
    public function rebuildProduct($productId)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getEntityManager();
    	
    	// Clear the cache item
    	apc_delete('kitchen_appliance_centre_product_'.$productId);
    	
    	// Get the product
    	$product = $this->getProduct($productId, 'en', 'GBP');
    	
    	// Update the product index
    	$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $productId));
    	if (!$productIndexObject)
    	{
    		$productIndexObject = new ProductIndex();
    		$productIndexObject->setProductId($productId);
    		$productIndexObject->setChecked(0);
    	}
		$productIndexObject->setStatus($product['status']);
		$productIndexObject->setAvailableForPurchase($product['availableForPurchase']);
		$productIndexObject->setProduct('');
		$productIndexObject->setPrefix($product['prefix']);
		$productIndexObject->setTagline($product['tagline']);
		$productIndexObject->setHeader($product['header']);
		$productIndexObject->setProductCode($product['productCode']);
		$productIndexObject->setAlternativeProductCodes($product['alternativeProductCodes']);
		$productIndexObject->setShortDescription($product['shortDescription']);
		$productIndexObject->setDescription($product['description']);
		$productIndexObject->setSearchWords($product['searchWords']);
		$productIndexObject->setSpecialOffer($product['specialOffer']);
		$productIndexObject->setRecommended($product['recommended']);
		$productIndexObject->setAccessory($product['accessory']);
		$productIndexObject->setNew($product['new']);
		$productIndexObject->setHidePrice($product['hidePrice']);
    	$productIndexObject->setShowPriceOutOfHours($product['showPriceOutOfHours']); 
		$productIndexObject->setMembershipCardDiscountAvailable($product['membershipCardDiscountAvailable']);
    	$productIndexObject->setMaximumMembershipCardDiscount($product['maximumMembershipCardDiscount']); 
		$productIndexObject->setDeliveryBand($product['deliveryBand']);
		if ($product['deliveryBand'] == 1)
		{
			$productIndexObject->setDeliveryCost('1.95');
		} elseif ($product['deliveryBand'] == 5) {
			$productIndexObject->setDeliveryCost('35.0000');
		} else {
			$productIndexObject->setDeliveryCost('0.0000');
		}
		$productIndexObject->setWeight($product['weight']);
		$productIndexObject->setBrandId($product['brand']['id']);
		$productIndexObject->setBrand($product['brand']['brand']);
		$departmentIds =  array();
		$departments =  array();
		$departmentPaths =  array();
		if (is_array($product['departments']))
		{
			foreach ($product['departments'] as $department)
			{
				$departmentIds[] = '|'.$department['pathIds'].'|';
				$departmentItems = array();
				$departmentPathItems = array();
				foreach ($department['path'] as $path)
				{
					$departmentItems[] = $path['department'];
					$departmentPathItems[] = $path['department'];
				}
				$departments[] = '|'.join('|', $departmentItems).'|';
				$departmentPaths[] = join(' > ', $departmentItems);
			}
		}
		$departmentIds = join('^', $departmentIds);
		$departments = join('^', $departments);
		$departmentPaths = join('|', $departmentPaths);
		$productIndexObject->setDepartmentIds($departmentIds);
		$productIndexObject->setDepartments($departments);
		$productIndexObject->setDepartmentPaths($departmentPaths);
		$productIndexObject->setGoogleDepartment('');
		$productIndexObject->setEbayDepartment('');
		$productIndexObject->setAmazonDepartment('');
		$productOptions = array();
		if (is_array($product['productOptions']))
		{
			foreach ($product['productOptions'] as $productOptionGroup => $productOptionItems)
			{
				foreach ($productOptionItems as $productOption)
				{
					$productOptions[] = $productOptionGroup.':'.$productOption['productOption'];
				}
			}
		}
		$productIndexObject->setProductOptions('|'.join('|', $productOptions).'|');
		$productIndexObject->setProductFeatures('');
		if (isset($product['images'][0]))
		{
			$productIndexObject->setOriginalPath($product['images'][0]['originalPath']);
			$productIndexObject->setThumbnailPath($product['images'][0]['thumbnailPath']);
			$productIndexObject->setMediumPath($product['images'][0]['mediumPath']);
			$productIndexObject->setLargePath($product['images'][0]['largePath']);
		} else {
			$productIndexObject->setOriginalPath('');
			$productIndexObject->setThumbnailPath('');
			$productIndexObject->setMediumPath('');
			$productIndexObject->setLargePath('');
		}
		if (isset($product['prices'][0]))
		{
			$productIndexObject->setCostPrice($product['prices'][0]['costPrice']);
			$productIndexObject->setRecommendedRetailPrice($product['prices'][0]['recommendedRetailPrice']);
			$productIndexObject->setListprice($product['prices'][0]['listPrice']);
			$productIndexObject->setDiscount($product['prices'][0]['discount']);
			$productIndexObject->setSavings($product['prices'][0]['savings']);
			$productIndexObject->setMembershipCardPrice($product['prices'][0]['membershipCardPrice']);
			$productIndexObject->setCurrencyCode($product['prices'][0]['currencyCode']);
		} else {
			$productIndexObject->setCostPrice(0.0000);
			$productIndexObject->setRecommendedRetailPrice(0.0000);
			$productIndexObject->setListprice(0.0000);
			$productIndexObject->setDiscount(0.0000);
			$productIndexObject->setSavings(0.0000);
			$productIndexObject->setMembershipCardPrice(0.0000);
			$productIndexObject->setCurrencyCode('GBP');
		}
		$productFeatures = array();
		foreach($product['productFeatures'] as $productFeature)
		{
			if (isset($productFeature[0]))
			{
				if ($productFeature[0]['filter'] > 0)
				{
					$productFeatures[] = $productFeature[0]['productFeatureGroup'].':'.$productFeature[0]['productFeature'];
				}
			}
		}
		if (sizeof($productFeatures) > 0)
		{
			$productIndexObject->setProductFeatures('|'.join('|', $productFeatures).'|');
		} else {
			$productIndexObject->setProductFeatures('');
		}
		$productIndexObject->setUrl($product['url']);
		$productIndexObject->setLocale('en');    		
		$em->persist($productIndexObject);
	    $em->flush();
    	
    	return true;
    }
    
    // Calculate price based on options
    public function getPrice($productId, $selectedOptions)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Setup array to collect price information
    	$price = array();
    	
    	// Get the product
    	$product = $this->getProduct($productId, 'en', 'GBP');
    	$price['productCode'] = $product['productCode'];
    	$price['listPrice'] = $product['prices'][0]['listPrice'];
    	$price['recommendedRetailPrice'] = $product['prices'][0]['recommendedRetailPrice'];
    	$price['savings'] = $product['prices'][0]['savings'];
    	$price['discount'] = $product['prices'][0]['discount'];
			
		// Get selected options
		if ($selectedOptions)
		{
			// Get the entity manager
   			$em = $doctrineService->getEntityManager();
   		
    		$selectedOptionIds = explode('|', $selectedOptions);
    		foreach ($selectedOptionIds as $selectedOptionId)
    		{
    			$productToOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->find($selectedOptionId);
				$priceChange = $productToOptionObject->getPrice();
				$priceType = $productToOptionObject->getPriceType();
				$priceUse = $productToOptionObject->getPriceUse();
				if ($priceType == 'a')
				{
					if ($priceUse == 'i')
					{
						$price['listPrice'] += $priceChange;
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] += $priceChange;
						}
					} elseif (($priceUse == 'd')) {
						$price['listPrice'] -= $priceChange;
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] -= $priceChange;
						}
					}
				}
				if ($priceType == 'p')
				{
					if ($priceUse == 'i')
					{
						$price['listPrice'] = $price['listPrice'] + ($price['listPrice'] * ($priceChange / 100));
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] = $price['recommendedRetailPrice'] + ($price['listPrice'] * ($priceChange / 100));
						}
					} elseif (($priceUse == 'd')) {
						$price['listPrice'] = $price['listPrice'] - ($price['listPrice'] * ($priceChange / 100));
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] = $price['recommendedRetailPrice'] - ($price['listPrice'] * ($priceChange / 100));
						}
					}
				}
				if ($priceType == 'r')
				{
					if ($priceUse == 'i')
					{
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] += ($priceChange - $price['listPrice']);
						}
					} elseif (($priceUse == 'd')) {
						if ($price['recommendedRetailPrice'] > 0)
						{
							$price['recommendedRetailPrice'] -= ($priceChange - $price['listPrice']);
						}
					}
					$price['listPrice'] = $priceChange;
				}
				$price['savings'] = $price['recommendedRetailPrice'] - $price['listPrice'];
				if ($price['recommendedRetailPrice'] > 0)
				{
					$price['discount'] = (1 - ($price['listPrice'] / $price['recommendedRetailPrice'])) * 100;
				} else {
					$price['discount'] = 0;
				}
    		}
		}
		
		// Calculate the membership card price
		$membershipCardDiscountAvailable = true;
		$bestMembershipCardDiscountAvailable = $this->membershipCardDiscount;
		if ($product['membershipCardDiscountAvailable'] > 0)
		{
    		if ($product['maximumMembershipCardDiscount'] > 0)
    		{
    			$bestMembershipCardDiscountAvailable = $product['maximumMembershipCardDiscount'];
    		} else {
	    		foreach ($product['departments'] as $department)
	    		{
	    			if ($department['membershipCardDiscountAvailable'] > 0)
	    			{
	    				if ($department['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
	    				{
	    					$bestMembershipCardDiscountAvailable = $department['maximumMembershipCardDiscount'];
	    				}
	    			} else {
	    				$membershipCardDiscountAvailable = false;
	    				break;
	    			}
	    		}
	    		if ($product['brand']['membershipCardDiscountAvailable'] > 0)
    			{
    				if ($product['brand']['maximumMembershipCardDiscount'] > $bestMembershipCardDiscountAvailable)
    				{
    					$bestMembershipCardDiscountAvailable = $product['brand']['maximumMembershipCardDiscount'];
    				}
    			} else {
    				$membershipCardDiscountAvailable = false;
    			}
    		}
		} else {
			$membershipCardDiscountAvailable = false;
		}
		if ($membershipCardDiscountAvailable)
		{
			if ($price['recommendedRetailPrice'] > 0)
			{
				$price['membershipCardPrice'] = $price['recommendedRetailPrice'] - ($price['recommendedRetailPrice'] * ($bestMembershipCardDiscountAvailable / 100));
			} else {
				$price['membershipCardPrice'] = $price['listPrice'];
			}
		} else {
			$price['membershipCardPrice'] = $price['listPrice'];
		}
		
		return $price;
    }
    
    // Delete a product
    public function deleteProduct($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
		$em = $doctrineService->getEntityManager();
    
    	// Delete any cache
    	apc_delete('kitchen_appliance_centre_product_'.$id);
    	
   		// Get the product
   		$productObject = $em->getRepository('WebIlluminationAdminBundle:Product')->find($id);
    	if (!$productObject)
	    {
	    	error_log('Can\'t find the product!');
        	return false;
    	} else {
    		$em->remove($productObject);
    	}
    	
    	// Get the product escriptions
	    $productDescriptions = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findBy(array('productId' => $id));
	    if (!$productDescriptions)
	    {
	    	error_log('Can\'t find the product description!');
	    	return false;
	    } else {
		    foreach ($productDescriptions as $productDescriptionObject)
		    {
	    		if ($productDescriptionObject)
	    		{
	    			$em->remove($productDescriptionObject);
	    		}
	    	}
    	}
    	
    	// Get the product indexes
   		$productIndexes = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findBy(array('productId' => $id));
	    foreach ($productIndexes as $productIndexObject)
	    {
    		if ($productIndexObject)
    		{
    			$em->remove($productIndexObject);
    		}
    	}
	    
	    // Get the departments
	    $productToDepartments = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('productId' => $id));
	    foreach ($productToDepartments as $productToDepartmentObject)
	    {
	    	if ($productToDepartmentObject)
	    	{
	    		$em->remove($productToDepartmentObject);
	    	}
	    }

    	// Get the prices
    	$productPrices = $em->getRepository('WebIlluminationAdminBundle:ProductPrice')->findBy(array('productId' => $id));
    	foreach ($productPrices as $productPriceObject)
    	{
    		if ($productPriceObject)
    		{
    			$em->remove($productPriceObject);
    		}
    	}	    		    	
	    	
	    // Get the images
	    $images = $em->getRepository('WebIlluminationAdminBundle:Image')->findBy(array('objectId' => $id, 'objectType' => 'product', 'imageType' => 'product'));
    	foreach ($images as $imageObject)
    	{
    		if ($imageObject)
    		{
    			$em->remove($imageObject);
    		}
    	}
    	
    	// Get the guarantees
	    $guarantees = $em->getRepository('WebIlluminationAdminBundle:Guarantee')->findBy(array('objectId' => $id, 'objectType' => 'product'));
    	foreach ($guarantees as $guaranteeObject)
    	{
    		if ($guaranteeObject)
    		{
    			$em->remove($guaranteeObject);
    		}
    	}
	    	
	    // Get linked products
		$productLinks = $em->getRepository('WebIlluminationAdminBundle:ProductLink')->findBy(array('productId' => $id));
		foreach ($productLinks as $productLinkObject)
		{
			if ($productLinkObject)
    		{
    			$em->remove($productLinkObject);
    		}
		}
			
		// Get the options
    	$productToOptions = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->findBy(array('productId' => $id));
		foreach ($productToOptions as $productToOptionObject)
		{
			if ($productToOptionObject)
    		{
    			$em->remove($productToOptionObject);
    		}
		}
		
		// Get the features
    	$productToFeatures = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findBy(array('productId' => $id));
		foreach ($productToFeatures as $productToFeatureObject)
		{
			if ($productToFeatureObject)
    		{
    			$em->remove($productToFeatureObject);
    		}
		}
    	
    	// Get the routings
    	$routings = $em->getRepository('WebIlluminationAdminBundle:Routing')->findBy(array('objectId' => $id, 'objectType' => 'product'));
    	foreach ($routings as $routingObject)
		{
			if ($routingObject)
    		{
    			$em->remove($routingObject);
    		}
		}
		
		// Get the redirects
    	$redirects = $em->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'product'));
    	foreach ($redirects as $redirectObject)
		{
			if ($routingObject)
    		{
    			$em->remove($redirectObject);
    		}
		}
   		
   		// Flush the database
   		$em->flush();
   		
   		return true;
    }
    
    // Get the filter being used
    public function getFilter($departmentId, $filter, $locale = 'en', $currencyCode = 'GBP')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('pi');
    	$qb->from('WebIlluminationAdminBundle:ProductIndex', 'pi');
    	$qb->where($qb->expr()->like('pi.departmentIds', $qb->expr()->literal('%|'.$departmentId.'|%')));
    	$qb->andWhere($qb->expr()->eq('pi.locale', $qb->expr()->literal($locale)));
    	$qb->andWhere($qb->expr()->eq('pi.currencyCode', $qb->expr()->literal($currencyCode)));
    	$query = $qb->getQuery();
    	
    	// Get the products
		$products = $query->getResult();
		
		// Get the brands
		$available = array();
		foreach ($products as $product)
		{
			if (isset($brands[$product->getBrandId()]))
			{
				$brands[$product->getBrandId()]['productCount']++;
			} else {
				$brand = array();
				$brand['id'] = $product->getBrandId();
				$brand['brand'] = $product->getBrand();
				$brand['productCount'] = 1;
				if (in_array($product->getBrandId(), $selectedBrands))
				{
					$brand['selected'] = true;
				} else {
					$brand['selected'] = false;
				}
				$brands[$product->getBrandId()] = $brand;
			}
		}
		
		return $brands;
	
	}
	
	// Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web';
    }
}