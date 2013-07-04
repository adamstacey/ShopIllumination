<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Basket
{
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

    public function calculateTotalCost()
    {
        $this->totalCost = 0;

        foreach($this->items as $item)
        {
            $item->setTotalCost($item->getUnitCost() * $item->getQuantity());
            $this->totalCost += $item->getTotalCost();
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