<?php
namespace KAC\SiteBundle\Entity\Order;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_discounts")
 * @ORM\HasLifecycleCallbacks()
 */
class Discount
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Order", inversedBy="discounts")
     */
    private $order;

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
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

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
     * @return Discount
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
     * @return Discount
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
     * @return Discount
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
     * @return Discount
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
     * @return Discount
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
     * @return Discount
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
     * @param \KAC\SiteBundle\Entity\Order $order
     * @return Discount
     */
    public function setOrder(\KAC\SiteBundle\Entity\Order $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \KAC\SiteBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}