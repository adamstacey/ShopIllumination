<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Form\Basket\BasketType;
use KAC\SiteBundle\Form\Basket\NewBasketItemType;
use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
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
        $manager->loadProducts();

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
        $deliveryManager = $this->container->get('kac_site.manager.delivery');
        $basket = $manager->getBasket();
        $manager->loadProducts();

        $form = $this->createForm(new BasketType($basket->getDelivery()->getMethods()), $basket);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $manager->refreshBasket();
            $manager->saveBasket();

            if(!$request->isXmlHttpRequest())
            {
                return $this->redirect($this->generateUrl('basket_summary'));
            } else {
                return new Response(json_encode(array('status' => 'Success')));
            }
        }

        if(!$request->isXmlHttpRequest())
        {
            return $this->render('KACSiteBundle:Basket:summary.html.twig', array(
                'basket' => $basket,
                'form' => $form->createView(),
            ));
        } else {
            return new Response(json_encode(array('status' => 'Failure')));
        }
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
            $loaded = false;
            if($existingItem !== null)
            {
                $existingItem->setQuantity($existingItem->getQuantity() + $item->getQuantity());
            } else {
                $basket->addItem($item);

                // Load costs
                $manager->loadProducts();
                $item->setUnitCost($item->getVariant()->getPrice()->getListPrice());
                $item->setRecommendedRetailPrice($item->getVariant()->getPrice()->getRecommendedRetailPrice());
                $loaded = true;
            }

            if(!$loaded)
            {
                $manager->loadProducts();
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
            $manager->loadProducts();
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
        $manager->loadProducts();
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

    /**
     * @Route("/delivery-methods.html", name="basket_delivery_methods")
     */
    public function deliveryMethodsAction(Request $request)
    {
        $manager = $this->container->get('kac_site.manager.basket');
        $deliveryManager = $this->container->get('kac_site.manager.delivery');

        $basket = $manager->getBasket();

        $form = $this->createFormBuilder()
            ->add('countryCode', 'country')
            ->add('postZipCode', 'text')
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {
            $data = $form->getData();

            // Calculate zone and band
            $zone = $deliveryManager->calculateZone($data['countryCode'], $data['postZipCode']);
            $band = $deliveryManager->calculateBand($basket->getItems());

            // Get available methods
            $methods = DeliveryMethodFactory::getMethods($zone, $band);

            return new Response(json_encode(array('status' => 'Success', 'methods' => $methods)));
        }

        return new Response(json_encode(array('status' => 'Failure')), 400);
    }
}
