<?php
namespace KAC\SiteBundle\Model;

class Basket
{
    /**
     * @var BasketItem[]
     */
    private $items;
    private $totalCost;
    private $totalItems;
    private $totalQuantity;

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function removeItem($item)
    {
        $key = array_search($item, $this->items);
        if($key)
        {
            unset($this->items[$key]);
        }
    }

    /**
     * @return mixed
     */
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

    /**
     * @return mixed
     */
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