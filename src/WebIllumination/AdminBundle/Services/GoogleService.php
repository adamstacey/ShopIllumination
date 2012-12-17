<?php

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\ProductSearch;
use WebIllumination\AdminBundle\Entity\Statistic;
use WebIllumination\AdminBundle\Entity\KeywordSuggestion;

class GoogleService {

	protected $container;

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

    public function __construct($container)
    {
        $this->container = $container;

        // Setup Google settings
        $this->googleApiKey = 'AIzaSyD0T5-GhcI4Hiv5k-VGT34ttQFw1mdY1pE';
        $this->googleDeveloperToken = 'cbyXUfvZAQjHAlPDhbFkSw';
        $this->googleEmailAddress = 'google@kitchenappliancecentre.co.uk';
        $this->googlePassword = 'D3rbysh1r3';
        $this->googleAnalyticsAccountId = '28155832';

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

    // Get keyword suggestions from Google Keyword Tool
    public function getKeywordSuggestions($keywordPhrase, $numberOfResults = 10)
    {

    	// Check keyword phrase exists
    	if (!$keywordPhrase)
    	{
    		return false;
    	}

    	// Check if suggestion exists and is up-to-date
    	$keywordSuggestionFound = false;

    	// Get the doctrine service
    	$doctrineService = $this->container->get('doctrine');

    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();

    	$keywordSuggestionData = $doctrineService->getRepository('WebIllumination\SiteBundle\Entity\KeywordSuggestion')->findOneByKeywordPhrase($keywordPhrase);

    	// Check if product search has been found and if it is current
    	if ($keywordSuggestionData)
    	{
    		if (strtotime($keywordSuggestionData->getUpdatedAt()->getTimestamp()) < strtotime("-7 days", strtotime(date("Y-m-d 00:00:00"))))
    		{
    			$keywordSuggestionFound = true;
    		}
    	}

    	if (!$keywordSuggestionFound)
    	{

			// Setup the keyword suggestions
			$keywordSuggestions = array();

			// Get the user
			$user = new \AdWordsUser();

			// Get the Targeting Idea Service
			$targetingIdeaService = $user->GetTargetingIdeaService('v201109');

			// Create keyword
			$keyword = new \Keyword();
			$keyword->text = strtolower($keywordPhrase);
			$keyword->matchType = 'BROAD';

			// Create negative keywords
			$negativeKeywords = array();
			foreach ($this->negativeKeywords as $negative_keyword)
			{
				// Broad
				$newNegativeKeyword = new \Keyword();
				$newNegativeKeyword->text = strtolower($negative_keyword);
				$newNegativeKeyword->matchType = 'BROAD';
				$negativeKeywords[] = $newNegativeKeyword;

				// Phrase
				$newNegativeKeyword = new \Keyword();
				$newNegativeKeyword->text = strtolower($negative_keyword);
				$newNegativeKeyword->matchType = 'PHRASE';
				$negativeKeywords[] = $newNegativeKeyword;

				// Exact
				$newNegativeKeyword = new \Keyword();
				$newNegativeKeyword->text = strtolower($negative_keyword);
				$newNegativeKeyword->matchType = 'EXACT';
				$negativeKeywords[] = $newNegativeKeyword;
			}

			// Create selector
			$selector = new \TargetingIdeaSelector();
			$selector->requestType = 'IDEAS';
			$selector->ideaType = 'KEYWORD';
			$selector->requestedAttributeTypes = array('CRITERION', 'AVERAGE_TARGETED_MONTHLY_SEARCHES', 'GLOBAL_MONTHLY_SEARCHES', 'COMPETITION');

			// Set selector paging
			$paging = new \Paging();
			$paging->startIndex = 0;
			$paging->numberResults = $numberOfResults;
			$selector->paging = $paging;

			// Set country target
			//$country_target = new \CountryTarget();
			//$country_target->countryCode = 'GB';

			// Set language target
			//$language_target = new \LanguageTarget();
			//$language_target->languageCode = 'en';

			// Create related to keyword search parameter
			$related_to_keyword_search_parameter = new \RelatedToKeywordSearchParameter();
			$related_to_keyword_search_parameter->keywords = array($keyword);

			// Create excluded keyword search parameter
			$excluded_keyword_search_parameter = new \ExcludedKeywordSearchParameter();
			$excluded_keyword_search_parameter->keywords = $negativeKeywords;

			// Create keyword match type search parameter to ensure unique results
			$keyword_match_type_search_parameter = new \KeywordMatchTypeSearchParameter();
			$keyword_match_type_search_parameter->keywordMatchTypes = array('BROAD');

			// Create country target search parameter
			//$country_target_search_parameter = new \CountryTargetSearchParameter();
			//$country_target_search_parameter->countryTargets = array($country_target);

			// Create language target search search parameter
			//$language_target_search_parameter = new \LanguageTargetSearchParameter();
			//$language_target_search_parameter->languageTargets = array($language_target);

			// Set the search parameters
			//$selector->searchParameters = array($related_to_keyword_search_parameter, $keyword_match_type_search_parameter, $excluded_keyword_search_parameter, $country_target_search_parameter, $language_target_search_parameter);
			$selector->searchParameters = array($related_to_keyword_search_parameter, $keyword_match_type_search_parameter, $excluded_keyword_search_parameter);
			$selector->localeCode = 'en_GB';
			$selector->currencyCode = 'GBP';

			// Get related keywords
			$results = $targetingIdeaService->get($selector);

			if (isset($results->entries))
			{
				foreach ($results->entries as $targeting_idea)
				{
			    	$data = \MapUtils::GetMap($targeting_idea->data);
			      	$keyword = $data['CRITERION']->value;
			      	if (sizeof(explode(' ', $keyword->text)) > 1)
			      	{
			      		// Check if any negative keywords exist in the keyword phrase
			      		$negative_keyword_exists = false;
			      		foreach (explode(' ', $keyword->text) as $negative_keyword_check)
			      		{
			      			if (in_array($negative_keyword_check, $this->negativeKeywords))
			      			{
			      				$negative_keyword_exists = true;
			      				break;
			      			}
			      		}

			      		// Add the keyword suggestion
			      		if (!$negative_keyword_exists)
						{
					      	$average_targeted_monthly_searches = isset($data['AVERAGE_TARGETED_MONTHLY_SEARCHES']->value)?$data['AVERAGE_TARGETED_MONTHLY_SEARCHES']->value:0;
					      	$global_monthly_searches = isset($data['GLOBAL_MONTHLY_SEARCHES']->value)?$data['GLOBAL_MONTHLY_SEARCHES']->value:0;
					      	$competition = isset($data['COMPETITION']->value)?$data['COMPETITION']->value:0;
					      	$keyword_suggestion = array();
					      	$keyword_suggestion['keyword'] = $keyword->text;
					      	$keyword_suggestion['average_monthly_searches'] = $average_targeted_monthly_searches;
					      	$keyword_suggestion['global_monthly_searches'] = $global_monthly_searches;
					      	$keyword_suggestion['competition'] = number_format($competition * 100, 0);
					      	$keywordSuggestions[] = $keyword_suggestion;
						}
					}
			  	}
			}

			// Save the suggestion
	    	if (!$keywordSuggestionData)
	    	{
	    		$keywordSuggestionData = new KeywordSuggestion();
	    		$keywordSuggestionData->setKeywordPhrase($keywordPhrase);
	    	}
	    	$keywordSuggestionData->setData(base64_encode(serialize($keywordSuggestions)));
	    	$em->persist($keywordSuggestionData);
		    $em->flush();

	    }

    	// Return the suggestion
		return unserialize(base64_decode($keywordSuggestionData->getData()));
    }

    // Get ranked descriptions
    public function getRankedDescriptions($keywordPhrase)
    {
    	// Make sure a keyword phrase is given
    	if (!$keywordPhrase)
    	{
    		return array();
    	} else {
    		$keywordPrase = $this->generateKeywords($keywordPhrase, ' ');
    	}

    	// Setup the page descriptions
    	$page_descriptons = array();

    	// Get the suggested keywords
    	$suggestedKeywords = $this->getKeywordSuggestions($keywordPhrase, 50);

    	// Get all possible keywords
    	$possibleKeywords = array();
    	foreach (explode(' ', strtolower($keywordPhrase)) as $possibleKeyword)
    	{
    		// Check keyword is not common
			if (!in_array($possibleKeyword, $this->commonWords))
			{
				// Make sure keyword is greater than two characters
				if (strlen($possibleKeyword) > 2)
				{
					$possibleKeywords[] = $possibleKeyword;
				}
			}
    	}

    	foreach ($suggestedKeywords as $suggestedKeyword)
    	{
    		foreach (explode(' ', strtolower($suggestedKeyword['keyword'])) as $possibleKeyword)
	    	{
	    		// Check keyword is not common
				if (!in_array($possibleKeyword, $this->commonWords))
				{
					// Make sure keyword is greater than two characters
					if (strlen($possibleKeyword) > 2)
					{
						$possibleKeywords[] = $possibleKeyword;
					}
				}
	    	}
    	}
    	$possibleKeywords = array_unique($possibleKeywords);

    	// Get the search URL for Google
    	$googleUrl = 'https://www.google.co.uk/search?num=10&q='.urlencode($keywordPrase);

		// Try to fetch the search results from Google
    	$curl = curl_init($googleUrl);
  		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_POST, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$searchResults = curl_exec($curl);

		// Close the curl connection
		curl_close($curl);

		// Get the resulting links
		preg_match_all('@<h3\s*class="r">\s*<a[^<>]*href="([^<>]*)"[^<>]*>(.*)</a>\s*</h3>@siU', $searchResults, $matches);
		$resultPages = $matches[1];

		// Setup ranking
		$ranking = 0;

		// Get the content from each page
		foreach ($resultPages as $resultPage)
		{
			// Next ranking
			$ranking++;

			// Get the page description
			$pageDescription = array();
			$pageDescription['ranking'] = $ranking;
			$resultPage = str_replace('/url?q=', '', $resultPage);
			$pageDescription['url'] = $resultPage;
			$pageDescription['googleSearchUrl'] = $googleUrl;
			$curl = curl_init($resultPage);
  			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curl, CURLOPT_POST, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$pageContent = curl_exec($curl);

			// Close the curl connection
			curl_close($curl);

			// Find all the paragraphs
			preg_match_all('%<(p)\b[^>]*>.*?</\1>%i', $pageContent, $paragraphs);

			$pageDescription['paragraphs'] = $paragraphs;

			$pageContent = array();

			// Search through the paragraphs and make sure they contain at least one of the keyword phrases
			foreach ($paragraphs[0] as $paragraph)
			{
				// Clean the paragraph
				$paragraph = $this->cleanDirtyFormatting($paragraph);
				$paragraph = $this->prepareParagraphs($paragraph);
				$paragraph = strip_tags($paragraph);
				$paragraph = $this->removeUrls($paragraph);
				$paragraph = $this->cleanDescriptionContent($paragraph);
				$paragraph = $this->clean($paragraph);
				$paragraph = $this->stripWhitespace($paragraph);
				$paragraph = htmlentities($paragraph);
				$paragraph = trim($paragraph);

				// Check for any keywords
				$keywordFound = false;
				foreach ($possibleKeywords as $possibleKeyword)
				{
					if (strpos($paragraph, $possibleKeyword) !== false)
					{
						$keywordFound = true;
						break;
					}
				}

				// Add paragraph
				if ($keywordFound)
				{
					$pageContent[] = $paragraph;
				}

			}

			// Combine the paragraphs and clease for the keyword densities
			$combinedParagraphs = implode(' ', $pageContent);

			// Get keyword performance
			$keywordPerformance = $this->getKeywordPerformance($suggestedKeywords, $combinedParagraphs);

			$pageDescription['pageContent']['paragraphs'] = $pageContent;
			$pageDescription['pageContent']['simplifiedContent'] = $combinedParagraphs;
			$pageDescription['pageContent']['keywordPerformance'] = $keywordPerformance;
			$pageDescriptions[] = $pageDescription;

		}

		/*echo '<p><pre>';
		print_r($pageDescriptions);
		echo '</pre></p>';
		exit;*/

		return $pageDescriptions;

    }

    // Get the content keyword performance
    public function getKeywordPerformance($keywords, $content)
    {
    	// Setup the array
    	$keywordPerformance = array();

    	// Prepare the content for checking
    	$content = $this->convertToKeywords($content);
    	$number_of_words = sizeof($content);
    	$content = implode(' ', $content);

    	// Check if there is content to check
    	if ($number_of_words > 0)
    	{
	    	// Go through each keyword
	    	foreach ($keywords as $keyword)
	    	{
	    		$performance = array();

	    		// Get the keyword density
	    		$number_of_keywords = sizeof(explode(' ', $keyword['keyword']));
	    		$number_of_keyword_occurences = substr_count($content, $keyword['keyword']);
	    		$keyword_density = ((($number_of_keyword_occurences * $number_of_keywords) / $number_of_words) * 100);
	    		$performance['keyword'] = $keyword['keyword'];
	    		$performance['keyword_density'] = number_format($keyword_density, 2);

	    		// Calculate the number of times the keywords are required for optimum keyword density
	    		if ($keyword_density < $this->keywordDensityLevelGood)
	    		{
		    		$recommended_keyword_density = 0;
		    		$recommended_keyword_count = 0;
		    		while ($recommended_keyword_density < $this->keywordDensityLevelGood)
		    		{
		    			$recommended_keyword_count++;
		    			$recommended_keyword_density = (((($number_of_keyword_occurences + $recommended_keyword_count) * $number_of_keywords) / $number_of_words) * 100);
		    		}
		    	} elseif ($keyword_density > $this->keywordDensityLevelBad) {
		    		$recommended_keyword_density = 0;
		    		$recommended_keyword_count = 0;
		    		while ($recommended_keyword_density > $this->keywordDensityLevelBad)
		    		{
		    			$recommended_keyword_count++;
		    			$recommended_keyword_density = (((($number_of_keyword_occurences - $recommended_keyword_count) * $number_of_keywords) / $number_of_words) * 100);
		    		}
		    		$recommended_keyword_count = $recommended_keyword_count * -1;
		    	} else {
		    		$performance['keyword_change_required'] = 0;
		    		$performance['resulting_keyword_density'] = 0;
		    	}
	    		$performance['keyword_change_required'] = $recommended_keyword_count;
	    		$performance['resulting_keyword_density'] = number_format($recommended_keyword_density, 2);

	    		$keywordPerformance[] = $performance;
	    	}
	    }

    	// Return the keyword performance
    	return $keywordPerformance;
    }

    // Convert content to keywords
    public function convertToKeywords($content)
    {
    	// Remove any special characters
    	$content = preg_replace("/[^a-zA-Z0-9\ \-]?/", "", $content);

    	// Convert to lowercase
    	$content = strtolower($content);

    	// Turn into array
    	$content = explode(' ', $content);

    	foreach ($content as $index => $keyword)
    	{
    		// Make sure keyword is greater than two characters
    		if (strlen($keyword) < 3)
			{
				unset($content[$index]);
			} else {
	    		// Check keyword is not common
				if (in_array($keyword, $this->commonWords))
				{
					unset($content[$index]);
				}
			}
    	}

    	// Return keywords
    	return $content;
    }

    // Get data from Google Analytics
    public function getAnalyticsData($start_date = '', $end_date = '', $dimensions = 'ga:medium', $metrics = '', $sort = '', $filters = '')
    {
    	// Get authorisation token
    	$authorisationCode = $this->getClientLoginAuthCode('analytics', 'Google Analytics Request');

    	// API URL
    	if (!$start_date)
    	{
    		$start_date = date("Y-m-d", strtotime("-1 month"));
    	}
    	if (!$end_date)
    	{
    		$end_date = date("Y-m-d");
    	}
    	$url = 'https://www.google.com/analytics/feeds/data?ids=ga:'.$this->googleAnalyticsAccountId.'&start-date='.$start_date.'&end-date='.$end_date;
    	if ($dimensions)
    	{
    		$url .= '&dimensions='.urlencode($dimensions);
    	}
    	if (!$metrics)
    	{
    		$metric_items = array('ga:visitors', 'ga:newVisits', 'ga:percentNewVisits', 'ga:visits', 'ga:timeOnSite', 'ga:avgTimeOnSite');
    		$metrics = implode(',', $metric_items);
    	}
    	$url .= '&metrics='.urlencode($metrics);
    	if ($sort)
    	{
    		$url .= '&sort='.urlencode($sort);
    	}
    	if ($filters)
    	{
    		$url .= '&filters='.urlencode($filters);
    	}

    	// Setup headers
    	$headers = array();
    	$headers[] = 'Authorization: GoogleLogin Auth='.$authorisationCode['Auth'];
    	$headers[] = 'GData-Version: 2';

    	// Try to fetch the data from Google
    	$curl = curl_init($url);
    	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		$xml = curl_exec($curl);

		// Close the curl connection
		curl_close($curl);

		// Make sure there is data to work with
		if (!$xml)
		{
			return false;
		}

		// Parse the data
		$doc = new \DOMDocument();
		$doc->loadXML($xml);

		$entries = $doc->getElementsByTagName('entry');
		$index = 0;
		$google_data = array();
		foreach($entries as $entry)
		{
			$dimensions = $entry->getElementsByTagName('dimension');
			foreach($dimensions as $dimension)
			{
				$google_data[$index][str_replace('ga:', '', $dimension->getAttribute("name"))] =  $dimension->getAttribute('value');
			}
			$metrics = $entry->getElementsByTagName('metric');
			foreach($metrics as $metric)
			{
				$google_data[$index][str_replace('ga:', '', $metric->getAttribute('name'))] =  $metric->getAttribute('value');
			}
			$index++;
		}
		return $google_data;
    }

    // Get statistics visits
    public function getStatisticsVisits($url = '')
    {
    	// Check URL exist
    	if (!$url)
    	{
    		return false;
    	}

    	// Check if statistics exists and is up-to-date
    	$statistics_found = false;

    	// Get the doctrine service
    	$doctrineService = $this->container->get('doctrine');

    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();

    	$statistics_data = $doctrineService->getRepository('WebIllumination\SiteBundle\Entity\Statistic')->findOneBy(array('url' => $url, 'statisticType' => 'visits'));

    	// Check if product search has been found and if it is current
    	if ($statistics_data)
    	{
    		if (strtotime($statistics_data->updatedAt->getTimestamp()) < strtotime("-1 second", strtotime(date("Y-m-d 00:00:00"))))
    		{
    			$statistics_found = true;
    		}
    	}

    	if (!$statistics_found)
    	{
	    	// Dates
	    	$today = date("Y-m-d");
	    	$yesterday = date("Y-m-d", strtotime('yesterday'));
	    	$yesterday_last_year = date("Y-m-d", strtotime("-1 year", strtotime($yesterday)));
	    	$thirty_days_ago = date("Y-m-d", strtotime('-31 days'));
	    	$beginning_of_the_week = date("Y-m-d", strtotime('monday this week'));
	    	$beginning_of_the_week_last_year = date("Y-m-d", strtotime("-1 year", strtotime($beginning_of_the_week)));
	    	$beginning_of_the_month = date("Y-m-d", strtotime(date("Y-m-01")));
	    	$beginning_of_the_month_last_year = date("Y-m-d", strtotime("-1 year", strtotime($beginning_of_the_month)));
	    	$end_of_the_month = date("Y-m-d", strtotime("-1 second", strtotime("+1 month", strtotime(date("Y-m-01")))));
	    	$end_of_the_month_last_year =  date("Y-m-d", strtotime("-1 year", strtotime($end_of_the_month)));
	    	$beginning_of_the_year = date("Y-m-d", strtotime(date("Y-01-01")));
	    	$beginning_of_the_year_last_year = date("Y-m-d", strtotime("-1 year", strtotime($beginning_of_the_year)));

	    	// Get the statistics
	    	$statistics = array();

	    	// Get visits for yesterday
	    	$yesterday_visits = $this->getAnalyticsData($yesterday, $yesterday, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
	    	if ($yesterday_visits)
	    	{
		    	$statistics['visits']['yesterday']['visits'] = number_format($yesterday_visits['0']['visits'], 0);
		    	$statistics['visits']['yesterday']['avgTimeOnPage'] = number_format($yesterday_visits['0']['avgTimeOnPage'], 1).'s';
		    	$statistics['visits']['yesterday']['newVisits'] = number_format($yesterday_visits['0']['newVisits'], 0);
		    	$statistics['visits']['yesterday']['percentNewVisits'] = number_format($yesterday_visits['0']['percentNewVisits'], 1).'%';
		    	$statistics['visits']['yesterday']['visitBounceRate'] = number_format($yesterday_visits['0']['visitBounceRate'], 1).'%';
		    }
		    $previous_yesterday_visits = $this->getAnalyticsData($yesterday_last_year, $yesterday_last_year, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
		    if ($previous_yesterday_visits)
	    	{
		    	$statistics['visits']['yesterday']['visits_change'] = $this->getMetricPercentageDifference($previous_yesterday_visits['0']['visits'], $yesterday_visits['0']['visits'], true, 0, '');
		    	$statistics['visits']['yesterday']['avgTimeOnPage_change'] = $this->getMetricPercentageDifference($previous_yesterday_visits['0']['avgTimeOnPage'], $yesterday_visits['0']['avgTimeOnPage'], true, 1, 's');
		    	$statistics['visits']['yesterday']['newVisits_change'] = $this->getMetricPercentageDifference($previous_yesterday_visits['0']['newVisits'], $yesterday_visits['0']['newVisits'], true, 0, '');
		    	$statistics['visits']['yesterday']['percentNewVisits_change'] = $this->getMetricPercentageDifference($previous_yesterday_visits['0']['percentNewVisits'], $yesterday_visits['0']['percentNewVisits'], true, 1, '%');
		    	$statistics['visits']['yesterday']['visitBounceRate_change'] = $this->getMetricPercentageDifference($previous_yesterday_visits['0']['visitBounceRate'], $yesterday_visits['0']['visitBounceRate'], false, 1, '%');
		    }

	    	// Get visits for week to date
	    	$week_to_date_visits = $this->getAnalyticsData($beginning_of_the_week, $yesterday, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
	    	if ($week_to_date_visits)
	    	{
		    	$statistics['visits']['week_to_date']['visits'] = number_format($week_to_date_visits['0']['visits'], 0);
		    	$statistics['visits']['week_to_date']['avgTimeOnPage'] = number_format($week_to_date_visits['0']['avgTimeOnPage'], 1).'s';
		    	$statistics['visits']['week_to_date']['newVisits'] = number_format($week_to_date_visits['0']['newVisits'], 0);
		    	$statistics['visits']['week_to_date']['percentNewVisits'] = number_format($week_to_date_visits['0']['percentNewVisits'], 1).'%';
		    	$statistics['visits']['week_to_date']['visitBounceRate'] = number_format($week_to_date_visits['0']['visitBounceRate'], 1).'%';
		    }
		    $previous_week_to_date_visits = $this->getAnalyticsData($beginning_of_the_week_last_year, $yesterday_last_year, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
		    if ($previous_week_to_date_visits)
	    	{
		    	$statistics['visits']['week_to_date']['visits_change'] = $this->getMetricPercentageDifference($previous_week_to_date_visits['0']['visits'], $week_to_date_visits['0']['visits'], true, 0, '');
		    	$statistics['visits']['week_to_date']['avgTimeOnPage_change'] = $this->getMetricPercentageDifference($previous_week_to_date_visits['0']['avgTimeOnPage'], $week_to_date_visits['0']['avgTimeOnPage'], true, 1, 's');
		    	$statistics['visits']['week_to_date']['newVisits_change'] = $this->getMetricPercentageDifference($previous_week_to_date_visits['0']['newVisits'], $week_to_date_visits['0']['newVisits'], true, 0, '');
		    	$statistics['visits']['week_to_date']['percentNewVisits_change'] = $this->getMetricPercentageDifference($previous_week_to_date_visits['0']['percentNewVisits'], $week_to_date_visits['0']['percentNewVisits'], true, 1, '%');
		    	$statistics['visits']['week_to_date']['visitBounceRate_change'] = $this->getMetricPercentageDifference($previous_week_to_date_visits['0']['visitBounceRate'], $week_to_date_visits['0']['visitBounceRate'], false, 1, '%');
		    }

	    	// Get visits for month to date
	    	$month_to_date_visits = $this->getAnalyticsData($beginning_of_the_month, $yesterday, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
	    	if ($month_to_date_visits)
	    	{
		    	$statistics['visits']['month_to_date']['visits'] = number_format($month_to_date_visits['0']['visits'], 0);
		    	$statistics['visits']['month_to_date']['avgTimeOnPage'] = number_format($month_to_date_visits['0']['avgTimeOnPage'], 1).'s';
		    	$statistics['visits']['month_to_date']['newVisits'] = number_format($month_to_date_visits['0']['newVisits'], 0);
		    	$statistics['visits']['month_to_date']['percentNewVisits'] = number_format($month_to_date_visits['0']['percentNewVisits'], 1).'%';
		    	$statistics['visits']['month_to_date']['visitBounceRate'] = number_format($month_to_date_visits['0']['visitBounceRate'], 1).'%';
		    }
		    $previous_month_to_date_visits = $this->getAnalyticsData($beginning_of_the_month_last_year, $yesterday_last_year, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
		    if ($previous_month_to_date_visits)
	    	{
		    	$statistics['visits']['month_to_date']['visits_change'] = $this->getMetricPercentageDifference($previous_month_to_date_visits['0']['visits'], $month_to_date_visits['0']['visits'], true, 0, '');
		    	$statistics['visits']['month_to_date']['avgTimeOnPage_change'] = $this->getMetricPercentageDifference($previous_month_to_date_visits['0']['avgTimeOnPage'], $month_to_date_visits['0']['avgTimeOnPage'], true, 1, 's');
		    	$statistics['visits']['month_to_date']['newVisits_change'] = $this->getMetricPercentageDifference($previous_month_to_date_visits['0']['newVisits'], $month_to_date_visits['0']['newVisits'], true, 0, '');
		    	$statistics['visits']['month_to_date']['percentNewVisits_change'] = $this->getMetricPercentageDifference($previous_month_to_date_visits['0']['percentNewVisits'], $month_to_date_visits['0']['percentNewVisits'], true, 1, '%');
		    	$statistics['visits']['month_to_date']['visitBounceRate_change'] = $this->getMetricPercentageDifference($previous_month_to_date_visits['0']['visitBounceRate'], $month_to_date_visits['0']['visitBounceRate'], false, 1, '%');
		    }

	    	// Get visits for year to date
	    	$year_to_date_visits = $this->getAnalyticsData($beginning_of_the_year, $yesterday, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
	    	if ($year_to_date_visits)
	    	{
		    	$statistics['visits']['year_to_date']['visits'] = number_format($year_to_date_visits['0']['visits'], 0);
		    	$statistics['visits']['year_to_date']['avgTimeOnPage'] = number_format($year_to_date_visits['0']['avgTimeOnPage'], 1).'s';
		    	$statistics['visits']['year_to_date']['newVisits'] = number_format($year_to_date_visits['0']['newVisits'], 0);
		    	$statistics['visits']['year_to_date']['percentNewVisits'] = number_format($year_to_date_visits['0']['percentNewVisits'], 1).'%';
		    	$statistics['visits']['year_to_date']['visitBounceRate'] = number_format($year_to_date_visits['0']['visitBounceRate'], 1).'%';
		    }
		    $previous_year_to_date_visits = $this->getAnalyticsData($beginning_of_the_year_last_year, $yesterday_last_year, '', 'ga:visits,ga:avgTimeOnPage,ga:newVisits,ga:percentNewVisits,ga:visitBounceRate', 'ga:visits', $url);
		    if ($previous_year_to_date_visits)
	    	{
		    	$statistics['visits']['year_to_date']['visits_change'] = $this->getMetricPercentageDifference($previous_year_to_date_visits['0']['visits'], $year_to_date_visits['0']['visits'], true, 0, '');
		    	$statistics['visits']['year_to_date']['avgTimeOnPage_change'] = $this->getMetricPercentageDifference($previous_year_to_date_visits['0']['avgTimeOnPage'], $year_to_date_visits['0']['avgTimeOnPage'], true, 1, 's');
		    	$statistics['visits']['year_to_date']['newVisits_change'] = $this->getMetricPercentageDifference($previous_year_to_date_visits['0']['newVisits'], $year_to_date_visits['0']['newVisits'], true, 0, '');
		    	$statistics['visits']['year_to_date']['percentNewVisits_change'] = $this->getMetricPercentageDifference($previous_year_to_date_visits['0']['percentNewVisits'], $year_to_date_visits['0']['percentNewVisits'], true, 1, '%');
		    	$statistics['visits']['year_to_date']['visitBounceRate_change'] = $this->getMetricPercentageDifference($previous_year_to_date_visits['0']['visitBounceRate'], $year_to_date_visits['0']['visitBounceRate'], false, 1, '%');
		    }

	    	// Get the daily visits
	    	$statistics['daily_visits'] = $this->getAnalyticsData($thirty_days_ago, $yesterday, 'ga:year,ga:month,ga:day', 'ga:visits', '', $url);
	    	$statistics['daily_visits_start_date'] = $thirty_days_ago;
	    	$statistics['daily_visits_end_date'] = $yesterday;

	    	// Save the statistics
	    	if (!$statistics_data)
	    	{
	    		$statistics_data = new Statistic();
	    		$statistics_data->setStatisticType('visits');
	    		$statistics_data->setUrl($url);
	    	}
	    	$statistics_data->setData(base64_encode(serialize($statistics)));
	    	$em->persist($statistics_data);
		    $em->flush();

	    }

		return unserialize(base64_decode($statistics_data->data));
    }

    // Get statistics referrers
    public function getStatisticsReferrers($url = '')
    {
    	// Check URL exist
    	if (!$url)
    	{
    		return false;
    	}

    	// Check if statistics exists and is up-to-date
    	$statistics_found = false;

    	// Get the doctrine service
    	$doctrineService = $this->container->get('doctrine');

    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();

    	$statistics_data = $doctrineService->getRepository('WebIllumination\SiteBundle\Entity\Statistic')->findOneBy(array('url' => $url, 'statisticType' => 'referrers'));

    	// Check if product search has been found and if it is current
    	if ($statistics_data)
    	{
    		if (strtotime($statistics_data->updatedAt->getTimestamp()) < strtotime("-1 second", strtotime(date("Y-m-d 00:00:00"))))
    		{
    			$statistics_found = true;
    		}
    	}

    	if (!$statistics_found)
    	{

	    	// Dates
	    	$today = date("Y-m-d");
	    	$yesterday = date("Y-m-d", strtotime('yesterday'));
	    	$thirty_days_ago = date("Y-m-d", strtotime('-31 days'));
	    	$beginning_of_the_week = date("Y-m-d", strtotime('monday this week'));
	    	$beginning_of_the_month = date("Y-m-d", strtotime(date("Y-m-01")));
	    	$end_of_the_month = date("Y-m-d", strtotime("-1 second", strtotime("+1 month", strtotime(date("Y-m-01")))));
	    	$beginning_of_the_year = date("Y-m-d", strtotime(date("Y-01-01")));

	    	// Get the statistics
	    	$statistics = array();

	    	// Get the source
	    	$statistics['source']['yesterday'] = $this->getAnalyticsData($yesterday, $today, 'ga:source', 'ga:visits', '-ga:visits', $url);
	    	$statistics['source']['week_to_date'] = $this->getAnalyticsData($beginning_of_the_week, $today, 'ga:source', 'ga:visits', '-ga:visits', $url);
	    	$statistics['source']['month_to_date'] = $this->getAnalyticsData($beginning_of_the_month, $today, 'ga:source', 'ga:visits', '-ga:visits', $url);
	    	$statistics['source']['year_to_date'] = $this->getAnalyticsData($beginning_of_the_year, $today, 'ga:source', 'ga:visits', '-ga:visits', $url);

	    	// Get the medium for yesterday
	    	$yesterday_medium = $this->getAnalyticsData($yesterday, $today, 'ga:medium', 'ga:visits', 'ga:visits', $url);
	    	$statistics['medium']['yesterday']['organic'] = 0;
	    	$statistics['medium']['yesterday']['referral'] = 0;
	    	$statistics['medium']['yesterday']['cpc'] = 0;
	    	$statistics['medium']['yesterday']['direct'] = 0;
	    	foreach ($yesterday_medium as $medium)
	    	{
	    		switch ($medium['medium'])
	    		{
	    			case 'organic':
	    				$statistics['medium']['yesterday']['organic'] += $medium['visits'];
	    				break;
	    			case 'referral':
	    				$statistics['medium']['yesterday']['referral'] += $medium['visits'];
	    				break;
	    			case 'cpc':
	    				$statistics['medium']['yesterday']['cpc'] += $medium['visits'];
	    				break;
	    			case '(none)':
	    			default:
	    				$statistics['medium']['yesterday']['direct'] += $medium['visits'];
	    				break;
	    		}
	    	}

			// Get the medium for week to date
	    	$week_to_date_medium = $this->getAnalyticsData($beginning_of_the_week, $today, 'ga:medium', 'ga:visits', 'ga:visits', $url);
	    	$statistics['medium']['week_to_date']['organic'] = 0;
	    	$statistics['medium']['week_to_date']['referral'] = 0;
	    	$statistics['medium']['week_to_date']['cpc'] = 0;
	    	$statistics['medium']['week_to_date']['direct'] = 0;
	    	foreach ($week_to_date_medium as $medium)
	    	{
	    		switch ($medium['medium'])
	    		{
	    			case 'organic':
	    				$statistics['medium']['week_to_date']['organic'] += $medium['visits'];
	    				break;
	    			case 'referral':
	    				$statistics['medium']['week_to_date']['referral'] += $medium['visits'];
	    				break;
	    			case 'cpc':
	    				$statistics['medium']['week_to_date']['cpc'] += $medium['visits'];
	    				break;
	    			case '(none)':
	    			default:
	    				$statistics['medium']['week_to_date']['direct'] += $medium['visits'];
	    				break;
	    		}
	    	}

			// Get the medium for month to date
	    	$month_to_date_medium = $this->getAnalyticsData($beginning_of_the_month, $today, 'ga:medium', 'ga:visits', 'ga:visits', $url);
	    	$statistics['medium']['month_to_date']['organic'] = 0;
	    	$statistics['medium']['month_to_date']['referral'] = 0;
	    	$statistics['medium']['month_to_date']['cpc'] = 0;
	    	$statistics['medium']['month_to_date']['direct'] = 0;
	    	foreach ($month_to_date_medium as $medium)
	    	{
	    		switch ($medium['medium'])
	    		{
	    			case 'organic':
	    				$statistics['medium']['month_to_date']['organic'] += $medium['visits'];
	    				break;
	    			case 'referral':
	    				$statistics['medium']['month_to_date']['referral'] += $medium['visits'];
	    				break;
	    			case 'cpc':
	    				$statistics['medium']['month_to_date']['cpc'] += $medium['visits'];
	    				break;
	    			case '(none)':
	    			default:
	    				$statistics['medium']['month_to_date']['direct'] += $medium['visits'];
	    				break;
	    		}
	    	}

			// Get the medium for year to date
	    	$year_to_date_medium = $this->getAnalyticsData($beginning_of_the_year, $today, 'ga:medium', 'ga:visits', 'ga:visits', $url);
	    	$statistics['medium']['year_to_date']['organic'] = 0;
	    	$statistics['medium']['year_to_date']['referral'] = 0;
	    	$statistics['medium']['year_to_date']['cpc'] = 0;
	    	$statistics['medium']['year_to_date']['direct'] = 0;
	    	foreach ($year_to_date_medium as $medium)
	    	{
	    		switch ($medium['medium'])
	    		{
	    			case 'organic':
	    				$statistics['medium']['year_to_date']['organic'] += $medium['visits'];
	    				break;
	    			case 'referral':
	    				$statistics['medium']['year_to_date']['referral'] += $medium['visits'];
	    				break;
	    			case 'cpc':
	    				$statistics['medium']['year_to_date']['cpc'] += $medium['visits'];
	    				break;
	    			case '(none)':
	    			default:
	    				$statistics['medium']['year_to_date']['direct'] += $medium['visits'];
	    				break;
	    		}
	    	}

	    	// Save the statistics
	    	if (!$statistics_data)
	    	{
	    		$statistics_data = new Statistic();
	    		$statistics_data->setStatisticType('referrers');
	    		$statistics_data->setUrl($url);
	    	}
	    	$statistics_data->setData(base64_encode(serialize($statistics)));
	    	$em->persist($statistics_data);
		    $em->flush();

	    }

		return unserialize(base64_decode($statistics_data->data));
    }

    // Get the percentage difference between two metric
    public function getMetricPercentageDifference($previous_metric = 0, $current_metric = 0, $positive_is_green = true, $previous_metric_precision = 1, $previous_metric_suffix = '')
    {
    	if ($previous_metric > 0)
	    {
	    	$percentage_change = number_format((($current_metric - $previous_metric) / $previous_metric) * 100, 1);
	    } else {
	    	$percentage_change = number_format(0, 1);
	    }
	    if ($positive_is_green)
	    {
		    return '<span class="metric-change">'.number_format($previous_metric, $previous_metric_precision).$previous_metric_suffix.'</span><br /><span class="metric-change '.(($percentage_change >= 0)?'green':'red').'">('.$percentage_change.'%)</span>';
		} else {
			return '<span class="metric-change">'.number_format($previous_metric, $previous_metric_precision).$previous_metric_suffix.'</span><br /><span class="metric-change '.(($percentage_change <= 0)?'green':'red').'">('.$percentage_change.'%)</span>';
		}
    }

    // Gets a JSON response of products from the Google product search
    public function getProductSearchData($searchPhrase, $alternativeSearchPhrase = '')
    {
    	$searchPhraseFound = false;
    	$products = array();

    	// Get the doctrine service
    	$doctrineService = $this->container->get('doctrine');

    	// Get the entity manager
    	$em = $doctrineService->getEntityManager();

    	// Tidy up search phrases
    	$searchPhrase = urlencode($searchPhrase);
    	$alternativeSearchPhrase = urlencode($alternativeSearchPhrase);

    	// Get timestamp
    	$timeStamp = new \DateTime();

    	$productSearch = $doctrineService->getRepository('WebIllumination\SiteBundle\Entity\ProductSearch')->findOneBySearchPhrase($searchPhrase);
    	if ($alternativeSearchPhrase != '')
    	{
    		$alternativeProductSearch = $doctrineService->getRepository('WebIllumination\SiteBundle\Entity\ProductSearch')->findOneBySearchPhrase($alternativeSearchPhrase);
    	}

    	// Check if product search has been found and if it is current
    	if ($productSearch)
    	{
    		if (strtotime($productSearch->getCreatedAt()->getTimestamp()) >= strtotime("-1 day"))
    		{
    			$searchPhraseFound = true;
    		}
    	}

        // Fetch the product data from Google search if search phrase does not already exist and is up-to-date
        if (!$searchPhraseFound)
        {
	    	// API URL
	    	$url = 'https://www.googleapis.com/shopping/search/v1/public/products?key='.$this->googleApiKey.'&country=GB&q='.$searchPhrase.'&alt=json&maxResults=10';

	    	// Try to fetch the product data from Google search
			$curl = curl_init($url);
	 		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	 		curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$productSearchData = curl_exec($curl);

			return $productSearchData;

			// Close the curl connection
			curl_close($curl);

			// Create new product search if it doesn't exist
			if (!$productSearch)
			{
				$productSearch = new ProductSearch();
			}
    		$productSearch->setSearchPhrase($searchPhrase);
    		$productSearch->setProductData($productSearchData);
    		$productSearch->setCreatedAt($timeStamp);
			$em->persist($productSearch);
		    $em->flush();
        }

        // Get the products
        $validProducts = false;
        $productData = json_decode($productSearch->getProductData());
        if ($productData->totalItems > 0)
        {
			$products = $productData->items;
			foreach ($products as $product)
			{
				if (isset($product->product->gtin))
				{
					$validProducts = true;
					continue;
				}
			}
		}
		if (!$validProducts)
		{
			if ($alternativeSearchPhrase != '')
			{
				// API URL
		    	$url = 'https://www.googleapis.com/shopping/search/v1/public/products?key='.$this->googleApiKey.'&country=GB&q='.$alternativeSearchPhrase.'&alt=json&maxResults=10';

		    	// Try to fetch the product data from Google search
				$curl = curl_init($url);
		 		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		 		curl_setopt($curl, CURLOPT_HEADER, 0);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$alternativeProductSearchData = curl_exec($curl);

				// Close the curl connection
				curl_close($curl);

				// Create new product search if it doesn't exist
				if (!$alternativeProductSearch)
				{
					$alternativeProductSearch = new ProductSearch();
				}
	    		$alternativeProductSearch->setSearchPhrase($alternativeSearchPhrase);
	    		$alternativeProductSearch->setProductData($alternativeProductSearchData);
	    		$alternativeProductSearch->setCreatedAt($timeStamp);
				$em->persist($alternativeProductSearch);
			    $em->flush();

			    // Get the products
		        $productData = json_decode($alternativeProductSearch->getProductData());
		        if ($productData->totalItems > 0)
		        {
					$products = $productData->items;
				}
			}
		}

        return $products;
    }

    // Clean HTML
    public function cleanHtml($content = '')
    {
    	// Remove any extra spaces from HTML
    	$content = preg_replace("/\s[>]([^\s])/", ">$1", $content);

    	return $content;
    }

	// Shorten content
    public function shortenContent($content = '', $minimum_length = 0)
    {
    	// Remove HTML
    	$content = $this->removeHtml($content);

    	// Clean
    	$content = $this->clean($content);

    	// Shorten the content
    	if (($minimum_length > 0) && (strlen($content) > $minimum_length))
    	{
    		$content = substr($content, 0, $minimum_length);
    		if (substr($content, 0, strrpos($content, ' ')) != '')
    		{
    			$content = substr($content, 0, strrpos($content, ' '));
    		}
    		$content = $content.'...';
    	}

    	return $content;
    }

    // Convert to HTML
    public function convertToHtml($content = '')
    {
    	// Remove HTML
    	$content = $this->removeHtml($content);

    	// Remove any extra spaces
    	$content = preg_replace("/[\t\s]+/s", " ", $content);

    	// Replace new lines
    	$content = preg_replace("/[\r\n]+/", "<br />", $content);

    	// Add a paragraph
    	$content = '<p>'.$content.'</p>';

    	return $content;
    }

    // Remove any HTML
    public function removeHtml($content = '')
    {
    	// Clean HTML
    	$content = $this->cleanHtml($content);

    	// Add spaces to ending HTMl tags
    	$content = preg_replace("/<\/([^\s])>/", "</$1> ", $content);

    	// Strip tags
    	$content = strip_tags($content);

    	// Remove any extra spaces
    	$content = preg_replace("/[\r\n\t\s]+/s", " ", $content);

    	// Tidy up spacing
    	$content = preg_replace("/\s{2,}/", " ", $content);

    	// Convert all HTML entities
    	$content = html_entity_decode($content);

    	return $content;
    }

    // Clean content
    public function clean($content = '')
    {
    	// Remove any extra spaces
    	$content = preg_replace("/[\r\n\t\s]+/s", " ", $content);

    	// Convert any htmlentities
    	$content = html_entity_decode($content);

    	// Remove any unexpected characters
    	$content = preg_replace("/[^a-zA-Z0-9\?\<\>\!\(\)\*\%\&\@\:\;\"\'\ \.\,\_\-\^\|\/]?/", "", $content);

		return $content;
    }

    // Remove any URLs
    function removeUrls($content)
    {
    	// Get the words
  		$words = explode(' ', $content);

		// Check if a URL exists and remove
  		foreach ($words as $index => $word)
  		{
    		if (stristr($word, 'http') || (count(explode('.', $word)) > 2))
    		{
				unset($words[$index]);
      			return $this->removeUrls(implode(' ', $words));
    		}
  		}
  		return implode(' ', $words);
	}

    // Clean description content
	function cleanDescriptionContent($content)
	{
	  	// Replacements
	  	$content_replacements_from = array();
	  	$content_replacements_to = array();

	  	// Tidy up fluid ounces
	  	$content_replacements_from[] = "/[Ff]{1}[Ll]{1}.?\s?[Oo]{1}[Zz]{1}/";
	  	$content_replacements_to[] = "fl oz";

		// Tidy up rpm
	  	$content_replacements_from[] = "/[Rr]{1}[Pp]{1}[Mm]{1}/";
	  	$content_replacements_to[] = "rpm";

	  	// Tidy up Maxi-sense
	  	$content_replacements_from[] = "/[Mm]{1}axi[\s\-]?[Ss]{1}ense/";
	  	$content_replacements_to[] = "Maxi-sense";

	  	// Tidy up Side-by-side
	  	$content_replacements_from[] = "/[Ss]{1}ide[\s\-]?[Bb]{1}y[\s\-]?[Ss]{1}ide/";
	  	$content_replacements_to[] = "side-by-side";

	  	// Tidy up Side-by-side
	  	$content_replacements_from[] = "/[Xx]{1}[Ll]{l}/";
	  	$content_replacements_to[] = "extra large";

	  	// Tidy up D-radius
	  	$content_replacements_from[] = "/[Dd]{1}[\s\-]?[Rr]{1}adius/";
	  	$content_replacements_to[] = "D-radius";

		// Tidy up 1.75 Bowl
	  	$content_replacements_from[] = "/1[\s]?3\/4\s[Bb]{1}owl/";
	  	$content_replacements_to[] = "1.75 bowl";

		// Tidy up 1.5 Bowl
	  	$content_replacements_from[] = "/1[\s]?(and|&|&amp;)?[\s]?1\/2\s[Bb]{1}owl/";
	  	$content_replacements_to[] = "1.5 bowl";

		// Tidy up Half Bowl
	  	$content_replacements_from[] = "/0\.5\s[Bb]{1}owl/";
	  	$content_replacements_to[] = "half bowl";

	  	// Tidy up Single Bowl
	  	$content_replacements_from[] = "/1\s[Bb]{1}owl/";
	  	$content_replacements_to[] = "single bowl";

	  	// Tidy up Double Bowl
	  	$content_replacements_from[] = "/2\s[Bb]{1}owl/";
	  	$content_replacements_to[] = "double bowl";

		// Tidy up In-column
	  	$content_replacements_from[] = "/[Ii]{1}n[\s\-]?[Cc]{1}olum[n]?/";
	  	$content_replacements_to[] = "in-column";

	  	// Tidy up Bean-to-cup
	  	$content_replacements_from[] = "/[Bb]{1}ean[\s\-]?[Tt]{1}o[\s\-]?[Cc]{1}up/";
	  	$content_replacements_to[] = "bean-to-cup";

	  	// Tidy up kW
	  	$content_replacements_from[] = "/[Kk]{1}[Ww]{1}/";
	  	$content_replacements_to[] = "kW";

	  	// Tidy up Built-in
	  	$content_replacements_from[] = "/[Bb]{1}uilt[\s\-]?[Ii]{1}n/";
	  	$content_replacements_to[] = "built-in";

	  	// Tidy up Built-under
	  	$content_replacements_from[] = "/[Bb]{1}uilt[\s\-]?[Uu]{1}nder/";
	  	$content_replacements_to[] = "built-under";

	  	// Tidy up Under-counter
	  	$content_replacements_from[] = "/[Uu]{1}nder[\s\-]?[Cc]{1}ounter/";
	  	$content_replacements_to[] = "under-counter";

	  	// Tidy up Under-cabinet
	  	$content_replacements_from[] = "/[Uu]{1}nder[\s\-]?[Cc]{1}abinet/";
	  	$content_replacements_to[] = "under-cabinet";

	  	// Tidy up Semi-integrated
	  	$content_replacements_from[] = "/[Ss]{1}emi[\s\-]?[Ii]{1}ntegrated/";
	  	$content_replacements_to[] = "semi-integrated";

	  	// Tidy up Fully-integrated
	  	$content_replacements_from[] = "/[Ff]{1}ully[\s\-]?[Ii]{1}ntegrated/";
	  	$content_replacements_to[] = "fully-integrated";

	  	// Tidy up Semi-automatic
	  	$content_replacements_from[] = "/[Ss]{1}emi[\s\-]?[Aa]{1}utomatic/";
	  	$content_replacements_to[] = "semi-automatic";

	  	// Tidy up Fully-automatic
	  	$content_replacements_from[] = "/[Ff]{1}ully[\s\-]?[Aa]{1}utomatic/";
	  	$content_replacements_to[] = "fully-automatic";

	  	// Tidy up Pull-out
	  	$content_replacements_from[] = "/[Pp]{1}ull[\s\-]?[Oo]{1}ut/";
	  	$content_replacements_to[] = "pull-out";

	  	// Tidy up including
	  	$content_replacements_from[] = "/\s[Ii]{1}nc\s/";
	  	$content_replacements_to[] = " including ";

	  	// Tidy up use
	  	$content_replacements_from[] = "/\s[Uu]{1}se\s/";
	  	$content_replacements_to[] = " use ";

	  	// Tidy up ?-piece
	  	$content_replacements_from[] = "/([2345TtYy]{1})[\s\-]?[Pp]{1}iece/";
	  	$content_replacements_to[] = "$1-piece";

	  	// Tidy up ?-spout
	  	$content_replacements_from[] = "/([Cc]{1})[\s\-]?[Ss]{1}pout/";
	  	$content_replacements_to[] = "$1-spout";

	  	// Tidy up ?-end
	  	$content_replacements_from[] = "/([Cc]{1})[\s\-]?[Ee]{1}nd/";
	  	$content_replacements_to[] = "$1-end";

	  	// Tidy up Brushed Steel
	  	$content_replacements_from[] = "/[Bb]{1}[\-\/]{1}[Ss]{1}teel/";
	  	$content_replacements_to[] = "brushed steel";

	  	// Tidy up Stainless Steel
	  	$content_replacements_from[] = "/[Ss]{1}[\-\/]{1}[Ss]{1}teel/";
	  	$content_replacements_to[] = "stainless steel";

	  	// Remove trade marks
	  	$content_replacements_from[] = "/™/";
	  	$content_replacements_to[] = "";

	  	// Replace long dashes
	  	$content_replacements_from[] = "/–/";
	  	$content_replacements_to[] = "-";

	  	// Replace single quotes
	  	$content_replacements_from[] = "/’/";
	  	$content_replacements_to[] = "'";

	  	// Replace single quotes
	  	$content_replacements_from[] = "/`/";
	  	$content_replacements_to[] = "'";

	  	// Tidy up m
	  	$content_replacements_from[] = "/[\s]?[Mm]{1}etre/";
	  	$content_replacements_to[] = "m";

	  	// Tidy up l
	  	$content_replacements_from[] = "/[\s]?[Ll]{1}itre/";
	  	$content_replacements_to[] = "l";

  		// Tidy up -in
	  	$content_replacements_from[] = "/\-[Ii]{1}n/";
	  	$content_replacements_to[] = "-in";

  		// Tidy up plus
	  	$content_replacements_from[] = "/\s[Pp]{1}lus\s/";
	  	$content_replacements_to[] = " plus ";

	  	// Tidy up including
	  	$content_replacements_from[] = "/\s[Ii]{1}ncluding\s/";
	  	$content_replacements_to[] = " including ";

	  	// Tidy up Push/pull
	  	$content_replacements_from[] = "/[Pp]{1}ush\/[Pp]{1}ull/";
	  	$content_replacements_to[] = "push/pull";

	  	// Tidy up +
	  	$content_replacements_from[] = "/\s\+\s/";
	  	$content_replacements_to[] = " and ";

	  	// Tidy up *
	  	$content_replacements_from[] = "/\*/";
	  	$content_replacements_to[] = "";

	  	// Tidy up with
	  	$content_replacements_from[] = "/\s[Ww]{1}ith\s/";
	  	$content_replacements_to[] = " with ";

	  	// Tidy up in
	  	$content_replacements_from[] = "/\s[Ii]{1}n\s/";
	  	$content_replacements_to[] = " in ";

	  	// Tidy up of
	  	$content_replacements_from[] = "/\s[Oo]{1}f\s/";
	  	$content_replacements_to[] = " of ";

	  	// Tidy up for
	  	$content_replacements_from[] = "/\s[Ff]{1}or\s/";
	  	$content_replacements_to[] = " for ";

	  	// Tidy up or
	  	$content_replacements_from[] = "/\s[Oo]{1}r\s/";
	  	$content_replacements_to[] = " or ";

	  	// Tidy up and
	  	$content_replacements_from[] = "/\s[Aa]{1}nd\s/";
	  	$content_replacements_to[] = " and ";

	  	// Tidy up to
	  	$content_replacements_from[] = "/\s[Tt]{1}o\s/";
	  	$content_replacements_to[] = " to ";

	  	// Tidy up too
	  	$content_replacements_from[] = "/\s[Tt]{1}oo\s/";
	  	$content_replacements_to[] = " too ";

	  	// Tidy up &amp;
	  	$content_replacements_from[] = "/\s&amp;\s/";
	  	$content_replacements_to[] = " and ";

	  	// Tidy up &
	  	$content_replacements_from[] = "/\s&\s/";
	  	$content_replacements_to[] = " and ";

	  	// Tidy up mm
	  	$content_replacements_from[] = "/M[Mm]{1}/";
	  	$content_replacements_to[] = "mm";

	  	// Tidy up ize to ise
	  	$content_replacements_from[] = "/([a-zA-Z]{2})ize{1}/";
	  	$content_replacements_to[] = "$1ise";

	  	// Tidy up izer to iser
	  	$content_replacements_from[] = "/([a-zA-Z]{2})izer{1}/";
	  	$content_replacements_to[] = "$1iser";

	  	// Tidy up yze to yse
	  	$content_replacements_from[] = "/([a-zA-Z]{2})yze{1}/";
	  	$content_replacements_to[] = "$1yse";

	  	// Tidy up ization to isation
	  	$content_replacements_from[] = "/([a-zA-Z]{2})ization{1}/";
	  	$content_replacements_to[] = "$1isation";

	  	// Tidy up times symbol
	  	$content_replacements_from[] = "/([0-9]{1})\s*[Xx]\s*([0-9]{1})/";
	  	$content_replacements_to[] = "$1 &times; $2";

	  	// Tidy up spin
	  	$content_replacements_from[] = "/([0-9]{1})\s?[Ss]{1}pin/";
	  	$content_replacements_to[] = "$1rpm";

	  	// Remove any spaces around slashes
	  	$content_replacements_from[] = "/\s*\/\s*/";
	  	$content_replacements_to[] = "/";

	  	// Remove any new lines or tabs
	  	$content_replacements_from[] = "/[\r\n\t]/";
	  	$content_replacements_to[] = "";

	  	// Remove any extra spaces
		$content_replacements_from[] = "/\s{2,}/";
	  	$content_replacements_to[] = " ";

	  	// Tidy up joined periods
	  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})[\s|&nbsp;]*[\.]{1}[\s|&nbsp;]*([a-zA-Z0-9]{1})/";
	  	$content_replacements_to[] = "$1. $2";

	  	// Tidy up joined commas
	  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})\s*[\,]{1}\s*([a-zA-Z0-9]{1})/";
	  	$content_replacements_to[] = "$1, $2";

	  	// Tidy up joined semi colons
	  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})\s*[\;]{1}\s*([a-zA-Z0-9]{1})/";
	  	$content_replacements_to[] = "$1; $2";

	  	// Tidy up joined colons
	  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})\s*[\:]{1}\s*([a-zA-Z0-9]{1})/";
	  	$content_replacements_to[] = "$1: $2";

	  	// Make the replacements
	  	$content = preg_replace($content_replacements_from, $content_replacements_to, $content);

	  	// Trim any surrounding spaces
	  	$content = trim($content);

	  	return $content;
	}

	// Clean any dirty formatting
	function cleanDirtyFormatting($content)
	{
		$content = str_replace(array('<p></p>', '<p> </p>', '<p>&nbsp;</p>'), '', $content);
		$content = preg_replace('#style="[^"]*"#i', '', $content);
		$content = preg_replace('#class="[^"]*"#i', '', $content);
		$content = preg_replace('#id="[^"]*"#i', '', $content);
		$content = preg_replace('/<!--(.*?)-->/i', '', $content);
		$content = preg_replace("/<div(\s[^>]*[^>]*)?>/", "", $content);
		$content = preg_replace("/<\/div>/", "", $content);
		$content = preg_replace("/<span(\s[^>]*[^>]*)?>/", "", $content);
		$content = preg_replace("/<\/span>/", "", $content);
		$content = preg_replace("/<font(\s[^>]*[^>]*)?>/", "", $content);
		$content = preg_replace("/<\/font>/", "", $content);
		$content = preg_replace("/[\r\n]/", "<br />", $content);
		$content = preg_replace("/<br \/>(<br \/>)+/", "", $content);
		return $content;
	}

	// Strip any whitespace
	function stripWhitespace($content)
	{
		$content = str_replace('&nbsp;', '', $content);
		$content = preg_replace("/[\r\n\t]/", "", $content);
		$content = preg_replace("/\s{2,}/", " ", $content);
		$content = preg_replace("/\s[>]([^\s])/", ">$1", $content);
		return $content;
	}

	// Prepare paragraphs
	function prepareParagraphs($content)
	{
		$content = preg_replace("/<br(\s)*\/?>/", "", $content);
		$content = preg_replace("/<p>\s/", "<p>", $content);
		$content = preg_replace("/\s<\/li>/", "</p>", $content);
		$content = preg_replace("/<p(\s[^>]*[^>]*)?>/", "<p>", $content);
		return $content;
	}

    // Generate keywords
    public function generateKeywords($content = '', $separator = ', ')
    {
    	// Remove HTML
    	$content = $this->removeHtml($content);

    	// Clean
    	$content = $this->clean($content);

    	// Remove any unexpected characters
    	$content = preg_replace("/[^a-zA-Z0-9\ \-]?/", "", $content);
    	$content = str_replace("-", " ", $content);

    	// Convert to lowercase
	    $content = strtolower($content);

	    // Split into words
	    $keywords = explode(' ', $content);

	    // Remove any words on the ignore list
	    foreach ($keywords as $index => $keyword)
	    {
	    	if (in_array($keyword, $this->commonWords))
	    	{
	    		unset($keywords[$index]);
	    	}
	    }

	    // Add separator
    	$keywords = implode($separator, $keywords);

		return $keywords;
    }

    // Generate alternative product codes
    public function generateAlternativeProductCodes($product_code = '')
    {
    	// Store the alternatives
    	$product_codes = array();

    	// Add the initial product code
    	$product_codes[] = strtoupper($product_code);

    	// Store number of passes
    	$current_pass = 0;
    	$number_of_passes = strlen($product_code);

		// Generate alternatives
		while ($current_pass < $number_of_passes)
		{
			foreach ($product_codes as $product_code)
			{
				foreach (str_split($product_code) as $index => $letter)
				{

					$alternative_product_code = '';
					foreach (str_split($product_code) as $alternative_index => $alternative_letter)
					{
						if ($index == $alternative_index)
						{
							$alternative_product_code .= '*';
						} else {
							$alternative_product_code .= $alternative_letter;
						}
					}

					// Generate the new product codes
					if (strrpos($product_code, "1") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('1', 'L', $alternative_product_code));
						$product_codes[] = str_replace('*', $letter, str_replace('1', 'I', $alternative_product_code));
					}
					if (strrpos($product_code, "L") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('L', '1', $alternative_product_code));
						$product_codes[] = str_replace('*', $letter, str_replace('L', 'I', $alternative_product_code));
					}
					if (strrpos($product_code, "I") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('I', 'L', $alternative_product_code));
						$product_codes[] = str_replace('*', $letter, str_replace('I', '1', $alternative_product_code));
					}
					if (strrpos($product_code, "0") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('0', 'O', $alternative_product_code));
					}
					if (strrpos($product_code, "O") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('O', '0', $alternative_product_code));
					}
					if (strrpos($product_code, "5") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('5', 'S', $alternative_product_code));
					}
					if (strrpos($product_code, "S") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('S', '5', $alternative_product_code));
					}
					if (strrpos($product_code, "2") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('2', 'Z', $alternative_product_code));
					}
					if (strrpos($product_code, "Z") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('Z', '2', $alternative_product_code));
					}
					if (strrpos($product_code, "8") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('8', 'B', $alternative_product_code));
					}
					if (strrpos($product_code, "B") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('B', '8', $alternative_product_code));
					}
					if (strrpos($product_code, "-") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('-', '', $alternative_product_code));
					}
					if (strrpos($product_code, ".") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('.', '', $alternative_product_code));
					}
					if (strrpos($product_code, "/") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace('/', '', $alternative_product_code));
					}
					if (strrpos($product_code, " ") !== false)
					{
						$product_codes[] = str_replace('*', $letter, str_replace(' ', '', $alternative_product_code));
					}
				}

				// Only return unique product codes
				$product_codes = array_unique($product_codes);

				// Next pass
				$current_pass++;
			}
		}

		return $product_codes;
    }
}
