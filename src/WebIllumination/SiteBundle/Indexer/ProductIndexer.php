<?php
namespace WebIllumination\SiteBundle\Indexer;

use WebIllumination\SiteBundle\Entity\Product;

class ProductIndexer extends Indexer
{
    /**
     * @param Product $product
     */
    function index($product)
    {
        // If product does not contain all the required fields ignore it
        if(!$product->getDescription()) {
            return;
        }


        $update = $this->getSolarium()->createUpdate();
        $helper = $update->getHelper();
        $document = $update->createDocument();

        $prices = $product->getPrices();
        $departmentName = "";

        $document->setField('id', $product->getId());
        $document->setField('brand_id', $product->getBrand()->getId());
        $document->setField('group_id', $product->getProductGroupId());
        foreach($product->getDepartments() as $department)
        {
            $document->addField('department_ids', $department->getDepartment()->getId());
            if($department->getDisplayOrder() == 1)
            {
                $document->setField('department', $department->getDepartment()->getDescription()->getName());
            }
        }

        $document->setField('status', $product->getStatus());
        $document->setField('locale', $product->getDescription()->getLocale());
        $document->setField('tagline', $product->getDescription()->getTagline());
        $document->setField('header', $product->getDescription()->getHeader());
        $document->setField('page_title', $product->getDescription()->getPageTitle());
        $document->setField('short_description', $product->getDescription()->getShortDescription());
        $document->setField('tagline', $product->getDescription()->getTagline());

        $productCodes = explode(',', $product->getAlternativeProductCodes());
        array_unshift($productCodes, $product->getProductCode());
        foreach($productCodes as $productCode)
        {
            $document->addField('product_code', $productCode);
        }
        foreach(explode(',', $product->getDescription()->getSearchWords()) as $searchWord)
        {
            $document->addField('search_words', $searchWord);
        }

        $document->setField('brand', $product->getBrand()->getDescription()->getName());

        $document->setField('available_for_purchase', $product->getAvailableForPurchase());
        $document->setField('special_offer', $product->getSpecialOffer());
        $document->setField('recommended', $product->getRecommended());
        $document->setField('accessory', $product->getAccessory());
        $document->setField('new', $product->getNew());
        $document->setField('hide_price', $product->getHidePrice());
        $document->setField('show_price_out_of_hours', $product->getShowPriceOutOfHours());

        $document->setField('membership_discount_available', $product->getMembershipCardDiscountAvailable());
        $document->setField('membership_maximum_discount', $product->getMaximumMembershipCardDiscount());

        $document->setField('delivery_band', $product->getDeliveryBand());
        $document->setField('inherited_delivery_band', $product->getInheritedDeliveryBand());
        $document->setField('delivery_cost', $product->getDeliveryCost());
        $document->setField('weight', $product->getWeight());
        $document->setField('height', $product->getHeight());

        $document->setField('cost_price', $prices[0]->getCostPrice());
        $document->setField('rrp', $prices[0]->getRecommendedRetailPrice());
        $document->setField('list_price', $prices[0]->getListPrice());

        $document->setField('created_at', $helper->formatDate($product->getCreatedAt()));
        $document->setField('updated_at', $helper->formatDate($product->getUpdatedAt()));

        $update->addDocument($document);
        $update->addCommit();
        $this->getSolarium()->update($update);
    }

    /**
     * @param Product $product
     */
    function delete($product = null)
    {
        $delete = $this->getSolarium()->createUpdate();
        $delete->addDeleteQuery(null !== $product ? $product->getId() : '*:*');
        $delete->addCommit();

        $this->getSolarium()->update($delete);
    }
}
