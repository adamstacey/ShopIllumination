<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderProduct
 */
class OrderProduct
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $basketItemId;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $header;

    /**
     * @var string
     */
    private $productCode;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var float
     */
    private $unitCost;

    /**
     * @var float
     */
    private $recommendedRetailPrice;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var float
     */
    private $savings;

    /**
     * @var float
     */
    private $vat;

    /**
     * @var float
     */
    private $subTotal;

    /**
     * @var string
     */
    private $selectedOptions;

    /**
     * @var string
     */
    private $selectedOptionLabels;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Order
     */
    private $order;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Order
     */
    private $productId;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set basketItemId
     *
     * @param string $basketItemId
     * @return OrderProduct
     */
    public function setBasketItemId($basketItemId)
    {
        $this->basketItemId = $basketItemId;
    
        return $this;
    }

    /**
     * Get basketItemId
     *
     * @return string 
     */
    public function getBasketItemId()
    {
        return $this->basketItemId;
    }

    /**
     * Set product
     *
     * @param string $product
     * @return OrderProduct
     */
    public function setProduct($product)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return string 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return OrderProduct
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set header
     *
     * @param string $header
     * @return OrderProduct
     */
    public function setHeader($header)
    {
        $this->header = $header;
    
        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set productCode
     *
     * @param string $productCode
     * @return OrderProduct
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
    
        return $this;
    }

    /**
     * Get productCode
     *
     * @return string 
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return OrderProduct
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return OrderProduct
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    
        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderProduct
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitCost
     *
     * @param float $unitCost
     * @return OrderProduct
     */
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;
    
        return $this;
    }

    /**
     * Get unitCost
     *
     * @return float 
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }

    /**
     * Set recommendedRetailPrice
     *
     * @param float $recommendedRetailPrice
     * @return OrderProduct
     */
    public function setRecommendedRetailPrice($recommendedRetailPrice)
    {
        $this->recommendedRetailPrice = $recommendedRetailPrice;
    
        return $this;
    }

    /**
     * Get recommendedRetailPrice
     *
     * @return float 
     */
    public function getRecommendedRetailPrice()
    {
        return $this->recommendedRetailPrice;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return OrderProduct
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set savings
     *
     * @param float $savings
     * @return OrderProduct
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    
        return $this;
    }

    /**
     * Get savings
     *
     * @return float 
     */
    public function getSavings()
    {
        return $this->savings;
    }

    /**
     * Set vat
     *
     * @param float $vat
     * @return OrderProduct
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    
        return $this;
    }

    /**
     * Get vat
     *
     * @return float 
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set subTotal
     *
     * @param float $subTotal
     * @return OrderProduct
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    
        return $this;
    }

    /**
     * Get subTotal
     *
     * @return float 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set selectedOptions
     *
     * @param string $selectedOptions
     * @return OrderProduct
     */
    public function setSelectedOptions($selectedOptions)
    {
        $this->selectedOptions = $selectedOptions;
    
        return $this;
    }

    /**
     * Get selectedOptions
     *
     * @return string 
     */
    public function getSelectedOptions()
    {
        return $this->selectedOptions;
    }

    /**
     * Set selectedOptionLabels
     *
     * @param string $selectedOptionLabels
     * @return OrderProduct
     */
    public function setSelectedOptionLabels($selectedOptionLabels)
    {
        $this->selectedOptionLabels = $selectedOptionLabels;
    
        return $this;
    }

    /**
     * Get selectedOptionLabels
     *
     * @return string 
     */
    public function getSelectedOptionLabels()
    {
        return $this->selectedOptionLabels;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderProduct
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return OrderProduct
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set order
     *
     * @param \WebIllumination\SiteBundle\Entity\Order $order
     * @return OrderProduct
     */
    public function setOrder(\WebIllumination\SiteBundle\Entity\Order $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \WebIllumination\SiteBundle\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set productId
     *
     * @param \WebIllumination\SiteBundle\Entity\Order $productId
     * @return OrderProduct
     */
    public function setProductId(\WebIllumination\SiteBundle\Entity\Order $productId = null)
    {
        $this->productId = $productId;
    
        return $this;
    }

    /**
     * Get productId
     *
     * @return \WebIllumination\SiteBundle\Entity\Order 
     */
    public function getProductId()
    {
        return $this->productId;
    }
}
