<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
}