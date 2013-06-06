<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use Imagine\Imagick\Imagine;
use KAC\SiteBundle\Entity\DescribableInterface;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Image as ProductImage;
use KAC\SiteBundle\Entity\Product\Variant\Image as ProductVariantImage;
use KAC\SiteBundle\Entity\Brand\Image as BrandImage;
use KAC\SiteBundle\Entity\Department\Image as DepartmentImage;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;

class ImageManager extends Manager
{
    private $fileManager;

    public function __construct($doctrine, FileManager $fileManager)
    {
        parent::__construct($doctrine);

        $this->fileManager = $fileManager;
    }

    public function createImage($objectType)
    {
        switch ($objectType)
        {
            case 'brand':
                $image = new BrandImage();
                break;
            case 'department':
                $image = new DepartmentImage();
                break;
            case 'product_variant':
                $image = new ProductVariantImage();
                break;
            case 'product':
                $image = new ProductImage();
                break;
            default:
                return null;
        }
        $image->setDisplayOrder(0);
        return $image;
    }

    public function process(Image $image, DescribableInterface $object)
    {
        // Set up defaults where we can
        if (!$image->getTitle())
        {
            $image->setTitle($object->getDescription()->getHeader());
        }
        if (!$image->getDescription())
        {
            $image->setDescription($object->getDescription()->getMetaDescription());
        }
        if (!$image->getImageType())
        {
            $image->setImageType($image->getObjectType());
        }

        // Get the file information
        $filename = $this->fileManager->cleanFilename($object->getDescription()->getHeader());
        $basePath = $image->getUploadDir().'/'.$image->getObjectType().'/'.$image->getImageType();
        $filePath = $basePath.'/'.$filename.'-'.$image->getId().'.jpg';
        $image->setPublicPath($filePath);
        $image->setFileExtension('jpg');

        // Process the image
        $imagine = new Imagine();
        $imagine
            ->open($image->getUploadPath().$image->getOriginalPath())
            ->save($image->getUploadPath().$image->getPublicPath());

        // Get the updated file size
        $fileSize = filesize($filePath);
        $image->setFileSize($fileSize);
    }

    public function persistImages($object, $objectType)
    {
        $fs = new Filesystem();
        $em = $this->doctrine->getManager();

        // Go through the temporary images
        $imageIds = explode(',', $object->getTemporaryImages());
        $displayOrder = 0;
        foreach ($imageIds as $imageId)
        {
            $image = $em->getRepository($this->getClassName($objectType))->find($imageId);
            if ($image)
            {
                if($this->getObject($image) == null) {
                    // Get a new original filename and copy the file
                    $filename = sha1(uniqid(mt_rand(), true));
                    $originalPath = $image->getUploadDir().'/'.$filename.'.'.$this->fileManager->getFileExtension($image->getOriginalPath());
                    try {
                        $fs->copy($image->getUploadPath().$image->getOriginalPath(), $image->getUploadPath().$originalPath, true);
                    } catch (IOException $e) {
                        throw new \Exception('An error occurred while copying the image '.$image->getUploadPath().$image->getOriginalPath().' to '.$image->getUploadPath().$originalPath.'.');
                    }

                    // Create a new image based on the object type
                    switch ($objectType)
                    {
                        case 'brand':
                            $newImage = new BrandImage();
                            $newImage->setBrand($object);
                            break;
                        case 'department':
                            $newImage = new DepartmentImage();
                            $newImage->setDepartment($object);
                            break;
                        case 'product_variant':
                            $newImage = new ProductVariantImage();
                            $newImage->setVariant($object);
                            break;
                        case 'product':
                        default:
                            $newImage = new ProductImage();
                            $newImage->setProduct($object);
                            break;
                    }

                    // Copy the data from the temporary image
                    $newImage->setLocale($image->getLocale());
                    $newImage->setTitle($image->getTitle());
                    $newImage->setAlignment($image->getAlignment());
                    $newImage->setDescription($image->getDescription());
                    $newImage->setLink($image->getLink());
                    $newImage->setImageType($image->getImageType());
                    $newImage->setDisplayOrder($displayOrder);
                    $newImage->setOriginalPath($originalPath);

                    // Process the new image and add it to the object
                    $this->process($newImage, $object);
                    $object->addImage($newImage);
                } else {
                    $image->setDisplayOrder($displayOrder);
                    $this->process($image, $object);
                }

                $displayOrder++;
            }
        }
    }

    public function removeTemporaryImages($object)
    {
        /**
         * @var $em EntityManager
         * @var $image Image
         */
        $em = $this->doctrine->getManager();

        // Remove the temporary uploads
        $uploadIds = explode(',', $object->getImageUploads());
        foreach ($uploadIds as $uploadId)
        {
            $upload = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($uploadId);
            if ($upload && $this->getObject($upload) == null)
            {
                $em->remove($upload);
            }
        }

        // Remove the temporary images
        $imageIds = explode(',', $object->getTemporaryImages());
        foreach ($imageIds as $imageId)
        {
            $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($imageId);
            if ($image && $this->getObject($image) == null)
            {
                $em->remove($image);
            }
        }

        // Flush the database
        $em->flush();
    }

    public function getClassName($objectType)
    {
        switch ($objectType)
        {
            case 'brand':
                return "KAC\\SiteBundle\\Entity\\Brand\\Image";
            case 'department':
                return "KAC\\SiteBundle\\Entity\\Department\\Image";
            case 'product_variant':
                return "KAC\\SiteBundle\\Entity\\Product\\Variant\\Image";
            case 'product':
                return "KAC\\SiteBundle\\Entity\\Product\\Image";
            default:
                return false;
        }
    }

    public function getObject($image)
    {
        switch (get_class($image))
        {
            case 'KAC\\SiteBundle\\Entity\\Brand\\Image':
                return $image->getBrand();
            case 'KAC\\SiteBundle\\Entity\\Department\\Image':
                return $image->getDepartment();
            case 'KAC\\SiteBundle\\Entity\\Product\\Variant\\Image':
                return $image->getVariant();
            case 'KAC\\SiteBundle\\Entity\\Product\\Image':
                return $image->getProduct();
            default:
                return null;
        }
    }
}