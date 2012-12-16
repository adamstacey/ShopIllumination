<?php
namespace WebIllumination\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_to_option")
 * @ORM\HasLifecycleCallbacks()
 */
class ProductToOption
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product", inversedBy="options")
     **/
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\Option")
     * @ORM\JoinColumn(name="product_option_id", referencedColumnName="id")
     **/
    private $productOption;
    
    /**
     * @ORM\Column(name="price", type="decimal", precision=12, scale=4)
     */
    private $price;
    
    /**
     * @ORM\Column(name="price_type", type="string", length=1)
     */
    private $priceType;
    
    /**
     * @ORM\Column(name="price_use", type="string", length=1)
     */
    private $priceUse;
        
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
}