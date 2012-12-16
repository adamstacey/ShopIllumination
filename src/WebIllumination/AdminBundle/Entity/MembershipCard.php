<?php
namespace WebIllumination\AdminBundle\Entity;

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
        return 'bundles/webilluminationadmin/images/icons/'.$this->getActiveColour().'-light-icon.png';
    }
}