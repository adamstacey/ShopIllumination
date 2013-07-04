<?php

namespace KAC\SiteBundle\Controller;

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
        if(!$request->query->has('productId')) {
            throw $this->createNotFoundException('You must specify the product ID');
        }

        $productId = $request->query->get('productId');
        $variantId = $request->query->get('variantId', $productId);
        $quantity = $request->query->get('quantity', 1);

        $manager = $this->container->get('kac_site.manager.basket');
        $basket = $manager->getBasket();

        // Create the item
        $item = new BasketItem();
        $item->setProductId($productId);
        $item->setVariantId($variantId);
        $item->setQuantity($quantity);

        $basket->addItem($item);
        $manager->saveBasket();

        \Doctrine\Common\Util\Debug::dump($basket->getItems());

        return new Response('Added item');
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
        $manager = $this->container->get('kac_site.manager.basket');
        $manager->clearBasket();

        return new Response('Cleared basket');
    }
}
