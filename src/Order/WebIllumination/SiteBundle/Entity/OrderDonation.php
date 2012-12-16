<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDonation
 */
class OrderDonation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $donation;

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
    private $orderId;


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
     * Set description
     *
     * @param string $description
     * @return OrderDonation
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
     * Set donation
     *
     * @param float $donation
     * @return OrderDonation
     */
    public function setDonation($donation)
    {
        $this->donation = $donation;
    
        return $this;
    }

    /**
     * Get donation
     *
     * @return float 
     */
    public function getDonation()
    {
        return $this->donation;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderDonation
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
     * @return OrderDonation
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
     * Set orderId
     *
     * @param \WebIllumination\SiteBundle\Entity\Order $orderId
     * @return OrderDonation
     */
    public function setOrderId(\WebIllumination\SiteBundle\Entity\Order $orderId = null)
    {
        $this->orderId = $orderId;
    
        return $this;
    }

    /**
     * Get orderId
     *
     * @return \WebIllumination\SiteBundle\Entity\Order 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
}
