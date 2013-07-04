<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Form\Basket\BasketType;
use KAC\SiteBundle\Form\Basket\NewBasketItemType;
use KAC\SiteBundle\Model\BasketItem;
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
     * @Route("/small_summary.html", name="basket_small_summary")
     */
    public function smallSummaryAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        return $this->render('KACSiteBundle:Basket:small_summary.html.twig', array(
            'basket' => $basket,
        ));
    }

    /**
     * @Route("/summary.html", name="basket_summary")
     */
    public function summaryAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        $form = $this->createForm(new BasketType(), $basket);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $manager->refreshBasket();
            $manager->saveBasket();

            return $this->redirect($this->generateUrl('basket_summary'));
        }

        return $this->render('KACSiteBundle:Basket:summary.html.twig', array(
            'basket' => $basket,
        ));
    }

    /**
     * @Route("/add.html", name="basket_add")
     */
    public function addAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        $item = new BasketItem();
        $form = $this->createForm(new NewBasketItemType(), $item);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $basket->addItem($item);

            $manager->refreshBasket();
            $manager->saveBasket();

            return $this->redirect($this->generateUrl('basket_summary'));
        }

//        \Doctrine\Common\Util\Debug::dump($form);die();
        return new Response('Failed to add item');
    }

    /**
     * @Route("/remove.html", name="basket_update")
     */
    public function updateAction(Request $request)
    {
        if(!$request->query->has('item')) {
            throw $this->createNotFoundException('You must specify the basket item');
        }

        $index = $request->query->get('item');
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        $item = $basket->getItem($index);

        $form = $this->createForm(new NewBasketItemType(), $item);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $manager->refreshBasket();
            $manager->saveBasket();

            return $this->redirect($this->generateUrl('basket_summary'));
        }
    }

    /**
     * @Route("/remove.html", name="basket_remove")
     */
    public function removeAction(Request $request)
    {
        if(!$request->query->has('item')) {
            throw $this->createNotFoundException('You must specify the basket item');
        }

        $index = $request->query->get('item');
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        $basket->removeItem($index);
        $manager->refreshBasket();
        $manager->saveBasket();

        if($basket->getTotalItems() > 0)
        {
            return $this->redirect($this->generateUrl('basket_summary'));
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/clear.html", name="basket_clear")
     */
    public function clearAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $manager->clearBasket();

        return $this->redirect($this->generateUrl('homepage'));
    }
}
