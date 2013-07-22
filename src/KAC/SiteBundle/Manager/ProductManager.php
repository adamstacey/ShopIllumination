<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product\Variant\Description as VariantDescription;
use KAC\SiteBundle\Entity\Product\Description as ProductDescription;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\Image as ProductImage;
use KAC\SiteBundle\Entity\Product\Variant\Image as ProductVariantImage;
use KAC\SiteBundle\Entity\Product\Document as ProductDocument;
use KAC\SiteBundle\Entity\Product\Variant\Document as ProductVariantDocument;
use KAC\SiteBundle\Entity\Product\Routing as ProductRouting;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Routing;
use KAC\SiteBundle\Manager\Templating\ProductTemplateBuilder;
use KAC\SiteBundle\Manager\Templating\TemplateBuilder;
use KAC\SiteBundle\Manager\Templating\VariantTemplateBuilder;
use KAC\SiteBundle\Entity\Product\Variant\Routing as ProductVariantRouting;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Intl\Intl;

class ProductManager extends Manager
{
    private $seoManager;
    private $imageManager;
    private $documentManager;

    public function __construct($doctrine, SeoManager $seoManager, ImageManager $imageManager, DocumentManager $documentManager)
    {
        parent::__construct($doctrine);

        $this->seoManager = $seoManager;
        $this->imageManager = $imageManager;
        $this->documentManager = $documentManager;
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
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        $product = $description->getProduct();
        if (!$product) return;

        // Check if we should automatically update the description
        if ($description->getOverride()) return;

        // Get objects
        $brand = $description->getProduct()->getBrand();
        $department = $description->getProduct()->getDepartment()->getDepartment();

        // Get the SEO data from the department templates
        $titleTemplate = '^brand ^productCode ^department';
        $descriptionTemplate = '"Find out more about the amazing" ^brand ^productCode ^department "available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."';

        $pageTitleBuilder = new ProductTemplateBuilder($em);
        $headerBuilder = new ProductTemplateBuilder($em);
        $metaDescriptionBuilder = new ProductTemplateBuilder($em);

        $pageTitle = $pageTitleBuilder->buildString($description, $department->getDescription()->getPageTitleTemplate() ? $department->getDescription()->getPageTitleTemplate() : $titleTemplate);
        $header = $headerBuilder->buildString($description, $department->getDescription()->getHeaderTemplate() ? $department->getDescription()->getHeaderTemplate() : $titleTemplate);
        $metaDescription = $metaDescriptionBuilder->buildString($description, $department->getDescription()->getMetaDescriptionTemplate() ? $department->getDescription()->getMetaDescriptionTemplate() : $descriptionTemplate);
        $metaKeywords = $this->seoManager->generateKeywords($pageTitle);

        // Update the description
        $description->setPageTitle($pageTitle);
        $description->setHeader($header);
        $description->setMetaDescription($metaDescription);
        $description->setMetaKeywords($metaKeywords);

        // Update the URL
        if (sizeof($product->getRoutings()) > 0)
        {
            foreach ($product->getRoutings() as $routing)
            {
                if (!$routing->getUrl())
                {
                    $url = $this->seoManager->createUrl($pageTitle);
                    $routing->setUrl($url);
                }
            }
        } else {
            $url = $this->seoManager->createUrl($pageTitle);
            $routing = new ProductRouting();
            $routing->setProduct($product);
            $routing->setLocale($description->getLocale());
            $routing->setUrl($url);
            $product->addRouting($routing);
        }
    }

    public function updateVariantDescription(VariantDescription $description)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

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
            $titleTemplate = '^brand ^productCode ^department';
            $descriptionTemplate = '"Find out more about the amazing" ^brand ^productCode ^department "available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."';

            $pageTitleBuilder = new VariantTemplateBuilder($em);
            $headerBuilder = new VariantTemplateBuilder($em);
            $metaDescriptionBuilder = new VariantTemplateBuilder($em);

            $pageTitle = $pageTitleBuilder->buildString($description, $department->getDescription()->getPageTitleTemplate() ? $department->getDescription()->getPageTitleTemplate() : $titleTemplate);
            $header = $headerBuilder->buildString($description, $department->getDescription()->getHeaderTemplate() ? $department->getDescription()->getHeaderTemplate() : $titleTemplate);
            $metaDescription = $metaDescriptionBuilder->buildString($description, $department->getDescription()->getMetaDescriptionTemplate() ? $department->getDescription()->getMetaDescriptionTemplate() : $descriptionTemplate);
            $metaKeywords = $this->seoManager->generateKeywords($pageTitle);

            // Update the URL
            if (sizeof($variant->getRoutings()) > 0)
            {
                foreach ($variant->getRoutings() as $routing)
                {
                    if (!$routing->getUrl())
                    {
                        $url = $this->seoManager->createUrl($pageTitle);
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
            $description->setMetaKeywords($metaKeywords);
        }
    }

    public function updateImages(Product $product)
    {
        // Update the product images
        $this->imageManager->persistImages($product, 'product');

        // Update variant images
        foreach ($product->getVariants() as $variant)
        {
            $this->updateVariantImages($variant);
        }

        // Remove any temporary product images
        $this->imageManager->removeTemporaryImages($product);

    }

    public function updateDocuments(Product $product)
    {
        // Update the product documents
        $this->documentManager->persistDocuments($product, 'product');

        // Update variant documents
        foreach ($product->getVariants() as $variant)
        {
            $this->updateVariantDocuments($variant);
        }

        // Remove any temporary product documents
        $this->documentManager->removeTemporaryDocuments($product);
    }

    public function updateVariantImages(Variant $variant)
    {
        $this->imageManager->persistImages($variant, 'product_variant');
        $this->imageManager->removeTemporaryImages($variant);
    }

    public function updateVariantDocuments(Variant $variant)
    {
        $this->documentManager->persistDocuments($variant, 'product_variant');
        $this->documentManager->removeTemporaryDocuments($variant);
    }

    public function updateRoutes(Product $product, $removeEmpty=false)
    {
        $urls = array();

        foreach($product->getRoutings() as $route)
        {
            if($route->getUrl() !== '')
            {
                if($removeEmpty)
                {
                    $product->removeRouting($route);
                } else {
                    $this->checkDuplicateUrl($route, $urls);
                }
            }
        }

        foreach($product->getVariants() as $variant)
        {
            foreach($variant->getRoutings() as $route)
            {
                if($route->getUrl() !== '')
                {
                    if($removeEmpty)
                    {
                        $variant->removeRouting($route);
                    } else {
                        $this->checkDuplicateUrl($route, $urls);
                    }
                }
            }
        }
    }

    private function checkDuplicateUrl(Routing $route, &$urls=array(), $n=1)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        // Search the new urls for duplicates
        if(in_array($route->getUrl(), $urls))
        {
            $route->setUrl($this->seoManager->generateUrl($route->getUrl().'-'.$n));
            $this->checkDuplicateUrl($route, $urls, $n + 1);
            $urls[] = $route->getUrl();
            return;
        }

        // Search the database for duplicates
        $qb = $em->createQueryBuilder();
        $qb->addSelect('r.id')
            ->from('KAC\SiteBundle\Entity\Routing', 'r')
            ->where($qb->expr()->eq('r.url', '?1'))
            ->setParameter(1, $route->getUrl());
        if($route->getId())
        {
            $qb->andWhere('r.id != \'?2\'');
            $qb->setParameter(2, $route->getId());
        }
        $duplicateRoutes = $qb->getQuery()
            ->execute();

        if(count($duplicateRoutes) > 0)
        {
            $route->setUrl($this->seoManager->generateUrl($route->getUrl().'-'.($duplicateRoutes+$n)));
            $this->checkDuplicateUrl($route, $urls, $n + 1);
            $urls[] = $route->getUrl();
            return;
        }

        $urls[] = $route->getUrl();
    }
}