<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use Imagine\Imagick\Imagine;
use KAC\SiteBundle\Entity\DescribableInterface;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Entity\Routing;

class ImageManager extends Manager
{
    private $fileManager;

    public function __construct($doctrine, FileManager $fileManager)
    {
        parent::__construct($doctrine);

        $this->fileManager = $fileManager;
    }

    public function createImage()
    {
        $image = new Image();
        $image->setDisplayOrder(0);
        return $image;
    }

    /**
     * @param \KAC\SiteBundle\Entity\Image $image
     * @return null|DescribableInterface
     */
    public function getObject(Image $image)
    {
        $className = "";
        switch ($image->getObjectType())
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
            return $em->getRepository($className)->find($image->getObjectId());
        }
    }

    public function process(Image $image, DescribableInterface $object)
    {
        $imagine = new Imagine();
        $filename = $this->fileManager->cleanFilename($object->getDescription()->getHeader());
        $basePath = $image->getUploadDir().'/'.$image->getObjectType().'/'.$image->getImageType();
        $filePath = $basePath.'/'.$filename.'-'.$image->getId().'.jpg';
        $fileSize = filesize($filePath);
        $image->setPublicPath($filePath);
        $image->setFileExtension('jpg');
        $image->setFileSize($fileSize);
        $imagine
            ->open($image->getUploadPath().$image->getOriginalPath())
            ->save($image->getUploadPath().$image->getPublicPath());
    }

    public function persistImages($entity, $entityType)
    {
        /**
         * @var $em EntityManager
         * @var $image Image
         */
        $em = $this->doctrine->getManager();
        $imageIds = array_diff(explode(',', $entity->getImages()), array(''));

        // Get any images already linked to the entity
        $existingImages = $em->getRepository("KAC\SiteBundle\Entity\Image")->findBy(array(
            'objectId' => $entity->getId(),
            'objectType' => $entityType,
        ));

        // Delete any old images that no longer exist
        foreach ($existingImages as $existingImage)
        {
            $found = false;
            foreach ($imageIds as $imageId)
            {
                if ($existingImage->getId() == $imageId)
                {
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $em->remove($existingImage);
                $em->flush();
            }
        }

        // If no images were added add a blank image
        if (count($imageIds) == 0)
        {
            $image = new Image();
            $image->setObjectType($entityType);
            $image->setObjectId($entity->getId());
            $image->setImageType($entityType);
            $image->setLocale('en_GB');
            $image->setTitle($entity->getDescription()->getHeader());
            $image->setDescription('');
            $image->setAlignment('');
            $image->setLink('');
            $image->setOriginalPath('/images/no-image.jpg');
            $image->setPublicPath('/images/no-image.jpg');
            $image->setDisplayOrder(1);
            $em->persist($image);
        } else {
            // Link each image
            $displayOrder = 1;
            foreach ($imageIds as $imageId)
            {
                $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($imageId);
                if ($image)
                {
                    $image->setObjectType($entityType);
                    $image->setObjectId($entity->getId());
                    if($image->getImageType() === "" || $image->getImageType() === null)
                    {
                        $image->setImageType($entityType);
                    }
                    $image->setPublicPath("");
                    $image->setDisplayOrder($displayOrder);
                    $displayOrder++;
                    $em->persist($image);
                }
            }
        }
    }
}