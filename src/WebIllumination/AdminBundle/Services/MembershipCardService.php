<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class MembershipCardService {

	protected $container;
	protected $listingSortOrder;
	protected $listingSort;
	protected $listingOrder;
	protected $listingMaxResults;

    public function __construct($container)
    {
        $this->container = $container;
        $this->listingSortOrder = 'membershipNumber:ASC';
        $this->listingSort = 'membershipNumber';
        $this->listingOrder = 'ASC';
        $this->listingMaxResults = 50;
    }
    
    // Initialise the admin voucher code session
    public function initialiseAdminMembershipCardSession()
    {	
    	// Get the settings session
    	$sessionSettings = $this->container->get('session')->get('settings');
    	if (!isset($sessionSettings['admin']['membershipCards']))
    	{
    		// Setup the settings
    		$settings = array();
   			$settings['listingSortOrder'] = $this->listingSortOrder;
   			$settings['listingSort'] = $this->listingSort;
   			$settings['listingOrder'] = $this->listingOrder;
   			$settings['listingMaxResults'] = $this->listingMaxResults;
    	} else {
    		$settings = $sessionSettings['admin']['membershipCards'];
    	}
    	
    	// Get the filters session
    	$sessionFilters = $this->container->get('session')->get('filters');
    	if (!isset($sessionFilters['admin']['membershipCards']))
    	{
    		// Setup the filters
    		$filters = array();
   		} else {
   			$filters = $sessionFilters['admin']['orders'];
   		}
    	
    	// Update the session
    	$sessionSettings['admin']['membershipCards'] = $settings;
    	$sessionFilters['admin']['membershipCards'] = $filters;
    	$this->container->get('session')->set('settings', $sessionSettings);
    	$this->container->get('session')->set('filters', $sessionFilters);

    	return true;
    }    
    
    // Get listing
    public function getListing($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $sort, $order, $page, $maxResults)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	$systemService = $this->container->get('web_illumination_admin.system_service');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	    	
    	// Calculate the first result
    	$firstResult = ($page - 1) * $maxResults;
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('mc');
    	$qb->from('WebIlluminationAdminBundle:MembershipCard', 'mc');
    	if ($membershipNumber)
    	{
    		$qb->andWhere($qb->expr()->like('mc.membershipNumber', $qb->expr()->literal('%'.$membershipNumber.'%')));
    	}
    	if ($active != '')
    	{
    		$options = explode('|', $active);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.active', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.active', $qb->expr()->literal($active)));
    		}
    	}
    	if ($userId != '')
    	{
    		$options = explode('|', $userId);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.userId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.userId', $qb->expr()->literal($userId)));
    		}
    	}
    	if ($validFromDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.validFromDate', $qb->expr()->literal($validFromDateFrom." 00:00:00")));
    	}
    	if ($validFromDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.validFromDate', $qb->expr()->literal($validFromDateTo." 23:59:59")));
    	}
    	if ($expiryDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.expiryDate', $qb->expr()->literal($expiryDateFrom." 00:00:00")));
    	}
    	if ($expiryDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.expiryDate', $qb->expr()->literal($expiryDateTo." 23:59:59")));
    	}
    	$qb->addOrderBy('mc.'.$sort, $order);
    	$qb->setFirstResult($firstResult);
	   	$qb->setMaxResults($maxResults);	   	
    	$query = $qb->getQuery();

		// Get the membership cards
		$membershipCards = $query->getResult();
				
   		return $membershipCards;
    }
    
    // Get listing count
    public function getListingCount($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select($qb->expr()->count("mc.id"));
    	$qb->from('WebIlluminationAdminBundle:MembershipCard', 'mc');
    	if ($membershipNumber)
    	{
    		$qb->andWhere($qb->expr()->like('mc.membershipNumber', $qb->expr()->literal('%'.$membershipNumber.'%')));
    	}
    	if ($active != '')
    	{
    		$options = explode('|', $active);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.active', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.active', $qb->expr()->literal($active)));
    		}
    	}
    	if ($userId != '')
    	{
    		$options = explode('|', $userId);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.userId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.userId', $qb->expr()->literal($userId)));
    		}
    	}
    	if ($validFromDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.validFromDate', $qb->expr()->literal($validFromDateFrom." 00:00:00")));
    	}
    	if ($validFromDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.validFromDate', $qb->expr()->literal($validFromDateTo." 23:59:59")));
    	}
    	if ($expiryDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.expiryDate', $qb->expr()->literal($expiryDateFrom." 00:00:00")));
    	}
    	if ($expiryDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.expiryDate', $qb->expr()->literal($expiryDateTo." 23:59:59")));
    	}
    	$query = $qb->getQuery();
		
		// Get the listing count
		$listingCount = $query->getSingleScalarResult();
		
   		return $listingCount;
    }
    
    // Get listing statistics
    public function getListingStatistics($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('mc');
    	$qb->from('WebIlluminationAdminBundle:MembershipCard', 'mc');
    	if ($membershipNumber)
    	{
    		$qb->andWhere($qb->expr()->like('mc.membershipNumber', $qb->expr()->literal('%'.$membershipNumber.'%')));
    	}
    	if ($active != '')
    	{
    		$options = explode('|', $active);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.active', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.active', $qb->expr()->literal($active)));
    		}
    	}
    	if ($userId != '')
    	{
    		$options = explode('|', $userId);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('mc.userId', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('mc.userId', $qb->expr()->literal($userId)));
    		}
    	}
    	if ($validFromDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.validFromDate', $qb->expr()->literal($validFromDateFrom." 00:00:00")));
    	}
    	if ($validFromDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.validFromDate', $qb->expr()->literal($validFromDateTo." 23:59:59")));
    	}
    	if ($expiryDateFrom)
    	{
    		$qb->andWhere($qb->expr()->gte('mc.expiryDate', $qb->expr()->literal($expiryDateFrom." 00:00:00")));
    	}
    	if ($expiryDateTo)
    	{
    		$qb->andWhere($qb->expr()->lte('mc.expiryDate', $qb->expr()->literal($expiryDateTo." 23:59:59")));
    	}
    	$query = $qb->getQuery();

		// Get the orders
		$membershipCards = $query->getResult();
		
		// Setup the statistics
		$statistics = array();
		$statistics['assigned'] = 0;
		$statistics['unassigned'] = 0;
		foreach ($membershipCards as $membershipCard)
		{
			if ($membershipCard->getUserId() > 0)
			{
				$statistics['assigned']++;
			} else {
				$statistics['unassigned']++;
			}
		}
				
   		return $statistics;
    }
        
    // Get listing pagination
    public function getListingPagination($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $maxResults)
    {    	    	
    	// Get the number of results
    	$listingCount = $this->getListingCount($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo);
    	
    	// Check if there is only one page of results
    	if ($listingCount <= $maxResults)
    	{
    		return 1;
    	}
    	
    	// Calculate the number of pages
    	$pagination = ceil($listingCount / $maxResults);
    	
   		return $pagination;
    }
    
	// Get orders
    public function getOrders()
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
	    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
    	
    	// Get the query builder
    	$qb = $em->createQueryBuilder();
    	
    	// Build the query
    	$qb->select('o');
    	$qb->from('WebIlluminationAdminBundle:Order', 'o');
    	$qb->addOrderBy('o.createdAt', 'DESC');
    	    	
    	$query = $qb->getQuery();
		
		$orders = $query->getResult();

   		return $orders;
   	}  
    
    // Get an order
    public function getOrder($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();

   		// Setup the order
    	$order = array();
   		
   		// Get the order
   		$orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($id);
    	$orderProducts = $em->getRepository('KAC\SiteBundle\Entity\OrderProduct')->findBy(array('orderId' => $id), array('header' => 'ASC'));
    	$orderNotes = $em->getRepository('KAC\SiteBundle\Entity\OrderNote')->findBy(array('orderId' => $id), array('createdAt' => 'DESC'));
    	if (!$orderObject)
	    {
        	return false;
    	} 
    	
    	// Setup the order
		$order['orderNumber'] = $orderObject->getId();
		$order['orderDate'] = $orderObject->getCreatedAt();
		$order['status'] = $orderObject->getStatus();
		$order['orderPrinted'] = $orderObject->getOrderPrinted();
		$order['deliveryNoteNotPrinted'] = $orderObject->getDeliveryNotePrinted();
		$order['actioned'] = $orderObject->getActioned();
		$order['paymentResponse'] = $orderObject->getPaymentResponse();
		$order['paymentType'] = $orderObject->getPaymentType();
		$order['deliveryType'] = $orderObject->getDeliveryType();
		$order['estimatedDeliveryDaysStart'] = $orderObject->getEstimatedDeliveryDaysStart();
		$order['estimatedDeliveryDaysEnd'] = $orderObject->getEstimatedDeliveryDaysEnd();
		$order['items'] = $orderObject->getItems();
		$order['recommendedRetailPrice'] = $orderObject->getRecommendedRetailPrice();
		$order['subTotal'] = $orderObject->getSubTotal();
		$order['savings'] = $orderObject->getSavings();
		$order['deliveryCharge'] = $orderObject->getDeliveryCharge();
		$order['discount'] = $orderObject->getDiscount();
		$order['vat'] = $orderObject->getVat();
		$order['total'] = $orderObject->getTotal();
		$order['voucherCode'] = $orderObject->getVoucherCode();
		$order['giftVoucherCode'] = $orderObject->getGiftVoucherCode();
		$order['membershipCardNumber'] = $orderObject->getMembershipCardNumber();
		$order['possibleDiscount'] = $orderObject->getPossibleDiscount();
		$order['firstName'] = $orderObject->getFirstName();
		$order['lastName'] = $orderObject->getLastName();
		$order['emailAddress'] = $orderObject->getEmailAddress();
		$order['telephoneDaytime'] = $orderObject->getTelephoneDaytime();
		$order['telephoneEvening'] = $orderObject->getTelephoneEvening();
		$order['mobile'] = $orderObject->getMobile();
		$order['billingFirstName'] = $orderObject->getBillingFirstName();
		$order['billingLastName'] = $orderObject->getBillingLastName();
		$order['billingOrganisationName'] = $orderObject->getBillingOrganisationName();
		$order['billingAddressLine1'] = $orderObject->getBillingAddressLine1();
		$order['billingAddressLine2'] = $orderObject->getBillingAddressLine2();
		$order['billingTownCity'] = $orderObject->getBillingTownCity();
		$order['billingCountyState'] = $orderObject->getBillingCountyState();
		$order['billingPostZipCode'] = $orderObject->getBillingPostZipCode();
		$order['billingCountryCode'] = $orderObject->getBillingCountryCode();
		$order['deliveryFirstName'] = $orderObject->getDeliveryFirstName();
		$order['deliveryLastName'] = $orderObject->getDeliveryLastName();
		$order['deliveryOrganisationName'] = $orderObject->getDeliveryOrganisationName();
		$order['deliveryAddressLine1'] = $orderObject->getDeliveryAddressLine1();
		$order['deliveryAddressLine2'] = $orderObject->getDeliveryAddressLine2();
		$order['deliveryTownCity'] = $orderObject->getDeliveryTownCity();
		$order['deliveryCountyState'] = $orderObject->getDeliveryCountyState();
		$order['deliveryPostZipCode'] = $orderObject->getDeliveryPostZipCode();
		$order['deliveryCountryCode'] = $orderObject->getDeliveryCountryCode();
		$order['fraudCheckCustomerOrdered'] = $orderObject->getFraudCheckCustomerOrdered();
		$order['fraudCheckAddressMatch'] = $orderObject->getFraudCheckAddressMatch();
		$order['fraudCheckNameUsedOnDifferentOrder'] = $orderObject->getFraudCheckNameUsedOnDifferentOrder();
		$order['fraudCheckPostZipCodeUsedOnDifferentOrder'] = $orderObject->getFraudCheckPostZipCodeUsedOnDifferentOrder();
		$order['fraudCheckTelephoneUsedOnDifferentOrder'] = $orderObject->getFraudCheckTelephoneUsedOnDifferentOrder();
    	
    	// Setup the order products
    	$products = array();
		foreach ($orderProducts as $orderProductObject)
		{
			$newProduct = array();
	    	$newProduct['basketItemId'] = $orderProductObject->getBasketItemId();
	    	$newProduct['productId'] = $orderProductObject->getProductId();
	    	$newProduct['product'] = $orderProductObject->getProduct();
	    	$newProduct['url'] = $orderProductObject->getUrl();
	    	$newProduct['header'] = $orderProductObject->getHeader();
	    	$newProduct['productCode'] = $orderProductObject->getProductCode();
	    	$newProduct['brand'] = $orderProductObject->getBrand();
	    	$newProduct['shortDescription'] = $orderProductObject->getShortDescription();
	    	$newProduct['quantity'] = $orderProductObject->getQuantity();
	    	$newProduct['unitCost'] = $orderProductObject->getUnitCost();
	    	$newProduct['recommendedRetailPrice'] = $orderProductObject->getRecommendedRetailPrice();
	    	$newProduct['discount'] = $orderProductObject->getDiscount();
	    	$newProduct['savings'] = $orderProductObject->getSavings();
	    	$newProduct['subTotal'] = $orderProductObject->getVat();
	    	$newProduct['subTotal'] = $orderProductObject->getSubTotal();
	    	$newProduct['selectedOptions'] = $orderProductObject->getSelectedOptions();
	    	$newProduct['selectedOptionLabels'] = explode('|', $orderProductObject->getSelectedOptionLabels());
	    	$products[] = $newProduct;
	    }
	    $order['products'] = $products;
	    
	    // Setup the order notes
    	$customerNotes = array();
    	$staffNotes = array();
		foreach ($orderNotes as $orderNoteObject)
		{
			$newNote = array();
	    	$newNote['id'] = $orderNoteObject->getId();
	    	$newNote['orderId'] = $orderNoteObject->getOrderId();
	    	$newNote['creator'] = $orderNoteObject->getCreator();
	    	$newNote['noteType'] = $orderNoteObject->getNoteType();
	    	$newNote['notified'] = $orderNoteObject->getNotified();
	    	$newNote['note'] = $orderNoteObject->getNote();
	    	$newNote['createdAt'] = $orderNoteObject->getCreatedAt();
	    	if ($newNote['noteType'] == 'customer')
	    	{
	    		$customerNotes[] = $newNote;
	    	} elseif ($newNote['noteType'] == 'staff') {
	    		$staffNotes[] = $newNote;
	    	}
	    }
	    $order['customerNotes'] = $customerNotes;
	    $order['staffNotes'] = $staffNotes;
    		    		    		    	   		
   		return $order;
    }
    
    // Delete an order
    public function deleteOrder($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getManager();
   		
   		// Get the order details
   		$orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($id);
    	$orderProducts = $em->getRepository('KAC\SiteBundle\Entity\OrderProduct')->findBy(array('orderId' => $id), array('header' => 'ASC'));
    	$orderNotes = $em->getRepository('KAC\SiteBundle\Entity\OrderNote')->findBy(array('orderId' => $id), array('createdAt' => 'DESC'));
    	if (!$orderObject)
	    {
        	return false;
    	} 
    	
    	// Delete the notes
    	foreach ($orderNotes as $orderNoteObject)
    	{
    		$em->remove($orderNoteObject);
			$em->flush();
    	}
    	
    	// Delete the products
    	foreach ($orderProducts as $orderProductObject)
    	{
    		$em->remove($orderProductObject);
			$em->flush();
    	}
    	
    	// Delete the order
    	$em->remove($orderObject);
		$em->flush();
    	
    		    		    		    	   		
   		return true;
    }
    
    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

	// Get the upload directory
    public function getUploadDir()
    {
        return 'uploads/documents/order';
    }
}