<?php
namespace KAC\SiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use KAC\SiteBundle\Entity\Product\Variant;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\ExecutionContext;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 * @ORM\HasLifecycleCallbacks()
 */
class Product implements DescribableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", length=11)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="KAC\SiteBundle\Entity\Brand")
     * @Assert\NotNull(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a brand.")
     * @Serializer\Exclude()
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Description", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Assert\Valid
     */
    private $descriptions;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\ProductToDepartment", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Assert\NotNull(groups={"flow_site_new_product_step1", "flow_site_new_product_step2", "site_edit_product_overview", "site_edit_product_departments"}, message="Select a department.")
     * @Assert\Count(min = "1", groups={"flow_site_new_product_step1", "flow_site_new_product_step2", "site_edit_product_overview", "site_edit_product_departments"}, minMessage="Select at least one department.")
     * @Assert\Valid
     * @Serializer\Exclude()
     */
    private $departments;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Link", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Serializer\Exclude()
     * @Assert\Valid
     */
    private $links;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Image", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Document", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $documents;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Variant", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @ORM\OrderBy({"displayOrder" = "ASC"})
     * @Assert\Valid
     */
    private $variants;

    /**
     * @ORM\OneToMany(targetEntity="KAC\SiteBundle\Entity\Product\Routing", mappedBy="product", cascade={"all"}, orphanRemoval=true)
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $routings;

    /**
     * @ORM\Column(name="status", type="string", length=1)
     * @Assert\NotBlank(groups={"flow_site_new_product_step1", "site_edit_product_overview"}, message="Select a status.")
     * @Assert\Choice(choices={"a", "h", "d"}, groups={"flow_site_new_product_step1", "site_edit_product_overview"})
     */
    private $status = 'a';

    /**
     * @ORM\Column(name="available_for_purchase", type="boolean")
     *
     */
    private $availableForPurchase = false;

    /**
     * @ORM\Column(name="feature_comparison", type="boolean")
     *
     */
    private $featureComparison = false;

    /**
     * @ORM\Column(name="downloadable", type="boolean")
     *
     */
    private $downloadable = false;

    /**
     * @ORM\Column(name="special_offer", type="boolean")
     *
     */
    private $specialOffer = false;

    /**
     * @ORM\Column(name="recommended", type="boolean")
     *
     */
    private $recommended = false;

    /**
     * @ORM\Column(name="accessory", type="boolean")
     *
     */
    private $accessory = false;

    /**
     * @ORM\Column(name="new", type="boolean")
     *
     */
    private $new = false;

    /**
     * @ORM\Column(name="sample_request", type="boolean")
     *
     */
    private $sampleRequest = false;

    /**
     * @ORM\Column(name="template", type="string", length=255)
     */
    private $template = "standard";

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

    /**
     * @Assert\NotNull(groups={"flow_site_new_product_step1", "flow_site_new_product_step2", "site_edit_product_overview", "site_edit_product_departments"}, message="Select a department.")
     */
    private $mainDepartment = null;
    private $imageUploads = "";
    private $temporaryImages = "";
    private $documentUploads = "";
    private $temporaryDocuments = "";
    private $features = array();

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
                return 'amber';
        }
        return '';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variants = new ArrayCollection();
        $this->descriptions = new ArrayCollection();
        $this->departments = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->features = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->routings = new ArrayCollection();
    }

    public function __clone() {
        if ($this->id) {
            $this->id = null;
            $this->createdAt = null;
            $this->updatedAt = null;

            $oldVariants = $this->variants;
            $oldDepartments = $this->departments;
            $oldDescriptions = $this->descriptions;
            $oldLinks = $this->links;
            $oldImages = $this->images;
            $oldDocuments = $this->documents;

            // Clear old collections
            $this->variants = new ArrayCollection();
            $this->descriptions = new ArrayCollection();
            $this->departments = new ArrayCollection();
            $this->links = new ArrayCollection();
            $this->images = new ArrayCollection();
            $this->documents = new ArrayCollection();
            $this->routings = new ArrayCollection();

            foreach($oldVariants as $entity)
            {
                $this->addVariant(clone $entity);
            }
            foreach($oldDepartments as $entity)
            {
                $this->addDepartment(clone $entity);
            }
            foreach($oldDescriptions as $entity)
            {
                $this->addDescription(clone $entity);
            }
            foreach($oldLinks as $entity)
            {
                $this->addLink(clone $entity);
            }
            foreach($oldImages as $entity)
            {
                $this->addImage(clone $entity);
            }
            foreach($oldDocuments as $entity)
            {
                $this->addDocument(clone $entity);
            }
        }
    }

    public function __toString()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions->first()->getHeader();
        } else {
            return "";
        }
    }

    public function getPriceRange()
    {
        $lowestPrice = -1;
        $highestPrice = -1;

        foreach ($this->getVariants() as $variant)
        {
            foreach ($variant->getPrices() as $price) {
                if ($lowestPrice === -1 || $price->getListPrice() < $lowestPrice) {
                    $lowestPrice = $price->getListPrice();
                }
                if ($highestPrice === -1 || $price->getListPrice() > $highestPrice) {
                    $highestPrice = $price->getListPrice();
                }
            }
        }

        return array(
            'low' => $lowestPrice,
            'high' => $highestPrice,
        );
    }

    public function getRecommendedRetailPriceRange()
    {
        $lowestPrice = -1;
        $highestPrice = -1;

        foreach ($this->getVariants() as $variant)
        {
            foreach ($variant->getPrices() as $price) {
                if ($lowestPrice === -1 || $price->getRecommendedRetailPrice() < $lowestPrice) {
                    $lowestPrice = $price->getRecommendedRetailPrice();
                }
                if ($highestPrice === -1 || $price->getRecommendedRetailPrice() > $highestPrice) {
                    $highestPrice = $price->getRecommendedRetailPrice();
                }
            }
        }

        return array(
            'low' => $lowestPrice,
            'high' => $highestPrice,
        );
    }

    public function getProductCode()
    {
        // Calculate common product code
        $pl = 0;
        $n = count($this->getVariants());
        $l = strlen($this->getVariants()->first()->getProductCode());
        while ($pl < $l) {
            $c = $this->getVariants()->first()->getProductCode()[$pl];
            for ($i=1; $i<$n; $i++) {
                if ($this->getVariants()[$i] && $this->getVariants()[$i]->getProductCode()[$pl] !== $c) break 2;
            }
            $pl++;
        }
        $productCode = substr($this->getVariants()->first()->getProductCode(), 0, $pl);

        if($productCode === '')
        {
            return $this->getVariants()->first()->getProductCode();
        } else {
            return $productCode;
        }
    }

    public function isDeleted()
    {
        return $this->getDeletedAt() !== null;
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
     * @return Product
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
     * Set availableForPurchase
     *
     * @param boolean $availableForPurchase
     * @return Product
     */
    public function setAvailableForPurchase($availableForPurchase)
    {
        $this->availableForPurchase = $availableForPurchase;

        return $this;
    }

    /**
     * Get availableForPurchase
     *
     * @return boolean
     */
    public function getAvailableForPurchase()
    {
        return $this->availableForPurchase;
    }

    /**
     * Set featureComparison
     *
     * @param boolean $featureComparison
     * @return Product
     */
    public function setFeatureComparison($featureComparison)
    {
        $this->featureComparison = $featureComparison;

        return $this;
    }

    /**
     * Get featureComparison
     *
     * @return boolean
     */
    public function getFeatureComparison()
    {
        return $this->featureComparison;
    }

    /**
     * Set downloadable
     *
     * @param boolean $downloadable
     * @return Product
     */
    public function setDownloadable($downloadable)
    {
        $this->downloadable = $downloadable;

        return $this;
    }

    /**
     * Get downloadable
     *
     * @return boolean
     */
    public function getDownloadable()
    {
        return $this->downloadable;
    }

    /**
     * Set specialOffer
     *
     * @param boolean $specialOffer
     * @return Product
     */
    public function setSpecialOffer($specialOffer)
    {
        $this->specialOffer = $specialOffer;

        return $this;
    }

    /**
     * Get specialOffer
     *
     * @return boolean
     */
    public function getSpecialOffer()
    {
        return $this->specialOffer;
    }

    /**
     * Set recommended
     *
     * @param boolean $recommended
     * @return Product
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;

        return $this;
    }

    /**
     * Get recommended
     *
     * @return boolean
     */
    public function getRecommended()
    {
        return $this->recommended;
    }

    /**
     * Set accessory
     *
     * @param boolean $accessory
     * @return Product
     */
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;

        return $this;
    }

    /**
     * Get accessory
     *
     * @return boolean
     */
    public function getAccessory()
    {
        return $this->accessory;
    }

    /**
     * Set new
     *
     * @param boolean $new
     * @return Product
     */
    public function setNew($new)
    {
        $this->new = $new;

        return $this;
    }

    /**
     * Get new
     *
     * @return boolean
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * Set sampleRequest
     *
     * @param boolean $sampleRequest
     * @return Product
     */
    public function setSampleRequest($sampleRequest)
    {
        $this->sampleRequest = $sampleRequest;

        return $this;
    }

    /**
     * Get sampleRequest
     *
     * @return boolean
     */
    public function getSampleRequest()
    {
        return $this->sampleRequest;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @return Product
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
     * Set brand
     *
     * @param \KAC\SiteBundle\Entity\Brand $brand
     * @return Product
     */
    public function setBrand(\KAC\SiteBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \KAC\SiteBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Add departments
     *
     * @param \KAC\SiteBundle\Entity\ProductToDepartment $departments
     * @return Product
     */
    public function addDepartment(\KAC\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments[] = $departments;
        $departments->setProduct($this);

        return $this;
    }

    /**
     * Remove departments
     *
     * @param \KAC\SiteBundle\Entity\ProductToDepartment $departments
     */
    public function removeDepartment(\KAC\SiteBundle\Entity\ProductToDepartment $departments)
    {
        $this->departments->removeElement($departments);
    }

    /**
     * Get departments
     *
     * @return ProductToDepartment[]
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * Get description
     *
     * @return \KAC\SiteBundle\Entity\ProductToDepartment
     */
    public function getDepartment()
    {
        if(count($this->departments) > 0)
        {
            return $this->departments->first();
        }

        return null;
    }

    /**
     * Add links
     *
     * @param \KAC\SiteBundle\Entity\Product\Link $link
     * @return Product
     */
    public function addLink(\KAC\SiteBundle\Entity\Product\Link $link)
    {
        $link->setProduct($this);
        $this->links[] = $link;


        return $this;
    }

    /**
     * Remove links
     *
     * @param \KAC\SiteBundle\Entity\Product\Link $links
     */
    public function removeLink(\KAC\SiteBundle\Entity\Product\Link $links)
    {
        $this->links->removeElement($links);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Set links
     *
     * @param \Doctrine\Common\Collections\Collection $links
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    public function getCheaperAlternative()
    {
        $cheapestPrice = 0;
        $cheaperAlternative = null;
        foreach ($this->links as $link)
        {
            if ($link->getLinkType() == 'cheaper')
            {
                if (!$cheaperAlternative)
                {
                    $cheaperAlternative = $link->getLinkedProduct();
                    $cheapestPrice = $cheaperAlternative->getPriceRange();
                    $cheapestPrice = $cheapestPrice['low'];
                } else {
                    $cheaperAlternativeToCheck = $link->getLinkedProduct();
                    $cheapestPriceToCheck = $cheaperAlternativeToCheck->getPriceRange();
                    $cheapestPriceToCheck = $cheapestPriceToCheck['low'];
                    if ($cheapestPriceToCheck < $cheapestPrice)
                    {
                        $cheaperAlternative = $cheaperAlternativeToCheck;
                        $cheapestPrice = $cheapestPriceToCheck;
                    }
                }
            }
        }
        return $cheaperAlternative;
    }

    /**
     * Add variants
     *
     * @param Variant $variants
     * @return Product
     */
    public function addVariant(Variant $variants)
    {
        $this->variants[] = $variants;
        $variants->setProduct($this);

        return $this;
    }

    /**
     * Remove variants
     *
     * @param Variant $variants
     */
    public function removeVariant(Variant $variants)
    {
        $this->variants->removeElement($variants);
    }

    /**
     * Get variants
     *
     * @return Variant[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * set variants
     *
     * @param $variants Variant[]
     * @return $this
     */
    public function setVariants($variants)
    {
        $this->variants = $variants;

        return $this;
    }

    /**
     * Get variant
     *
     * @return Product\Variant
     */
    public function getVariant()
    {
        if(count($this->variants) > 0)
        {
            return $this->variants->first();
        }

        return null;
    }

    /**
     * Add descriptions
     *
     * @param \KAC\SiteBundle\Entity\Product\Description $descriptions
     * @return Product
     */
    public function addDescription(\KAC\SiteBundle\Entity\Product\Description $descriptions)
    {
        $this->descriptions[] = $descriptions;
        $descriptions->setProduct($this);

        return $this;
    }

    /**
     * Remove descriptions
     *
     * @param \KAC\SiteBundle\Entity\Product\Description $descriptions
     */
    public function removeDescription(\KAC\SiteBundle\Entity\Product\Description $descriptions)
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
     * @return Product\Description
     */
    public function getDescription()
    {
        if(count($this->descriptions) > 0)
        {
            return $this->descriptions->first();
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
     * Set template
     *
     * @param string $template
     * @return Product
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

    /**
     * Get routing
     *
     * @return Product\Routing
     */
    public function getRouting($ignoreVariant=false)
    {
        if (count($this->routings) > 0)
        {
            return $this->routings->first();
        }
        if($this->getVariant() && !$ignoreVariant)
        {
            return $this->getVariant()->getRouting();
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
     * Add routing
     *
     * @param Product\Routing $routing
     * @return Product
     */
    public function addRouting(Product\Routing $routing)
    {
        $this->routings[] = $routing;
        $routing->setProduct($this);
    
        return $this;
    }

    /**
     * Remove routing
     *
     * @param Product\Routing $routing
     */
    public function removeRouting(Product\Routing $routing)
    {
        $this->routings->removeElement($routing);
    }

    /**
     * Get routing
     *
     * @return Product\Routing[]
     */
    public function getRoutings()
    {
        return $this->routings;
    }

    /**
     * Get image
     *
     * @return \KAC\SiteBundle\Entity\Product\Image
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
     * @param \KAC\SiteBundle\Entity\Product\Image $images
     * @return Product
     */
    public function addImage(\KAC\SiteBundle\Entity\Product\Image $images)
    {
        $this->images[] = $images;
        $images->setProduct($this);

        return $this;
    }

    /**
     * Remove images
     *
     * @param \KAC\SiteBundle\Entity\Product\Image $images
     */
    public function removeImage(\KAC\SiteBundle\Entity\Product\Image $images)
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
     * @return \KAC\SiteBundle\Entity\Product\Document
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
     * @param \KAC\SiteBundle\Entity\Product\Document $documents
     * @return Product
     */
    public function addDocument(\KAC\SiteBundle\Entity\Product\Document $documents)
    {
        $this->documents[] = $documents;
        $documents->setProduct($this);

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \KAC\SiteBundle\Entity\Product\Document $documents
     */
    public function removeDocument(\KAC\SiteBundle\Entity\Product\Document $documents)
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

    public function getFeatures()
    {
        return $this->features;
    }

    public function setFeatures($featureGroups)
    {
        $this->features = $featureGroups;
    }

    public function addFeatureGroup(Product\VariantToFeature $featureGroup)
    {
        $this->features[] = $featureGroup;
    }

    public function removeFeatureGroup($featureGroup)
    {
        $key = array_search($featureGroup, $this->features);
        if($key)
        {
            unset($this->features[$key]);
        }
    }

    /**
     * @return ProductToDepartment
     */
    public function getMainDepartment()
    {
        return $this->mainDepartment;
    }

    /**
     * @param ProductToDepartment $mainDepartment
     */
    public function setMainDepartment($mainDepartment)
    {
        $this->mainDepartment = $mainDepartment;
    }

}