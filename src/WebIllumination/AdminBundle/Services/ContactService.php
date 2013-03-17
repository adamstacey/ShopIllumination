<?php 

namespace WebIllumination\AdminBundle\Services;

use KAC\SiteBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;

class ContactService {

	protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
    
    // Get a contact
    public function getContact($id)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
   		// Setup contact
	    $contact = array();
	   		
   		/**
         * Get the contacts
         * @var $contactObject Contact
         */
   		$contactObject = $em->getRepository('KAC\SiteBundle\Entity\Contact')->find($id);
   		if ($contactObject)
   		{
		   	$contact['id'] = $contactObject->getId();
		   	$contact['objectId'] = $contactObject->getId();
		   	$contact['objectType'] = $contactObject->getObjectType();
		   	$contact['displayName'] = $contactObject->getDisplayName();
		   	$contact['organisationName'] = $contactObject->getOrganisationName();
		   	$contact['contactTitleId'] = $contactObject->getContactTitle()->getId();
		   	$contact['contactTitle'] = $contactObject->getContactTitle()->getName();
		   	$contact['firstName'] = $contactObject->getFirstName();
		   	$contact['middleName'] = $contactObject->getMiddleName();
		   	$contact['lastName'] = $contactObject->getLastName();
		   		
	   		/**
             * Get the addresses
             * @var $contactAddressObject Contact\Address
             */
	   		$contact['contactAddresses'] = array();
	   		foreach ($contactObject->getAddresses() as $contactAddressObject)
	   		{
	   			$contactAddress = array();
	   			$contactAddress['id'] = $contactAddressObject->getId();
			   	$contactAddress['contactAddressTypeId'] = $contactAddressObject->getType()->getId();
			   	$contactAddress['contactAddressType'] = $contactAddressObject->getType()->getName();
			   	$contactAddress['displayName'] = $contactAddressObject->getDisplayName();
			   	$contactAddress['organisationName'] = $contactAddressObject->getOrganisationName();
			   	$contactAddress['contactTitleId'] = $contactAddressObject->getContactTitle()->getId();
			   	$contactAddress['contactTitle'] = $contactAddressObject->getContactTitle()->getName();
			   	$contactAddress['firstName'] = $contactAddressObject->getFirstName();
			   	$contactAddress['middleName'] = $contactAddressObject->getMiddleName();
			   	$contactAddress['lastName'] = $contactAddressObject->getLastName();
			   	$contactAddress['addressLine1'] = $contactAddressObject->getAddressLine1();
			   	$contactAddress['addressLine2'] = $contactAddressObject->getAddressLine2();
			   	$contactAddress['addressLine3'] = $contactAddressObject->getAddressLine3();
			   	$contactAddress['townCity'] = $contactAddressObject->getTownCity();
			   	$contactAddress['countyState'] = $contactAddressObject->getCountyState();
			   	$contactAddress['postZipCode'] = $contactAddressObject->getPostZipCode();
			   	$contactAddress['countryCode'] = $contactAddressObject->getCountryCode();
			   	// Add the address
		   		$contact['contactAddresses'][] = $contactAddress;
	   		}

            /**
             * Get the email addresses
             * @var $contactEmailAddressObject Contact\EmailAddress
             */
		   	$contact['contactEmailAddresses'] = array();
	   		foreach ($contactObject->getEmails() as $contactEmailAddressObject)
	   		{
	   			$contactEmailAddress = array();
	   			$contactEmailAddress['id'] = $contactEmailAddressObject->getId();
			   	$contactEmailAddress['contactEmailAddressTypeId'] = $contactEmailAddressObject->getType()->getId();
			   	$contactEmailAddress['contactEmailAddressType'] = $contactEmailAddressObject->getType()->getName();
			   	$contactEmailAddress['displayName'] = $contactEmailAddressObject->getDisplayName();
			   	$contactEmailAddress['email'] = $contactEmailAddressObject->getEmail();
			   	
			   	// Add the email address
		   		$contact['contactEmailAddresses'][] = $contactEmailAddress;
	   		}

            /**
             * Get the numbers
             * @var $contactNumberObject Contact\Number
             */
		   	$contact['contactNumbers'] = array();
		   	foreach ($contactObject->getNumbers() as $contactNumberObject)
		   	{
		   		$contactNumber = array();
	   			$contactNumber['id'] = $contactNumberObject->getId();
			   	$contactNumber['contactNumberTypeId'] = $contactNumberObject->getType()->getId();
			   	$contactNumber['contactNumberType'] = $contactNumberObject->getType()->getName();
			   	$contactNumber['displayName'] = $contactNumberObject->getDisplayName();
			   	$contactNumber['number'] = $contactNumberObject->getNumber();
			   	$contactNumber['countryCode'] = $contactNumberObject->getCountryCode();

			   	// Add the number
		   		$contact['contactNumbers'][] = $contactNumber;
	   		}

            /**
             * Get the web addresses
             * @var $contactWebAddressObject Contact\WebAddress
             */
		   	$contact['contactWebAddresses'] = array();
		   	foreach ($contactObject->getWebAddresses() as $contactWebAddressObject)
		   	{
		   		$contactWebAddress = array();
	   			$contactWebAddress['id'] = $contactWebAddressObject->getId();
			   	$contactWebAddress['contactWebAddressTypeId'] = $contactWebAddressObject->getType()->getId();
			   	$contactWebAddress['contactWebAddressType'] = $contactWebAddressObject->getType()->getName();
			   	$contactWebAddress['displayName'] = $contactWebAddressObject->getDisplayName();
			   	$contactWebAddress['url'] = $contactWebAddressObject->getUrl();
			   	
			   	// Add the number
		   		$contact['contactWebAddresses'][] = $contactWebAddress;
		   	}
		}
	   		   		
    	return $contact;
    }
    
    // Get contacts
    public function getContacts($objectId, $objectType)
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
   		// Setup contacts
	    $contacts = array();
	   		
   		// Get the contacts
//   		$contactObjects = $em->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array('objectId' => $objectId, 'objectType' => $objectType), array('displayOrder' => 'ASC'));
//   		foreach ($contactObjects as $contactObject)
//   		{
//   			if ($contactObject)
//   			{
//   				$contact = $this->getContact($contactObject->getId());
//   				if ($contact)
//   				{
//   					$contacts[] = $contact;
//   				}
//   			}
//   		}
	   		   		
    	return $contacts;
    }
    
    // Get full list of contacts
    public function getFullContactList($locale = 'en')
    {
    	// Get the services
    	$doctrineService = $this->container->get('doctrine');
    	
    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();
    	
   		// Setup contacts
    	$contacts = array();
   		
   		// Get the contacts
   		$contactObjects = $em->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array(), array('firstName' => 'ASC', 'lastName' => 'ASC', 'organisationName' => 'ASC'));
   		foreach ($contactObjects as $contactObject)
   		{
   			$contact = array();
   			$contact['id'] = $contactObject->getId();
   			$contact['objectId'] = $contactObject->getObjectId();
   			$contact['displayName'] = $contactObject->getDisplayName();
   			$contact['firstName'] = $contactObject->getFirstName();
   			$contact['middleName'] = $contactObject->getMiddleName();
   			$contact['lastName'] = $contactObject->getLastName();
   			$contact['organisationName'] = $contactObject->getOrganisationName();
   			$contacts[] = $contact;
   		}
   			   	   		
    	return $contacts;
    }    
}