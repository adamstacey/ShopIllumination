<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Basket
{
    /**
     * @var BasketDeliveryInfo
     * @Serializer\Type("BasketDeliveryInfo")
     */
    private $delivery = null;
    /**
     * @var BasketItem[]
     * @Serializer\Type("array<KAC\SiteBundle\Model\BasketItem>")
     * @Assert\Valid()
     */
    private $items = array();
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalCost = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalSavings = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalItems = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalQuantity = 0;

    function __construct()
    {
        $this->setDelivery(new BasketDeliveryInfo());
    }

    /**
     * @param \KAC\SiteBundle\Model\BasketDeliveryInfo $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return \KAC\SiteBundle\Model\BasketDeliveryInfo
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function addItem(BasketItem $item)
    {
        $this->items[] = $item;
        $item->setBasket($this);
    }

    public function getItem($index)
    {
        return $this->items[$index];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
    }

    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * @return mixed
     */
    public function getTotalItems()
    {
        return $this->totalItems;
    }

    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param int $totalSavings
     */
    public function setTotalSavings($totalSavings)
    {
        $this->totalSavings = $totalSavings;
    }

    /**
     * @return int
     */
    public function getTotalSavings()
    {
        return $this->totalSavings;
    }

    public function calculateTotalCost()
    {
        $this->totalCost = 0;

        foreach($this->items as $item)
        {
            $item->setTotalCost($item->getUnitCost() * $item->getQuantity());
            $this->totalCost += $item->getTotalCost();
        }
    }

    public function calculateTotalSavings()
    {
        $this->totalSavings = 0;

        foreach($this->items as $item)
        {
            $this->totalSavings += $item->getSavings();
        }
    }

    public function calculateTotalItems()
    {
        $this->totalItems = count($this->items);
    }

    public function calculateTotalQuantity()
    {
        $this->totalQuantity = 0;

        foreach($this->items as $item)
        {
            $this->totalQuantity += $item->getQuantity();
        }
    }

    public function calculateTotals()
    {
        $this->calculateTotalCost();
        $this->calculateTotalItems();
        $this->calculateTotalSavings();
        $this->calculateTotalQuantity();
    }
}