<?php
namespace KAC\SiteBundle\Model;

use JMS\Serializer\Annotation as Serializer;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product;
use Symfony\Component\Validator\Constraints as Assert;

class BasketItem
{
    /**
     * @Serializer\Exclude
     */
    private $basket;
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Assert\NotBlank()
     */
    private $productId;
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Assert\NotBlank()
     */
    private $variantId;
    /**
     * @var int
     * @Serializer\Type("integer")
     * @Assert\NotBlank()
     * @Assert\Range(min=1)
     * @Assert\Type(type="integer")
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
    private $recommendedRetailPrice = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $savings = 0;
    /**
     * @var int
     * @Serializer\Type("integer")
     */
    private $totalCost = 0;
    /**
     * @Serializer\Exclude
     */
    private $product;
    /**
     * @Serializer\Exclude
     */
    private $variant;

    /**
     * @param null $basket
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return null
     */
    public function getBasket()
    {
        return $this->basket;
    }

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

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return Product|null
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param int $recommendedRetailPrice
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->recommendedRetailPrice = $recommendedRetailPrice;
    }

    /**
     * @return int
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * @param int $savings
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    }

    /**
     * @return int
     */
    public function getSavings()
    {
        return $this->savings;
    }

    /**
     * @param mixed $variant
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;
    }

    /**
     * @return Variant|null
     */
    public function getVariant()
    {
        return $this->variant;
    }

    public function calculateSavings()
    {
        $this->savings = ($this->recommendedRetailPrice - $this->unitCost) * $this->quantity;
    }
}