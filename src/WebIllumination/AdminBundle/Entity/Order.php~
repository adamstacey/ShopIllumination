<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`order`")
 * @ORM\HasLifecycleCallbacks()
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="user_id", type="integer", length="11")
     */
    private $userId;
    
    /**
     * @ORM\Column(name="status", type="string", length="255")
     */
    private $status;
        
    /**
     * @ORM\Column(name="payment_type", type="string", length="255")
     */
    private $paymentType;
    
    /**
     * @ORM\Column(name="payment_response", type="text")
     */
    private $paymentResponse;
    
    /**
     * @ORM\Column(name="delivery_type", type="string", length="255")
     */
    private $deliveryType;
    
    /**
     * @ORM\Column(name="items", type="string", length="255")
     */
    private $items;
        
    /**
     * @ORM\Column(name="sub_total", type="decimal", precision="12", scale="4")
     */
    private $subTotal;
        
    /**
     * @ORM\Column(name="delivery_charge", type="decimal", precision="12", scale="4")
     */
    private $deliveryCharge;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision="12", scale="4")
     */
    private $discount;
    
    /**
     * @ORM\Column(name="vat", type="decimal", precision="12", scale="4")
     */
    private $vat;
    
    /**
     * @ORM\Column(name="total", type="decimal", precision="12", scale="4")
     */
    private $total;
    
    /**
     * @ORM\Column(name="membership_card_purchased", type="integer", length="1")
     */
    private $membershipCardPurchased;
    
    /**
     * @ORM\Column(name="membership_card_number", type="string", length="255")
     */
    private $membershipCardNumber;
    
    /**
     * @ORM\Column(name="possible_discount", type="decimal", precision="12", scale="4")
     */
    private $possibleDiscount;
    
    /**
     * @ORM\Column(name="discounts_count", type="integer", length="11")
     */
    private $discountsCount;
    
    /**
     * @ORM\Column(name="notes_count", type="integer", length="11")
     */
    private $notesCount;
        
    /**
     * @ORM\Column(name="first_name", type="string", length="255")
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="last_name", type="string", length="255")
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="organisation_name", type="string", length="255")
     */
    private $organisationName;
    
    /**
     * @ORM\Column(name="email_address", type="string", length="255")
     */
    private $emailAddress;
    
    /**
     * @ORM\Column(name="telephone_daytime", type="string", length="50")
     */
    private $telephoneDaytime;
    
    /**
     * @ORM\Column(name="telephone_evening", type="string", length="50")
     */
    private $telephoneEvening;
    
    /**
     * @ORM\Column(name="mobile", type="string", length="50")
     */
    private $mobile;
    
    /**
     * @ORM\Column(name="billing_first_name", type="string", length="255")
     */
    private $billingFirstName;
    
    /**
     * @ORM\Column(name="billing_last_name", type="string", length="255")
     */
    private $billingLastName;
    
    /**
     * @ORM\Column(name="billing_organisation_name", type="string", length="255")
     */
    private $billingOrganisationName;
    
    /**
     * @ORM\Column(name="billing_address_line_1", type="string", length="255")
     */
    private $billingAddressLine1;
    
    /**
     * @ORM\Column(name="billing_address_line_2", type="string", length="255")
     */
    private $billingAddressLine2;
    
    /**
     * @ORM\Column(name="billing_town_city", type="string", length="255")
     */
    private $billingTownCity;
    
    /**
     * @ORM\Column(name="billing_county_state", type="string", length="255")
     */
    private $billingCountyState;
    
    /**
     * @ORM\Column(name="billing_post_zip_code", type="string", length="255")
     */
    private $billingPostZipCode;
    
    /**
     * @ORM\Column(name="billing_country_code", type="string", length="2")
     */
    private $billingCountryCode;
    
   	/**
     * @ORM\Column(name="delivery_first_name", type="string", length="255")
     */
    private $deliveryFirstName;
    
    /**
     * @ORM\Column(name="delivery_last_name", type="string", length="255")
     */
    private $deliveryLastName;
    
    /**
     * @ORM\Column(name="delivery_organisation_name", type="string", length="255")
     */
    private $deliveryOrganisationName;
    
    /**
     * @ORM\Column(name="delivery_address_line_1", type="string", length="255")
     */
    private $deliveryAddressLine1;
    
    /**
     * @ORM\Column(name="delivery_address_line_2", type="string", length="255")
     */
    private $deliveryAddressLine2;
    
    /**
     * @ORM\Column(name="delivery_town_city", type="string", length="255")
     */
    private $deliveryTownCity;
    
    /**
     * @ORM\Column(name="delivery_county_state", type="string", length="255")
     */
    private $deliveryCountyState;
    
    /**
     * @ORM\Column(name="delivery_post_zip_code", type="string", length="255")
     */
    private $deliveryPostZipCode;
    
    /**
     * @ORM\Column(name="delivery_country_code", type="string", length="2")
     */
    private $deliveryCountryCode;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_start", type="string", length="255")
     */
    private $estimatedDeliveryDaysStart;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_end", type="string", length="255")
     */
    private $estimatedDeliveryDaysEnd;
    
    /**
     * @ORM\Column(name="order_printed", type="integer", length="1")
     */
    private $orderPrinted;
    
    /**
     * @ORM\Column(name="delivery_note_printed", type="integer", length="1")
     */
    private $deliveryNotePrinted;
    
    /**
     * @ORM\Column(name="actioned", type="integer", length="1")
     */
    private $actioned;
    
    /**
     * @ORM\Column(name="fraud_check_customer_ordered", type="integer", length="1")
     */
    private $fraudCheckCustomerOrdered;
    
    /**
     * @ORM\Column(name="fraud_check_address_match", type="integer", length="1")
     */
    private $fraudCheckAddressMatch;
    
    /**
     * @ORM\Column(name="fraud_check_name_used_on_different_order", type="integer", length="1")
     */
    private $fraudCheckNameUsedOnDifferentOrder;
    
    /**
     * @ORM\Column(name="fraud_check_post_zip_code_used_on_different_order", type="integer", length="1")
     */
    private $fraudCheckPostZipCodeUsedOnDifferentOrder;
    
    /**
     * @ORM\Column(name="fraud_check_telephone_used_on_different_order", type="integer", length="1")
     */
    private $fraudCheckTelephoneUsedOnDifferentOrder;
                    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Get statusColour
     *
     * @return string 
     */
    public function getStatusColour()
    {
        switch ($this->status)
    	{
    		case 'Open Payment':
    			return 'red';
    		case 'Payment Failed':
    			return 'dark-red';
    		case 'Cancelled':
    			return 'black';
    		case 'Payment Received':
    			return 'green';
    		case 'Processing Your Order':
    			return 'yellow';
    		case 'Back Ordered':
    			return 'orange';
    		case 'Part Delivered':
    			return 'turquoise';
    		case 'Order with Delivery Company':
    			return 'blue';
    		case 'Order Completed':
    			return 'grey';
    	}
        return '';
    }

    /**
     * Set paymentType
     *
     * @param string $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * Get paymentType
     *
     * @return string 
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }
    
    /**
     * Get paymentTypeLogo
     *
     * @return string 
     */
    public function getPaymentTypeLogo()
    {
    	switch ($this->paymentType)
    	{
    		case 'SagePay':
    			return 'bundles/webilluminationadmin/images/logos/sage-pay-small.png';
    		case 'PayPal through SagePay':
    			return 'bundles/webilluminationadmin/images/logos/pay-pal-through-sage-pay-small.png';
    		case 'PayPal':
    			return 'bundles/webilluminationadmin/images/logos/pay-pal-small.png';
    		case 'Google Wallet':
    			return 'bundles/webilluminationadmin/images/logos/google-wallet-small.png';
    		case 'Voucher Code':
    			return 'bundles/webilluminationadmin/images/logos/voucher-code-small.png';
    		case 'Gift Voucher':
    			return 'bundles/webilluminationadmin/images/logos/gift-voucher-small.png';
    	}
        return '';
    }

    /**
     * Set paymentResponse
     *
     * @param text $paymentResponse
     */
    public function setPaymentResponse($paymentResponse)
    {
        $this->paymentResponse = $paymentResponse;
    }

    /**
     * Get paymentResponse
     *
     * @return text 
     */
    public function getPaymentResponse()
    {
    	if ($this->paymentResponse != '')
    	{
    		return unserialize(base64_decode($this->paymentResponse));
    	}
     	return '';   
    }
    
    /**
     * Get paymentResponseFraudIcon
     *
     * @return text 
     */
    public function getPaymentResponseFraudIcon()
    {
    	$icon = 'green';
    	if ($this->fraudCheckNameUsedOnDifferentOrder > 0)
    	{
    		$icon = 'red';
    	}
    	if ($this->fraudCheckPostZipCodeUsedOnDifferentOrder > 0)
    	{
    		$icon = 'red';
    	}
    	if ($this->fraudCheckTelephoneUsedOnDifferentOrder > 0)
    	{
    		$icon = 'red';
    	}
    	
    	// Get the payment response
    	$paymentResponse = $this->getPaymentResponse();
    	
    	if ($paymentResponse != '')
    	{
	    	if ($icon != 'red')
	    	{
		    	switch ($this->paymentType)
		    	{
		    		case 'SagePay':
		    			if (isset($paymentResponse['AVSCV2']))
		    			{
			    			if ($paymentResponse['AVSCV2'] == 'NO DATA MATCHES')
			    			{
			    				$icon = 'red';
			    			} elseif (($paymentResponse['AVSCV2'] == 'SECURITY CODE MATCH ONLY') || ($paymentResponse['AVSCV2'] == 'ADDRESS MATCH ONLY') || ($paymentResponse['AVSCV2'] == 'DATA NOT CHECKED')) {
			    				$icon = 'yellow';
			    			}
			    		}
		    			if ($icon != 'red')
		    			{
		    				if (isset($paymentResponse['AddressResult']))
		    				{
			    				if ($paymentResponse['AddressResult'] == 'NOTMATCHED')
				    			{
				    				$icon = 'red';
				    			} elseif (($paymentResponse['AddressResult'] == 'NOTPROVIDED') || ($paymentResponse['AddressResult'] == 'NOTCHECKED')) {
				    				$icon = 'yellow';
				    			}
				    		}
		    			}
		    			if ($icon != 'red')
		    			{
		    				if (isset($paymentResponse['PostCodeResult']))
		    				{
			    				if ($paymentResponse['PostCodeResult'] == 'NOTMATCHED')
				    			{
				    				$icon = 'red';
				    			} elseif (($paymentResponse['PostCodeResult'] == 'NOTPROVIDED') || ($paymentResponse['PostCodeResult'] == 'NOTCHECKED')) {
				    				$icon = 'yellow';
				    			}
				    		}
		    			}
		    			if ($icon != 'red')
		    			{
		    				if (isset($paymentResponse['CV2Result']))
		    				{
			    				if ($paymentResponse['CV2Result'] == 'NOTMATCHED')
				    			{
				    				$icon = 'red';
				    			} elseif (($paymentResponse['CV2Result'] == 'NOTPROVIDED') || ($paymentResponse['CV2Result'] == 'NOTCHECKED')) {
				    				$icon = 'yellow';
				    			}
				    		}
		    			}
		    			if ($icon != 'red')
		    			{
		    				if (isset($paymentResponse['3DSecureStatus']))
		    				{
			    				if ($paymentResponse['3DSecureStatus'] == 'NOTAUTHED')
				    			{
				    				$icon = 'red';
				    			} elseif (($paymentResponse['3DSecureStatus'] == 'NOTCHECKED') || ($paymentResponse['3DSecureStatus'] == 'NOTAVAILABLE') || ($paymentResponse['3DSecureStatus'] == 'INCOMPLETE') || ($paymentResponse['3DSecureStatus'] == 'ERROR')) {
				    				$icon = 'yellow';
				    			}
				    		}
		    			}
		    			break;
		    		case 'PayPal through SagePay':
		    			if (isset($paymentResponse['PayerStatus']))
		    			{
			    			if ($paymentResponse['PayerStatus'] == 'UNVERIFIED')
			    			{
			    				$icon = 'red';
			    			}
			    		}
		    			if ($icon != 'red')
		    			{
		    				if (isset($paymentResponse['AddressStatus']))
		    				{
				    			if ($paymentResponse['AddressStatus'] == 'UNCONFIRMED')
				    			{
				    				$icon = 'red';
				    			} elseif ($paymentResponse['AddressStatus'] == 'NONE') {
				    				$icon = 'yellow';
				    			}
				    		}
			    		}
		    			break;
		    		case 'PayPal':
		    			break;
		    		case 'Google Wallet':
		    			break;
		    	}
		    }
		}
        return 'bundles/webilluminationadmin/images/icons/'.$icon.'-light-icon.png';
    }

    /**
     * Set deliveryType
     *
     * @param string $deliveryType
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
    }

    /**
     * Get deliveryType
     *
     * @return string 
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * Set items
     *
     * @param string $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Get items
     *
     * @return string 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set subTotal
     *
     * @param decimal $subTotal
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get subTotal
     *
     * @return decimal 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set deliveryCharge
     *
     * @param decimal $deliveryCharge
     */
    public function setDeliveryCharge($deliveryCharge)
    {
        $this->deliveryCharge = $deliveryCharge;
    }

    /**
     * Get deliveryCharge
     *
     * @return decimal 
     */
    public function getDeliveryCharge()
    {
        return $this->deliveryCharge;
    }

    /**
     * Set discount
     *
     * @param decimal $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Get discount
     *
     * @return decimal 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set vat
     *
     * @param decimal $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * Get vat
     *
     * @return decimal 
     */
    public function getVat()
    {
        return $this->vat;
    }
    
    /**
     * Set total
     *
     * @param decimal $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Get total
     *
     * @return decimal 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set membershipCardNumber
     *
     * @param string $membershipCardNumber
     */
    public function setMembershipCardNumber($membershipCardNumber)
    {
        $this->membershipCardNumber = $membershipCardNumber;
    }

    /**
     * Get membershipCardNumber
     *
     * @return string 
     */
    public function getMembershipCardNumber()
    {
        return $this->membershipCardNumber;
    }

    /**
     * Set possibleDiscount
     *
     * @param decimal $possibleDiscount
     */
    public function setPossibleDiscount($possibleDiscount)
    {
        $this->possibleDiscount = $possibleDiscount;
    }

    /**
     * Get possibleDiscount
     *
     * @return decimal 
     */
    public function getPossibleDiscount()
    {
        return $this->possibleDiscount;
    }
    
    /**
     * Set discountsCount
     *
     * @param integer $discountsCount
     */
    public function setDiscountsCount($discountsCount)
    {
        $this->discountsCount = $discountsCount;
    }

    /**
     * Get discountsCount
     *
     * @return integer 
     */
    public function getDiscountsCount()
    {
        return $this->discountsCount;
    }
    
    /**
     * Set notesCount
     *
     * @param integer $notesCount
     */
    public function setNotesCount($notesCount)
    {
        $this->notesCount = $notesCount;
    }

    /**
     * Get notesCount
     *
     * @return integer 
     */
    public function getNotesCount()
    {
        return $this->notesCount;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Set organisationName
     *
     * @param string $organisationName
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;
    }

    /**
     * Get organisationName
     *
     * @return string 
     */
    public function getOrganisationName()
    {
        return $this->organisationName;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set telephoneDaytime
     *
     * @param string $telephoneDaytime
     */
    public function setTelephoneDaytime($telephoneDaytime)
    {
        $this->telephoneDaytime = $telephoneDaytime;
    }

    /**
     * Get telephoneDaytime
     *
     * @return string 
     */
    public function getTelephoneDaytime()
    {
        return $this->telephoneDaytime;
    }

    /**
     * Set telephoneEvening
     *
     * @param string $telephoneEvening
     */
    public function setTelephoneEvening($telephoneEvening)
    {
        $this->telephoneEvening = $telephoneEvening;
    }

    /**
     * Get telephoneEvening
     *
     * @return string 
     */
    public function getTelephoneEvening()
    {
        return $this->telephoneEvening;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set billingFirstName
     *
     * @param string $billingFirstName
     */
    public function setBillingFirstName($billingFirstName)
    {
        $this->billingFirstName = $billingFirstName;
    }

    /**
     * Get billingFirstName
     *
     * @return string 
     */
    public function getBillingFirstName()
    {
        return $this->billingFirstName;
    }

    /**
     * Set billingLastName
     *
     * @param string $billingLastName
     */
    public function setBillingLastName($billingLastName)
    {
        $this->billingLastName = $billingLastName;
    }

    /**
     * Get billingLastName
     *
     * @return string 
     */
    public function getBillingLastName()
    {
        return $this->billingLastName;
    }

    /**
     * Set billingOrganisationName
     *
     * @param string $billingOrganisationName
     */
    public function setBillingOrganisationName($billingOrganisationName)
    {
        $this->billingOrganisationName = $billingOrganisationName;
    }

    /**
     * Get billingOrganisationName
     *
     * @return string 
     */
    public function getBillingOrganisationName()
    {
        return $this->billingOrganisationName;
    }

    /**
     * Set billingAddressLine1
     *
     * @param string $billingAddressLine1
     */
    public function setBillingAddressLine1($billingAddressLine1)
    {
        $this->billingAddressLine1 = $billingAddressLine1;
    }

    /**
     * Get billingAddressLine1
     *
     * @return string 
     */
    public function getBillingAddressLine1()
    {
        return $this->billingAddressLine1;
    }

    /**
     * Set billingAddressLine2
     *
     * @param string $billingAddressLine2
     */
    public function setBillingAddressLine2($billingAddressLine2)
    {
        $this->billingAddressLine2 = $billingAddressLine2;
    }

    /**
     * Get billingAddressLine2
     *
     * @return string 
     */
    public function getBillingAddressLine2()
    {
        return $this->billingAddressLine2;
    }

    /**
     * Set billingTownCity
     *
     * @param string $billingTownCity
     */
    public function setBillingTownCity($billingTownCity)
    {
        $this->billingTownCity = $billingTownCity;
    }

    /**
     * Get billingTownCity
     *
     * @return string 
     */
    public function getBillingTownCity()
    {
        return $this->billingTownCity;
    }

    /**
     * Set billingCountyState
     *
     * @param string $billingCountyState
     */
    public function setBillingCountyState($billingCountyState)
    {
        $this->billingCountyState = $billingCountyState;
    }

    /**
     * Get billingCountyState
     *
     * @return string 
     */
    public function getBillingCountyState()
    {
        return $this->billingCountyState;
    }

    /**
     * Set billingPostZipCode
     *
     * @param string $billingPostZipCode
     */
    public function setBillingPostZipCode($billingPostZipCode)
    {
        $this->billingPostZipCode = $billingPostZipCode;
    }

    /**
     * Get billingPostZipCode
     *
     * @return string 
     */
    public function getBillingPostZipCode()
    {
        return $this->billingPostZipCode;
    }

    /**
     * Set billingCountryCode
     *
     * @param string $billingCountryCode
     */
    public function setBillingCountryCode($billingCountryCode)
    {
        $this->billingCountryCode = $billingCountryCode;
    }

    /**
     * Get billingCountryCode
     *
     * @return string 
     */
    public function getBillingCountryCode()
    {
        return $this->billingCountryCode;
    }

    /**
     * Set deliveryFirstName
     *
     * @param string $deliveryFirstName
     */
    public function setDeliveryFirstName($deliveryFirstName)
    {
        $this->deliveryFirstName = $deliveryFirstName;
    }

    /**
     * Get deliveryFirstName
     *
     * @return string 
     */
    public function getDeliveryFirstName()
    {
        return $this->deliveryFirstName;
    }

    /**
     * Set deliveryLastName
     *
     * @param string $deliveryLastName
     */
    public function setDeliveryLastName($deliveryLastName)
    {
        $this->deliveryLastName = $deliveryLastName;
    }

    /**
     * Get deliveryLastName
     *
     * @return string 
     */
    public function getDeliveryLastName()
    {
        return $this->deliveryLastName;
    }

    /**
     * Set deliveryOrganisationName
     *
     * @param string $deliveryOrganisationName
     */
    public function setDeliveryOrganisationName($deliveryOrganisationName)
    {
        $this->deliveryOrganisationName = $deliveryOrganisationName;
    }

    /**
     * Get deliveryOrganisationName
     *
     * @return string 
     */
    public function getDeliveryOrganisationName()
    {
        return $this->deliveryOrganisationName;
    }

    /**
     * Set deliveryAddressLine1
     *
     * @param string $deliveryAddressLine1
     */
    public function setDeliveryAddressLine1($deliveryAddressLine1)
    {
        $this->deliveryAddressLine1 = $deliveryAddressLine1;
    }

    /**
     * Get deliveryAddressLine1
     *
     * @return string 
     */
    public function getDeliveryAddressLine1()
    {
        return $this->deliveryAddressLine1;
    }

    /**
     * Set deliveryAddressLine2
     *
     * @param string $deliveryAddressLine2
     */
    public function setDeliveryAddressLine2($deliveryAddressLine2)
    {
        $this->deliveryAddressLine2 = $deliveryAddressLine2;
    }

    /**
     * Get deliveryAddressLine2
     *
     * @return string 
     */
    public function getDeliveryAddressLine2()
    {
        return $this->deliveryAddressLine2;
    }

    /**
     * Set deliveryTownCity
     *
     * @param string $deliveryTownCity
     */
    public function setDeliveryTownCity($deliveryTownCity)
    {
        $this->deliveryTownCity = $deliveryTownCity;
    }

    /**
     * Get deliveryTownCity
     *
     * @return string 
     */
    public function getDeliveryTownCity()
    {
        return $this->deliveryTownCity;
    }

    /**
     * Set deliveryCountyState
     *
     * @param string $deliveryCountyState
     */
    public function setDeliveryCountyState($deliveryCountyState)
    {
        $this->deliveryCountyState = $deliveryCountyState;
    }

    /**
     * Get deliveryCountyState
     *
     * @return string 
     */
    public function getDeliveryCountyState()
    {
        return $this->deliveryCountyState;
    }

    /**
     * Set deliveryPostZipCode
     *
     * @param string $deliveryPostZipCode
     */
    public function setDeliveryPostZipCode($deliveryPostZipCode)
    {
        $this->deliveryPostZipCode = $deliveryPostZipCode;
    }

    /**
     * Get deliveryPostZipCode
     *
     * @return string 
     */
    public function getDeliveryPostZipCode()
    {
        return $this->deliveryPostZipCode;
    }

    /**
     * Set deliveryCountryCode
     *
     * @param string $deliveryCountryCode
     */
    public function setDeliveryCountryCode($deliveryCountryCode)
    {
        $this->deliveryCountryCode = $deliveryCountryCode;
    }

    /**
     * Get deliveryCountryCode
     *
     * @return string 
     */
    public function getDeliveryCountryCode()
    {
        return $this->deliveryCountryCode;
    }

    /**
     * Set estimatedDeliveryDaysStart
     *
     * @param string $estimatedDeliveryDaysStart
     */
    public function setEstimatedDeliveryDaysStart($estimatedDeliveryDaysStart)
    {
        $this->estimatedDeliveryDaysStart = $estimatedDeliveryDaysStart;
    }

    /**
     * Get estimatedDeliveryDaysStart
     *
     * @return string 
     */
    public function getEstimatedDeliveryDaysStart()
    {
        return $this->estimatedDeliveryDaysStart;
    }

    /**
     * Set estimatedDeliveryDaysEnd
     *
     * @param string $estimatedDeliveryDaysEnd
     */
    public function setEstimatedDeliveryDaysEnd($estimatedDeliveryDaysEnd)
    {
        $this->estimatedDeliveryDaysEnd = $estimatedDeliveryDaysEnd;
    }

    /**
     * Get estimatedDeliveryDaysEnd
     *
     * @return string 
     */
    public function getEstimatedDeliveryDaysEnd()
    {
        return $this->estimatedDeliveryDaysEnd;
    }

    /**
     * Set orderPrinted
     *
     * @param integer $orderPrinted
     */
    public function setOrderPrinted($orderPrinted)
    {
        $this->orderPrinted = $orderPrinted;
    }

    /**
     * Get orderPrinted
     *
     * @return integer 
     */
    public function getOrderPrinted()
    {
        return $this->orderPrinted;
    }

    /**
     * Set deliveryNotePrinted
     *
     * @param integer $deliveryNotePrinted
     */
    public function setDeliveryNotePrinted($deliveryNotePrinted)
    {
        $this->deliveryNotePrinted = $deliveryNotePrinted;
    }

    /**
     * Get deliveryNotePrinted
     *
     * @return integer 
     */
    public function getDeliveryNotePrinted()
    {
        return $this->deliveryNotePrinted;
    }

    /**
     * Set actioned
     *
     * @param integer $actioned
     */
    public function setActioned($actioned)
    {
        $this->actioned = $actioned;
    }

    /**
     * Get actioned
     *
     * @return integer 
     */
    public function getActioned()
    {
        return $this->actioned;
    }

    /**
     * Set fraudCheckCustomerOrdered
     *
     * @param integer $fraudCheckCustomerOrdered
     */
    public function setFraudCheckCustomerOrdered($fraudCheckCustomerOrdered)
    {
        $this->fraudCheckCustomerOrdered = $fraudCheckCustomerOrdered;
    }

    /**
     * Get fraudCheckCustomerOrdered
     *
     * @return integer 
     */
    public function getFraudCheckCustomerOrdered()
    {
        return $this->fraudCheckCustomerOrdered;
    }

    /**
     * Set fraudCheckAddressMatch
     *
     * @param integer $fraudCheckAddressMatch
     */
    public function setFraudCheckAddressMatch($fraudCheckAddressMatch)
    {
        $this->fraudCheckAddressMatch = $fraudCheckAddressMatch;
    }

    /**
     * Get fraudCheckAddressMatch
     *
     * @return integer 
     */
    public function getFraudCheckAddressMatch()
    {
        return $this->fraudCheckAddressMatch;
    }

    /**
     * Set fraudCheckNameUsedOnDifferentOrder
     *
     * @param integer $fraudCheckNameUsedOnDifferentOrder
     */
    public function setFraudCheckNameUsedOnDifferentOrder($fraudCheckNameUsedOnDifferentOrder)
    {
        $this->fraudCheckNameUsedOnDifferentOrder = $fraudCheckNameUsedOnDifferentOrder;
    }

    /**
     * Get fraudCheckNameUsedOnDifferentOrder
     *
     * @return integer 
     */
    public function getFraudCheckNameUsedOnDifferentOrder()
    {
        return $this->fraudCheckNameUsedOnDifferentOrder;
    }

    /**
     * Set fraudCheckPostZipCodeUsedOnDifferentOrder
     *
     * @param integer $fraudCheckPostZipCodeUsedOnDifferentOrder
     */
    public function setFraudCheckPostZipCodeUsedOnDifferentOrder($fraudCheckPostZipCodeUsedOnDifferentOrder)
    {
        $this->fraudCheckPostZipCodeUsedOnDifferentOrder = $fraudCheckPostZipCodeUsedOnDifferentOrder;
    }

    /**
     * Get fraudCheckPostZipCodeUsedOnDifferentOrder
     *
     * @return integer 
     */
    public function getFraudCheckPostZipCodeUsedOnDifferentOrder()
    {
        return $this->fraudCheckPostZipCodeUsedOnDifferentOrder;
    }

    /**
     * Set fraudCheckTelephoneUsedOnDifferentOrder
     *
     * @param integer $fraudCheckTelephoneUsedOnDifferentOrder
     */
    public function setFraudCheckTelephoneUsedOnDifferentOrder($fraudCheckTelephoneUsedOnDifferentOrder)
    {
        $this->fraudCheckTelephoneUsedOnDifferentOrder = $fraudCheckTelephoneUsedOnDifferentOrder;
    }

    /**
     * Get fraudCheckTelephoneUsedOnDifferentOrder
     *
     * @return integer 
     */
    public function getFraudCheckTelephoneUsedOnDifferentOrder()
    {
        return $this->fraudCheckTelephoneUsedOnDifferentOrder;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set membershipCardPurchased
     *
     * @param integer $membershipCardPurchased
     */
    public function setMembershipCardPurchased($membershipCardPurchased)
    {
        $this->membershipCardPurchased = $membershipCardPurchased;
    }

    /**
     * Get membershipCardPurchased
     *
     * @return integer 
     */
    public function getMembershipCardPurchased()
    {
        return $this->membershipCardPurchased;
    }
}