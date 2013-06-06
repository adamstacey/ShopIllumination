<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DescribableInterface;
use KAC\SiteBundle\Entity\Document;
use KAC\SiteBundle\Entity\Product\Document as ProductDocument;
use KAC\SiteBundle\Entity\Product\Variant\Document as ProductVariantDocument;
use KAC\SiteBundle\Entity\Brand\Document as BrandDocument;
use KAC\SiteBundle\Entity\Department\Document as DepartmentDocument;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Routing;
use KAC\SiteBundle\Form\Product\ProductVariantDocumentsType;
use Symfony\Component\Filesystem\Filesystem;

class DocumentManager extends Manager
{
    private $fileManager;

    public function __construct($doctrine, FileManager $fileManager)
    {
        parent::__construct($doctrine);

        $this->fileManager = $fileManager;
    }

    public function createDocument($objectType)
    {
        switch ($objectType)
        {
            case 'brand':
                $document = new BrandDocument();
                break;
            case 'department':
                $document = new DepartmentDocument();
                break;
            case 'product_variant':
                $document = new ProductVariantDocument();
                break;
            case 'product':
                $document = new ProductDocument();
                break;
            default:
                return null;
        }
        $document->setDisplayOrder(0);
        return $document;
    }

    public function getClassName($objectType)
    {
        switch ($objectType)
        {
            case 'brand':
                return "KAC\\SiteBundle\\Entity\\Brand\\Document";
            case 'department':
                return "KAC\\SiteBundle\\Entity\\Department\\Document";
            case 'product_variant':
                return "KAC\\SiteBundle\\Entity\\Product\\Variant\\Document";
            case 'product':
                return "KAC\\SiteBundle\\Entity\\Product\\Document";
            default:
                return false;
        }
    }

    public function getObject($document)
    {
        switch (get_class($document))
        {
            case 'KAC\\SiteBundle\\Entity\\Brand\\Document':
                return $document->getBrand();
            case 'KAC\\SiteBundle\\Entity\\Department\\Document':
                return $document->getDepartment();
            case 'KAC\\SiteBundle\\Entity\\Product\\Variant\\Document':
                return $document->getVariant();
            case 'KAC\\SiteBundle\\Entity\\Product\\Document':
                return $document->getProduct();
            default:
                return null;
        }
    }

    public function process(Document $document, DescribableInterface $object)
    {
        $fs = new Filesystem();
        $fileExtension = $this->fileManager->getFileExtension($document->getPath());
        $filename = $this->fileManager->cleanFilename($object->getDescription()->getHeader());
        $basePath = $document->getUploadDir().'/'.$document->getObjectType().'/'.$document->getDocumentType();
        $filePath = $basePath.'/'.$filename.'-'.$document->getId().'.'.$fileExtension;
        $fileSize = filesize($filePath);
        $document->setFileExtension($fileExtension);
        $document->setFileSize($fileSize);
        $fs->rename($document->getPath(), $filePath);
        $document->setPath($filePath);
    }

    public function persistDocuments($object, $objectType)
    {
        $fs = new Filesystem();
        $em = $this->doctrine->getManager();

        // Go through the temporary documents
        if($object->getTemporaryDocuments() === "") return;

        $documentIds = explode(',', $object->getTemporaryDocuments());
        $displayOrder = 0;
        foreach ($documentIds as $documentId)
        {
            $document = $em->getRepository($this->getClassName($objectType))->find($documentId);
            if ($document)
            {
                if($this->getObject($document) == null) {
                    // Get a new original filename and copy the file
                    $filename = sha1(uniqid(mt_rand(), true));
                    $originalPath = $document->getUploadDir().'/'.$filename.'.'.$this->fileManager->getFileExtension($document->getOriginalPath());
                    try {
                        $fs->copy($document->getUploadPath().$document->getOriginalPath(), $document->getUploadPath().$originalPath, true);
                    } catch (IOException $e) {
                        throw new \Exception('An error occurred while copying the document '.$document->getUploadPath().$document->getOriginalPath().' to '.$document->getUploadPath().$originalPath.'.');
                    }

                    // Create a new document based on the object type
                    switch ($objectType)
                    {
                        case 'brand':
                            $newDocument = new BrandDocument();
                            $newDocument->setBrand($object);
                            break;
                        case 'department':
                            $newDocument = new DepartmentDocument();
                            $newDocument->setDepartment($object);
                            break;
                        case 'product_variant':
                            $newDocument = new ProductVariantDocument();
                            $newDocument->setVariant($object);
                            break;
                        case 'product':
                        default:
                            $newDocument = new ProductDocument();
                            $newDocument->setProduct($object);
                            break;
                    }

                    // Copy the data from the temporary document                    
                    $newDocument->setLocale($document->getLocale());
                    $newDocument->setTitle($document->getTitle());
                    $newDocument->setDescription($document->getDescription());
                    $newDocument->setDocumentType($document->getDocumentType());
                    $newDocument->setDisplayOrder($document->getDisplayOrder());

                    // Process the new document and add it to the object
                    $this->process($newDocument, $object);
                    $object->addDocument($newDocument);
                } else {
                    $document->setDisplayOrder($displayOrder);
                    $this->process($document, $object);
                }

                $displayOrder++;
            }
        }
    }

    public function removeTemporaryDocuments($object)
    {
        /**
         * @var $em EntityManager
         * @var $document Document
         */
        $em = $this->doctrine->getManager();

        // Remove the temporary uploads
        $uploadIds = explode(',', $object->getDocumentUploads());
        foreach ($uploadIds as $uploadId)
        {
            $upload = $em->getRepository("KAC\SiteBundle\Entity\Document")->find($uploadId);
            if ($upload && $this->getObject($upload) == null)
            {
                $em->remove($upload);
            }
        }

        // Remove the temporary documents
        $documentIds = explode(',', $object->getTemporaryDocuments());
        foreach ($documentIds as $documentId)
        {
            $document = $em->getRepository("KAC\SiteBundle\Entity\Document")->find($documentId);
            if ($document && $this->getObject($document) == null)
            {
                $em->remove($document);
            }
        }

        // Flush the database
        $em->flush();
    }
}