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
        $document->metaDescription = $product->getDescription()->getMetaDescription();
        $document->metaKeywords = $product->getDescription()->getMetaKeywords();
        // TODO: Decide what fields we want indexed


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
