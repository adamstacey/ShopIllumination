<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_discount")
 * @ORM\HasLifecycleCallbacks()
 */
class OrderDiscount
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="order_id", type="integer", length=11)
     */
    private $orderId;
    
    /**
     * @ORM\Column(name="voucher_code", type="string", length=255)
     */
    private $voucherCode;
    
    /**
     * @ORM\Column(name="gift_voucher_code", type="string", length=255)
     */
    private $giftVoucherCode;
    
    /**
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
        
    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;
                    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
	 * @ORM\PrePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
	 */
    public function update()
    {
        $this->updatedAt = new \DateTime();
    }

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
     * Set orderId
     *
     * @param integer $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Get orderId
     *
     * @return integer 
     */
    public function getOrderId()
    {
        return $this->orderId;
    }
    
    /**
     * Set voucherCode
     *
     * @param string $voucherCode
     */
    public function setVoucherCode($voucherCode)
    {
        $this->voucherCode = $voucherCode;
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
     */
    public function setGiftVoucherCode($giftVoucherCode)
    {
        $this->giftVoucherCode = $giftVoucherCode;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @param decimal $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Get discount
     *
     * @return decimal 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}