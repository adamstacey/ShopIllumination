<?php
namespace KAC\SiteBundle\Entity\Product;

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
    private $active = true;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="links")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product")
     * @ORM\JoinColumn(name="linked_product_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank(groups={"flow_site_new_product_step13"}, message="Select a product.")
     */
    private $linkedProduct;
    
    /**
     * @ORM\Column(name="link_type", type="string", length=255)
     * @Assert\NotBlank(groups={"flow_site_new_product_step13"}, message="Select a link type.")
     * @Assert\Choice(choices={"cheaper", "related", "series"}, groups={"flow_site_new_product_step13"})
     */
    private $linkType;

    /**
     * @ORM\Column(name="category", type="string", length=255, nullable=true)
     */
    private $category;
            
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

    public function __clone()
    {
        if ($this->id) {
            $this->id = null;
        }
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
     * @param \KAC\SiteBundle\Entity\Product $product
     * @return Link
     */
    public function setProduct(\KAC\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \KAC\SiteBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set linkedProduct
     *
     * @param \KAC\SiteBundle\Entity\Product $linkedProduct
     * @return Link
     */
    public function setLinkedProduct(\KAC\SiteBundle\Entity\Product $linkedProduct = null)
    {
        $this->linkedProduct = $linkedProduct;
    
        return $this;
    }

    /**
     * Get linkedProduct
     *
     * @return \KAC\SiteBundle\Entity\Product
     */
    public function getLinkedProduct()
    {
        return $this->linkedProduct;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
}