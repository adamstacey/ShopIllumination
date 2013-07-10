<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\Bundle\DoctrineBundle\Registry;
use JMS\Serializer\Serializer;
use KAC\SiteBundle\Model\Basket;
use KAC\SiteBundle\Model\BasketItem;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketManager extends Manager
{
    private $session;
    private $serializer;

    /**
     * @var Basket[]
     */
    private $baskets= array();

    public function __construct(Registry $doctrine, SessionInterface $session, Serializer $serializer)
    {
        parent::__construct($doctrine);

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
            foreach($this->baskets[$key]->getItems() as $item)
            {
                $item->calculateSavings();
            }
            $this->baskets[$key]->getDelivery()->updateInfo($this->baskets[$key]->getItems());
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