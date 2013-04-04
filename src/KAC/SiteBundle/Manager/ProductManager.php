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
use KAC\SiteBundle\Manager\Templating\ProductTemplateBuilder;
use KAC\SiteBundle\Manager\Templating\TemplateBuilder;
use KAC\SiteBundle\Manager\Templating\VariantTemplateBuilder;

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

        // Get objects
        $brand = $description->getProduct()->getBrand();
        $department = $description->getProduct()->getDepartment()->getDepartment();

        $builder = new ProductTemplateBuilder($this->doctrine->getManager());
        $pageTitle = $builder->buildString($description, $department->getDescription()->getPageTitleTemplate());
        $header = $builder->buildString($description, $department->getDescription()->getHeaderTemplate());
        $metaDescription = $builder->buildString($description, $department->getDescription()->getMetaDescriptionTemplate());

        /* @var \KAC\SiteBundle\Entity\Department $department*/

        if($brand && $department)
        {
            $metaKeywords = $description->getProduct()->getProductCode();

            if ($brand->getDescription())
            {
                $metaKeywords .= ' '.$brand->getDescription()->getName();
            }
            if ($department->getDescription())
            {
                $metaKeywords .= ' '.$department->getDescription()->getName();
            }

            $description->setName($pageTitle);
            $description->setPageTitle($pageTitle);
            $description->setHeader($header);
            $description->setMetaDescription($metaDescription);
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

        $builder = new VariantTemplateBuilder($this->doctrine->getManager());
        $pageTitle = $builder->buildString($description, $department->getDescription()->getPageTitleTemplate());
        $header = $builder->buildString($description, $department->getDescription()->getHeaderTemplate());
        $metaDescription = $builder->buildString($description, $department->getDescription()->getMetaDescriptionTemplate());

        if($brand && $department)
        {
            $metaKeywords = $description->getVariant()->getProductCode();

            if ($brand->getDescription())
            {
                $metaKeywords .= ' '.$brand->getDescription()->getName();
            }
            if ($department->getDescription())
            {
                $metaKeywords .= ' '.$department->getDescription()->getName();
            }

            $description->setName($pageTitle);
            $description->setPageTitle($pageTitle);
            $description->setHeader($header);
            $description->setMetaDescription($metaDescription);
            $description->setMetaKeywords($this->seoManager->generateKeywords($metaKeywords));
            $description->setShortDescription($this->seoManager->shortenContent($description->getDescription(), 160));
        }
    }
}