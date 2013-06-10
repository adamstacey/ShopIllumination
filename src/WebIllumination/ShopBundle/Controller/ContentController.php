<?php

namespace WebIllumination\ShopBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Message;

class ContentController extends Controller
{
	
	// The shop page
	public function theShopAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
        return $this->render('WebIlluminationShopBundle:Content:theShop.html.twig', array());
    }
    
    // The cookie policy page
	public function cookiePolicyAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
        return $this->render('WebIlluminationShopBundle:Content:cookiePolicy.html.twig', array());
    }
    
    // Contact Us page
	public function contactUsAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
    	// Process the enquiry
    	if ($request->getMethod() == 'POST')
    	{
    		// Get the entity manager
	   		$em = $this->getDoctrine()->getManager();
	   			    	    	
	    	// Get submitted data
    		$departmentEmailAddress = ($request->request->get('enquiry')?$request->request->get('enquiry'):'sales@kitchenappliancecentre.co.uk');
    		switch ($departmentEmailAddress)
    		{
    			case 'delivery@kitchenappliancecentre.co.uk':
    				$department = 'Delivery';
    				break;
    			case 'customerservice@kitchenappliancecentre.co.uk':
    				$department = 'Customer Service';
    				break;
    			default:
    			case 'sales@kitchenappliancecentre.co.uk':
    				$department = 'Sales';
    				break;
    		}
    		$name = ucwords(trim($request->request->get('name')));
    		$emailAddress = strtolower(trim($request->request->get('email-address')));
    		$contactNumber = trim($request->request->get('contact-number'));
    		$message = trim($request->request->get('message'));
    		
    		// Save the message
    		$messageObject = new Message();
    		$messageObject->setMessageType($department);
    		$messageObject->setName($name);
    		$messageObject->setEmailAddress($emailAddress);
    		$messageObject->setContactNumber($contactNumber);
    		$messageObject->setMessage($message);
    		$messageObject->setPrinted('0');
    		$messageObject->setViewed('0');
    		$messageObject->setActioned('0');
		    $em->persist($messageObject);
		    $em->flush();
    		
    		// Send the message to the relevant department
    		try
			{
				$email = \Swift_Message::newInstance();
	        	$email->setSubject($department.' Enquiry');
	        	$email->setFrom(array($emailAddress => $name));
	        	$email->setTo(array($departmentEmailAddress => 'Kitchen Appliance Centre - '.$department));
	        	$email->setBcc(array('acfstacey@gmail.com' => 'Adam Stacey'));
	        	$email->setBody($this->renderView('WebIlluminationShopBundle:System:message.html.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message, 'title' => $department.' Enquiry')), 'text/html');
				$email->addPart($this->renderView('WebIlluminationShopBundle:System:message.txt.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message)), 'text/plain');
	    		$this->get('mailer')->send($email);
	    		
	    		// Set success message
		    	$this->get('session')->getFlashBag()->add('success', 'Thank you for your enquiry. We will make every effort to respond to your enquiry as soon as possible.');
			} catch (Exception $exception) {
		    	// Set error message
		    	$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem sending your enquiry. Please try contacting us using an alternative method.');
			}
			
			// Forward to the contact us page
		    return $this->redirect($this->get('router')->generate('content_contact_us_enquiry_sent', array()));
    	}    	
        return $this->render('WebIlluminationShopBundle:Content:contactUs.html.twig', array());
    }
    
    // Link to Us page
	public function linkToUsAction(Request $request)
    {
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
    	// Process the enquiry
    	if ($request->getMethod() == 'POST')
    	{
    		/*
    		// Get the entity manager
	   		$em = $this->getDoctrine()->getManager();
	   			    	    	
	    	// Get submitted data
    		$departmentEmailAddress = ($request->request->get('enquiry')?$request->request->get('enquiry'):'sales@ridedirect.co.uk');
    		switch ($departmentEmailAddress)
    		{
    			case 'delivery@ridedirect.co.uk':
    				$department = 'Delivery';
    				break;
    			case 'customerservice@ridedirect.co.uk':
    				$department = 'Customer Service';
    				break;
    			default:
    			case 'sales@ridedirect.co.uk':
    				$department = 'Sales';
    				break;
    		}
    		$name = ucwords(trim($request->request->get('name')));
    		$emailAddress = strtolower(trim($request->request->get('email-address')));
    		$contactNumber = trim($request->request->get('contact-number'));
    		$message = trim($request->request->get('message'));
    		
    		// Save the message
    		$messageObject = new Message();
    		$messageObject->setMessageType($department);
    		$messageObject->setName($name);
    		$messageObject->setEmailAddress($emailAddress);
    		$messageObject->setContactNumber($contactNumber);
    		$messageObject->setMessage($message);
    		$messageObject->setPrinted('0');
    		$messageObject->setViewed('0');
    		$messageObject->setActioned('0');
		    $em->persist($messageObject);
		    $em->flush();
    		
    		// Send the message to the relevant department
    		try
			{
				$email = \Swift_Message::newInstance();
	        	$email->setSubject($department.' Enquiry');
	        	$email->setFrom(array($emailAddress => $name));
	        	//$email->setTo(array('acfstacey@gmail.com' => 'Adam Stacey'));
	        	//$email->setCc(array('jon@ridedirect.co.uk' => 'Jon Kojdic', 'shaun476@gmail.com' => 'Shaun Spencer'));
	        	$email->setTo(array($departmentEmailAddress => 'Kitchen Appliance Centre - '.$department));
	        	$email->setBody($this->renderView('WebIlluminationShopBundle:System:message.html.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message, 'title' => $department.' Enquiry')), 'text/html');
				$email->addPart($this->renderView('WebIlluminationShopBundle:System:message.txt.twig', array('name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'message' => $message)), 'text/plain');
	    		$this->get('mailer')->send($email);
	    		
	    		// Set success message
		    	$this->get('session')->getFlashBag()->add('success', 'Thank you for your enquiry. We will make every effort to respond to your enquiry as soon as possible.');
			} catch (Exception $exception) {
		    	// Set error message
		    	$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem sending your enquiry. Please try contacting us using an alternative method.');
			}*/
			
			// Set success message
		    $this->get('session')->getFlashBag()->add('success', 'Thank you for your request. We will make every effort to process your link as soon as possible.');
			
			// Forward to the contact us page
		    return $this->redirect($this->get('router')->generate('content_link_to_us', array()));
    	}
    	
    	// Generate image links
    	$imageLinks = array();
    	$imageLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><img alt="Kitchen Appliance Centre - Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop." src="https://www.ridedirect.co.uk/bundles/webilluminationshop/images/banners/ride-direct-logo.gif" width="370" height="60" /></a></p>';
    	$imageLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><img alt="Ride Direct - Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop." src="https://www.ridedirect.co.uk/bundles/webilluminationshop/images/banners/qr-code.gif" width="100" height="100" /></a></p>';
    	$imageLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><img alt="Ride Direct - Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop." src="https://www.ridedirect.co.uk/bundles/webilluminationshop/images/banners/committed-to-giving-riders-more.gif" width="267" height="80" /></a></p>';
    	$imageLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><img alt="Ride Direct - Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop." src="https://www.ridedirect.co.uk/bundles/webilluminationshop/images/banners/committed-to-giving-riders-more-discounted.gif" width="267" height="112" /></a></p>';
    	$imageLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><img alt="Ride Direct - Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop." src="https://www.ridedirect.co.uk/bundles/webilluminationshop/images/banners/privilege-card.gif" width="361" height="180" /></a></p>';
    	
    	// Generate text links
    	$textLinks = array();
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct in Derby</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct, Derby UK</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/"><strong>Ride Direct</strong> - Committed to giving riders more&hellip;</a></p>';
    	$textLinks[] = '<p><strong><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct</a></strong><br />Motocross and enduro off road specialists. Kawasaki main dealer. Shop in derby. Sell all race kits. Sell bike spare parts including plastics. On-site service worktop.</p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Authorised Kawasaki Dealer - Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Stocking the latest Kawasaki Motocross bikes - Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Selling new and used motocross and enduro bikes - Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Large stock of parts for Motocross and Enduro racing - Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct - the one-stop off-road shop</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Get your Gaerne boots from Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Get your Answer and Scott race kits from Ride Direct</a></p>';
    	$textLinks[] = '<p><a target="_blank" href="http://www.ridedirect.co.uk/">Ride Direct, Derby - on-site service workshop</a></p>';
    	
        return $this->render('WebIlluminationShopBundle:Content:linkToUs.html.twig', array('textLinks' => $textLinks, 'imageLinks' => $imageLinks));
    }
    
    // How to Find Us page
	public function howToFindUsAction(Request $request)
    {  	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:howToFindUs.html.twig', array());
    }
    
    // Useful Links page
	public function usefulLinksAction(Request $request)
    {  	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:usefulLinks.html.twig', array());
    }
    
    // Installation Guides page
	public function installationGuidesAction(Request $request)
    {  	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:installationGuides.html.twig', array());
    }
    
    // Water Pressure Information page
	public function waterPressureInformationAction(Request $request)
    {  	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:waterPressureInformation.html.twig', array());
    }
    
    // Returns page
	public function returnsAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:returns.html.twig', array());
    }
    
    // Privacy Policy page
	public function privacyPolicyAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:privacyPolicy.html.twig', array());
    }
    
    // Terms and Conditions page
	public function termsAndConditionsAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:termsAndConditions.html.twig', array());
    }
    
    // Delivery page
	public function deliveryAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Get the basket
   		$basket = $this->get('session')->get('basket');
   			   		    	
        return $this->render('WebIlluminationShopBundle:Content:delivery.html.twig', array('basket' => $basket));
    }
    
    // Security page
	public function securityAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    	    	
        return $this->render('WebIlluminationShopBundle:Content:security.html.twig', array());
    }
    
    // 3D Secure page
	public function fraudPreventionAction(Request $request)
    {  	
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	       		    	
        return $this->render('WebIlluminationShopBundle:Content:fraudPrevention.html.twig', array());
    }
	
	// Privilege Card page
	public function privilegeCardAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    	   		    	
        return $this->render('WebIlluminationShopBundle:Content:privilegeCard.html.twig', array());
    }
    
    // Gift vouchers page
	public function giftVouchersAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    	   		    	
        return $this->render('WebIlluminationShopBundle:Content:giftVouchers.html.twig', array());
    }
    
    // Track day page
	public function trackDayAction(Request $request)
    {   
    	// Get the services
	    $systemService = $this->get('web_illumination_admin.system_service');
	    
	    // Initialise the session
	    $systemService->initialiseSession();
	    
	    // Process the enquiry
    	if ($request->getMethod() == 'POST')
    	{
    		// Get the entity manager
	   		$em = $this->getDoctrine()->getManager();
	   			    	    	
	    	// Get submitted data
    		$membershipNumber = ucwords(trim($request->request->get('membership-number')));
    		$name = ucwords(trim($request->request->get('name')));
    		$emailAddress = strtolower(trim($request->request->get('email-address')));
    		$contactNumber = trim($request->request->get('contact-number'));
    		$postZipCode = trim($request->request->get('post-zip-code'));
    		$ageRange = trim($request->request->get('age-range'));
    		$dayAttending = trim($request->request->get('day-attending'));
    		$bikeDetails = trim($request->request->get('bike-details'));
    		    		
    		// Send the message to the relevant department
    		try
			{
				$email = \Swift_Message::newInstance();
	        	$email->setSubject('Your Ride Direct Practice Day Registration');
	        	$email->setFrom(array('sales@ridedirect.co.uk' => 'Ride Direct - Sales Team'));
	        	$email->setTo(array($emailAddress => $name));
	        	$email->setBcc(array('acfstacey@gmail.com' => 'Adam Stacey', 'sales@ridedirect.co.uk' => 'Ride Direct - Sales Team'));
	        	$email->setBody($this->renderView('WebIlluminationShopBundle:Content:trackDayConfirmation.html.twig', array('membershipNumber' => $membershipNumber, 'name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'postZipCode' => $postZipCode, 'ageRange' => $ageRange, 'dayAttending' => $dayAttending, 'bikeDetails' => $bikeDetails)), 'text/html');
				$email->addPart($this->renderView('WebIlluminationShopBundle:Content:trackDayConfirmation.txt.twig', array('membershipNumber' => $membershipNumber, 'name' => $name, 'emailAddress' => $emailAddress, 'contactNumber' => $contactNumber, 'postZipCode' => $postZipCode, 'ageRange' => $ageRange, 'dayAttending' => $dayAttending, 'bikeDetails' => $bikeDetails)), 'text/plain');
	    		$this->get('mailer')->send($email);
	    		
	    		// Set success message
		    	$this->get('session')->getFlashBag()->add('success', 'Thank you for registering for our track day. We have sent you an email with all the information you will need for the day.');
			} catch (Exception $exception) {
		    	// Set error message
		    	$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem registering your details. Please contact us.');
			}
			
			// Forward to the contact us page
		    return $this->redirect($this->get('router')->generate('content_track_day', array()));
    	} 
	    
	    // Get the session
    	$basket = $this->get('session')->get('basket');
    	$order = $this->get('session')->get('order');
	    	   		    	
        return $this->render('WebIlluminationShopBundle:Content:trackDay.html.twig', array('basket' => $basket, 'order' => $order));
    }    
}