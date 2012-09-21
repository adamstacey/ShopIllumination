<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_feature_group")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductFeatureGroup
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
     * @ORM\Column(name="filter", type="integer", length="1")
     */
    private $filter;
    
    /**
     * @ORM\Column(name="product_feature_group", type="string", length="255")
     */
    private $productFeatureGroup;
    
    /**
     * @ORM\Column(name="locale", type="string", length="2")
     */
    private $locale;
                
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
     * Set productFeatureGroup
     *
     * @param string $productFeatureGroup
     */
    public function setProductFeatureGroup($productFeatureGroup)
    {
        $this->productFeatureGroup = $productFeatureGroup;
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
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
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

    /**
     * Set filter
     *
     * @param integer $filter
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get filter
     *
     * @return integer 
     */
    public function getFilter()
    {
        return $this->filter;
    }
}