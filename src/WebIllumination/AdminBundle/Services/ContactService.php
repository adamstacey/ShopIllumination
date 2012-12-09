<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\ObjectIndex;

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
	   		
   		// Get the contacts
   		$contactObject = $em->getRepository('WebIlluminationAdminBundle:Contact')->find($id);
   		if ($contactObject)
   		{
		   	$contact['id'] = $contactObject->getId();
		   	$contact['objectId'] = $contactObject->getObjectId();
		   	$contact['objectType'] = $contactObject->getObjectType();
		   	$contact['displayName'] = $contactObject->getDisplayName();
		   	$contact['organisationName'] = $contactObject->getOrganisationName();
		   	$contact['contactTitleId'] = $contactObject->getContactTitleId();
		   	$contact['contactTitle'] = '';
		   	$contact['firstName'] = $contactObject->getFirstName();
		   	$contact['middleName'] = $contactObject->getMiddleName();
		   	$contact['lastName'] = $contactObject->getLastName();
		   			   	
		   	// Get the contact title
		   	$contactTitleObject = $em->getRepository('WebIlluminationAdminBundle:ContactTitle')->find($contactObject->getContactTitleId());
		   	if ($contactTitleObject)
		   	{
		   		$contact['contactTitle'] = $contactTitleObject->getContactTitle();
		   	}
		   		
	   		// Get the addresses
	   		$contact['contactAddresses'] = array();
	   		$contactAddresses = $em->getRepository('WebIlluminationAdminBundle:ContactAddress')->findBy(array('contactId' => $id), array('displayOrder' => 'ASC'));
	   		foreach ($contactAddresses as $contactAddressObject)
	   		{
	   			$contactAddress = array();
	   			$contactAddress['id'] = $contactAddressObject->getId();
			   	$contactAddress['contactAddressTypeId'] = $contactAddressObject->getContactAddressTypeId();
			   	$contactAddress['contactAddressType'] = '';
			   	$contactAddress['displayName'] = $contactAddressObject->getDisplayName();
			   	$contactAddress['organisationName'] = $contactAddressObject->getOrganisationName();
			   	$contactAddress['contactTitleId'] = $contactAddressObject->getContactTitleId();
			   	$contactAddress['contactTitle'] = '';
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
		   	
		   		// Get the contact address type
			   	$contactAddressTypeObject = $em->getRepository('WebIlluminationAdminBundle:ContactAddressType')->find($contactAddressObject->getContactAddressTypeId());
			   	if ($contactAddressTypeObject)
			   	{
			   		$contactAddress['contactAddressType'] = $contactAddressTypeObject->getContactAddressType();
			   	}
			   	
			   	// Get the contact title
			   	$contactTitleObject = $em->getRepository('WebIlluminationAdminBundle:ContactTitle')->find($contactAddressObject->getContactTitleId());
			   	if ($contactTitleObject)
			   	{
			   		$contactAddress['contactTitle'] = $contactTitleObject->getContactTitle();
			   	}
			   	
			   	// Add the address
		   		$contact['contactAddresses'][] = $contactAddress;
	   		}
	   		
	   		// Get the email addresses
		   	$contact['contactEmailAddresses'] = array();
	   		$emailAddresses = $em->getRepository('WebIlluminationAdminBundle:ContactEmailAddress')->findBy(array('contactId' => $id), array('displayOrder' => 'ASC'));
	   		foreach ($emailAddresses as $contactEmailAddressObject)
	   		{
	   			$contactEmailAddress = array();
	   			$contactEmailAddress['id'] = $contactEmailAddressObject->getId();
			   	$contactEmailAddress['contactEmailAddressTypeId'] = $contactEmailAddressObject->getContactEmailAddressTypeId();
			   	$contactEmailAddress['contactEmailAddressType'] = '';
			   	$contactEmailAddress['displayName'] = $contactEmailAddressObject->getDisplayName();
			   	$contactEmailAddress['email'] = $contactEmailAddressObject->getEmail();
			   	
			   	// Get the contact email address type
			   	$contactEmailAddressTypeObject = $em->getRepository('WebIlluminationAdminBundle:ContactEmailAddressType')->find($contactEmailAddressObject->getContactEmailAddressTypeId());
			   	if ($contactEmailAddressTypeObject)
			   	{
			   		$contactEmailAddress['contactEmailAddressType'] = $contactEmailAddressTypeObject->getContactEmailAddressType();
			   	}
			   	
			   	// Add the email address
		   		$contact['contactEmailAddresses'][] = $contactEmailAddress;
	   		}
		   		
		   	// Get the numbers
		   	$contact['contactNumbers'] = array();
		   	$numbers = $em->getRepository('WebIlluminationAdminBundle:ContactNumber')->findBy(array('contactId' => $id), array('displayOrder' => 'ASC'));
		   	foreach ($numbers as $contactNumberObject)
		   	{
		   		$contactNumber = array();
	   			$contactNumber['id'] = $contactNumberObject->getId();
			   	$contactNumber['contactNumberTypeId'] = $contactNumberObject->getContactNumberTypeId();
			   	$contactNumber['contactNumberType'] = '';
			   	$contactNumber['displayName'] = $contactNumberObject->getDisplayName();
			   	$contactNumber['number'] = $contactNumberObject->getNumber();
			   	$contactNumber['countryCode'] = $contactNumberObject->getCountryCode();
			   	
			   	// Get the contact number type
			   	$contactNumberTypeObject = $em->getRepository('WebIlluminationAdminBundle:ContactNumberType')->find($contactNumberObject->getContactNumberTypeId());
			   	if ($contactNumberTypeObject)
			   	{
			   		$contactNumber['contactNumberType'] = $contactNumberTypeObject->getContactNumberType();
			   	}
			   	
			   	// Add the number
		   		$contact['contactNumbers'][] = $contactNumber;
	   		}
		   		
		   	// Get the web addresses
		   	$contact['contactWebAddresses'] = array();
		   	$webAddresses = $em->getRepository('WebIlluminationAdminBundle:ContactWebAddress')->findBy(array('contactId' => $id), array('displayOrder' => 'ASC'));
		   	foreach ($webAddresses as $contactWebAddressObject)
		   	{
		   		$contactWebAddress = array();
	   			$contactWebAddress['id'] = $contactWebAddressObject->getId();
			   	$contactWebAddress['contactWebAddressTypeId'] = $contactWebAddressObject->getContactNumberTypeId();
			   	$contactWebAddress['contactWebAddressType'] = '';
			   	$contactWebAddress['displayName'] = $contactWebAddressObject->getDisplayName();
			   	$contactWebAddress['url'] = $contactWebAddressObject->getUrl();
			   	
			   	// Get the contact web address type
			   	$contactWebAddressTypeObject = $em->getRepository('WebIlluminationAdminBundle:ContactWebAddressType')->find($contactWebAddressObject->getContactWebAddressTypeId());
			   	if ($contactWebAddressTypeObject)
			   	{
			   		$contactWebAddress['contactWebAddressType'] = $contactWebAddressTypeObject->getContactWebAddressType();
			   	}
			   	
			   	// Add the number
		   		$contact['contactNumbers'][] = $contactNumber;
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
   		$contactObjects = $em->getRepository('WebIlluminationAdminBundle:Contact')->findBy(array('objectId' => $objectId, 'objectType' => $objectType), array('displayOrder' => 'ASC'));
   		foreach ($contactObjects as $contactObject)
   		{
   			if ($contactObject)
   			{
   				$contact = $this->getContact($contactObject->getId());
   				if ($contact)
   				{
   					$contacts[] = $contact;
   				}
   			}
   		}
	   		   		
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
   		$contactObjects = $em->getRepository('WebIlluminationAdminBundle:Contact')->findBy(array(), array('firstName' => 'ASC', 'lastName' => 'ASC', 'organisationName' => 'ASC'));
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