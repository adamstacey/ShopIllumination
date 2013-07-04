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
     * @var Basket
     */
    private $basket;

    public function __construct(Registry $doctrine, SessionInterface $session, Serializer $serializer)
    {
        parent::__construct($doctrine);

        $this->session = $session;
        $this->serializer = $serializer;
    }

    public function getBasket()
    {
        if(!$this->basket)
        {
            if($this->session->has('basket'))
            {
                $this->basket = $this->serializer->deserialize($this->session->get('basket'), 'KAC\SiteBundle\Model\Basket', 'json');
            } else {
                $this->basket = new Basket();
            }
        }

        return $this->basket;
    }

    public function saveBasket()
    {
        $this->session->set('basket', $this->serializer->serialize($this->basket, 'json'));
    }

    public function clearBasket()
    {
        $this->session->remove('basket');
    }

    public function refreshBasket()
    {
        $this->basket->calculateTotals();
    }
}