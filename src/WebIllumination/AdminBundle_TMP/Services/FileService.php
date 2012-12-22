<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WebIllumination\SiteBundle\Entity\File;

class FileService {

	protected $container;
	
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    // Process a file
    public function processFile($file, $displayName, $description, $displayOrder, $objectType, $objectId, $locale = 'en')
    {
    	// Check if file exists and is valid
    	if ($file)
    	{
    		// Get the doctrine service
    		$doctrineService = $this->container->get('doctrine');
    	
    		// Get the entity manager
    		$em = $doctrineService->getEntityManager();
    		
    		// Add a new file
    		$fileObject = new File();
    		$fileObject->setLocale($locale);
		    $fileObject->setDisplayName($displayName);
		    $fileObject->setDescription($description);
    		$fileObject->setObjectType($objectType);
    		$fileObject->setObjectId($objectId);
    		$fileObject->setDisplayOrder($displayOrder);
    		$fileObject->setPath('');
    		$fileObject->setFileType('');
    		$fileObject->setFileSize('');
    		$fileObject->setDisplayOrder($displayOrder);
    		$em->persist($fileObject);
    		$em->flush();
		
			// Get the paths and filenames
			$cleanedDisplayName = $this->cleanFilename($displayName);
			$rootPath = $this->getUploadRootDir().'/'.$objectType;
			$filePath = $this->getUploadDir().'/'.$objectType;
			$filename = $cleanedDisplayName.'-'.$fileObject->getId().'.'.$this->getExtension($file);
							
			// Process the file
	    	rename($this->getTemporaryUploadRootDir().'/'.$file, $rootPath.'/'.$filename);
	    	$fileObject->setPath('/'.$filePath.'/'.$filename);
	    	$fileObject->setFileType($this->getExtension($file));
    		$fileObject->setFileSize($this->getFileSize($filePath.'/'.$filename));
	    			    			    
		    // Update the database
		    $em->persist($fileObject);
    		$em->flush();
		    
		    return $fileObject;
		}   
		
    	return false;
    }
    
    // Update a file
    public function updateFile($fileObject, $file, $displayName, $description, $displayOrder)
    {
    	// Get the doctrine service
	    $doctrineService = $this->container->get('doctrine');
	    	
	    // Get the entity manager
	    $em = $doctrineService->getEntityManager();
	    		
    	// Check if file exists and is valid
    	if ($fileObject && $file)
    	{
			// Get the paths and filenames
			$cleanedDisplayName = $this->cleanFilename($displayName);
			$rootPath = $this->getUploadRootDir().'/'.$fileObject->getObjectType();
			$filePath = $this->getUploadDir().'/'.$fileObject->getObjectType();
			$filename = $cleanedDisplayName.'-'.$fileObject->getId().'.'.$this->getExtension($file);
			
			// Remove any existing files
			if ($fileObject->getPath() != '')
			{
				if (file_exists($rootPath.'/'.$fileObject->getPath()) && ($fileObject->getPath() != ''))
				{
	    			unlink($rootPath.'/'.$fileObject->getPath());
	    		}
	    	}
    				
			// Process the file
	    	rename($this->getTemporaryUploadRootDir().'/'.$file, $rootPath.'/'.$filename);
	    	$fileObject->setPath('/'.$filePath.'/'.$filename);
	    	$fileObject->setFileType($this->getExtension($file));
    		$fileObject->setFileSize($this->getFileSize($rootPath.'/'.$filename));
		    
		    // Update the file details
		    $fileObject->setDisplayName($displayName);
		    $fileObject->setDescription($description);
    		$fileObject->setDisplayOrder($displayOrder);
    		$em->persist($fileObject);
    		$em->flush();
		    
		    return $fileObject;
		    
		} elseif ($fileObject) {
			// Update the file details
		    $fileObject->setDisplayName($displayName);
		    $fileObject->setDescription($description);
    		$fileObject->setDisplayOrder($displayOrder);
    		$em->persist($fileObject);
    		$em->flush();
		    
		    return $fileObject;
		} 
		
    	return false;
    }
        
    // Delete a file
    public function deleteFile($fileObject)
    {
    	// Check if file exists and is valid
    	if ($fileObject)
    	{
    		// Get the doctrine service
    		$doctrineService = $this->container->get('doctrine');
    	
    		// Get the entity manager
    		$em = $doctrineService->getEntityManager();
		
			// Get the path
			$filePath = $this->getUploadRootDir().'/'.$fileObject->getObjectType();
			
			// Remove any existing files
			if (file_exists($filePath.'/'.$fileObject->getPath()) && ($fileObject->getPath() != ''))
			{
    			unlink($filePath.'/'.$fileObject->getPath());
    		}
    				
			// Remove the file from the database
			$em->remove($fileObject);
			$em->flush();
		    
		    return true;
		    
		}   
		
    	return false;
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
        return 'uploads/documents';
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
    
    // Get a file size
    public function getFileSize($filename = '')
    {
    	if ($filename != '')
    	{
    		$fileSize = filesize($filename);
	    	if ($fileSize < 1024)
	    	{
	    		$fileSize = number_format($fileSize, 0, '.', '').'B';
	    	} elseif (($fileSize > 1024) && ($fileSize < 1048576)) {
	    		$fileSize = number_format(($fileSize / 1024), 1, '.', '').'KB';
	    	} elseif (($fileSize > 1048576) && ($fileSize < 1073741824)) {
	    		$fileSize = number_format(($fileSize / (1024 * 1024)), 1, '.', '').'MB';
	    	} elseif (($fileSize > 1073741824) && ($fileSize < 1099511627776)) {
	    		$fileSize = number_format(($fileSize / (1024 * 1024 * 1024)), 1, '.', '').'GB';
	    	} elseif (($fileSize > 1099511627776) && ($fileSize < 1125899906842620)) {
	    		$fileSize = number_format(($fileSize / (1024 * 1024 * 1024 * 1024)), 1, '.', '').'TB';
	    	} else {
	    		$fileSize = '0B';
	    	}
	    	return $fileSize;
	    }
    	return '0B';
    }
}