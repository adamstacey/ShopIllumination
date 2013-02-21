<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use JMS\SerializerBundle\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_features")
 * @ORM\HasLifecycleCallbacks()
 */
class Feature
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
     * @ORM\Column(name="filter", type="boolean")
     */
    private $filter;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\FeatureGroup", inversedBy="features")
     * @ORM\JoinColumn(name="feature_group_id", referencedColumnName="id")
     * @Serializer\Exclude
     */
    private $featureGroup;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
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

    public function __toString()
    {
        return $this->getFeature();
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
     * @return Feature
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
     * @return Feature
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
     * Set locale
     *
     * @param string $locale
     * @return Feature
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
     * @return Feature
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
     * @return Feature
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
     * Set featureGroup
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup
     * @return Feature
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
     * Set name
     *
     * @param string $name
     * @return Feature
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

}