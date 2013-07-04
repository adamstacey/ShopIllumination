<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;

class BasketItem
{
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $productId;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $variantId;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $quantity = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $unitCost = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalCost = 0;

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $totalCost
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;
    }

    /**
     * @return mixed
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param mixed $unitCost
     */
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;
    }

    /**
     * @return mixed
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }

    /**
     * @param mixed $variantId
     */
    public function setVariantId($variantId)
    {
        $this->variantId = $variantId;
    }

    /**
     * @return mixed
     */
    public function getVariantId()
    {
        return $this->variantId;
    }
}