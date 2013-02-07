<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_feature_groups")
 * @ORM\HasLifecycleCallbacks()
 */
class FeatureGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature", mappedBy="productFeatureGroup")
     */
    private $features;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @ORM\Column(name="filter", type="boolean")
     */
    private $filter;
    
    /**
     * @ORM\Column(name="product_feature_group", type="string", length=255)
     */
    private $productFeatureGroup;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale = "en_GB";

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
     * Constructor
     */
    public function __construct()
    {
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getProductFeatureGroup();
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
     * @return FeatureGroup
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
     * Set filter
     *
     * @param boolean $filter
     * @return FeatureGroup
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    
        return $this;
    }

    /**
     * Get filter
     *
     * @return boolean 
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Set productFeatureGroup
     *
     * @param string $productFeatureGroup
     * @return FeatureGroup
     */
    public function setProductFeatureGroup($productFeatureGroup)
    {
        $this->productFeatureGroup = $productFeatureGroup;
    
        return $this;
    }

    /**
     * Get productFeatureGroup
     *
     * @return string 
     */
    public function getProductFeatureGroup()
    {
        return $this->productFeatureGroup;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return FeatureGroup
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    
        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return FeatureGroup
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
     * @return FeatureGroup
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
     * Add features
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $features
     * @return FeatureGroup
     */
    public function addFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $features)
    {
        $this->features[] = $features;
    
        return $this;
    }

    /**
     * Remove features
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $features
     */
    public function removeFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $features)
    {
        $this->features->removeElement($features);
    }

    /**
     * Get features
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeatures()
    {
        return $this->features;
    }
}