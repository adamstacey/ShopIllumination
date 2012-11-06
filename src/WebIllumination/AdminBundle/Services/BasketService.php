<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class BasketService {

	protected $container;
	protected $deliveryCutOffTime;

    public function __construct($container)
    {
        $this->container = $container;
        $this->deliveryCutOffTime = 12;
    }
    
    // Initialise the basket session
    public function initialiseBasketSession()
    {
    	// Check if there is a basket session
    	$basket = $this->container->get('session')->get('basket');
    	
    	// If there is no basket setup the session
    	if (!is_array($basket))
    	{
    		// Setup the basket
    		$basket = array();
    		
    		// Setup the last product search
    		$basket['productSearch'] = false;
    		
    		// Setup the products
    		$basket['products'] = array();
    		
    		// Setup the delivery
    		$basket['delivery'] = array();
    		$basket['delivery']['deliveryOptions'] = array();
    		$basket['delivery']['countryCode'] = 'GB';
    		$basket['delivery']['postZipCode'] = '';
    		$basket['delivery']['weighting'] = 0;
    		$basket['delivery']['weight'] = 0;
    		$basket['delivery']['band'] = 0;
    		$basket['delivery']['zone'] = 0;
    		$basket['delivery']['service'] = '';
    		$basket['delivery']['price'] = 0;
    		$basket['delivery']['notes'] = '';
    		$basket['delivery']['requestedDeliveryDate'] = '';
    		
    		// Setup the totals
    		$basket['totals'] = array();
    		$basket['totals']['items'] = 0;
    		$basket['totals']['subTotal'] = 0;
    		$basket['totals']['deliveryCharge'] = 0;
    		$basket['totals']['discount'] = 0;
    		$basket['totals']['vat'] = 0;
    		$basket['totals']['total'] = 0;	
    		
    		// Setup the donations
    		$basket['discounts'] = array();
    		$basket['membershipCardNumber'] = 0;
    		$basket['possibleDiscount'] = 0;
    		
    		// Setup the donations
    		$basket['donations'] = array();
    		
    		// Setup the estimated delivery range
    		$basket['estimatedDeliveryDays'] = array();
    		
    	} else {
    		// Check that all items are setup
    		if (!isset($basket['productSearch']))
			{
				$basket['productSearch'] = false;
			}
    		if (!is_array($basket['products']))
    		{
    			$basket['products'] = array();
    		}
    		if (!is_array($basket['delivery']))
    		{
    			$basket['delivery'] = array();
    			$basket['delivery']['deliveryOptions'] = array();
    			$basket['delivery']['countryCode'] = 'GB';
    			$basket['delivery']['postZipCode'] = '';
    			$basket['delivery']['weighting'] = 0;
	    		$basket['delivery']['weight'] = 0;
	    		$basket['delivery']['band'] = 0;
	    		$basket['delivery']['zone'] = 0;
	    		$basket['delivery']['service'] = '';
	    		$basket['delivery']['price'] = 0;
	    		$basket['delivery']['notes'] = '';
    			$basket['delivery']['requestedDeliveryDate'] = '';
    		} else {
				if (!is_array($basket['delivery']['deliveryOptions']))
				{
					$basket['delivery']['deliveryOptions'] = array();
				}
				if (!isset($basket['delivery']['countryCode']))
				{
					$basket['delivery']['countryCode'] = 'GB';
				}
				if (!isset($basket['delivery']['postZipCode']))
				{
					$basket['delivery']['postZipCode'] = '';
				}
				if (!isset($basket['delivery']['weighting']))
				{
					$basket['delivery']['weighting'] = 0;
				}
				if (!isset($basket['delivery']['weight']))
				{
					$basket['delivery']['weight'] = 0;
				}
				if (!isset($basket['delivery']['band']))
				{
					$basket['delivery']['band'] = 0;
				}
				if (!isset($basket['delivery']['zone']))
				{
					$basket['delivery']['zone'] = 0;
				}
				if (!isset($basket['delivery']['service']))
				{
					$basket['delivery']['service'] = '';
				}
				if (!isset($basket['delivery']['price']))
				{
					$basket['delivery']['price'] = 0;
				}
				if (!isset($basket['delivery']['notes']))
				{
					$basket['delivery']['notes'] = '';
				}
				if (!isset($basket['delivery']['requestedDeliveryDate']))
				{
					$basket['delivery']['requestedDeliveryDate'] = '';
				}
			}
    		if (!is_array($basket['totals']))
    		{
    			$basket['totals'] = array();
    			$basket['totals']['items'] = 0;
	    		$basket['totals']['subTotal'] = 0;
	    		$basket['totals']['deliveryCharge'] = 0;
	    		$basket['totals']['discount'] = 0;
	    		$basket['totals']['total'] = 0;
    		} else {
				if (!isset($basket['totals']['items']))
				{
					$basket['totals']['items'] = 0;
				}
				if (!isset($basket['totals']['recommendedRetailPrice']))
				{
					$basket['totals']['recommendedRetailPrice'] = 0;
				}
				if (!isset($basket['totals']['subTotal']))
				{
					$basket['totals']['subTotal'] = 0;
				}
				if (!isset($basket['totals']['savings']))
				{
					$basket['totals']['savings'] = 0;
				}
				if (!isset($basket['totals']['deliveryCharge']))
				{
					$basket['totals']['deliveryCharge'] = 0;
				}
				if (!isset($basket['totals']['discount']))
				{
					$basket['totals']['discount'] = 0;
				}
				if (!isset($basket['totals']['vat']))
				{
					$basket['totals']['vat'] = 0;
				}
				if (!isset($basket['totals']['total']))
				{
					$basket['totals']['total'] = 0;
				}			
    		}
    		if (!is_array($basket['discounts']))
    		{
    			$basket['discounts'] = array();
    		}
    		if (!isset($basket['membershipCardNumber']))
    		{
	    		$basket['membershipCardNumber'] = 0;
    		}
    		if (!isset($basket['possibleDiscount']))
    		{
	    		$basket['possibleDiscount'] = 0;
    		}
    		if (!is_array($basket['donations']))
    		{
    			$basket['donations'] = array();
    		}
    		if (!is_array($basket['estimatedDeliveryDays']))
    		{
    			$basket['estimatedDeliveryDays'] = array();
    		} else {
    			if (!isset($basket['estimatedDeliveryDays']['start']) || !isset($basket['estimatedDeliveryDays']['end']) || !isset($basket['estimatedDeliveryDays']['requestedDeliveryDateStart']))
    			{
    				$basket['estimatedDeliveryDays'] = array();
    			}
    		}
    	}
    	
    	// Update the session
    	$this->container->get('session')->set('basket', $basket);
    	
    	return true;
    }
    
    // Reset the basket session
    public function resetBasketSession()
    {
    	// Clear basket session
    	$this->container->get('session')->set('basket', false);
    	
    	// Initialise the basket session
    	$this->initialiseBasketSession();
    	    	
    	return true;
    }
    
    // Get delivery details
    public function getDeliveryDetails($additionalDeliveryBand = 0)
    {
    	// Get the basket
    	$basket = $this->container->get('session')->get('basket');
    	
    	// Calulate the weightings and overall band
    	$delivery = array();
    	$delivery['deliveryOptions'] = array();
    	$delivery['countryCode'] = $basket['delivery']['countryCode'];
    	$delivery['postZipCode'] = $basket['delivery']['postZipCode'];
    	$delivery['weighting'] = 0;
    	$delivery['weight'] = 0;
    	$delivery['band'] = 0;
    	$delivery['zone'] = 0;
    	$delivery['service'] = $basket['delivery']['service'];
    	$delivery['price'] = 0;
    	$delivery['notes'] = $basket['delivery']['notes'];
    	$delivery['requestedDeliveryDate'] = $basket['delivery']['requestedDeliveryDate'];
    	
		$weighting = 0;
		$weight = 0;
		$band = 0;
		if (sizeof($basket['products']) > 0)
    	{
			foreach ($basket['products'] as $product)
			{
				$weight += $product['quantity'] * $product['weight'];
				switch ($product['deliveryBand'] * 1)
				{
					case 1:
						$weighting += (1 * $product['quantity']);
						break;
					case 2:
						$weighting += (5 * $product['quantity']);
						break;
					case 3:
						$weighting += (25 * $product['quantity']);
						break;
					case 4:
						$weighting += (75 * $product['quantity']);
						break;
					case 5:
						$weighting += (75000 * $product['quantity']);
						break;
					case 6:
						$weighting += (75000000 * $product['quantity']);
						break;
				}
			}
		}
		if ($additionalDeliveryBand > 0)
		{
			switch ($additionalDeliveryBand * 1)
			{
				case 1:
					$weighting += 1;
					break;
				case 2:
					$weighting += 5;
					break;
				case 3:
					$weighting += 25;
					break;
				case 4:
					$weighting += 75;
					break;
				case 5:
					$weighting += 75000;
					break;
				case 6:
					$weighting += 75000000;
					break;
			}
		}
		if ($weighting < 5)
		{
			$band = 1;			
		} elseif (($weighting >= 5) && ($weighting < 25)) {
			$band = 2;
		} elseif (($weighting >= 25) && ($weighting < 75)) {
			$band = 3;
		} elseif (($weighting >= 75) && ($weighting < 75000)) {
			$band = 4;
		} elseif (($weighting >= 75000) && ($weighting < 75000000)) {
			$band = 5;
		} elseif ($weighting >= 75000000) {
			$band = 6;
		}
		$delivery['weighting'] = $weighting;
		$delivery['weight'] = $weight;
		$delivery['band'] = $band;
		
		// Calculate the delivery zone
		$olympicZone = false;
		$postCode = strtoupper(str_replace(' ', '', $basket['delivery']['postZipCode']));
		if (!$postCode)
		{
			$postCode = 'NG162UZ';
		}
		switch ($basket['delivery']['countryCode'])
		{
			case 'GB':
				// Calculate the olympic delivery surcharge
				if (preg_match("/^(HA|HP|NW|SW|UB|W0|W1|W2|W3|W4|W5|W6|W7|W8|W9|WC|TW|EN|E0|E1|E2|E3|E4|E5|E6|E7|E8|E9|N0|N1|N2|N3|N4|N5|N6|N7|N8|N9|IG|RM|EC|SE|DT|EX|RM|SS|SL)[A-Z0-9]*/", $postCode))
				{
					$olympicZone = true;
				}
				
				// Calculate the zone
				if (preg_match("/^(AL|B0|B1|B2|B3|B4|B5|B6|B7|B8|B9|BA|BB|BD|BH|BL|BN|BR|BS|CB|CF|CH|CM|CO|C0|CR|CV|CW|DA|DE|DH|DL|DN|DT|DY|E0|E1|E2|E3|E4|E5|E6|E7|E8|E9|EC|EN|FY|GL|GU|HA|HD|HG|HP|HR|HU|HX|IG|IP|KT|L0|L1|L2|L3|L4|L5|L6|L7|L8|L9|LD|LE|LN|LS|LU|M0|M1|M2|M3|M4|M5|M6|M7|M8|M9|ME|MK|N0|N1|N2|N3|N4|N5|N6|N7|N8|N9|NG|NN|NP|NR|NW|OL|0L|OX|0X|PE|PR|RG|RH|RM|S0|S1|S2|S3|S4|S5|S6|S7|S8|S9|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TF|TN|TS|TW|UB|W0|W1|W2|W3|W4|W5|W6|W7|W8|W9|WA|WC|WD|WF|WN|WR|WS|WV|YO|Y0)[A-Z0-9]*/", $postCode))
				{
					$zone = 1;
				} elseif (preg_match("/^(CA|CT|DG|EH|EX|G0|G1|G2|G3|G4|G5|G6|G7|G8|G9|LA|LL|ML|NE|PL|SA|TA|TD|TQ|TR)[A-Z0-9]*/", $postCode)) {
					$zone = 2;
				} elseif (preg_match("/^(AB|BT|DD|FK|KY)[A-Z0-9]*/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(HS|ZE)[A-Z0-9]*/", $postCode)) {
					$zone = 5;
				} elseif (preg_match("/^(GY1|GY2|GY3|GY4|GY5|GY6|GY7|GY8|IM|JE)[A-Z0-9]*/", $postCode)) {
					$zone = 6;
				} elseif (preg_match("/^(PO|P0)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 1;
				} elseif (preg_match("/^(PO|P0)(30|31|32|33|34|35|36|37|38|39|40|41)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(KA)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|29|30)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 2;
				} elseif (preg_match("/^(KA27)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 5;
				} elseif (preg_match("/^(KA28)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 6;
				} elseif (preg_match("/^(PA)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 2;
				} elseif (preg_match("/^(PA)(21|22|23|24|25|26|27|28|29|30|31|32|33|35|41)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(PA)(20|42|43|44|45|46|47|48|49|62|63|64|65|66|67|68|69|70|71|72|73|74|75)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 5;
				} elseif (preg_match("/^(PA)(34|60|61|76|77|78)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 6;
				} elseif (preg_match("/^(PH)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|49|50)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(PH)(42|43|44)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 6;
				} elseif (preg_match("/^(KW)(1|2|3|5|6|7|8|9|10|11|12|13|14)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(KW)(15|16|17)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 4;
				} elseif (preg_match("/^(IV)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|30|31|32|36|55|56|63)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 3;
				} elseif (preg_match("/^(IV)(40|42|43|44|45|46|47|48|51|52|53|54)[0-9][A-Z]{2}/", $postCode)) {
					$zone = 4;
				} else {
					$zone = 0;
				}
				break;
			case 'IE':
				$zone = 4;
				break;
			default:
				$zone = 0;
				break;
		}
		$delivery['zone'] = $zone;
		if ($basket['delivery']['zone'] != $zone)
		{
			$delivery['service'] = '';
		}
		
		// Calculate the delivery options
		$deliveryOptions = array();
		switch ($zone)
		{
			case 1:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 1.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 3.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 4;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Parcel Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 5;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 19.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 19.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 35.00;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 6:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 35;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				// Include collection
				$deliveryOption = array();
				$deliveryOption['service'] = 'Collection';
				$deliveryOption['description'] = 'You will need to collect your order from our shop in Nottingham. We will contact you as soon as your order is ready for collection.';
				$deliveryOption['price'] = 0;
				$deliveryOption['estimatedDeliveryDaysStart'] = 0;
				$deliveryOption['estimatedDeliveryDaysEnd'] = 0;
				$deliveryOptions[] = $deliveryOption;
				break;
			case 2:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 1.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 3.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 4;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Parcel Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 5;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 29;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 14;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 29;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 14;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 0;
						$deliveryOption['estimatedDeliveryDaysStart'] = 1;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 45;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 14;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 6:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Home Delivery Service';
						$deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
						$deliveryOption['price'] = 45;
						$deliveryOption['estimatedDeliveryDaysStart'] = 7;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 16;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				break;
			case 3:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 2.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 8;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 4.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 5;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Economy';
						$deliveryOption['description'] = 'Package sent economy service by courier DPD.';
						$deliveryOption['price'] = 4.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 8;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 9.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Economy';
						$deliveryOption['description'] = 'Pallet sent Economy service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 19;
						$deliveryOption['estimatedDeliveryDaysStart'] = 7;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 39;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Economy';
						$deliveryOption['description'] = 'Pallet sent Economy service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 29.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 7;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 49;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Express';
						$deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 49;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				break;
			case 4:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 3.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 9;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 7.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Economy';
						$deliveryOption['description'] = 'Package sent economy service by courier DPD.';
						$deliveryOption['price'] = 4.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 9.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 2;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 69;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 69;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 69;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				break;
			case 5:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 3.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 7.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 6;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Economy';
						$deliveryOption['description'] = 'Package sent economy service by courier DPD.';
						$deliveryOption['price'] = 7.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 7;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 15.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 8;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 79;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 10;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 89;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 89;
						$deliveryOption['estimatedDeliveryDaysStart'] = 4;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				break;
			case 6:
				switch ($band)
				{
					case 1:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail Economy';
						$deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
						$deliveryOption['price'] = 3.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 6;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Royal Mail 1st Class';
						$deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
						$deliveryOption['price'] = 7.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 7;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 2:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Economy';
						$deliveryOption['description'] = 'Package sent economy service by courier DPD.';
						$deliveryOption['price'] = 7.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 7;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						$deliveryOption = array();
						$deliveryOption['service'] = 'Parcel Delivery Express';
						$deliveryOption['description'] = 'Package sent express service by courier DPD.';
						$deliveryOption['price'] = 15.95;
						$deliveryOption['estimatedDeliveryDaysStart'] = 3;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 8;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 3:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 89;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 12;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 4:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 149;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 14;
						$deliveryOptions[] = $deliveryOption;
						break;
					case 5:
						$deliveryOption = array();
						$deliveryOption['service'] = 'Pallet Delivery Service';
						$deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
						$deliveryOption['price'] = 149;
						$deliveryOption['estimatedDeliveryDaysStart'] = 5;
						$deliveryOption['estimatedDeliveryDaysEnd'] = 14;
						$deliveryOptions[] = $deliveryOption;
						break;
				}
				break;
		}
		
		// Add any surcharges to the delivery options
		foreach ($deliveryOptions as $index => $deliveryOption)
		{
			// Check for the olympic delivery surcharge
			if ($olympicZone && (($deliveryOption['service'] == 'FREE DELIVERY Pallet Express') || ($deliveryOption['service'] == 'Pallet Delivery Express') || ($deliveryOption['service'] == 'Pallet Delivery Economy') || ($deliveryOption['service'] == 'Pallet Delivery Service')))
			{
				// Get Olympic dates
				$olympicStartDate = strtotime("2012-07-25 00:00:01");
				$olympicEndDate = strtotime("2012-09-08 23:59:59");
				
				// Get delivery dates
				$deliveryStartDate = $deliveryOption['estimatedDeliveryDaysStart'];
		   		if (date("G") > $this->deliveryCutOffTime)
		   		{
		   			$deliveryStartDate++;
		   		}
		   		$weekendDaysToAdd = 0;
		   		for ($deliveryDateCount = 1; $deliveryDateCount <= $deliveryStartDate; $deliveryDateCount++)
		   		{
			   		if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
			   		{
		   				$weekendDaysToAdd++;
		   			}
		   		}
		   		$deliveryStartDate += $weekendDaysToAdd;
		   		$deliveryStartDate = strtotime("+$deliveryStartDate day");
		   		$deliveryEndDate = $deliveryStartDate + ($deliveryOption['estimatedDeliveryDaysEnd'] - 1);
		   		$weekendDaysToAdd = 0;
		   		for ($deliveryDateCount = $deliveryStartDate; $deliveryDateCount <= $deliveryEndDate; $deliveryDateCount++)
		   		{
			   		if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
			   		{
		   				$weekendDaysToAdd++;
		   			}
		   		}
		   		$deliveryEndDate += $weekendDaysToAdd;
				$deliveryEndDate = strtotime("+$deliveryEndDate day");
				
				// Check if delivery could fall in the Olympic dates
				if ((($deliveryStartDate >= $olympicStartDate) && ($deliveryStartDate <= $olympicEndDate)) || (($deliveryEndDate >= $olympicStartDate) && ($deliveryEndDate <= $olympicEndDate)))
				{
					$deliveryOptions[$index]['service'] = str_replace('FREE DELIVERY Pallet Express', 'Pallet Delivery Service', $deliveryOptions[$index]['service']);
					$deliveryOptions[$index]['price'] += 50;
					$deliveryOptions[$index]['surcharge'] = 50;
					$deliveryOptions[$index]['surchargeDescription'] = 'Includes <strong>&pound;50</strong> Olympics Zone Surcharge';
				} else {
					$deliveryOptions[$index]['surcharge'] = 0;
					$deliveryOptions[$index]['surchargeDescription'] = '';
				}
			} else {
				$deliveryOptions[$index]['surcharge'] = 0;
				$deliveryOptions[$index]['surchargeDescription'] = '';
			}
		}
		
		$delivery['deliveryOptions'] = $deliveryOptions;
		
		// Check to make sure the current selected delivery exists as an option
		$resetDeliverySelection = true;
		foreach ($delivery['deliveryOptions'] as $deliveryOption)
		{
			if ($deliveryOption['service'] == $delivery['service'])
			{
				$resetDeliverySelection = false;
				break;
			}
		}
		if ($resetDeliverySelection)
		{
			$delivery['service'] = '';
			$delivery['price'] = 0;
		}
				
		// Get the default delivery charge
		if (sizeof($delivery['deliveryOptions']) > 0)
		{
			if ($delivery['service'] == '')
			{
				if (isset($delivery['deliveryOptions'][0]['service']))
				{
					$delivery['service'] = $delivery['deliveryOptions'][0]['service'];
				}
			}
			foreach ($delivery['deliveryOptions'] as $deliveryOption)
			{
				if ($deliveryOption['service'] == $delivery['service'])
				{
					$deliveryCharge = $deliveryOption['price'];
					$delivery['price'] = $deliveryOption['price'];
				}
			}
		} else {
			$delivery['service'] = '';
			$deliveryCharge = 0;
			$delivery['price'] = 0;
		}
		
		return $delivery;
    }
    
    // Get delivery details
    public function getEstimatedDeliveryDays()
    {
    	// Get the basket
    	$basket = $this->container->get('session')->get('basket');
    	
    	// Calulate the weightings and overall band
    	$estimatedDeliveryDays = array();
		
		// Get the default delivery charge
		foreach ($basket['delivery']['deliveryOptions'] as $deliveryOption)
		{
			if ($deliveryOption['service'] == $basket['delivery']['service'])
			{
				// Work out next day for delivery option
				$nextDay = $deliveryOption['estimatedDeliveryDaysStart'];
   		
		   		// If delivery passes cut off time
		   		if (date("G") > $this->deliveryCutOffTime)
		   		{
		   			$nextDay++;
		   		}
		   		
		   		// Check if delivery date start does not fall on a Saturday or Sunday
		   		$weekendDaysToAdd = 0;
		   		for ($deliveryDateCount = 1; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
		   		{
			   		if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
			   		{
		   				$weekendDaysToAdd++;
		   			}
		   		}
		   		$nextDay += $weekendDaysToAdd;
		   		
		   		// Check that start date does not fall on a weekend
		   		if (date("l", strtotime("+$nextDay day")) == 'Saturday')
			   	{
		   			$nextDay += 2;
		   		} elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
			   		$nextDay++;
		   		}
		   		
		   		$deliveryStartDate = $nextDay;
		   		$estimatedDeliveryDaysStart = date("l, jS F Y", strtotime("+$nextDay day"));
		   		$nextDay = $nextDay + ($deliveryOption['estimatedDeliveryDaysEnd'] - 1);		   		
		   		$weekendDaysToAdd = 0;
		   		for ($deliveryDateCount = $deliveryStartDate; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
		   		{
			   		if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
			   		{
		   				$weekendDaysToAdd++;
		   			}
		   		}
		   		$nextDay += $weekendDaysToAdd;
		   		
		   		// Check that start date does not fall on a weekend
		   		if (date("l", strtotime("+$nextDay day")) == 'Saturday')
			   	{
		   			$nextDay += 2;
		   		} elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
			   		$nextDay++;
		   		}
		   		
				$estimatedDeliveryDaysEnd = date("l, jS F Y", strtotime("+$nextDay day"));
		   		$estimatedDeliveryDays['start'] = $estimatedDeliveryDaysStart;
		   		$estimatedDeliveryDays['end'] = $estimatedDeliveryDaysEnd;
		   		$nextDay++;
		   		$requestedDeliveryDateStart = date("F d, Y H:i:s", strtotime("+$nextDay day"));
		   		$estimatedDeliveryDays['requestedDeliveryDateStart'] = $requestedDeliveryDateStart;
			}
		}
		
		return $estimatedDeliveryDays;
    }
    
    // Update basket totals
	public function updateBasketTotals()
    {
		// Get the basket
    	$basket = $this->container->get('session')->get('basket');
    	
    	// Get the services
		$doctrineService = $this->container->get('doctrine');
		$productService = $this->container->get('web_illumination_admin.product_service');

		// Get the entity manager
    	$em = $doctrineService->getEntityManager();
		
		// Setup totals
		$items = 0;
		$recommendedRetailPrice = 0;
		$subTotal = 0;
		$savings = 0;
		$deliveryCharge = 0;
		$totalDiscount = 0;
		$possibleDiscount = 0;
		$multiBuyDiscount = 0;
		$membershipCardDiscount = 0;
		$voucherCodeDiscount = 0;
		$numberOfLargeAppliances = 0;
		$vat = 0;
		$total = 0;
		$messages = array();
		
		// Specials
		$stellarPanSetDiscountsAvailable = 0;
		$numberOfCdaAppliances = 0;
		$basket['discounts'] = array();
		$basket['donations']['company']['description'] = '';
		$basket['donations']['company']['donation'] = 0;
		
		// Check for a membership card
		$membershipCardObject = false;
		if ($basket['membershipCardNumber'] > 1)
		{
			$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->findOneBy(array('membershipNumber' => $basket['membershipCardNumber']));
			if (!$membershipCardObject)
			{
				$messages['error'][] =  'The membership number <strong>"'.$basket['membershipCardNumber'].'"</strong> does not exist or is not active. Please try another one.';
			}
		}
		
		// Check for a voucher code
		$voucherCodeObject = false;
		foreach ($basket['discounts'] as $discount)
		{
			if ($discount['voucherCode'] != '')
			{
				$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->findOneBy(array('code' => $discount['voucherCode']));
				if (!$voucherCodeObject)
				{
					$messages['error'][] = 'The voucher code <strong>"'.$discount['voucherCode'].'"</strong> does not exist. Please try another one.';
				}
			}
		}
		
		// Go through all the products
		if (sizeof($basket['products']) > 0)
    	{
    		// Check if there are any stellar pan set discounts available
    		foreach ($basket['products'] as $product)
			{
				$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $product['productId']));
				if ($productIndexObject)
				{
					// Check for Stellar Pans
					if (strpos($productIndexObject->getDepartmentIds(), '|1034|1122|69|') !== false)
					{
						$stellarPanSetDiscountsAvailable += $product['quantity'];
					}
					
					// Check for CDA products
					if ($productIndexObject->getBrandId() == '7')
					{
						$numberOfCdaAppliances += $product['quantity'];
					}
					
					// Check for Movember products
					if (($productIndexObject->getProductCode() == 'KHCH') || ($productIndexObject->getProductCode() == 'EVOLUTION200') || ($productIndexObject->getProductCode() == 'SE80050SS') || ($productIndexObject->getProductCode() == 'C95030') || ($productIndexObject->getProductCode() == '119.0179.532') || ($productIndexObject->getProductCode() == 'PH01SS') || ($productIndexObject->getProductCode() == 'FWC302SS'))
					{
						$basket['donations']['company']['description'] = 'Movember Donation from Kitchen Appliance Centre';
						$basket['donations']['company']['donation'] = $product['quantity'];
					}
				}
			}
			$basket['numberOfCdaAppliances'] = $numberOfCdaAppliances;
			
    		// Discount any stellar pans where applicable
    		$totalPanDiscount = 0;
			if ($stellarPanSetDiscountsAvailable > 0)
			{
				uasort($basket['products'], array($this, "sortBasketProductsByPrice"));
				foreach ($basket['products'] as $product)
				{
					$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $product['productId']));
					if ($stellarPanSetDiscountsAvailable > 0)
					{
						if (($product['productCode'] == 'S7C1D') || ($product['productCode'] == 'S7A1D'))
						{
							if ($product['quantity'] == 1)
							{
								$panDiscount = $productIndexObject->getListPrice() * 0.4;
								$basket['products'][$product['basketItemId']]['unitCost'] = $productIndexObject->getListPrice() - $panDiscount;
								$basket['products'][$product['basketItemId']]['subTotal'] = $basket['products'][$product['basketItemId']]['unitCost'] * $product['quantity'];
								$totalDiscount += $panDiscount;
								$totalPanDiscount += $panDiscount;
								$stellarPanSetDiscountsAvailable--;
							} else {
								if ($stellarPanSetDiscountsAvailable >= $product['quantity'])
								{
									$panDiscount = $productIndexObject->getListPrice() * 0.4;
									$basket['products'][$product['basketItemId']]['unitCost'] = $productIndexObject->getListPrice() - $panDiscount;
									$basket['products'][$product['basketItemId']]['subTotal'] = $basket['products'][$product['basketItemId']]['unitCost'] * $product['quantity'];
									$totalDiscount += ($panDiscount * $product['quantity']);
									$totalPanDiscount += ($panDiscount * $product['quantity']);
									$stellarPanSetDiscountsAvailable -= $product['quantity'];
								} else {
									$panDiscount = ($productIndexObject->getListPrice() * 0.4) * $stellarPanSetDiscountsAvailable;
									$totalSubTotal = ($productIndexObject->getListPrice() * $product['quantity']) - $panDiscount;
									$basket['products'][$product['basketItemId']]['unitCost'] = $totalSubTotal / $product['quantity'];
									$basket['products'][$product['basketItemId']]['subTotal'] = $basket['products'][$product['basketItemId']]['unitCost'] * $product['quantity'];
									$totalDiscount += $panDiscount;
									$totalPanDiscount += $panDiscount;
									$stellarPanSetDiscountsAvailable = 0;
								}
							}
						}
					}
				}
				if ($totalPanDiscount > 0)
				{
					$basketDiscount = array();
					$basketDiscount['voucherCode'] = '';
					$basketDiscount['giftVoucherCode'] = '';
					$basketDiscount['description'] = '40% Off Stellar Pan Sets';
					$basketDiscount['discount'] = $totalPanDiscount;
					$basket['discounts'][] = $basketDiscount;
					$messages['success'][] = 'Congratulations your order has qualified for our 40% Off Stellar Pan Sets.';
				}
			}
			uasort($basket['products'], array($this, "sortBasketProductsByProduct"));
			
			// Discount any CDA appliances where applicable
			$totalCdaDiscount = 0;	
			foreach ($basket['products'] as $product)
			{
	 			$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $product['productId']));
	 			if ($productIndexObject)
	 			{
					if ($productIndexObject->getBrandId() == '7')
					{
						if ($numberOfCdaAppliances >= 3)
						{
							$cdaDiscount = $productIndexObject->getListPrice() * 0.1;
							if ($productIndexObject->getListPrice() < $productIndexObject->getRecommendedRetailPrice())
							{
								$basket['products'][$product['basketItemId']]['recommendedRetailPrice'] = $productIndexObject->getListPrice();
							}
							$basket['products'][$product['basketItemId']]['unitCost'] = $productIndexObject->getListPrice() - $cdaDiscount;
							$basket['products'][$product['basketItemId']]['subTotal'] = $basket['products'][$product['basketItemId']]['unitCost'] * $product['quantity'];
							$totalDiscount += ($cdaDiscount * $product['quantity']);
							$totalCdaDiscount += ($cdaDiscount * $product['quantity']);
						} else {
							$basket['products'][$product['basketItemId']]['recommendedRetailPrice'] = $productIndexObject->getRecommendedRetailPrice();
							$basket['products'][$product['basketItemId']]['unitCost'] = $productIndexObject->getListPrice();
							$basket['products'][$product['basketItemId']]['subTotal'] = $basket['products'][$product['basketItemId']]['unitCost'] * $product['quantity'];
						}
					}
				}
			}
			if ($totalCdaDiscount > 0)
			{
				$basketDiscount = array();
				$basketDiscount['voucherCode'] = '';
				$basketDiscount['giftVoucherCode'] = '';
				$basketDiscount['description'] = '10% Off CDA Appliances';
				$basketDiscount['discount'] = $totalCdaDiscount;
				$basket['discounts'][] = $basketDiscount;
				$messages['success'][] = 'Congratulations your order has qualified for our 10% Off CDA Appliances.';
			}
			
			// Update the basket
			foreach ($basket['products'] as $product)
			{
				$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $product['productId']));
				$items += $product['quantity'];
				$recommendedRetailPrice += ($product['recommendedRetailPrice'] * $product['quantity']);
				$subTotal += ($product['unitCost'] * $product['quantity']);
				
				if ($product['membershipCardPrice'] < $product['unitCost'])
				{
					$possibleDiscount += (($product['unitCost'] * $product['quantity']) - ($product['membershipCardPrice'] * $product['quantity']));

					// Get the membership card discount
					if (($basket['membershipCardNumber'] == 1) || $membershipCardObject)
					{
						$membershipCardDiscount += $possibleDiscount;
					}
				}
			}
		}
				
		/*
		// Get the voucher code discount
		if ($voucherCodeObject)
		{
			// Make sure the discount is valid
			$voucherCodeValid = true;
			
			if ($voucherCodeObject->getActive() < 1)
			{
				$voucherCodeValid = false;
				$messages['error'][] = 'The voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> is not currently available.';
			}
			
			// Check the subtotal meets the minimum order value
			if ($voucherCodeValid)
			{
				if ($subTotal < $voucherCodeObject->getMinimumOrderValue())
				{
					$voucherCodeValid = false;
					$messages['notice'][] = 'To use the voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> you need to spend <strong>&pound;'.number_format($voucherCodeObject->getMinimumOrderValue(), 2).'</strong> or more. In order to use this voucher you will need to spend a further &pound;'.number_format(($voucherCodeObject->getMinimumOrderValue() - $subTotal), 2).'</strong>.';
				}
			}
			
			// Check the availability of the voucher code
			if ($voucherCodeValid)
			{
				if ((time() < $voucherCodeObject->getValidFromDate()->getTimestamp()) || (time() > $voucherCodeObject->getExpiryDate()->getTimestamp()))
				{
					$voucherCodeValid = false;
					if (time() < $voucherCodeObject->getValidFromDate()->getTimestamp())
					{
						$messages['error'][] = 'The voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> is not yet available. It will be available on <strong>'.date("l jS F Y", $voucherCodeObject->getValidFromDate()->getTimestamp()).'</strong>.';
					} elseif (time() > $voucherCodeObject->getExpiryDate()->getTimestamp()) {
						$messages['error'][] = 'The voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> has now expired. It expired on <strong>'.date("l jS F Y", $voucherCodeObject->getExpiryDate()->getTimestamp()).'</strong>.';
					}
				}
			}
			
			// Check if the voucher has a fixed number of uses and that the uses are not used up
			if ($voucherCodeValid)
			{
				if ($voucherCodeObject->getDiscountUse() == 'f')
				{
					if ($voucherCodeObject->getNumberUsed() >= $voucherCodeObject->getNumberOfUses())
					{
						$voucherCodeValid = false;
						$messages['error'][] = 'The voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> has now been redeemed the maximum number of times. It was only available for the first <strong>'.$voucherCodeObject->getNumberOfUses().'</strong> customers.';
					}
				} elseif ($voucherCodeObject->getDiscountUse() == 's') {
					if ($voucherCodeObject->getNumberUsed() > 0)
					{
						$voucherCodeValid = false;
						$messages['error'][] = 'The voucher code <strong>"'.$voucherCodeObject->getCode().'"</strong> has already been redeemed and was only available for a single customer.';
					}
				}
			}
			
			// Get the discount from a voucher code
			if ($voucherCodeValid)
			{
				// Get the brand discounts
				$brandDiscounts = array();
				if ($voucherCodeObject->getBrands())
				{
					foreach (explode('|', $voucherCodeObject->getBrands()) as $brandDiscount)
					{
						$brandDiscountData = explode(':', $brandDiscount);
						if (sizeof($brandDiscountData) == 2)
						{
							$brandDiscounts[$brandDiscountData[0]] = $brandDiscountData[1];
						}
					}
				}
				
				// Get the department discounts
				$departmentDiscounts = array();
				if ($voucherCodeObject->getDepartments())
				{
					foreach (explode('|', $voucherCodeObject->getDepartments()) as $departmentDiscount)
					{
						$departmentDiscountData = explode(':', $departmentDiscount);
						if (sizeof($departmentDiscountData) == 2)
						{
							$departmentDiscounts[$departmentDiscountData[0]] = $departmentDiscountData[1];
						}
					}
				}
				
				// Get the product discounts
				$productDiscounts = array();
				if ($voucherCodeObject->getProducts())
				{
					foreach (explode('|', $voucherCodeObject->getProducts()) as $productDiscount)
					{
						$productDiscountData = explode(':', $productDiscount);
						if (sizeof($productDiscountData) == 2)
						{
							$productDiscounts[$productDiscountData[0]] = $productDiscountData[1];
						}
					}
				}
				
				// Get the discount for each product
				$noDiscountAppliedToProducts = true;
				foreach ($basket['products'] as $basketProduct)
				{
					$product = $productService->getProduct($basketProduct['productId']);
					if ($product)
					{
						$noDiscountAppliedToProduct = true;
						if (isset($productDiscounts[$product['id']]))
						{
							// Check if there is a discount for the product
							if ($voucherCodeObject->getDiscountType() == 'a')
							{
								// Fixed amount off
								$voucherCodeDiscount += ($productDiscounts[$product['id']] * $basketProduct['quantity']);
								$noDiscountAppliedToProduct = false;
							} elseif ($voucherCodeObject->getDiscountType() == 'p') {
								// Percentage off
								$voucherCodeDiscount += (($basketProduct['unitCost'] * ($productDiscounts[$product['id']] / 100)) * $basketProduct['quantity']);
								$noDiscountAppliedToProduct = false;
							} elseif ($voucherCodeObject->getDiscountType() == 'r') {
								// Replace value
								$voucherCodeDiscount += (($basketProduct['unitCost'] - $productDiscounts[$product['id']]) * $basketProduct['quantity']);
								$noDiscountAppliedToProduct = false;
							}
						} else {
							// Check if there is a discount for the brand and the department
							$brandDiscount = 0;
							$departmentDiscount = 0;
							
							// Calculate the brand discount
							if (isset($brandDiscounts[$product['brand']['id']]))
							{
								if ($voucherCodeObject->getDiscountType() == 'a')
								{
									// Fixed amount off
									$brandDiscount = ($brandDiscounts[$product['brand']['id']] * $basketProduct['quantity']);
									$noDiscountAppliedToProduct = false;
								} elseif ($voucherCodeObject->getDiscountType() == 'p') {
									// Percentage off
									$brandDiscount = (($basketProduct['unitCost'] * ($brandDiscounts[$product['brand']['id']] / 100)) * $basketProduct['quantity']);
									$noDiscountAppliedToProduct = false;
								} elseif ($voucherCodeObject->getDiscountType() == 'r') {
									// Replace value
									$brandDiscount = (($basketProduct['unitCost'] - $brandDiscounts[$product['brand']['id']]) * $basketProduct['quantity']);
									$noDiscountAppliedToProduct = false;
								}
							}
							
							// Calculate the best department discount
							foreach ($product['departments'] as $department)
							{
								foreach (explode('|', $department['pathIds']) as $departmentPathId)
								{
									if (isset($departmentDiscounts[$departmentPathId]))
									{
										$departmentDiscountToCheck = 0;
										if ($voucherCodeObject->getDiscountType() == 'a')
										{
											// Fixed amount off
											$departmentDiscountToCheck = ($departmentDiscounts[$departmentPathId] * $basketProduct['quantity']);
											$noDiscountAppliedToProduct = false;
										} elseif ($voucherCodeObject->getDiscountType() == 'p') {
											// Percentage off
											$departmentDiscountToCheck = (($basketProduct['unitCost'] * ($departmentDiscounts[$departmentPathId] / 100)) * $basketProduct['quantity']);
											$noDiscountAppliedToProduct = false;
										} elseif ($voucherCodeObject->getDiscountType() == 'r') {
											// Replace value
											$departmentDiscountToCheck = (($basketProduct['unitCost'] - $departmentDiscounts[$departmentPathId]) * $basketProduct['quantity']);
											$noDiscountAppliedToProduct = false;
										}
										if ($departmentDiscountToCheck > $departmentDiscount)
										{
											$departmentDiscount = $departmentDiscountToCheck;
										}
									}
								}
							}
							
							// Check for the best discount between thr brand and department
							if ($brandDiscount > $departmentDiscount)
							{
								$voucherCodeDiscount += $brandDiscount;
							} else {
								$voucherCodeDiscount += $departmentDiscount;
							}
						}
						
						// If no discount has been applied to the product check if there is a percentage discount applied on the order and apply it
						if ($noDiscountAppliedToProduct)
						{
							if (($voucherCodeObject->getDiscountType() == 'p') && ($voucherCodeObject->getDiscount() > 0))
							{
								$voucherCodeDiscount += (($basketProduct['unitCost'] * ($voucherCodeObject->getDiscount() / 100)) * $basketProduct['quantity']);
								$noDiscountAppliedToProducts = false;
							}
						} else {
							$noDiscountAppliedToProducts = false;
						}
					}
				}
				
				// If no discount has been applied to the products check to see if there is a fixed amount off or a replace value for the order
				if ($noDiscountAppliedToProducts)
				{
					if ((($voucherCodeObject->getDiscountType() == 'a') || ($voucherCodeObject->getDiscountType() == 'r')) && ($voucherCodeObject->getDiscount() > 0))
					{
						if ($voucherCodeObject->getDiscountType() == 'a')
						{
							// Fixed amount off
							$voucherCodeDiscount += $voucherCodeObject->getDiscount();
						} elseif ($voucherCodeObject->getDiscountType() == 'r') {
							// Replace value
							$voucherCodeDiscount += ($subTotal - $voucherCodeObject->getDiscount());
						}
					}
				}
			}
		}
		
		// Work out which discount is the best for the customer
		if (($membershipCardDiscount > 0) && ($voucherCodeDiscount > 0))
		{
			if ($membershipCardDiscount > $voucherCodeDiscount)
			{
				$discount += $membershipCardDiscount;
				$messages['success'][] = 'You have used a voucher code (<strong>"'.$voucherCodeObject->getCode().'"</strong>) and have a registered membership card (<strong>"'.$membershipCardObject->getMembershipNumber().'"</strong>). We can only offer one discount per order and have worked out that you get more discount on this order with your membership card (<strong>&pound;'.number_format($membershipCardDiscount, 2).' off</strong>) than the voucher code (<strong>&pound;'.number_format($voucherCodeDiscount, 2).' off</strong>).';
			} else {
				$discount += $voucherCodeDiscount;
				if ($membershipCardObject)
				{
					$messages['success'][] = 'You have used a voucher code (<strong>"'.$voucherCodeObject->getCode().'"</strong>) and have a registered membership card (<strong>"'.$membershipCardObject->getMembershipNumber().'"</strong>). We can only offer one discount per order and have worked out that you get the same or more discount on this order with the voucher code (<strong>&pound;'.number_format($voucherCodeDiscount, 2).' off</strong>) than your membership card (<strong>&pound;'.number_format($membershipCardDiscount, 2).' off</strong>).';
				} else {
					$messages['success'][] = 'You have used a voucher code (<strong>"'.$voucherCodeObject->getCode().'"</strong>) and have a purchased a membership card. We can only offer one discount per order and have worked out that you get the same or more discount on this order with the voucher code (<strong>&pound;'.number_format($voucherCodeDiscount, 2).' off</strong>) than your membership card (<strong>&pound;'.number_format($membershipCardDiscount, 2).' off</strong>).';
				}
			}
		} elseif ($membershipCardDiscount > 0) {
			$discount += $membershipCardDiscount;
			if ($basket['discounts']['membershipCardNumber'] == 1)
			{
				$messages['success'][] = 'Your new membership card discount has been successfully applied to your order.';
			} else {
				$messages['success'][] = 'Your membership card (<strong>"'.$basket['discounts']['membershipCardNumber'].'"</strong>) discount has been successfully applied to your order.';
			}
		} elseif ($voucherCodeDiscount > 0) {
			$discount += $voucherCodeDiscount;
			$message['success'][] = 'The voucher code (<strong>"'.$basket['discounts']['voucherCode'].'"</strong>) has been successfully redeemed and applied to your order.';
		}
				
		// Update the totals with the membership card purchase		
		if ($basket['discounts']['membershipCardNumber'] == 1)
		{
			$items++;
			$recommendedRetailPrice += 10;
			$subTotal += 1;
			
			// Calculate any discounts based on any voucher codes
			if ($voucherCodeObject)
			{
				if ($voucherCodeObject->getDiscountType() == 'm')
				{
					$messages['success'][] = 'The voucher code (<strong>"'.$voucherCodeObject->getCode().'"</strong>) has entitled you to a free membership card.';
					$discount += 1;
				}
			}
		}
		*/
		
		// Calculate the savings
		$savings = $recommendedRetailPrice - $subTotal;
		if ($savings > 0)
		{
			$basketDiscount = array();
			$basketDiscount['voucherCode'] = '';
			$basketDiscount['giftVoucherCode'] = '';
			$basketDiscount['description'] = 'Product Discounts';
			if ($totalPanDiscount > 0)
			{
				$savings -= $totalPanDiscount;
			}
			if ($totalCdaDiscount > 0)
			{
				$savings -= $totalCdaDiscount;
			}
			$basketDiscount['discount'] = $savings;
			$basket['discounts'][] = $basketDiscount;
			$totalDiscount += $savings;
		}

		// Get the delivery details
		$basket['delivery'] = $this->getDeliveryDetails();
		$deliveryCharge = $basket['delivery']['price'];
    	$this->container->get('session')->set('basket', $basket);
		
		// Get the estimated delivery days
		$basket['estimatedDeliveryDays'] = $this->getEstimatedDeliveryDays();
		$this->container->get('session')->set('basket', $basket);
		
		// Check if there is free delivery on a voucher codes
		/*if ($voucherCodeObject)
		{
			if ($voucherCodeObject->getDiscountType() == 'd')
			{
				$messages['success'][] = 'The voucher code (<strong>"'.$voucherCodeObject->getCode().'"</strong>) has entitled you to free delivery.';
				$deliveryCharge = 0;
			}
		}*/
		
		// Calculate the total and vat
		$total = $subTotal + $deliveryCharge;
		$vat = $total - ($total / 1.2);
		
		// Update the donations
		if (isset($basket['donations']['customer']['donation']))
		{
			if ($basket['donations']['customer']['donation'] > 0)
			{
				$total = $total + $basket['donations']['customer']['donation'];
				$messages['success'][] = 'Thank you for donating <strong>&pound;'.$basket['donations']['customer']['donation'].'</strong> to Movember.';
			}
		}
		if (isset($basket['donations']['company']['donation']))
		{
			if ($basket['donations']['company']['donation'] > 0)
			{
				$messages['success'][] = 'You have Movember products in your basket! We will donate <strong>&pound;'.$basket['donations']['company']['donation'].'</strong> to Movember on your behalf.';
			}
		}
		
		// Save the totals
		$basket['totals']['items'] = $items;
		$basket['totals']['subTotal'] = $subTotal;
		$basket['totals']['deliveryCharge'] = $deliveryCharge;
		$basket['totals']['discount'] = $totalDiscount;
		$basket['totals']['vat'] = $vat;
		$basket['totals']['total'] = $total;
		$basket['possibleDiscount'] = $possibleDiscount;
		
		// Update the session
    	$this->container->get('session')->set('basket', $basket);
		
		return $messages;
    }
    
    // Sort the basket products by price
	static function sortBasketProductsByPrice($a, $b)
	{
	    return $a['unitCost'] > $b['unitCost'];
	}
	
	// Sort the basket products by product
	static function sortBasketProductsByProduct($a, $b)
	{
	    return strcmp($a['product'], $b['product']);
	}
}