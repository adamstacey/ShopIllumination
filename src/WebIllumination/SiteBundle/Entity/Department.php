<?php
namespace WebIllumination\SiteBundle\Entity;

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
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Department", mappedBy="parent")
     **/
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Department", inversedBy="children")
     **/
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Department\Description", mappedBy="department")
     **/
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\DepartmentToFeature", mappedBy="department")
     **/
    private $features;
    
    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;
    
    /**
     * @ORM\Column(name="department_path", type="text")
     */
    private $departmentPath;
    
    /**
     * @ORM\Column(name="hide_prices", type="boolean")
     */
    private $hidePrices;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="boolean")
     */
    private $showPricesOutOfHours;
    
    /**
     * @ORM\Column(name="membership_card_discount_available", type="boolean")
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
     * @ORM\Column(name="check_delivery_band", type="boolean")
     */
    private $checkDeliveryBand;
    
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