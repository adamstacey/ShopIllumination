<?php
namespace KAC\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use KAC\UserBundle\Entity\User;
use Omnipay\Common\CreditCard;

/**
 * @ORM\Entity(repositoryClass="KAC\SiteBundle\Repository\OrderRepository")
 * @ORM\Table(name="orders")
 * @ORM\HasLifecycleCallbacks()

 */
class Order
{
    const PAYMENT_STATUS_AUTHORIZED   = 'AUTHORIZED';
    const PAYMENT_STATUS_SUCCESSFUL   = 'SUCCESSFUL';
    const PAYMENT_STATUS_FAILED       = 'UNAUTHORIZED';
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Order\Product", mappedBy="order", cascade={"all"})
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Order\Note", mappedBy="order", cascade={"all"})
     */
    private $notes;
    
    /**
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(name="current_step", type="string", length=255, nullable=true)
     */
    private $currentStep;
        
    /**
     * @ORM\Column(name="payment_type", type="string", length=255, nullable=true)
     */
    private $paymentType;
    
    /**
     * @ORM\Column(name="payment_response", type="text", nullable=true)
     */
    private $paymentResponse;
    /**
     * @ORM\Column(name="auth_response", type="text", nullable=true)
     */
    private $authResponse;
    
    /**
     * @ORM\Column(name="delivery_type", type="string", length=255, nullable=true)
     */
    private $deliveryType;
    
    /**
     * @ORM\Column(name="courier", type="string", length=255, nullable=true)
     */
    private $courier;
    
    /**
     * @ORM\Column(name="number_of_packages", type="integer", length=3, nullable=true)
     */
    private $numberOfPackages;
    
    /**
     * @ORM\Column(name="tracking_number", type="string", length=255, nullable=true)
     */
    private $trackingNumber;
        
    /**
     * @ORM\Column(name="labels_printed", type="boolean", nullable=true)
     */
    private $labelsPrinted;
    
    /**
     * @ORM\Column(name="send_review_request", type="boolean", nullable=true)
     */
    private $sendReviewRequest;
    
    /**
     * @ORM\Column(name="review_requested", type="boolean", nullable=true)
     */
    private $reviewRequested;
    
    /**
     * @ORM\Column(name="items", type="string", length=255, nullable=true)
     */
    private $items;
        
    /**
     * @ORM\Column(name="sub_total", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $subTotal;
        
    /**
     * @ORM\Column(name="delivery_charge", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $deliveryCharge;
    
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $discount;
    
    /**
     * @ORM\Column(name="vat", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $vat;
    
    /**
     * @ORM\Column(name="total", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $total;
    
    /**
     * @ORM\Column(name="possible_discount", type="decimal", precision=12, scale=4, nullable=true)
     */
    private $possibleDiscount;
        
    /**
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;
    
    /**
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;
    
    /**
     * @ORM\Column(name="organisation_name", type="string", length=255, nullable=true)
     */
    private $organisationName;
    
    /**
     * @ORM\Column(name="email_address", type="string", length=255, nullable=true)
     */
    private $emailAddress;
    
    /**
     * @ORM\Column(name="telephone_daytime", type="string", length=50, nullable=true)
     */
    private $telephoneDaytime;
    
    /**
     * @ORM\Column(name="telephone_evening", type="string", length=50, nullable=true)
     */
    private $telephoneEvening;
    
    /**
     * @ORM\Column(name="mobile", type="string", length=50, nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(name="use_billing_as_delivery", type="boolean", nullable=true)
     */
    private $useBillingAsDelivery = true;
    
    /**
     * @ORM\Column(name="billing_first_name", type="string", length=255, nullable=true)
     */
    private $billingFirstName;
    
    /**
     * @ORM\Column(name="billing_last_name", type="string", length=255, nullable=true)
     */
    private $billingLastName;
    
    /**
     * @ORM\Column(name="billing_organisation_name", type="string", length=255, nullable=true)
     */
    private $billingOrganisationName;
    
    /**
     * @ORM\Column(name="billing_address_line_1", type="string", length=255, nullable=true)
     */
    private $billingAddressLine1;
    
    /**
     * @ORM\Column(name="billing_address_line_2", type="string", length=255, nullable=true)
     */
    private $billingAddressLine2;
    
    /**
     * @ORM\Column(name="billing_town_city", type="string", length=255, nullable=true)
     */
    private $billingTownCity;
    
    /**
     * @ORM\Column(name="billing_county_state", type="string", length=255, nullable=true)
     */
    private $billingCountyState;
    
    /**
     * @ORM\Column(name="billing_post_zip_code", type="string", length=255, nullable=true)
     */
    private $billingPostZipCode;
    
    /**
     * @ORM\Column(name="billing_country_code", type="string", length=2, nullable=true)
     */
    private $billingCountryCode;
    
   	/**
     * @ORM\Column(name="delivery_first_name", type="string", length=255, nullable=true)
     */
    private $deliveryFirstName;
    
    /**
     * @ORM\Column(name="delivery_last_name", type="string", length=255, nullable=true)
     */
    private $deliveryLastName;
    
    /**
     * @ORM\Column(name="delivery_organisation_name", type="string", length=255, nullable=true)
     */
    private $deliveryOrganisationName;
    
    /**
     * @ORM\Column(name="delivery_address_line_1", type="string", length=255, nullable=true)
     */
    private $deliveryAddressLine1;
    
    /**
     * @ORM\Column(name="delivery_address_line_2", type="string", length=255, nullable=true)
     */
    private $deliveryAddressLine2;
    
    /**
     * @ORM\Column(name="delivery_town_city", type="string", length=255, nullable=true)
     */
    private $deliveryTownCity;
    
    /**
     * @ORM\Column(name="delivery_county_state", type="string", length=255, nullable=true)
     */
    private $deliveryCountyState;
    
    /**
     * @ORM\Column(name="delivery_post_zip_code", type="string", length=255, nullable=true)
     */
    private $deliveryPostZipCode;
    
    /**
     * @ORM\Column(name="delivery_country_code", type="string", length=2, nullable=true)
     */
    private $deliveryCountryCode;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_start", type="string", length=255, nullable=true)
     */
    private $estimatedDeliveryDaysStart;
    
    /**
     * @ORM\Column(name="estimated_delivery_days_end", type="string", length=255, nullable=true)
     */
    private $estimatedDeliveryDaysEnd;
    
    /**
     * @ORM\Column(name="order_printed", type="boolean")
     */
    private $orderPrinted = false;
    
    /**
     * @ORM\Column(name="delivery_note_printed", type="boolean")
     */
    private $deliveryNotePrinted = false;
    
    /**
     * @ORM\Column(name="actioned", type="boolean")
     */
    private $actioned = false;
    
    /**
     * @ORM\Column(name="fraud_check_customer_ordered", type="boolean")
     */
    private $fraudCheckCustomerOrdered = false;
    
    /**
     * @ORM\Column(name="fraud_check_address_match", type="boolean")
     */
    private $fraudCheckAddressMatch = false;
    
    /**
     * @ORM\Column(name="fraud_check_name_used_on_different_order", type="boolean")
     */
    private $fraudCheckNameUsedOnDifferentOrder = false;
    
    /**
     * @ORM\Column(name="fraud_check_post_zip_code_used_on_different_order", type="boolean")
     */
    private $fraudCheckPostZipCodeUsedOnDifferentOrder = false;
    
    /**
     * @ORM\Column(name="fraud_check_telephone_used_on_different_order", type="boolean")
     */
    private $fraudCheckTelephoneUsedOnDifferentOrder = false;

    /**
     * @ORM\Column(name="royal_mail_import_line", type="integer", length=11)
     */
    private $royalMailImportLine;

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
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    private $method;
    private $card;

    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
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

    public static function getStatuses()
    {
        return array(
            'Checkout',
            'Open Payment',
            'Payment Received',
            'Payment Failed',
            'Processing Your Order',
            'Order Ready for Collection',
            'Order with Delivery Company',
            'Part Delivered',
            'Order Completed',
            'Refunded',
            'Cancelled',
        );
    }
    
    /**
     * Get paymentType name
     *
     * @return string 
     */
    public function getPaymentTypeName()
    {
    	switch ($this->paymentType)
    	{
    		case 'SagePay':
    		case 'sagepay':
    			return 'SagePay';
    		case 'PayPal through SagePay':
    			return 'PayPal through SagePay';
    		case 'PayPal':
    			return 'PayPal';
    		case 'Google Wallet':
    		case 'google':
    			return 'Google Wallet';
    		case 'Voucher Code':
    			return 'Voucher Code';
    		case 'Gift Voucher':
    			return 'Gift Voucher';
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
    		case 'sagepay':
    			return 'bundles/kacsite/images/logos/sage-pay-small.png';
    		case 'PayPal through SagePay':
    			return 'bundles/kacsite/images/logos/pay-pal-through-sage-pay-small.png';
    		case 'PayPal':
    		case 'paypal':
    			return 'bundles/kacsite/images/logos/pay-pal-small.png';
    		case 'Google Wallet':
    			return 'bundles/kacsite/images/logos/google-wallet-small.png';
    		case 'Voucher Code':
    			return 'bundles/kacsite/images/logos/voucher-code-small.png';
    		case 'Gift Voucher':
    			return 'bundles/kacsite/images/logos/gift-voucher-small.png';
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
     	return array();
    }

    /**
     * Get paymentResponse
     *
     * @return text
     */
    public function getAuthResponse()
    {
    	if ($this->authResponse != '')
    	{
    		return unserialize(base64_decode($this->authResponse));
    	}
     	return array();
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
        return 'bundles/kacadmin/images/icons/'.$iconColour.'-light-icon.png';
    }

    public function getCheckoutSteps()
    {
        return array('About', 'Address', 'Delivery', 'Payment', 'Confirmation', 'Complete');
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
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
     * @param object $paymentResponse
     * @return Order
     */
    public function setPaymentResponse($paymentResponse)
    {
        $this->paymentResponse = base64_encode(serialize($paymentResponse));
    
        return $this;
    }

    /**
     * Set authResponse
     *
     * @param object $authResponse
     * @return Order
     */
    public function setAuthResponse($authResponse)
    {
        $this->authResponse = base64_encode(serialize($authResponse));

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
        $this->discounts = new ArrayCollection();
        $this->donations = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    public function calculateTotalItems()
    {
        $this->items = count($this->items);
    }

    public function calculateVat()
    {
        $this->vat = $this->getSubTotal() - ($this->getSubTotal() / 1.2);
    }

    public function calculateSubTotal()
    {
        $this->total = 0;

        foreach($this->getProducts() as $item)
        {
            $this->subTotal += $item->getSubTotal();
        }
    }

    public function calculateTotal()
    {
        $this->total = $this->subTotal + $this->deliveryCharge;
    }

    public function calculateTotals()
    {
        $this->calculateTotalItems();
        $this->calculateSubTotal();
        $this->calculateTotal();
        $this->calculateVat();
    }
    
    /**
     * Add discounts
     *
     * @param Order\Discount $discounts
     * @return Order
     */
    public function addDiscount(Order\Discount $discounts)
    {
        $this->discounts[] = $discounts;
    
        return $this;
    }

    /**
     * Remove discounts
     *
     * @param Order\Discount $discounts
     */
    public function removeDiscount(Order\Discount $discounts)
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
     * @param Order\Donation $donations
     * @return Order
     */
    public function addDonation(Order\Donation $donations)
    {
        $this->donations[] = $donations;
    
        return $this;
    }

    /**
     * Remove donations
     *
     * @param Order\Donation $donations
     */
    public function removeDonation(Order\Donation $donations)
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
     * @param Order\Product $product
     * @return Order
     */
    public function addProduct(Order\Product $product)
    {
        $this->products[] = $product;
        $product->setOrder($this);

        return $this;
    }

    /**
     * Remove products
     *
     * @param Order\Product $products
     */
    public function removeProduct(Order\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return Order\Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add notes
     *
     * @param Order\Note $note
     * @return Order
     */
    public function addNote(Order\Note $note)
    {
        $this->notes[] = $note;
        $note->setOrder($this);
    
        return $this;
    }

    /**
     * Remove notes
     *
     * @param Order\Note $notes
     */
    public function removeNote(Order\Note $notes)
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

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @param mixed $currentStep
     */
    public function setCurrentStep($currentStep)
    {
        $this->currentStep = $currentStep;
    }

    /**
     * @return mixed
     */
    public function getCurrentStep()
    {
        return $this->currentStep;
    }

    /**
     * @param mixed $useBillingAsDelivery
     */
    public function setUseBillingAsDelivery($useBillingAsDelivery)
    {
        $this->useBillingAsDelivery = $useBillingAsDelivery;
    }

    /**
     * @return mixed
     */
    public function getUseBillingAsDelivery()
    {
        return $this->useBillingAsDelivery;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @return CreditCard
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * Set royalMailImportLine
     *
     * @param integer $royalMailImportLine
     * @return Order
     */
    public function setRoyalMailImportLine($royalMailImportLine)
    {
        $this->royalMailImportLine = $royalMailImportLine;
    
        return $this;
    }

    /**
     * Get royalMailImportLine
     *
     * @return integer 
     */
    public function getRoyalMailImportLine()
    {
        return $this->royalMailImportLine;
    }
}