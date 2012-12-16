<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_features")
 * @ORM\HasLifecycleCallbacks()
 */
class Feature
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
     * @ORM\Column(name="filter", type="boolean")
     */
    private $filter;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\FeatureGroup", inversedBy="features")
     * @ORM\JoinColumn(name="product_feature_group_id", referencedColumnName="id")
     */
    private $productFeatureGroup;
    
    /**
     * @ORM\Column(name="product_feature", type="string", length=255)
     */
    private $productFeature;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;

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