<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_links")
 * @ORM\HasLifecycleCallbacks()
 */
class Link
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
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product", inversedBy="links")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product")
     * @ORM\JoinColumn(name="linked_product_id", referencedColumnName="id")
     */
    private $linkedProduct;
    
    /**
     * @ORM\Column(name="link_type", type="string", length=255)
     */
    private $linkType;
            
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
     * @param boolean $active
     * @return Link
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
     * Set linkType
     *
     * @param string $linkType
     * @return Link
     */
    public function setLinkType($linkType)
    {
        $this->linkType = $linkType;
    
        return $this;
    }

    /**
     * Get linkType
     *
     * @return string 
     */
    public function getLinkType()
    {
        return $this->linkType;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Link
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
     * @return Link
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
     * @return Link
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
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     * @return Link
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
     * Set linkedProduct
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $linkedProduct
     * @return Link
     */
    public function setLinkedProduct(\WebIllumination\SiteBundle\Entity\Product $linkedProduct = null)
    {
        $this->linkedProduct = $linkedProduct;
    
        return $this;
    }

    /**
     * Get linkedProduct
     *
     * @return \WebIllumination\SiteBundle\Entity\Product 
     */
    public function getLinkedProduct()
    {
        return $this->linkedProduct;
    }
}