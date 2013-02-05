<?php
namespace WebIllumination\SiteBundle\Manager;

use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Entity\ProductToFeature;
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

        $product->addDescription(new Product\Description());
        $product->addDepartment(new ProductToDepartment());
        $product->addPrice(new Product\Price());

        $product->addFeatureGroup(new ProductToFeature());

        return $product;
    }

    public function updateProductDescription(Product\Description $description)
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

    public function updateVariantDescription(Product\VariantDescription $description)
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
     * Add a blank image to the product. If the product already has an image then no image is added
     *
     * @param \WebIllumination\SiteBundle\Entity\Product $product
     */
    public function addBlankImage(Product $product)
    {
        $em = $this->doctrine->getManager();

        if($product->getDescription() || count($em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findAll()) === 0)
        {
            $image = new Image();
            $image->setLocale('en');
            $image->setTitle($product->getDescription()->getHeader());
            $image->setAlignment('');
            $image->setDescription('');
            $image->setLink('');
            $image->setObjectType('product');
            $image->setImageType('product');
            $image->setObjectId($product->getId());
            $image->setDisplayOrder(1);
            $image->setOriginalPath('/uploads/images/product/product/no-image-large.jpg');
            $image->setThumbnailPath('/uploads/images/product/product/no-image-thumbnail.jpg');
            $image->setMediumPath('/uploads/images/product/product/no-image-medium.jpg');
            $image->setLargePath('/uploads/images/product/product/no-image-large.jpg');

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