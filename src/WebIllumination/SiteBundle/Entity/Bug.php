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
}