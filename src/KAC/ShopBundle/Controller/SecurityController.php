<?php
namespace KAC\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use KAC\AdminBundle\Entity\UserKey;

class SecurityController extends Controller
{
	// The secure login
	public function loginAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Set the data
	    $data = array();
	    $data['referer'] = $request->headers->get('referer');
    	
        return $this->render('KACShopBundle:Security:login.html.twig', array('data' => $data));
    }
    
    // Login
	public function ajaxLoginAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
    		$password  = trim($request->request->get('password'));
    		$referer = $request->request->get('referer');
    		
    		// Get the services
    		$contactService = $this->get('kac_admin.contact_service');
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getManager();
    				
			// Get the user
			$userObject = $em->getRepository('KACAdminBundle:User')->findOneBy(array('emailAddress' => $emailAddress, 'active' => 1));
			if (!$userObject)
			{
				return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'The email address you entered could not be found. Please try again.')), ENT_NOQUOTES));
			}
	    	
	    	// Get the encoder factory
		   	$encoderFactory = $this->get('security.encoder_factory');
		   	$encoder = $encoderFactory->getEncoder($userObject);
		  	
		  	// Generate the password to check
		  	$passwordToCheck = $encoder->encodePassword($password, $userObject->getSalt());
		  	if ($passwordToCheck != $userObject->getPassword())
		  	{
		  		return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'The password you entered is incorrect.')), ENT_NOQUOTES));
		  	}
		  	
		  	// Authenticate the user
    		$token = new UsernamePasswordToken($userObject, null, 'shop', array('ROLE_CUSTOMER'));
			$this->get('security.context')->setToken($token);
			$this->get('session')->set('_security_'.'shop', serialize($token));
	    	
	    	// Setup the session
			$customer = array();
			
			$user = array();
			$user['id'] = $userObject->getId();
			$user['contactId'] = $userObject->getContactId();
			$user['emailAddress'] = $userObject->getEmailAddress();
			$user['lastLoggedIn'] = $userObject->getLastLoggedIn();
			$customer['user'] = $user;
			
			$contact = $contactService->getContact($userObject->getContactId());
			if ($contact)
			{
				$customer['contact'] = $contact;
			}
    		
    		// Get the session
    		$order = $this->get('session')->get('order');
    		$basket = $this->get('session')->get('basket');
    		
    		// Update the user id
    		$order['userId'] = $userObject->getId();
    		
    		// Check if the user has a membership card and apply it
    		$membershipCardObject = $em->getRepository('KACAdminBundle:MembershipCard')->findOneBy(array('userId' => $userObject->getId()));
    		if ($membershipCardObject)
    		{
    			$basket['membershipCardNumber'] = $membershipCardObject->getMembershipNumber();
    		} else {
    			if ($basket['membershipCardNumber'] != 1)
    			{
    				$basket['membershipCardNumber'] = 0;
    			}
    		}
    		
    		if ($contact)
    		{
	    		// Update the order with the detail
	    		if ($contact['firstName'] != '')
	    		{
	    			$order['firstName'] = $contact['firstName'];
	    		}
	    		if ($contact['lastName'] != '')
	    		{
	    			$order['lastName'] = $contact['lastName'];
	    		}
	    		$order['emailAddress'] = $user['emailAddress'];
	    		$telephoneDaytimeObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '5'), array('displayOrder' => 'ASC'));
	    		if ($telephoneDaytimeObject)
	    		{
	    			$order['telephoneDaytime'] = $telephoneDaytimeObject->getNumber();
	    		}
	    		$telephoneEveningObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '6'), array('displayOrder' => 'ASC'));
	    		if ($telephoneEveningObject)
	    		{
	    			$order['telephoneEvening'] = $telephoneEveningObject->getNumber();
	    		}
	    		$mobileObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '2'), array('displayOrder' => 'ASC'));
	    		if ($mobileObject)
	    		{
	    			$order['mobile'] = $mobileObject->getNumber();
	    		}
	    		$billingAddressObject = $em->getRepository('KACAdminBundle:ContactAddress')->findOneBy(array('contactId' => $contact['id'], 'contactAddressTypeId' => '4'), array('displayOrder' => 'ASC'));
	    		if ($billingAddressObject)
	    		{
	    			$order['billingFirstName'] = $billingAddressObject->getFirstName();
		    		$order['billingLastName'] = $billingAddressObject->getLastName();
		    		$order['billingOrganisationName'] = $billingAddressObject->getOrganisationName();
		    		$order['billingAddressLine1'] = $billingAddressObject->getAddressLine1();
		    		$order['billingAddressLine2'] = $billingAddressObject->getAddressLine2();
		    		$order['billingTownCity'] = $billingAddressObject->getTownCity();
		    		$order['billingCountyState'] = $billingAddressObject->getCountyState();
		    		$order['billingPostZipCode'] = $billingAddressObject->getPostZipCode();
		    		$order['billingCountryCode'] = $billingAddressObject->getCountryCode();
	    		}
	    		$deliveryAddressObject = $em->getRepository('KACAdminBundle:ContactAddress')->findOneBy(array('contactId' => $contact['id'], 'contactAddressTypeId' => '5'), array('displayOrder' => 'ASC'));
	    		if ($deliveryAddressObject)
	    		{
	    			$order['deliveryFirstName'] = $deliveryAddressObject->getFirstName();
		    		$order['deliveryLastName'] = $deliveryAddressObject->getLastName();
		    		$order['deliveryOrganisationName'] = $deliveryAddressObject->getOrganisationName();
		    		$order['deliveryAddressLine1'] = $deliveryAddressObject->getAddressLine1();
		    		$order['deliveryAddressLine2'] = $deliveryAddressObject->getAddressLine2();
		    		$order['deliveryTownCity'] = $deliveryAddressObject->getTownCity();
		    		$order['deliveryCountyState'] = $deliveryAddressObject->getCountyState();
		    		$order['deliveryPostZipCode'] = $deliveryAddressObject->getPostZipCode();
		    		$order['deliveryCountryCode'] = $deliveryAddressObject->getCountryCode();
		    		$basket['delivery']['postZipCode'] = $deliveryAddressObject->getPostZipCode();
		    		$basket['delivery']['countryCode'] = $deliveryAddressObject->getCountryCode();
	    		}
	    		if (($order['billingPostZipCode'] != '') && ($order['billingPostZipCode'] == $order['deliveryPostZipCode']))
	    		{
	    			$order['sameDeliveryAddress'] = 1;
	    		}
	    	}
    		    		    		
	    	// Save to the session
    		$this->get('session')->set('order', $order);
    		$this->get('session')->set('basket', $basket);
    		$this->get('session')->set('customer', $customer);
    		
    		// Check if there is a referer
    		if ($referer)
    		{
    			// Set success message
		    	$this->get('session')->getFlashBag()->add('success', 'Welcome back '.$contact['firstName'].'! You have successfully logged in.');
		    }
    		        		
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order, 'referer' => $referer)), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Forgotten your password
	public function ajaxForgottenYourPasswordAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
    		
    		// Get the services
    		$contactService = $this->get('kac_admin.contact_service');
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getManager();
    				
			// Get the user
			$userObject = $em->getRepository('KACAdminBundle:User')->findOneBy(array('emailAddress' => $emailAddress, 'active' => 1));
			if (!$userObject)
			{
				return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'The email address you entered could not be found. Please try again.')), ENT_NOQUOTES));
			}
			
			// Get the contact
			$contact = $contactService->getContact($userObject->getContactId());
			
			// Generate the user key
			$userKey = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
			$passwordResetLink = $this->get('router')->generate('security_reset_password', array('userKey' => $userKey), true);
			
			// Create the user key object
    		$userKeyObject = new UserKey();
	    	$userKeyObject->setUserId($userObject->getId());
	    	$userKeyObject->setUserKey($userKey);
	    	$em->persist($userKeyObject);
	    	$em->flush();
			
			// Send the reset password link
    		try
			{
				$email = \Swift_Message::newInstance();
	        	$email->setSubject('Kitchen Appliance Centre Password Assistance');
	        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre - Sales Team'));
	        	$email->setTo(array($userObject->getEmailAddress() => $contact['firstName'].' '.$contact['lastName']));
	        	$email->setBody($this->renderView('KACShopBundle:Security:resetPasswordEmail.html.twig', array('passwordResetLink' => $passwordResetLink)), 'text/html');
				$email->addPart($this->renderView('KACShopBundle:Security:resetPasswordEmail.txt.twig', array('passwordResetLink' => $passwordResetLink)), 'text/plain');
	    		$this->get('mailer')->send($email);
			} catch (Exception $exception) {
				return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'Sorry, there was a problem sending the email to you. Please try again.')), ENT_NOQUOTES));
			}
			
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Register page
	public function registerAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('kac_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	    	
        return $this->render('KACShopBundle:Security:register.html.twig', array());
    }
    
    // Logout
    public function logoutAction(Request $request)
    {	
    	// Get the services
    	$orderService = $this->get('kac_admin.order_service');
    	
    	// Log out the user
		$this->get("request")->getSession()->invalidate();
		$this->get("security.context")->setToken(null);
		
		// Reset the order session
		$orderService->resetOrderSession();
				
		// Set success message
	    $this->get('session')->getFlashBag()->add('success', 'You have been safely and securely logged out.');
	    
    	return $this->redirect($this->get('router')->generate('shop_homepage'));
    }
    
    // Reset Password
    public function resetPasswordAction($userKey, Request $request)
    {	
    	// Get the entity manager
		$em = $this->getDoctrine()->getManager();
		   	
    	// Create the user key object
		$userKeyObject = $em->getRepository('KACAdminBundle:UserKey')->findOneBy(array('userKey' => $userKey));
		if ($userKeyObject)
		{
			if ($userKeyObject->getExpiry()->getTimestamp() >= strtotime(date("Y-m-d H:i:s")))
			{
				// Get the services
	    		$contactService = $this->get('kac_admin.contact_service');
	    		
				// Get the user
				$userObject = $em->getRepository('KACAdminBundle:User')->findOneBy(array('id' => $userKeyObject->getUserId(), 'active' => 1));
				if ($userObject)
				{				  	
				  	// Authenticate the user
		    		$token = new UsernamePasswordToken($userObject, null, 'shop', array('ROLE_CUSTOMER'));
					$this->get('security.context')->setToken($token);
					$this->get('session')->set('_security_'.'shop', serialize($token));
			    	
			    	// Setup the session
					$customer = array();
					
					$user = array();
					$user['id'] = $userObject->getId();
					$user['contactId'] = $userObject->getContactId();
					$user['emailAddress'] = $userObject->getEmailAddress();
					$user['lastLoggedIn'] = $userObject->getLastLoggedIn();
					$customer['user'] = $user;
					
					$contact = $contactService->getContact($userObject->getContactId());
					$customer['contact'] = $contact;
		    		
		    		// Get the session
		    		$order = $this->get('session')->get('order');
		    		$basket = $this->get('session')->get('basket');
		    		
		    		// Update the user id
		    		$order['userId'] = $userObject->getId();
		    		
		    		// Check if the user has a membership card and apply it
		    		$membershipCardObject = $em->getRepository('KACAdminBundle:MembershipCard')->findOneBy(array('userId' => $userObject->getId()));
		    		if ($membershipCardObject)
		    		{
		    			$basket['membershipCardNumber'] = $membershipCardObject->getMembershipNumber();
		    		} else {
		    			if ($basket['membershipCardNumber'] != 1)
		    			{
		    				$basket['membershipCardNumber'] = 0;
		    			}
		    		}
		    		
		    		// Update the order with the detail
		    		if ($contact['firstName'] != '')
		    		{
		    			$order['firstName'] = $contact['firstName'];
		    		}
		    		if ($contact['lastName'] != '')
		    		{
		    			$order['lastName'] = $contact['lastName'];
		    		}
		    		$order['emailAddress'] = $user['emailAddress'];
		    		$telephoneDaytimeObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '5'), array('displayOrder' => 'ASC'));
		    		if ($telephoneDaytimeObject)
		    		{
		    			$order['telephoneDaytime'] = $telephoneDaytimeObject->getNumber();
		    		}
		    		$telephoneEveningObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '6'), array('displayOrder' => 'ASC'));
		    		if ($telephoneEveningObject)
		    		{
		    			$order['telephoneEvening'] = $telephoneEveningObject->getNumber();
		    		}
		    		$mobileObject = $em->getRepository('KACAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contact['id'], 'contactNumberTypeId' => '2'), array('displayOrder' => 'ASC'));
		    		if ($mobileObject)
		    		{
		    			$order['mobile'] = $mobileObject->getNumber();
		    		}
		    		$billingAddressObject = $em->getRepository('KACAdminBundle:ContactAddress')->findOneBy(array('contactId' => $contact['id'], 'contactAddressTypeId' => '4'), array('displayOrder' => 'ASC'));
		    		if ($billingAddressObject)
		    		{
		    			$order['billingFirstName'] = $billingAddressObject->getFirstName();
			    		$order['billingLastName'] = $billingAddressObject->getLastName();
			    		$order['billingOrganisationName'] = $billingAddressObject->getOrganisationName();
			    		$order['billingAddressLine1'] = $billingAddressObject->getAddressLine1();
			    		$order['billingAddressLine2'] = $billingAddressObject->getAddressLine2();
			    		$order['billingTownCity'] = $billingAddressObject->getTownCity();
			    		$order['billingCountyState'] = $billingAddressObject->getCountyState();
			    		$order['billingPostZipCode'] = $billingAddressObject->getPostZipCode();
			    		$order['billingCountryCode'] = $billingAddressObject->getCountryCode();
		    		}
		    		$deliveryAddressObject = $em->getRepository('KACAdminBundle:ContactAddress')->findOneBy(array('contactId' => $contact['id'], 'contactAddressTypeId' => '5'), array('displayOrder' => 'ASC'));
		    		if ($deliveryAddressObject)
		    		{
		    			$order['deliveryFirstName'] = $deliveryAddressObject->getFirstName();
			    		$order['deliveryLastName'] = $deliveryAddressObject->getLastName();
			    		$order['deliveryOrganisationName'] = $deliveryAddressObject->getOrganisationName();
			    		$order['deliveryAddressLine1'] = $deliveryAddressObject->getAddressLine1();
			    		$order['deliveryAddressLine2'] = $deliveryAddressObject->getAddressLine2();
			    		$order['deliveryTownCity'] = $deliveryAddressObject->getTownCity();
			    		$order['deliveryCountyState'] = $deliveryAddressObject->getCountyState();
			    		$order['deliveryPostZipCode'] = $deliveryAddressObject->getPostZipCode();
			    		$order['deliveryCountryCode'] = $deliveryAddressObject->getCountryCode();
		    		}
		    		if (($order['billingPostZipCode'] != '') && ($order['billingPostZipCode'] == $order['deliveryPostZipCode']))
		    		{
		    			$order['sameDeliveryAddress'] = 1;
		    		}
		    		    		    		
			    	// Save to the session
		    		$this->get('session')->set('order', $order);
		    		$this->get('session')->set('basket', $basket);
		    		$this->get('session')->set('customer', $customer);
		    		
		    		// Set success message
				    $this->get('session')->getFlashBag()->add('success', 'You have now been temporarily logged in. Please take this opportunity to change your password to something memorable.');
				    
			    	return $this->redirect($this->get('router')->generate('users_user'));
		    	}
			}
		}
		
		// Set error message
	    $this->get('session')->getFlashBag()->add('error', 'The reset password link you followed was invalid or has expired. Please try again.');
	    
    	return $this->redirect($this->get('router')->generate('security_login'));
    }
}