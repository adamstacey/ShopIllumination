<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="`membership_cards")
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
     * @ORM\Column(name="active", type="boolean")
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
        return 'bundles/kacadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
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
     * @return MembershipCard
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    
        return $this;
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
     * @param boolean $active
     * @return MembershipCard
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
     * Set membershipNumber
     *
     * @param string $membershipNumber
     * @return MembershipCard
     */
    public function setMembershipNumber($membershipNumber)
    {
        $this->membershipNumber = $membershipNumber;
    
        return $this;
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
     * @return MembershipCard
     */
    public function setItems($items)
    {
        $this->items = $items;
    
        return $this;
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
     * @param float $subTotal
     * @return MembershipCard
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    
        return $this;
    }

    /**
     * Get subTotal
     *
     * @return float 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set savings
     *
     * @param float $savings
     * @return MembershipCard
     */
    public function setSavings($savings)
    {
        $this->savings = $savings;
    
        return $this;
    }

    /**
     * Get savings
     *
     * @return float 
     */
    public function getSavings()
    {
        return $this->savings;
    }

    /**
     * Set validFromDate
     *
     * @param \DateTime $validFromDate
     * @return MembershipCard
     */
    public function setValidFromDate($validFromDate)
    {
        $this->validFromDate = $validFromDate;
    
        return $this;
    }

    /**
     * Get validFromDate
     *
     * @return \DateTime 
     */
    public function getValidFromDate()
    {
        return $this->validFromDate;
    }

    /**
     * Set expiryDate
     *
     * @param \DateTime $expiryDate
     * @return MembershipCard
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    
        return $this;
    }

    /**
     * Get expiryDate
     *
     * @return \DateTime 
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MembershipCard
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
     * @return MembershipCard
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
}