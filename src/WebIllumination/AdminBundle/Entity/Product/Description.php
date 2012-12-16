<?php
namespace WebIllumination\AdminBundle\Entity\Product;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_descriptions")
 * @ORM\HasLifecycleCallbacks()
 */
class Description
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WebIllumination\AdminBundle\Entity\Product", inversedBy="descriptions")
     */
    private $product;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="prefix", type="string", length=255)
     */
    private $prefix;
    
    /**
     * @ORM\Column(name="tagline", type="string", length=255)
     */
    private $tagline;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;
    
    /**
     * @ORM\Column(name="page_title", type="string", length=255)
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="header", type="string", length=255)
     */
    private $header;
    
    /**
     * @ORM\Column(name="meta_description", type="text")
     */
    private $metaDescription;
    
    /**
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $metaKeywords;
    
    /**
     * @ORM\Column(name="search_words", type="text")
     */
    private $searchWords;

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