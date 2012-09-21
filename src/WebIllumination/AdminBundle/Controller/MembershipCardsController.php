<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\MembershipCard;

class MembershipCardsController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		$contactService = $this->get('web_illumination_admin.contact_service');
		
		// Get the settings session
    	$systemService->initialiseSettingsSession();
    	$settings = $this->container->get('session')->get('settings');
    	
    	// Get the contacts
    	$contacts = apc_fetch('kitchen_appliance_centre_full_contact_list');
    	if (!$contacts)
    	{
    		// Get a list of contacts
    		$contacts = $contactService->getFullContactList();
    		apc_store('kitchen_appliance_centre_full_contact_list', $contacts);
    	}
		
		// Get the dates for the new voucher code
    	$validFromDate = new \DateTime();
    	$expiryDate = new \DateTime(date("Y-m-d", strtotime("+1 year")));
    	
        return $this->render('WebIlluminationAdminBundle:MembershipCards:index.html.twig', array('settings' => $settings, 'contacts' => $contacts, 'validFromDate' => $validFromDate, 'expiryDate' => $expiryDate));
    }
	    	
	// Get the listing
	public function ajaxGetListingAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{		
    		// Get the services
			$membershipCardService = $this->get('web_illumination_admin.membership_card_service');
		
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get the contacts
	    	$contacts = apc_fetch('kitchen_appliance_centre_full_contact_list');
	    	if (!$contacts)
	    	{
	    		// Get a list of contcats
	    		$contacts = $contactService->getFullContactList();
	    		apc_store('kitchen_appliance_centre_full_contact_list', $contacts);
	    	}
    		    		
    		// Get submitted data
    		$membershipNumber = $request->query->get('membershipNumber');
    		$active = $request->query->get('active');
    		$userId = $request->query->get('userId');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
    		$sortOrder = ($request->query->get('sortOrder')?$request->query->get('sortOrder'):$settings['admin']['voucherCodes']['listingSortOrder']);
    		$sortOrderObject = explode(':', $sortOrder);
    		$sort = ($sortOrderObject[0]?$sortOrderObject[0]:$settings['admin']['voucherCodes']['listingSort']);
    		$order = ($sortOrderObject[1]?$sortOrderObject[1]:$settings['admin']['voucherCodes']['listingOrder']);
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['voucherCodes']['listingMaxResults']);
    		
    		// Update settings
    		$settings['admin']['membershipCards']['listingSortOrder'] = $sortOrder;
    		$settings['admin']['membershipCards']['listingSort'] = $sort;
    		$settings['admin']['membershipCards']['listingOrder'] = $order;
    		$settings['admin']['membershipCards']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	    	
	    	// Get the membership cards
	    	$membershipCards = $membershipCardService->getListing($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $sort, $order, $page, $maxResults);
	    	
	    	if (!$membershipCards)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:MembershipCards:ajaxGetListing.html.twig', array('membershipCards' => $membershipCards, 'contacts' => $contacts));
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
			$membershipCardService = $this->get('web_illumination_admin.membership_card_service');
			
    		// Get submitted data
    		$membershipNumber = $request->query->get('membershipNumber');
    		$active = $request->query->get('active');
    		$userId = $request->query->get('userId');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
	   		
	    	// Get the listing count
	    	$listingCount = $membershipCardService->getListingCount($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo);
	    	
	    	// Get listing statistics
	    	$listingStatistics = $membershipCardService->getListingStatistics($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo);
	        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount, 'listingStatistics' => $listingStatistics)), ENT_NOQUOTES));
	    		        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount, 'listingStatistics' => $listingStatistics)), ENT_NOQUOTES));
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
			$membershipCardService = $this->get('web_illumination_admin.membership_card_service');
			
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get submitted data
    		$membershipNumber = $request->query->get('membershipNumber');
    		$active = $request->query->get('active');
    		$userId = $request->query->get('userId');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['voucherCodes']['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['admin']['membershipCards']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	    	// Get the listing pagingation
	    	$pagination = $membershipCardService->getListingPagination($membershipNumber, $active, $userId, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $maxResults);
	        	        
	       return $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Add new membership card
	public function ajaxAddMembershipCardAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get the admin
    		$admin = $this->get('session')->get('admin');
   			
   			// Get submitted data
    		$membershipNumber= strtoupper($request->request->get('membershipNumber'));
    		$validFromDate = new \DateTime($request->request->get('validFromDate'));
    		$expiryDate = new \DateTime($request->request->get('expiryDate'));  		
    		
    		// Check membership number hasn't already been used
    		$membershipCardObject = $em->getRepository('WebIlluminationAdminBundle:MembershipCard')->findOneBy(array('membershipNumber' => $membershipNumber));
    		if ($membershipCardObject)
    		{
    			return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'The membership number you have tried to use is already in use. Please try another membership number.')), ENT_NOQUOTES));
    		}	  
    		
    		// Get the membership card object
    		$membershipCardObject = new MembershipCard();
	    	$membershipCardObject->setUserId(0);
	    	$membershipCardObject->setActive(1);
	    	$membershipCardObject->setMembershipNumber($membershipNumber);
	    	$membershipCardObject->setItems(0);
	    	$membershipCardObject->setSubTotal(0.000);
	    	$membershipCardObject->setSavings(0.000);
	    	$membershipCardObject->setValidFromDate($validFromDate);
	    	$membershipCardObject->setExpiryDate($expiryDate);
	    	$em->persist($membershipCardObject);
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