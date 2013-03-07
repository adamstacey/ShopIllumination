<?php

namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Entity\Routing;
use KAC\SiteBundle\Entity\Redirect;

class SeoManager extends Manager {

    protected $templating;

    // HTML Purifier config
    protected $htmlPurifierConfig;

    public function __construct($doctrine)
    {
        parent::__construct($doctrine);

//        $this->templating = $templating;
//        $this->mailer = $mailer;

        \HTMLPurifier_Bootstrap::registerAutoload();

        // HTML Purifier config
        $this->htmlPurifierConfig = \HTMLPurifier_Config::createDefault();
        $this->htmlPurifierConfig->set('Core.Encoding', 'UTF-8');
        $this->htmlPurifierConfig->set('HTML.Doctype', 'XHTML 1.0 Transitional');
        $this->htmlPurifierConfig->set('HTML.TidyLevel', 'heavy');
        $this->htmlPurifierConfig->set('AutoFormat.RemoveEmpty.RemoveNbsp', true);
        $this->htmlPurifierConfig->set('AutoFormat.RemoveEmpty', true);
        $this->htmlPurifierConfig->set('AutoFormat.AutoParagraph', true);
        $this->htmlPurifierConfig->set('HTML.ForbiddenElements', array('div', 'span', 'font', 'pre'));
        $this->htmlPurifierConfig->set('HTML.ForbiddenAttributes', array('class', 'id', 'style'));
    }

    // Update redirects
    public function updateRedirects($objectId, $objectType, $redirectFrom, $redirectTo)
    {
        if (!$redirectFrom || !$redirectTo)
        {
            return false;
        }

        // Get the entity manager
        $em = $this->doctrine->getManager();

        // Remove any redirects to the new URL
        $existingRedirects = $this->doctrine->getRepository('KAC\SiteBundle\Entity\Redirect')->findByRedirectFrom($redirectTo);
        foreach ($existingRedirects as $existingRedirect)
        {
            $em->remove($existingRedirect);
            $em->flush();
        }

        // Update any redirects that are redirected to the existing URL
        $existingRedirects = $this->doctrine->getRepository('KAC\SiteBundle\Entity\Redirect')->findByRedirectTo($redirectFrom);
        foreach ($existingRedirects as $existingRedirect)
        {
            $existingRedirect->setRedirectTo($redirectTo);
            $em->flush();
        }

        // Create a new redirect
        $redirect = new Redirect();
        $redirect->setObjectId($objectId);
        $redirect->setObjectType($objectType);
        $redirect->setRedirectFrom($redirectFrom);
        $redirect->setRedirectTo($redirectTo);
        $redirect->setRedirectCode('301');
        $em->persist($redirect);
        $em->flush();

        return true;
    }

    // Create URL
    public function createUrl($url, $existingUrl = '')
    {
        // Count duplicate URLs
        $duplicate_count = 0;

        // Generate the URL
        $url = $this->generateUrl($url);

        // Check if the URL already exist
        if ($url != $existingUrl)
        {
            while ($this->doesUrlExist($url, $existingUrl))
            {
                $duplicate_count++;
                $url = $url.'-'.$duplicate_count;
            }
        }
        return $url;
    }

    // Generate a URL
    public function generateUrl($url = '')
    {
        if ($url != '')
        {
            // Add spaces to ending HTMl tags
            $url = preg_replace("/<\/([^\s])>/", "</$1> ", $url);

            // Strip tags
            $url = strip_tags($url);

            // Convert all HTML entities
            $url = html_entity_decode($url);

            // Replace any white space
            $url = preg_replace("/[\r\n\t\s]+/s", "-", $url);

            // Replace any dashes
            $url = preg_replace("/[\-]+/s", "-", $url);
            $url = str_replace('--', '-', $url);

            // Convert to lowercase
            $url = strtolower($url);

            // Remove any unexpected characters
            $url = preg_replace("/[^a-zA-Z0-9\-\/]?/", "", $url);
        }

        return $url;
    }

    // Check if URL already exists
    public function doesUrlExist($url = '')
    {
        if ($url != '')
        {
            $urlCheck = $this->doctrine->getRepository('KAC\SiteBundle\Entity\Routing')->findOneByUrl($url);
            if ($urlCheck)
            {
                return true;
            }
        }
        return false;
    }

    // Clean HTML
    public function cleanHtml($content = '')
    {
        // Remove any extra spaces
        $content = preg_replace("/[\r\n\t\s]+/s", " ", $content);
        $content = str_replace('> <', '><', $content);

        // Convert the encoding of the content
        $content = html_entity_decode($content, ENT_QUOTES, 'UTF-8');

        // Get the purifier
        $purifier = new \HTMLPurifier($this->htmlPurifierConfig);

        // Clean any dirty formatting
        $content = $purifier->purify($content);

        // Remove any extra spaces
        $content = preg_replace("/[\r\n\t\s]+/s", " ", $content);
        $content = str_replace('> <', '><', $content);

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

    // Get menu title
    public function getMenuTitle($content = '')
    {
        // Ampersand replacements
        $replacements = array(' AND ', ' ANd ', ' AnD ', ' aNd ', ' aND ', ' anD ', ' and ', ' + ');
        $content = str_replace($replacements, ' & ', $content);

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

        // Remove any unexpected characters
        $content = preg_replace("/[^a-zA-Z0-9\?\<\>\!\(\)\*\%\&\@\:\;\"\'\ \.\,\_\-\^\|\/]?/", "", $content);

        return $content;
    }

    // Generate keywords
    public function generateKeywords($content = '', $separator = ', ')
    {
        // Common words to ignore
        $words_to_ignore = array('the', 'be', 'to', 'of', 'and', 'a', 'in', 'that', 'have', 'i', 'it', 'for', 'not', 'on', 'with', 'he', 'as', 'you', 'do', 'at', 'this', 'but', 'his', 'by', 'from', 'they', 'we', 'say', 'her', 'she', 'or', 'an', 'will', 'my', 'one', 'all', 'would', 'there', 'their', 'what', 'so', 'up', 'out', 'if', 'about', 'who', 'get', 'which', 'go', 'me', 'when', 'make', 'can', 'like', 'time', 'no', 'just', 'him', 'know', 'take', 'person', 'into', 'year', 'your', 'good', 'some', 'could', 'them', 'see', 'other', 'than', 'then', 'now', 'look', 'only', 'come', 'its', 'over', 'think', 'also', 'back', 'after', 'use', 'two', 'how', 'our', 'work', 'first', 'well', 'way', 'even', 'new', 'want', 'because', 'any', 'these', 'give', 'day', 'most', 'us');

        // Remove HTML
        $content = $this->removeHtml($content);

        // Clean
        $content = $this->clean($content);

        // Remove any unexpected characters
        $content = preg_replace("/[^a-zA-Z0-9\ \-]?/", "", $content);

        // Convert to lowercase
        $content = strtolower($content);

        // Split into words
        $keywords = explode(' ', $content);

        // Remove any words on the ignore list
        foreach ($keywords as $index => $keyword)
        {
            if (in_array($keyword, $words_to_ignore))
            {
                unset($keywords[$index]);
            } elseif ($keyword == '') {
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
