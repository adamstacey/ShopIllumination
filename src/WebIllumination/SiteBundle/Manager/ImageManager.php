<?php
namespace WebIllumination\SiteBundle\Manager;

use Imagine\Imagick\Imagine;
use WebIllumination\SiteBundle\Entity\DescribableInterface;
use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Entity\Routing;

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
     * @param \WebIllumination\SiteBundle\Entity\Image $image
     * @return null|DescribableInterface
     */
    public function getObject(Image $image)
    {
        $className = "";
        switch ($image->getObjectType())
        {
            case 'product':
                $className = "\WebIllumination\SiteBundle\Entity\Product";
                break;
            case 'variant':
                $className = "\WebIllumination\SiteBundle\Entity\Product\Variant";
                break;
            case 'brand':
                $className = "\WebIllumination\SiteBundle\Entity\Brand";
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
}