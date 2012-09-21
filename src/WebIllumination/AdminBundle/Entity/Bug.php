<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bug")
 * @ORM\HasLifecycleCallbacks()
 */
class Bug
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length="11")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;    
	
	/**
     * @ORM\Column(name="bug", type="text")
     */
    private $bug;
    
    /**
     * @ORM\Column(name="test_scenario", type="text")
     */
    private $testScenario;
    
    /**
     * @ORM\Column(name="operating_system", type="string", length="255")
     */
    private $operatingSystem;
    
    /**
     * @ORM\Column(name="internet_browser", type="string", length="255")
     */
    private $internetBrowser;
    
    /**
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    
    /**
     * @ORM\Column(name="status", type="integer", length="11")
     */
    private $status;
	
	/**
     * @ORM\Column(name="priority", type="integer", length="1")
     */
    private $priority;
    
    /**
     * @ORM\Column(name="owner_contact_id", type="integer", length="11")
     */
    private $ownerContactId;
    
    /**
     * @ORM\Column(name="assigned_to_contact_id", type="integer", length="11")
     */
    private $assignedToContactId;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length="11")
     */
    private $displayOrder;
	        
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
     * Set bug
     *
     * @param text $bug
     */
    public function setBug($bug)
    {
        $this->bug = $bug;
    }

    /**
     * Get bug
     *
     * @return text 
     */
    public function getBug()
    {
        return $this->bug;
    }

    /**
     * Set testScenario
     *
     * @param text $testScenario
     */
    public function setTestScenario($testScenario)
    {
        $this->testScenario = $testScenario;
    }

    /**
     * Get testScenario
     *
     * @return text 
     */
    public function getTestScenario()
    {
        return $this->testScenario;
    }

    /**
     * Set operatingSystem
     *
     * @param string $operatingSystem
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    }

    /**
     * Get operatingSystem
     *
     * @return string 
     */
    public function getOperatingSystem()
    {
        return $this->operatingSystem;
    }

    /**
     * Set internetBrowser
     *
     * @param string $internetBrowser
     */
    public function setInternetBrowser($internetBrowser)
    {
        $this->internetBrowser = $internetBrowser;
    }

    /**
     * Get internetBrowser
     *
     * @return string 
     */
    public function getInternetBrowser()
    {
        return $this->internetBrowser;
    }

    /**
     * Set url
     *
     * @param text $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return text 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Get statusName
     *
     * @return string 
     */
    public function getStatusName()
    {
        switch ($this->status)
    	{
    		case 1:
    			return 'Not Started';
    		case 2:
    			return 'More Information Required';
    		case 3:
    			return 'In Progress';
    		case 4:
    			return 'Ready for Testing';
    		case 5:
    			return 'Closed';
    	}
        return '';
    }
    
    /**
     * Get statusColour
     *
     * @return string 
     */
    public function getStatusColour()
    {
        switch ($this->status)
    	{
    		case 1:
    			return 'red';
    		case 2:
    			return 'blue';
    		case 3:
    			return 'orange';
    		case 4:
    			return 'yellow';
    		case 5:
    			return 'grey';
    	}
        return '';
    }

    /**
     * Set priority
     *
     * @param integer $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }
    
    /**
     * Get priorityName
     *
     * @return string 
     */
    public function getPriorityName()
    {
        switch ($this->priority)
    	{
    		case 1:
    			return 'Trivial';
    		case 2:
    			return 'Minor';
    		case 3:
    			return 'Major';
    		case 4:
    			return 'Critical';
    	}
        return '';
    }
    
    /**
     * Get priorityColour
     *
     * @return string 
     */
    public function getPriorityColour()
    {
        switch ($this->priority)
    	{
    		case 1:
    			return 'grey';
    		case 2:
    			return 'yellow';
    		case 3:
    			return 'orange';
    		case 4:
    			return 'red';
    	}
        return '';
    }
    
    /**
     * Set ownerContactId
     *
     * @param integer $ownerContactId
     */
    public function setOwnerContactId($ownerContactId)
    {
        $this->ownerContactId = $ownerContactId;
    }

    /**
     * Get ownerContactId
     *
     * @return integer 
     */
    public function getOwnerContactId()
    {
        return $this->ownerContactId;
    }

    /**
     * Set assignedToContactId
     *
     * @param integer $assignedToContactId
     */
    public function setAssignedToContactId($assignedToContactId)
    {
        $this->assignedToContactId = $assignedToContactId;
    }

    /**
     * Get assignedToContactId
     *
     * @return integer 
     */
    public function getAssignedToContactId()
    {
        return $this->assignedToContactId;
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
}