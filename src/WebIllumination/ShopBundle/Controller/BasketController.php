<?php

namespace WebIllumination\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BasketController extends Controller
{
    // Index page
    public function indexAction(Request $request)
    {
        // Get the entity manager
        $em = $this->getDoctrine()->getManager();

        // Get the services
        $systemService = $this->get('web_illumination_admin.system_service');
        $basketService = $this->get('web_illumination_admin.basket_service');

        // Initialise the session
        $systemService->initialiseSession();

        // Update the basket totals
        $basketService->updateBasketTotals();

        // Get the basket
        $basket = $this->get('session')->get('basket');

        // Get the last product added
        $lastBasketProduct = null;
        foreach ($basket['products'] as $product)
        {
            $lastBasketProduct = $product;
        }

        // Get the last basket product brand
        $lastBasketProductBrand = false;
        $lastBasketProductBrandUrl = false;

        // Get the last basket product department
        $lastBasketProductDepartment = false;
        $lastBasketProductDepartmentUrl = false;

        if ($lastBasketProduct)
        {
            // Get the last basket product brand
            if (is_array($lastBasketProduct['brand']))
            {
                $lastBasketProductBrand = $lastBasketProduct['brand']['brand'];
                $lastBasketProductBrandUrl = $lastBasketProduct['brand']['routing'];
            }

            // Get the last basket product department
            $product = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($lastBasketProduct['productId']);
            if ($product)
            {
                $lastBasketProductDepartment = $product->getDepartment()->getDepartment()->getDescription()->getName();
                $lastBasketProductDepartmentUrl = $product->getDepartment()->getDepartment()->getUrl();
            }
        }

        // Check that items have been added to the basket
        if ($basket['totals']['items'] < 1)
        {
            // Set notice message
            $this->get('session')->getFlashBag()->add('notice', 'Sorry, you have no products in your basket.');

            // Forward to the last catalogue page
            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render('WebIlluminationShopBundle:Basket:index.html.twig', array('basket' => $basket, 'lastBasketProductBrand' => $lastBasketProductBrand, 'lastBasketProductBrandUrl' => $lastBasketProductBrandUrl, 'lastBasketProductDepartment' => $lastBasketProductDepartment, 'lastBasketProductDepartmentUrl' => $lastBasketProductDepartmentUrl));
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

        return $this->render('WebIlluminationShopBundle:Basket:ajaxGetBasketContents.html.twig', array('departmentHistory' => $departmentHistory, 'basket' => $basket, 'messages' => $messages));
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

        // Initialise the session
        $basketService->initialiseBasketSession();

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

        if(!$product || !$variant)
        {
            throw $this->createNotFoundException();
        }

        $header = $variant['pageTitle'];
        $url = $variant['url'];
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
                if (isset($basketProduct['variantId']) && $basketProduct['variantId'] == $variantId)
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
                    if ($basketProduct['variantId'] == $variantId)
                    {
                        $productCount++;
                    }
                }
            }
            $basketItemId = $productId.'-'.$variantId.'-'.$productCount;
            $newProduct = array();
            $price = $variant['prices'][0]['listPrice'];
            $recommendedRetailPrice = $variant['prices'][0]['recommendedRetailPrice'];
            $discount = $variant['prices'][0]['discount'];

            $savings = $recommendedRetailPrice - $price;
            $newProduct['basketItemId'] = $basketItemId;
            $newProduct['productId'] = $productId;
            $newProduct['variantId'] = $variantId;
            $newProduct['product'] = $variant['pageTitle'];
            $newProduct['url'] = $variant['url'];
            $newProduct['header'] = $variant['header'];
            $newProduct['productCode'] = $variant['productCode'];
            $newProduct['brand'] = $product['brand'];
            $newProduct['shortDescription'] = $variant['metaDescription'];
            $newProduct['weight'] = $variant['weight'];
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
            $newProduct['validProduct']= 1;
            $newProduct['selectedOptions'] = $selectedOptions;
            $newProduct['selectedOptionLabels'] = array();

            $basket['products'][$basketItemId] = $newProduct;

            $subTotal = $price * $quantity;
        }

        // Update the basket session
        $this->get('session')->set('basket', $basket);

        // Update the basket totals
        $basketService->updateBasketTotals();

        return new Response(json_encode(array(
            'response' => 'success',
            'header' => $header,
            'url' => $url,
            'thumbnailPath' => $thumbnailPath,
            'quantity' => $quantity,
            'price' => number_format($price, 2),
            'subTotal' => number_format($subTotal, 2),
            'summary_html' => $this->get('fragment.handler')->render($this->generateUrl('basket_summary')),
            'product_html' => $this->ajaxGetBasketProductInfoAction($request, $productId, $variantId)->getContent(),
            'small_product_html' => $this->ajaxGetBasketSmallProductInfoAction($request, $productId, $variantId)->getContent(),
        )));
    }

    public function ajaxGetBasketProductInfoAction(Request $request, $productId, $variantId=null)
    {
        return $this->render('KACSiteBundle:Product:basketInfo.html.twig', array(
            'productId' => $productId,
            'variantId' => $variantId,
        ));
    }

    public function ajaxGetBasketSmallProductInfoAction(Request $request, $productId, $variantId=null)
    {
        return $this->render('KACSiteBundle:Product:smallBasketInfo.html.twig', array(
            'productId' => $productId,
            'variantId' => $variantId,
        ));
    }

    // Add to basket
    public function ajaxAddNonProductToBasketAction(Request $request)
    {
        // Get the services
        $basketService = $this->get('web_illumination_admin.basket_service');
        $productService = $this->get('web_illumination_admin.product_service');

        // Get submitted data
        $productId = $request->request->get('productId');
        $quantity = ($request->request->get('quantity')?$request->request->get('quantity'):1);
        $deliveryBand = $request->request->get('deliveryBand');
        $url = $request->request->get('url');
        $unitCost = $request->request->get('unitCost');
        $productCode = $request->request->get('productCode');
        $header = $request->request->get('header');
        $brand = $request->request->get('brand');
        $description = $request->request->get('description');
        $selectedOptions = ($request->request->get('selectedOptions')?$request->request->get('selectedOptions'):'');
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
            $newProduct['validProduct']= 0;
            $newProduct['selectedOptions'] = '';
            $newProduct['selectedOptionLabels'] = array();

            $basket['products'][$basketItemId] = $newProduct;

            $subTotal = $price * $quantity;
        }

        // Update the basket session
        $this->get('session')->set('basket', $basket);

        // Update the basket totals
        $basketService->updateBasketTotals();

        return new Response(json_encode(array(
            'response' => 'success',
            'header' => $header,
            'url' => $url,
            'quantity' => $quantity,
            'price' => number_format($price, 2),
            'subTotal' => number_format($subTotal, 2),
            'summary_html' => $this->get('fragment.handler')->render($this->generateUrl('basket_summary')),
            'product_html' => $this->ajaxGetBasketProductInfoAction($request, $productId)->getContent(),
        )));
    }

    // Redeem voucher code
    public function ajaxRedeemVoucherCodeAction(Request $request)
    {
        // Get the services
        $basketService = $this->get('web_illumination_admin.basket_service');

        // Get the entity manager
        $em = $this->getDoctrine()->getManager();

        // Get the basket session
        $basket = $this->get('session')->get('basket');

        // Get submitted data
        $voucherCode = strtoupper(trim($request->query->get('voucherCode')));

        // Check if voucher was already added
        foreach($basket['voucherCodes'] as $index => $checkCode)
        {
            if($checkCode === $voucherCode)
            {
                return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
            }
        }

        // Check if voucher code is valid
        $basket['voucherCodes'][0] = $voucherCode;

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
        $em = $this->getDoctrine()->getManager();

        // Get the basket session
        $basket = $this->get('session')->get('basket');

        // Update the membership card number
        unset($basket['voucherCodes'][0]);

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
        $variantId = $request->query->get('variantId');
        $quantity = ($request->query->get('quantity')?$request->query->get('quantity'):1);
        $selectedOptions = $request->query->get('selectedOptions');

        // Get the basket
        $basket = $this->get('session')->get('basket');

        // Check if product already exists in the basket
        foreach ($basket['products'] as $key => $product)
        {
            if ($product['variantId'] == $variantId)
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