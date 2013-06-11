<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/reviews")
 */
class ReviewsController extends Controller
{
    /**
     * @Route("/trustpilot", name="reviews_trustpilot")
     * @Method({"GET"})
     */
    public function trustpilotAction(Request $request)
    {
        $url = "http://s.trustpilot.com/tpelements/283177/f.json.gz";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $file = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check on the status of the HTTP code
        if (($httpCode >= 200) && ($httpCode < 300))
        {
            // Get the JSON feed and gzunpack
            $file = gzdecode($file);

            // JSON decode the string
            $result = json_decode($file, true);
        } else {
            $result = false;
        }

        return $this->render('KACSiteBundle:Reviews:trustpilot.html.twig', array(
            'result' => $result
        ));
    }
}