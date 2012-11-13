<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\User;
use WebIllumination\AdminBundle\Entity\Contact;
use WebIllumination\AdminBundle\Entity\ContactNumber;
use WebIllumination\AdminBundle\Entity\ContactAddress;
use WebIllumination\AdminBundle\Entity\ContactEmailAddress;

class UsersController extends Controller
{
	
	// Register page
	public function registerAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		
        return $this->render('WebIlluminationShopBundle:Users:register.html.twig');
    }
    
    // Check email address
	public function ajaxCheckEmailAddressAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
	
			// Check to see if the email address has a user account assigned to it 
			$userAccountExists = false;
			$userObject = $em->getRepository('WebIlluminationAdminBundle:User')->findOneBy(array('emailAddress' => $emailAddress));
			if ($userObject)
			{
				$userAccountExists = true;
			}
        		
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'userAccountExists' => $userAccountExists)), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Create user
	public function ajaxCreateUserAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
    		$contactService = $this->get('web_illumination_admin.contact_service');
    		
    		// Get submitted data
    		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
    		$password  = trim($request->request->get('password'));
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
    		
    		// Create new user
    		$userObject = new User();
	    	$userObject->setContactId(0);
	    	$userObject->setEmailAddress($emailAddress);
	    	$userObject->setSalt(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36));
	    	$userObject->setPassword('');
	    	$userObject->setActive(1);
	    	$em->persist($userObject);
	    	$em->flush();
	    	
	    	// Get the encoder factory
		   	$encoderFactory = $this->get('security.encoder_factory');
		   	
		  	// Generate the password to check
		  	$encoder = $encoderFactory->getEncoder($userObject);  
		  	
	    	// Setup password
	    	$userObject->setPassword($encoder->encodePassword($password, $userObject->getSalt()));
	    	$em->persist($userObject);
	    	$em->flush();
	    	
	    	// Authenticate the user
    		$token = new UsernamePasswordToken($userObject, null, 'shop', array('ROLE_CUSTOMER'));
			$this->get('security.context')->setToken($token);
			$this->get('session')->set('_security_'.'shop', serialize($token));
			
			// Create the contact object
			$contactObject = new Contact();
			$contactObject->setObjectId($userObject->getId());
			$contactObject->setObjectType('customer');
			$contactObject->setDisplayOrder(1);
			$contactObject->setContactTitleId(0);
			$contactObject->setOrganisationName('');
			$contactObject->setMiddleName('');
    		$contactObject->setDisplayName('');
    		$contactObject->setFirstName('');
    		$contactObject->setLastName('');
    		$contactObject->setOrganisationName('');
    		$em->persist($contactObject);
	    	$em->flush();
	    	
	    	// Update the user object
	    	$userObject->setContactId($contactObject->getId());
	    	$em->persist($userObject);
	    	$em->flush();
		    				
			// Create the email address object
			$contactEmailAddressObject = new ContactEmailAddress();
	    	$contactEmailAddressObject->setContactEmailAddressTypeId(5);
	    	$contactEmailAddressObject->setContactId($contactObject->getId());
	    	$contactEmailAddressObject->setDisplayOrder(1);
	    	$contactEmailAddressObject->setDisplayName('');
	    	$contactEmailAddressObject->setEmail('');
	    	$em->persist($contactEmailAddressObject);
	    	$em->flush();
			
			// Create the telephone daytime object
			$telephoneDaytimeObject = new ContactNumber();
			$telephoneDaytimeObject->setContactNumberTypeId(5);
			$telephoneDaytimeObject->setContactId($contactObject->getId());
			$telephoneDaytimeObject->setDisplayOrder(1);
			$telephoneDaytimeObject->setCountryCode('');
    		$telephoneDaytimeObject->setDisplayName('');
    		$telephoneDaytimeObject->setNumber('');
    		$em->persist($telephoneDaytimeObject);
	    	$em->flush();
	    	
	    	// Create the telephone evening object
			$telephoneEveningObject = new ContactNumber();
			$telephoneEveningObject->setContactNumberTypeId(6);
			$telephoneEveningObject->setContactId($contactObject->getId());
			$telephoneEveningObject->setDisplayOrder(1);
			$telephoneEveningObject->setCountryCode('');
    		$telephoneEveningObject->setDisplayName('');
    		$telephoneEveningObject->setNumber('');
    		$em->persist($telephoneEveningObject);
	    	$em->flush();
	    	
	    	// Create the mobile object
			$mobileObject = new ContactNumber();
			$mobileObject->setContactNumberTypeId(2);
			$mobileObject->setContactId($contactObject->getId());
			$mobileObject->setDisplayOrder(1);
			$mobileObject->setCountryCode('');
    		$mobileObject->setDisplayName('');
    		$mobileObject->setNumber('');
    		$em->persist($mobileObject);
	    	$em->flush();
	    	
	    	// Create the billing address object
			$billingAddressObject = new ContactAddress();
			$billingAddressObject->setContactAddressTypeId(4);
			$billingAddressObject->setContactId($contactObject->getId());
			$billingAddressObject->setDisplayOrder(1);
			$billingAddressObject->setContactTitleId(0);
			$billingAddressObject->setMiddleName('');
			$billingAddressObject->setAddressLine3('');
    		$billingAddressObject->setDisplayName('');
    		$billingAddressObject->setFirstName('');
    		$billingAddressObject->setLastName('');
    		$billingAddressObject->setOrganisationName('');
    		$billingAddressObject->setAddressLine1('');
    		$billingAddressObject->setAddressLine2('');
    		$billingAddressObject->setTownCity('');
    		$billingAddressObject->setCountyState('');
    		$billingAddressObject->setPostZipCode('');
    		$billingAddressObject->setCountryCode('GB');
    		$em->persist($billingAddressObject);
	    	$em->flush();
	    	
	    	// Create the delivery address object
			$deliveryAddressObject = new ContactAddress();
			$deliveryAddressObject->setContactAddressTypeId(5);
			$deliveryAddressObject->setContactId($contactObject->getId());
			$deliveryAddressObject->setDisplayOrder(1);
			$deliveryAddressObject->setContactTitleId(0);
			$deliveryAddressObject->setMiddleName('');
			$deliveryAddressObject->setAddressLine3('');
    		$deliveryAddressObject->setDisplayName('');
    		$deliveryAddressObject->setFirstName('');
    		$deliveryAddressObject->setLastName('');
    		$deliveryAddressObject->setOrganisationName('');
    		$deliveryAddressObject->setAddressLine1('');
    		$deliveryAddressObject->setAddressLine2('');
    		$deliveryAddressObject->setTownCity('');
    		$deliveryAddressObject->setCountyState('');
    		$deliveryAddressObject->setPostZipCode('');
    		$deliveryAddressObject->setCountryCode('GB');
    		$em->persist($deliveryAddressObject);
	    	$em->flush();
	    		    	
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
			
    		// Update the user id
    		$order['userId'] = $userObject->getId();
	    	
	    	// Save to the session
    		$this->get('session')->set('order', $order);
    		$this->get('session')->set('customer', $customer);
	    	
	    	// Set success message
	    	$this->get('session')->getFlashBag()->add('success', 'Welcome to Kitchen Appliance Centre! You have successfully created an account.');
    		        		
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'order' => $order)), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
    
    // User page
	public function userAction(Request $request)
    {
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		   	
    	// Check the user is logged in
    	if (!$this->get('session')->get('customer')) {
	        // Set error message
		   	$this->get('session')->getFlashBag()->add('error', 'You need to login before you can access this page.');
		
	    	return $this->redirect($this->get('router')->generate('security_login'));
    	}
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
    	// Get the customer
    	$customer = $this->get('session')->get('customer');
    	
    	// Get any orders
    	$orders = $em->getRepository('WebIlluminationAdminBundle:Order')->findBy(array('emailAddress' => $customer['contact']['contactEmailAddresses'][0]['email']), array('id' => 'DESC'));
    	
        return $this->render('WebIlluminationShopBundle:Users:user.html.twig', array('customer' => $customer, 'orders' => $orders));
    }
    
    // Save user
	public function ajaxSaveUserAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
		   	
		   	// Get the services
    		$contactService = $this->get('web_illumination_admin.contact_service');
		   	
    		// Get submitted data
    		$firstName = ucwords(trim($request->request->get('firstName')));
    		$lastName = ucwords(trim($request->request->get('lastName')));
    		$organisationName = ucwords(trim($request->request->get('organisationName')));
    		$telephoneDaytime = trim($request->request->get('telephoneDaytime'));
    		$telephoneEvening = trim($request->request->get('telephoneEvening'));
    		$mobile = trim($request->request->get('mobile'));
    		$emailAddress = strtolower(trim($request->request->get('emailAddress')));
    		$password = trim($request->request->get('password'));
    		
    		// Get the session
    		$order = $this->get('session')->get('order');
    		$customer = $this->get('session')->get('customer');
    		
    		// Update the order details
    		$order['firstName'] = $firstName;
    		$order['lastName'] = $lastName;
    		$order['organisationName'] = $organisationName;
    		$order['telephoneDaytime'] = $telephoneDaytime;
    		$order['telephoneEvening'] = $telephoneEvening;
    		$order['mobile'] = $mobile;
    		$order['emailAddress'] = $emailAddress;
    		
    		// Update the contact object
    		if ($customer['user']['contactId'] > 0)
    		{
    			$contactObject = $em->getRepository('WebIlluminationAdminBundle:Contact')->find($customer['user']['contactId']);
    		} else {
    			$contactObject = new Contact();
    			$contactObject->setObjectId($customer['user']['id']);
    			$contactObject->setObjectType('customer');
    			$contactObject->setDisplayOrder(1);
    			$contactObject->setContactTitleId(0);
    			$contactObject->setOrganisationName('');
    			$contactObject->setMiddleName('');
    		}
    		$displayName = '';
    		if ($organisationName)
    		{
    			$displayName = $organisationName;
    			if ($firstName || $lastName)
    			{
    				$displayName .= ' ('.trim($firstName.' '.$lastName).')';
    			}
    		} else {
    			if ($firstName || $lastName)
    			{
    				$displayName = trim($firstName.' '.$lastName);
    			}
    		}
    		$contactObject->setDisplayName($displayName);
    		$contactObject->setFirstName($firstName);
    		$contactObject->setLastName($lastName);
    		$contactObject->setOrganisationName($organisationName);
    		$em->persist($contactObject);
	    	$em->flush();
		    	
			// Update the user
			$customer['user']['contactId'] = $contactObject->getId();
			$userObject = $em->getRepository('WebIlluminationAdminBundle:User')->find($customer['user']['id']);
			if ($userObject)
			{
				$userObject->setContactId($contactObject->getId());
				$userObject->setEmailAddress($emailAddress);
				$em->persist($userObject);
	    		$em->flush();
		    	
		    	// Update the password
		    	if ($password)
		    	{
			    	// Get the encoder factory
				   	$encoderFactory = $this->get('security.encoder_factory');
				   	
				  	// Generate the password to check
				  	$encoder = $encoderFactory->getEncoder($userObject);  
				  	
			    	// Setup password
			    	$userObject->setPassword($encoder->encodePassword($password, $userObject->getSalt()));
			    	$em->persist($userObject);
			    	$em->flush();
			    }
			}
			
			// Update the email address object
			$contactEmailAddressObject = $em->getRepository('WebIlluminationAdminBundle:ContactEmailAddress')->findOneBy(array('contactId' => $contactObject->getId(), 'contactEmailAddressTypeId' => '5'), array('displayOrder' => 'ASC'));
			if (!$contactEmailAddressObject)
    		{
    			$contactEmailAddressObject = new ContactEmailAddress();
		    	$contactEmailAddressObject->setContactEmailAddressTypeId(5);
		    	$contactEmailAddressObject->setContactId($contactObject->getId());
		    	$contactEmailAddressObject->setDisplayOrder(1);
    		}
	    	$contactEmailAddressObject->setDisplayName($emailAddress);
	    	$contactEmailAddressObject->setEmail($emailAddress);
	    	$em->persist($contactEmailAddressObject);
	    	$em->flush();
			
			// Update the telephone daytime object
			$telephoneDaytimeObject = $em->getRepository('WebIlluminationAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contactObject->getId(), 'contactNumberTypeId' => '5'), array('displayOrder' => 'ASC'));
    		if (!$telephoneDaytimeObject)
    		{
    			$telephoneDaytimeObject = new ContactNumber();
    			$telephoneDaytimeObject->setContactNumberTypeId(5);
    			$telephoneDaytimeObject->setContactId($contactObject->getId());
    			$telephoneDaytimeObject->setDisplayOrder(1);
    			$telephoneDaytimeObject->setCountryCode('');
    		}
    		$telephoneDaytimeObject->setDisplayName($telephoneDaytime);
    		$telephoneDaytimeObject->setNumber($telephoneDaytime);
    		$em->persist($telephoneDaytimeObject);
	    	$em->flush();
	    	
	    	// Update the telephone evening object
			$telephoneEveningObject = $em->getRepository('WebIlluminationAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contactObject->getId(), 'contactNumberTypeId' => '6'), array('displayOrder' => 'ASC'));
    		if (!$telephoneEveningObject)
    		{
    			$telephoneEveningObject = new ContactNumber();
    			$telephoneEveningObject->setContactNumberTypeId(6);
    			$telephoneEveningObject->setContactId($contactObject->getId());
    			$telephoneEveningObject->setDisplayOrder(1);
    			$telephoneEveningObject->setCountryCode('');
    		}
    		$telephoneEveningObject->setDisplayName($telephoneEvening);
    		$telephoneEveningObject->setNumber($telephoneEvening);
    		$em->persist($telephoneEveningObject);
	    	$em->flush();
	    	
	    	// Update the mobile object
			$mobileObject = $em->getRepository('WebIlluminationAdminBundle:ContactNumber')->findOneBy(array('contactId' => $contactObject->getId(), 'contactNumberTypeId' => '2'), array('displayOrder' => 'ASC'));
    		if (!$mobileObject)
    		{
    			$mobileObject = new ContactNumber();
    			$mobileObject->setContactNumberTypeId(2);
    			$mobileObject->setContactId($contactObject->getId());
    			$mobileObject->setDisplayOrder(1);
    			$mobileObject->setCountryCode('');
    		}
    		$mobileObject->setDisplayName($mobile);
    		$mobileObject->setNumber($mobile);
    		$em->persist($mobileObject);
	    	$em->flush();
	    	    		    		
    		// Save to the session
    		$this->get('session')->set('order', $order);
    		$contact = $contactService->getContact($contactObject->getId());
			$customer['contact'] = $contact;
    		$this->get('session')->set('customer', $customer);
        		
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Save contact addresses
	public function ajaxSaveContactAddressesAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
		   	
		   	// Get the services
    		$contactService = $this->get('web_illumination_admin.contact_service');
		   	
		   	// Get the session
    		$order = $this->get('session')->get('order');
			
    		// Get the submitted data
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
    		
    		// Get the session
    		$order = $this->get('session')->get('order');
    		$customer = $this->get('session')->get('customer');
    		
    		// Update the details
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
    		
    		// Get the contact object
    		if ($customer['user']['contactId'] > 0)
    		{
    			$contactObject = $em->getRepository('WebIlluminationAdminBundle:Contact')->find($customer['user']['contactId']);
    		} else {
    			$contactObject = new Contact();
    			$contactObject->setObjectId($customer['user']['id']);
    			$contactObject->setObjectType('customer');
    			$contactObject->setDisplayOrder(1);
    			$contactObject->setContactTitleId(0);
    			$contactObject->setOrganisationName('');
    			$contactObject->setMiddleName('');
    			$contactObject->setDisplayName('');
	    		$contactObject->setFirstName('');
	    		$contactObject->setLastName('');
	    		$contactObject->setOrganisationName('');
	    		$em->persist($contactObject);
		    	$em->flush();
		    	
		    	// Update the user
				$customer['user']['contactId'] = $contactObject->getId();
				$userObject = $em->getRepository('WebIlluminationAdminBundle:User')->find($customer['user']['id']);
				if ($userObject)
				{
					$userObject->setContactId($contactObject->getId());
					$em->persist($userObject);
		    		$em->flush();
				}
    		}
    		
    		// Update the billing address object
			$billingAddressObject = $em->getRepository('WebIlluminationAdminBundle:ContactAddress')->findOneBy(array('contactId' => $customer['user']['contactId'], 'contactAddressTypeId' => '4'), array('displayOrder' => 'ASC'));
    		if (!$billingAddressObject)
    		{
    			$billingAddressObject = new ContactAddress();
    			$billingAddressObject->setContactAddressTypeId(4);
    			$billingAddressObject->setContactId($customer['user']['contactId']);
    			$billingAddressObject->setDisplayOrder(1);
    			$billingAddressObject->setContactTitleId(0);
    			$billingAddressObject->setMiddleName('');
    			$billingAddressObject->setAddressLine3('');
    		}
    		$billingDisplayName = '';
    		if ($billingOrganisationName)
    		{
    			$billingDisplayName = $billingOrganisationName;
    			if ($billingFirstName || $billingLastName)
    			{
    				$billingDisplayName .= ' ('.trim($billingFirstName.' '.$billingLastName).')';
    			}
    		} else {
    			if ($billingFirstName || $billingLastName)
    			{
    				$billingDisplayName = trim($billingFirstName.' '.$billingLastName);
    			}
    		}
    		$billingAddressObject->setDisplayName($billingDisplayName);
    		$billingAddressObject->setFirstName($billingFirstName);
    		$billingAddressObject->setLastName($billingLastName);
    		$billingAddressObject->setOrganisationName($billingOrganisationName);
    		$billingAddressObject->setAddressLine1($billingAddressLine1);
    		$billingAddressObject->setAddressLine2($billingAddressLine2);
    		$billingAddressObject->setTownCity($billingTownCity);
    		$billingAddressObject->setCountyState($billingCountyState);
    		$billingAddressObject->setPostZipCode($billingPostZipCode);
    		$billingAddressObject->setCountryCode($billingCountryCode);
    		$em->persist($billingAddressObject);
	    	$em->flush();
	    	
	    	// Update the delivery address object
			$deliveryAddressObject = $em->getRepository('WebIlluminationAdminBundle:ContactAddress')->findOneBy(array('contactId' => $customer['user']['contactId'], 'contactAddressTypeId' => '5'), array('displayOrder' => 'ASC'));
    		if (!$deliveryAddressObject)
    		{
    			$deliveryAddressObject = new ContactAddress();
    			$deliveryAddressObject->setContactAddressTypeId(5);
    			$deliveryAddressObject->setContactId($customer['user']['contactId']);
    			$deliveryAddressObject->setDisplayOrder(1);
    			$deliveryAddressObject->setContactTitleId(0);
    			$deliveryAddressObject->setMiddleName('');
    			$deliveryAddressObject->setAddressLine3('');
    		}
    		$deliveryDisplayName = '';
    		if ($deliveryOrganisationName)
    		{
    			$deliveryDisplayName = $deliveryOrganisationName;
    			if ($deliveryFirstName || $deliveryLastName)
    			{
    				$deliveryDisplayName .= ' ('.trim($deliveryFirstName.' '.$deliveryLastName).')';
    			}
    		} else {
    			if ($deliveryFirstName || $billingLastName)
    			{
    				$deliveryDisplayName = trim($deliveryFirstName.' '.$deliveryLastName);
    			}
    		}
    		$deliveryAddressObject->setDisplayName($deliveryDisplayName);
    		$deliveryAddressObject->setFirstName($deliveryFirstName);
    		$deliveryAddressObject->setLastName($deliveryLastName);
    		$deliveryAddressObject->setOrganisationName($deliveryOrganisationName);
    		$deliveryAddressObject->setAddressLine1($deliveryAddressLine1);
    		$deliveryAddressObject->setAddressLine2($deliveryAddressLine2);
    		$deliveryAddressObject->setTownCity($deliveryTownCity);
    		$deliveryAddressObject->setCountyState($deliveryCountyState);
    		$deliveryAddressObject->setPostZipCode($deliveryPostZipCode);
    		$deliveryAddressObject->setCountryCode($deliveryCountryCode);
    		$em->persist($deliveryAddressObject);
	    	$em->flush();
    		    		    		
    		// Save to the session
    		$this->get('session')->set('order', $order);
    		$contact = $contactService->getContact($customer['user']['contactId']);
			$customer['contact'] = $contact;
    		$this->get('session')->set('customer', $customer);
    								
    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
   	    }
	    
	    throw new AccessDeniedException();
    }
}