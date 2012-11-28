<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BasketController extends Controller
{
	protected $membershipCardDiscount;

    public function __construct()
    {
        $this->membershipCardDiscount = 10;
    }
	
	// Index page
	public function indexAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
    	$basketService = $this->get('web_illumination_admin.basket_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
   		
   		// Update the basket totals
    	$basketService->updateBasketTotals();
   		
    	// Get the basket
   		$basket = $this->get('session')->get('basket');
   		
   		// Get the back url
    	$backUrl = $systemService->getLastDepartmentUrl();
    	if (!$backUrl)
    	{
	    	$backUrl = $this->generateUrl('homepage');
    	}
   		
   		// Check that items have been added to the basket
   		if ($basket['totals']['items'] < 1)
   		{
   			// Set notice message
		    $this->get('session')->getFlashBag()->add('notice', 'Sorry, you have no products in your basket.');
		    
		    // Forward to the last catalogue page
		    return $this->redirect($backUrl);
   		}
   		   		    	
        return $this->render('WebIlluminationShopBundle:Basket:index.html.twig', array('backUrl' => $backUrl, 'basket' => $basket));
    }
    
    // Get basket contents
	public function ajaxGetBasketContentsAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the catalogue page history
    	$departmentHistory = $this->get('session')->get('departmentHistory');
    	
    	// Update the basket totals
    	$messages = $basketService->updateBasketTotals();
    	
		// Get the basket
		$basket = $this->get('session')->get('basket');
		
		// Check if there are products in the basket
		if ((sizeof($basket['products']) > 0) || ($basket['membershipCardNumber'] != ''))
		{
			// Set notice message
			$this->get('session')->getFlashBag()->add('notice', 'Sorry, you have no products in your basket.');
		}
		
		return $this->render('WebIlluminationShopBundle:Basket:ajaxGetBasketContents.html.twig', array('departmentHistory' => $departmentHistory, 'basket' => $basket, 'messages' => $messages));
    }
    
    // Get basket contents
	public function ajaxGetMembershipCardDiscountAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');
		
		return $this->render('WebIlluminationShopBundle:Basket:ajaxGetMembershipCardDiscount.html.twig', array('basket' => $basket));
    }
    
    // Update delivery options
	public function ajaxUpdateDeliveryOptionsAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
		// Get submitted data
		$countryCode = $request->query->get('countryCode');
		$postZipCode = $request->query->get('postZipCode');
		$deliveryOption = $request->query->get('deliveryOption');
		
		// Get the basket
		$basket = $this->get('session')->get('basket');
			
		// Get the order
		$order = $this->get('session')->get('order');
			
		// Update the delivery options
		$basket['delivery']['countryCode'] = $countryCode;
		$basket['delivery']['postZipCode'] = $postZipCode;
		$basket['delivery']['service'] = $deliveryOption;
		if (($order['deliveryCountryCode'] != $countryCode) || ($order['deliveryPostZipCode'] != $postZipCode))
		{
   			$order['deliveryFirstName'] = $order['firstName'];
    		$order['deliveryLastName'] = $order['lastName'];
    		$order['deliveryOrganisationName'] = $order['organisationName'];
    		$order['deliveryAddressLine1'] = '';
    		$order['deliveryAddressLine2'] = '';
    		$order['deliveryTownCity'] = '';
    		$order['deliveryCountyState'] = '';
    		$order['deliveryPostZipCode'] = $postZipCode;
    		$order['deliveryCountryCode'] = $countryCode;
    		if ($order['sameDeliveryAddress'] > 0)
    		{
	    		$order['billingFirstName'] = $order['firstName'];
	    		$order['billingLastName'] = $order['lastName'];
	    		$order['billingOrganisationName'] = $order['organisationName'];
	    		$order['billingAddressLine1'] = '';
	    		$order['billingAddressLine2'] = '';
	    		$order['billingTownCity'] = '';
	    		$order['billingCountyState'] = '';
	    		$order['billingPostZipCode'] = $postZipCode;
	    		$order['billingCountryCode'] = $countryCode;
    		}
		}
			
		// Update the session
    	$this->get('session')->set('basket', $basket);
    	$this->get('session')->set('order', $order);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    		
		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    }
    
    // Get basket totals
	public function ajaxGetBasketTotalsAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');
    		
		return $this->render('WebIlluminationShopBundle:Basket:ajaxGetBasketTotals.html.twig', array('basket' => $basket));
    }
    
    // Get basket totals
	public function ajaxGetBasketDeliveryOptionsAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');
    		
		return $this->render('WebIlluminationShopBundle:Basket:ajaxGetBasketDeliveryOptions.html.twig', array('basket' => $basket));
    }
    
    // Add to basket
	public function ajaxAddToBasketAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	
		// Get submitted data
		$productId = $request->query->get('productId');
		$quantity = ($request->query->get('quantity')?$request->query->get('quantity'):1);
		$selectedOptions = ($request->query->get('selectedOptions')?$request->query->get('selectedOptions'):'');
		$price = 0;
		$subTotal = 0;
		
		// Get the product
    	$product = $productService->getProduct($productId, 'en', 'GBP');
    	$header = $product['pageTitle'];
    	$url = $product['url'];
    	$thumbnailPath = $product['images'][0]['thumbnailPath'];

		// Get the basket
			$basket = $this->get('session')->get('basket');   			
		
    	// Check if product already exists in the basket
    	$addNewProduct = true;
    	if (is_array($basket['products']))
    	{
	    	foreach ($basket['products'] as $key => $basketProduct)
	    	{
	    		if ($basketProduct['productId'] == $productId)
	    		{
	    			if ($basketProduct['selectedOptions'] == $selectedOptions)
	    			{
	    				$basket['products'][$key]['quantity'] += $quantity;
	    				$basket['products'][$key]['subTotal'] = $basket['products'][$key]['quantity'] * $basket['products'][$key]['unitCost'];
	    				$basket['products'][$key]['vat'] = $basket['products'][$key]['subTotal'] - ($basket['products'][$key]['subTotal'] / 1.2);
	    				$price = $basket['products'][$key]['unitCost'];
	    				$subTotal = $price * $quantity;
	    				$addNewProduct = false;
	    			}
	    		}
	    	}
	    }
    	
    	// Add new product if it does not exist
    	if ($addNewProduct)
    	{
    		// Get basket item id
    		$productCount = 1;
    		if (is_array($basket['products']))
    		{
	    		foreach ($basket['products'] as $key => $basketProduct)
		    	{
		    		if ($basketProduct['productId'] == $productId)
		    		{
		    			$productCount++;
		    		}
		    	}
		    }
	    	$basketItemId = $productId.'-'.$productCount;
    		$newProduct = array();
    		$price = $product['prices'][0]['listPrice'];
    		$recommendedRetailPrice = $product['prices'][0]['recommendedRetailPrice'];
    		$discount = $product['prices'][0]['discount'];
    		
    		// Get selected options
    		$selectedOptionLabels = array();
    		if ($selectedOptions)
    		{
    			// Get the entity manager
	   			$em = $this->getDoctrine()->getEntityManager();
	   		
	    		$selectedOptionIds = explode('|', $selectedOptions);
	    		foreach ($selectedOptionIds as $selectedOptionId)
	    		{
	    			$productToOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductToOption')->find($selectedOptionId);
	    			$productOptionGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductOptionGroup')->find($productToOptionObject->getProductOptionGroupId());
					$productOptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductOption')->find($productToOptionObject->getProductOptionId());								
					$selectedOptionLabel = $productOptionGroupObject->getProductOptionGroup().': '.$productOptionObject->getProductOption();
					$priceChange = $productToOptionObject->getPrice();
					$priceType = $productToOptionObject->getPriceType();
					$priceUse = $productToOptionObject->getPriceUse();
					if ($priceType == 'a')
					{
						if ($priceUse == 'i')
						{
							$price += $priceChange;
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice += $priceChange;
							}
						} elseif (($priceUse == 'd')) {
							$price -= $priceChange;
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice -= $priceChange;
							}
						}
					}
					if ($priceType == 'p')
					{
						if ($priceUse == 'i')
						{
							$price = $price + ($price * ($priceChange / 100));
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice = $recommendedRetailPrice + ($price * ($priceChange / 100));
							}
						} elseif (($priceUse == 'd')) {
							$price = $price - ($price * ($priceChange / 100));
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice = $recommendedRetailPrice - ($price * ($priceChange / 100));
							}
						}
					}
					if ($priceType == 'r')
					{
						if ($priceUse == 'i')
						{
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice += ($priceChange - $price);
							}
						} elseif (($priceUse == 'd')) {
							if ($recommendedRetailPrice > 0)
							{
								$recommendedRetailPrice -= ($priceChange - $price);
							}
						}
						$price = $priceChange;
					}
					$selectedOptionLabels[] = $selectedOptionLabel;
	    		}
    		}
    		$savings = $recommendedRetailPrice - $price;
    		$newProduct['basketItemId'] = $basketItemId;
    		$newProduct['productId'] = $productId;
    		$newProduct['product'] = $product['pageTitle'];
    		$newProduct['url'] = $product['url'];
    		$newProduct['header'] = str_replace(' '.$product['productCode'].' ', ' ', $product['header']);
    		$newProduct['productCode'] = $product['productCode'];
    		$newProduct['brand'] = $product['brand'];
    		$newProduct['shortDescription'] = $product['shortDescription'];
    		$newProduct['weight'] = $product['weight'];
    		$newProduct['deliveryBand'] = $product['inheritedDeliveryBand'];
    		$newProduct['quantity'] = $quantity;
    		$newProduct['unitCost'] = $price;
    		$newProduct['recommendedRetailPrice'] = $recommendedRetailPrice;
    		$newProduct['discount'] = $discount;
    		$newProduct['savings'] = $savings;
    		$newProduct['subTotal'] = $quantity * $price;
    		$newProduct['vat'] = $newProduct['subTotal'] - ($newProduct['subTotal'] / 1.2);
    		$newProduct['selectedOptions'] = $selectedOptions;
    		$newProduct['selectedOptionLabels'] = $selectedOptionLabels;
    		
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
    			if ($recommendedRetailPrice > 0)
				{
    				$newProduct['membershipCardPrice'] = $recommendedRetailPrice - ($recommendedRetailPrice * ($bestMembershipCardDiscountAvailable / 100));
    			} else {
    				$newProduct['membershipCardPrice'] = $price;
    			}
    		} else {
    			$newProduct['membershipCardPrice'] = $price;
    		}
    		
    		$basket['products'][$basketItemId] = $newProduct;
    		
	    	$subTotal = $price * $quantity;
    	}
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'header' => $header, 'url' => $url, 'thumbnailPath' => $thumbnailPath, 'quantity' => $quantity, 'price' => number_format($price, 2), 'subTotal' => number_format($subTotal, 2))), ENT_NOQUOTES));	    	   		    	
    }
    
    // Redeem membership card number
	public function ajaxRedeemMembershipCardNumberAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the basket session
		$basket = $this->get('session')->get('basket');
    	
    	// Get submitted data
		$membershipCardNumber = strtoupper(trim($request->query->get('membershipCardNumber')));
		
		// Update the membership card number
		$basket['membershipCardNumber'] = $membershipCardNumber;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Delete membership card number
	public function ajaxDeleteMembershipCardNumberAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the basket session
		$basket = $this->get('session')->get('basket');
    	    		
		// Update the membership card number
		$basket['membershipCardNumber'] = 0;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Redeem voucher code
	public function ajaxRedeemVoucherCodeAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the basket session
		$basket = $this->get('session')->get('basket');
    	
    	// Get submitted data
		$voucherCode = strtoupper(trim($request->query->get('voucherCode')));
		
		// TODO!
		// Update the voucher code
	    //$basket['discounts']['voucherCode'] = $voucherCode;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Make donation
	public function ajaxMakeDonationAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the basket session
		$basket = $this->get('session')->get('basket');
    	
    	// Get submitted data
		$donation = $request->query->get('donation');
		
		// Update the donation
	    $basket['donations']['customer']['description'] = 'Movember Donation from You - Thank You';
		$basket['donations']['customer']['donation'] = $donation;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Delete voucher code
	public function ajaxDeleteVoucherCodeAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
    	
    	// Get the basket session
		$basket = $this->get('session')->get('basket');
    	    		
		// Update the membership card number
		//$basket['discounts']['voucherCode'] = '';
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Add membership card to basket
	public function ajaxAddMembershipCardToBasketAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
		// Get the basket
		$basket = $this->get('session')->get('basket'); 
			
    	// Update the membership card
    	$basket['membershipCardNumber'] = 1;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
        
    // Delete membership card from basket
	public function ajaxDeleteMembershipCardAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the basket
		$basket = $this->get('session')->get('basket'); 
			
    	// Update the membership card
    	$basket['membershipCardNumber'] = 0;
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Update basket item
	public function ajaxUpdateBasketItemAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
		// Get submitted data
		$productId = $request->query->get('productId');
		$quantity = ($request->query->get('quantity')?$request->query->get('quantity'):1);
		$selectedOptions = $request->query->get('selectedOptions');
		
		// Get the basket
		$basket = $this->get('session')->get('basket'); 
			   		
    	// Check if product already exists in the basket
    	foreach ($basket['products'] as $key => $product)
    	{
    		if ($product['productId'] == $productId)
    		{
    			if ($product['selectedOptions'] == $selectedOptions)
    			{
    				$basket['products'][$key]['quantity'] = $quantity;
    				$basket['products'][$key]['subTotal'] = $basket['products'][$key]['quantity'] * $basket['products'][$key]['unitCost'];
    			}
    		}
    	}
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Delete a basket item
	public function ajaxDeleteBasketItemAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
		// Get submitted data
		$basketItemId = $request->query->get('basketItemId');
		
		// Get the basket
		$basket = $this->get('session')->get('basket');
			   			    	
    	// See if the product is in the basket
    	if (isset($basket['products'][$basketItemId]))
    	{
    		unset($basket['products'][$basketItemId]);
    	}
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }
    
    // Clear the basket
	public function ajaxClearBasketAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Reset the basket
    	$basketService->resetBasketSession();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }

	// Basket summary
	public function ajaxGetBasketSummaryAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');			
		
		return $this->render('WebIlluminationShopBundle:Basket:ajaxGetBasketSummary.html.twig', array('basket' => $basket));
    }
}