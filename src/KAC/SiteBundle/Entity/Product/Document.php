<?php
namespace KAC\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Document as SiteDocument;

/**
 * @ORM\Entity
 */
class Document extends SiteDocument
{
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product", inversedBy="documents")
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
}