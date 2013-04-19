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
    public function __construct($doctrine)
    {
        parent::__construct($doctrine);
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

        $title = $object->getDescription()->getHeader();
        $title = $this->cleanFilename($title);
        $basePath = $image->getUploadDir() . '/' . $image->getObjectType() . '/' . $image->getImageType();

        $image->setPublicPath($basePath . '/' . $title . '-' . $image->getId() . '.jpg');

        $imagine
            ->open($image->getUploadPath() . $image->getOriginalPath())
            ->save($image->getUploadPath() . $image->getPublicPath());
    }
    // Generate a clean filename
    public function cleanFilename($filename = '')
    {
        if ($filename != '')
        {
            // Add spaces to ending HTMl tags
            $filename = preg_replace("/<\/([^\s])>/", "</$1> ", $filename);

            // Strip tags
            $filename = strip_tags($filename);

            // Convert all HTML entities
            $filename = html_entity_decode($filename);

            // Replace any white space
            $filename = preg_replace("/[\r\n\t\s]+/s", "-", $filename);

            // Replace any dashes
            $filename = preg_replace("/[\-]+/s", "-", $filename);
            $filename = str_replace('--', '-', $filename);

            // Convert to lowercase
            $filename = strtolower($filename);

            // Remove any unexpected characters
            $filename = preg_replace("/[^a-zA-Z0-9\-]?/", "", $filename);
        }

        return $filename;
    }

    public  function persistImages($entity, $entityType) {
        /**
         * @var $em EntityManager
         * @var $image Image
         */
        $em = $this->doctrine->getManager();
        $i = 0;
        $imageIds = explode(',', $entity->getImages());
        $imageIds = array_diff(explode(',', $entity->getImages()), array(''));

        // Get any images already linked to the entity
        $existingImages = $em->getRepository("KAC\SiteBundle\Entity\Image")->findBy(array(
            'objectId' => $entity->getId(),
            'objectType' => $entityType,
        ));

        // Delete any old images that no longer exist
        foreach($existingImages as $existingImage) {
            $found = false;
            foreach($imageIds as $imageId) {
                if($existingImage->getId() == $imageId) {
                    $found = true;
                    break;
                }
            }

            if(!$found) {
                $em->remove($existingImage);
                $em->flush();
            }
        }

        // If no images were added add a blank image
        if(count($imageIds) == 0) {
            $image = new Image();
            $image->setLocale('en');
            $image->setTitle($entity->getDescription()->getHeader());
            $image->setAlignment('');
            $image->setDescription('');
            $image->setLink('');
            $image->setImageType($entityType);
            $image->setObjectId($entity->getId());
            $image->setDisplayOrder(1);
            $image->setOriginalPath('/images/no-image.jpg');
            $image->setPublicPath('/images/no-image.jpg');
            $em->persist($image);
        } else {
            // Link each image to the variant
            foreach($imageIds as $imageId)
            {
                $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($imageId);
                if($image)
                {
                    $image->setObjectId($entity->getId());
                    $image->setObjectType($entityType);
                    $image->setImageType($entityType);

                    $image->setTitle($entity->getDescription()->getHeader());
                    $image->setDisplayOrder($i);
                    $image->setPublicPath(/*Set this field to a blank value so it can be changed in the listener*/"");

                    if($image->getImageType() === "" || $image->getImageType() === null) {
                        $image->setImageType($entityType);
                    }

                    $i++;

                    $em->persist($image);
                }
            }
        }
    }
}