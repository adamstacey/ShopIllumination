<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="guarantees")
 * @ORM\HasLifecycleCallbacks()
 */
class Guarantee
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="object_id", type="integer", length=11)
     */
    private $objectId;
	    
    /**
     * @ORM\Column(name="object_type", type="string", length=100)
     */
    private $objectType;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Guarantee\Type")
     * @ORM\JoinColumn(name="guarantee_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Guarantee\Length")
     * @ORM\JoinColumn(name="guarantee_length_id", referencedColumnName="id")
     */
    private $length;

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
     * Set objectId
     *
     * @param integer $objectId
     * @return Guarantee
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectType
     *
     * @param string $objectType
     * @return Guarantee
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    
        return $this;
    }

    /**
     * Get objectType
     *
     * @return string 
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Guarantee
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
     * @return Guarantee
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
     * Set type
     *
     * @param \WebIllumination\SiteBundle\Entity\Guarantee\Type $type
     * @return Guarantee
     */
    public function setType(\WebIllumination\SiteBundle\Entity\Guarantee\Type $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \WebIllumination\SiteBundle\Entity\Guarantee\Type 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set length
     *
     * @param \WebIllumination\SiteBundle\Entity\Guarantee\Length $length
     * @return Guarantee
     */
    public function setLength(\WebIllumination\SiteBundle\Entity\Guarantee\Length $length = null)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return \WebIllumination\SiteBundle\Entity\Guarantee\Length 
     */
    public function getLength()
    {
        return $this->length;
    }
}