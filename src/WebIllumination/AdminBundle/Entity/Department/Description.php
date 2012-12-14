<?php
namespace WebIllumination\AdminBundle\Entity\Department;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="department_descriptions")
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
     * @ManyToOne(targetEntity="WebIlluminationAdminBundle:Department", inversedBy="descriptions")
     */
    private $department;
        
    /**
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;
    
    /**
     * @ORM\Column(name="delivery_band_notes", type="text")
     */
    private $deliveryBandNotes;
    
    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(name="google_department", type="text")
     */
    private $googleDepartment;
    
    /**
     * @ORM\Column(name="ebay_department", type="text")
     */
    private $ebayDepartment;
    
    /**
     * @ORM\Column(name="amazon_department", type="text")
     */
    private $amazonDepartment;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
    /**
     * @ORM\Column(name="menu_title", type="string", length=255)
     */
    private $menuTitle;
    
    /**
     * @ORM\Column(name="page_title", type="string", length=255)
     */
    private $pageTitle;
    
    /**
     * @ORM\Column(name="page_title_template", type="text")
     */
    private $pageTitleTemplate;
    
    /**
     * @ORM\Column(name="header", type="string", length=255)
     */
    private $header;
    
    /**
     * @ORM\Column(name="header_template", type="text")
     */
    private $headerTemplate;
    
    /**
     * @ORM\Column(name="meta_description", type="text")
     */
    private $metaDescription;
    
    /**
     * @ORM\Column(name="meta_description_template", type="text")
     */
    private $metaDescriptionTemplate;
    
    /**
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $metaKeywords;

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