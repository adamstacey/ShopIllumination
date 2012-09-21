<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_to_option")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductToOption
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="active", type="integer", length="1")
     */
    private $active;
    
    /**
     * @ORM\Column(name="product_id", type="integer", length="11")
     */
    private $productId;
    
    /**
     * @ORM\Column(name="product_option_group_id", type="integer", length="11")
     */
    private $productOptionGroupId;
    
    /**
     * @ORM\Column(name="product_option_id", type="integer", length="11")
     */
    private $productOptionId;
    
    /**
     * @ORM\Column(name="price", type="decimal", precision="12", scale="4")
     */
    private $price;
    
    /**
     * @ORM\Column(name="price_type", type="string", length="1")
     */
    private $priceType;
    
    /**
     * @ORM\Column(name="price_use", type="string", length="1")
     */
    private $priceUse;
        
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;
            
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

	/**
	 * @ORM\prePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\preUpdate
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
     * Set active
     *
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productOptionGroupId
     *
     * @param integer $productOptionGroupId
     */
    public function setProductOptionGroupId($productOptionGroupId)
    {
        $this->productOptionGroupId = $productOptionGroupId;
    }

    /**
     * Get productOptionGroupId
     *
     * @return integer 
     */
    public function getProductOptionGroupId()
    {
        return $this->productOptionGroupId;
    }

    /**
     * Set productOptionId
     *
     * @param integer $productOptionId
     */
    public function setProductOptionId($productOptionId)
    {
        $this->productOptionId = $productOptionId;
    }

    /**
     * Get productOptionId
     *
     * @return integer 
     */
    public function getProductOptionId()
    {
        return $this->productOptionId;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceType
     *
     * @param string $priceType
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;
    }

    /**
     * Get priceType
     *
     * @return string 
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * Set priceUse
     *
     * @param string $priceUse
     */
    public function setPriceUse($priceUse)
    {
        $this->priceUse = $priceUse;
    }

    /**
     * Get priceUse
     *
     * @return string 
     */
    public function getPriceUse()
    {
        return $this->priceUse;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    }

    /**
     * Get displayOrder
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
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