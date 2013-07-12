<?php
namespace KAC\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use \KAC\SiteBundle\Entity\Routing as SiteRouting;

/**
 * @ORM\Entity
 */
class FeatureRouting extends Routing
{
    /**
     * @ORM\Column(name="key0", type="string", length=255, nullable=true)
     */
    private $featureGroup;

    /**
     * @ORM\Column(name="value0", type="string", length=255, nullable=true)
     */
    private $feature;

    public function getObjectType()
    {
        return 'product_with_feature';
    }

    /**
     * @param mixed $feature
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return mixed
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param mixed $featureGroup
     */
    public function setFeatureGroup($featureGroup)
    {
        $this->featureGroup = $featureGroup;
    }

    /**
     * @return mixed
     */
    public function getFeatureGroup()
    {
        return $this->featureGroup;
    }
}