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
        if($document)
        {
            $query->addDocument($document);
            $query->addCommit();
            $this->getSolarium()->update($query);
        }
    }

    public function createDocument(\Solarium_Query_Update $query, Product $product)
    {
        // If product does not contain all the required fields ignore it
        if (count($product->getDescriptions()) === 0) {
            return null;
        }

        $helper = $query->getHelper();
        $document = $query->createDocument();

        $lowestPrice = -1;
        $highestPrice = -1;
        $lowestRrp = -1;
        $highestRrp = -1;
        $commonFeatures = array();

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        // Fetch images
        $images = $em->getRepository('KAC\SiteBundle\Entity\Product\Image')->findBy(array(
            'product' => $product->getId(),
        ));

        // Fetch linked products
        $links = $em->getRepository('KAC\SiteBundle\Entity\Product\Link')->findBy(array(
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
        if (count($images) > 0) {
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

        foreach ($product->getDepartments() as $department)
        {
            $document->addField('department_ids', $this->getProperty($department, 'department.id'));
            $document->addField('department', $this->getProperty($department, 'department.description.name', ''));

            // Get path
            $departmentNamesPath = "";
            $currDepartment = $department->getDepartment();
            do {
                $departmentNamesPath = $currDepartment . "|" . $departmentNamesPath;
                if ($currDepartment)
                {
                    $currDepartment = $currDepartment->getParent();
                }
            } while ($currDepartment !== null);
            $document->addField("department_path", ltrim(rtrim($departmentNamesPath, "|"), "|"));
        }

        $cheaperAlternative = false;
        foreach ($links as $link)
        {
            if ($link->getLinkType() == 'cheaper')
            {
                $cheaperAlternative = true;
            }
        }
        $document->setField('cheaper_alternative', $cheaperAlternative);

        // Generate the product URL
        if($product->getRouting()) {
            $document->setField('url', $product->getRouting()->getUrl());
        }
        if ($product->getDepartments()->first())
        {
            if ($product->getDepartments()->first()->getDepartment())
            {
                $departmentToFeatures = $em->createQuery("SELECT dtf FROM KAC\SiteBundle\Entity\DepartmentToFeature dtf WHERE dtf.department = ?1 ORDER BY dtf.displayOrder ASC")
                    ->setParameter(1, $product->getDepartments()->isEmpty() ? 0 : $product->getDepartments()->first()->getDepartment()->getId())
                    ->getResult();
            }
        }

        /** @var $variant Product\Variant */
        // Add product codes from each variant
        $numVariants = 0;
        foreach ($product->getVariants() as $variant)
        {
            if ($variant)
            {
                // Check that the variant is not disabled
                $numVariants++;

                $document->addField('variant_ids', $variant->getId());

                // Add all product codes
                if ($variant->getAlternativeProductCodes())
                {
                    $productCodes = $variant->getAlternativeProductCodes();
                    if (is_array($productCodes))
                    {
                        array_unshift($productCodes, $variant->getProductCode());
                        foreach ($productCodes as $productCode) {
                            if (!empty($productCode)) {
                                $document->addField('product_code', $productCode);
                            }
                        }
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
                    if ($lowestRrp === -1 || $price->getRecommendedRetailPrice() < $lowestRrp) {
                        $lowestRrp = $price->getRecommendedRetailPrice();
                    }
                    if ($highestRrp === -1 || $price->getRecommendedRetailPrice() > $highestRrp) {
                        $highestRrp = $price->getRecommendedRetailPrice();
                    }
                    $document->addField('list_prices', $price->getListPrice());
                    $document->addField('rrps', $price->getRecommendedRetailPrice());
                }

                // Add all features
                /** @var $feature VariantToFeature */
                foreach ($variant->getFeatures() as $feature)
                {
                    if ($feature && $feature->getFeatureGroup() && $feature->getFeature())
                    {
                        $document->addField(
                            $helper->escapeTerm(trim(preg_replace("/(&#?[a-z0-9]{2,8};)|(\s)/i","", htmlentities('attr_feature_'.$feature->getFeatureGroup()->getName())))),
                            $feature->getFeature()->getName()
                        );
                    }
                }

                // Get the common features
                if ($departmentToFeatures)
                {
                    foreach ($departmentToFeatures as $departmentToFeature)
                    {
                        foreach ($variant->getFeatures() as $feature)
                        {
                            // Check for common features
                            if ($departmentToFeature)
                            {
                                if ($departmentToFeature->getDisplayOnListing())
                                {
                                    if ($departmentToFeature->getFeatureGroup()->getId() == $feature->getFeatureGroup()->getId())
                                    {
                                        if ($feature->getFeatureGroup() && $feature->getFeature())
                                        {
                                            if (!array_key_exists($feature->getFeatureGroup()->getName(), $commonFeatures))
                                            {
                                                $commonFeatures[$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                                            } else if ($commonFeatures[$feature->getFeatureGroup()->getName()] != $feature->getFeature()->getName()) {
                                                unset ($commonFeatures[$feature->getFeatureGroup()->getName()]);
                                            }
                                        }
                                    }
                                }
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
                $document->setField('low_rrp', $lowestRrp === -1 ? 0 : $lowestRrp);
                $document->setField('high_rrp', $highestRrp === -1 ? 0 : $highestRrp);
            }
        }

        // Add the common features to the document
        foreach(array_keys($commonFeatures) as $commonFeature)
        {
            $document->addField('features', $commonFeature);
        }

        // Add the brand logo
        $document->setField('brand_logo', $this->getProperty($product, 'brand.description.logoImage.originalPath'));

        // If there were no variants then do not create document
        if($numVariants == 0)
        {
            return null;
        }

        return $document;
    }

    /**
     * @param Product $product
     */
    public function delete($product = null)
    {
        if($product !== null && $product->getId() !== null)
        {
            $this->deleteById($product->getId());
        } else {
            $this->deleteById(null);
        }
    }

    public function deleteById($productId=null)
    {
        $delete = $this->getSolarium()->createUpdate();
        if($productId !== null)
        {
            $delete->addDeleteById($productId);
        } else {
            $delete->addDeleteQuery("*:*");
        }
        $delete->addCommit();

        $this->getSolarium()->update($delete);
    }
}
