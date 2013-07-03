<?php
namespace KAC\SiteBundle\Indexer;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\VariantToFeature;

class ProductIndexer extends Indexer
{
    /**
     * @param Product $product
     */
    function index($product)
    {
        $query = $this->getSolarium()->createUpdate();
        $document = $this->createDocument($query, $product);
        $query->addDocument($document);
        $query->addCommit();
        $this->getSolarium()->update($query);
    }

    public function createDocument(\Solarium_Query_Update $query, Product $product)
    {
        // If product does not contain all the required fields ignore it
        if (count($product->getDescriptions()) === 0) {
            \Doctrine\Common\Util\Debug::dump("Nope1");
            return;
        }

        $helper = $query->getHelper();
        $document = $query->createDocument();

        $lowestPrice = -1;
        $highestPrice = -1;
        $commonFeatures = array();

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        // Fetch    images
        $images = $em->getRepository('KAC\SiteBundle\Entity\Product\Image')->findBy(array(
            'product' => $product->getId(),
        ));

        $document->setField('id', $product->getId());
        $document->setField('brand_id', $product->getBrand()->getId());
        $document->setField('brand', $product->getBrand()->getDescription()->getName());
        $document->setField('status', $product->getStatus());
        $document->setField('locale', $product->getDescription()->getLocale());
        $document->setField('header', $product->getDescription()->getHeader());
        $document->setField('page_title', $product->getDescription()->getPageTitle());
        $document->setField('variants_count', count($product->getVariants()));

        // Add the image for the product
        if(count($images) > 0) {
            $document->setField("thumbnail_path", $images[0]->getPublicPath());
            foreach($images as $image)
            {
                $document->addField("image_paths", $image->getPublicPath());
            }
        }

        $document->setField('available_for_purchase', $product->getAvailableForPurchase());
        $document->setField('feature_comparison', $product->getFeatureComparison());
        $document->setField('download', $product->getDownloadable());
        $document->setField('available_for_purchase', $product->getAvailableForPurchase());
        $document->setField('special_offer', $product->getSpecialOffer());
        $document->setField('recommended', $product->getRecommended());
        $document->setField('accessory', $product->getAccessory());
        $document->setField('new', $product->getNew());

        $document->setField('created_at', $helper->formatDate($product->getCreatedAt()));
        $document->setField('updated_at', $helper->formatDate($product->getUpdatedAt()));
        $document->setField('isDeleted', $product->isDeleted());

        foreach ($product->getDepartments() as $department) {
            $document->addField('department_ids', $this->getProperty($department, 'department.id'));
            $document->addField('department', $this->getProperty($department, 'department.description.name', ''));

            // Get path
            $departmentNamesPath = "";
            $currDepartment = $department->getDepartment();
            do {
                $departmentNamesPath = $currDepartment . "|" . $departmentNamesPath;
                $currDepartment = $currDepartment->getParent();
            } while ($currDepartment !== null);
            $document->addField("department_path", ltrim(rtrim($departmentNamesPath, "|"), "|"));
        }

        // Generate the product URL
        if($product->getRouting()) {
            $document->setField('url', $product->getRouting()->getUrl());
        }

        /** @var $variant Product\Variant */
        // Add product codes from each variant
        foreach ($product->getVariants() as $variant) {
            // Check that the variant is not disabled
            if ($variant->getStatus() !== "a") {
                continue;
            }

            // Add all product codes
            $productCodes = explode(',', $variant->getAlternativeProductCodes());
            array_unshift($productCodes, $variant->getProductCode());
            foreach ($productCodes as $productCode) {
                if (!empty($productCode)) {
                    $document->addField('product_code', $productCode);
                }
            }

            // Add prices
            foreach ($variant->getPrices() as $price) {
                if ($lowestPrice === -1 || $price->getListPrice() < $lowestPrice) {
                    $lowestPrice = $price->getListPrice();
                }
                if ($highestPrice === -1 || $price->getListPrice() > $highestPrice) {
                    $highestPrice = $price->getListPrice();
                }
            }

            // Add all features
            /** @var $feature VariantToFeature */
            foreach ($variant->getFeatures() as $feature)
            {
                if($feature && $feature->getFeatureGroup() && $feature->getFeature())
                {
                    $document->addField(
                        $helper->escapeTerm(htmlentities('attr_feature_'.$feature->getFeatureGroup()->getName())),
                        $feature->getFeature()->getName()
                    );

                    // Fetch the relevant department to feature entity
                    $departmentToFeature = $em->createQuery("
                        SELECT dtf
                        FROM KAC\SiteBundle\Entity\DepartmentToFeature dtf
                        WHERE dtf.featureGroup = ?1 AND dtf.department = ?2")
                        ->setParameter(1, $feature->getFeatureGroup()->getId())
                        ->setParameter(2, $product->getDepartments()->isEmpty() ? 0 : $product->getDepartments()->first()->getDepartment()->getId())
                        ->execute();

                    // Check for common features
                    if($departmentToFeature && count($departmentToFeature) >= 1 && $departmentToFeature[0]->getDisplayOnListing())
                    {
                        if(!array_key_exists($feature->getFeatureGroup()->getName(), $commonFeatures))
                        {
                            $commonFeatures[$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        }
                        else if ($commonFeatures[$feature->getFeatureGroup()->getName()] != $feature->getFeature()->getName())
                        {
                            unset ($commonFeatures[$feature->getFeatureGroup()->getName()]);
                        }
                    }
                }
            }

            // Add the image for the variant
            $variantImages = $em->getRepository('KAC\SiteBundle\Entity\Product\Variant\Image')->findBy(array(
                'variant' => $variant->getId(),
            ));

            if(count($variantImages) > 0) {
                $document->setField("variant_thumbnail_path", $variantImages[0]->getPublicPath());
                foreach($variantImages as $image)
                {
                    $document->addField("variant_image_paths", $image->getPublicPath());
                }
            }

            $document->setField('low_price', $lowestPrice === -1 ? 0 : $lowestPrice);
            $document->setField('high_price', $highestPrice === -1 ? 0 : $highestPrice);
        }

        // Add the common features to the document
        foreach(array_keys($commonFeatures) as $commonFeature)
        {
            $document->addField('features', $commonFeature);
        }

        // Add the brand logo
        $document->setField('brand_logo', $this->getProperty($product, 'brand.description.logoImage.originalPath'));

        return $document;
    }

    /**
     * @param Product $product
     */
    public function delete($product = null)
    {
        $delete = $this->getSolarium()->createUpdate();
        if($product !== null)
        {
            $delete->addDeleteById($product->getId());
        } else {
            $delete->addDeleteQuery("*:*");
        }
        $delete->addCommit();

        $this->getSolarium()->update($delete);
    }
}
