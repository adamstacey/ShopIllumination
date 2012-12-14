<?php
namespace WebIllumination\AdminBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="departments")
 * @ORM\HasLifecycleCallbacks()
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @OneToMany(targetEntity="WebIlluminationAdminBundle:Department", mappedBy="parent")
     **/
    private $children;

    /**
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Department", inversedBy="children")
     **/
    private $parent;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="department_path", type="text")
     */
    private $departmentPath;
    
    /**
     * @ORM\Column(name="hide_prices", type="integer", length=1)
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="integer", length=1)
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="integer", length=1)
     */
    private $membershipCardDiscountAvailable;
    
    /**
     * @ORM\Column(name="maximum_membership_card_discount", type="decimal", precision=12, scale=4)
     */
    private $maximumMembershipCardDiscount;
    
    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand;
    
    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4)
     */
    private $inheritedDeliveryBand;
    
    /**
     * @ORM\Column(name="check_delivery_band", type="integer", length=1)
     */
    private $checkDeliveryBand;
    
    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
    
    /**
     * Get statusColour
     *
     * @return string 
     */
    public function getStatusColour()
    {
        switch ($this->status)
    	{
    		case 'd':
    			return 'red';
    		case 'a':
    			return 'green';
    		case 'h':
    			return 'orange';
    	}
        return '';
    }
}