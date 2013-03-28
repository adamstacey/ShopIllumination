<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use KAC\SiteBundle\Entity\DescriptionInterface;

/**
 * @ORM\Entity()
 * @ORM\Table(name="offers")
 * @ORM\HasLifecycleCallbacks()
 */
class Offer implements DescribableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="variants")
     */
    private $product;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Offer\Description", mappedBy="offer", cascade={"all"})
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Offer\Description", mappedBy="offer", cascade={"all"})
     */
    private $conditions;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\Choice(choices={"a", "h", "d"})
     */
    private $status = 'a';

    /**
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(name="discount", type="decimal", precision=12, scale=4)
     */
    private $discount;

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
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->conditions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set status
     *
     * @param string $status
     * @return Offer
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Offer
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
     * @return Offer
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
     * @return Offer
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
     * Add descriptions
     *
     * @param \KAC\SiteBundle\Entity\Offer\Description $descriptions
     * @return Offer
     */
    public function addDescription(\KAC\SiteBundle\Entity\Offer\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Offer\Description $descriptions
     */
    public function removeDescription(\KAC\SiteBundle\Entity\Offer\Description $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get the main description of the object
     * @return DescriptionInterface
     */
    function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0];
        }

        return null;
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Add conditions
     *
     * @param \KAC\SiteBundle\Entity\Offer\Description $conditions
     * @return Offer
     * @return $this
     */
    public function addCondition(\KAC\SiteBundle\Entity\Offer\Description $conditions)
    {
        $this->conditions[] = $conditions;
    
        return $this;
    }

    /**
     * Remove conditions
     *
     * @param Offer\Description $conditions
     */
    public function removeCondition(\KAC\SiteBundle\Entity\Offer\Description $conditions)
    {
        $this->conditions->removeElement($conditions);
    }

    /**
     * Get conditions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Offer
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return Offer
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}