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
        $update = $this->solarium->createUpdate();
        $document = $update->createDocument();

        $document->id = $product->getId();
        $document->group = $product->getProductGroupId();
        $document->status = $product->getStatus();
        $document->checked = $product->getChecked();
        $document->availableForPurchase = $product->getAvailableForPurchase();
        $document->name = $product->getDescription()->getName();
        $document->prefix = $product->getDescription()->getPrefix();
        $document->description = $product->getDescription()->getDescription();
        $document->shortDescription = $product->getDescription()->getShortDescription();
        $document->metaKeywords = $product->getDescription()->getMetaKeywords();
        $document->tagline = $product->getDescription()->getTagline();
        $document->header = $product->getDescription()->getHeader();
        $document->pageTitle = $product->getDescription()->getPageTitle();
        $document->productCode = $product->getProductCode();
        $document->productGroupCode = $product->getProductGroupCode();
        $document->alternativeProductCodes = $product->getAlternativeProductCodes();

        $document->specialOffer = $product->getSpecialOffer();
        $document->recommended = $product->getRecommended();
        $document->accessory = $product->getAccessory();
        $document->new = $product->getNew();
        $document->hidePrice = $product->getHidePrice();
        $document->showPriceOutOfHours = $product->getShowPriceOutOfHours();
        $document->membershipCardDiscountAvailable = $product->getMembershipCardDiscountAvailable();
        $document->maximumMembershipCardDiscount = $product->getMembershipCardDiscountAvailable();

        $update->addDocument($document);
        $update->addCommit();
        $this->solarium->update($update);
    }

    /**
     * @param Product $product
     */
    function delete($product = null)
    {
        $delete = $this->getSolarium()->createUpdate();
        $delete->addDeleteQuery(null !== $product ? $product->getId() : '*:*');
        $delete->addCommit();

        $this->solarium->update($delete);
    }
}
