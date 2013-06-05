<?php
namespace KAC\SiteBundle\Entity\Product\Variant;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Document as SiteDocument;

/**
 * @ORM\Entity
 */
class Document extends SiteDocument
{
    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Product\Variant", inversedBy="documents")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     */
    protected $variant;

    /**
     * Set product
     *
     * @param \KAC\SiteBundle\Entity\Product\Variant $variant
     * @return Routing
     */
    public function setVariant(\KAC\SiteBundle\Entity\Product\Variant $variant = null)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * Get variant
     *
     * @return \KAC\SiteBundle\Entity\Product\Variant
     */
    public function getVariant()
    {
        return $this->variant;
    }

    public function getObjectType()
    {
        return 'product_variant';
    }
}