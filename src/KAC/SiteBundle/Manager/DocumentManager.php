<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DescribableInterface;
use KAC\SiteBundle\Entity\Document;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Routing;
use Symfony\Component\Filesystem\Filesystem;

class DocumentManager extends Manager
{
    private $fileManager;

    public function __construct($doctrine, FileManager $fileManager)
    {
        parent::__construct($doctrine);

        $this->fileManager = $fileManager;
    }

    public function createDocument()
    {
        $document = new Document();
        $document->setDisplayOrder(0);
        return $document;
    }

    /**
     * @param \KAC\SiteBundle\Entity\Document $document
     * @return null|DescribableInterface
     */
    public function getObject(Document $document)
    {
        $className = "";
        switch ($document->getObjectType())
        {
            case 'product':
                $className = "\KAC\SiteBundle\Entity\Product";
                break;
            case 'variant':
                $className = "\KAC\SiteBundle\Entity\Product\Variant";
                break;
            case 'brand':
                $className = "\KAC\SiteBundle\Entity\Brand";
                break;
            case 'department':
                $className = "\KAC\SiteBundle\Entity\Department";
                break;
        }

        if (!$className)
        {
            return null;
        } else {
            $em = $this->doctrine->getManager();
            return $em->getRepository($className)->find($document->getObjectId());
        }
    }

    public function process(Document $document, DescribableInterface $object)
    {
        $fs = new Filesystem();
        $fileExtension = $this->fileManager->getFileExtension($document->getPath());
        $filename = $this->fileManager->cleanFilename($object->getDescription()->getHeader());
        $basePath = $document->getUploadDir().'/'.$document->getObjectType().'/'.$document->getImageType();
        $filePath = $basePath.'/'.$filename.'-'.$document->getId().'.'.$fileExtension;
        $fileSize = filesize($filePath);
        $document->setFileExtension($fileExtension);
        $document->setFileSize($fileSize);
        $fs->rename($document->getPath(), $filePath);
        $document->setPath($filePath);
    }

    public function persistDocuments($entity, $entityType)
    {
        /**
         * @var $em EntityManager
         * @var $document Document
         */
        $em = $this->doctrine->getManager();
        $documentIds = array_diff(explode(',', $entity->getDocuments()), array(''));

        // Get any documents already linked to the entity
        $existingDocuments = $em->getRepository("KAC\SiteBundle\Entity\Document")->findBy(array(
            'objectId' => $entity->getId(),
            'objectType' => $entityType,
        ));

        // Delete any old documents that no longer exist
        foreach ($existingDocuments as $existingDocument)
        {
            $found = false;
            foreach ($documentIds as $documentId)
            {
                if ($existingDocument->getId() == $documentId)
                {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $em->remove($existingDocument);
                $em->flush();
            }
        }

        // Link each document
        $displayOrder = 1;
        foreach ($documentIds as $documentId)
        {
            $document = $em->getRepository("KAC\SiteBundle\Entity\Document")->find($documentId);
            if ($document)
            {
                $document->setObjectType($entityType);
                $document->setObjectId($entity->getId());
                if ($document->getDocumentType() === "" || $document->getDocumentType() === null)
                {
                    $document->setDocumentType($entityType);
                }
                $document->setPath("");
                $document->setDisplayOrder($displayOrder);
                $displayOrder++;
                $em->persist($document);
            }
        }
    }
}