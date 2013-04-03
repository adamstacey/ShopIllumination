<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Buzz\Browser;

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
        // Get the JSON feed and gzunpack
        $file = gzdecode( file_get_contents("http://s.trustpilot.com/tpelements/283177/f.json.gz") );

        // JSON decode the string
        $result = json_decode($file, true);

        return $this->render('KACSiteBundle:Reviews:trustpilot.html.twig', array(
            'result' => $result
        ));
    }
}