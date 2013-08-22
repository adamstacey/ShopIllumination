<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product\Variant\Description as VariantDescription;
use KAC\SiteBundle\Entity\Product\Description as ProductDescription;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Variant;
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

    public function updateProduct(Product $product)
    {
        // Update the variants
        foreach ($product->getVariants() as $variant)
        {
            // Update the variant descriptions
            if (count($variant->getDescriptions()) === 0)
            {
                $variantDescription = new VariantDescription();
                $variantDescription->setVariant($variant);
                $variant->addDescription($variantDescription);
            }
            foreach ($variant->getDescriptions() as $variantDescription)
            {
                $this->updateVariantDescription($variantDescription);
            }
        }

        // Update the product descriptions
        if (count($product->getDescriptions()) === 0)
        {
            $productDescription = new ProductDescription();
            $productDescription->setProduct($product);
            $product->addDescription($productDescription);
        }
        foreach ($product->getDescriptions() as $productDescription)
        {
            $this->updateProductDescription($productDescription);
        }
    }

    public function updateProductDescription(ProductDescription $productDescription)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        $product = $productDescription->getProduct();
        if (!$product) return;

        // Check if we should automatically update the description
        if ($productDescription->getOverride()) return;

        $pageTitle = $this->getCommonPageTitle($product);
        $header = $this->getCommonHeader($product);
        $metaDescription = $this->getCommonMetaDescription($product);
        $metaKeywords = $this->seoManager->generateKeywords($pageTitle);

        // Update the description
        $productDescription->setPageTitle($pageTitle);
        $productDescription->setHeader($header);
        $productDescription->setMetaDescription($metaDescription);
        $productDescription->setMetaKeywords($metaKeywords);
    }

    public function updateVariantDescription(VariantDescription $variantDescription)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        $variant = $variantDescription->getVariant();
        if (!$variant) return;

        // Check if we should automatically update the description
        if ($variantDescription->getOverride()) return;

        // Get the department
        $department = $variantDescription->getVariant()->getProduct()->getDepartment()->getDepartment();

        if ($department)
        {
            // Get the SEO data from the department templates
            $defaultTitleTemplate = 'brand^productCode^department^extraKeywords';
            $defaultHeaderTemplate = 'brand^productCode^department^extraKeywords';
            $defaultMetaDescriptionTemplate = '"Find out more about the amazing "^brand^extraKeywords^department^productCode^"available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."';

            // Get the template builders
            $pageTitleBuilder = new VariantTemplateBuilder($em);
            $headerBuilder = new VariantTemplateBuilder($em);
            $metaDescriptionBuilder = new VariantTemplateBuilder($em);

            // Get the description details
            $pageTitle = $pageTitleBuilder->buildString($variantDescription, $department->getDescription()->getPageTitleTemplate() ? $department->getDescription()->getPageTitleTemplate() : $defaultTitleTemplate);
            $header = $headerBuilder->buildString($variantDescription, $department->getDescription()->getHeaderTemplate() ? $department->getDescription()->getHeaderTemplate() : $defaultHeaderTemplate);
            $metaDescription = $metaDescriptionBuilder->buildString($variantDescription, $department->getDescription()->getMetaDescriptionTemplate() ? $department->getDescription()->getMetaDescriptionTemplate() : $defaultMetaDescriptionTemplate);
            $metaKeywords = $this->seoManager->generateKeywords($pageTitle);

            // Update the URL
            if ($variant->getRouting())
            {
                $previousUrl = $variant->getRouting()->getUrl();
                $url = $this->seoManager->createUrl($pageTitle, $variant->getRouting()->getUrl());
                $variant->getRouting()->setUrl($url);

                // Setup any redirects if required
                if ($previousUrl != $url)
                {
                    $this->seoManager->updateRedirects($variant->getId(), 'product_variant', $previousUrl, $url);
                }
            } else {
                $url = $this->seoManager->createUrl($pageTitle, '');
                $routing = new ProductVariantRouting();
                $routing->setVariant($variant);
                $routing->setUrl($url);
                $variant->addRouting($routing);
            }

            // Update the variant description
            $variantDescription->setPageTitle($pageTitle);
            $variantDescription->setHeader($header);
            $variantDescription->setMetaDescription($metaDescription);
            $variantDescription->setMetaKeywords($metaKeywords);
        }
    }

    public function getCommonPageTitle(Product $product)
    {
        $pageTitles = array();
        foreach ($product->getVariants() as $variant)
        {
            foreach ($variant->getDescriptions() as $variantDescription)
            {
                $pageTitles[] = explode(' ', $variantDescription->getPageTitle());
            }
        }
        if (count($pageTitles) > 1)
        {
            $commonPageTitles = call_user_func_array('array_intersect', $pageTitles);
        } else {
            $commonPageTitles = $pageTitles;
        }
        if (count($commonPageTitles) < 1)
        {
            return;
        }
        $commonPageTitle = join(' ', $commonPageTitles[0]);
        return $commonPageTitle;
    }

    public function getCommonHeader(Product $product)
    {
        $headers = array();
        foreach ($product->getVariants() as $variant)
        {
            foreach ($variant->getDescriptions() as $variantDescription)
            {
                $headers[] = explode(' ', $variantDescription->getHeader());
            }
        }
        if (count($headers) > 1)
        {
            $commonHeaders = call_user_func_array('array_intersect', $headers);
        } else {
            $commonHeaders = $headers;
        }
        if (count($commonHeaders) < 1)
        {
            return;
        }
        $commonHeader = join(' ', $commonHeaders[0]);
        return $commonHeader;
    }

    public function getCommonMetaDescription(Product $product)
    {
        $metaDescriptions = array();
        foreach ($product->getVariants() as $variant)
        {
            foreach ($variant->getDescriptions() as $variantDescription)
            {
                $metaDescriptions[] = explode(' ', $variantDescription->getMetaDescription());
            }
        }
        if (count($metaDescriptions) > 1)
        {
            $commonMetaDescriptions = call_user_func_array('array_intersect', $metaDescriptions);
        } else {
            $commonMetaDescriptions = $metaDescriptions;
        }
        if (count($commonMetaDescriptions) < 1)
        {
            return;
        }
        $commonMetaDescription = join(' ', $commonMetaDescriptions[0]);
        return $commonMetaDescription;
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

    public function updateVariantOrder(Product $product)
    {
        // Sort the variants by product code
        $variantsIterator = $product->getVariants()->getIterator();

        $variantsIterator->uasort(function (Variant $first, Variant $second) {
            return strcmp($first->getProductCode(), $second->getProductCode());
        });
        $product->setVariants(new ArrayCollection($variantsIterator->getArrayCopy()));

        // Update the display order
        $i = 0;
        foreach($product->getVariants() as $variant)
        {
            $variant->setDisplayOrder($i);
            $i++;
        }
    }

    private function checkDuplicateUrl(Routing $route, $baseUrl, &$urls=array(), $n=1)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->doctrine->getManager();

        // Search the new urls for duplicates
        if(in_array($route->getUrl(), $urls))
        {
            $route->setUrl($this->seoManager->generateUrl($route->getUrl().'-'.$n));
            $this->checkDuplicateUrl($route, $baseUrl, $urls, $n + 1);
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
            $this->checkDuplicateUrl($route, $baseUrl, $urls, $n + 1);
            $urls[] = $route->getUrl();
            return;
        }

        $urls[] = $route->getUrl();
    }
}