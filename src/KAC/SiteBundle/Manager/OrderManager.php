<?php
namespace KAC\SiteBundle\Manager;

use FOS\UserBundle\Model\UserManagerInterface;
use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
use KAC\SiteBundle\Model\Basket;
use KAC\UserBundle\Entity\User;
use Knp\Snappy\Pdf;

use KAC\SiteBundle\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Omnipay\Common\CreditCard;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\SecurityContext;

class OrderManager extends Manager
{
    private $session;
    private $basketManager;
    private $deliveryManager;
    private $userManager;
    private $securityContext;

    /**
     * @var Order
     */
    private $order;
    /**
     * @var Basket
     */
    private $basket;

    public function __construct(Registry $doctrine, BasketManager $basketManager, DeliveryManager $deliveryManager, SessionInterface $session, UserManagerInterface $userManager, SecurityContext $securityContext)
    {
        parent::__construct($doctrine);

        $this->session = $session;
        $this->basketManager = $basketManager;
        $this->deliveryManager = $deliveryManager;
        $this->userManager = $userManager;
        $this->securityContext = $securityContext;
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
        $this->basketManager->clearBasket('order.basket');
    }

    public function createOrder()
    {
        $basket = $this->basketManager->getBasket();
        $this->basketManager->loadProducts();

        $order = new Order();
        $order->setStatus('Checkout');
        $order->setCurrentStep('About');

        // Add note
        $note = new Order\Note();
        $note->setCreator($order->getUser() !== null && $order->getUser()->getContact() !== null ? $order->getUser()->getContact()->getFirstName() . ' ' . $order->getUser()->getContact()->getFirstName()  : '');
        $note->setNoteType('customer');
        $note->setNotified(false);
        $order->addNote($note);

        // Add user information if logged in
        if($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            /**
             * @var $user User
             */
            $user = $this->securityContext->getToken()->getUser();

            $order->setUser($user);
            $order->setEmailAddress($user->getEmail());

            if($user->getContact())
            {
                $order->setTelephoneDaytime($user->getContact()->getTelephoneDaytime() ? $user->getContact()->getTelephoneDaytime()->getNumber() : '');
                $order->setTelephoneEvening($user->getContact()->getTelephoneEvening() ? $user->getContact()->getTelephoneEvening()->getNumber() : '');
                $order->setMobile($user->getContact()->getTelephoneMobile() ? $user->getContact()->getTelephoneMobile()->getNumber() : '');
            }
        }

        // Freeze the basket
        $this->bindBasketData($order, $basket);
        $this->basketManager->saveBasket('order.basket', $basket);

        return $order;
    }

    public function updateBasket()
    {
        $this->basketManager->saveBasket('order.basket', $this->basketManager->getBasket());
    }

    public function getBasket()
    {
        $basket = $this->basketManager->getBasket('order.basket');
        $this->basketManager->loadProducts('order.basket');
        return $basket;
    }

    public function clearBasket()
    {
        $this->basketManager->clearBasket('order.basket');
        $this->basketManager->clearBasket('basket');
    }

    public function updateDeliveryInfo(Order $order)
    {
        if($order->getDeliveryType())
        {
            $deliveryMethod = DeliveryMethodFactory::getMethod($order->getDeliveryType());
            if($deliveryMethod)
            {
                $zone = $this->deliveryManager->calculateZone($order->getDeliveryCountryCode(), $order->getDeliveryPostZipCode());
                $band = $this->deliveryManager->calculateBand($order->getProducts());
                $estimatedDeliveryDays = $deliveryMethod->calculateEstimatedDeliveryDays($zone, $band);

                $order->setDeliveryCharge($deliveryMethod->calculateCost($zone, $band, $order->getProducts()));
                $order->setEstimatedDeliveryDaysStart($estimatedDeliveryDays['start']);
                $order->setEstimatedDeliveryDaysEnd($estimatedDeliveryDays['end']);
            }
        }
    }

    public function bindBasketData(Order $order, Basket $basket)
    {
        // Update delivery info
        $this->updateDeliveryInfo($order, $basket);

        // Bind basket items
        foreach($basket->getItems() as $item)
        {
            $orderProduct = new Order\Product();
            $orderProduct->setOrder($order);
            $orderProduct->setProduct($item->getProduct());
            $orderProduct->setVariant($item->getVariant());

            $order->addProduct($orderProduct);
        }

        $this->updateProductInfo($order);
    }

    public function updateProductInfo(Order $order)
    {
        // Bind basket items
        foreach($order->getProducts() as $orderProduct)
        {
            $orderProduct->setBasketItemId($orderProduct->getProduct()->getId() . '-' . $orderProduct->getVariant()->getId());
            $orderProduct->setUrl($orderProduct->getVariant()->getUrl());
            $orderProduct->setHeader($orderProduct->getVariant()->getDescription()->getHeader());
            $orderProduct->setProductCode($orderProduct->getVariant()->getProductCode());
            $orderProduct->setBrand($orderProduct->getProduct()->getBrand()->getDescription()->getHeader());
            $orderProduct->setDescription($orderProduct->getVariant()->getDescription()->getDescription());
            $orderProduct->setSelectedOptions('');
            $orderProduct->setSelectedOptionLabels('');
            $orderProduct->setQuantity($orderProduct->getQuantity());
            $orderProduct->setUnitCost($orderProduct->getVariant()->getPrice()->getListPrice());
            $orderProduct->setRecommendedRetailPrice($orderProduct->getVariant()->getPrice()->getRecommendedRetailPrice());
            $orderProduct->setDiscount(0);
            $orderProduct->setSavings($orderProduct->getVariant()->getPrice()->getRecommendedRetailPrice() - $orderProduct->getVariant()->getPrice()->getListPrice());
            $orderProduct->setSubTotal($orderProduct->getVariant()->getPrice()->getListPrice() * $orderProduct->getQuantity());
            $orderProduct->setVat($orderProduct->getSubTotal() - ($orderProduct->getSubTotal() / 1.2));
        }

        $order->setDiscount(0);
        $order->setPossibleDiscount(0);
        $order->calculateTotals();
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