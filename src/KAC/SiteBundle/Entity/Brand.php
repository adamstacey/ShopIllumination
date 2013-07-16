<?php
namespace KAC\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brands")
 * @ORM\HasLifecycleCallbacks()

 */
class Brand
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Brand\Description", mappedBy="brand", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\BrandToDepartment", mappedBy="brand", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Brand\Routing", mappedBy="brand", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $routings;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Brand\Image", mappedBy="brand", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Brand\Document", mappedBy="brand", cascade={"all"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $documents;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status = 'a';

    /**
     * @ORM\Column(name="template", type="string", length=255)
     */
    private $template = 'standard';

    /**
     * @ORM\Column(name="request_a_brochure", type="boolean")
     */
    private $requestABrochure = false;

    /**
     * @ORM\Column(name="brochure_web_address", type="string", length=255)
     */
    private $brochureWebAddress;

    /**
     * @ORM\Column(name="request_a_sample", type="boolean")
     */
    private $requestASample = false;

    /**
     * @ORM\Column(name="sample_web_address", type="string", length=255)
     */
    private $sampleWebAddress;

    /**
     * @ORM\Column(name="hide_prices", type="boolean")
     */
    private $hidePrices = false;

    /**
     * @ORM\Column(name="show_prices_out_of_hours", type="boolean")
     */
    private $showPricesOutOfHours = false;

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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->documents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
    }

    public function __toString()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0]->getName();
        } else {
            return "";
        }
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

            case 'a':
                return 'green';
                break;
            case 'h':
                return 'amber';
                break;
            case 'd':
                return 'red';
                break;
        }
        return '';
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

    /**
     * Set status
     *
     * @param string $status
     * @return Brand
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
     * Set requestABrochure
     *
     * @param boolean $requestABrochure
     * @return Brand
     */
    public function setRequestABrochure($requestABrochure)
    {
        $this->requestABrochure = $requestABrochure;

        return $this;
    }

    /**
     * Get requestABrochure
     *
     * @return boolean
     */
    public function getRequestABrochure()
    {
        return $this->requestABrochure;
    }

    /**
     * Set brochureWebAddress
     *
     * @param string $brochureWebAddress
     * @return Brand
     */
    public function setBrochureWebAddress($brochureWebAddress)
    {
        $this->brochureWebAddress = $brochureWebAddress;

        return $this;
    }

    /**
     * Get brochureWebAddress
     *
     * @return string
     */
    public function getBrochureWebAddress()
    {
        return $this->brochureWebAddress;
    }

    /**
     * Set requestASample
     *
     * @param boolean $requestASample
     * @return Brand
     */
    public function setRequestASample($requestASample)
    {
        $this->requestASample = $requestASample;

        return $this;
    }

    /**
     * Get requestASample
     *
     * @return boolean
     */
    public function getRequestASample()
    {
        return $this->requestASample;
    }

    /**
     * Set sampleWebAddress
     *
     * @param string $sampleWebAddress
     * @return Brand
     */
    public function setSampleWebAddress($sampleWebAddress)
    {
        $this->sampleWebAddress = $sampleWebAddress;

        return $this;
    }

    /**
     * Get sampleWebAddress
     *
     * @return string
     */
    public function getSampleWebAddress()
    {
        return $this->sampleWebAddress;
    }

    /**
     * Set hidePrices
     *
     * @param boolean $hidePrices
     * @return Brand
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
     * @return Brand
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Brand
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
     * @return Brand
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
     * Add departments
     *
     * @param \KAC\SiteBundle\Entity\BrandToDepartment $departments
     * @return Brand
     */
    public function addDepartment(\KAC\SiteBundle\Entity\BrandToDepartment $departments)
    {
        $this->departments[] = $departments;

        return $this;
    }

    /**
     * Remove departments
     *
     * @param \KAC\SiteBundle\Entity\BrandToDepartment $departments
     */
    public function removeDepartment(\KAC\SiteBundle\Entity\BrandToDepartment $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Add descriptions
     *
     * @param \KAC\SiteBundle\Entity\Brand\Description $descriptions
     * @return Brand
     */
    public function addDescription(Brand\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
    
        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Brand\Description $descriptions
     */
    public function removeDescription(Brand\Description $descriptions)
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
     * @return Brand\Description
     */
    public function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions[0];
        }

        return null;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * Get image
     *
     * @return \KAC\SiteBundle\Entity\Brand\Image
     */
    public function getImage()
    {
        if (count($this->images) > 0)
        {
            return $this->images[0];
        }

        return null;
    }

    /**
     * Add images
     *
     * @param \KAC\SiteBundle\Entity\Brand\Image $images
     * @return Brand
     */
    public function addImage(\KAC\SiteBundle\Entity\Brand\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \KAC\SiteBundle\Entity\Brand\Image $images
     */
    public function removeImage(\KAC\SiteBundle\Entity\Brand\Image $images)
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
     * @return \KAC\SiteBundle\Entity\Brand\Document
     */
    public function getDocument()
    {
        if (count($this->document) > 0)
        {
            return $this->documents[0];
        }

        return null;
    }

    /**
     * Add documents
     *
     * @param \KAC\SiteBundle\Entity\Brand\Document $documents
     * @return Brand
     */
    public function addDocument(\KAC\SiteBundle\Entity\Brand\Document $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \KAC\SiteBundle\Entity\Brand\Document $documents
     */
    public function removeDocument(\KAC\SiteBundle\Entity\Brand\Document $documents)
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
     * @return \KAC\SiteBundle\Entity\Brand\Routing
     */
    public function getRouting()
    {
        if (count($this->routings) > 0)
            return $this->routings[0];
        {
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
     * @param \KAC\SiteBundle\Entity\Brand\Routing $routings
     * @return Brand
     */
    public function addRouting(\KAC\SiteBundle\Entity\Brand\Routing $routings)
    {
        $this->routings[] = $routings;
    
        return $this;
    }

    /**
     * Remove routings
     *
     * @param \KAC\SiteBundle\Entity\Brand\Routing $routings
     */
    public function removeRouting(\KAC\SiteBundle\Entity\Brand\Routing $routings)
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
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }
}