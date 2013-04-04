<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product\Variant\Description as VariantDescription;
use KAC\SiteBundle\Entity\Product\Description as ProductDescription;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\Routing as ProductRouting;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Image;

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
        $product->addRouting(new ProductRouting());

        $product->addFeatureGroup(new VariantToFeature());

        return $product;
    }

    /**
     * Create a new product variant
     * @param Product $product the parent product
     * @return \KAC\SiteBundle\Entity\Product\Variant
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

        \Doctrine\Common\Util\Debug::dump($description->__get("name"));die();
        /* @var \KAC\SiteBundle\Entity\Department $department*/
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

        /* @var \KAC\SiteBundle\Entity\Department $department*/
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
}