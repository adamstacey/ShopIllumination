<?php

namespace KAC\ShopBundle\Controller;
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
	    $systemService = $this->get('kac_admin.system_service');
    	$basketService = $this->get('kac_admin.basket_service');
	    
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
   		   		    	
        return $this->render('KACShopBundle:Basket:index.html.twig', array('backUrl' => $backUrl, 'basket' => $basket));
    }
    
    // Get basket contents
	public function ajaxGetBasketContentsAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Get the catalogue page history
    	$departmentHistory = $this->get('session')->get('departmentHistory');
    	
    	// Update the basket totals
    	$messages = $basketService->updateBasketTotals();
    	
		// Get the basket
		$basket = $this->get('session')->get('basket');
		
		// Check if there are products in the basket
		if (sizeof($basket['products']) > 0)
		{
			// Set notice message
			$this->get('session')->getFlashBag()->add('notice', 'Sorry, you have no products in your basket.');
		}
		
		return $this->render('KACShopBundle:Basket:ajaxGetBasketContents.html.twig', array('departmentHistory' => $departmentHistory, 'basket' => $basket, 'messages' => $messages));
    }
    
    // Get basket contents
	public function ajaxGetMembershipCardDiscountAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');
		
		return $this->render('KACShopBundle:Basket:ajaxGetMembershipCardDiscount.html.twig', array('basket' => $basket));
    }
    
    // Update delivery options
	public function ajaxUpdateDeliveryOptionsAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    		
		return $this->render('KACShopBundle:Basket:ajaxGetBasketTotals.html.twig', array('basket' => $basket));
    }
    
    // Get basket totals
	public function ajaxGetBasketDeliveryOptionsAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');
    		
		return $this->render('KACShopBundle:Basket:ajaxGetBasketDeliveryOptions.html.twig', array('basket' => $basket));
    }
    
    // Add to basket
	public function ajaxAddToBasketAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('kac_admin.basket_service');
    	$productService = $this->get('kac_admin.product_service');
    	
		// Get submitted data
		$productId = $request->query->get('productId');
		$variantId = $request->query->get('variantId', $productId);
		$quantity = ($request->query->get('quantity')?$request->query->get('quantity'):1);
		$selectedOptions = ($request->query->get('selectedOptions')?$request->query->get('selectedOptions'):'');
		$price = 0;
		$subTotal = 0;
		
		// Get the product
    	$product = $productService->getProduct($productId, 'en', 'GBP');
        $variant = $productService->getVariant($variantId, 'en', 'GBP');
    	$header = $product['pageTitle'];
    	$url = $product['url'];
        if(count($product['images']) > 0)
        {
    	    $thumbnailPath = $product['images'][0]['thumbnailPath'];
        } else {
            $thumbnailPath = null;
        }

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
    		$price = $variant['prices'][0]['listPrice'];
    		$recommendedRetailPrice = $variant['prices'][0]['recommendedRetailPrice'];
    		$discount = $variant['prices'][0]['discount'];
    		
    		// Get selected options
    		$savings = $recommendedRetailPrice - $price;
    		$newProduct['basketItemId'] = $basketItemId;
    		$newProduct['productId'] = $productId;
    		$newProduct['product'] = $product['pageTitle'];
    		$newProduct['url'] = $variant['url'];
    		$newProduct['header'] = $variant['pageTitle'];
    		$newProduct['productCode'] = $variant['productCode'];
    		$newProduct['brand'] = $product['brand'];
    		$newProduct['description'] = $variant['description'];
    		$newProduct['deliveryBand'] = $variant['deliveryBand'];
    		$newProduct['weight'] = $variant['weight'];
    		$newProduct['height'] = $variant['height'];
    		$newProduct['length'] = $variant['length'];
    		$newProduct['width'] = $variant['width'];
    		$newProduct['quantity'] = $quantity;
    		$newProduct['unitCost'] = $price;
    		$newProduct['recommendedRetailPrice'] = $recommendedRetailPrice;
    		$newProduct['discount'] = $discount;
    		$newProduct['savings'] = $savings;
    		$newProduct['subTotal'] = $quantity * $price;
    		$newProduct['vat'] = $newProduct['subTotal'] - ($newProduct['subTotal'] / 1.2);
    		$newProduct['selectedOptions'] = array();
    		$newProduct['selectedOptionLabels'] = array();

    		$basket['products'][$basketItemId] = $newProduct;

	    	$subTotal = $price * $quantity;
    	}
    	
    	// Update the basket session
    	$this->get('session')->set('basket', $basket);
    	
    	// Update the basket totals
    	$basketService->updateBasketTotals();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'header' => $header, 'url' => $url, 'thumbnailPath' => $thumbnailPath, 'quantity' => $quantity, 'price' => number_format($price, 2), 'subTotal' => number_format($subTotal, 2))), ENT_NOQUOTES));	    	   		    	
    }

    // Add to basket
    public function ajaxAddNonProductToBasketAction(Request $request)
    {
        // Get the services
        $basketService = $this->get('kac_admin.basket_service');
        $productService = $this->get('kac_admin.product_service');

        // Get submitted data
        $productId = $request->query->get('productId');
        $variantId = $request->query->get('variantId', $productId);
        $quantity = ($request->query->get('quantity')?$request->query->get('quantity'):1);
        $deliveryBand = $request->query->get('deliveryBand');
        $url = $request->query->get('url');
        $unitCost = $request->query->get('unitCost');
        $productCode = $request->query->get('productCode');
        $header = $request->query->get('header');
        $brand = $request->query->get('brand');
        $description = $request->query->get('description');
        $selectedOptions = ($request->query->get('selectedOptions')?$request->query->get('selectedOptions'):'');
        $price = 0;
        $subTotal = 0;

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
            $price = $unitCost;
            $recommendedRetailPrice = $unitCost;
            $discount = 0;

            // Get selected options
            $savings = 0;
            $newProduct['basketItemId'] = $basketItemId;
            $newProduct['productId'] = $productId;
            $newProduct['product'] = $description;
            $newProduct['url'] = $url;
            $newProduct['header'] = $header;
            $newProduct['productCode'] = $productCode;
            $newProduct['brand'] = $brand;
            $newProduct['description'] = $description;
            $newProduct['weight'] = 0;
            $newProduct['deliveryBand'] = $deliveryBand;
            $newProduct['weight'] = 0;
            $newProduct['height'] = 0;
            $newProduct['length'] = 0;
            $newProduct['width'] = 0;
            $newProduct['quantity'] = $quantity;
            $newProduct['unitCost'] = $price;
            $newProduct['recommendedRetailPrice'] = $recommendedRetailPrice;
            $newProduct['discount'] = $discount;
            $newProduct['savings'] = $savings;
            $newProduct['subTotal'] = $quantity * $price;
            $newProduct['vat'] = $newProduct['subTotal'] - ($newProduct['subTotal'] / 1.2);
            $newProduct['selectedOptions'] = array();
            $newProduct['selectedOptionLabels'] = array();

            $basket['products'][$basketItemId] = $newProduct;

            $subTotal = $price * $quantity;
        }

        // Update the basket session
        $this->get('session')->set('basket', $basket);

        // Update the basket totals
        $basketService->updateBasketTotals();

        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'header' => $header, 'url' => $url, 'quantity' => $quantity, 'price' => number_format($price, 2), 'subTotal' => number_format($subTotal, 2))), ENT_NOQUOTES));
    }
    
    // Redeem membership card number
	public function ajaxRedeemMembershipCardNumberAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
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
    	$basketService = $this->get('kac_admin.basket_service');
    	
    	// Reset the basket
    	$basketService->resetBasketSession();
    	
    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));	    	   		    	
    }

	// Basket summary
	public function ajaxGetBasketSummaryAction(Request $request)
    {
		// Get the basket
		$basket = $this->get('session')->get('basket');			
		
		return $this->render('KACShopBundle:Basket:ajaxGetBasketSummary.html.twig', array('basket' => $basket));
    }
}