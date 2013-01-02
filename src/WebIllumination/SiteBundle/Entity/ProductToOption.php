<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
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
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product", inversedBy="options")
     **/
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Option")
     * @ORM\JoinColumn(name="product_option_id", referencedColumnName="id")
     **/
    private $productOption;
    
    /**
     * @ORM\Column(name="price", type="decimal", precision=12, scale=4)
     */
    private $price;
    
    /**
     * @ORM\Column(name="price_type", type="string", length=1)
     */
    private $priceType;
    
    /**
     * @ORM\Column(name="price_use", type="string", length=1)
     */
    private $priceUse;
        
    /**
     * @ORM\Column(name="display_order", type="integer", length=11, nullable=true)
     */
    private $displayOrder;

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
     * Set active
     *
     * @param boolean $active
     * @return ProductToOption
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return ProductToOption
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceType
     *
     * @param string $priceType
     * @return ProductToOption
     */
    public function setPriceType($priceType)
    {
        $this->priceType = $priceType;
    
        return $this;
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
     * @return ProductToOption
     */
    public function setPriceUse($priceUse)
    {
        $this->priceUse = $priceUse;
    
        return $this;
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
     * @return ProductToOption
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    
        return $this;
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
     * @param \DateTime $createdAt
     * @return ProductToOption
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
     * @return ProductToOption
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
     * Set product
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     * @return ProductToOption
     */
    public function setProduct(\WebIllumination\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \WebIllumination\SiteBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set productOption
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Option $productOption
     * @return ProductToOption
     */
    public function setProductOption(\WebIllumination\SiteBundle\Entity\Product\Option $productOption = null)
    {
        $this->productOption = $productOption;
    
        return $this;
    }

    /**
     * Get productOption
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Option 
     */
    public function getProductOption()
    {
        return $this->productOption;
    }
}