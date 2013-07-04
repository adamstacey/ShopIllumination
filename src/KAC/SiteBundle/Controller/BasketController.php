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
        $manager->loadProducts();

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
            'form' => $form,
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
            // Check if an item already exists with that variant
            $existingItem = null;
            foreach($basket->getItems() as $itemCheck)
            {
                if($item !== $itemCheck && $item->getVariantId() === $itemCheck->getVariantId())
                {
                    $existingItem = $itemCheck;
                    break;
                }
            }

            // If an existing item was found merge the items
            if($existingItem !== null)
            {
                $existingItem->setQuantity($existingItem->getQuantity() + $item->getQuantity());
            } else {
                $basket->addItem($item);

                // Load costs
                $manager->loadProducts();
                $item->setUnitCost($item->getVariant()->getPrice()->getListPrice());
            }

            $manager->refreshBasket();
            $manager->saveBasket();

            if(!$request->isXmlHttpRequest())
            {
                return $this->redirect($this->generateUrl('basket_summary'));
            } else {
                return new Response(json_encode(array('status' => 'Success')));
            }
        }

        return new Response(json_encode(array('status' => 'Failure')), 400);
    }

    /**
     * @Route("/update.html", name="basket_update")
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

            if(!$request->isXmlHttpRequest())
            {
                return $this->redirect($this->generateUrl('basket_summary'));
            }
        }

        return new Response(json_encode(array('status' => 'Failure')), 400);
    }

    /**
     * @Route("/remove.html", name="basket_remove")
     */
    public function removeAction(Request $request)
    {
        if(!$request->query->has('item')) {
            return new Response(json_encode(array('status' => 'Failure')), 400);
        }

        $index = $request->query->get('item');
        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        $basket->removeItem($index);
        $manager->refreshBasket();
        $manager->saveBasket();

        if(!$request->isXmlHttpRequest())
        {
            if($basket->getTotalItems() > 0)
            {
                return $this->redirect($this->generateUrl('basket_summary'));
            } else {
                return $this->redirect($this->generateUrl('homepage'));
            }
        } else {
            return new Response(json_encode(array('status' => 'Success')));
        }
    }

    /**
     * @Route("/clear.html", name="basket_clear")
     */
    public function clearAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $manager->clearBasket();

        if(!$request->isXmlHttpRequest())
        {
            return $this->redirect($this->generateUrl('homepage'));
        } else {
            return new Response(json_encode(array('status' => 'Success')));
        }
    }
}
