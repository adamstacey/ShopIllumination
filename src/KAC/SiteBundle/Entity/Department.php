<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity(repositoryClass="KAC\SiteBundle\Repository\DepartmentRepository")
 * @ORM\Table(name="departments")
 * @ORM\HasLifecycleCallbacks()
 * @Gedmo\Tree(type="nested")
 * @Assert\Callback(methods={"isDepartmentParentNotSelf", "isDepartmentNotChildOfItsChildren"})
 */
class Department implements DescribableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\BrandToDepartment", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $brands;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Department\Description", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\DepartmentToFeature", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @ORM\OrderBy({"displayOrder" = "ASC"})
     **/
    private $features;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Department\Image", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Department\Document", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Department\Routing", mappedBy="department", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $routings;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\Choice(choices={"a", "h", "d"})
     */
    private $status = 'a';
    
    /**
     * @ORM\Column(name="department_path", type="text")
     */
    private $departmentPath;

    /**
     * @ORM\Column(name="list_product_variants", type="boolean")
     */
    private $listProductVariants = true;

    /**
     * @ORM\Column(name="hide_prices", type="boolean")
     */
    private $hidePrices = false;
    
    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="boolean")
     */
    private $showPricesOutOfHours = false;

    /**
     * @ORM\Column(name="delivery_band", type="decimal", precision=12, scale=4)
     */
    private $deliveryBand = 0.000;
    
    /**
     * @ORM\Column(name="inherited_delivery_band", type="decimal", precision=12, scale=4)
     */
    private $inheritedDeliveryBand = 0.0000;

    /**
     * @ORM\Column(name="template", type="string", length=255)
     */
    private $template = 'standard';

    /**
     * @ORM\Column(name="display_order", type="integer", length=11)
     */
    private $displayOrder = '1';

    /**
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    private $lft;

    /**
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;

    /**
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    private $rgt;

    /**
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Department", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Department", mappedBy="parent")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    private $children;

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

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    private $imageUploads = "";
    private $temporaryImages = "";
    private $documentUploads = "";
    private $temporaryDocuments = "";

    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
    }
    
    /**
     * Get statusColour
     *
     * @return string 
     */
    public function getStatusColour()
    {
        switch ($this->status)
    	{
    		case 'd':
    			return 'red';
    		case 'a':
    			return 'green';
    		case 'h':
    			return 'orange';
    	}
        return '';
    }

    public function __toString()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions->first()->getName();
        } else {
            return "";
        }
    }

    public function getIndentedName()
    {
        if (count($this->descriptions) > 0)
        {
            $indentation = "";
            $level = ($this->getLvl() != 0?$this->getLvl() - 1:$this->getLvl());
            if ($level > 0)
            {
                $indentation = str_repeat("&nbsp;&nbsp;", $level);
            }
            return html_entity_decode($indentation).$this->getName();
        } else {
            return "";
        }
    }

    public function getIndentedNameWithRoot()
    {
        if (count($this->descriptions) > 0)
        {
            $indentation = "";
            if ($this->getLevel() > 0)
            {
                $indentation = str_repeat("&nbsp;&nbsp;", $this->getLevel());
            }
            return html_entity_decode($indentation).$this->getName();
        } else {
            return "";
        }
    }

    public function getName()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions->first()->getName();
        } else {
            return "";
        }
    }

    /**
     * {@inheritdoc}
     **/
    public function getExplodedPath()
    {
        return explode('|', $this->getDepartmentPath());
    }

    /**
     * {@inheritdoc}
     **/
    public function getLevel()
    {
        return count($this->getExplodedPath()) - 1;
    }

    public function getParents()
    {
        $parentDepartments = array();
        $tempDepartment = $this->getParent();

        while($tempDepartment !== null) {
            array_unshift($parentDepartments, $tempDepartment);
            $tempDepartment = $tempDepartment->getParent();
        }

        return $parentDepartments;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->brands = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routings = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Department
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set departmentPath
     *
     * @param string $departmentPath
     * @return Department
     */
    public function setDepartmentPath($departmentPath)
    {
        $this->departmentPath = $departmentPath;
    
        return $this;
    }

    /**
     * Get departmentPath
     *
     * @return string 
     */
    public function getDepartmentPath()
    {
        return $this->departmentPath;
    }

    /**
     * Set hidePrices
     *
     * @param boolean $hidePrices
     * @return Department
     */
    public function setHidePrices($hidePrices)
    {
        $this->hidePrices = $hidePrices;
    
        return $this;
    }

    /**
     * Get hidePrices
     *
     * @return boolean 
     */
    public function getHidePrices()
    {
        return $this->hidePrices;
    }

    /**
     * Set showPricesOutOfHours
     *
     * @param boolean $showPricesOutOfHours
     * @return Department
     */
    public function setShowPricesOutOfHours($showPricesOutOfHours)
    {
        $this->showPricesOutOfHours = $showPricesOutOfHours;
    
        return $this;
    }

    /**
     * Get showPricesOutOfHours
     *
     * @return boolean 
     */
    public function getShowPricesOutOfHours()
    {
        return $this->showPricesOutOfHours;
    }

    /**
     * Set deliveryBand
     *
     * @param float $deliveryBand
     * @return Department
     */
    public function setDeliveryBand($deliveryBand)
    {
        $this->deliveryBand = $deliveryBand;
    
        return $this;
    }

    /**
     * Get deliveryBand
     *
     * @return float 
     */
    public function getDeliveryBand()
    {
        return $this->deliveryBand;
    }

    /**
     * Set inheritedDeliveryBand
     *
     * @param float $inheritedDeliveryBand
     * @return Department
     */
    public function setInheritedDeliveryBand($inheritedDeliveryBand)
    {
        $this->inheritedDeliveryBand = $inheritedDeliveryBand;
    
        return $this;
    }

    /**
     * Get inheritedDeliveryBand
     *
     * @return float 
     */
    public function getInheritedDeliveryBand()
    {
        return $this->inheritedDeliveryBand;
    }

    /**
     * Set displayOrder
     *
     * @param integer $displayOrder
     * @return Department
     */
    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;
    
        return $this;
    }

    /**
     * Get displayOrder
     *
     * @return integer 
     */
    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Department
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Department
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set parent
     *
     * @param \KAC\SiteBundle\Entity\Department $parent
     * @return Department
     */
    public function setParent(\KAC\SiteBundle\Entity\Department $parent = null)
    {
        $this->parent = $parent;
    
        return $this;
    }

    /**
     * Get parent
     *
     * @return \KAC\SiteBundle\Entity\Department
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \KAC\SiteBundle\Entity\Department $children
     * @return Department
     */
    public function addChildren(\KAC\SiteBundle\Entity\Department $children)
    {
        $children->setParent($this);
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \KAC\SiteBundle\Entity\Department $children
     */
    public function removeChildren(\KAC\SiteBundle\Entity\Department $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add brands
     *
     * @param \KAC\SiteBundle\Entity\BrandToDepartment $brands
     * @return Department
     */
    public function addBrand(\KAC\SiteBundle\Entity\BrandToDepartment $brands)
    {
        $this->brands[] = $brands;
    
        return $this;
    }

    /**
     * Remove brands
     *
     * @param \KAC\SiteBundle\Entity\BrandToDepartment $brands
     */
    public function removeBrand(\KAC\SiteBundle\Entity\BrandToDepartment $brands)
    {
        $this->brands->removeElement($brands);
    }

    /**
     * Get brands
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * Add descriptions
     *
     * @param \KAC\SiteBundle\Entity\Department\Description $descriptions
     * @return Department
     */
    public function addDescription(\KAC\SiteBundle\Entity\Department\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Department\Description $descriptions
     */
    public function removeDescription(\KAC\SiteBundle\Entity\Department\Description $descriptions)
    {
        $this->descriptions->removeElement($descriptions);
    }

    /**
     * Get descriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDescriptions()
    {
        return $this->descriptions;
    }

    /**
     * Get description
     *
     * @return Department\Description
     */
    public function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions->first();
        }

        return null;
    }

    /**
     * Add features
     *
     * @param \KAC\SiteBundle\Entity\DepartmentToFeature $features
     * @return Department
     */
    public function addFeature(\KAC\SiteBundle\Entity\DepartmentToFeature $features)
    {
        $this->features[] = $features;
    
        return $this;
    }

    /**
     * Remove features
     *
     * @param \KAC\SiteBundle\Entity\DepartmentToFeature $features
     */
    public function removeFeature(\KAC\SiteBundle\Entity\DepartmentToFeature $features)
    {
        $this->features->removeElement($features);
    }

    /**
     * Get features
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeatures()
    {
        return $this->features;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    public function getLft()
    {
        return $this->lft;
    }

    public function setLft($lft)
    {
        $this->lft = $lft;
    }

    public function getLvl()
    {
        return $this->lvl;
    }

    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
    }

    public function getRgt()
    {
        return $this->rgt;
    }

    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setRoot($root)
    {
        $this->root = $root;
    }

    /**
     * Get menuTitle
     *
     * @return string
     */
    public function getMenuTitle()
    {
        $menuTitle = '';
        if ($this->getDescription())
        {
            $menuTitle = $this->getDescription()->getMenuTitle();
        }

        if (strpos($menuTitle, ' & ') !== false)
        {
            $menuTitleParts = explode(' & ', $menuTitle);
            if (strlen($menuTitleParts[0]) > strlen($menuTitleParts[1]))
            {
                $menuTitle = $menuTitleParts[0].'<br />& '.$menuTitleParts[1];
            } else {
                $menuTitle = $menuTitleParts[0].' &<br />'.$menuTitleParts[1];
            }
            if (sizeof($menuTitleParts) > 2)
            {
                for ($menuTitlePartCount = 2; $menuTitlePartCount < sizeof($menuTitleParts); $menuTitlePartCount++)
                {
                    $menuTitle .= ' & '.$menuTitleParts[$menuTitlePartCount];
                }
            }
        } else {
            $menuTitleParts = explode(' ', $menuTitle);
            $numberOfSpaces = substr_count($menuTitle, ' ');
            $spaceToBreak = ceil($numberOfSpaces / 2);
            $menuTitle = $menuTitleParts[0];
            for ($menuTitlePartCount = 1; $menuTitlePartCount < sizeof($menuTitleParts); $menuTitlePartCount++)
            {
                if ($menuTitlePartCount == $spaceToBreak)
                {
                    $menuTitle .= '<br />'.$menuTitleParts[$menuTitlePartCount];
                } else {
                    $menuTitle .= ' '.$menuTitleParts[$menuTitlePartCount];
                }
            }
        }

        return $menuTitle;
    }

    /**
     * Set template
     *
     * @param string $template
     * @return Department
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }

    public function getImageUploads()
    {
        return $this->imageUploads;
    }

    public function setImageUploads($imageUploads)
    {
        $this->imageUploads = $imageUploads;
    }

    public function getTemporaryImages()
    {
        return $this->temporaryImages;
    }

    public function setTemporaryImages($temporaryImages)
    {
        $this->temporaryImages = $temporaryImages;
    }

    public function getDocumentUploads()
    {
        return $this->documentUploads;
    }

    public function setDocumentUploads($documentUploads)
    {
        $this->documentUploads = $documentUploads;
    }

    public function getTemporaryDocuments()
    {
        return $this->temporaryDocuments;
    }

    public function setTemporaryDocuments($temporaryDocuments)
    {
        $this->temporaryDocuments = $temporaryDocuments;
    }

    /**
     * Get image
     *
     * @return \KAC\SiteBundle\Entity\Department\Image
     */
    public function getImage()
    {
        if (count($this->images) > 0)
        {
            return $this->images->first();
        }

        return null;
    }

    /**
     * Add images
     *
     * @param \KAC\SiteBundle\Entity\Department\Image $images
     * @return Department
     */
    public function addImage(\KAC\SiteBundle\Entity\Department\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \KAC\SiteBundle\Entity\Department\Image $images
     */
    public function removeImage(\KAC\SiteBundle\Entity\Department\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Get document
     *
     * @return \KAC\SiteBundle\Entity\Department\Document
     */
    public function getDocument()
    {
        if (count($this->document) > 0)
        {
            return $this->documents->first();
        }

        return null;
    }

    /**
     * Add documents
     *
     * @param \KAC\SiteBundle\Entity\Department\Document $documents
     * @return Department
     */
    public function addDocument(\KAC\SiteBundle\Entity\Department\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \KAC\SiteBundle\Entity\Department\Document $documents
     */
    public function removeDocument(\KAC\SiteBundle\Entity\Department\Document $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Get routing
     *
     * @return \KAC\SiteBundle\Entity\Department\Routing
     */
    public function getRouting()
    {
        if (count($this->routings) > 0)
        {
            return $this->routings->first();
        }

        return null;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        if ($this->getRouting())
        {
            return $this->getRouting()->getUrl();
        }

        return null;
    }

    /**
     * Add routings
     *
     * @param \KAC\SiteBundle\Entity\Department\Routing $routings
     * @return Department
     */
    public function addRouting(Routing $routings)
    {
        $this->routings[] = $routings;
    
        return $this;
    }

    /**
     * Remove routings
     *
     * @param \KAC\SiteBundle\Entity\Department\Routing $routings
     */
    public function removeRouting(\KAC\SiteBundle\Entity\Department\Routing $routings)
    {
        $this->routings->removeElement($routings);
    }

    /**
     * Get routings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoutings()
    {
        return $this->routings;
    }

    /**
     * Set listProductVariants
     *
     * @param boolean $listProductVariants
     * @return Department
     */
    public function setListProductVariants($listProductVariants)
    {
        $this->listProductVariants = $listProductVariants;
    
        return $this;
    }

    /**
     * Get listProductVariants
     *
     * @return boolean 
     */
    public function getListProductVariants()
    {
        return $this->listProductVariants;
    }

    public function isDepartmentParentNotSelf(ExecutionContext $context)
    {
        if($this->getParent() === $this)
        {
            $context->addViolationAt("parent", "You cannot set the parent department to be itself.");
        }
    }

    public function isDepartmentNotChildOfItsChildren(ExecutionContext $context)
    {
        $that = $this;
        $func = function(Department $department) use ($that, $context, &$func) {
            foreach($department->getChildren() as $child)
            {
                if($child === $this->getParent()) {
                    $context->addViolationAt("parent", "You cannot set the parent department to be one of its children.");
                }

                $func($child);
            }
        };

        $func($this);
    }
}