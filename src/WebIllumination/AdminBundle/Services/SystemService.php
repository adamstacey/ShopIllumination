<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class SystemService {

	protected $container;
	protected $sortOrder;
	protected $sort;
	protected $order;
	protected $maxResults;

    public function __construct($container)
    {
        $this->container = $container;
        $this->sortOrder = 'listPrice:ASC';
        $this->sort = 'listPrice';
        $this->order = 'ASC';
        $this->maxResults = 20;
    }
    
    // Initialise the settings session
    public function initialiseSettingsSession()
    {
    	// Get the services
	    $orderService = $this->container->get('web_illumination_admin.order_service');
	    $brandService = $this->container->get('web_illumination_admin.brand_service');
	    $departmentService = $this->container->get('web_illumination_admin.department_service');
	    $productService = $this->container->get('web_illumination_admin.product_service');
	    $voucherCodeService = $this->container->get('web_illumination_admin.voucher_code_service');
	    $membershipCardService = $this->container->get('web_illumination_admin.membership_card_service');
	    
    	// Check if there is a settings session
    	$settings = $this->container->get('session')->get('settings');
    	
    	// Check if there is a filters session
    	$filters = $this->container->get('session')->get('filters');
    	
    	// If there is no settings setup the session
    	if (!is_array($settings))
    	{
    		// Setup the settings session
    		$settings = array();
    		
    		// Setup the settings for the admin area
    		$settings['admin'] = array();
    		
    		// Setup the settings for the shop area
    		$settings['shop'] = array();
    	}
    	
    	// If there is no filters setup the session
    	if (!is_array($filters))
    	{
    		// Setup the filters session
    		$filters = array();
    		
    		// Setup the filters for the admin area
    		$filters['admin'] = array();
    		
    		// Setup the filters for the shop area
    		$filters['shop'] = array();
    	}
    	
    	// Save to the session
    	$this->container->get('session')->set('settings', $settings);
    	$this->container->get('session')->set('filters', $filters);
    	
    	// Initialise the admin order session
    	$orderService->initialiseAdminOrderSession();
    	$brandService->initialiseAdminBrandSession();
    	$departmentService->initialiseAdminDepartmentSession();
    	$productService->initialiseAdminProductSession();
    	$voucherCodeService->initialiseAdminVoucherCodeSession();
    	$membershipCardService->initialiseAdminMembershipCardSession();
    	
    	return true;
    }
    
    // Initialise the session
    public function initialiseSession()
    {
    	// Get the services
	    $basketService = $this->container->get('web_illumination_admin.basket_service');
	    $orderService = $this->container->get('web_illumination_admin.order_service');
	    
	    // Initialise the session
	    $basketService->initialiseBasketSession();
	    $orderService->initialiseOrderSession();
	    $this->initialiseListingsSession();
	    
	    return true;
    }
    
    // Reset the session
    public function resetSession()
    {
    	// Get the services
	    $basketService = $this->container->get('web_illumination_admin.basket_service');
	    $orderService = $this->container->get('web_illumination_admin.order_service');
	    
	    // Reset the session
	    $basketService->resetBasketSession();
	    $orderService->resetOrderSession();
	    
	    return true;
    }
    
    // Initialise the listings session
    public function initialiseListingsSession()
    {
    	// Check and update the product listing settings
   		$productListingSettings = $this->container->get('session')->get('productListingSettings');
   		if (!is_array($productListingSettings))
   		{
   			$productListingSettings = array();
   			$productListingSettings['sortOrder'] = $this->sortOrder;
   			$productListingSettings['sort'] = $this->sort;
   			$productListingSettings['order'] = $this->order;
   			$productListingSettings['maxResults'] = $this->maxResults;
   		} else {
   			if (!$productListingSettings['sortOrder'])
   			{
   				$productListingSettings['sortOrder'] = $this->sortOrder;
   			}
   			if (!$productListingSettings['sort'])
   			{
   				$productListingSettings['sort'] = $this->sort;
   			}
   			if (!$productListingSettings['order'])
   			{
   				$productListingSettings['order'] = $this->order;
   			}
   			if (!$productListingSettings['maxResults'])
   			{
   				$productListingSettings['maxResults'] = $this->maxResults;
   			}
   		}
   		$this->container->get('session')->set('productListingSettings', $productListingSettings);
   		
    	// Check and update the department history
    	$departmentHistory = $this->container->get('session')->get('departmentHistory');  	
   		if (!is_array($departmentHistory))
   		{
   			$departmentHistory = array();
   			$this->container->get('session')->set('departmentHistory', $departmentHistory);
   			$this->addUrlToDepartmentHistory('index');
   		}
   		
   		// Check and update the department listings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
   		if (!is_array($departmentListings))
   		{
   			$departmentListings = array();
   			$this->container->get('session')->set('departmentListings', $departmentListings);
   			$this->checkDepartmentListing('index');
   		}
   		
   		return true;
    }
    
    // Add a department to history
    public function addUrlToDepartmentHistory($url = '')
    {
    	// Make sure a URL has been supplied
    	if ($url == '')
    	{
    		return false;
    	}
   		
   		// Get the department history
    	$departmentHistory = $this->container->get('session')->get('departmentHistory');
    	
    	// Add the department
    	if (sizeof($departmentHistory) < 1)
    	{
	    	$departmentHistory[] = $url;
    	} else {	
	    	array_unshift($departmentHistory, $url);
    	}
    	
    	// Update the session
    	$this->container->get('session')->set('departmentHistory', $departmentHistory);
  		
  		return true;
    }
    
    // Get last department url
    public function getLastDepartmentUrl()
    {
    	// Get the last url
    	$lastUrl = 'index';
    	$departmentHistory = $this->container->get('session')->get('departmentHistory');
    	if (isset($departmentHistory[0]))
    	{
	    	$lastUrl = $departmentHistory[0];
    	}
    	if ($lastUrl == 'index')
    	{
	    	return false;
    	}
    	
	    // Get the product listing settings
    	$productListingSettings = $this->container->get('session')->get('productListingSettings');
    	
    	// Get the department listing settings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
    	if (isset($departmentListings[$lastUrl]))
    	{
    		$departmentListing = $departmentListings[$lastUrl];
    	} else {
	    	return false;
    	}
    	
    	// Get the last department url
    	$url = ($departmentListing['url']?$departmentListing['url']:$lastUrl);
    	$results = $productListingSettings['maxResults'];
    	$page = ($departmentListing['page']?$departmentListing['page']:1);
    	$sort = $productListingSettings['sort'];
    	$order = $productListingSettings['order'];
    	$group = ($departmentListing['group']?$departmentListing['group']:0);
    	$brand = ($departmentListing['brand']?$departmentListing['brand']:0);
    	$brandId = ($departmentListing['brandId']?$departmentListing['brandId']:0);
    	$priceFrom = ($departmentListing['priceFrom']?$departmentListing['priceFrom']:0);
    	$priceTo = ($departmentListing['priceTo']?$departmentListing['priceTo']:0);
    	$brands = ($departmentListing['brands']?$departmentListing['brands']:0);
    	$options = ($departmentListing['options']?$departmentListing['options']:0);
    	$features = ($departmentListing['features']?$departmentListing['features']:0);
    	return $this->container->get('router')->generate('department_with_filters', array('url' => $url, 'results' => $results, 'page' => $page, 'sort' => $sort, 'order' => $order, 'group' => $group, 'brand' => $brand, 'brandId' => $brandId, 'priceFrom' => $priceFrom, 'priceTo' => $priceTo, 'brands' => $brands, 'options' => $options, 'features' => $features));
    }
    
    // Get department url
    public function getDepartmentUrl($url, $currentUrl = false, $departmentBrand = false, $departmentGroup = false)
    {   
    	// Get the department listing settings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
    	if ($currentUrl)
    	{
    		$listingUrl = $currentUrl;
    	} else {
    		$listingUrl = $url;
    	}
    	if ($departmentGroup)
    	{
    		$listingUrl = $departmentGroup.'/'.$listingUrl;
    	} elseif ($departmentBrand) {
    		$listingUrl = $departmentBrand.'/'.$listingUrl;
    	}
    	if (isset($departmentListings[$listingUrl]))
    	{
    		$departmentListing = $departmentListings[$listingUrl];
    	} else {
	    	$this->checkDepartmentListing($listingUrl);
	    	$departmentListings = $this->container->get('session')->get('departmentListings');
	    	$departmentListing = $departmentListings[$listingUrl];
    	}
    	
    	$group = ($departmentListing['group']?$departmentListing['group']:0);
    	$brand = ($departmentListing['brand']?$departmentListing['brand']:0);
    	$brandId = ($departmentListing['brandId']?$departmentListing['brandId']:0);
    	$priceFrom = ($departmentListing['priceFrom']?$departmentListing['priceFrom']:0);
    	$priceTo = ($departmentListing['priceTo']?$departmentListing['priceTo']:0);
    	$brands = ($departmentListing['brands']?$departmentListing['brands']:0);
    	$options = ($departmentListing['options']?$departmentListing['options']:0);
    	$features = ($departmentListing['features']?$departmentListing['features']:0);
    	
    	// Get the product listing settings
    	$productListingSettings = $this->container->get('session')->get('productListingSettings');
    	$results = $productListingSettings['maxResults'];
	    $page = ($departmentListing['page']?$departmentListing['page']:1);
	    $sort = $productListingSettings['sort'];
	    $order = $productListingSettings['order'];
    	
    	// Get the url
    	if ($currentUrl)
    	{
	    	if ($departmentGroup)
	    	{
		    	if ($results == 99999999)
    			{
	    			$departmentUrl = $this->container->get('router')->generate('department_with_group_view_all', array('url' => $url, 'group' => $departmentGroup));
    			} else {
	    			$departmentUrl = $this->container->get('router')->generate('department_with_group', array('url' => $url, 'group' => $departmentGroup));
    			}
	    	} elseif ($departmentBrand) {
		    	if ($results == 99999999)
    			{
	    			$departmentUrl = $this->container->get('router')->generate('department_with_brand_view_all', array('url' => $url, 'brand' => $brand));
    			} else {
	    			$departmentUrl = $this->container->get('router')->generate('department_with_brand', array('url' => $url, 'brand' => $brand));
    			}
	    	} else {
				if ($results == 99999999)
				{
	    			$departmentUrl = $this->container->get('router')->generate('department_view_all', array('url' => $url));
				} else {
	    			$departmentUrl = $this->container->get('router')->generate('page_request', array('url' => $url));
				}		    	
	    	}
	    } else {
	    	if ($group || $brand || $brandId || $priceFrom || $priceTo || $brands || $options || $features)
	    	{ 	
	    		if ($group)
	    		{
		    		if ($results == 99999999)
	    			{
		    			$departmentUrl = $this->container->get('router')->generate('department_with_group_view_all', array('url' => $url, 'group' => $group));
	    			} else {
		    			$departmentUrl = $this->container->get('router')->generate('department_with_group', array('url' => $url, 'group' => $group));
	    			}
	    		} elseif ($brand && $brandId) {
		    		if ($results == 99999999)
	    			{
		    			$departmentUrl = $this->container->get('router')->generate('department_with_brand_view_all', array('url' => $url, 'brand' => $brand));
	    			} else {
		    			$departmentUrl = $this->container->get('router')->generate('department_with_brand', array('url' => $url, 'brand' => $brand));
	    			}
	    		} else {
		    		$departmentUrl = $this->container->get('router')->generate('department_with_filters', array('url' => $url, 'results' => $results, 'page' => $page, 'sort' => $sort, 'order' => $order, 'group' => $group, 'brand' => $brand, 'brandId' => $brandId, 'priceFrom' => $priceFrom, 'priceTo' => $priceTo, 'brands' => $brands, 'options' => $options, 'features' => $features));
	    		}
		    } else {
			    if ($results == 99999999)
				{
	    			$departmentUrl = $this->container->get('router')->generate('department_view_all', array('url' => $url));
				} else {
	    			$departmentUrl = $this->container->get('router')->generate('page_request', array('url' => $url));
				}
		    }
		}
		
    	return $departmentUrl;
    }
    
    // Check for a department listing
    public function checkDepartmentListing($url = '')
    {
    	// Make sure a URL has been supplied
    	if ($url == '')
    	{
    		return false;
    	}
   		// Get the department listings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
    	
    	// Check the department listing
    	if (!isset($departmentListings[$url]))
    	{
    		$this->updateDepartmentListing($url);
    	}
  		
  		return true;
    }
    
    // Update department listings
    public function updateDepartmentListing($url = '', $page = 1, $group = '', $brand = '', $brandId = 0, $priceFrom = 0, $priceTo = 0, $brands = '', $options = '', $features = '')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
    	// Make sure a URL has been supplied
    	if ($url == '')
    	{
    		return false;
    	}
   		// Get the department listings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
    	
    	// Remap the features to ids, so they can be used as a URL
    	$remappedFeatures = array();
    	$features = explode(',', $features);
    	foreach ($features as $feature)
    	{
    		if ($feature)
    		{
		    	$featureObject = explode(':', $feature);
		    	if (isset($featureObject[0]) && isset($featureObject[1]))
		    	{
		    		$productFeatureGroupId = 0;
		    		$productFeatureId = 0;
			    	$productFeatureGroupObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ProductFeatureGroup')->findOneBy(array('productFeatureGroup' => $featureObject[0], 'locale' => 'en'));
			    	if ($productFeatureGroupObject)
			    	{
				    	$productFeatureGroupId = $productFeatureGroupObject->getId();
			    	}
			    	$productFeatureObject = $em->getRepository('WebIllumination\SiteBundle\Entity\ProductFeature')->findOneBy(array('productFeature' => $featureObject[1], 'locale' => 'en'));
			    	if ($productFeatureObject)
			    	{
				    	$productFeatureId = $productFeatureObject->getId();
			    	}
			    	if (($productFeatureGroupId > 0) && ($productFeatureId > 0))
			    	{
				    	$remappedFeatures[] = $productFeatureGroupId.'-'.$productFeatureId;
			    	}
		    	}
		    }
    	}
    	$remappedFeatures = implode('_', $remappedFeatures);
    	
    	// Update the department listing
   		$departmentListing = array();
   		if ($brand)
   		{
	   		$departmentListing['url'] = str_replace($brand.'/', '', $url);
   		} else {
			$departmentListing['url'] = $url;
		}
		$departmentListing['page'] = $page;
		$departmentListing['group'] = $group;
		$departmentListing['brand'] = $brand;
		$departmentListing['brandId'] = $brandId;
		$departmentListing['priceFrom'] = $priceFrom;
		$departmentListing['priceTo'] = $priceTo;
		$departmentListing['brands'] = $brands;
		$departmentListing['options'] = $options;
		$departmentListing['features'] = $remappedFeatures;
		$departmentListings[$url] = $departmentListing;
    	    	
    	// Update the session
    	$this->container->get('session')->set('departmentListings', $departmentListings);
  		
  		return true;
    }
    
    // Reset department listings pages
    public function resetDepartmentListingsPages()
    {
   		// Get the department listings
    	$departmentListings = $this->container->get('session')->get('departmentListings');
    	
    	// Reset the pages
    	if ($departmentListings)
    	{
	    	foreach ($departmentListings as $url => $departmentListing)
	    	{
		    	$departmentListings[$url]['page'] = 1;
	    	}
		}
		    	    	
    	// Update the session
    	$this->container->get('session')->set('departmentListings', $departmentListings);
  		
  		return true;
    }
    
    // Update department listings
    public function updateProductListingSettings($sortOrder, $sort, $order, $maxResults)
    {
   		// Get the product listing settings
    	$productListingSettings = $this->container->get('session')->get('productListingSettings');
    	
    	// Update the product listing settings
		$productListingSettings['sortOrder'] = $sortOrder;
		$productListingSettings['sort'] = $sort;
		$productListingSettings['order'] = $order;
		
		// Reset any saved pages as they may be out
		if ($productListingSettings['maxResults'] != $maxResults)
		{
			$this->resetDepartmentListingsPages();
		}
		$productListingSettings['maxResults'] = $maxResults;
    	    	
    	// Update the session
    	$this->container->get('session')->set('productListingSettings', $productListingSettings);
  		
  		return true;
    }
    
    // Function to pipe through a shell command
    public function pipeExec($cmd, $input='')
    {
        $pipes = array();
        $proc = proc_open($cmd, array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w')), $pipes, null, null, array('binary_pipes' => true));
        fwrite($pipes[0], $input);
        fclose($pipes[0]);
        $read_output = $read_error = false;
        $buffer_len = $prev_buffer_len = 0;
        $ms = 10;
        $stdout = '';
        $read_output = true;
        $stderr = '';
        $read_error = true;
        stream_set_blocking($pipes[1], 0);
        stream_set_blocking($pipes[2], 0);
        while ($read_error != false or $read_output != false)
        {
            if ($read_output != false)
            {
                if(feof($pipes[1]))
                {
                    fclose($pipes[1]);
                    $read_output = false;
                }
                else
                {
                    $str = fgets($pipes[1], 1024);
                    $len = strlen($str);
                    if ($len)
                    {
                        $stdout .= $str;
                        $buffer_len += $len;
                    }
                }
            }
            if ($read_error != false)
            {
                if(feof($pipes[2]))
                {
                    fclose($pipes[2]);
                    $read_error = false;
                }
                else
                {
                    $str = fgets($pipes[2], 1024);
                    $len = strlen($str);
                    if ($len)
                    {
                        $stderr .= $str;
                        $buffer_len += $len;
                    }
                }
            }
            if ($buffer_len > $prev_buffer_len)
            {
                $prev_buffer_len = $buffer_len;
                $ms = 10;
            }
            else
            {
                usleep($ms * 1000);
                if ($ms < 160)
                {
                    $ms = $ms * 2;
                }
            }
        }
        $rtn = proc_close($proc);
        return array(
        	'stdout'=>$stdout,
            'stderr'=>$stderr,
            'return'=>$rtn
        );
	}
}