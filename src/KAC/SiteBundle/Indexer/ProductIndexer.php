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
        try {
            // If product does not contain all the required fields ignore it
            if (count($product->getDescriptions()) === 0) {
                return;
            }

            // Check that the product is not disabled
            if ($product->getStatus() !== "a") {
                return;
            }

            $update = $this->getSolarium()->createUpdate();
            $helper = $update->getHelper();
            $document = $update->createDocument();

            $lowestPrice = -1;
            $highestPrice = -1;
            $commonFeatures = array();
            $descriptions = $product->getDescriptions();

            /**
             * @var $em EntityManager
             */
            $em = $this->getDoctrine()->getManager();

            // Fetch images
            $images = $em->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array(
                'objectId' => $product->getId(),
                'objectType' => 'product',
                'imageType' => 'product',
            ));

            $document->setField('id', $product->getId());
            $document->setField('brand_id', $product->getBrand()->getId());
            $document->setField('isDeleted', $product->getDeletedAt() !== null);

            foreach ($product->getDepartments() as $department) {
                $document->addField('department_ids', $department->getDepartment()->getId());
                $departmentDescriptions = $department->getDepartment()->getDescriptions();
                $document->addField('department', count($departmentDescriptions) > 0 ? $departmentDescriptions[0]->getName() : "");

                // Get path
                $departmentNamesPath = "";
                $currDepartment = $department->getDepartment();
                do {
                    $departmentNamesPath = $currDepartment->__toString() . "|" . $departmentNamesPath;
                    $currDepartment = $currDepartment->getParent();
                } while ($currDepartment !== null);
                $document->addField("department_path", ltrim(rtrim($departmentNamesPath, "|"), "|"));
            }

            $document->setField('status', $product->getStatus());
            $document->setField('locale', $descriptions[0]->getLocale());
            $document->setField('tagline', $descriptions[0]->getTagline());
            $document->setField('header', $descriptions[0]->getHeader());
            $document->setField('page_title', $descriptions[0]->getPageTitle());
            $document->setField('short_description', $descriptions[0]->getShortDescription());
            $document->setField('tagline', $descriptions[0]->getTagline());
            $document->setField('variants_count', count($product->getVariants()));

            // Generate the product URL
            if($product->getRouting()) {
                $document->setField('url', $product->getRouting()->getUrl());
            }

            // Add product code from the product
            $productCodes = explode(',', $product->getAlternativeProductCodes());
            array_unshift($productCodes, $product->getProductCode());
            foreach ($productCodes as $productCode) {
                if (!empty($productCode)) {
                    $document->addField('product_code', $productCode);
                }
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
                $variantImages = $em->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array(
                    'objectId' => $variant->getId(),
                    'objectType' => 'variant',
                    'imageType' => 'variant',
                ));

                if(count($variantImages) > 0) {
                    $document->setField("variant_image_paths", $variantImages[0]->getPublicPath());
                }

                $document->setField('low_price', $lowestPrice === -1 ? 0 : $lowestPrice);
                $document->setField('high_price', $highestPrice === -1 ? 0 : $highestPrice);
            }

            // Add the common features to the document
            foreach(array_keys($commonFeatures) as $commonFeature)
            {
                $document->addField('features', $commonFeature);
            }

            // Add the image for the variant
            if(count($images) > 0) {
                $document->setField("image_path", $images[0]->getPublicPath());
            }

            foreach (explode(',', $descriptions[0]->getSearchWords()) as $searchWord) {
                $document->addField('search_words', $searchWord);
            }

            $document->setField('brand', $product->getBrand()->getDescription()->getName());
            $document->setField('brand_logo', $product->getBrand()->getDescription()->getLogoImage()->getOriginalPath());

            $document->setField('available_for_purchase', $product->getAvailableForPurchase());
            $document->setField('hide_price', $product->getHidePrice());
            $document->setField('show_price_out_of_hours', $product->getShowPriceOutOfHours());
            $document->setField('membership_discount_available', $product->getMembershipCardDiscountAvailable());
            $document->setField('membership_maximum_discount', $product->getMaximumMembershipCardDiscount());
            $document->setField('feature_comparison', $product->getFeatureComparison());
            $document->setField('download', $product->getDownloadable());
            $document->setField('available_for_purchase', $product->getAvailableForPurchase());
            $document->setField('special_offer', $product->getSpecialOffer());
            $document->setField('recommended', $product->getRecommended());
            $document->setField('accessory', $product->getAccessory());
            $document->setField('new', $product->getNew());

            $document->setField('delivery_cost', $product->getDeliveryCost());

            $document->setField('created_at', $helper->formatDate($product->getCreatedAt()));
            $document->setField('updated_at', $helper->formatDate($product->getUpdatedAt()));

            $update->addDocument($document);
            $update->addCommit();
            $this->getSolarium()->update($update);
        } catch (\Exception $e) {
            \Doctrine\Common\Util\Debug::dump($e->getMessage());
            echo "An error occured proccessing product ID " . $product->getId() . "\n";
        }
    }

    /**
     * @param Product $product
     */
    function delete($product = null)
    {
        $delete = $this->getSolarium()->createUpdate();
        $delete->addDeleteQuery(null !== $product ? 'id:' . $product->getId() : '*:*');
        $delete->addCommit();

        $this->getSolarium()->update($delete);
    }
}
