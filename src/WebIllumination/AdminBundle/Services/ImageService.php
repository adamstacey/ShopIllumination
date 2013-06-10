<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WebIllumination\AdminBundle\Entity\Image;

class ImageService {

	protected $container;
	
	// Image quality
	protected $jpegImageQuality;
	
	// Image dimensions for logos
	protected $widthThumbnailImageLogo;
	protected $heightThumbnailImageLogo;
	protected $widthMediumImageLogo;
	protected $heightMediumImageLogo;
	protected $widthLargeImageLogo;
	protected $heightLargeImageLogo;
	
	// Canvas dimensions for logos
	protected $widthThumbnailCanvasLogo;
	protected $heightThumbnailCanvasLogo;
	protected $widthMediumCanvasLogo;
	protected $heightMediumCanvasLogo;
	protected $widthLargeCanvasLogo;
	protected $heightLargeCanvasLogo;
	
	// Image dimensions for gallery images
	protected $widthThumbnailImageGallery;
	protected $heightThumbnailImageGallery;
	protected $widthMediumImageGallery;
	protected $heightMediumImageGallery;
	protected $widthLargeImageGallery;
	protected $heightLargeImageGallery;
	
	// Canvas dimensions for gallery images
	protected $widthThumbnailCanvasGallery;
	protected $heightThumbnailCanvasGallery;
	protected $widthMediumCanvasGallery;
	protected $heightMediumCanvasGallery;
	protected $widthLargeCanvasGallery;
	protected $heightLargeCanvasGallery;
	
	// Image dimensions for product images
	protected $widthThumbnailImageProduct;
	protected $height_thumbnail_image_product;
	protected $widthMediumImageProduct;
	protected $heightMediumImageProduct;
	protected $widthLargeImageProduct;
	protected $heightLargeImageProduct;
	
	// Canvas dimensions for product images
	protected $widthThumbnailCanvasProduct;
	protected $heightThumbnailCanvasProduct;
	protected $widthMediumCanvasProduct;
	protected $heightMediumCanvasProduct;
	protected $widthLargeCanvasProduct;
	protected $heightLargeCanvasProduct;

    public function __construct($container)
    {
        $this->container = $container;
        
        // Image quality
		$this->jpegImageQuality = 80;
        
        // Image dimensions for logos
		$this->widthThumbnailImageLogo = 48;
		$this->heightThumbnailImageLogo = 23;
		$this->widthMediumImageLogo = 90;
		$this->heightMediumImageLogo = 90;
		$this->widthLargeImageLogo = 280;
		$this->heightLargeImageLogo = 130;
		
		// Canvas dimensions for logos
		$this->widthThumbnailCanvasLogo = 50;
		$this->heightThumbnailCanvasLogo = 25;
		$this->widthMediumCanvasLogo = 100;
		$this->heightMediumCanvasLogo = 100;
		$this->widthLargeCanvasLogo = 300;
		$this->heightLargeCanvasLogo = 150;
		
		// Image dimensions for gallery image
		$this->widthThumbnailImageGallery = 175;
		$this->heightThumbnailImageGallery = 50;
		$this->widthMediumImageGallery = 300;
		$this->heightMediumImageGallery = 86;
		$this->widthLargeImageGallery = 978;
		$this->heightLargeImageGallery = 978;
		
		// Canvas dimensions for gallery image
		$this->widthThumbnailCanvasGallery = 175;
		$this->heightThumbnailCanvasGallery = 50;
		$this->widthMediumCanvasGallery = 300;
		$this->heightMediumCanvasGallery = 86;
		$this->widthLargeCanvasGallery = 978;
		$this->heightLargeCanvasGallery = 280;
		
		// Image dimensions for product image
		$this->widthThumbnailImageProduct = 100;
		$this->heightThumbnailImageProduct = 100;
		$this->widthMediumImageProduct = 300;
		$this->heightMediumImageProduct = 300;
		$this->widthLargeImageProduct = 800;
		$this->heightLargeImageProduct = 600;
		
		// Canvas dimensions for product image
		$this->widthThumbnailCanvasProduct = 100;
		$this->heightThumbnailCanvasProduct = 100;
		$this->widthMediumCanvasProduct = 300;
		$this->heightMediumCanvasProduct = 300;
		$this->widthLargeCanvasProduct = 800;
		$this->heightLargeCanvasProduct = 600;
    }
    
    // Update an image
    public function updateImage($imageObject, $image, $title, $description, $link, $alignment, $displayOrder)
    {
    	// Get the doctrine service
	    $doctrineService = $this->container->get('doctrine');
	    	
	    // Get the entity manager
	    $em = $doctrineService->getManager();
	    		
    	// Check if image exists and is valid
    	if ($imageObject && $image)
    	{
			// Get the paths and filenames
			$cleanedTitle = $this->cleanFilename($title);
			$imagePath = $this->getUploadRootDir().'/'.$imageObject->getObjectType().'/'.$imageObject->getImageType();
			$filePath = $this->getUploadDir().'/'.$imageObject->getObjectType().'/'.$imageObject->getImageType();
			$originalImageFilename = $cleanedTitle.'-original-'.$imageObject->getId().'.'.$this->getExtension($image);
			$thumbnailImageFilename = $cleanedTitle.'-thumbnail-'.$imageObject->getId().'.jpg';
			$mediumImageFilename = $cleanedTitle.'-medium-'.$imageObject->getId().'.jpg';
			$largeImageFilename = $cleanedTitle.'-large-'.$imageObject->getId().'.jpg';
			
			// Get the dimensions
			switch ($imageObject->getImageType())
			{
				case 'gallery':
	    			$widthThumbnailImage = $this->widthThumbnailImageGallery;
	    			$heightThumbnailImage = $this->heightThumbnailImageGallery;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasGallery;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasGallery;
	    			$widthMediumImage = $this->widthMediumImageGallery;
	    			$heightMediumImage = $this->heightMediumImageGallery;
	    			$widthMediumCanvas = $this->widthMediumCanvasGallery;
	    			$heightMediumCanvas = $this->heightMediumCanvasGallery;
	    			$widthLargeImage = $this->widthLargeImageGallery;
	    			$heightLargeImage = $this->heightLargeImageGallery;
	    			$widthLargeCanvas = $this->widthLargeCanvasGallery;
	    			$heightLargeCanvas = $this->heightLargeCanvasGallery;
	    			break;
	    		case 'logo':
	    			$widthThumbnailImage = $this->widthThumbnailImageLogo;
	    			$heightThumbnailImage = $this->heightThumbnailImageLogo;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasLogo;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasLogo;
	    			$widthMediumImage = $this->widthMediumImageLogo;
	    			$heightMediumImage = $this->heightMediumImageLogo;
	    			$widthMediumCanvas = $this->widthMediumCanvasLogo;
	    			$heightMediumCanvas = $this->heightMediumCanvasLogo;
	    			$widthLargeImage = $this->widthLargeImageLogo;
	    			$heightLargeImage = $this->heightLargeImageLogo;
	    			$widthLargeCanvas = $this->widthLargeCanvasLogo;
	    			$heightLargeCanvas = $this->heightLargeCanvasLogo;
	    			break;
				case 'product':
				default:
	    			$widthThumbnailImage = $this->widthThumbnailImageProduct;
	    			$heightThumbnailImage = $this->heightThumbnailImageProduct;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasProduct;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasProduct;
	    			$widthMediumImage = $this->widthMediumImageProduct;
	    			$heightMediumImage = $this->heightMediumImageProduct;
	    			$widthMediumCanvas = $this->widthMediumCanvasProduct;
	    			$heightMediumCanvas = $this->heightMediumCanvasProduct;
	    			$widthLargeImage = $this->widthLargeImageProduct;
	    			$heightLargeImage = $this->heightLargeImageProduct;
	    			$widthLargeCanvas = $this->widthLargeCanvasProduct;
	    			$heightLargeCanvas = $this->heightLargeCanvasProduct;
	    			break;
			}
			
			// Remove any existing files
			if (file_exists($imagePath.'/'.$imageObject->getOriginalPath()) && ($imageObject->getOriginalPath() != ''))
			{
    			unlink($imagePath.'/'.$imageObject->getOriginalPath());
    		}
    		if (file_exists($imagePath.'/'.$imageObject->getThumbnailPath()) && ($imageObject->getThumbnailPath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getThumbnailPath());
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getMediumPath()) && ($imageObject->getMediumPath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getMediumPath());
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getLargePath()) && ($imageObject->getLargePath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getLargePath());
	    	}
    				
			// Process the original image
	    	rename($this->getTemporaryUploadRootDir().'/'.$image, $imagePath.'/'.$originalImageFilename);
	    	$imageObject->setOriginalPath('/'.$filePath.'/'.$originalImageFilename);
	    	
	    	// Process the thumbnail
	    	$this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$thumbnailImageFilename, $widthThumbnailImage, $heightThumbnailImage, $widthThumbnailCanvas, $heightThumbnailCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setThumbnailPath('/'.$filePath.'/'.$thumbnailImageFilename);
		    
		    // Process the medium image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$mediumImageFilename, $widthMediumImage, $heightMediumImage, $widthMediumCanvas, $heightMediumCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setMediumPath('/'.$filePath.'/'.$mediumImageFilename);
		    
		    // Process the large image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$largeImageFilename, $widthLargeImage, $heightLargeImage, $widthLargeCanvas, $heightLargeCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setLargePath('/'.$filePath.'/'.$largeImageFilename);
		    
		    // Update the image details
		    $imageObject->setTitle($title);
		    $imageObject->setDescription($description);
		    $imageObject->setLink($link);
		    $imageObject->setAlignment($alignment);
		    $imageObject->setDisplayOrder($displayOrder);
		    $em->flush();
		    
		    return $imageObject;
		    
		} elseif ($imageObject) {
			 // Update the image details
		    $imageObject->setTitle($title);
		    $imageObject->setDescription($description);
		    $imageObject->setLink($link);
		    $imageObject->setAlignment($alignment);
		    $imageObject->setDisplayOrder($displayOrder);
		    $em->flush();
		    
		    return $imageObject;
		} 
		
    	return false;
    }
    
    // Process an image
    public function processImage($image, $title, $description, $link, $alignment, $displayOrder, $objectType, $imageType, $objectId, $locale = 'en')
    {
    	// Check if image exists and is valid
    	if ($image)
    	{
    		// Get the doctrine service
    		$doctrineService = $this->container->get('doctrine');
    	
    		// Get the entity manager
    		$em = $doctrineService->getManager();
    		
    		// Add a new image
    		$imageObject = new Image();
    		$imageObject->setLocale($locale);
    		$imageObject->setTitle($title);
    		$imageObject->setDescription($description);
    		$imageObject->setAlignment($alignment);
    		$imageObject->setLink($link);
    		$imageObject->setObjectType($objectType);
    		$imageObject->setImageType($imageType);
    		$imageObject->setObjectId($objectId);
    		$imageObject->setDisplayOrder($displayOrder);
    		$em->persist($imageObject);
    		$em->flush();
    		
    		// Get the dimensions
			switch ($imageType)
			{
				case 'gallery':
	    			$widthThumbnailImage = $this->widthThumbnailImageGallery;
	    			$heightThumbnailImage = $this->heightThumbnailImageGallery;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasGallery;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasGallery;
	    			$widthMediumImage = $this->widthMediumImageGallery;
	    			$heightMediumImage = $this->heightMediumImageGallery;
	    			$widthMediumCanvas = $this->widthMediumCanvasGallery;
	    			$heightMediumCanvas = $this->heightMediumCanvasGallery;
	    			$widthLargeImage = $this->widthLargeImageGallery;
	    			$heightLargeImage = $this->heightLargeImageGallery;
	    			$widthLargeCanvas = $this->widthLargeCanvasGallery;
	    			$heightLargeCanvas = $this->heightLargeCanvasGallery;
	    			break;
	    		case 'logo':
	    			$widthThumbnailImage = $this->widthThumbnailImageLogo;
	    			$heightThumbnailImage = $this->heightThumbnailImageLogo;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasLogo;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasLogo;
	    			$widthMediumImage = $this->widthMediumImageLogo;
	    			$heightMediumImage = $this->heightMediumImageLogo;
	    			$widthMediumCanvas = $this->widthMediumCanvasLogo;
	    			$heightMediumCanvas = $this->heightMediumCanvasLogo;
	    			$widthLargeImage = $this->widthLargeImageLogo;
	    			$heightLargeImage = $this->heightLargeImageLogo;
	    			$widthLargeCanvas = $this->widthLargeCanvasLogo;
	    			$heightLargeCanvas = $this->heightLargeCanvasLogo;
	    			break;
				case 'product':
				default:
	    			$widthThumbnailImage = $this->widthThumbnailImageProduct;
	    			$heightThumbnailImage = $this->heightThumbnailImageProduct;
	    			$widthThumbnailCanvas = $this->widthThumbnailCanvasProduct;
	    			$heightThumbnailCanvas = $this->heightThumbnailCanvasProduct;
	    			$widthMediumImage = $this->widthMediumImageProduct;
	    			$heightMediumImage = $this->heightMediumImageProduct;
	    			$widthMediumCanvas = $this->widthMediumCanvasProduct;
	    			$heightMediumCanvas = $this->heightMediumCanvasProduct;
	    			$widthLargeImage = $this->widthLargeImageProduct;
	    			$heightLargeImage = $this->heightLargeImageProduct;
	    			$widthLargeCanvas = $this->widthLargeCanvasProduct;
	    			$heightLargeCanvas = $this->heightLargeCanvasProduct;
	    			break;
			}
		
			// Get the paths and filenames
			$cleanedTitle = $this->cleanFilename($title);
			$imagePath = $this->getUploadRootDir().'/'.$objectType.'/'.$imageType;
			$filePath = $this->getUploadDir().'/'.$objectType.'/'.$imageType;
			$originalImageFilename = $cleanedTitle.'-original-'.$imageObject->getId().'.'.$this->getExtension($image);
			$thumbnailImageFilename = $cleanedTitle.'-thumbnail-'.$imageObject->getId().'.jpg';
			$mediumImageFilename = $cleanedTitle.'-medium-'.$imageObject->getId().'.jpg';
			$largeImageFilename = $cleanedTitle.'-large-'.$imageObject->getId().'.jpg';
							
			// Process the original image
	    	rename($this->getTemporaryUploadRootDir().'/'.$image, $imagePath.'/'.$originalImageFilename);
	    	$imageObject->setOriginalPath('/'.$filePath.'/'.$originalImageFilename);
	    	
		    // Process the thumbnail
	    	$this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$thumbnailImageFilename, $widthThumbnailImage, $heightThumbnailImage, $widthThumbnailCanvas, $heightThumbnailCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setThumbnailPath('/'.$filePath.'/'.$thumbnailImageFilename);
		    
		    // Process the medium image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$mediumImageFilename, $widthMediumImage, $heightMediumImage, $widthMediumCanvas, $heightMediumCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setMediumPath('/'.$filePath.'/'.$mediumImageFilename);
		    
		    // Process the large image
		    $this->resizeImage($filePath.'/'.$originalImageFilename, $filePath.'/'.$largeImageFilename, $widthLargeImage, $heightLargeImage, $widthLargeCanvas, $heightLargeCanvas, 'fit', $this->jpegImageQuality);
		    $imageObject->setLargePath('/'.$filePath.'/'.$largeImageFilename);
		    
		    // Update the database
    		$em->flush();
		    
		    return $imageObject;		    
		}   
		
    	return false;
    }
        
    // Reset an image
    public function resetImage($imageObject, $title)
    {
    	// Check if image exists and is valid
    	if ($imageObject)
    	{
    		// Get the doctrine service
    		$doctrineService = $this->container->get('doctrine');
    	
    		// Get the entity manager
    		$em = $doctrineService->getManager();
		
			// Get the paths and filenames
			$title = $this->cleanFilename($title);
			$imagePath = $this->getUploadRootDir().'/'.$imageObject->getObjectType();
			$filePath = $this->getUploadDir().'/'.$objectType;
			$originalImageFilename = $title.'-original-'.$imageObject->objectId.'.'.$image->guessExtension();
			$thumbnailImageFilename = $title.'-thumbnail-'.$imageObject->objectId.'.jpg';
			$mediumImageFilename = $title.'-medium-'.$imageObject->objectId.'.jpg';
			$largeImageFilename = $title.'-large-'.$imageObject->objectId.'.jpg';
			
			// Rename the existing files
			if (file_exists($imagePath.'/'.$imageObject->getOriginalPath()))
			{
    			rename($imagePath.'/'.$imageObject->getOriginalPath(), $imagePath.'/'.$originalImageFilename);
    		}
    		if (file_exists($imagePath.'/'.$imageObject->getThumbnailPath()))
			{
	    		rename($imagePath.'/'.$imageObject->getThumbnailPath(), $imagePath.'/'.$thumbnailImageFilename);
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getMediumPath()))
			{
	    		rename($imagePath.'/'.$imageObject->getMediumPath(), $imagePath.'/'.$mediumImageFilename);
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getLargePath()))
			{
	    		rename($imagePath.'/'.$imageObject->getLargePath(), $imagePath.'/'.$largeImageFilename);
	    	}
			
			// Update the database
	    	$imageObject->setOriginalPath('/'.$filePath.'/'.$originalImageFilename);
		    $imageObject->setThumbnailPath('/'.$filePath.'/'.$thumbnailImageFilename);
		    $imageObject->setMediumPath('/'.$filePath.'/'.$mediumImageFilename);
		    $imageObject->setLargePath('/'.$filePath.'/'.$largeImageFilename);
		    $em->flush();
		    
		    return true;
		    
		}   
		
    	return false;
    }
    
    // Delete an image
    public function deleteImage($imageObject)
    {
    	// Check if image exists and is valid
    	if ($imageObject)
    	{
    		// Get the doctrine service
    		$doctrineService = $this->container->get('doctrine');
    	
    		// Get the entity manager
    		$em = $doctrineService->getManager();
		
			// Get the path
			$imagePath = $this->getUploadRootDir().'/'.$imageObject->getObjectType();
			
			// Remove any existing files
			if (file_exists($imagePath.'/'.$imageObject->getOriginalPath()) && ($imageObject->getOriginalPath() != ''))
			{
    			unlink($imagePath.'/'.$imageObject->getOriginalPath());
    		}
    		if (file_exists($imagePath.'/'.$imageObject->getThumbnailPath()) && ($imageObject->getThumbnailPath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getThumbnailPath());
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getMediumPath()) && ($imageObject->getMediumPath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getMediumPath());
	    	}
    		if (file_exists($imagePath.'/'.$imageObject->getLargePath()) && ($imageObject->getLargePath() != ''))
			{
	    		unlink($imagePath.'/'.$imageObject->getLargePath());
	    	}
    				
			// Remove the image from the database
			$em->remove($imageObject);
			$em->flush();
		    
		    return true;
		    
		}   
		
    	return false;
    }
    
    // Resize image
    public function resizeImage($originalImagePath, $newImagePath, $imageWidth, $imageHeight, $canvasWidth, $canvasHeight, $process = 'fit', $imageQuality = 80)
    {
		try
		{
			// Create a blank canvas
			$canvas = new \Imagick();
			$canvas->newImage($canvasWidth, $canvasHeight, 'white');
			
			// Resize the image
	   		$image = new \Imagick($originalImagePath);
			$image->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
			
			// Resize the image
			switch ($process)
			{
				case 'gallery':
					$originalImageWidth = $image->getImageWidth();
					$originalImageHeight = $image->getImageHeight();
					$width_ratio = $imageWidth / $originalImageWidth;
					$height_ratio = $imageHeight / $originalImageHeight;
					if ($width_ratio > $height_ratio)
					{
						$ratio = $width_ratio;
					} else {
						$ratio = $height_ratio;
					}
					$newWidth = $originalImageWidth * $ratio;
					$newHeight = $originalImageHeight * $ratio;
					$image->thumbnailImage($newWidth, $newHeight);
				case 'normal':
					$image->thumbnailImage($imageWidth, null);
					break;
				case 'fixed':
					$image->thumbnailImage($imageWidth, $imageHeight);
					break;
				case 'cropped':
					$image->cropThumbnailImage($imageWidth, $imageHeight);			
					break;
				case 'fit':
				default:
					$image->thumbnailImage($imageWidth, $imageHeight, true);
					break;
			}
	    	
			// Get the image geometry
			$geometry = $image->getImageGeometry();
			 
			// Get the overlay x and y coordinates
			$x = ($canvasWidth - $geometry['width']) / 2;
			$y = ($canvasHeight - $geometry['height']) / 2;
			
			// Add the image to the canvas and save
			$canvas->compositeImage($image, \Imagick::COMPOSITE_OVER, $x, $y);
	    	$canvas->setImageFormat('jpeg');
			$canvas->setImageCompressionQuality($imageQuality);
			$canvas->writeImage($newImagePath);
			
			// Flush objects
			$image->clear();
			$canvas->clear();
			
			return true;
		} catch (Exception $exception) {
	    	return false;
		}
    }
    
    // Get the root temporary upload directory
    public function getTemporaryUploadRootDir()
    {
        return __DIR__.'/../../../../web/uploads/temporary';
    }
    
    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

	// Get the upload directory
    public function getUploadDir()
    {
        return 'uploads/images';
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
    
    // Get an extension
    public function getExtension($filename = '')
    {	
    	if ($filename != '')
    	{
	    	// Split the filename
	    	$filenameInfo = explode('.', $filename);
	    	
	    	// Get the extension
	    	return strtolower($filenameInfo[(sizeof($filenameInfo) - 1)]);
	    	
	    }
 
    	return false;
    }
}