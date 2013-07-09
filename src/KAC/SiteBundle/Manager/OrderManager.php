<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Model\Basket;
use Knp\Snappy\Pdf;

use KAC\SiteBundle\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Registry;

class OrderManager extends Manager
{
    public function createOrder()
    {
        $order = new Order();

        // Add note
        $note = new Order\Note();
        $note->setNoteType('customer');
        $note->setNotified(false);
        $order->addNote($note);

        return $note;
    }

    public function bindBasketData(Order $order, Basket $basket)
    {
        // Bind delivery info
        $order->setEstimatedDeliveryDaysStart($basket->getDelivery()->getEstimatedDeliveryDays()['start']);
        $order->setEstimatedDeliveryDaysEnd($basket->getDelivery()->getEstimatedDeliveryDays()['end']);

        // Bind basket items

        return $order;
    }
}