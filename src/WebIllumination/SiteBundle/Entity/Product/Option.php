<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_options")
 * @ORM\HasLifecycleCallbacks()
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\OptionGroup", inversedBy="options")
     * @ORM\JoinColumn(name="product_option_group_id", referencedColumnName="id")
     */
    private $productOptionGroup;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @ORM\Column(name="product_option", type="string", length=255)
     */
    private $productOption;
    
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
     * @return Option
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
     * Set productOption
     *
     * @param string $productOption
     * @return Option
     */
    public function setProductOption($productOption)
    {
        $this->productOption = $productOption;
    
        return $this;
    }

    /**
     * Get productOption
     *
     * @return string 
     */
    public function getProductOption()
    {
        return $this->productOption;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Option
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
     * @return Option
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
     * @return Option
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
     * Set productOptionGroup
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\OptionGroup $productOptionGroup
     * @return Option
     */
    public function setProductOptionGroup(\WebIllumination\SiteBundle\Entity\Product\OptionGroup $productOptionGroup = null)
    {
        $this->productOptionGroup = $productOptionGroup;
    
        return $this;
    }

    /**
     * Get productOptionGroup
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\OptionGroup 
     */
    public function getProductOptionGroup()
    {
        return $this->productOptionGroup;
    }
}