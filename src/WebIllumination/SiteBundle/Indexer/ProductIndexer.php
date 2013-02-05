<?php
namespace WebIllumination\SiteBundle\Indexer;

use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

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

            $update = $this->getSolarium()->createUpdate();
            $helper = $update->getHelper();
            $document = $update->createDocument();

            $lowestPrice = -1;
            $highestPrice = -1;

            $descriptions = $product->getDescriptions();

            // Fetch images
            $em = $this->getDoctrine()->getManager();
            $images = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findBy(array(
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
                $document->setField('department', count($departmentDescriptions) > 0 ? $departmentDescriptions[0]->getName() : "");

                // Get path
                $departmentNamesPath = "";
                $currDepartment = $department->getDepartment();
                do {
                    $departmentNamesPath = $currDepartment->__toString() . "|" . $departmentNamesPath;
                    $currDepartment = $currDepartment->getParent();
                } while ($currDepartment !== null);
                $document->addField("department_path", rtrim($departmentNamesPath, "|"));
            }

            $document->setField('status', $product->getStatus());
            $document->setField('locale', $descriptions[0]->getLocale());
            $document->setField('tagline', $descriptions[0]->getTagline());
            $document->setField('header', $descriptions[0]->getHeader());
            $document->setField('page_title', $descriptions[0]->getPageTitle());
            $document->setField('short_description', $descriptions[0]->getShortDescription());
            $document->setField('tagline', $descriptions[0]->getTagline());
            $document->setField('variants_count', count($product->getVariants()));

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
                /** @var $feature ProductToFeature */
                foreach ($variant->getFeatures() as $feature)
                {
                    if($feature && $feature->getProductFeature() && $feature->getDefaultFeature())
                    {
                        $document->addField(
                            $helper->escapeTerm(htmlentities('attr_feature_'.$feature->getProductFeature()->getProductFeatureGroup())),
                            $feature->getDefaultFeature()->getProductFeature()
                        );
                    }
                }

                $document->setField('low_price', $lowestPrice === -1 ? 0 : $lowestPrice);
                $document->setField('high_price', $highestPrice === -1 ? 0 : $highestPrice);
            }

            foreach (explode(',', $descriptions[0]->getSearchWords()) as $searchWord) {
                $document->addField('search_words', $searchWord);
            }
            if (count($images) > 0) {
                $document->setField("thumbnail_path", $images[0]->getThumbnailPath());
                $document->setField("large_image_path", $images[0]->getOriginalPath());
                foreach ($images as $image) {
                    $document->addField("image_paths", $image->getOriginalPath());
                }
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
            die();
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
