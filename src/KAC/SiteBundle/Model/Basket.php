<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;

class Basket
{
    /**
     * @var BasketItem[]
     * @Serializer\Type("array<KAC\SiteBundle\Model\BasketItem>")
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
    private $totalItems = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalQuantity = 0;

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
    }

    public function removeItem(BasketItem $item)
    {
        $key = array_search($item, $this->items);
        if($key)
        {
            unset($this->items[$key]);
        }
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

    public function calculateTotalCost()
    {
        $this->totalCost = 0;

        foreach($this->items as $item)
        {
            $this->totalCost += $item->getUnitCost() * $item->getQuantity();
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
        $this->calculateTotalQuantity();
    }
}