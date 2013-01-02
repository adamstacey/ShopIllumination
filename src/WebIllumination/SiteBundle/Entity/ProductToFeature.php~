<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_to_feature")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductToFeature
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
    private $active = true;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Variant", inversedBy="features")
     */
    private $variant;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\FeatureGroup")
     * @ORM\JoinColumn(name="product_feature_group_id", referencedColumnName="id")
     **/
    private $productFeature;

    /**ProductToFeature
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="default_product_feature_id", referencedColumnName="id")
     **/
    private $defaultFeature;
        
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
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

    public function __toString()
    {
        return $this->getDefaultFeature()->__toString();
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
     * @param boolean $active
     * @return ProductToFeature
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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return ProductToFeature
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
     * @return ProductToFeature
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
     * @return ProductToFeature
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
     * Set variant
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variant
     * @return ProductToFeature
     */
    public function setVariant(\WebIllumination\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;
    
        return $this;
    }

    /**
     * Get variant
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Variant 
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * Set productFeature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $productFeature
     * @return ProductToFeature
     */
    public function setProductFeature(\WebIllumination\SiteBundle\Entity\Product\FeatureGroup $productFeature = null)
    {
        $this->productFeature = $productFeature;
    
        return $this;
    }

    /**
     * Get productFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\FeatureGroup 
     */
    public function getProductFeature()
    {
        return $this->productFeature;
    }

    /**
     * Set defaultFeature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $defaultFeature
     * @return ProductToFeature
     */
    public function setDefaultFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $defaultFeature = null)
    {
        $this->defaultFeature = $defaultFeature;
    
        return $this;
    }

    /**
     * Get defaultFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getDefaultFeature()
    {
        return $this->defaultFeature;
    }
}