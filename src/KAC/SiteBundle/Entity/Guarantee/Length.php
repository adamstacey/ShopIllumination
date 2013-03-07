<?php
namespace KAC\SiteBundle\Entity\Guarantee;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="guarantee_lengths")
 * @ORM\HasLifecycleCallbacks()
 */
class Length
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="display_name", type="string", length=255)
     */
    private $displayName;
	
	/**
     * @ORM\Column(name="guarantee_length", type="string", length=255)
     */
    private $guaranteeLength;
    
    /**
     * @ORM\Column(name="guarantee_title", type="string", length=255)
     */
    private $guaranteeTitle;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale = "en_GB";
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
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
     * Set displayName
     *
     * @param string $displayName
     * @return Length
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    
        return $this;
    }

    /**
     * Get displayName
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set guaranteeLength
     *
     * @param string $guaranteeLength
     * @return Length
     */
    public function setGuaranteeLength($guaranteeLength)
    {
        $this->guaranteeLength = $guaranteeLength;
    
        return $this;
    }

    /**
     * Get guaranteeLength
     *
     * @return string 
     */
    public function getGuaranteeLength()
    {
        return $this->guaranteeLength;
    }

    /**
     * Set guaranteeTitle
     *
     * @param string $guaranteeTitle
     * @return Length
     */
    public function setGuaranteeTitle($guaranteeTitle)
    {
        $this->guaranteeTitle = $guaranteeTitle;
    
        return $this;
    }

    /**
     * Get guaranteeTitle
     *
     * @return string 
     */
    public function getGuaranteeTitle()
    {
        return $this->guaranteeTitle;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Length
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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Length
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
     * @return Length
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
     * @return Length
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
}