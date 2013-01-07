<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_option_groups")
 * @ORM\HasLifecycleCallbacks()
 */
class OptionGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Option", mappedBy="productOptionGroup")
     */
    private $options;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @ORM\Column(name="product_option_group", type="string", length=255)
     */
    private $productOptionGroup;
    
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
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return OptionGroup
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
     * Set productOptionGroup
     *
     * @param string $productOptionGroup
     * @return OptionGroup
     */
    public function setProductOptionGroup($productOptionGroup)
    {
        $this->productOptionGroup = $productOptionGroup;
    
        return $this;
    }

    /**
     * Get productOptionGroup
     *
     * @return string 
     */
    public function getProductOptionGroup()
    {
        return $this->productOptionGroup;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return OptionGroup
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
     * @return OptionGroup
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
     * @return OptionGroup
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
     * Add options
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Option $options
     * @return OptionGroup
     */
    public function addOption(\WebIllumination\SiteBundle\Entity\Product\Option $options)
    {
        $this->options[] = $options;
    
        return $this;
    }

    /**
     * Remove options
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Option $options
     */
    public function removeOption(\WebIllumination\SiteBundle\Entity\Product\Option $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }
}