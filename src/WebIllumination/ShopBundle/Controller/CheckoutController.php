<?php

namespace WebIllumination\ShopBundle\Controller;
use FOS\UserBundle\Util\UserManipulator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CheckoutController extends Controller
{
	
	// Index page
	public function indexAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    $basketService = $this->get('web_illumination_admin.basket_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
    	// Get the catalogue page history
   		$departmentHistory = $this->get('session')->get('departmentHistory');
   		
   		// Update the basket totals
    	$basketService->updateBasketTotals();
    	   		
    	// Get the order
    	$order = $this->get('session')->get('order');
    	   		
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
		    return $this->redirect($this->get('router')->generate('page_request', array('url' => $departmentHistory[0])));
   		}
    	
        return $this->render('WebIlluminationShopBundle:Checkout:index.html.twig', array('order' => $order, 'basket' => $basket, 'backUrl' => $backUrl));
    }
        
    // Check email address
	public function ajaxCheckEmailAddressAction(Request $request)
    {
		// Get submitted data
		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
		
		// Get the order
		$order = $this->get('session')->get('order');
		
		// Update the details
		$order['emailAddress'] = $emailAddress;
		    		
		// Save to the session
		$this->get('session')->set('order', $order);
		
		// Get the entity manager
	   	$em = $this->getDoctrine()->getManager();

		// Check to see if the email address has a user account assigned to it 
		$userAccountExists = false;
		$userObject = $em->getRepository('KAC\UserBundle\Entity\User')->findOneBy(array('email' => $emailAddress));
		if ($userObject)
		{
			$userAccountExists = true;
		}
    		
		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order, 'userAccountExists' => $userAccountExists)), ENT_NOQUOTES));
    }
    
    // Create user
	public function ajaxCreateUserAction(Request $request)
    {
		// Get submitted data
		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
		$password  = trim($request->request->get('password'));
		
		// Get the entity manager
	   	$em = $this->getDoctrine()->getManager();

        /**
         * Create the user
         * @var $manipulator UserManipulator
         * @var $userObject \KAC\UserBundle\Entity\User
         */
        $manipulator = $this->getContainer()->get('fos_user.util.user_manipulator');
        $userObject = $manipulator->create($emailAddress, $password, $emailAddress, true, false);
    	
    	// Authenticate the user
		$token = new UsernamePasswordToken($userObject, null, 'shop', array('ROLE_CUSTOMER'));
		$this->get('security.context')->setToken($token);
		$this->get('session')->set('_security_'.'shop', serialize($token));
    		    	
    	// Setup the session
		$customer = array();
		$user = array();
		$user['id'] = $userObject->getId();
//		$user['contactId'] = $userObject->getContactId();
		$user['contactId'] = $userObject->getContacts()->isEmpty() ? null : $userObject->getContacts()->first()->getId();
		$user['emailAddress'] = $userObject->getEmail();
		$user['lastLoggedIn'] = $userObject->getLastLogin();
		$customer['user'] = $user;
		$customer['contact'] = array();
		
		// Get the session
		$order = $this->get('session')->get('order');
		$basket = $this->get('session')->get('basket');
		
		// Update the user id
		$order['userId'] = $userObject->getId();
			    	
    	// Save to the session
		$this->get('session')->set('order', $order);
		$this->get('session')->set('customer', $customer);
		        		
		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order)), ENT_NOQUOTES));
    }
        
    // Save order
	public function ajaxSaveOrderAction(Request $request)
    {
		// Get the services
		$basketService = $this->get('web_illumination_admin.basket_service');
    	$orderService = $this->get('web_illumination_admin.order_service');
    	
		// Get the entity manager
	   	$em = $this->getDoctrine()->getManager();
	   	    		
		// Get the session
		$order = $this->get('session')->get('order');
		$basket = $this->get('session')->get('basket');
		
		// Get submitted data
		$firstName = ucwords(trim($request->request->get('firstName')));
		$lastName = ucwords(trim($request->request->get('lastName')));
		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
		$telephoneDaytime = trim($request->request->get('telephoneDaytime'));
		$telephoneEvening = trim($request->request->get('telephoneEvening'));
		$mobile = trim($request->request->get('mobile'));
		$billingFirstName = ucwords(trim($request->request->get('billingFirstName')));
		$billingLastName = ucwords(trim($request->request->get('billingLastName')));
		$billingOrganisationName = ucwords(trim($request->request->get('billingOrganisationName')));
		$billingAddressLine1 = trim($request->request->get('billingAddressLine1'));
		$billingAddressLine2 = trim($request->request->get('billingAddressLine2'));
		$billingTownCity = trim($request->request->get('billingTownCity'));
		$billingCountyState = trim($request->request->get('billingCountyState'));
		$billingPostZipCode = strtoupper(trim($request->request->get('billingPostZipCode')));
		$billingCountryCode = $request->request->get('billingCountryCode');
		$deliveryFirstName = ucwords(trim($request->request->get('deliveryFirstName')));
		$deliveryLastName = ucwords(trim($request->request->get('deliveryLastName')));
		$deliveryOrganisationName = ucwords(trim($request->request->get('deliveryOrganisationName')));
		$deliveryAddressLine1 = trim($request->request->get('deliveryAddressLine1'));
		$deliveryAddressLine2 = trim($request->request->get('deliveryAddressLine2'));
		$deliveryTownCity = trim($request->request->get('deliveryTownCity'));
		$deliveryCountyState = trim($request->request->get('deliveryCountyState'));
		$deliveryPostZipCode = strtoupper(trim($request->request->get('deliveryPostZipCode')));
		$deliveryCountryCode = $request->request->get('deliveryCountryCode');
		$sameDeliveryAddress = ($request->request->get('sameDeliveryAddress')?1:0);
		$deliveryOption = $request->request->get('deliveryOption');
		$requestedDeliveryDate = trim($request->request->get('requestedDeliveryDate'));
		$notes = trim($request->request->get('notes'));
		    		
		// Update the order
		$order['firstName'] = $firstName;
		$order['lastName'] = $lastName;
		$order['emailAddress'] = $emailAddress;
		$order['telephoneDaytime'] = $telephoneDaytime;
		$order['telephoneEvening'] = $telephoneEvening;
		$order['mobile'] = $mobile;    		
		$order['billingFirstName'] = $billingFirstName;
		$order['billingLastName'] = $billingLastName;
		$order['billingOrganisationName'] = $billingOrganisationName;
		$order['billingAddressLine1'] = $billingAddressLine1;
		$order['billingAddressLine2'] = $billingAddressLine2;
		$order['billingTownCity'] = $billingTownCity;
		$order['billingCountyState'] = $billingCountyState;
		$order['billingPostZipCode'] = $billingPostZipCode;
		$order['billingCountryCode'] = $billingCountryCode;
		$order['deliveryFirstName'] = $deliveryFirstName;
		$order['deliveryLastName'] = $deliveryLastName;
		$order['deliveryOrganisationName'] = $deliveryOrganisationName;
		$order['deliveryAddressLine1'] = $deliveryAddressLine1;
		$order['deliveryAddressLine2'] = $deliveryAddressLine2;
		$order['deliveryTownCity'] = $deliveryTownCity;
		$order['deliveryCountyState'] = $deliveryCountyState;
		$order['deliveryPostZipCode'] = $deliveryPostZipCode;
		$order['deliveryCountryCode'] = $deliveryCountryCode;
		$order['sameDeliveryAddress'] = $sameDeliveryAddress;
		$basket['delivery']['requestedDeliveryDate'] = $requestedDeliveryDate;
		$basket['delivery']['notes'] = $notes;
    	
    	// Check if delivery is to Republic of Ireland (IE)
    	if ($deliveryCountryCode == 'IE')
    	{
    		$order['billingFirstName'] = $deliveryFirstName;
    		$order['billingLastName'] = $deliveryLastName;
    		$order['billingOrganisationName'] = $deliveryOrganisationName;
    		$order['billingAddressLine1'] = $deliveryAddressLine1;
    		$order['billingAddressLine2'] = $deliveryAddressLine2;
    		$order['billingTownCity'] = $deliveryTownCity;
    		$order['billingCountyState'] = $deliveryCountyState;
    		$order['billingPostZipCode'] = $deliveryPostZipCode;
    		$order['billingCountryCode'] = $deliveryCountryCode;
    		$order['sameDeliveryAddress'] = 1;
    	}
		
		// Update the delivery options
		$basket = $this->get('session')->get('basket');
		$basket['delivery']['countryCode'] = $deliveryCountryCode;
		$basket['delivery']['postZipCode'] = $deliveryPostZipCode;
		$basket['delivery']['service'] = $deliveryOption;
		$order['deliveryType'] = $deliveryOption;
		$this->get('session')->set('basket', $basket);
		$basketService->updateBasketTotals();
		$basket = $this->get('session')->get('basket');
		
		// Save to the session
		$this->get('session')->set('order', $order);
    	
		// Process the order
		$orderService->processOrder();
		
		// Get the order
		$order = $this->get('session')->get('order');
					
		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order)), ENT_NOQUOTES));
    }
    
    // Get the order information
	public function ajaxGetOrderInformationAction(Request $request)
    {
		// Get the services
    	$basketService = $this->get('web_illumination_admin.basket_service');
    	
    	// Get the session
		$basket = $this->get('session')->get('basket');
		$order = $this->get('session')->get('order');
    	
		// Get submitted data
		$countryCode = ($request->query->get('countryCode')?$request->query->get('countryCode'):$basket['delivery']['countryCode']);
		$postZipCode = ($request->query->get('postZipCode')?$request->query->get('postZipCode'):$basket['delivery']['postZipCode']);
		$deliveryOption = ($request->query->get('deliveryOption')?$request->query->get('deliveryOption'):$basket['delivery']['service']);
		
		// Get the basket
		$basket = $this->get('session')->get('basket');
	   			
		// Update the delivery options
		$basket['delivery']['countryCode'] = $countryCode;
		$basket['delivery']['postZipCode'] = $postZipCode;
		$basket['delivery']['service'] = $deliveryOption;
		$order['deliveryType'] = $deliveryOption;
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
    	
    	// Get the basket
		$basket = $this->get('session')->get('basket');
			
		// Get the order
		$order = $this->get('session')->get('order');
    		
		return $this->render('WebIlluminationShopBundle:Checkout:ajaxGetOrderInformation.html.twig', array('basket' => $basket, 'order' => $order));
    }
    
    // Add notes
	public function ajaxAddNotesAction(Request $request)
    {
		// Get submitted data
		$requestedDeliveryDate = trim($request->request->get('requestedDeliveryDate'));
		$notes = trim($request->request->get('notes'));
		
		// Get the basket
		$basket = $this->get('session')->get('basket');
		
		// Update the details
		$basket['delivery']['requestedDeliveryDate'] = $requestedDeliveryDate;
		$basket['delivery']['notes'] = $notes;
		
		// Save to the session
		$this->get('session')->set('basket', $basket);
		
		// Get the services
    	$orderService = $this->get('web_illumination_admin.order_service');
    	
		// Process the order
		$orderService->processOrder();
		
		// Get the order
		$order = $this->get('session')->get('order');
								
		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order)), ENT_NOQUOTES));
    }
     
    // Order placed
	public function orderPlacedAction(Request $request, $paymentType)
    {
    	// Get the services
		$orderService = $this->get('web_illumination_admin.order_service');
		$systemService = $this->get('web_illumination_admin.system_service');
		
		// Initialise the session
	    $systemService->initialiseSession();
    	
    	// Get the entity manager
	   	$em = $this->getDoctrine()->getManager();
    	
    	// Get the session
    	$basketSession = $this->get('session')->get('basket');
    	$orderSession = $this->get('session')->get('order');
    	
    	// Get the order
    	$orderId = $orderSession['orderNumber'];
    	$orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($orderId);
    	if (!$orderObject)
    	{
    		// Set error message
		    $this->get('session')->getFlashBag()->add('error', 'Sorry, we could not find your order. Please contact us.');
		    
		    // Forward to the home page
		    return $this->redirect($this->get('router')->generate('shop_homepage'));
    	}
    	
    	// Update the payment type
    	switch ($paymentType)
    	{
	    	case 'sagePay':
	    		$paymentType = 'SagePay';
	    		break;
    	}
    	$orderObject->setPaymentType($paymentType);
    	$em->persist($orderObject);
    	$em->flush();
    	
    	// Get data from the payment processor
    	switch($paymentType)
    	{
    		case 'PayPal through SagePay':
    		case 'SagePay':
    			// Get the SagePay service
    			$sagePayService = $this->get('web_illumination_admin.sage_pay_service');
    			
    			// Get submitted data
		    	$crypt = urldecode($request->query->get('crypt'));
    			
    			// Decrypt the crypt
				$decodedDecryptedCrypt = $sagePayService->decodeAndDecrypt($crypt);
		    			
				// Get payment response
				$paymentResponse = $sagePayService->getPaymentResponse($decodedDecryptedCrypt);
				
				// Check the order was successful
				if ($paymentResponse['Status'] != 'SUCCESS')
				{
					// Forward to the order failed page
					return $this->redirect($this->get('router')->generate('checkout_order_failed', array('paymentType' => 'sagePay', 'crypt' => $crypt)));
				}
				
				// Check if the order is PayPal through SagePay
				if ($paymentResponse['CardType'] == 'PAYPAL')
				{
					$orderObject->setPaymentType('PayPal through SagePay');
				}
				$orderObject->setPaymentResponse(base64_encode(serialize($paymentResponse)));
				
    			break;
    	}
		
		// Save the payment response
		$orderObject->setStatus('Payment Received');
		$em->persist($orderObject);
    	$em->flush();
    	
		// Update the PDF documents
    	$orderService->generateOrderDocuments($orderId);
		
		// Reset the basket
		$basketSession['products'] = array();
		$basketSession['delivery']['deliveryOptions'] = array();
		$basketSession['delivery']['countryCode'] = 'GB';
		$basketSession['delivery']['service'] = '';
		$basketSession['delivery']['notes'] = '';
		$basketSession['delivery']['requestedDeliveryDate'] = '';
		$basketSession['totals']['items'] = 0;
		$basketSession['totals']['recommendedRetailPrice'] = 0;
		$basketSession['totals']['subTotal'] = 0;
		$basketSession['totals']['savings'] = 0;
		$basketSession['totals']['deliveryCharge'] = 0;
		$basketSession['totals']['discount'] = 0;
		$basketSession['totals']['vat'] = 0;
		$basketSession['totals']['total'] = 0;	
		$basketSession['possibleDiscount'] = 0;
		
		// Reset the order
		$orderSession['orderNumber'] = 0;
		$orderSession['payentType'] = '';
		$orderSession['paymentAttempt'] = 1;
		$orderSession['deliveryType'] = '';
		$orderSession['paymentProcess'] = array();
    	
    	// Update the session
    	$this->get('session')->set('basket', $basketSession);
    	$this->get('session')->set('order', $orderSession);
		
		// Get the order
		$order = $orderService->getOrder($orderId);
		
		// Send the invoice
		$this->sendInvoice($orderId);
		
    	return $this->render('WebIlluminationShopBundle:Checkout:orderPlaced.html.twig', array('order' => $order));
    }
    
    // Order failed
	public function orderFailedAction(Request $request, $paymentType)
    {	
    	// Get the services
		$orderService = $this->get('web_illumination_admin.order_service');
		$systemService = $this->get('web_illumination_admin.system_service');
		
		// Initialise the session
	    $systemService->initialiseSession();

        // Get the catalogue page history
        $departmentHistory = $this->get('session')->get('departmentHistory');
    	
    	// Get the entity manager
	   	$em = $this->getDoctrine()->getManager();
	   	
	   	// Get the session
    	$orderSession = $this->get('session')->get('order');
	   	
	   	// Get the order
    	$orderId = $orderSession['orderNumber'];
    	$orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($orderId);
    	if (!$orderObject)
    	{
    		// Set error message
		    $this->get('session')->getFlashBag()->add('error', 'Sorry, we could not find your order. Please contact us.');
		    
		    // Forward to the home page
		    return $this->redirect($this->get('router')->generate('shop_homepage'));
    	}
    	
    	// Update the payment type
    	switch ($paymentType)
    	{
	    	case 'sagePay':
	    		$paymentType = 'SagePay';
	    		break;
    	}
    	$orderObject->setPaymentType($paymentType);
    	$em->persist($orderObject);
    	$em->flush();
    	
    	// Get data from the payment processor
    	switch($paymentType)
    	{
    		case 'PayPal through SagePay':
    		case 'SagePay':
    			// Get the SagePay service
    			$sagePayService = $this->get('web_illumination_admin.sage_pay_service');
    			
    			// Get submitted data
		    	$crypt = urldecode($request->query->get('crypt'));
		    	
				// Decrypt the crypt
				$decodedDecryptedCrypt = $sagePayService->decodeAndDecrypt($crypt);
				    			
				// Get payment response
				$paymentResponse = $sagePayService->getPaymentResponse($decodedDecryptedCrypt);
				
				// Update the payment response
				$orderObject->setPaymentResponse(base64_encode(serialize($paymentResponse)));
				
    			break;
    	}
		
		// Save the payment response
		$orderObject->setStatus('Payment Failed');
		$em->persist($orderObject);
    	$em->flush();
    	
    	// Update the PDF documents
    	$orderService->generateOrderDocuments($orderId);
		   		
   		// Update the payment attempts
   		$orderSession['paymentAttempt'] = $orderSession['paymentAttempt'] + 1;
   		$orderSession['paymentType'] = $paymentType;
   		
		// Save to the session
    	$this->get('session')->set('order', $orderSession);
    	
    	// Process the order for repayment
		$orderService->processOrder();
		
		// Get the order
		$order = $orderService->getOrder($orderId);
		
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
		    return $this->redirect($this->get('router')->generate('page_request', array('url' => $departmentHistory[0])));
   		}
    	
        return $this->render('WebIlluminationShopBundle:Checkout:index.html.twig', array('order' => $orderSession, 'orderObject' => $orderObject, 'basket' => $basket, 'backUrl' => $backUrl));
    }
    
    // Send the invoice
    public function sendInvoice($id)
    {
    	// Get the services
		$orderService = $this->get('web_illumination_admin.order_service');
		
    	// Get the order
    	$order = $orderService->getOrder($id);
    	
    	// Send the email
		try
		{
			$attachment = __DIR__.'/../../../../web/uploads/documents/order/invoice-'.$id.'.pdf';
			$email = \Swift_Message::newInstance();
        	$email->setSubject('Your Order with Kitchen Appliance Centre: '.$order['orderNumber']);
        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
        	$email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
        	$email->setBody($this->renderView('WebIlluminationShopBundle:Checkout:invoice.html.twig', array('order' => $order)), 'text/html');
			$email->addPart($this->renderView('WebIlluminationShopBundle:Checkout:invoice.txt.twig', array('order' => $order)), 'text/plain');
			if (file_exists($attachment))
			{
				$email->attach(\Swift_Attachment::fromPath($attachment)->setFilename('kitchen-appliance-centre-invoice-'.$id.'.pdf'));
			}
    		$this->get('mailer')->send($email);
    		return true;
		} catch (Exception $exception) {
			error_log('Error sending invoice email!');
	    	return false;
		}
		
		return false;
    }
}