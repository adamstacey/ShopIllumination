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
