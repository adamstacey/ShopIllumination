<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\PracticeDayRegistration;

class PracticeDayRegistrationsController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		
		// Get the settings session
    	$systemService->initialiseSettingsSession();
    	$settings = $this->container->get('session')->get('settings');
    			    	 
        return $this->render('WebIlluminationAdminBundle:PracticeDayRegistrations:index.html.twig', array('settings' => $settings['admin']['practiceDayRegistrations']));
    }
    
    public function testAction()
    {
		// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		$practiceDayRegistrations = $em->getRepository('WebIlluminationAdminBundle:PracticeDayRegistration')->findBy(array('day' => 'Saturday 3rd'), array('name' => 'ASC'));
    	
        return $this->render('WebIlluminationAdminBundle:PracticeDayRegistrations:view.html.twig', array('practiceDayRegistrations' => $practiceDayRegistrations));
    }
	    	
	// Get the listing
	public function ajaxGetListingAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{		
    		// Get the services
			$practiceDayRegistrationService = $this->get('web_illumination_admin.practice_day_registration_service');
		
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		    		    		
    		// Get submitted data
    		$name = $request->query->get('name');
    		$membershipNumber = $request->query->get('membershipNumber');
    		$emailAddress = $request->query->get('emailAddress');
    		$contactNumber = $request->query->get('contactNumber');
    		$postZipCode = $request->query->get('postZipCode');
    		$age = $request->query->get('age');
    		$day = $request->query->get('day');
    		$vip = $request->query->get('vip');
    		$sortOrder = ($request->query->get('sortOrder')?$request->query->get('sortOrder'):$settings['admin']['practiceDayRegistrations']['listingSortOrder']);
    		$sortOrderObject = explode(':', $sortOrder);
    		$sort = ($sortOrderObject[0]?$sortOrderObject[0]:$settings['admin']['practiceDayRegistrations']['listingSort']);
    		$order = ($sortOrderObject[1]?$sortOrderObject[1]:$settings['admin']['practiceDayRegistrations']['listingOrder']);
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['practiceDayRegistrations']['listingMaxResults']);
    		
    		// Update settings
    		$settings['admin']['practiceDayRegistrations']['listingSortOrder'] = $sortOrder;
    		$settings['admin']['practiceDayRegistrations']['listingSort'] = $sort;
    		$settings['admin']['practiceDayRegistrations']['listingOrder'] = $order;
    		$settings['admin']['practiceDayRegistrations']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	    	
	    	// Get the membership cards
	    	$practiceDayRegistrations = $practiceDayRegistrationService->getListing($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip, $sort, $order, $page, $maxResults);
	    	
	    	if (!$practiceDayRegistrations)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:PracticeDayRegistrations:ajaxGetListing.html.twig', array('practiceDayRegistrations' => $practiceDayRegistrations));
	    }
	    
	    throw new AccessDeniedException();
    }
            
    // Get listing count
    public function ajaxGetListingCountAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$practiceDayRegistrationService = $this->get('web_illumination_admin.practice_day_registration_service');
			
    		// Get submitted data
    		$name = $request->query->get('name');
    		$membershipNumber = $request->query->get('membershipNumber');
    		$emailAddress = $request->query->get('emailAddress');
    		$contactNumber = $request->query->get('contactNumber');
    		$postZipCode = $request->query->get('postZipCode');
    		$age = $request->query->get('age');
    		$day = $request->query->get('day');
    		$vip = $request->query->get('vip');
	   		
	    	// Get the listing count
	    	$listingCount = $practiceDayRegistrationService->getListingCount($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip);
	        	        	    		        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get product listing pagination
    public function ajaxGetListingPaginationAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$practiceDayRegistrationService = $this->get('web_illumination_admin.practice_day_registration_service');
			
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get submitted data
    		$name = $request->query->get('name');
    		$membershipNumber = $request->query->get('membershipNumber');
    		$emailAddress = $request->query->get('emailAddress');
    		$contactNumber = $request->query->get('contactNumber');
    		$postZipCode = $request->query->get('postZipCode');
    		$age = $request->query->get('age');
    		$day = $request->query->get('day');
    		$vip = $request->query->get('vip');
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['voucherCodes']['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['admin']['practiceDayRegistrations']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	    	// Get the listing pagingation
	    	$pagination = $practiceDayRegistrationService->getListingPagination($name, $membershipNumber, $emailAddress, $contactNumber, $postZipCode, $age, $day, $vip, $maxResults);
	        	        
	       return $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Add new practice day registration
	public function ajaxAddPracticeDayRegistrationAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get the admin
    		$admin = $this->get('session')->get('admin');
   			
   			// Get submitted data
    		$vip = ($request->request->get('vip')?$request->request->get('vip'):0);
    		$name = $request->request->get('name');
    		$membershipNumber = $request->request->get('membershipNumber');
    		$emailAddress = $request->request->get('emailAddress');
    		$contactNumber = $request->request->get('contactNumber');
    		$postZipCode = $request->request->get('postZipCode');
    		$age = $request->request->get('age');
    		$day = $request->request->get('day');
    		$bike = $request->request->get('bike');
    		$notes = $request->request->get('notes');    		
    		
    		// Get new practice day registration
    		$practiceDayRegistrationObject = new PracticeDayRegistration();
	    	$practiceDayRegistrationObject->setVip($vip);
	    	$practiceDayRegistrationObject->setName($name);
	    	$practiceDayRegistrationObject->setMembershipNumber($membershipNumber);
	    	$practiceDayRegistrationObject->setEmailAddress($emailAddress);
	    	$practiceDayRegistrationObject->setContactNumber($contactNumber);
	    	$practiceDayRegistrationObject->setPostZipCode($postZipCode);
	    	$practiceDayRegistrationObject->setAge($age);
	    	$practiceDayRegistrationObject->setDay($day);
	    	$practiceDayRegistrationObject->setTime('10am till 4pm');
	    	$practiceDayRegistrationObject->setBike($bike);
	    	$practiceDayRegistrationObject->setVenue('Stalker MX Track Gonerby Moor, Great Gonerby, Grantham, Lincolnshire, NG32 2AB');
	    	$practiceDayRegistrationObject->setContactNumberBeforeEvent('Kitchen Appliance Centre on 01332 365 913');
	    	$practiceDayRegistrationObject->setContactNumbersOnEvent('07940 585 505 or 07785 425 499');
	    	$practiceDayRegistrationObject->setNotes($notes);
	    	$em->persist($practiceDayRegistrationObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Save the membership card
	public function ajaxSaveMembershipCardAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->request->get('id');
    		$membershipNumber= strtoupper($request->request->get('membershipNumber'));
    		$validFromDate = new \DateTime($request->request->get('validFromDate'));
    		$expiryDate = new \DateTime($request->request->get('expiryDate'));
    		
    		// Get the membership card object
    		$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->find($id);	    	
	    	if (!$membershipCardObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
    		
    		// Check membership number hasn't already been used
    		$membershipCardAlreadyUsed = false;
    		$membershipCardCheckObjects = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->findBy(array('membershipNumber' => $membershipNumber));
  			foreach ($membershipCardCheckObjects as $membershipCardCheckObject)
  			{
  				if ($membershipCardObject->getId() != $membershipCardCheckObject->getId())
  				{
  					$membershipCardAlreadyUsed = true;
  				}
  			}
    		if ($membershipCardAlreadyUsed)
    		{
    			return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'The membership number you have tried to use is already in use. Please try another membership number.')), ENT_NOQUOTES));
    		}
    		    			    	
	    	// Update the membership card
	    	$membershipCardObject->setMembershipNumber($membershipNumber);
	    	$membershipCardObject->setValidFromDate($validFromDate);
	    	$membershipCardObject->setExpiryDate($expiryDate);
	    	$em->persist($membershipCardObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Save the user
	public function ajaxSaveUserAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$userId = $request->query->get('userId');
    		
    		// Get the membership card object
    		$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->find($id);	    	
	    	if (!$membershipCardObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		    			    	
	    	// Update the membership card
	    	$membershipCardObject->setUserId($userId);
	    	$em->persist($membershipCardObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Release the user
	public function ajaxReleaseUserAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		
    		// Get the membership card object
    		$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->find($id);	    	
	    	if (!$membershipCardObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		    			    	
	    	// Update the membership card
	    	$membershipCardObject->setUserId(0);
	    	$membershipCardObject->setItems(0);
	    	$membershipCardObject->setSubtotal(0.000);
	    	$membershipCardObject->setSavings(0.000);
	    	$em->persist($membershipCardObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete a membership card
	public function ajaxDeleteMembershipCardAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
    		// Get submitted data
    		$id = $request->query->get('id');
	   		
	   		// Get the membership card object
    		$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->find($id);
    			    	
	    	// Delete the membership card
	    	if ($membershipCardObject)
	    	{
	    		$em->remove($membershipCardObject);
				$em->flush();
	    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    	}
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get customer
    public function ajaxGetCustomerAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get the services
	    	$contactService = $this->get('web_illumination_admin.contact_service');
   			
    		// Get submitted data
    		$userId = $request->query->get('userId');
    		
    		// Get the user object
    		$userObject = $em->getRepository('WebIlluminationAdminBundle:User')->find($userId);
	    	if (!$userObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the contact
	    	$contact = $contactService->getContact($userObject->getContactId());
	        	        
	        return $this->render('WebIlluminationAdminBundle:MembershipCards:ajaxGetCustomer.html.twig', array('contact' => $contact));
    	}
    	
    	throw new AccessDeniedException();
    }
}