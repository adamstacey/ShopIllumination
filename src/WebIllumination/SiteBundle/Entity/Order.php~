<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="WebIllumination\SiteBundle\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="user_id", type="integer", length=11)
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Order\Discount", mappedBy="order")
     */
    private $discounts;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Order\Donation", mappedBy="order")
     */
    private $donations;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Order\Product", mappedBy="order")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Order\Note", mappedBy="order")
     */
    private $notes;
    
    /**
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
        
    /**
     * @ORM\Column(name="payment_type", type="string", length=255)
     */
    private $paymentType;
    
    /**
     * @ORM\Column(name="payment_response", type="text")
     */
    private $paymentResponse;
    
    /**
     * @ORM\Column(name="delivery_type", type="string", length=255)
     */
    private $deliveryType;
    
    /**
     * @ORM\Column(name="courier", type="string", length=255)
     */
    private $courier;
    
    /**
     * @ORM\Column(name="number_of_packages", type="integer", length=3)
     */
    private $numberOfPackages;
    
    /**
     * @ORM\Column(name="tracking_number", type="string", length=255)
     */
    private $trackingNumber;
        
    /**
     * @ORM\Column(name="labels_printed", type="boolean")
     */
    private $labelsPrinted;
    
    /**
     * @ORM\Column(name="send_review_request", type="boolean")
     */
    private $sendReviewRequest;
    
    /**
     * @ORM\Column(name="review_requested", type="boolean")
     */
    private $reviewRequested;
    
    /**
     * @ORM\Column(name="items", type="string", length=255)
     */
    private $items;
        
    /**
     * @ORM\Column(name="sub_total", type="decimal", precision=12, scale=4)
     */
    private $subTotal;
        
    /**
     * @ORM\Column(name="delivery_charge", type="decimal", precision=12, scale=4)
     */
    private $deliveryCharge;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;
    
    /**
     * @ORM\Column(name="vat", type="decimal", precision=12, scale=4)
     */
    private $vat;
    
    /**
     * @ORM\Column(name="total", type="decimal", precision=12, scale=4)
     */
    private $total;
    
    /**
     * @ORM\Column(name="membership_card_purchased", type="boolean")
     */
    private $membershipCardPurchased;
    
    /**
     * @ORM\Column(name="membership_card_number", type="string", length=255)
     */
    private $membershipCardNumber;
    
    /**
     * @ORM\Column(name="possible_discount", type="decimal", precision=12, scale=4)
     */
    private $possibleDiscount;
    
    /**
     * @ORM\Column(name="discounts_count", type="integer", length=11)
     */
    private $discountsCount;
    
    /**
     * @ORM\Column(name="donations_count", type="integer", length=11)
     */
    private $donationsCount;
    
    /**
     * @ORM\Column(name="notes_count", type="integer", length=11)
     */
    private $notesCount;
        
    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="organisation_name", type="string", length=255)
     */
    private $organisationName;
    
    /**
     * @ORM\Column(name="email_address", type="string", length=255)
     */
    private $emailAddress;
    
    /**
     * @ORM\Column(name="telephone_daytime", type="string", length=50)
     */
    private $telephoneDaytime;
    
    /**
     * @ORM\Column(name="telephone_evening", type="string", length=50)
     */
    private $telephoneEvening;
    
    /**
     * @ORM\Column(name="mobile", type="string", length=50)
     */
    private $mobile;
    
    /**
     * @ORM\Column(name="billing_first_name", type="string", length=255)
     */
    private $billingFirstName;
    
    /**
     * @ORM\Column(name="billing_last_name", type="string", length=255)
     */
    private $billingLastName;
    
    /**
     * @ORM\Column(name="billing_organisation_name", type="string", length=255)
     */
    private $billingOrganisationName;
    
    /**
     * @ORM\Column(name="billing_address_line_1", type="string", length=255)
     */
    private $billingAddressLine1;
    
    /**
     * @ORM\Column(name="billing_address_line_2", type="string", length=255)
     */
    private $billingAddressLine2;
    
    /**
     * @ORM\Column(name="billing_town_city", type="string", length=255)
     */
    private $billingTownCity;
    
    /**
     * @ORM\Column(name="billing_county_state", type="string", length=255)
     */
    private $billingCountyState;
    
    /**
     * @ORM\Column(name="billing_post_zip_code", type="string", length=255)
     */
    private $billingPostZipCode;
    
    /**
     * @ORM\Column(name="billing_country_code", type="string", length=2)
     */
    private $billingCountryCode;
    
   	/**
     * @ORM\Column(name="delivery_first_name", type="string", length=255)
     */
    private $deliveryFirstName;
    
    /**
     * @ORM\Column(name="delivery_last_name", type="string", length=255)
     */
    private $deliveryLastName;
    
    /**
     * @ORM\Column(name="delivery_organisation_name", type="string", length=255)
     */
    private $deliveryOrganisationName;
    
    /**
     * @ORM\Column(name="delivery_address_line_1", type="string", length=255)
     */
    private $deliveryAddressLine1;
    
    /**
     * @ORM\Column(name="delivery_address_line_2", type="string", length=255)
     */
    private $deliveryAddressLine2;
    
    /**
     * @ORM\Column(name="delivery_town_city", type="string", length=255)
     */
    private $deliveryTownCity;
    
    /**
     * @ORM\Column(name="delivery_county_state", type="string", length=255)
     */
    private $deliveryCountyState;
    
    /**
     * @ORM\Column(name="delivery_post_zip_code", type="string", length=255)
     */
    private $deliveryPostZipCode;
    
    /**
     * @ORM\Column(name="delivery_country_code", type="string", length=2)
     */
    private $deliveryCountryCode;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_start", type="string", length=255)
     */
    private $estimatedDeliveryDaysStart;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_end", type="string", length=255)
     */
    private $estimatedDeliveryDaysEnd;
    
    /**
     * @ORM\Column(name="order_printed", type="boolean")
     */
    private $orderPrinted;
    
    /**
     * @ORM\Column(name="delivery_note_printed", type="boolean")
     */
    private $deliveryNotePrinted;
    
    /**
     * @ORM\Column(name="actioned", type="boolean")
     */
    private $actioned;
    
    /**
     * @ORM\Column(name="fraud_check_customer_ordered", type="boolean")
     */
    private $fraudCheckCustomerOrdered;
    
    /**
     * @ORM\Column(name="fraud_check_address_match", type="boolean")
     */
    private $fraudCheckAddressMatch;
    
    /**
     * @ORM\Column(name="fraud_check_name_used_on_different_order", type="boolean")
     */
    private $fraudCheckNameUsedOnDifferentOrder;
    
    /**
     * @ORM\Column(name="fraud_check_post_zip_code_used_on_different_order", type="boolean")
     */
    private $fraudCheckPostZipCodeUsedOnDifferentOrder;
    
    /**
     * @ORM\Column(name="fraud_check_telephone_used_on_different_order", type="boolean")
     */
    private $fraudCheckTelephoneUsedOnDifferentOrder;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
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
    			return 'orange';
    		case 'Back Ordered':
    			return 'yellow';
    		case 'Part Delivered':
    			return 'turquoise';
    		case 'Order Ready for Collection':
    		case 'Order with Delivery Company':
    			return 'blue';
    		case 'Order Completed':
    			return 'grey';
    	}
        return '';
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
     * Get paymentResponseFraudColour
     *
     * @return text 
     */
    public function getPaymentResponseFraudColour()
    {
    	$colour = 'green';
    	if ($this->fraudCheckNameUsedOnDifferentOrder > 0)
    	{
    		$colour = 'red';
    	}
    	if ($this->fraudCheckPostZipCodeUsedOnDifferentOrder > 0)
    	{
    		$colour = 'red';
    	}
    	if ($this->fraudCheckTelephoneUsedOnDifferentOrder > 0)
    	{
    		$colour = 'red';
    	}
    	
    	// Get the payment response
    	$paymentResponse = $this->getPaymentResponse();
    	
    	if ($paymentResponse != '')
    	{
	    	if ($colour != 'red')
	    	{
		    	switch ($this->paymentType)
		    	{
		    		case 'SagePay':
		    			if ($colour != 'red')
		    			{
			    			if (isset($paymentResponse['AVSCV2']))
			    			{
				    			if ($paymentResponse['AVSCV2'] == 'NO DATA MATCHES')
				    			{
				    				$colour = 'red';
				    			} elseif (($paymentResponse['AVSCV2'] == 'SECURITY CODE MATCH ONLY') || ($paymentResponse['AVSCV2'] == 'ADDRESS MATCH ONLY') || ($paymentResponse['AVSCV2'] == 'DATA NOT CHECKED')) {
				    				$colour = 'orange';
				    			}
				    		}
				    	}
		    			if ($colour != 'red')
		    			{
		    				if (isset($paymentResponse['AddressResult']))
		    				{
			    				if ($paymentResponse['AddressResult'] == 'NOTMATCHED')
				    			{
				    				$colour = 'red';
				    			} elseif (($paymentResponse['AddressResult'] == 'NOTPROVIDED') || ($paymentResponse['AddressResult'] == 'NOTCHECKED')) {
				    				$colour = 'orange';
				    			}
				    		}
		    			}
		    			if ($colour != 'red')
		    			{
		    				if (isset($paymentResponse['PostCodeResult']))
		    				{
			    				if ($paymentResponse['PostCodeResult'] == 'NOTMATCHED')
				    			{
				    				$colour = 'red';
				    			} elseif (($paymentResponse['PostCodeResult'] == 'NOTPROVIDED') || ($paymentResponse['PostCodeResult'] == 'NOTCHECKED')) {
				    				$colour = 'orange';
				    			}
				    		}
		    			}
		    			if ($colour != 'red')
		    			{
		    				if (isset($paymentResponse['CV2Result']))
		    				{
			    				if ($paymentResponse['CV2Result'] == 'NOTMATCHED')
				    			{
				    				$colour = 'red';
				    			} elseif (($paymentResponse['CV2Result'] == 'NOTPROVIDED') || ($paymentResponse['CV2Result'] == 'NOTCHECKED')) {
				    				$colour = 'orange';
				    			}
				    		}
		    			}
		    			if ($colour != 'red')
		    			{
		    				if (isset($paymentResponse['3DSecureStatus']))
		    				{
			    				if ($paymentResponse['3DSecureStatus'] == 'OK')
				    			{
				    				$colour = 'green';
				    			} else {
				    				$colour = 'red';
				    			}
				    		}
		    			}
		    			break;
		    		case 'PayPal through SagePay':
		    			if (isset($paymentResponse['PayerStatus']))
		    			{
			    			if ($paymentResponse['PayerStatus'] == 'UNVERIFIED')
			    			{
			    				$colour = 'red';
			    			}
			    		}
		    			if ($colour != 'red')
		    			{
		    				if (isset($paymentResponse['AddressStatus']))
		    				{
				    			if ($paymentResponse['AddressStatus'] == 'UNCONFIRMED')
				    			{
				    				$colour = 'red';
				    			} elseif ($paymentResponse['AddressStatus'] == 'NONE') {
				    				$colour = 'orange';
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
        return $colour;
    }
    
    /**
     * Get paymentResponseFraudIcon
     *
     * @return text 
     */
    public function getPaymentResponseFraudIcon()
    {
    	$iconColour = $this->getPaymentResponseFraudColour();
        return 'bundles/webilluminationadmin/images/icons/'.$iconColour.'-light-icon.png';
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
     * @return Order
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
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
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
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
     * Set paymentType
     *
     * @param string $paymentType
     * @return Order
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    
        return $this;
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
     * Set paymentResponse
     *
     * @param string $paymentResponse
     * @return Order
     */
    public function setPaymentResponse($paymentResponse)
    {
        $this->paymentResponse = $paymentResponse;
    
        return $this;
    }

    /**
     * Set deliveryType
     *
     * @param string $deliveryType
     * @return Order
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
    
        return $this;
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
     * Set courier
     *
     * @param string $courier
     * @return Order
     */
    public function setCourier($courier)
    {
        $this->courier = $courier;
    
        return $this;
    }

    /**
     * Get courier
     *
     * @return string 
     */
    public function getCourier()
    {
        return $this->courier;
    }

    /**
     * Set numberOfPackages
     *
     * @param integer $numberOfPackages
     * @return Order
     */
    public function setNumberOfPackages($numberOfPackages)
    {
        $this->numberOfPackages = $numberOfPackages;
    
        return $this;
    }

    /**
     * Get numberOfPackages
     *
     * @return integer 
     */
    public function getNumberOfPackages()
    {
        return $this->numberOfPackages;
    }

    /**
     * Set trackingNumber
     *
     * @param string $trackingNumber
     * @return Order
     */
    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
    
        return $this;
    }

    /**
     * Get trackingNumber
     *
     * @return string 
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * Set labelsPrinted
     *
     * @param boolean $labelsPrinted
     * @return Order
     */
    public function setLabelsPrinted($labelsPrinted)
    {
        $this->labelsPrinted = $labelsPrinted;
    
        return $this;
    }

    /**
     * Get labelsPrinted
     *
     * @return boolean 
     */
    public function getLabelsPrinted()
    {
        return $this->labelsPrinted;
    }

    /**
     * Set sendReviewRequest
     *
     * @param boolean $sendReviewRequest
     * @return Order
     */
    public function setSendReviewRequest($sendReviewRequest)
    {
        $this->sendReviewRequest = $sendReviewRequest;
    
        return $this;
    }

    /**
     * Get sendReviewRequest
     *
     * @return boolean 
     */
    public function getSendReviewRequest()
    {
        return $this->sendReviewRequest;
    }

    /**
     * Set reviewRequested
     *
     * @param boolean $reviewRequested
     * @return Order
     */
    public function setReviewRequested($reviewRequested)
    {
        $this->reviewRequested = $reviewRequested;
    
        return $this;
    }

    /**
     * Get reviewRequested
     *
     * @return boolean 
     */
    public function getReviewRequested()
    {
        return $this->reviewRequested;
    }

    /**
     * Set items
     *
     * @param string $items
     * @return Order
     */
    public function setItems($items)
    {
        $this->items = $items;
    
        return $this;
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
     * @param float $subTotal
     * @return Order
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    
        return $this;
    }

    /**
     * Get subTotal
     *
     * @return float 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set deliveryCharge
     *
     * @param float $deliveryCharge
     * @return Order
     */
    public function setDeliveryCharge($deliveryCharge)
    {
        $this->deliveryCharge = $deliveryCharge;
    
        return $this;
    }

    /**
     * Get deliveryCharge
     *
     * @return float 
     */
    public function getDeliveryCharge()
    {
        return $this->deliveryCharge;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return Order
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set vat
     *
     * @param float $vat
     * @return Order
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    
        return $this;
    }

    /**
     * Get vat
     *
     * @return float 
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Order
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set membershipCardPurchased
     *
     * @param boolean $membershipCardPurchased
     * @return Order
     */
    public function setMembershipCardPurchased($membershipCardPurchased)
    {
        $this->membershipCardPurchased = $membershipCardPurchased;
    
        return $this;
    }

    /**
     * Get membershipCardPurchased
     *
     * @return boolean 
     */
    public function getMembershipCardPurchased()
    {
        return $this->membershipCardPurchased;
    }

    /**
     * Set membershipCardNumber
     *
     * @param string $membershipCardNumber
     * @return Order
     */
    public function setMembershipCardNumber($membershipCardNumber)
    {
        $this->membershipCardNumber = $membershipCardNumber;
    
        return $this;
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
     * @param float $possibleDiscount
     * @return Order
     */
    public function setPossibleDiscount($possibleDiscount)
    {
        $this->possibleDiscount = $possibleDiscount;
    
        return $this;
    }

    /**
     * Get possibleDiscount
     *
     * @return float 
     */
    public function getPossibleDiscount()
    {
        return $this->possibleDiscount;
    }

    /**
     * Set discountsCount
     *
     * @param integer $discountsCount
     * @return Order
     */
    public function setDiscountsCount($discountsCount)
    {
        $this->discountsCount = $discountsCount;
    
        return $this;
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
     * Set donationsCount
     *
     * @param integer $donationsCount
     * @return Order
     */
    public function setDonationsCount($donationsCount)
    {
        $this->donationsCount = $donationsCount;
    
        return $this;
    }

    /**
     * Get donationsCount
     *
     * @return integer 
     */
    public function getDonationsCount()
    {
        return $this->donationsCount;
    }

    /**
     * Set notesCount
     *
     * @param integer $notesCount
     * @return Order
     */
    public function setNotesCount($notesCount)
    {
        $this->notesCount = $notesCount;
    
        return $this;
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
     * @return Order
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
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
     * @return Order
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
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
     * @return Order
     */
    public function setOrganisationName($organisationName)
    {
        $this->organisationName = $organisationName;
    
        return $this;
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
     * @return Order
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    
        return $this;
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
     * @return Order
     */
    public function setTelephoneDaytime($telephoneDaytime)
    {
        $this->telephoneDaytime = $telephoneDaytime;
    
        return $this;
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
     * @return Order
     */
    public function setTelephoneEvening($telephoneEvening)
    {
        $this->telephoneEvening = $telephoneEvening;
    
        return $this;
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
     * @return Order
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    
        return $this;
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
     * @return Order
     */
    public function setBillingFirstName($billingFirstName)
    {
        $this->billingFirstName = $billingFirstName;
    
        return $this;
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
     * @return Order
     */
    public function setBillingLastName($billingLastName)
    {
        $this->billingLastName = $billingLastName;
    
        return $this;
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
     * @return Order
     */
    public function setBillingOrganisationName($billingOrganisationName)
    {
        $this->billingOrganisationName = $billingOrganisationName;
    
        return $this;
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
     * @return Order
     */
    public function setBillingAddressLine1($billingAddressLine1)
    {
        $this->billingAddressLine1 = $billingAddressLine1;
    
        return $this;
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
     * @return Order
     */
    public function setBillingAddressLine2($billingAddressLine2)
    {
        $this->billingAddressLine2 = $billingAddressLine2;
    
        return $this;
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
     * @return Order
     */
    public function setBillingTownCity($billingTownCity)
    {
        $this->billingTownCity = $billingTownCity;
    
        return $this;
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
     * @return Order
     */
    public function setBillingCountyState($billingCountyState)
    {
        $this->billingCountyState = $billingCountyState;
    
        return $this;
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
     * @return Order
     */
    public function setBillingPostZipCode($billingPostZipCode)
    {
        $this->billingPostZipCode = $billingPostZipCode;
    
        return $this;
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
     * @return Order
     */
    public function setBillingCountryCode($billingCountryCode)
    {
        $this->billingCountryCode = $billingCountryCode;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryFirstName($deliveryFirstName)
    {
        $this->deliveryFirstName = $deliveryFirstName;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryLastName($deliveryLastName)
    {
        $this->deliveryLastName = $deliveryLastName;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryOrganisationName($deliveryOrganisationName)
    {
        $this->deliveryOrganisationName = $deliveryOrganisationName;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryAddressLine1($deliveryAddressLine1)
    {
        $this->deliveryAddressLine1 = $deliveryAddressLine1;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryAddressLine2($deliveryAddressLine2)
    {
        $this->deliveryAddressLine2 = $deliveryAddressLine2;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryTownCity($deliveryTownCity)
    {
        $this->deliveryTownCity = $deliveryTownCity;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryCountyState($deliveryCountyState)
    {
        $this->deliveryCountyState = $deliveryCountyState;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryPostZipCode($deliveryPostZipCode)
    {
        $this->deliveryPostZipCode = $deliveryPostZipCode;
    
        return $this;
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
     * @return Order
     */
    public function setDeliveryCountryCode($deliveryCountryCode)
    {
        $this->deliveryCountryCode = $deliveryCountryCode;
    
        return $this;
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
     * @return Order
     */
    public function setEstimatedDeliveryDaysStart($estimatedDeliveryDaysStart)
    {
        $this->estimatedDeliveryDaysStart = $estimatedDeliveryDaysStart;
    
        return $this;
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
     * @return Order
     */
    public function setEstimatedDeliveryDaysEnd($estimatedDeliveryDaysEnd)
    {
        $this->estimatedDeliveryDaysEnd = $estimatedDeliveryDaysEnd;
    
        return $this;
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
     * @param boolean $orderPrinted
     * @return Order
     */
    public function setOrderPrinted($orderPrinted)
    {
        $this->orderPrinted = $orderPrinted;
    
        return $this;
    }

    /**
     * Get orderPrinted
     *
     * @return boolean 
     */
    public function getOrderPrinted()
    {
        return $this->orderPrinted;
    }

    /**
     * Set deliveryNotePrinted
     *
     * @param boolean $deliveryNotePrinted
     * @return Order
     */
    public function setDeliveryNotePrinted($deliveryNotePrinted)
    {
        $this->deliveryNotePrinted = $deliveryNotePrinted;
    
        return $this;
    }

    /**
     * Get deliveryNotePrinted
     *
     * @return boolean 
     */
    public function getDeliveryNotePrinted()
    {
        return $this->deliveryNotePrinted;
    }

    /**
     * Set actioned
     *
     * @param boolean $actioned
     * @return Order
     */
    public function setActioned($actioned)
    {
        $this->actioned = $actioned;
    
        return $this;
    }

    /**
     * Get actioned
     *
     * @return boolean 
     */
    public function getActioned()
    {
        return $this->actioned;
    }

    /**
     * Set fraudCheckCustomerOrdered
     *
     * @param boolean $fraudCheckCustomerOrdered
     * @return Order
     */
    public function setFraudCheckCustomerOrdered($fraudCheckCustomerOrdered)
    {
        $this->fraudCheckCustomerOrdered = $fraudCheckCustomerOrdered;
    
        return $this;
    }

    /**
     * Get fraudCheckCustomerOrdered
     *
     * @return boolean 
     */
    public function getFraudCheckCustomerOrdered()
    {
        return $this->fraudCheckCustomerOrdered;
    }

    /**
     * Set fraudCheckAddressMatch
     *
     * @param boolean $fraudCheckAddressMatch
     * @return Order
     */
    public function setFraudCheckAddressMatch($fraudCheckAddressMatch)
    {
        $this->fraudCheckAddressMatch = $fraudCheckAddressMatch;
    
        return $this;
    }

    /**
     * Get fraudCheckAddressMatch
     *
     * @return boolean 
     */
    public function getFraudCheckAddressMatch()
    {
        return $this->fraudCheckAddressMatch;
    }

    /**
     * Set fraudCheckNameUsedOnDifferentOrder
     *
     * @param boolean $fraudCheckNameUsedOnDifferentOrder
     * @return Order
     */
    public function setFraudCheckNameUsedOnDifferentOrder($fraudCheckNameUsedOnDifferentOrder)
    {
        $this->fraudCheckNameUsedOnDifferentOrder = $fraudCheckNameUsedOnDifferentOrder;
    
        return $this;
    }

    /**
     * Get fraudCheckNameUsedOnDifferentOrder
     *
     * @return boolean 
     */
    public function getFraudCheckNameUsedOnDifferentOrder()
    {
        return $this->fraudCheckNameUsedOnDifferentOrder;
    }

    /**
     * Set fraudCheckPostZipCodeUsedOnDifferentOrder
     *
     * @param boolean $fraudCheckPostZipCodeUsedOnDifferentOrder
     * @return Order
     */
    public function setFraudCheckPostZipCodeUsedOnDifferentOrder($fraudCheckPostZipCodeUsedOnDifferentOrder)
    {
        $this->fraudCheckPostZipCodeUsedOnDifferentOrder = $fraudCheckPostZipCodeUsedOnDifferentOrder;
    
        return $this;
    }

    /**
     * Get fraudCheckPostZipCodeUsedOnDifferentOrder
     *
     * @return boolean 
     */
    public function getFraudCheckPostZipCodeUsedOnDifferentOrder()
    {
        return $this->fraudCheckPostZipCodeUsedOnDifferentOrder;
    }

    /**
     * Set fraudCheckTelephoneUsedOnDifferentOrder
     *
     * @param boolean $fraudCheckTelephoneUsedOnDifferentOrder
     * @return Order
     */
    public function setFraudCheckTelephoneUsedOnDifferentOrder($fraudCheckTelephoneUsedOnDifferentOrder)
    {
        $this->fraudCheckTelephoneUsedOnDifferentOrder = $fraudCheckTelephoneUsedOnDifferentOrder;
    
        return $this;
    }

    /**
     * Get fraudCheckTelephoneUsedOnDifferentOrder
     *
     * @return boolean 
     */
    public function getFraudCheckTelephoneUsedOnDifferentOrder()
    {
        return $this->fraudCheckTelephoneUsedOnDifferentOrder;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Order
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->discounts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->donations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add discounts
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Discount $discounts
     * @return Order
     */
    public function addDiscount(\WebIllumination\SiteBundle\Entity\Order\Discount $discounts)
    {
        $this->discounts[] = $discounts;
    
        return $this;
    }

    /**
     * Remove discounts
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Discount $discounts
     */
    public function removeDiscount(\WebIllumination\SiteBundle\Entity\Order\Discount $discounts)
    {
        $this->discounts->removeElement($discounts);
    }

    /**
     * Get discounts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Add donations
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Donation $donations
     * @return Order
     */
    public function addDonation(\WebIllumination\SiteBundle\Entity\Order\Donation $donations)
    {
        $this->donations[] = $donations;
    
        return $this;
    }

    /**
     * Remove donations
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Donation $donations
     */
    public function removeDonation(\WebIllumination\SiteBundle\Entity\Order\Donation $donations)
    {
        $this->donations->removeElement($donations);
    }

    /**
     * Get donations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDonations()
    {
        return $this->donations;
    }

    /**
     * Add products
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Product $products
     * @return Order
     */
    public function addProduct(\WebIllumination\SiteBundle\Entity\Order\Product $products)
    {
        $this->products[] = $products;
    
        return $this;
    }

    /**
     * Remove products
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Product $products
     */
    public function removeProduct(\WebIllumination\SiteBundle\Entity\Order\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add notes
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Note $notes
     * @return Order
     */
    public function addNote(\WebIllumination\SiteBundle\Entity\Order\Note $notes)
    {
        $this->notes[] = $notes;
    
        return $this;
    }

    /**
     * Remove notes
     *
     * @param \WebIllumination\SiteBundle\Entity\Order\Note $notes
     */
    public function removeNote(\WebIllumination\SiteBundle\Entity\Order\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}