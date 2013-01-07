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
        if(count($product->getDescriptions()) === 0) {
            return;
        }


        $update = $this->getSolarium()->createUpdate();
        $helper = $update->getHelper();
        $document = $update->createDocument();

        $descriptions = $product->getDescriptions();
        
        $document->setField('id', $product->getId());
        $document->setField('brand_id', $product->getBrand()->getId());
        foreach($product->getDepartments() as $department)
        {
            $document->addField('department_ids', $department->getDepartment()->getId());
            if($department->getDisplayOrder() == 1)
            {
                $document->setField('department', $department->getDepartment()->getDescription()->getName());
            }
        }

        $document->setField('status', $product->getStatus());
        $document->setField('locale', $descriptions[0]->getLocale());
        $document->setField('tagline', $descriptions[0]->getTagline());
        $document->setField('header', $descriptions[0]->getHeader());
        $document->setField('page_title', $descriptions[0]->getPageTitle());
        $document->setField('short_description', $descriptions[0]->getShortDescription());
        $document->setField('tagline', $descriptions[0]->getTagline());

        foreach($product->getVariants() as $variant)
        {
            $productCodes = explode(',', $variant->getAlternativeProductCodes());
            array_unshift($productCodes, $variant->getProductCode());
            foreach($productCodes as $productCode)
            {
                $document->addField('product_code', $productCode);
            }
        }

        foreach(explode(',', $descriptions[0]->getSearchWords()) as $searchWord)
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

        $document->setField('delivery_cost', $product->getDeliveryCost());
        $document->setField('variants_count', count($product->getVariants()));
        $document->setField('price', $product->getPrice());

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
