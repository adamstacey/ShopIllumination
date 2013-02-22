<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_variant_to_feature")
 * @ORM\HasLifecycleCallbacks()
 */
class VariantToFeature
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
     * @ORM\JoinColumn(name="feature_group_id", referencedColumnName="id")
     **/
    private $featureGroup;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="feature_id", referencedColumnName="id")
     **/
    private $feature;
        
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

    public function __toString()
    {
        return $this->getFeature()->__toString();
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * @return VariantToFeature
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
     * Set featureGroup
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup
     * @return VariantToFeature
     */
    public function setFeatureGroup(\WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup = null)
    {
        $this->featureGroup = $featureGroup;
    
        return $this;
    }

    /**
     * Get featureGroup
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\FeatureGroup 
     */
    public function getFeatureGroup()
    {
        return $this->featureGroup;
    }

    /**
     * Set feature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $feature
     * @return VariantToFeature
     */
    public function setFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $feature = null)
    {
        $this->feature = $feature;
    
        return $this;
    }

    /**
     * Get feature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getFeature()
    {
        return $this->feature;
    }
}