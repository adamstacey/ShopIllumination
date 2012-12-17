<?php
namespace WebIllumination\SiteBundle\Entity\Order;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_notes")
 * @ORM\HasLifecycleCallbacks()
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="creator", type="string", length=255)
     */
    private $creator;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Order", inversedBy="notes")
     */
    private $order;

    /**
     * @ORM\Column(name="note_type", type="string", length=255)
     */
    private $noteType;

    /**
     * @ORM\Column(name="notified", type="boolean")
     */
    private $notified;

    /**
     * @ORM\Column(name="note", type="text")
     */
    private $note;

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
     * Set creator
     *
     * @param string $creator
     * @return Note
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    
        return $this;
    }

    /**
     * Get creator
     *
     * @return string 
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set noteType
     *
     * @param string $noteType
     * @return Note
     */
    public function setNoteType($noteType)
    {
        $this->noteType = $noteType;
    
        return $this;
    }

    /**
     * Get noteType
     *
     * @return string 
     */
    public function getNoteType()
    {
        return $this->noteType;
    }

    /**
     * Set notified
     *
     * @param boolean $notified
     * @return Note
     */
    public function setNotified($notified)
    {
        $this->notified = $notified;
    
        return $this;
    }

    /**
     * Get notified
     *
     * @return boolean 
     */
    public function getNotified()
    {
        return $this->notified;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Note
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
     * @return Note
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
     * Set order
     *
     * @param \WebIllumination\SiteBundle\Entity\Order $order
     * @return Note
     */
    public function setOrder(\WebIllumination\SiteBundle\Entity\Order $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \WebIllumination\SiteBundle\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }
}