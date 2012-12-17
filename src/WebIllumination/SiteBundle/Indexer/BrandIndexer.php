<?php
namespace WebIllumination\SiteBundle\Indexer;

use WebIllumination\SiteBundle\Entity\Brand;

class BrandIndexer extends Indexer
{
    /**
     * @param Brand $brand
     */
    function index($brand)
    {
        $update = $this->solarium->createUpdate();
        $document = $update->createDocument();
        $helper = $update->getHelper();

        $document->createdAt = $helper->formatDate($brand->getCreatedAt());
        $document->updatedAt = $helper->formatDate($brand->getUpdatedAt());

        $update->addDocument($document);
        $update->addCommit();
        $this->solarium->update($update);
    }

    /**
     * @param Brand $brand
     */
    function delete($brand = null)
    {
        $delete = $this->getSolarium()->createUpdate();
        $delete->addDeleteQuery(null !== $brand ? $brand->getId() : '*:*');
        $delete->addCommit();

        $this->solarium->update($delete);
    }
}
