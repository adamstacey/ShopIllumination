<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/basket")
 */
class BasketController extends Controller
{
    /**
     * @Route("/summary", name="basket_summary")
     */
    public function summaryAction(Request $request)
    {
        $basket = $this->get('session')->get('basket');

        return $this->render('KACSiteBundle:Basket:summary.html.twig', array(
            'basket' => $basket,
        ));
    }
}
