<?php
namespace KAC\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Routing as SiteRouting;

/**
 * @ORM\Entity
 */
class Routing extends SiteRouting
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="routings")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * Set product
     *
     * @param \KAC\SiteBundle\Entity\Product $product
     * @return Routing
     */
    public function setProduct(\KAC\SiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \KAC\SiteBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    public function getObjectType()
    {
        return 'product';
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
}