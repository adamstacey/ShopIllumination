<?php

namespace KAC\SiteBundle\ThirdParty\Google;

class Google {
    // Google settings
    protected $googleApiKey;
    protected $googleDeveloperToken;
    protected $googleEmailAddress;
    protected $googlePassword;
    protected $googleAnalyticsAccountId;

    // Common words
    protected $commonWords;

    // Negative keywords
    protected $negativeKeywords;

    // Keyword density levels
    protected $keywordDensityLevelAverage;
    protected $keywordDensityLevelGood;
    protected $keywordDensityLevelBad;

    public function __construct($apiKey, $devToken, $email, $password, $analyticsID)
    {
        // Setup Google settings
        $this->googleApiKey = $apiKey;
        $this->googleDeveloperToken = $devToken;
        $this->googleEmailAddress = $email;
        $this->googlePassword = $password;
        $this->googleAnalyticsAccountId = $analyticsID;

        // Common words
        $this->commonWords = array('the', 'be', 'to', 'of', 'and', 'a', 'in', 'that', 'have', 'i', 'it', 'for', 'not', 'on', 'with', 'he', 'as', 'you', 'do', 'at', 'this', 'but', 'his', 'by', 'from', 'they', 'we', 'say', 'her', 'she', 'or', 'an', 'will', 'my', 'one', 'all', 'would', 'there', 'their', 'what', 'so', 'up', 'out', 'if', 'about', 'who', 'get', 'which', 'go', 'me', 'when', 'make', 'can', 'like', 'time', 'no', 'just', 'him', 'know', 'take', 'person', 'into', 'year', 'your', 'good', 'some', 'could', 'them', 'see', 'other', 'than', 'then', 'now', 'look', 'only', 'come', 'its', 'over', 'think', 'also', 'back', 'after', 'use', 'two', 'how', 'our', 'work', 'first', 'well', 'way', 'even', 'new', 'want', 'because', 'any', 'these', 'give', 'day', 'most', 'us');

        // Negative keywords
        $this->negativeKeywords = array('repair', 'repairs', 'review', 'reviews', 'part', 'parts', 'spare', 'spares', 'baumatic', 'world', 'smeg', 'redhill');

        // Keyword density levels
        $this->keywordDensityLevelAverage = 2;
        $this->keywordDensityLevelGood = 3;
        $this->keywordDensityLevelBad = 7;
    }

    // Get an authorisation code for Google Client Login
    public function getClientLoginAuthCode($service = 'adwords', $source = 'Google Authorisation')
    {
        // Get the session
        $session = $this->container->get('request')->getSession();

        // Check if there is a valid authorisation setup
        $authorisationCode = $session->get('googleAuthorisationCode_'.$service);
        $authorisationCode_time = $session->get('googleAuthorisationCode_'.$service.'_time');

        if (!$authorisationCode)
        {
            // API URL
            $url = 'https://www.google.com/accounts/ClientLogin';

            // Setup data to pass to Google
            $data = array(
                'accountType' => 'GOOGLE',
                'Email' => $this->googleEmailAddress,
                'Passwd' => $this->googlePassword,
                'source'=> $source,
                'service'=> $service);

            // Try to fetch the authorisation code from Google
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            $authorisationCode = curl_exec($curl);

            // Close the curl connection
            curl_close($curl);

            // Create the authorisation codes
            $authorisationCodes = explode("\n", $authorisationCode);
            $authorisationCode = array();
            $authorisationCode['SID'] = str_replace('SID=', '', $authorisationCodes[0]);
            $authorisationCode['LSID'] = str_replace('LSID=', '', $authorisationCodes[1]);
            $authorisationCode['Auth'] = str_replace('Auth=', '', $authorisationCodes[2]);

            // Save to the session
            $session->set('googleAuthorisationCode_'.$service, $authorisationCode);
            $session->set('googleAuthorisationCode_'.$service.'_time', date("Y-m-d H:i:s"));
            $session->save();
        }

        return $authorisationCode;
    }


    public function findProductUids($productCode)
    {
        // Tidy up search phrases
        $productCode = urlencode($productCode);

        // API URL
        $url = 'https://www.googleapis.com/shopping/search/v1/public/products?key='.$this->googleApiKey.'&country=GB&q='.$productCode.'&alt=json&maxResults=1&restrictBy=gtin';

        // Try to fetch the product data from Google search
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $product = curl_exec($curl);

        // Close the curl connection
        curl_close($curl);

        return json_decode($product, true);
    }
    
    public function findMoreExpensiveProducts($productCode, $price, $limit)
    {
        // Tidy up search phrases
        $productCode = urlencode($productCode);

        // API URL
        $url = 'https://www.googleapis.com/shopping/search/v1/public/products?key='.$this->googleApiKey.'&country=GB&q='.$productCode.'&alt=json&maxResults='.$limit.'&restrictBy=price=('.$price.',*]&restrictBy=accountId~4162886';

        // Try to fetch the product data from Google search
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $products = curl_exec($curl);

        // Close the curl connection
        curl_close($curl);

        return json_decode($products, true);
    }
}