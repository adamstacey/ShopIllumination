<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\Bundle\DoctrineBundle\Registry;
use JMS\Serializer\Serializer;
use KAC\SiteBundle\Model\Basket;
use KAC\SiteBundle\Model\BasketItem;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketManager extends Manager
{
    private $deliveryManager;
    private $session;
    private $serializer;

    /**
     * @var Basket[]
     */
    private $baskets= array();

    public function __construct(Registry $doctrine, DeliveryManager $deliveryManager, SessionInterface $session, Serializer $serializer)
    {
        parent::__construct($doctrine);

        $this->deliveryManager = $deliveryManager;
        $this->session = $session;
        $this->serializer = $serializer;
    }

    public function getBasket($key='basket')
    {
        if(!array_key_exists($key, $this->baskets))
        {
            if($this->session->has($key))
            {
                $this->baskets[$key] = $this->serializer->deserialize($this->session->get($key), 'KAC\SiteBundle\Model\Basket', 'json');
            } else {
                $this->baskets[$key] = new Basket();
                $this->refreshBasket();
            }
        }

        return $this->baskets[$key];
    }

    public function saveBasket($key='basket', $basket=null)
    {
        if($basket || array_key_exists($key, $this->baskets))
        {
            $this->session->set($key, $this->serializer->serialize($basket !== null ? $basket : $this->baskets[$key], 'json'));
        }
    }

    public function clearBasket($key='basket')
    {
        $this->baskets[$key] = null;
        $this->session->remove($key);
    }

    public function refreshBasket($key='basket')
    {
        if(array_key_exists($key, $this->baskets))
        {
            $basket = $this->baskets[$key];
            foreach($basket->getItems() as $item)
            {
                $item->calculateSavings();
            }

            $basket->getDelivery()->setZone($this->deliveryManager->calculateZone($basket->getDelivery()->getCountryCode(), $basket->getDelivery()->getPostZipCode()));
            $basket->getDelivery()->setWeighting($this->deliveryManager->calculateWeighting($basket->getItems()));
            $basket->getDelivery()->setWeight($this->deliveryManager->calculateWeight($basket->getItems()));
            $basket->getDelivery()->setBand($this->deliveryManager->calculateBand($basket->getDelivery()->getWeighting()));
            $basket->getDelivery()->setDeliveryOptions($this->deliveryManager->calculateDeliveryOptions($basket->getDelivery()->getZone(), $basket->getDelivery()->getBand()));

            if($basket->getDelivery()->getService() === '' && count($basket->getDelivery()->getDeliveryOptions()) > 0)
            {
                $basket->getDelivery()->setService($basket->getDelivery()->getDeliveryOptions()[0]['service']);
            }

            $basket->getDelivery()->setEstimatedDeliveryDays($this->deliveryManager->calculateEstimatedDeliveryDays($basket->getDelivery()->getDeliveryOptions(), $basket->getDelivery()->getService()));
            $basket->getDelivery()->setPrice($this->deliveryManager->calculatePrice($basket->getDelivery()->getDeliveryOptions(), $basket->getDelivery()->getService()));

            $this->baskets[$key]->calculateTotals();
        }
    }

    public function loadProducts($key='basket')
    {
        if(array_key_exists($key, $this->baskets))
        {
            foreach($this->getBasket($key)->getItems() as $index => $item)
            {
                $em = $this->doctrine->getManager();
                $product = $em->getRepository('KAC\SiteBundle\Entity\Product')->find($item->getProductId());
                $variant = $em->getRepository('KAC\SiteBundle\Entity\Product\Variant')->find($item->getVariantId());

                if($product && $variant)
                {
                    $item->setProduct($product);
                    $item->setVariant($variant);
                } else {
                    $this->getBasket()->removeItem($index);
                    $this->refreshBasket();
                }
            }
        }
    }
}