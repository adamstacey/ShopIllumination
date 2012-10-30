<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\Brand;
use WebIllumination\AdminBundle\Entity\BrandDescription;
use WebIllumination\AdminBundle\Entity\Routing;
use WebIllumination\AdminBundle\Entity\Redirect;
use WebIllumination\AdminBundle\Entity\Image;
use WebIllumination\AdminBundle\Entity\Guarantee;
use WebIllumination\AdminBundle\Entity\OrderNote;

class OrdersController extends Controller
{
    public function indexAction()
    {
		// Get the services
		$systemService = $this->get('web_illumination_admin.system_service');
		
		// Initialise the session
    	$systemService->initialiseSettingsSession();
    	
    	// Get the settings session
    	$settings = $this->get('session')->get('settings');
    	
    	// Get the filters session
    	$filters = $this->get('session')->get('filters');
    	
    	// Setup the data array
    	$data = array();
    	
        return $this->render('WebIlluminationAdminBundle:Orders:index.html.twig', array('settings' => $settings['admin']['orders'], 'filters' => $filters['admin']['orders'], 'data' => $data));
    }
	
	// Get customer notes
    public function ajaxGetCustomerNotesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the order
	    	$order = $orderService->getOrder($id);
	    	if (!$order)
	    	{
	    		throw new AccessDeniedException();
	    	}
	        	        
	        return $this->render('WebIlluminationAdminBundle:Orders:ajaxGetCustomerNotes.html.twig', array('order' => $order));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get staff notes
    public function ajaxGetStaffNotesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the order
	    	$order = $orderService->getOrder($id);
	    	if (!$order)
	    	{
	    		throw new AccessDeniedException();
	    	}
	        	        
	        return $this->render('WebIlluminationAdminBundle:Orders:ajaxGetStaffNotes.html.twig', array('order' => $order));
    	}
    	
    	throw new AccessDeniedException();
    }
	
	// Add a customer note
	public function ajaxAddCustomerNoteAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the admin
    		$admin = $this->get('session')->get('admin');
    		
    		// Get submitted data
    		$orderId = $request->query->get('orderId');
    		$note = $request->query->get('note');
    		$notified = $request->query->get('notified');
    		
    		// Check to make sure order is valid
    		if (($orderId > 0) && ($note != ''))
    		{
	    		// Get the entity manager
			   	$em = $this->getDoctrine()->getEntityManager();
	    		    		
		   		// Add the new note
		    	$orderNoteObject = new OrderNote();
		    	$orderNoteObject->setOrderId($orderId);
		    	$orderNoteObject->setNoteType('customer');
		    	$orderNoteObject->setNotified($notified);
		    	$orderNoteObject->setNote($note);
		    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
		    	$em->persist($orderNoteObject);
			    $em->flush();
			    
			    // Update notes count on order
			    $orderObject = $em->getRepository('WebIlluminationAdminBundle:Order')->find($orderId);
		    	$orderNotes = $em->getRepository('WebIlluminationAdminBundle:OrderNote')->findBy(array('orderId' => $orderId));
		    	$orderObject->setNotesCount(sizeof($orderNotes));
		    	$em->persist($orderObject);
			    $em->flush();
			    
			    // Send the email
			    if ($notified > 0)
			    {
			    	// Get the order
			    	$order = $orderService->getOrder($orderId);
			    	if ($order)
			    	{
						try
						{
							$email = \Swift_Message::newInstance();
				        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$order['orderNumber']);
				        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
				        	$email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
				        	$email->setBody($this->renderView('WebIlluminationAdminBundle:Orders:message.html.twig', array('order' => $order, 'note' => $note)), 'text/html');
							$email->addPart($this->renderView('WebIlluminationAdminBundle:Orders:message.txt.twig', array('order' => $order, 'note' => $note)), 'text/plain');
				    		$this->get('mailer')->send($email);
						} catch (Exception $exception) {
							error_log('Error sending invoice email!');
					    	return false;
						}
					}
				}
						    	
		    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		    }
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Update the status of an order
	public function ajaxUpdateOrderStatusAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
    		
    		// Get submitted data
    		$id = $request->query->get('id');
    		$orderStatus = $request->query->get('orderStatus');
    		$notifyCustomer = $request->query->get('notifyCustomer');
    		
    		// Check to make sure order is valid
    		if (($id > 0) && ($orderStatus != ''))
    		{
	    		// Get the entity manager
			   	$em = $this->getDoctrine()->getEntityManager();
	    		    		
		   		// Update the order status
		    	$orderObject = $em->getRepository('WebIlluminationAdminBundle:Order')->find($id);
		    	$orderObject->setStatus($orderStatus);
		    	$em->persist($orderObject);
			    $em->flush();
			    
			    // Update the order documents
			    $orderService->generateOrderDocuments($id);
			    
			    // Send the email
			    if ($notifyCustomer > 0)
			    {
			    	// Get the order
			    	$order = $orderService->getOrder($id);
			    	if ($order)
			    	{
						try
						{
							$email = \Swift_Message::newInstance();
				        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$order['orderNumber']);
				        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
				        	$email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
				        	if ($orderStatus == 'Order Completed')
				        	{
				        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
				        		error_log('Review mail sent!');
				        	}
				        	$email->setBody($this->renderView('WebIlluminationAdminBundle:Orders:orderUpdate.html.twig', array('order' => $order, 'orderStatus' => $orderStatus)), 'text/html');
							$email->addPart($this->renderView('WebIlluminationAdminBundle:Orders:orderUpdate.txt.twig', array('order' => $order, 'orderStatus' => $orderStatus)), 'text/plain');
				    		$this->get('mailer')->send($email);
						} catch (Exception $exception) {
							error_log('Error sending order update!');
					    	return false;
						}
					}
				}
						    	
		    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		    }
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Add a staff note
	public function ajaxAddStaffNoteAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the admin
    		$admin = $this->get('session')->get('admin');
    		
    		// Get submitted data
    		$orderId = $request->query->get('orderId');
    		$note = $request->query->get('note');
    		$notified = 0;
    		
    		// Check to make sure order is valid
    		if (($orderId > 0) && ($note != ''))
    		{
	    		// Get the entity manager
			   	$em = $this->getDoctrine()->getEntityManager();
	    		    		
		   		// Add the new note
		    	$orderNoteObject = new OrderNote();
		    	$orderNoteObject->setOrderId($orderId);
		    	$orderNoteObject->setNoteType('staff');
		    	$orderNoteObject->setNotified($notified);
		    	$orderNoteObject->setNote($note);
		    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
		    	$em->persist($orderNoteObject);
			    $em->flush();
			    
			    // Update notes count on order
			    $orderObject = $em->getRepository('WebIlluminationAdminBundle:Order')->find($orderId);
		    	$orderNotes = $em->getRepository('WebIlluminationAdminBundle:OrderNote')->findBy(array('orderId' => $orderId));
		    	$orderObject->setNotesCount(sizeof($orderNotes));
		    	$em->persist($orderObject);
			    $em->flush();
			    						    	
		    	return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
		    } else {
		    	return new Response(htmlspecialchars(json_encode(array('response' => 'error')), ENT_NOQUOTES));	
		    }
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Delete a note
	public function ajaxDeleteNoteAction(Request $request)
    {
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{    		
    		// Get submitted data
    		$id = $request->query->get('id');
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
		   	
		   	// Delete the note
		   	$orderNoteObject = $em->getRepository('WebIlluminationAdminBundle:OrderNote')->find($id);
    		if ($orderNoteObject)
    		{
    			$orderId = $orderNoteObject->getOrderId();			    
    			$em->remove($orderNoteObject);
				$em->flush();
				
				// Update notes count on order
			    $orderObject = $em->getRepository('WebIlluminationAdminBundle:Order')->find($orderId);
		    	$orderNotes = $em->getRepository('WebIlluminationAdminBundle:OrderNote')->findBy(array('orderId' => $orderId));
		    	$orderObject->setNotesCount(sizeof($orderNotes));
		    	$em->persist($orderObject);
			    $em->flush();
				
				return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    		}
	    }
	    
	    throw new AccessDeniedException();
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
			$systemService = $this->get('web_illumination_admin.system_service');
	    	
	    	// Initialise the session
	    	$systemService->initialiseSettingsSession();
    	
    		// Get the settings
    		$sessionSettings = $this->get('session')->get('settings');
    		$settings = $sessionSettings['admin']['orders'];
    		
    		// Get the filters
    		$sessionFilters = $this->get('session')->get('filters');
    		$filters = $sessionFilters['admin']['orders'];
    		
    		// Get submitted data
    		$orderId = $request->query->get('orderId');
    		$customer = $request->query->get('customer');
    		$emailAddress = $request->query->get('emailAddress');
    		$status = $request->query->get('status');
    		$paymentType = $request->query->get('paymentType');
    		$deliveryType = $request->query->get('deliveryType');
    		$totalFrom = $request->query->get('totalFrom');
    		$totalTo = $request->query->get('totalTo');
    		$dateFrom = $request->query->get('dateFrom');
    		$dateTo = $request->query->get('dateTo');
    		$sortOrder = ($request->query->get('sortOrder')?$request->query->get('sortOrder'):$settings['admin']['orders']['listingSortOrder']);
    		$sortOrderObject = explode(':', $sortOrder);
    		$sort = ($sortOrderObject[0]?$sortOrderObject[0]:$settings['admin']['orders']['listingSort']);
    		$order = ($sortOrderObject[1]?$sortOrderObject[1]:$settings['admin']['orders']['listingOrder']);
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['orders']['listingMaxResults']);
    		    		
    		// Update settings
    		$settings['listingSortOrder'] = $sortOrder;
    		$settings['listingSort'] = $sort;
    		$settings['listingOrder'] = $order;
    		$settings['listingMaxResults'] = $maxResults;
    		$sessionSettings['admin']['orders'] = $settings;
    		$this->get('session')->set('settings', $sessionSettings);
    		
    		// Update filters
    		$filters['orderId'] = $orderId;
    		$filters['customer'] = $customer;
    		$filters['emailAddress'] = $emailAddress;
    		$filters['status'] = $status;
    		$filters['paymentType'] = $paymentType;
    		$filters['deliveryType'] = $deliveryType;
    		$filters['totalFrom'] = $totalFrom;
    		$filters['totalTo'] = $totalTo;
    		$filters['dateFrom'] = $dateFrom;
    		$filters['dateTo'] = $dateTo;
    		$sessionFilters['admin']['orders'] = $filters;
    		$this->get('session')->set('filters', $sessionFilters);
    		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the items
	    	$items = $orderService->getListing($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo, $sort, $order, $page, $maxResults);
	    	
	    	if (!$items)
	    	{
	    		throw new AccessDeniedException();
	    	}
	    	   		    	
	        return $this->render('WebIlluminationAdminBundle:Orders:ajaxGetListing.html.twig', array('settings' => $settings, 'filters' => $filters, 'items' => $items));
	    }
	    
	    throw new AccessDeniedException();
    }
    
    // Bulk print orders
    public function ajaxBulkPrintOrdersAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$ids = $request->query->get('ids');
    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
    		
	   		// Generate bulk orders
	   		$ordersDocument = $orderService->generateBulkOrdersForPrint($ids);
	   			        	         
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'ordersDocument' => $ordersDocument)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }    
    
    // Bulk print invoices
    public function ajaxBulkPrintInvoicesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$ids = $request->query->get('ids');
    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
    		
	   		// Generate bulk invoices
	   		$invoicesDocument = $orderService->generateBulkInvoicesForPrint($ids);
	   			        	         
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'invoicesDocument' => $invoicesDocument)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Bulk print delivery notes
    public function ajaxBulkPrintDeliveryNotesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$ids = $request->query->get('ids');
    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
    		
	   		// Generate bulk invoices
	   		$invoicesDocument = $orderService->generateBulkDeliveryNotesForPrint($ids);
	   			        	         
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'invoicesDocument' => $invoicesDocument)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Bulk print invoices and delivery notes
    public function ajaxBulkPrintInvoicesAndDeliveryNotesAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$ids = $request->query->get('ids');
    		
    		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
    		
	   		// Generate bulk invoices
	   		$invoicesDocument = $orderService->generateBulkInvoicesAndDeliveryNotesForPrint($ids);
	   			        	         
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'invoicesDocument' => $invoicesDocument)), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Re-generate all order documents
    public function regenerateAllOrderDocumentsAction(Request $request)
    {	
    
    	// Get the entity manager
	   	$em = $this->getDoctrine()->getEntityManager();
	   	
	   	$productIndexObjects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:ProductIndex')->findAll();
	   	foreach ($productIndexObjects as $productIndexObject)
	   	{
	   		// Get the product images
	   		if (!$productIndexObject->getOriginalPath() || !$productIndexObject->getMediumPath())
	   		{
	   			$imageObject = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Image')->findOneBy(array('objectType' => 'product', 'imageType' => 'product', 'objectId' => $productIndexObject->getProductId()));
		   		$productIndexObject->setOriginalPath($imageObject->getOriginalPath());
		   		$productIndexObject->setMediumPath($imageObject->getMediumPath());
	   			$em->persist($productIndexObject);
		    	$em->flush();
		    }
	   	}
		    		
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
    	
    	// Get orders
    	$orders = $orderService->getOrders();
    	foreach ($orders as $orderObject)
    	{
    		$orderService->generateOrderDocuments($orderObject->getId());
    	}
    	
    	// Set success message
		$this->get('session')->setFlash('success', 'The order documents have all been re-generated.');
		    
		// Forward to the brand
		return $this->redirect($this->get('router')->generate('orders'));
    }
    
    // Send invoice to customer
    public function ajaxSendInvoiceAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		
	   		// Send the invoice
	   		$this->sendInvoice($id);
	   			        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success')), ENT_NOQUOTES));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Update the print flags for an order
    public function ajaxUpdatePrintFlagsAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
    		$orderPrinted = $request->query->get('orderPrinted');
    		$deliveryNotePrinted = $request->query->get('deliveryNotePrinted');
    		
    		// Get the entity manager
		   	$em = $this->getDoctrine()->getEntityManager();
		   	
		   	// Update the print flags
		   	$orderObject = $em->getRepository('WebIlluminationAdminBundle:Order')->find($id);
		   	if ($orderObject)
		   	{
		   		$orderObject->setOrderPrinted($orderPrinted);
		   		
		   		// Check if the order by default has the delivery note attched, so we can set it as printed
		   		if ((strpos($orderObject->getDeliveryType(), 'Royal Mail') !== false) && ($orderPrinted > 0))
		   		{
			   		$deliveryNotePrinted = 1;
		   		}
			   	$orderObject->setDeliveryNotePrinted($deliveryNotePrinted);
			   	
			   	// Update the order status to processing if new order
			   	if ($orderObject->getStatus() == 'Payment Received')
			   	{
				   	$orderObject->setStatus('Processing Your Order');
			   	}
		   		
		   		$em->persist($orderObject);
		    	$em->flush();
		   	}
    		
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'id' => $id, 'orderPrinted' => $orderPrinted, 'deliveryNotePrinted' => $deliveryNotePrinted, )), ENT_NOQUOTES));
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
    		$orderId = $request->query->get('orderId');
    		$customer = $request->query->get('customer');
    		$emailAddress = $request->query->get('emailAddress');
    		$status = $request->query->get('status');
    		$paymentType = $request->query->get('paymentType');
    		$deliveryType = $request->query->get('deliveryType');
    		$totalFrom = $request->query->get('totalFrom');
    		$totalTo = $request->query->get('totalTo');
    		$dateFrom = $request->query->get('dateFrom');
    		$dateTo = $request->query->get('dateTo');
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the listing count
	    	$listingCount = $orderService->getListingCount($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo);
	    	
	    	// Get listing statistics
	    	$listingStatistics = $orderService->getListingStatistics($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo);
	        	        
	        return new Response(htmlspecialchars(json_encode(array('response' => 'success', 'listingCount' => $listingCount, 'listingStatistics' => $listingStatistics)), ENT_NOQUOTES));
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
    		$orderId = $request->query->get('orderId');
    		$customer = $request->query->get('customer');
    		$emailAddress = $request->query->get('emailAddress');
    		$status = $request->query->get('status');
    		$paymentType = $request->query->get('paymentType');
    		$deliveryType = $request->query->get('deliveryType');
    		$totalFrom = $request->query->get('totalFrom');
    		$totalTo = $request->query->get('totalTo');
    		$dateFrom = $request->query->get('dateFrom');
    		$dateTo = $request->query->get('dateTo');
    		$page = ($request->query->get('page')?$request->query->get('page'):1);
    		$maxResults = ($request->query->get('maxResults')?$request->query->get('maxResults'):$settings['admin']['orders']['listingMaxResults']);
    		$previousPage = $page - 1;
    		$nextPage = $page + 1;
    		
    		// Update settings
    		$settings['admin']['orders']['listingMaxResults'] = $maxResults;
    		$this->get('session')->set('settings', $settings);
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the listing pagingation
	    	$pagination = $orderService->getListingPagination($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo, $maxResults);
	        	        
	       return $this->render('WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig', array('page' => $page, 'maxResults' => $maxResults, 'pagination' => $pagination, 'previousPage' => $previousPage, 'nextPage' => $nextPage));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // Get order information
    public function ajaxGetOrderInformationAction(Request $request)
    {	
    	// Check if the request is through AJAX
    	if ($request->isXmlHttpRequest())
    	{
    		// Get submitted data
    		$id = $request->query->get('id');
	   		
	   		// Get the services
	    	$orderService = $this->get('web_illumination_admin.order_service');
	    	
	    	// Get the order
	    	$order = $orderService->getOrder($id);
	    	if (!$order)
	    	{
	    		throw new AccessDeniedException();
	    	}
	        	        
	        return $this->render('WebIlluminationAdminBundle:Orders:ajaxGetOrderInformation.html.twig', array('order' => $order));
    	}
    	
    	throw new AccessDeniedException();
    }
    
    // View invoice
    public function viewInvoiceAction(Request $request, $id)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Get the order
	    $order = $orderService->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewInvoice.html.twig', array('order' => $order));
    }
    
    // View invoices
    public function viewInvoicesAction(Request $request, $ids)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Setup the orders
	    $orders = array();
	   		    	
	    // Get the orders
	    foreach (explode(',', $ids) as $orderId)
	    {
	    	$orders[] = $orderService->getOrder($orderId);
	    }
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewInvoices.html.twig', array('orders' => $orders));
    }
    
    // View order
    public function viewOrderAction(Request $request, $id)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Get the order
	    $order = $orderService->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewOrder.html.twig', array('order' => $order));
    }
    
    // View orders
    public function viewOrdersAction(Request $request, $ids)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Setup the orders
	    $orders = array();
	   		    	
	    // Get the orders
	    foreach (explode(',', $ids) as $orderId)
	    {
	    	$orders[] = $orderService->getOrder($orderId);
	    }
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewOrders.html.twig', array('orders' => $orders));
    }
    
    // View delivery note
    public function viewDeliveryNoteAction(Request $request, $id)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Get the order
	    $order = $orderService->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewDeliveryNote.html.twig', array('order' => $order));
    }
    
    // View delivery notes
    public function viewDeliveryNotesAction(Request $request, $ids)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    	    
	    // Setup the orders
	    $orders = array();
	   		    	
	    // Get the orders
	    foreach (explode(',', $ids) as $orderId)
	    {
	    	$orders[] = $orderService->getOrder($orderId);
	    }
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewDeliveryNotes.html.twig', array('orders' => $orders));
    }
    
    // View invoice and delivery note
    public function viewInvoiceAndDeliveryNoteAction(Request $request, $id)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    
	    // Get the order
	    $order = $orderService->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewInvoiceAndDeliveryNote.html.twig', array('order' => $order));
    }
    
    // View invoices and delivery notes
    public function viewInvoicesAndDeliveryNotesAction(Request $request, $ids)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    	    
	    // Setup the orders
	    $orders = array();
	   		    	
	    // Get the orders
	    foreach (explode(',', $ids) as $orderId)
	    {
	    	$orders[] = $orderService->getOrder($orderId);
	    }
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewInvoicesAndDeliveryNotes.html.twig', array('orders' => $orders));
    }
    
    // View copy order
    public function viewCopyOrderAction(Request $request, $id)
    {
    	// Get the services
	    $orderService = $this->get('web_illumination_admin.order_service');
	    	    	
	    // Get the order
	    $order = $orderService->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:Orders:viewCopyOrder.html.twig', array('order' => $order));
    }
    
    // Add
    public function addAction(Request $request)
    {
    
    	return $this->render('WebIlluminationAdminBundle:Brands:add.html.twig');
    }
    
    // Edit
    public function editAction(Request $request, $id, $current_tab)
    {
    	// Get the entity manager
   		$em = $this->getDoctrine()->getEntityManager();
   		
   		// Get the services
    	$brandService = $this->get('web_illumination_admin.brand_service');
    	    	
    	// Get the brand data
    	$brand = $brandService->getBrand($id, 'en');
    	    	
    	// Get any products from the Google product search API
		$product_search = $google_service->getProductSearchData('B12M42N0GB');
    	    
    	// Update a brand
    	if ($request->getMethod() == 'POST')
    	{
    		// Get submitted data
    		$status = ($request->request->get('status')?$request->request->get('status'):'h');
    		$brand_name = trim($request->request->get('brand-name'));
    		$logo = $request->files->get('logo-image');
    		$request_a_brochure = ($request->request->get('request-a-brochure')?'1':'0');
    		$brochure_web_address = trim($request->request->get('brochure-web-address'));
    		$request_a_sample = ($request->request->get('request-a-sample')?'1':'0');
    		$sample_web_address = trim($request->request->get('sample-web-address'));
    		$description = trim($request->request->get('description'));
    		$hide_prices = ($request->request->get('hide-prices')?'1':'0');
    		$show_prices_out_of_hours = ($hide_prices?$request->request->get('show-prices-out-of-hours'):'0');
    		$url = trim($request->request->get('url'));
    		$page_title = trim($request->request->get('page-title'));
    		if (!$page_title)
    		{
    			$page_title = $brand_name;
    		}
    		$header = trim($request->request->get('header'));
    		if (!$header)
    		{
    			$header = $brand_name;
    		}
    		$meta_description = trim($request->request->get('meta-description'));
    		if (!$meta_description)
    		{
    			$meta_description = $google_service->shortenContent($description, 160);
    		}
    		$meta_keywords = trim($request->request->get('meta-keywords'));
    		if (!$meta_keywords)
    		{
    			$meta_keywords = $google_service->generateKeywords($brand_name);
    		}
    		$search_words = trim($request->request->get('search-words'));
    		if (!$search_words)
    		{
    			$search_words = $google_service->generateKeywords($brand_name);
    		}
    		
    		// Get the current tab
    		$current_tab = $request->request->get('current-tab');
    		
    		// Provide some legacy if changes are made
    		if (($brand_description->brand != $brand_name) && ($brand_name != ''))
    		{
    			$url = $seo_service->createUrl($brand_name);
    			$meta_keywords .= ', '.$google_service->generateKeywords($brand_name);
    			$search_words .= ', '.$google_service->generateKeywords($brand_name);
    		}
    		
    		// If the URL changes we need to setup a 301 redirect for the existing URL
 			if (($web_address->url != $url) && ($url != ''))
    		{
    			$seo_service->updateRedirects($id, 'brand', $web_address->url, $url);
    		}
    		
		    // Update brand
		    $brand->setStatus($status);
    		$brand->setRequestABrochure($request_a_brochure);
    		$brand->setBrochureWebAddress($brochure_web_address);
    		$brand->setRequestASample($request_a_sample);
    		$brand->setSampleWebAddress($sample_web_address);
		    $brand->setHidePrices($hide_prices);
		    $brand->setShowPricesOutOfHours($show_prices_out_of_hours);
		    
		    // Update brand description
		    $brand_description->setBrand($brand_name);
		    $brand_description->setDescription($description);
		    $brand_description->setPageTitle($page_title);
		    $brand_description->setHeader($header);
		    $brand_description->setMetaDescription($meta_description);
		    $brand_description->setMetaKeywords($meta_keywords);
		    $brand_description->setSearchWords($search_words);
		    
		    // Update the database
		    $em->flush();
		    
		    // If a logo exists
		    if ($logo_image)
		    {
		    	// Update the image
		    	$image_service->updateLogoImage($logo_image, $logo, $header);
		    } else {
		    	// Process the image
		    	$logo_image_id = $image_service->processLogoImage($logo, $header, 'brands/logos', $brand->id, 'en');
		    	
		    	// Update the brand description
			   	$brand_description->setLogoImageId($logo_image_id);
			    $em->flush();
		    }
		    
		    // Process any images
		    $number_of_images = $request->request->get('number-of-images');
    		for ($image_number = 1; $image_number <= $number_of_images; $image_number++)
    		{
    			$image = $request->files->get('image-file-'.$image_number);
    			$image_id = $request->request->get('image-id-'.$image_number);
    			$image_title = $request->request->get('image-title-'.$image_number);
    			$image_description = $request->request->get('image-description-'.$image_number);
    			$image_link = $request->request->get('image-link-'.$image_number);
    			if ($image_link == 'http://')
    			{
    				$image_link = '';
    			}
    			$image_alignment = $request->request->get('image-alignment-'.$image_number);
    			$image_display_order = $request->request->get('image-display-order-'.$image_number);
    			$image_object = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Image')->find($image_id);
    			if ($image_object)
			    {
			    	// Update the image
			    	$image_service->updateGalleryImage($image_object, $image, $image_title, $image_description, $image_link, $image_alignment, $image_display_order);
			    } else {
			    	// Process the image
			    	$image_service->processGalleryImage($image, $image_title, $image_description, $image_link, $image_alignment, $image_display_order, 'brands/images', $brand->id, 'en');
			    }
    		}
		    		    
		    // Set success message
		    $this->get('session')->setFlash('success', 'The brand "'.$brand_name.'" has been saved.');
		    
		    // Forward to the brand
		    return $this->redirect($this->get('router')->generate('brands_edit', array('id' => $brand->id, 'current_tab' => $current_tab)));
		    
    	}
    	
    	return $this->render('WebIlluminationAdminBundle:Brands:edit.html.twig', array('brand' => $brand, 'current_tab' => $current_tab, 'product_search' => $product_search));
    }
    	
    // Get the statistics vists 
    public function ajaxGetStatisticsVisitsAction($id)
    {	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
    	// Setup URLs
    	$urls = array();
    	$urls[] = 'ga:pagePath==/'.$web_address->url.'.html';
    	foreach ($redirects as $redirect)
    	{
    		$urls[] = 'ga:pagePath==/'.$redirect->redirectFrom.'.html';
    	}
    	$url = implode(',', $urls);
    	
    	// Get the services
    	$google_service = $this->get('web_illumination_admin.google_service');
    	
    	// Get the statistics
    	$statistics = $google_service->getStatisticsVisits($url);
    	
    	return $this->render('WebIlluminationAdminBundle:Brands:ajaxGetStatisticsVisits.html.twig', array('statistics' => $statistics));
    }
    
    // Get the statistics referrers 
    public function ajaxGetStatisticsReferrersAction($id)
    {	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	
    	// Get the redirects
    	$redirects = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Redirect')->findBy(array('objectId' => $id, 'objectType' => 'brand'));
    	
    	// Setup URLs
    	$urls = array();
    	$urls[] = 'ga:pagePath==/'.$web_address->url.'.html';
    	foreach ($redirects as $redirect)
    	{
    		$urls[] = 'ga:pagePath==/'.$redirect->redirectFrom.'.html';
    	}
    	$url = implode(',', $urls);
    	
    	// Get the services
    	$google_service = $this->get('web_illumination_admin.google_service');
    	
    	// Get the statistics
    	$statistics = $google_service->getStatisticsReferrers($url);
    	
    	return $this->render('WebIlluminationAdminBundle:Brands:ajaxGetStatisticsReferrers.html.twig', array('statistics' => $statistics));
    }
                
    // Reset SEO
    public function resetSeoAction(Request $request, $id)
    {
    	// Get the entity manager
   		$em = $this->getDoctrine()->getEntityManager();
   		
   		// Get the services
    	$google_service = $this->get('web_illumination_admin.google_service');
    	$seo_service = $this->get('web_illumination_admin.seo_service');
   		    	
    	// Get the brand data
    	$brand = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Brand')->find($id);
    	$brand_description = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:BrandDescription')->findOneBy(array('brandId' => $id, 'locale' => 'en'));
	    if (!$brand || !$brand_description)
	    {
        	throw $this->createNotFoundException('Sorry, the brand was not found.');
    	}
    	
    	// Get the web address
    	$web_address = $this->getDoctrine()->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $id, 'objectType' => 'brand', 'locale' => 'en'));
    	if (!$web_address)
    	{
    		// Add web address
    		$web_address = new Routing();
    		$web_address->setObjectId($id);
    		$web_address->setObjectType('brand');
    		$web_address->setLocale('en');
    		$web_address->setUrl($seo_service->createUrl($brand_description->header));
		    $em->persist($web_address);
		    $em->flush();
    	}
    	
    	// Get SEO data
    	$url = $seo_service->createUrl($brand_description->brand);
    	$page_title = $brand_description->brand;
		$header = $brand_description->brand;
		$meta_description = $google_service->shortenContent($brand_description->description, 160);
		$meta_keywords = $google_service->generateKeywords($brand_description->brand);
		$search_words = $google_service->generateKeywords($brand_description->brand);
    		
		// If the URL changes we need to setup a 301 redirect for the existing URL
		if ($web_address->url != $url)
		{
			$seo_service->updateRedirects($id, 'brand', $web_address->url, $url);
		}
		    	    
	    // Update brand description
	    $brand_description->setPageTitle($page_title);
	    $brand_description->setHeader($header);
	    $brand_description->setMetaDescription($meta_description);
	    $brand_description->setMetaKeywords($meta_keywords);
	    $brand_description->setSearchWords($search_words);
	    
	    // Update the web address
	    $web_address->setUrl($url);
	    
	    // Update the database
	    $em->flush();
	    
	    // Set success message
	    $this->get('session')->setFlash('success', 'The SEO for the brand "'.$brand_description->brand.'" has been reset.');
		    
		// Forward to the brand
		return $this->redirect($this->get('router')->generate('brands_edit', array('id' => $brand->id, 'current_tab' => 'seo')));
		    
    }
        
    // Send the invoice
    public function sendInvoice($id)
    {
    	// Get the services
		$orderService = $this->get('web_illumination_admin.order_service');
		
    	// Get the order
    	$order = $orderService->getOrder($id);
    	
    	// Send the email
		try
		{
			$attachment = __DIR__.'/../../../../web/uploads/documents/order/invoice-'.$id.'.pdf';
			$email = \Swift_Message::newInstance();
        	$email->setSubject('Your Order with Kitchen Appliance Centre: '.$order['orderNumber']);
        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
        	$email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
        	$email->setBody($this->renderView('WebIlluminationShopBundle:Checkout:invoice.html.twig', array('order' => $order)), 'text/html');
			$email->addPart($this->renderView('WebIlluminationShopBundle:Checkout:invoice.txt.twig', array('order' => $order)), 'text/plain');
			if (file_exists($attachment))
			{
				$email->attach(\Swift_Attachment::fromPath($attachment)->setFilename('kitchen-appliance-centre-invoice-'.$id.'.pdf'));
			}
    		$this->get('mailer')->send($email);
		} catch (Exception $exception) {
			error_log('Error sending invoice email!');
	    	return false;
		}
		
		return true;
    }
}
