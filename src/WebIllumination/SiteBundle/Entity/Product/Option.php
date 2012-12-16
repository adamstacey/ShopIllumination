<?php
namespace WebIllumination\SiteBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_options")
 * @ORM\HasLifecycleCallbacks()
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\SiteBundle\Entity\Product\OptionGroup", inversedBy="options")
     * @ORM\JoinColumn(name="product_option_group_id", referencedColumnName="id")
     */
    private $productOptionGroup;
    
    /**
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @ORM\Column(name="product_option", type="string", length=255)
     */
    private $productOption;
    
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