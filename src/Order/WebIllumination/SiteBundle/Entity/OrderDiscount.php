<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDiscount
 */
class OrderDiscount
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $voucherCode;

    /**
     * @var string
     */
    private $giftVoucherCode;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $discount;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set voucherCode
     *
     * @param string $voucherCode
     * @return OrderDiscount
     */
    public function setVoucherCode($voucherCode)
    {
        $this->voucherCode = $voucherCode;
    
        return $this;
    }

    /**
     * Get voucherCode
     *
     * @return string 
     */
    public function getVoucherCode()
    {
        return $this->voucherCode;
    }

    /**
     * Set giftVoucherCode
     *
     * @param string $giftVoucherCode
     * @return OrderDiscount
     */
    public function setGiftVoucherCode($giftVoucherCode)
    {
        $this->giftVoucherCode = $giftVoucherCode;
    
        return $this;
    }

    /**
     * Get giftVoucherCode
     *
     * @return string 
     */
    public function getGiftVoucherCode()
    {
        return $this->giftVoucherCode;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return OrderDiscount
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return OrderDiscount
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderDiscount
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
     * @return OrderDiscount
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
     * @return OrderDiscount
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
}
