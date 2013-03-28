<?php
namespace KAC\SiteBundle\Entity\Offer;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="offer_conditions")
 * @ORM\HasLifecycleCallbacks()
 */
class Condition
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Offer", inversedBy="offers")
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Offer\Condition", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Offer\Condition", mappedBy="parent")
     * @ORM\OrderBy({"displayOrder" = "DESC"})
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Offer\ConditionType")
     */
    private $type;

    /**
     * @ORM\Column(name="parameters", type="array")
     */
    private $parameters;

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
     * Set parameters
     *
     * @param array $parameters
     * @return Condition
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    
        return $this;
    }

    /**
     * Get parameters
     *
     * @return array 
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Condition
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
     * @return Condition
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
     * Set offer
     *
     * @param \KAC\SiteBundle\Entity\Offer $offer
     * @return Condition
     */
    public function setOffer(\KAC\SiteBundle\Entity\Offer $offer = null)
    {
        $this->offer = $offer;
    
        return $this;
    }

    /**
     * Get offer
     *
     * @return \KAC\SiteBundle\Entity\Offer 
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set type
     *
     * @param \KAC\SiteBundle\Entity\Offer\ConditionType $type
     * @return Condition
     */
    public function setType(\KAC\SiteBundle\Entity\Offer\ConditionType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \KAC\SiteBundle\Entity\Offer\ConditionType 
     */
    public function getType()
    {
        return $this->type;
    }

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }
}