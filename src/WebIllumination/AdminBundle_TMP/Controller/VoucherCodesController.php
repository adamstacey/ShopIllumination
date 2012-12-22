<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\VoucherCode;

class VoucherCodesController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		$brandService = $this->get('web_illumination_admin.brand_service');
		$departmentService = $this->get('web_illumination_admin.department_service');
		$productService = $this->get('web_illumination_admin.product_service');
    	
    	// Get the settings session
    	$systemService->initialiseSettingsSession();
    	$settings = $this->container->get('session')->get('settings');
    	
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
    	
    	// Get the dates for the new voucher code
    	$validFromDate = new \DateTime();
    	$expiryDate = new \DateTime(date("Y-m-d", strtotime("+30 days")));
    	
        return $this->render('WebIlluminationAdminBundle:VoucherCodes:index.html.twig', array('settings' => $settings, 'brands' => $brands, 'departments' => $departments, 'products' => $products, 'validFromDate' => $validFromDate, 'expiryDate' => $expiryDate));
    }
	    
    // Delete an order
	public function ajaxDeleteOrderAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get submitted data
    		$id = $request->query->get('id');
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Delete the order
	    	if ($orderService->deleteOrder($id))
	    	{
	    		return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    	}
	    }
	    
	    throw new AccessDeniedException();
    }
	
	// Get the listing
	public function ajaxGetListingAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the services
			$brandService = $this->get('web_illumination_admin.brand_service');
			$departmentService = $this->get('web_illumination_admin.department_service');
			$productService = $this->get('web_illumination_admin.product_service');
		
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
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
    		
    		// Get submitted data
    		$voucherCode = $request->query->get('voucherCode');
    		$active = $request->query->get('active');
    		$discountType = $request->query->get('discountType');
    		$discountUse = $request->query->get('discountUse');
    		$minimumOrderValueFrom = $request->query->get('minimumOrderValueFrom');
    		$minimumOrderValueTo = $request->query->get('minimumOrderValueTo');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
    		$sortOrder = ($request->query->get('sortOrder')?$request->query->get('sortOrder'):$settings['admin']['voucherCodes']['listingSortOrder']);
    		$sortOrderObject = explode(':', $sortOrder);
    		$sort = ($sortOrderObject[0]?$sortOrderObject[0]:$settings['admin']['voucherCodes']['listingSort']);
    		$order = ($sortOrderObject[1]?$sortOrderObject[1]:$settings['admin']['voucherCodes']['listingOrder']);
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['voucherCodes']['listingMaxResults']);
    		
    		// Update settings
    		$settings['admin']['voucherCodes']['listingSortOrder'] = $sortOrder;
    		$settings['admin']['voucherCodes']['listingSort'] = $sort;
    		$settings['admin']['voucherCodes']['listingOrder'] = $order;
    		$settings['admin']['voucherCodes']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
    		
	   		// Get the services
	    	$voucherCodeService = $this->get('web_illumination_admin.voucher_code_service');
	    	
	    	// Get the voucher codes
	    	$voucherCodes = $voucherCodeService->getListing($voucherCode, $active, $discountType, $discountUse, $minimumOrderValueFrom, $minimumOrderValueTo, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $sort, $order, $page, $maxResults);
	    	
	    	if (!$voucherCodes)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:VoucherCodes:ajaxGetListing.html.twig', array('voucherCodes' => $voucherCodes, 'brands' => $brands, 'departments' => $departments, 'products' => $products));
	    }
	    
	    throw new AccessDeniedException();
    }
            
    // Get listing count
    public function ajaxGetListingCountAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$voucherCode = $request->query->get('voucherCode');
    		$active = $request->query->get('active');
    		$discountType = $request->query->get('discountType');
    		$discountUse = $request->query->get('discountUse');
    		$minimumOrderValueFrom = $request->query->get('minimumOrderValueFrom');
    		$minimumOrderValueTo = $request->query->get('minimumOrderValueTo');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
	   		
	   		// Get the services
	    	$voucherCodeService = $this->get('web_illumination_admin.voucher_code_service');
	    	
	    	// Get the listing count
	    	$listingCount = $voucherCodeService->getListingCount($voucherCode, $active, $discountType, $discountUse, $minimumOrderValueFrom, $minimumOrderValueTo, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo);
	    		        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get product listing pagination
    public function ajaxGetListingPaginationAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get the settings
    		$settings = $this->get('session')->get('settings');
    		
    		// Get submitted data
    		$voucherCode = $request->query->get('voucherCode');
    		$active = $request->query->get('active');
    		$discountType = $request->query->get('discountType');
    		$discountUse = $request->query->get('discountUse');
    		$minimumOrderValueFrom = $request->query->get('minimumOrderValueFrom');
    		$minimumOrderValueTo = $request->query->get('minimumOrderValueTo');
    		$validFromDateFrom = $request->query->get('validFromDateFrom');
    		$validFromDateTo = $request->query->get('validFromDateTo');
    		$expiryDateFrom = $request->query->get('expiryDateFrom');
    		$expiryDateTo = $request->query->get('expiryDateTo');
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['voucherCodes']['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['admin']['voucherCodes']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	   		// Get the services
	    	$voucherCodeService = $this->get('web_illumination_admin.voucher_code_service');
	    	
	    	// Get the listing pagingation
	    	$pagination = $voucherCodeService->getListingPagination($voucherCode, $active, $discountType, $discountUse, $minimumOrderValueFrom, $minimumOrderValueTo, $validFromDateFrom, $validFromDateTo, $expiryDateFrom, $expiryDateTo, $maxResults);
	        	        
	       return $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Add new voucher code
	public function ajaxAddVoucherCodeAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get the admin
    		$admin = $this->get('session')->get('admin');
   			
   			// Get submitted data
    		$code = strtoupper($request->request->get('code'));
    		$description = $request->request->get('description');
    		$minimumOrderValue = $request->request->get('minimumOrderValue');
    		$discountType = $request->request->get('discountType');
    		$discountUse = $request->request->get('discountUse');
    		$numberOfUses = $request->request->get('numberOfUses');
    		$validFromDate = new \DateTime($request->request->get('validFromDate'));
    		$expiryDate = new \DateTime($request->request->get('expiryDate'));  		
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = new VoucherCode();
	    	$voucherCodeObject->setCode($code);
	    	$voucherCodeObject->setDescription($description);
	    	$voucherCodeObject->setMinimumOrderValue($minimumOrderValue);
	    	$voucherCodeObject->setDiscount(0);
	    	$voucherCodeObject->setDiscountType($discountType);
	    	$voucherCodeObject->setDiscountUse($discountUse);
	    	$voucherCodeObject->setNumberOfUses($numberOfUses);
	    	$voucherCodeObject->setNumberUsed(0);
	    	$voucherCodeObject->setBrands('');
	    	$voucherCodeObject->setDepartments('');
	    	$voucherCodeObject->setProducts('');
	    	$voucherCodeObject->setOrders('');
	    	$voucherCodeObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
	    	$voucherCodeObject->setActive(1);
	    	$voucherCodeObject->setValidFromDate($validFromDate);
	    	$voucherCodeObject->setExpiryDate($expiryDate);
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Save the voucher code
	public function ajaxSaveVoucherCodeAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->request->get('id');
    		$code = strtoupper($request->request->get('code'));
    		$description = $request->request->get('description');
    		$minimumOrderValue = $request->request->get('minimumOrderValue');
    		$discountType = $request->request->get('discountType');
    		$discountUse = $request->request->get('discountUse');
    		$numberOfUses = $request->request->get('numberOfUses');
    		$validFromDate = new \DateTime($request->request->get('validFromDate'));
    		$expiryDate = new \DateTime($request->request->get('expiryDate'));
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setCode($code);
	    	$voucherCodeObject->setDescription($description);
	    	$voucherCodeObject->setMinimumOrderValue($minimumOrderValue);
	    	$voucherCodeObject->setDiscountType($discountType);
	    	$voucherCodeObject->setDiscountUse($discountUse);
	    	$voucherCodeObject->setNumberOfUses($numberOfUses);
	    	$voucherCodeObject->setValidFromDate($validFromDate);
	    	$voucherCodeObject->setExpiryDate($expiryDate);
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Save the discount
	public function ajaxSaveDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$discount = $request->query->get('discount');
    		if ($discount == 0)
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setDiscount($discount);
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	   		    	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get the brand discounts
	public function ajaxGetBrandDiscountsAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the brands and the discount
	    	$brandDiscounts = array();
	    	$brands = explode('|', $voucherCodeObject->getBrands());
	    	if (sizeof($brands) > 0)
	    	{
		    	foreach ($brands as $brand)
		    	{
		    		if ($brand)
		    		{
			    		$discountBreakdown = explode(':', $brand);
			    		$brandId = $discountBreakdown[0];
			    		$brandDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $brandId));
			    		$discount = $discountBreakdown[1];
			    		$brandDiscounts[] = array('brandId' => $brandId, 'brand' => $brandDescriptionObject->getBrand(), 'discount' => $discount);
			    	}
		    	}
			}	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:VoucherCodes:ajaxGetBrandDiscounts.html.twig', array('voucherCode' => $voucherCodeObject, 'brandDiscounts' => $brandDiscounts));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Add a brand discount
	public function ajaxAddBrandDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$newBrandId = $request->query->get('brandId');
    		$newDiscount = $request->query->get('discount');
    		if (($newBrandId == 0) || ($newDiscount == 0))
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the brands and the discount
	    	$brandDiscounts = array();
	    	$brandsToSort = array();
	    	$brandIdsToSort = array();
	    	$discountsToSort = array();
	    	$newBrand = true;
	    	$brands = explode('|', $voucherCodeObject->getBrands());
	    	if (sizeof($brands) > 0)
	    	{
		    	foreach ($brands as $brand)
		    	{
		    		if ($brand)
		    		{
			    		$discountBreakdown = explode(':', $brand);
			    		$brandId = $discountBreakdown[0];
			    		$brandDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $brandId));
			    		$brand = $brandDescriptionObject->getBrand();
			    		$discount = $discountBreakdown[1];
			    		if ($brandId == $newBrandId)
			    		{
			    			$brandsToSort[] = $brand;
			    			$brandIdsToSort[] = $brandId;
			    			$discountsToSort[] = $newDiscount;
			    			$newBrand = false;
			    		} else {
			    			$brandsToSort[] = $brand;
			    			$brandIdsToSort[] = $brandId;
			    			$discountsToSort[] = $discount;
			    		}
			    	}
		    	}
		    }
	    	if ($newBrand)
	    	{
	    		$brandsToSort[] = $brand;
	    		$brandIdsToSort[] = $newBrandId;
	    		$discountsToSort[] = $newDiscount;
	    	}
	    	
	    	// Sort the lists
	    	array_multisort($brandsToSort, $brandIdsToSort, $discountsToSort);
	    	foreach ($brandIdsToSort as $key => $value)
	    	{
	    		$brandDiscounts[] = $brandIdsToSort[$key].':'.$discountsToSort[$key];
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setBrands(join('|', $brandDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete a brand discount
	public function ajaxDeleteBrandDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$brandIdToDelete = $request->query->get('brandId');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the brands and the discount
	    	$brandDiscounts = array();
	    	$brands = explode('|', $voucherCodeObject->getBrands());
	    	foreach ($brands as $brand)
	    	{
	    		$discountBreakdown = explode(':', $brand);
	    		$brandId = $discountBreakdown[0];
	    		$discount = $discountBreakdown[1];
	    		if ($brandId != $brandIdToDelete)
	    		{
	    			$brandDiscounts[] = $brandId.':'.$discount;
	    		}
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setBrands(join('|', $brandDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get the department discounts
	public function ajaxGetDepartmentDiscountsAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the departments and the discount
	    	$departmentDiscounts = array();
	    	$departments = explode('|', $voucherCodeObject->getDepartments());
	    	if (sizeof($departments) > 0)
	    	{
		    	foreach ($departments as $department)
		    	{
		    		if ($department)
		    		{
			    		$discountBreakdown = explode(':', $department);
			    		$departmentId = $discountBreakdown[0];
			    		$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentId));
			    		$discount = $discountBreakdown[1];
			    		$departmentDiscounts[] = array('departmentId' => $departmentId, 'department' => $departmentDescriptionObject->getName(), 'discount' => $discount);
			    	}
		    	}
			}	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:VoucherCodes:ajaxGetDepartmentDiscounts.html.twig', array('voucherCode' => $voucherCodeObject, 'departmentDiscounts' => $departmentDiscounts));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Add a department discount
	public function ajaxAddDepartmentDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$newDepartmentId = $request->query->get('departmentId');
    		$newDiscount = $request->query->get('discount');
    		if (($newDepartmentId == 0) || ($newDiscount == 0))
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the departments and the discount
	    	$departmentDiscounts = array();
	    	$departmentsToSort = array();
	    	$departmentIdsToSort = array();
	    	$discountsToSort = array();
	    	$newDepartment = true;
	    	$departments = explode('|', $voucherCodeObject->getDepartments());
	    	if (sizeof($departments) > 0)
	    	{
		    	foreach ($departments as $department)
		    	{
		    		if ($department)
		    		{
			    		$discountBreakdown = explode(':', $department);
			    		$departmentId = $discountBreakdown[0];
			    		$departmentDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentDescription')->findOneBy(array('departmentId' => $departmentId));
			    		$department = $departmentDescriptionObject->getName();
			    		$discount = $discountBreakdown[1];
			    		if ($departmentId == $newDepartmentId)
			    		{
			    			$departmentsToSort[] = $department;
			    			$departmentIdsToSort[] = $departmentId;
			    			$discountsToSort[] = $newDiscount;
			    			$newDepartment = false;
			    		} else {
			    			$departmentsToSort[] = $department;
			    			$departmentIdsToSort[] = $departmentId;
			    			$discountsToSort[] = $discount;
			    		}
			    	}
		    	}
	    	}
	    	if ($newDepartment)
	    	{
	    		$departmentsToSort[] = $department;
	    		$departmentIdsToSort[] = $newDepartmentId;
	    		$discountsToSort[] = $newDiscount;
	    	}
	    	
	    	// Sort the lists
	    	array_multisort($departmentsToSort, $departmentIdsToSort, $discountsToSort);
	    	foreach ($departmentIdsToSort as $key => $value)
	    	{
	    		$departmentDiscounts[] = $departmentIdsToSort[$key].':'.$discountsToSort[$key];
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setDepartments(join('|', $departmentDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete a department discount
	public function ajaxDeleteDepartmentDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$departmentIdToDelete = $request->query->get('departmentId');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the departments and the discount
	    	$departmentDiscounts = array();
	    	$departments = explode('|', $voucherCodeObject->getDepartments());
	    	foreach ($departments as $department)
	    	{
	    		$discountBreakdown = explode(':', $department);
	    		$departmentId = $discountBreakdown[0];
	    		$discount = $discountBreakdown[1];
	    		if ($departmentId != $departmentIdToDelete)
	    		{
	    			$departmentDiscounts[] = $departmentId.':'.$discount;
	    		}
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setDepartments(join('|', $departmentDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Get the product discounts
	public function ajaxGetProductDiscountsAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the products and the discount
	    	$productDiscounts = array();
	    	$products = explode('|', $voucherCodeObject->getProducts());
	    	if (sizeof($products) > 0)
	    	{
		    	foreach ($products as $product)
		    	{
		    		if ($product)
		    		{
			    		$discountBreakdown = explode(':', $product);
			    		$productId = $discountBreakdown[0];
			    		$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $productId));
			    		$discount = $discountBreakdown[1];
			    		$productDiscounts[] = array('productId' => $productId, 'product' => $productDescriptionObject->getHeader(), 'discount' => $discount);
			    	}
		    	}
			}	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:VoucherCodes:ajaxGetProductDiscounts.html.twig', array('voucherCode' => $voucherCodeObject, 'productDiscounts' => $productDiscounts));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Add a product discount
	public function ajaxAddProductDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$newProductId = $request->query->get('productId');
    		$newDiscount = $request->query->get('discount');
    		if (($newProductId == 0) || ($newDiscount == 0))
	    	{
	    		throw new AccessDeniedException();
	    	}
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the products and the discount
	    	$productDiscounts = array();
	    	$productsToSort = array();
	    	$productIdsToSort = array();
	    	$discountsToSort = array();
	    	$newProduct = true;
	    	$products = explode('|', $voucherCodeObject->getProducts());
	    	if (sizeof($products) > 0)
	    	{
		    	foreach ($products as $product)
		    	{
		    		if ($product)
		    		{
			    		$discountBreakdown = explode(':', $product);
			    		$productId = $discountBreakdown[0];
			    		$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $productId));
			    		$product = $productDescriptionObject->getProduct();
			    		$discount = $discountBreakdown[1];
			    		if ($productId == $newproductId)
			    		{
			    			$productsToSort[] = $product;
			    			$productIdsToSort[] = $productId;
			    			$discountsToSort[] = $newDiscount;
			    			$newProduct = false;
			    		} else {
			    			$productsToSort[] = $product;
			    			$productIdsToSort[] = $productId;
			    			$discountsToSort[] = $discount;
			    		}
			    	}
		    	}
	    	}
	    	if ($newProduct)
	    	{
	    		$productsToSort[] = $product;
	    		$productIdsToSort[] = $newProductId;
	    		$discountsToSort[] = $newDiscount;
	    	}
	    	
	    	// Sort the lists
	    	array_multisort($productsToSort, $productIdsToSort, $discountsToSort);
	    	foreach ($productIdsToSort as $key => $value)
	    	{
	    		$productDiscounts[] = $productIdsToSort[$key].':'.$discountsToSort[$key];
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setProducts(join('|', $productDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete a product discount
	public function ajaxDeleteProductDiscountAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the entity manager
   			$em = $this->getDoctrine()->getEntityManager();
   			
   			// Get submitted data
    		$id = $request->query->get('id');
    		$productIdToDelete = $request->query->get('productId');
    		    		
    		// Get the voucher code object
    		$voucherCodeObject = $em->getRepository('WebIlluminationAdminBundle:VoucherCode')->find($id);	    	
	    	if (!$voucherCodeObject)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	
	    	// Get the products and the discount
	    	$productDiscounts = array();
	    	$products = explode('|', $voucherCodeObject->getProducts());
	    	foreach ($products as $product)
	    	{
	    		$discountBreakdown = explode(':', $product);
	    		$productId = $discountBreakdown[0];
	    		$discount = $discountBreakdown[1];
	    		if ($productId != $productIdToDelete)
	    		{
	    			$productDiscounts[] = $productId.':'.$discount;
	    		}
	    	}
	    	
	    	// Update the voucher code
	    	$voucherCodeObject->setProducts(join('|', $productDiscounts));
	    	$em->persist($voucherCodeObject);
			$em->flush();
	    	  	
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
	    }
	    
	    throw new AccessDeniedException();
    }
}