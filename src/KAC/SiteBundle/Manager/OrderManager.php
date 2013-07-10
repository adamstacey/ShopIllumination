<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Model\Basket;
use Knp\Snappy\Pdf;

use KAC\SiteBundle\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Omnipay\Common\CreditCard;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class OrderManager extends Manager
{

    private $session;
    private $basketManager;

    /**
     * @var Order
     */
    private $order;
    /**
     * @var Basket
     */
    private $basket;

    public function __construct(Registry $doctrine, BasketManager $basketManager, SessionInterface $session)
    {
        parent::__construct($doctrine);

        $this->session = $session;
        $this->basketManager = $basketManager;
    }

    public function getOrder()
    {
        if(!$this->order)
        {
            if($this->session->has('order.id'))
            {
                $order = $this->doctrine->getManager()->getRepository('KAC\SiteBundle\Entity\Order')->find($this->session->get('order.id'));
                if($order)
                {
                    $this->order = $order;
                } else {
                    $this->order = $this->createOrder();
                    $this->saveOrder();
                }
            } else {
                $this->order = $this->createOrder();
                $this->saveOrder();
            }
        }

        return $this->order;
    }

    public function getOpenOrder()
    {
        $order = $this->getOrder();
        if($order->getStatus() === 'Checkout' || $order->getStatus() === 'Open Payment' || $order->getStatus() === 'Payment Failed' || $order->getStatus() === 'Payment Received') {
            return $this->order;
        }

        $this->deleteOrder();
        $this->getOrder();
        $this->saveOrder();
    }

    public function saveOrder()
    {
        if($this->order)
        {
            $this->doctrine->getManager()->persist($this->order);
            $this->doctrine->getManager()->flush();

            $this->session->set('order.id', $this->order->getId());
        }
    }

    public function deleteOrder()
    {
        if($this->order)
        {
            $this->doctrine->getManager()->remove($this->order);
            $this->doctrine->getManager()->flush();
        }
        $this->order = null;
        $this->session->remove('order.id');
    }

    public function createOrder()
    {
        $order = new Order();
        $order->setStatus('Checkout');
        $order->setCurrentStep('Billing');

        // Add note
        $note = new Order\Note();
        $note->setCreator($order->getUser() !== null && $order->getUser()->getContact() !== null ? $order->getUser()->getContact()->getFirstName() . ' ' . $order->getUser()->getContact()->getFirstName()  : '');
        $note->setNoteType('customer');
        $note->setNotified(false);
        $order->addNote($note);

        // Freeze the basket
        $this->basketManager->saveBasket('order.basket', $this->basketManager->getBasket());
        $this->basketManager->clearBasket('basket');

        return $order;
    }

    public function getBasket()
    {
        $basket = $this->basketManager->getBasket('order.basket');
        $this->basketManager->loadProducts('order.basket');
        return $basket;
    }

    public function clearBaskets()
    {
        $this->basketManager->clearBasket('order.basket');
    }

    public function bindBasketData(Order $order, Basket $basket)
    {
        // Bind delivery info
        $order->setEstimatedDeliveryDaysStart($basket->getDelivery()->getEstimatedDeliveryDays()['start']);
        $order->setEstimatedDeliveryDaysEnd($basket->getDelivery()->getEstimatedDeliveryDays()['end']);

        // Bind basket items
        foreach($basket->getItems() as $item)
        {
            $orderProduct = new Order\Product();
            $orderProduct->setOrder($order);
            $orderProduct->setProduct($item->getProduct());
            $orderProduct->setVariant($item->getVariant());
            $orderProduct->setBasketItemId($item->getProductId() . '-' . $item->getVariantId());
            $orderProduct->setUrl($item->getVariant()->getUrl());
            $orderProduct->setHeader($item->getVariant()->getDescription()->getHeader());
            $orderProduct->setProductCode($item->getVariant()->getProductCode());
            $orderProduct->setBrand($item->getProduct()->getBrand()->getDescription()->getHeader());
            $orderProduct->setDescription($item->getVariant()->getDescription()->getDescription());
            $orderProduct->setSelectedOptions('');
            $orderProduct->setSelectedOptionLabels('');
            $orderProduct->setQuantity($item->getQuantity());
            $orderProduct->setUnitCost($item->getVariant()->getPrice()->getListPrice());
            $orderProduct->setRecommendedRetailPrice($item->getVariant()->getPrice()->getRecommendedRetailPrice());
            $orderProduct->setDiscount(0);
            $orderProduct->setSavings($item->getVariant()->getPrice()->getRecommendedRetailPrice() - $item->getVariant()->getPrice()->getListPrice());
            $orderProduct->setSubTotal($orderProduct->getSubTotal() * $orderProduct->getQuantity());
            $orderProduct->setVat($orderProduct->getSubTotal() - ($orderProduct->getSubTotal() / 1.2));
            $order->addProduct($orderProduct);
        }
        $order->setItems($basket->getTotalItems());

        // Bind costs
        $order->setDiscount(0);
        $order->setPossibleDiscount(0);
        $order->setSubTotal($basket->getTotalCost());
        $order->setVat($order->getSubTotal() - ($order->getSubTotal() / 1.2));
        $order->setTotal($order->getSubTotal() + $order->getDeliveryCharge());
    }

    public function updateCheckoutStep(Order $order, $step)
    {
        if(in_array($step, $order->getCheckoutSteps())
            && array_search($step, $order->getCheckoutSteps()) > array_search($order->getCurrentStep(), $order->getCheckoutSteps()))
        {
            $order->setCurrentStep($step);
        }
    }
}