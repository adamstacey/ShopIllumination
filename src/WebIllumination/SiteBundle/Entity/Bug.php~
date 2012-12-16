<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bugs")
 * @ORM\HasLifecycleCallbacks()
 */
class Bug
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
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
     * @ORM\Column(name="operating_system", type="string", length=255)
     */
    private $operatingSystem;
    
    /**
     * @ORM\Column(name="internet_browser", type="string", length=255)
     */
    private $internetBrowser;
    
    /**
     * @ORM\Column(name="url", type="text")
     */
    private $url;
    
    /**
     * @ORM\Column(name="status", type="integer", length=11)
     */
    private $status;
	
	/**
     * @ORM\Column(name="priority", type="integer", length=11)
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact")
     * @ORM\JoinColumn(name="owner_contact_id", referencedColumnName="id")
     */
    private $ownerContact;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Contact")
     * @ORM\JoinColumn(name="assinged_to_contact_id", referencedColumnName="id")
     */
    private $assignedToContact;
    
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
     * @param string $bug
     * @return Bug
     */
    public function setBug($bug)
    {
        $this->bug = $bug;
    
        return $this;
    }

    /**
     * Get bug
     *
     * @return string 
     */
    public function getBug()
    {
        return $this->bug;
    }

    /**
     * Set testScenario
     *
     * @param string $testScenario
     * @return Bug
     */
    public function setTestScenario($testScenario)
    {
        $this->testScenario = $testScenario;
    
        return $this;
    }

    /**
     * Get testScenario
     *
     * @return string 
     */
    public function getTestScenario()
    {
        return $this->testScenario;
    }

    /**
     * Set operatingSystem
     *
     * @param string $operatingSystem
     * @return Bug
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->operatingSystem = $operatingSystem;
    
        return $this;
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
     * @return Bug
     */
    public function setInternetBrowser($internetBrowser)
    {
        $this->internetBrowser = $internetBrowser;
    
        return $this;
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
     * @param string $url
     * @return Bug
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Bug
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
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
     * Set priority
     *
     * @param integer $priority
     * @return Bug
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
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
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Bug
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
     * @return Bug
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
     * @return Bug
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
     * Set ownerContact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $ownerContact
     * @return Bug
     */
    public function setOwnerContact(\WebIllumination\SiteBundle\Entity\Contact $ownerContact = null)
    {
        $this->ownerContact = $ownerContact;
    
        return $this;
    }

    /**
     * Get ownerContact
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact 
     */
    public function getOwnerContact()
    {
        return $this->ownerContact;
    }

    /**
     * Set assignedToContact
     *
     * @param \WebIllumination\SiteBundle\Entity\Contact $assignedToContact
     * @return Bug
     */
    public function setAssignedToContact(\WebIllumination\SiteBundle\Entity\Contact $assignedToContact = null)
    {
        $this->assignedToContact = $assignedToContact;
    
        return $this;
    }

    /**
     * Get assignedToContact
     *
     * @return \WebIllumination\SiteBundle\Entity\Contact 
     */
    public function getAssignedToContact()
    {
        return $this->assignedToContact;
    }
}