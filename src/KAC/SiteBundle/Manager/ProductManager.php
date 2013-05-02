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
use KAC\SiteBundle\Entity\Product\Variant\Routing as ProductVariantRouting;

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
        $product->addRouting(new ProductRouting());

        return $product;
    }

    public function createVariant(Product $product)
    {
        $variant = new Variant();

        $variant->setProduct($product);
        $variant->addDescription(new VariantDescription());
        $variant->addPrice(new Product\Price());
        $variant->addRouting(new ProductVariantRouting());

        return $variant;
    }

    public function updateProductDescription(ProductDescription $description)
    {
        $product = $description->getProduct();
        if (!$product) return;

        // Check if we should automatically update the description
        if ($description->getOverride()) return;

        // Get the product variants
        $variants = $product->getVariants();
        if (sizeof($variants) < 1) return;

        // Go through variants and put together the description data
        if (sizeof($variants) == 1)
        {
            $variant = $product->getVariant();
            foreach ($variant->getDescriptions() as $variantDescription)
            {
                if ($variantDescription->getLocale() == $description->getlocale())
                {
                    $searches = array($variant->getProductCode(), "  ");
                    $replacements = array("", " ");
                    $commonPageTitle = str_replace($searches, $replacements, $variantDescription->getPageTitle());
                    $commonHeader = str_replace($searches, $replacements, $variantDescription->getHeader());
                    $commonMetaDescription = str_replace($searches, $replacements, $variantDescription->getMetaDescription());
                    $commonMetaKeywords = $variantDescription->getMetaKeywords();
                }
            }
        } else {
            $pageTitles = array();
            $headers = array();
            $metaDescriptions = array();
            $metaKeywords = array();
            foreach ($variants as $variant)
            {
                foreach ($variant->getDescriptions() as $variantDescription)
                {
                    if ($variantDescription->getLocale() == $description->getlocale())
                    {
                        $pageTitles[] = explode(' ', $variantDescription->getPageTitle());
                        $headers[] = explode(' ', $variantDescription->getHeader());
                        $metaDescriptions[] = explode(' ', $variantDescription->getMetaDescription());
                        foreach (explode(',', $variantDescription->getMetaKeywords()) as $metaKeyword)
                        {
                            $metaKeywords[] = trim($metaKeyword);
                        }
                    }
                }
            }

            // Get the common data
            $commonPageTitle = implode(' ', call_user_func_array('array_intersect', $pageTitles));
            $commonHeader = implode(' ', call_user_func_array('array_intersect', $headers));
            $commonMetaDescription = implode(' ', call_user_func_array('array_intersect', $metaDescriptions));
            $commonMetaKeywords = implode(', ',array_unique($metaKeywords));
        }

        // Update the description
        $description->setPageTitle($commonPageTitle);
        $description->setHeader($commonHeader);
        $description->setMetaDescription($commonMetaDescription);
        $description->setMetaKeywords($commonMetaKeywords);

        // Update the URL
        if (sizeof($product->getRoutings()) > 0)
        {
            foreach ($product->getRoutings() as $routing)
            {
                if ($routing->getLocale() == $description->getLocale())
                {
                    $url = $this->seoManager->createUrl($commonPageTitle, $routing->getUrl());
                    $routing->setUrl($url);
                }
            }
        } else {
            $url = $this->seoManager->createUrl($commonPageTitle);
            $routing = new ProductRouting();
            $routing->setProduct($product);
            $routing->setLocale($description->getLocale());
            $routing->setUrl($url);
            $product->addRouting($routing);
        }
    }

    public function updateVariantDescription(VariantDescription $description)
    {
        $variant = $description->getVariant();
        if (!$variant) return;

        // Check if we should automatically update the description
        if ($description->getOverride()) return;

        // Get objects
        $brand = $description->getVariant()->getProduct()->getBrand();
        $department = $description->getVariant()->getProduct()->getDepartment()->getDepartment();

        if ($brand && $department)
        {
            // Get the SEO data from the department templates
            $pageTitleBuilder = new VariantTemplateBuilder($this->doctrine->getManager());
            $pageTitle = $pageTitleBuilder->buildString($description, $department->getDescription()->getPageTitleTemplate());
            $headerBuilder = new VariantTemplateBuilder($this->doctrine->getManager());
            $header = $headerBuilder->buildString($description, $department->getDescription()->getHeaderTemplate());
            $metaDescriptionBuilder = new VariantTemplateBuilder($this->doctrine->getManager());
            $metaDescription = $metaDescriptionBuilder->buildString($description, $department->getDescription()->getMetaDescriptionTemplate());

            // Update the URL
            if (sizeof($variant->getRoutings()) > 0)
            {
                foreach ($variant->getRoutings() as $routing)
                {
                    if ($routing->getLocale() == $description->getLocale())
                    {
                        $url = $this->seoManager->createUrl($pageTitle, $routing->getUrl());
                        $routing->setUrl($url);
                    }
                }
            } else {
                $url = $this->seoManager->createUrl($pageTitle);
                $routing = new ProductVariantRouting();
                $routing->setVariant($variant);
                $routing->setLocale($description->getLocale());
                $routing->setUrl($url);
                $variant->addRouting($routing);
            }

            // Update the variant description
            $description->setPageTitle($pageTitle);
            $description->setHeader($header);
            $description->setMetaDescription($metaDescription);
            $description->setMetaKeywords($this->seoManager->generateKeywords($pageTitle));
        }
    }
}