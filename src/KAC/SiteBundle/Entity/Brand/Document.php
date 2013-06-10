<?php
namespace KAC\SiteBundle\Entity\Brand;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Document as SiteDocument;

/**
 * @ORM\Entity
 */
class Document extends SiteDocument
{
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Brand", inversedBy="documents")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    protected $brand;

    /**
     * Set brand
     *
     * @param \KAC\SiteBundle\Entity\Brand $brand
     * @return Routing
     */
    public function setBrand(\KAC\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \KAC\SiteBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    public function getObjectType()
    {
        return 'brand';
    }
}