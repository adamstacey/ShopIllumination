<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class SagePayService {

	protected $container;
	protected $vspProtocol;
	protected $vendor;
	protected $txType;
	protected $successUrl;
	protected $failureUrl;
	protected $encryptionPassword;

    public function __construct($container)
    {
        $this->container = $container;
        $this->vspProtocol = 2.23;
		$this->vendor = 'onefit';
		$this->txType = 'PAYMENT';
		$this->successUrl = $this->container->get('router')->generate('checkout_order_placed', array('paymentType' => 'sagePay'), true);
		$this->failureUrl = $this->container->get('router')->generate('checkout_order_failed', array('paymentType' => 'sagePay'), true);
		$this->encryptionPassword = 'TsHx362xcJpwwfXY';
    }
    
    public function getPaymentProcess()
    {
    	// Get the order
   		$order = $this->container->get('session')->get('order');
   		
   		// Get the basket
   		$basket = $this->container->get('session')->get('basket');
   		
		// Build the crypt
		$crypt = 'VendorTxCode='.$order['orderNumber'].'-'.$order['paymentAttempt'];
		$crypt .= '&Amount='.number_format($basket['totals']['total'], 2);
		$crypt .= '&Currency=GBP';
		$crypt .= '&Description=Payment for Order '.$order['orderNumber'];
		$crypt .= '&SuccessURL='.$this->successUrl;
		$crypt .= '&FailureURL='.$this->failureUrl;
		$crypt .= '&CustomerName='.$order['billingFirstName'].' '.$order['billingLastName'];
		$crypt .= '&SendEMail=0';
		$crypt .= '&BillingFirstnames='.$order['billingFirstName'];
		$crypt .= '&BillingSurname='.$order['billingLastName'];
		$crypt .= '&BillingAddress1='.$order['billingAddressLine1'];
		if (strlen($order['billingAddressLine2']) > 0)
		{
			$crypt .= '&BillingAddress2='.$order['billingAddressLine2'];
		}
		$crypt .= '&BillingCity='.$order['billingTownCity'];
		$crypt .= '&BillingPostCode='.$order['billingPostZipCode'];
		$crypt .= '&BillingCountry='.$order['billingCountryCode'];
		$crypt .= '&BillingPhone='.$order['telephoneDaytime'];
		$crypt .= '&DeliveryFirstnames='.$order['deliveryFirstName'];
		$crypt .= '&DeliverySurname='.$order['deliveryLastName'];
		$crypt .= '&DeliveryAddress1='.$order['deliveryAddressLine1'];
		if (strlen($order['deliveryAddressLine2']) > 0)
		{
			$crypt .= '&DeliveryAddress2='.$order['deliveryAddressLine2'];
		}
		$crypt .= '&DeliveryCity='.$order['deliveryTownCity'];
		$crypt .= '&DeliveryPostCode='.$order['deliveryPostZipCode'];
		$crypt .= '&DeliveryCountry='.$order['deliveryCountryCode'];
		$crypt .= '&DeliveryPhone='.$order['telephoneDaytime'];
		
		// Check for Republic of Ireland orders
		if ($order['billingCountryCode'] == 'IE')
		{
			$crypt .= '&ApplyAVSCV2=2';
		}
		
		// Get the basket information
		$cryptProducts = '&Basket='.(count($basket['products']) + 1);
		foreach ($basket['products'] as $basketProduct)
		{
			$cryptProducts .= ':'.$basketProduct['header'];
			$cryptProducts .= ':'.$basketProduct['quantity'];
			$cryptProducts .= ':'.number_format(($basketProduct['unitCost'] / 1.2), 2, '.', '');
			$cryptProducts .= ':'.number_format(($basketProduct['unitCost'] - ($basketProduct['unitCost'] / 1.2)), 2, '.', '');
			$cryptProducts .= ':'.number_format($basketProduct['unitCost'], 2, '.', '');
			$cryptProducts .= ':'.number_format($basketProduct['subTotal'], 2, '.', '');
		}
		if ($basket['totals']['deliveryCharge'] > 0)
		{
			$cryptProducts .= ':'.$basket['delivery']['service'];
			$cryptProducts .= ':1';
			$cryptProducts .= ':'.number_format(($basket['totals']['deliveryCharge'] / 1.2), 2, '.', '');
			$cryptProducts .= ':'.number_format(($basket['totals']['deliveryCharge'] - ($basket['totals']['deliveryCharge'] / 1.2)), 2, '.', '');
			$cryptProducts .= ':'.number_format($basket['totals']['deliveryCharge'], 2, '.', '');
			$cryptProducts .= ':'.number_format($basket['totals']['deliveryCharge'], 2, '.', '');
		} else {
			$cryptProducts .= ':'.$basket['delivery']['service'].':1::::0.00';
		}		
		$crypt .= $cryptProducts;
		
		// Encrypt
		$encryptedEncodedCrypt = $this->encryptAndEncode($crypt);   

		// Setup the payment process
   		$paymentProcess = array();
   		$paymentProcess['name'] = 'SagePay';
   		$paymentProcess['vspProtocol'] = $this->vspProtocol;
   		$paymentProcess['vendor'] = $this->vendor;
   		$paymentProcess['txType'] = $this->txType;
   		$paymentProcess['crypt'] = $encryptedEncodedCrypt;
   		$order['paymentProcesses']['sagePay'] = $paymentProcess;
	
		// Save to the session
    	$this->container->get('session')->set('order', $order);
    }
    
    // Get the payment response from SagePay
    public function getPaymentResponse($crypt)
    {
    	// Build the response
    	$response = array();
    	
    	$paymentResponses = explode('&', $crypt);
		foreach ($paymentResponses as $paymentResponse)
		{
			$paymentResponseData = explode('=', $paymentResponse);
			$response[$paymentResponseData[0]] = $paymentResponseData[1];
		}
		
		// Tidy up the order numbr
		$orderNumberData = explode('-', $response['VendorTxCode']);
		$response['VendorTxCode'] = $orderNumberData[0];
		
		// Tidy up the status detail
		switch ($response['Status'])
		{
			case 'OK':
				$response['Status'] = 'SUCCESS';
				$response['StatusDetail'] = 'The payment was completed successfully with authorisation.';
				break;
			case 'NOTAUTHED':
				$response['Status'] = 'NOT AUTHORISED';
				$response['StatusDetail'] = 'The payment failed as the details were incorrect, or insufficient funds were available.';
				break;
			case 'MALFORMED':
				$response['Status'] = 'ERROR';
				$response['StatusDetail'] = 'Sorry, there was an error with the system.';
				break;
			case 'INVALID':
				$response['Status'] = 'ERROR';
				$response['StatusDetail'] = 'Sorry, there was an error with the system.';
				break;
			case 'ABORT':
				$response['Status'] = 'CANCELLED';
				$response['StatusDetail'] = 'The payment failed because you cancelled it or you were inactive for 15 minutes or longer.';
				break;
			case 'REJECTED':
				$response['Status'] = 'REJECTED';
				$response['StatusDetail'] = 'The payment failed due to some information provided not passing our fraud checks.';
				break;
			case 'AUTHENTICATED':
				$response['Status'] = 'AUTHENTICATED';
				$response['StatusDetail'] = 'The 3D-Secure checks passed and the payment was authenticated.';
				break;
			case 'REGISTERED':
				$response['Status'] = 'REGISTERED';
				$response['StatusDetail'] = '3D-Secure checks failed, but the payment was still secured.';
				break;
			case 'ERROR':
				$response['Status'] = 'ERROR';
				$response['StatusDetail'] = 'Sorry, there was an error with the system.';
				break;
		}
		
		// Tidy up the card type
		if (isset($response['CardType']))
		{
			switch ($response['CardType'])
			{
				case 'MC':
					$response['CardType'] = 'MASTERCARD';
					break;
				case 'DELTA':
					$response['CardType'] = 'VISA DELTA';
					break;
				case 'UKE':
					$response['CardType'] = 'VISA ELECTRON';
					break;
			}
		}
		
		return $response;
		
    }
    
	// PHP's mcrypt does not have built in PKCS5 Padding, so we use this
	public function addPKCS5Padding($input)
	{
	   $blocksize = 16;
	   $padding = '';
	
	   // Pad input to an even block size boundary
	   $padlength = $blocksize - (strlen($input) % $blocksize);
	   for ($i = 1; $i <= $padlength; $i++)
	   {
	      $padding .= chr($padlength);
	   }
	   
	   return $input.$padding;
	}

	// SagePay function to encrypt and encode the crypt
	function encryptAndEncode($strIn)
	{
		//** use initialization vector (IV) set from $strEncryptionPassword
    	$strIV = $this->encryptionPassword;
    	
    	//** add PKCS5 padding to the text to be encypted
    	$strIn = $this->addPKCS5Padding($strIn);

    	//** perform encryption with PHP's MCRYPT module
		$strCrypt = \mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->encryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV);
		
		//** perform hex encoding and return
		return "@" . bin2hex($strCrypt);
	}


	// SagePay function to decrypt and decode the crypt
	function decodeAndDecrypt($strIn)
	{
		//** use initialization vector (IV) set from $strEncryptionPassword
    	$strIV = $this->encryptionPassword;
    	
    	//** remove the first char which is @ to flag this is AES encrypted
    	$strIn = substr($strIn, 1); 
    	
    	//** HEX decoding
    	$strIn = pack('H*', $strIn);
    	
    	//** perform decryption with PHP's MCRYPT module
		return \mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->encryptionPassword, $strIn, MCRYPT_MODE_CBC, $strIV); 
	}
}