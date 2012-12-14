<?php
namespace WebIllumination\AdminBundle\Entity\Brand;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brand_descriptions")
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
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Brand", inversedBy="descriptions")
     */
    private $brand;

	/**
     * @ORM\OneToOne(targetEntity="WebIlluminationAdminBundle:Image")
     */
    private $logoImage;
    
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
    /**
     * @ORM\Column(name="about", type="text")
     */
    private $about;
    
    /**
     * @ORM\Column(name="history", type="text")
     */
    private $history;
    
    /**
     * @ORM\Column(name="more_information", type="text")
     */
    private $moreInformation; 
    
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
}