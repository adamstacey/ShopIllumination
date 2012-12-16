<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_feature_groups")
 * @ORM\HasLifecycleCallbacks()
 */
class FeatureGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="WebIllumination\SiteBundle\Entity\Product\Feature", mappedBy="productFeatureGroup")
     */
    private $features;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @ORM\Column(name="filter", type="boolean")
     */
    private $filter;
    
    /**
     * @ORM\Column(name="product_feature_group", type="string", length=255)
     */
    private $productFeatureGroup;
    
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