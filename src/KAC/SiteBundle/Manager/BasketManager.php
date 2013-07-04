<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\Bundle\DoctrineBundle\Registry;
use KAC\SiteBundle\Model\Basket;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

class BasketManager extends Manager
{
    private $session;

    /**
     * @var Basket
     */
    private $basket;

    public function __construct(SessionInterface $session, Registry $doctrine)
    {
        parent::__construct($doctrine);

        $this->session = $session;
    }

    public function getBasket()
    {
        if(!$this->basket)
        {
            if($this->session->has('basket'))
            {
                $serializer = new Serializer();
                $this->basket = $serializer->deserialize($this->session->get('basket'), 'KAC\SiteBundle\Model\Basket', 'json');
            } else {
                $this->basket = new Basket();
            }
        }

        return $this->basket;
    }

    public function saveBasket()
    {
        $normalizer = new GetSetMethodNormalizer();
        $normalizer->setIgnoredAttributes(array());
        $encoder = new JsonEncoder();

        $serializer = new Serializer(array($normalizer), array($encoder));
        $this->session->set('basket', $serializer->serialize($this->basket, 'json'));
    }

    public function refreshBasket()
    {
        $this->basket->calculateTotals();
    }
}