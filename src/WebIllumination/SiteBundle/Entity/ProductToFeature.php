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
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product", inversedBy="features")
     **/
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature")
     * @ORM\JoinColumn(name="product_feature_id", referencedColumnName="id")
     **/
    private $productFeature;
        
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
     * Set productId
     *
     * @param integer $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productFeatureGroupId
     *
     * @param integer $productFeatureGroupId
     */
    public function setProductFeatureGroupId($productFeatureGroupId)
    {
        $this->productFeatureGroupId = $productFeatureGroupId;
    }

    /**
     * Get productFeatureGroupId
     *
     * @return integer 
     */
    public function getProductFeatureGroupId()
    {
        return $this->productFeatureGroupId;
    }

    /**
     * Set productFeatureId
     *
     * @param integer $productFeatureId
     */
    public function setProductFeatureId($productFeatureId)
    {
        $this->productFeatureId = $productFeatureId;
    }

    /**
     * Get productFeatureId
     *
     * @return integer 
     */
    public function getProductFeatureId()
    {
        return $this->productFeatureId;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
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
     * Set product
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     * @return ProductToFeature
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
     * Set productFeature
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Feature $productFeature
     * @return ProductToFeature
     */
    public function setProductFeature(\WebIllumination\SiteBundle\Entity\Product\Feature $productFeature = null)
    {
        $this->productFeature = $productFeature;
    
        return $this;
    }

    /**
     * Get productFeature
     *
     * @return \WebIllumination\SiteBundle\Entity\Product\Feature 
     */
    public function getProductFeature()
    {
        return $this->productFeature;
    }
}