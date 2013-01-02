<?php
namespace WebIllumination\SiteBundle\Manager;

use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
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

        return $product;
    }

    public function updateDescription(Product\Description $description)
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

    public function addBlankImage(Product $product)
    {
        if(!$product->getDescription()) return;

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

        $this->doctrine->getManager()->persist($image);
        $this->doctrine->getManager()->flush();
    }

    public function addRoute(Product $product)
    {
        $url = $this->seoManager->createUrl($product->getDescription()->getPageTitle(), '');

        $route = new Routing();
        $route->setObjectId($product->getId());
        $route->setObjectType('product');
        $route->setLocale('en');
        $route->setUrl($url);

        $this->doctrine->getManager()->persist($route);
        $this->doctrine->getManager()->flush();
    }
}