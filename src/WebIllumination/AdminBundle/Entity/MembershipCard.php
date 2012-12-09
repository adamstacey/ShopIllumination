<?php
namespace WebIllumination\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`membership_card`")
 * @ORM\HasLifecycleCallbacks()
 */
class MembershipCard
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="user_id", type="integer", length=11)
     */
    private $userId;
    
    /**
     * @ORM\Column(name="active", type="integer", length=1)
     */
    private $active;
        
    /**
     * @ORM\Column(name="membership_number", type="string", length=255)
     */
    private $membershipNumber;
        
    /**
     * @ORM\Column(name="items", type="string", length=255)
     */
    private $items;
    
    /**
     * @ORM\Column(name="sub_total", type="decimal", precision=12, scale=4)
     */
    private $subTotal;
    
    /**
     * @ORM\Column(name="savings", type="decimal", precision=12, scale=4)
     */
    private $savings;
    
    /**
     * @ORM\Column(name="valid_from_date", type="datetime")
     */
    private $validFromDate;                
    
    /**
     * @ORM\Column(name="expiry_date", type="datetime")
     */
    private $expiryDate;
                               
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
	 * @ORM\PrePersist
	 */
	public function create()
	{
	    $this->createdAt = new \DateTime();
	    $this->updatedAt = new \DateTime();
	}
	
	/**
	 * @ORM\PreUpdate
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
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set active
     *
     * @param integer $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }
    
    /**
     * Get activeColour
     *
     * @return string 
     */
    public function getActiveColour()
    {
        switch ($this->active)
    	{
    		case 1:
    			return 'green';
    		default:
    		case 0:
    			return 'red';
    	}
        return 'red';
    }
    
    /**
     * Get activeIcon
     *
     * @return text 
     */
    public function getActiveIcon()
    {
        return 'bundles/webilluminationadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
    }

    /**
     * Set membershipNumber
     *
     * @param string $membershipNumber
     */
    public function setMembershipNumber($membershipNumber)
    {
        $this->membershipNumber = $membershipNumber;
    }

    /**
     * Get membershipNumber
     *
     * @return string 
     */
    public function getMembershipNumber()
    {
        return $this->membershipNumber;
    }

    /**
     * Set items
     *
     * @param string $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Get items
     *
     * @return string 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set subTotal
     *
     * @param decimal $subTotal
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get subTotal
     *
     * @return decimal 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set savings
     *
     * @param decimal $savings
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    }

    /**
     * Get savings
     *
     * @return decimal 
     */
    public function getSavings()
    {
        return $this->savings;
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

    /**
     * Set validFromDate
     *
     * @param datetime $validFromDate
     */
    public function setValidFromDate($validFromDate)
    {
        $this->validFromDate = $validFromDate;
    }

    /**
     * Get validFromDate
     *
     * @return datetime 
     */
    public function getValidFromDate()
    {
        return $this->validFromDate;
    }

    /**
     * Set expiryDate
     *
     * @param datetime $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Get expiryDate
     *
     * @return datetime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }
}