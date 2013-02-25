<?php
namespace WebIllumination\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use WebIllumination\SiteBundle\Entity\Product\Variant\Description as VariantDescription;
use WebIllumination\SiteBundle\Entity\Product\Description as ProductDescription;
use WebIllumination\SiteBundle\Entity\Product\Price;
use WebIllumination\SiteBundle\Entity\Product\VariantToFeature;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Entity\Routing;

class ProductManager extends Manager
{
    private $seoManager;

    public function __construct($doctrine, SeoManager $seoManager)
    {
        parent::__construct($doctrine);

        $this->seoManager = $seoManager;
    }

    public function createProduct()
    {
        $product = new Product();

        $product->addDescription(new ProductDescription());
        $product->addDepartment(new ProductToDepartment());
        $product->addPrice(new Price());

        $product->addFeatureGroup(new VariantToFeature());

        return $product;
    }

    /**
     * Create a new product variant
     * @param Product $product the parent product
     * @return \WebIllumination\SiteBundle\Entity\Product\Variant
     */
    public function createVariant(Product $product)
    {
        $variant = new Variant();

        $variant->setProductCode($product->getProductCode());
        $variant->setProduct($product);
        $variant->addDescription(new VariantDescription());
        $variant->addPrice(new Product\Price());

        return $variant;
    }

    public function updateProductDescription(ProductDescription $description)
    {
        if(!$description->getProduct()) return;

        /* @var \WebIllumination\SiteBundle\Entity\Department $department*/
        $brand = $description->getProduct()->getBrand();
        $department = $description->getProduct()->getDepartment()->getDepartment();

        if($brand && $department)
        {
            $pageTitle = $description->getProduct()->getProductCode();
            $header = $description->getProduct()->getProductCode();
            $metaKeywords = $description->getProduct()->getProductCode();

            if ($brand->getDescription())
            {
                $pageTitle = $brand->getDescription()->getName().' '.$pageTitle;
                $header = $brand->getDescription()->getName().' '.$header;
                $metaKeywords .= ' '.$brand->getDescription()->getName();
            }
            if ($department->getDescription())
            {
                $pageTitle .= ' '.$department->getDescription()->getName();
                $header .= ' '.$department->getDescription()->getName();
                $metaKeywords .= ' '.$department->getDescription()->getName();
            }

            $description->setName($pageTitle);
            $description->setPageTitle($pageTitle);
            $description->setHeader($header);
            $description->setMetaKeywords($this->seoManager->generateKeywords($metaKeywords));
            $description->setShortDescription($this->seoManager->shortenContent($description->getDescription(), 160));
        }
    }

    public function updateVariantDescription(VariantDescription $description)
    {
        if(!$description->getVariant()) return;

        /* @var \WebIllumination\SiteBundle\Entity\Department $department*/
        $brand = $description->getVariant()->getProduct()->getBrand();
        $department = $description->getVariant()->getProduct()->getDepartment()->getDepartment();

        if($brand && $department)
        {
            $pageTitle = $description->getVariant()->getProductCode();
            $header = $description->getVariant()->getProductCode();
            $metaKeywords = $description->getVariant()->getProductCode();

            if ($brand->getDescription())
            {
                $pageTitle = $brand->getDescription()->getName().' '.$pageTitle;
                $header = $brand->getDescription()->getName().' '.$header;
                $metaKeywords .= ' '.$brand->getDescription()->getName();
            }
            if ($department->getDescription())
            {
                $pageTitle .= ' '.$department->getDescription()->getName();
                $header .= ' '.$department->getDescription()->getName();
                $metaKeywords .= ' '.$department->getDescription()->getName();
            }

            $description->setName($pageTitle);
            $description->setPageTitle($pageTitle);
            $description->setHeader($header);
            $description->setMetaKeywords($this->seoManager->generateKeywords($metaKeywords));
            $description->setShortDescription($this->seoManager->shortenContent($description->getDescription(), 160));
        }
    }

    /**
     * Add a blank image to the variant. If the variant already has an image then no image is added
     *
     * @param \WebIllumination\SiteBundle\Entity\Product\Variant $variant
     */
    public function addBlankImage(Variant $variant)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        if(count($em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findBy(array(
            'objectType' => 'variant',
            'imageType' => 'variant',
            'objectId' => $variant->getId()
        ))) === 0)
        {
            $image = new Image();
            $image->setLocale('en');
            $image->setTitle($variant->getDescription()->getHeader());
            $image->setAlignment('');
            $image->setDescription('');
            $image->setLink('');
            $image->setObjectType('variant');
            $image->setImageType('variant');
            $image->setObjectId($variant->getId());
            $image->setDisplayOrder(1);
            $image->setOriginalPath('/images/no-image.jpg');
            $image->setPublicPath('/images/no-image.jpg');
            $em->persist($image);
            $em->flush();
        }
    }

    /**
     * Add a new route to the routing table. If the URL already exists in the table it is not added
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     */
    public function addRoute(Product $product)
    {
        $em = $this->doctrine->getManager();
        $url = $this->seoManager->createUrl($product->getDescription()->getPageTitle(), '');

        if(count($em->getRepository('WebIllumination\SiteBundle\Entity\Routing')->findBy(array('url' => $url))) === 0)
        {
            $route = new Routing();
            $route->setObjectId($product->getId());
            $route->setObjectType('product');
            $route->setLocale('en');
            $route->setUrl($url);

            $em->persist($route);
            $em->flush();
        }
    }
}