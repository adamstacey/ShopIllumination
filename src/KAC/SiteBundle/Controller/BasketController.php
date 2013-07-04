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
     * @Route("/summary.html", name="basket_summary")
     */
    public function summaryAction(Request $request)
    {
        $basket = $this->get('session')->get('basket');

        return $this->render('KACSiteBundle:Basket:summary.html.twig', array(
            'basket' => $basket,
        ));
    }
    /**
     * @Route("/your-basket.html", name="basket_detail")
     */
    public function detailAction(Request $request)
    {
        $basket = $this->get('session')->get('basket');

        return $this->render('KACSiteBundle:Basket:summary.html.twig', array(
            'basket' => $basket,
        ));
    }

    /**
     * @Route("/add.html", name="basket_add")
     */
    public function addAction(Request $request)
    {

    }

    /**
     * @Route("/remove.html", name="basket_remove")
     */
    public function removeAction(Request $request)
    {

    }

    /**
     * @Route("/clear.html", name="basket_clear")
     */
    public function clearAction(Request $request)
    {

    }
}
