<?php
namespace KAC\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variant_to_option")
 * @ORM\HasLifecycleCallbacks()
 */
class VariantToOption
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
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Variant", inversedBy="options")
     */
    private $variant;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\OptionGroup")
     * @ORM\JoinColumn(name="option_group_id", referencedColumnName="id")
     **/
    private $optionGroup;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Option")
     * @ORM\JoinColumn(name="option_id", referencedColumnName="id")
     **/
    private $option;
    
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
    private $displayOrder = 1;

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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @return VariantToOption
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
     * @param \KAC\SiteBundle\Entity\Product\Variant $variant
     * @return VariantToOption
     */
    public function setVariant(\KAC\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \KAC\SiteBundle\Entity\Product\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @return \KAC\SiteBundle\Entity\Product\OptionGroup
     */
    public function getOptionGroup()
    {
        return $this->optionGroup;
    }

    public function setOptionGroup($optionGroup)
    {
        $this->optionGroup = $optionGroup;
    }

    /**
     * @return \KAC\SiteBundle\Entity\Product\Option
     */
    public function getOption()
    {
        return $this->option;
    }

    public function setOption($option)
    {
        $this->option = $option;
    }
}