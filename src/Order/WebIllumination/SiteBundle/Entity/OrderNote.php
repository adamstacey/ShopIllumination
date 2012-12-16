<?php

namespace WebIllumination\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderNote
 */
class OrderNote
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $creator;

    /**
     * @var string
     */
    private $noteType;

    /**
     * @var boolean
     */
    private $notified;

    /**
     * @var string
     */
    private $note;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \WebIllumination\SiteBundle\Entity\Order
     */
    private $order;


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
     * @return OrderNote
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
     * @return OrderNote
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
     * @return OrderNote
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
     * @return OrderNote
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
     * @return OrderNote
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
     * @return OrderNote
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
     * @return OrderNote
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
