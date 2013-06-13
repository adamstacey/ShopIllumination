<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Image;
use WebIllumination\AdminBundle\Entity\Redirect;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\Guarantee;
use WebIllumination\AdminBundle\Entity\Contact;
use WebIllumination\AdminBundle\Entity\ContactNumber;
use WebIllumination\AdminBundle\Entity\ContactAddress;
use WebIllumination\AdminBundle\Entity\ContactEmailAddress;
use WebIllumination\AdminBundle\Entity\ContactWebAddress;
use WebIllumination\AdminBundle\Entity\CrawlError;

class SystemController extends Controller
{        
    // Crawl Errors
    public function crawlErrorsAction(Request $request)
    {   		
   		// Get the services
   		$systemService = $this->get('web_illumination_admin.system_service');
    	
    	// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Setup the data array
    	$data = array();
    	$data['importFile'] = '';
    	
    	// Get the crawl errors
    	if ($request->getMethod() == 'POST')
    	{
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
    		
    		// Get submitted data
    		$importFileName = $request->request->get('import-file');
    		$importFile = $this->getTemporaryUploadRootDir().'/'.$importFileName;
    		$importFileExtension = $this->getExtension($importFile);
    		$delimiter = ($importFileExtension == 'csv'?',':"\t");
    		
    		// Read file
    		$importFileHandle = fopen($importFile, 'r');
    		$priceIssuesFound = array();
    		$noUpdatesRequired = array();
    		$pricesUpdated = array();
    		$totalImports = 0;
		    while (($fileLine = fgets($importFileHandle, filesize($importFile))) !== false)
		    {
	    		$lineObject = explode($delimiter, $fileLine);
	    		if (sizeof($lineObject) == 2)
	    		{
		    		$importContent = array();
		    		$importContent['productCode'] = $lineObject[0];
		    		$importContent['newPrice'] = $lineObject[1] * 1;
		    		if ($importContent['productCode'] && ($importContent['newPrice'] > 0))
		    		{
		    			$totalImports++;
			    		$productObject = $em->getRepository('KAC\SiteBundle\Entity\Product')->findOneBy(array('productCode' => $importContent['productCode']));
			    		if ($productObject)
			    		{
				    		$importContent['productId'] = $productObject->getId();
				    		$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $importContent['productId']));
				    		$productPriceObject = $em->getRepository('KAC\SiteBundle\Entity\ProductPrice')->findOneBy(array('productId' => $importContent['productId'], 'displayOrder' => 1), array('listPrice' => 'ASC'));
				    		if ($productIndexObject && $productPriceObject)
				    		{
				    			$importContent['pageTitle'] = $productIndexObject->getPageTitle();
					    		$importContent['existingPrice'] = $productPriceObject->getListPrice() * 1;
					    		if ($importContent['existingPrice'] == $importContent['newPrice'])
					    		{
					    			$noUpdatesRequired[] = $importContent;
					    		} else {
					    			$pricesUpdated[] = $importContent;
					    		}
					    		
					    		// Check if prices need to be updated
					    		if ($action == 'update')
					    		{
					    			$productPriceObject->setListPrice($importContent['newPrice']);
					    			if ($resetRecommendedRetailPrice > 0)
					    			{
						    			$productPriceObject->setRecommendedRetailPrice($importContent['newPrice']);
					    			}
					    			$em->persist($productPriceObject);
					    			$productIndexObject->setListPrice($importContent['newPrice']);
					    			if ($resetRecommendedRetailPrice > 0)
					    			{
						    			$productIndexObject->setRecommendedRetailPrice($importContent['newPrice']);
					    			}
					    			$em->persist($productIndexObject);
					    			
					    			// Flush the database
					    			$em->flush();
					    		}					    		
				    		} else {
					    		$priceIssuesFound[] = $importContent;
				    		}
			    		} else {
					    	$priceIssuesFound[] = $importContent;
				    	}
		    		}
	    		}
			}
			fclose($importFileHandle);
			
			// Update the data array
			if ($action == 'check')
			{
				$action = 'update';
			}
	    	$data['action'] = $action;
	    	$data['header'] = $header;
	    	$data['importFile'] = $importFileName;
	    	$data['totalImports'] = $totalImports;
	    	$data['priceIssuesFound'] = $priceIssuesFound;
	    	$data['noUpdatesRequired'] = $noUpdatesRequired;
	    	$data['pricesUpdated'] = $pricesUpdated;
						
			// Set success message
		    $this->get('session')->setFlash('success', 'The prices have been successfully imported.');
    	}
    	    	
    	return $this->render('WebIlluminationAdminBundle:Products:priceImport.html.twig', array('data' => $data));
    }
    
    // Build URL
    public function buildUrlAction(Request $request)
    {   		
   		// Get the services
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	$departmentService = $this->get('web_illumination_admin.department_service');
    	$productService = $this->get('web_illumination_admin.product_service');
    	    	    	    	
    	// Get the brands
    	$brands = apc_fetch('kitchen_appliance_centre_full_brand_list');
    	if (!$brands)
    	{
    		// Get a list of brands
    		$brands = $brandService->getFullBrandList();
    		apc_store('kitchen_appliance_centre_full_brand_list', $brands);
    	}
    	
    	// Get the departments
    	$departments = apc_fetch('kitchen_appliance_centre_full_department_list');
    	if (!$departments)
    	{
    		// Get a list of departments
    		$departments = $departmentService->getFullDepartmentList();
    		apc_store('kitchen_appliance_centre_full_department_list', $departments);
    	}
    	
    	// Get the products
	    $products = $productService->getAllProducts();
    	
    	// Setup the data array
    	$data = array('brands' => $brands, 'departments' => $departments, 'products' => $products);
    	    	
    	return $this->render('WebIlluminationAdminBundle:System:buildUrl.html.twig', array('data' => $data));
    }
    
    // Get URL
    public function ajaxGetUrlAction(Request $request)
    {
    	// Get the services
    	$productService = $this->get('web_illumination_admin.product_service');
    	
		// Get submitted data
		$productId = $request->query->get('productId');
		$group = $request->query->get('group');
		$departmentId = $request->query->get('departmentId');
		$brandId = $request->query->get('brandId');

		// Get the URL
		$url = 'ERROR! URL could not be generated.';
		if ($productId > 0)
		{
			$productObject = $productService->getProduct($productId);
			if ($productObject)
			{
				if ($group > 0)
				{
					$productGroupId = $productObject->getProductGroupId();
					$productGroupObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Product')->findBy(array('productGroupId' => $productGroupId));
					if (sizeof($productGroupObjects) > 1)
					{
						$departmentUrl = $product['departments'][0]['path'];
						$url = $this->get('router')->generate('department_with_group', array('url' => $departmentUrl, 'group' => $productGroupId));
					} else {
						$url = $productObject['url'];
						$url = $this->get('router')->generate('routing', array('url' => $url));
					}
				} else {
					$url = $productObject['url'];
					$url = $this->get('router')->generate('routing', array('url' => $url));
				}
			}
		} elseif (($brandId > 0) && ($departmentId > 0)) {
			$brandRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'brand', 'objectId' => $brandId, 'locale' => 'en'));
			$departmentRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $departmentId, 'locale' => 'en'));
			if ($brandRoutingObject && $departmentRoutingObject)
			{
				$brandUrl = $brandRoutingObject->getUrl();
				$departmentUrl = $departmentRoutingObject->getUrl();
				$url = $this->get('router')->generate('department_with_brand', array('brand' => $brandUrl, 'url' => $departmentUrl));
			}
		} elseif ($departmentId > 0) {
			$departmentRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'department', 'objectId' => $departmentId, 'locale' => 'en'));
			if ($departmentRoutingObject)
			{
				$url = $departmentRoutingObject->getUrl();
				$url = $this->get('router')->generate('routing', array('url' => $url));
			}
		} elseif ($brandId > 0) {
			$brandRoutingObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectType' => 'brand', 'objectId' => $brandId, 'locale' => 'en'));
			if ($brandRoutingObject)
			{
				$url = $brandRoutingObject->getUrl();
				$url = $this->get('router')->generate('routing', array('url' => $url));
			}
		}
		
		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'url' => $url)), ENT_NOQUOTES));
    }
    
    // Upload a file
    public function ajaxUploadFileAction(Request $request)
    {	
    	// Check if the upload is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
	    	$fileName = $request->query->get('qqfile');
	    	$filePath = __DIR__.'/../../../../web/uploads/temporary/';
	    	
	    	$imagePost = fopen("php://input", "r");
	        $temp = tmpfile();
	        stream_copy_to_stream($imagePost, $temp);
	        fclose($imagePost);
	        
	        $temporaryFile = fopen($filePath.$fileName, "w");        
	        fseek($temp, 0, SEEK_SET);
	        stream_copy_to_stream($temp, $temporaryFile);
	        fclose($temporaryFile);
	        
	        // Get the file size of the file
	        $fileSize = filesize($filePath.$fileName);
	        if ($fileSize < 1)
	        {
	        	return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'Error uploading file.')), ENT_NOQUOTES));
	        } else {
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
	        	}
	        }
	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'fileName' => $fileName, 'fileSize' => $fileSize)), ENT_NOQUOTES));

    	}
    	
    	throw new AccessDeniedException();
    }
    	
    // Get the images
    public function ajaxGetImagesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		$imageType = $request->query->get('imageType');
    		    		
    		// Check all data exists
    		if (!$objectId || !$objectType || !$imageType)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Get the images
    		$images = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Image')->findBy(array('objectId' => $objectId, 'objectType' => $objectType, 'imageType' => $imageType, 'locale' => 'en'), array('displayOrder' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetImages.html.twig', array('objectId' => $objectId, 'objectType' => $objectType, 'imageType' => $imageType, 'images' => $images));
		}

    	throw new AccessDeniedException();
    }
    
    // Add an image
    public function ajaxAddImageAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
   			$objectId = $request->query->get('objectId');
   			$objectType = $request->query->get('objectType');
   			
   			// Setup the title
   			$title = '';
   			
   			// Get a title
   			switch ($objectType)
   			{
   				case 'product':
   					// Get the product description object if it exists
					$productDecriptionObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ProductDescription')->find($objectId);
					if ($productDecriptionObject)
					{
						$title = $productDecriptionObject->getHeader();
					}
   					break;
   			}
   			
    		return $this->render('WebIlluminationAdminBundle:System:ajaxAddImage.html.twig', array('id' => $id, 'title' => $title, 'objectType' => $objectType));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update an image
    public function ajaxUpdateImageAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
   			$id = $request->query->get('id');
   			$file = $request->query->get('file');
   			$objectId = $request->query->get('objectId');
   			$objectType = $request->query->get('objectType');
   			$imageType = $request->query->get('imageType');
   			$locale = $request->query->get('locale');
   			$title = $request->query->get('title');
   			$description = $request->query->get('description');
   			$link = $request->query->get('link');
   			if ($link == 'http://')
			{
				$link = '';
			}
   			$alignment = $request->query->get('alignment');
   			$displayOrder = $request->query->get('displayOrder');
   			$elementIndex = $request->query->get('elementIndex');

			// Get the image object if it exists
			$imageObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Image')->find($id);
			
			// Get the image service
	    	$imageService = $this->get('web_illumination_admin.image_service');
    		    		
    		// Update the image
			if ($imageObject)
		    {
		    	// Update the image
		    	$imageObject = $imageService->updateImage($imageObject, $file, $title, $description, $link, $alignment, $displayOrder);
		    } else {
		    	// Process the image
		    	if ($file)
		    	{
		    		$imageObject = $imageService->processImage($file, $title, $description, $link, $alignment, $displayOrder, $objectType, $imageType, $objectId, $locale);
		    	} else {
		    		return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'No image was uploaded.', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    	}
		    }
    		
    		// Update the image based on what type it is
    		switch ($objectType)
    		{
				case 'product':
				    // Build the product index
				    $productService = $this->get('web_illumination_admin.product_service');
					$productService->rebuildProduct($imageObject->getObjectId());
				    break;
				default:
    				// Get the entity manager
   					$em = $this->getDoctrine()->getManager();
   					
					// Set the object index to rebuild the brand
    				$objectIndexObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => $imageObject->getObjectId(), 'objectType' => $objectType));
					foreach ($objectIndexObjects as $objectIndexObject)
					{
						$objectIndexObject->setRebuild(1);
						$em->persist($objectIndexObject);
		    			$em->flush();
					}
				    break;
    		}
    		
			return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $imageObject->getId(), 'title' => $imageObject->getTitle(), 'thumbnail' => $imageObject->getThumbnailPath().'?version='.date("dmYHis"), 'thumbnailWidth' => $imageObject->getThumbnailWidth(), 'thumbnailHeight' => $imageObject->getThumbnailHeight(), 'large' => $imageObject->getLargePath().'?version='.date("dmYHis"), 'largeWidth' => $imageObject->getLargeWidth(), 'largeHeight' => $imageObject->getLargeHeight(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete an image
    public function ajaxDeleteImageAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
   		
    		// Find image
    		$imageObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Image')->find($id);
    		if ($imageObject)
    		{
    			// Get the services
	    		$imageService = $this->get('web_illumination_admin.image_service');
	    		
	    		// Delete the image
	    		$imageService->deleteImage($imageObject);
	    		
	    		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}

		}

    	throw new AccessDeniedException();
    }
    
    // Get the files
    public function ajaxGetFilesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		    		
    		// Check all data exists
    		if (!$objectId || !$objectType)
    		{
    			throw new AccessDeniedException();
    		}
    		
    		// Get the files
    		$files = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\File')->findBy(array('objectId' => $objectId, 'objectType' => $objectType, 'locale' => 'en'), array('displayOrder' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetFiles.html.twig', array('objectId' => $objectId, 'objectType' => $objectType, 'files' => $files));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a file
    public function ajaxAddFileAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
   			$objectId = $request->query->get('objectId');
   			$objectType = $request->query->get('objectType');
   			   			
    		return $this->render('WebIlluminationAdminBundle:System:ajaxAddFile.html.twig', array('id' => $id, 'objectId' => $objectId, 'objectType' => $objectType));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update a file
    public function ajaxUpdateFileAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
   			$id = $request->query->get('id');
   			$file = $request->query->get('file');
   			$objectId = $request->query->get('objectId');
   			$objectType = $request->query->get('objectType');
   			$locale = $request->query->get('locale');
   			$displayName = $request->query->get('displayName');
   			$displayOrder = $request->query->get('displayOrder');
   			$elementIndex = $request->query->get('elementIndex');

			// Get the file object if it exists
			$fileObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\File')->find($id);
			
			// Get the file service
	    	$fileService = $this->get('web_illumination_admin.file_service');
			if ($fileObject)
		    {
		    	// Update the file
		    	$fileObject = $fileService->updateFile($fileObject, $file, $displayName, '', $displayOrder);
		    } else {
		    	// Process the file
		    	if ($file)
		    	{
		    		$fileObject = $fileService->processFile($file, $displayName, '', $displayOrder, $objectType, $objectId);
		    	} else {
		    		return new Response(htmlspecialchars(json_encode(array('response' => 'error', 'message' => 'No file was uploaded.', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    	}
		    }
			
			// Update the image based on what type it is
    		switch ($objectType)
    		{
				case 'product':
				    // Build the product index
				    $productService = $this->get('web_illumination_admin.product_service');
					$productService->rebuildProduct($fileObject->getObjectId());
				    break;
				default:
    				// Get the entity manager
   					$em = $this->getDoctrine()->getManager();
   					
					// Set the object index to rebuild the brand
    				$objectIndexObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ObjectIndex')->findBy(array('objectKey' => $fileObject->getObjectId(), 'objectType' => $objectType));
					foreach ($objectIndexObjects as $objectIndexObject)
					{
						$objectIndexObject->setRebuild(1);
						$em->persist($objectIndexObject);
		    			$em->flush();
					}
				    break;
    		}
			    		
			return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $fileObject->getId(), 'displayName' => $fileObject->getDisplayName(), 'path' => $fileObject->getPath().'?version='.date("dmYHis"), 'fileSize' => $fileObject->getFileSize(), 'fileType' => $fileObject->getFileType(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a file
    public function ajaxDeleteFileAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
   		
    		// Find file
    		$fileObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\File')->find($id);
    		if ($fileObject)
    		{
    			// Get the services
	    		$fileService = $this->get('web_illumination_admin.file_service');
	    		
	    		// Delete the file
	    		$fileService->deleteFile($fileObject);
	    		
	    		return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}

		}

    	throw new AccessDeniedException();
    }
    
    // Get the redirects
    public function ajaxGetRedirectsAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		    		    		    		
    		// Get the web address
    		$routing = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Routing')->findOneBy(array('objectId' => $objectId, 'objectType' => $objectType, 'locale' => 'en'));

    		if ($routing)
    		{
	    		// Get the redirects
	    		$redirects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->findBy(array('objectId' => $objectId, 'objectType' => $objectType), array('redirectFrom' => 'ASC'));
	    		
			    return $this->render('WebIlluminationAdminBundle:System:ajaxGetRedirects.html.twig', array('objectId' => $objectId, 'objectType' => $objectType, 'routing' => $routing, 'redirects' => $redirects));
			}
		}

    	throw new AccessDeniedException();
    }
    
    // Add a redirect
    public function ajaxAddRedirectAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		
    		return $this->render('WebIlluminationAdminBundle:System:ajaxAddRedirect.html.twig', array('id' => $id));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update a redirect
    public function ajaxUpdateRedirectAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->request->get('id');
    		$objectId = $request->request->get('objectId');
    		$objectType = $request->request->get('objectType');
    		$redirectFrom = $request->request->get('redirectFrom');
    		$redirectTo = $request->request->get('redirectTo');
    		$redirectCode = $request->request->get('redirectCode');
    		$elementIndex = $request->request->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find redirect
    		$redirect = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->find($id);
    		if (!$redirect)
    		{
    			$redirect = new Redirect();
    		}
    		$redirect->setObjectId($objectId);
    		$redirect->setObjectType($objectType);
    		$redirect->setRedirectFrom($redirectFrom);
    		$redirect->setRedirectTo($redirectTo);
    		$redirect->setRedirectCode($redirectCode);
		    $em->persist($redirect);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $redirect->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a redirect
    public function ajaxDeleteRedirectAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find redirect
    		$redirect = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Redirect')->find($id);
    		if ($redirect)
    		{
    			// Remove the redirect from the database
				$em->remove($redirect);
				$em->flush();
		    
		    	return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    }
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Get the guarantees
    public function ajaxGetGuaranteesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		    		
    		// Get the guarantees
    		$guarantees = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Guarantee')->findBy(array('objectId' => $objectId, 'objectType' => $objectType), array('displayOrder' => 'ASC'));
    		
    		// Get a list of guarantee types
    		$guaranteeTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\GuaranteeType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    	
    		// Get a list of guarantee lengths
    		$guaranteeLengths = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\GuaranteeLength')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetGuarantees.html.twig', array('objectId' => $objectId, 'objectType' => $objectType, 'guarantees' => $guarantees, 'guaranteeTypes' => $guaranteeTypes, 'guaranteeLengths' => $guaranteeLengths));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a guarantee
    public function ajaxAddGuaranteeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		
	    	// Get a list of guarantee types
	    	$guaranteeTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\GuaranteeType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	// Get a list of guarantee lengths
	    	$guaranteeLengths = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\GuaranteeLength')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddGuarantee.html.twig', array('id' => $id, 'guaranteeTypes' => $guaranteeTypes, 'guaranteeLengths' => $guaranteeLengths));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a guarantee
    public function ajaxUpdateGuaranteeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		$guaranteeTypeId = $request->query->get('guaranteeTypeId');
    		$guaranteeLengthId = $request->query->get('guaranteeLengthId');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find guarantee
    		$guarantee = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Guarantee')->find($id);
    		if (!$guarantee)
    		{
    			$guarantee = new Guarantee();
    		}
    		$guarantee->setObjectId($objectId);
    		$guarantee->setObjectType($objectType);
    		$guarantee->setGuaranteeTypeId($guaranteeTypeId);
    		$guarantee->setGuaranteeLengthId($guaranteeLengthId);
    		$guarantee->setDisplayOrder($displayOrder);
		    $em->persist($guarantee);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $guarantee->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a guarantee
    public function ajaxDeleteGuaranteeAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find guarantee
    		$guarantee = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Guarantee')->find($id);
    		if ($guarantee)
    		{
    			// Remove the guarantee from the database
				$em->remove($guarantee);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}
		    
		}

    	throw new AccessDeniedException();
    }
    
    // Get contacts
    public function ajaxGetContactsAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		
    		// Get the contacts
    		$contacts = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Contact')->findBy(array('objectId' => $objectId, 'objectType' => $objectType), array('displayOrder' => 'ASC'));
    		    		
    		// Get the contact titles
    		$contactTitles = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactTitle')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetContacts.html.twig', array('objectId' => $objectId, 'objectType' => $objectType, 'contacts' => $contacts, 'contactTitles' => $contactTitles));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a contact
    public function ajaxAddContactAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		
	    	// Get the contact titles
    		$contactTitles = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactTitle')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddContact.html.twig', array('id' => $id, 'contactTitles' => $contactTitles));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a contact
    public function ajaxUpdateContactAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$objectId = $request->query->get('objectId');
    		$objectType = $request->query->get('objectType');
    		$displayOrder = $request->query->get('displayOrder');
    		$displayName = $request->query->get('displayName');
    		$organisationName = $request->query->get('organisationName');
    		$contactTitleId = $request->query->get('contactTitleId');
    		$firstName = $request->query->get('firstName');
    		$middleName = $request->query->get('middleName');
    		$lastName = $request->query->get('lastName');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact
    		$contact = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Contact')->find($id);
    		if (!$contact)
    		{
    			$contact = new Contact();
    		}
    		$contact->setObjectId($objectId);
    		$contact->setObjectType($objectType);
    		$contact->setDisplayOrder($displayOrder);
    		$contact->setDisplayName($displayName);
    		$contact->setOrganisationName($organisationName);
    		$contact->setContactTitleId($contactTitleId);
    		$contact->setFirstName($firstName);
    		$contact->setMiddleName($middleName);
    		$contact->setlastName($lastName);
		    $em->persist($contact);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $contact->getId(), 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a contact
    public function ajaxDeleteContactAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact
    		$contactObject = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\Contact')->find($id);
    		if ($contactObject)
    		{
    			// Remove any addresses
    			$contactAddressObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddress')->findBy(array('contactId' => $id));
    			foreach ($contactAddressObjects as $contactAddressObject)
    			{
    				$em->remove($contactAddressObject);
    				$em->flush();
    			}
    			
    			// Remove any email addresses
    			$contactEmailAddressObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddress')->findBy(array('contactId' => $id));
    			foreach ($contactEmailAddressObjects as $contactEmailAddressObject)
    			{
    				$em->remove($contactEmailAddressObject);
    				$em->flush();
    			}
    			
    			// Remove any numbers
    			$contactNumberObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumber')->findBy(array('contactId' => $id));
    			foreach ($contactNumberObjects as $contactNumberObject)
    			{
    				$em->remove($contactNumberObject);
    				$em->flush();
    			}
    			
    			// Remove any web addresses
    			$contactWebAddressObjects = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddress')->findBy(array('contactId' => $id));
    			foreach ($contactWebAddressObjects as $contactWebAddressObject)
    			{
    				$em->remove($contactWebAddressObject);
    				$em->flush();
    			}
    			
    			// Remove the contact from the database
				$em->remove($contactObject);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}		    
		}
    	throw new AccessDeniedException();
    }
    
    // Get contact numbers
    public function ajaxGetContactNumbersAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$contactId = $request->query->get('contactId');
    		
    		// Get the contact numbers
    		$contactNumbers = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumber')->findBy(array('contactId' => $contactId), array('displayOrder' => 'ASC'));
    		    		
    		// Get the contact number types
    		$contactNumberTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumberType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetContactNumbers.html.twig', array('contactId' => $contactId, 'contactNumbers' => $contactNumbers, 'contactNumberTypes' => $contactNumberTypes));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a contact number
    public function ajaxAddContactNumberAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		
	    	// Get the contact number types
    		$contactNumberTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumberType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddContactNumber.html.twig', array('id' => $id, 'contactId' => $contactId, 'contactNumberTypes' => $contactNumberTypes));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a contact number
    public function ajaxUpdateContactNumberAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$number = $request->query->get('number');
    		$contactNumberTypeId = $request->query->get('contactNumberTypeId');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact number
    		$contactNumber = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumber')->find($id);
    		if (!$contactNumber)
    		{
    			$contactNumber = new ContactNumber();
    		}
    		$contactNumber->setContactNumberTypeId($contactNumberTypeId);
    		$contactNumber->setContactId($contactId);
    		$contactNumber->setDisplayOrder($displayOrder);
    		$contactNumber->setDisplayName($number);
    		$contactNumber->setNumber($number);
    		$contactNumber->setCountryCode('');
		    $em->persist($contactNumber);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $contactNumber->getId(), 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a contact number
    public function ajaxDeleteContactNumberAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact number
    		$contactNumber = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactNumber')->find($id);
    		if ($contactNumber)
    		{
    			// Remove the contact number from the database
				$em->remove($contactNumber);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}		    
		}
    	throw new AccessDeniedException();
    }
    
    // Get contact addresses
    public function ajaxGetContactAddressesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$contactId = $request->query->get('contactId');
    		
    		// Get the contact addresses
    		$contactAddresses = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddress')->findBy(array('contactId' => $contactId), array('displayOrder' => 'ASC'));
    		    		
    		// Get the contact address types
    		$contactAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		
    		// Get the contact titles
    		$contactTitles = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactTitle')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetContactAddresses.html.twig', array('contactId' => $contactId, 'contactAddresses' => $contactAddresses, 'contactAddressTypes' => $contactAddressTypes, 'contactTitles' => $contactTitles));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a contact address
    public function ajaxAddContactAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		
	    	// Get the contact address types
    		$contactAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		
    		// Get the contact titles
    		$contactTitles = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactTitle')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddContactAddress.html.twig', array('id' => $id, 'contactId' => $contactId, 'contactAddressTypes' => $contactAddressTypes, 'contactTitles' => $contactTitles));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a contact address
    public function ajaxUpdateContactAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$contactAddressTypeId = $request->query->get('contactAddressTypeId');
      		$organisationName = $request->query->get('organisationName');
      		$contactTitleId = $request->query->get('contactTitleId');
      		$firstName = $request->query->get('firstName');
      		$middleName = $request->query->get('middleName');
      		$lastName = $request->query->get('lastName');
      		$addressLine1 = $request->query->get('addressLine1');
      		$addressLine2 = $request->query->get('addressLine2');
      		$addressLine3 = $request->query->get('addressLine3');
      		$postZipCode = $request->query->get('postZipCode');
      		$townCity = $request->query->get('townCity');
      		$countyState = $request->query->get('countyState');
      		$countryCode = $request->query->get('countryCode');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		$displayName = '';
    		if ($organisationName)
    		{
    			$displayName = $organisationName;
    			if ($firstName || $lastName)
    			{
    				$displayName .= trim($firstName.' '.$lastName);
    			}
    		} else {
    			$displayName .= trim($firstName.' '.$lastName);
    		}
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact address
    		$contactAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddress')->find($id);
    		if (!$contactAddress)
    		{
    			$contactAddress = new ContactAddress();
    		}
    		$contactAddress->setContactAddressTypeId($contactAddressTypeId);
    		$contactAddress->setContactId($contactId);
    		$contactAddress->setDisplayOrder($displayOrder);
    		$contactAddress->setDisplayName($displayName);
    		$contactAddress->setOrganisationName($organisationName);
    		$contactAddress->setContactTitleId($contactTitleId);
    		$contactAddress->setFirstName($firstName);
    		$contactAddress->setMiddleName($middleName);
    		$contactAddress->setLastName($lastName);
    		$contactAddress->setAddressLine1($addressLine1);
    		$contactAddress->setAddressLine2($addressLine2);
    		$contactAddress->setAddressLine3($addressLine3);
    		$contactAddress->setTownCity($townCity);
    		$contactAddress->setCountyState($countyState);
    		$contactAddress->setPostZipCode($postZipCode);
    		$contactAddress->setCountryCode($countryCode);
		    $em->persist($contactAddress);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $contactAddress->getId(), 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a contact address
    public function ajaxDeleteContactAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact address
    		$contactAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactAddress')->find($id);
    		if ($contactAddress)
    		{
    			// Remove the contact address from the database
				$em->remove($contactAddress);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}		    
		}
    	throw new AccessDeniedException();
    }
    
    // Get contact email addresses
    public function ajaxGetContactEmailAddressesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$contactId = $request->query->get('contactId');
    		
    		// Get the contact email addresses
    		$contactEmailAddresses = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddress')->findBy(array('contactId' => $contactId), array('displayOrder' => 'ASC'));
    		    		
    		// Get the contact email addresses types
    		$contactEmailAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetContactEmailAddresses.html.twig', array('contactId' => $contactId, 'contactEmailAddresses' => $contactEmailAddresses, 'contactEmailAddressTypes' => $contactEmailAddressTypes));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a contact email addresses
    public function ajaxAddContactEmailAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		
	    	// Get the contact email addresses types
    		$contactEmailAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddContactEmailAddress.html.twig', array('id' => $id, 'contactId' => $contactId, 'contactEmailAddressTypes' => $contactEmailAddressTypes));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a contact email addresses
    public function ajaxUpdateContactEmailAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$contactEmailAddressTypeId = $request->query->get('contactEmailAddressTypeId');
      		$email = $request->query->get('email');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact email addresses
    		$contactEmailAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddress')->find($id);
    		if (!$contactEmailAddress)
    		{
    			$contactEmailAddress = new ContactEmailAddress();
    		}
    		$contactEmailAddress->setContactEmailAddressTypeId($contactEmailAddressTypeId);
    		$contactEmailAddress->setContactId($contactId);
    		$contactEmailAddress->setDisplayOrder($displayOrder);
    		$contactEmailAddress->setDisplayName($email);
    		$contactEmailAddress->setEmail($email);
		    $em->persist($contactEmailAddress);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $contactEmailAddress->getId(), 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a contact email addresses
    public function ajaxDeleteContactEmailAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact email addresses
    		$contactEmailAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactEmailAddress')->find($id);
    		if ($contactEmailAddress)
    		{
    			// Remove the contact email addresses from the database
				$em->remove($contactEmailAddress);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}		    
		}
    	throw new AccessDeniedException();
    }
    
    // Get contact web addresses
    public function ajaxGetContactWebAddressesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$contactId = $request->query->get('contactId');
    		
    		// Get the contact web addresses
    		$contactWebAddresses = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddress')->findBy(array('contactId' => $contactId), array('displayOrder' => 'ASC'));
    		    		
    		// Get the contact web addresses types
    		$contactWebAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
    		    		
		    return $this->render('WebIlluminationAdminBundle:System:ajaxGetContactWebAddresses.html.twig', array('contactId' => $contactId, 'contactWebAddresses' => $contactWebAddresses, 'contactWebAddressTypes' => $contactWebAddressTypes));
		}

    	throw new AccessDeniedException();
    }
    
    // Add a contact web addresses
    public function ajaxAddContactWebAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		
	    	// Get the contact web addresses types
    		$contactWebAddressTypes = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddressType')->findBy(array('locale' => 'en'), array('displayOrder' => 'ASC'));
	    	
	    	return $this->render('WebIlluminationAdminBundle:System:ajaxAddContactWebAddress.html.twig', array('id' => $id, 'contactId' => $contactId, 'contactWebAddressTypes' => $contactWebAddressTypes));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update a contact web addresses
    public function ajaxUpdateContactWebAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$contactWebAddressTypeId = $request->query->get('contactWebAddressTypeId');
      		$url = $request->query->get('url');
    		$displayOrder = $request->query->get('displayOrder');
    		$elementIndex = $request->query->get('elementIndex');
    		    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact web addresses
    		$contactWebAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddress')->find($id);
    		if (!$contactWebAddress)
    		{
    			$contactWebAddress = new ContactWebAddress();
    		}
    		$contactWebAddress->setContactWebAddressTypeId($contactWebAddressTypeId);
    		$contactWebAddress->setContactId($contactId);
    		$contactWebAddress->setDisplayOrder($displayOrder);
    		$contactWebAddress->setDisplayName($url);
    		$contactWebAddress->setUrl($url);
		    $em->persist($contactWebAddress);
		    $em->flush();
		    
		    return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $contactWebAddress->getId(), 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
		}

    	throw new AccessDeniedException();
    }
    
    // Delete a contact web addresses
    public function ajaxDeleteContactWebAddressAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$contactId = $request->query->get('contactId');
    		$elementIndex = $request->query->get('elementIndex');
    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getManager();
   		
    		// Find contact web addresses
    		$contactWebAddress = $this->getDoctrine()->getRepository('KAC\SiteBundle\Entity\ContactWebAddress')->find($id);
    		if ($contactWebAddress)
    		{
    			// Remove the contact web addresses from the database
				$em->remove($contactWebAddress);
				$em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'contactId' => $contactId, 'elementIndex' => $elementIndex)), ENT_NOQUOTES));
    		}		    
		}
    	throw new AccessDeniedException();
    }
}
