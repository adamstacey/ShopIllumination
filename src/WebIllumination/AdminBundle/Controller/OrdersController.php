<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use WebIllumination\AdminBundle\Entity\OrderNote;

class OrdersController extends Controller
{
	protected $settings;
	protected $listing;
	protected $filter;

    public function __construct()
    {
    	// Setup settings
    	$settings = array();
    	$settings['singleTitle'] = 'Order';
		$settings['multipleTitle'] = 'Orders';
		$settings['singleDescription'] = 'order';
		$settings['multipleDescription'] = 'orders';
		$settings['singleClass'] = 'order';
		$settings['multipleClass'] = 'orders';
		$settings['singlePath'] = 'order';
		$settings['multiplePath'] = 'orders';
		$settings['singleModel'] = 'Order';
		$settings['multipleModel'] = 'Orders';
		$this->settings = $settings;
		
		// Setup listing
    	$listing = array();
    	$listing['search'] = '';
    	$listing['sort'] = 'createdAt';
		$listing['order'] = 'DESC';
		$listing['sortOrder'] = 'createdAt:DESC';
		$listing['maxResults'] = 20;
		$listing['currentPage'] = 1;
		$this->listing = $listing;
		
		// Setup filter
		$filter = array();
    	$filter['id'] = '';
    	$filter['customer'] = '';
    	$filter['emailAddress'] = '';
    	$filter['statuses'] = '';
    	$filter['paymentTypes'] = '';
    	$filter['deliveryTypes'] = '';
    	$filter['totalFrom'] = 1;
    	$filter['totalTo'] = 10000;
    	$filter['dateFrom'] = '';
    	$filter['dateFromFormatted'] = '';
    	$filter['dateTo'] = '';
    	$filter['dateToFormatted'] = '';
		$filter['empty'] = 1;
		$this->filter = $filter;
    }
    
	// Index
    public function indexAction(Request $request, $document = '')
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$systemService = $this->get('web_illumination_admin.system_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Setup listing
    	$sessionListing = $this->get('session')->get('listing');
		if (isset($sessionListing['admin'][$this->settings['singleClass']]))
		{
			$listing = $sessionListing['admin'][$this->settings['singleClass']];
			$this->listing = $listing;
		} else {
			$sessionListing['admin'][$this->settings['singleClass']] = $this->listing;
			$this->get('session')->set('listing', $sessionListing);
		}
		
		// Setup the document
		$document = $request->query->get('document');

		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$status = $request->request->get('status');
    		$deliveryBand = $request->request->get('delivery-band');
    		$displayOrder = $request->request->get('display-order');
    		$delete = $request->request->get('delete');
    		$extraAction = $request->request->get('extra-action');
    		
    		// Check for any extra actions
    		if ($extraAction != '')
    		{
	    		switch ($extraAction)
	    		{
		    		case 'printOrders':
		    			if (sizeof($select) > 0)
			    		{
			    			if (sizeof($select) == 1)
			    			{
			    				foreach ($select as $itemId => $item)
				    			{			    				
				    				// Get the order and update
					    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
					    			if ($itemObject)
					    			{ 
						    			if ($itemObject->getStatus() == 'Payment Received')
						    			{
						    				$itemObject->setStatus('Processing Your Order');
						    			}
						    			$itemObject->setOrderPrinted(1);
						    			if (strpos($itemObject->getDeliveryType(), 'Royal Mail') !== false)
						    			{
						    				$itemObject->setDeliveryNotePrinted(1);
						    			}
						    			$em->persist($itemObject);
						    			$em->flush();
						    		}
						    		
									// Get the files
									$document = 'order-'.$itemId;
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									} else {
										// Update the order documents
										$service->generateOrderDocuments($itemId);
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
								}
			    			} else {
				    			foreach ($select as $itemId => $item)
				    			{
					    			$orders = array();
						    		foreach ($select as $itemId => $item)
						    		{
						    			// Get the order and update
						    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
						    			if ($itemObject)
						    			{
							    			if ($itemObject->getStatus() == 'Payment Received')
							    			{
							    				$itemObject->setStatus('Processing Your Order');
							    			}
							    			$itemObject->setOrderPrinted(1);
							    			if (strpos($itemObject->getDeliveryType(), 'Royal Mail') !== false)
							    			{
							    				$itemObject->setDeliveryNotePrinted(1);
							    			}
							    			$em->persist($itemObject);
							    			$em->flush();
							    		}
						    			
						    			// Get full order to print
								    	$orders[] = $service->getOrder($itemId);
								    }
								    
								    // Get the order HTML
								    $orderHtml = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewOrders.html.twig', array('orders' => $orders));
								    
								    // Get the files
								    $ordersHtmlFileName = 'orders-'.date('dmYHis').'.html';
								    $ordersHtmlFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/temporary/'.$ordersHtmlFileName;
								    $document = 'orders-'.date('dmYHis');
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
								    
								    // Generate the HTML file
									$fileHandle = fopen($ordersHtmlFilePath, 'w');
									fwrite($fileHandle, $orderHtml);
									fclose($fileHandle);
									
									// Generate the PDF
									if (file_exists($ordersHtmlFilePath))
									{
										$systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$ordersHtmlFilePath.' '.$ordersPdfFilePath.' 2>&1');
										unlink($ordersHtmlFilePath);
									}
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
					    		}
					    	}
				    	} else {
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to print.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
			    		}
		    			break;
		    		case 'printCopyOrders':
		    			if (sizeof($select) > 0)
			    		{
			    			if (sizeof($select) == 1)
			    			{
			    				foreach ($select as $itemId => $item)
				    			{			    				
									// Get the files
								    $document = 'copy-order-'.$itemId;
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									} else {
										// Update the order documents
										$service->generateOrderDocuments($itemId);
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
								}
			    			} else {
				    			foreach ($select as $itemId => $item)
				    			{
					    			$orders = array();
						    		foreach ($select as $itemId => $item)
						    		{						    			
						    			// Get full order to print
								    	$orders[] = $service->getOrder($itemId);
								    }
								    
								    // Get the order HTML
								    $orderHtml = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewCopyOrders.html.twig', array('orders' => $orders));
								    
								    // Get the files
								    $ordersHtmlFileName = 'orders-'.date('dmYHis').'.html';
								    $ordersHtmlFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/temporary/'.$ordersHtmlFileName;
								    $document = 'copy-orders-'.date('dmYHis');
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
								    
								    // Generate the HTML file
									$fileHandle = fopen($ordersHtmlFilePath, 'w');
									fwrite($fileHandle, $orderHtml);
									fclose($fileHandle);
									
									// Generate the PDF
									if (file_exists($ordersHtmlFilePath))
									{
										$systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$ordersHtmlFilePath.' '.$ordersPdfFilePath.' 2>&1');
										unlink($ordersHtmlFilePath);
									}
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
					    		}
					    	}
				    	} else {
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to print.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
			    		}
		    			break;
		    		case 'printDeliveryNotes':
		    			if (sizeof($select) > 0)
			    		{
			    			if (sizeof($select) == 1)
			    			{
			    				foreach ($select as $itemId => $item)
				    			{
				    				// Get the order and update
					    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
					    			if ($itemObject)
					    			{
					    				$itemObject->setDeliveryNotePrinted(1);
						    			$em->persist($itemObject);
						    			$em->flush();
						    		}
						    			    													
									// Get the files
								    $document = 'delivery-note-'.$itemId;
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
								    
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									} else {
										// Update the order documents
										$service->generateOrderDocuments($itemId);
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
								}
			    			} else {
				    			foreach ($select as $itemId => $item)
				    			{
					    			$orders = array();
						    		foreach ($select as $itemId => $item)
						    		{				
						    			// Get the order and update
						    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
						    			if ($itemObject)
						    			{
						    				$itemObject->setDeliveryNotePrinted(1);
							    			$em->persist($itemObject);
							    			$em->flush();
							    		}
						    				    			
						    			// Get full order to print
								    	$orders[] = $service->getOrder($itemId);
								    }
								    
								    // Get the order HTML
								    $orderHtml = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewDeliveryNotes.html.twig', array('orders' => $orders));
								    
								    // Get the files
								    $ordersHtmlFileName = 'orders-'.date('dmYHis').'.html';
								    $ordersHtmlFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/temporary/'.$ordersHtmlFileName;
								    $document = 'delivery-notes-'.date('dmYHis');
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
								    
								    // Generate the HTML file
									$fileHandle = fopen($ordersHtmlFilePath, 'w');
									fwrite($fileHandle, $orderHtml);
									fclose($fileHandle);
									
									// Generate the PDF
									if (file_exists($ordersHtmlFilePath))
									{
										$systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$ordersHtmlFilePath.' '.$ordersPdfFilePath.' 2>&1');
										unlink($ordersHtmlFilePath);
									}
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
					    		}
					    	}
				    	} else {
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to print.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
			    		}
		    			break;
		    		case 'printCustomerInvoices':
		    			if (sizeof($select) > 0)
			    		{
			    			if (sizeof($select) == 1)
			    			{
			    				foreach ($select as $itemId => $item)
				    			{			    				
									// Get the files
								    $document = 'invoice-'.$itemId;
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									} else {
										// Update the order documents
										$service->generateOrderDocuments($itemId);
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
								}
			    			} else {
				    			foreach ($select as $itemId => $item)
				    			{
					    			$orders = array();
						    		foreach ($select as $itemId => $item)
						    		{						    			
						    			// Get full order to print
								    	$orders[] = $service->getOrder($itemId);
								    }
								    
								    // Get the order HTML
								    $orderHtml = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewInvoices.html.twig', array('orders' => $orders));
								    
								    // Get the files
								    $ordersHtmlFileName = 'invoices-'.date('dmYHis').'.html';
								    $ordersHtmlFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/temporary/'.$ordersHtmlFileName;
								    $document = 'invoices-'.date('dmYHis');
								    $ordersPdfFileName = $document.'.pdf';
								    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
								    
								    // Generate the HTML file
									$fileHandle = fopen($ordersHtmlFilePath, 'w');
									fwrite($fileHandle, $orderHtml);
									fclose($fileHandle);
									
									// Generate the PDF
									if (file_exists($ordersHtmlFilePath))
									{
										$systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$ordersHtmlFilePath.' '.$ordersPdfFilePath.' 2>&1');
										unlink($ordersHtmlFilePath);
									}
									
									// Get the documents link
									if (file_exists($ordersPdfFilePath))
									{
										return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'], array('document' => $document)));
									}
					    		}
					    	}
				    	} else {
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to print.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
			    		}
		    			break;
		    		case 'emailCustomerInvoices':
		    			if (sizeof($select) > 0)
			    		{
			    			foreach ($select as $itemId => $item)
			    			{		
						    	// Get the order
						    	$order = $service->getOrder($itemId);
						    	
						    	// Send the email
								try
								{
									$attachment = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/invoice-'.$itemId.'.pdf';
									$email = \Swift_Message::newInstance();
						        	$email->setSubject('Your Order with Kitchen Appliance Centre: '.$order['orderNumber']);
						        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
						        	$email->setTo(array($order['emailAddress'] => $order['firstName'].' '.$order['lastName']));
						        	$email->setBody($this->renderView('WebIlluminationShopBundle:Checkout:invoice.html.twig', array('order' => $order)), 'text/html');
									$email->addPart($this->renderView('WebIlluminationShopBundle:Checkout:invoice.txt.twig', array('order' => $order)), 'text/plain');
									if (file_exists($attachment))
									{
										$email->attach(\Swift_Attachment::fromPath($attachment)->setFilename('kitchen-appliance-centre-invoice-'.$itemId.'.pdf'));
									}
						    		$this->get('mailer')->send($email);
								} catch (Exception $exception) {
									error_log('Error sending invoice email!');
								}
				    		}
				    		
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('success', 'The customer invoices were successfully emailed.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
				    	} else {
				    		// Notify user
				    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any orders to email.');
				    		
				    		// Forward
				    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
			    		}
		    			break;
	    		}
    		} else {
    		
	    		// Run through all selected items
	    		if (sizeof($select) > 0)
	    		{
	    			foreach ($select as $itemId => $item)
	    			{
		    			// Get the item
		    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
		    			if ($itemObject)
		    			{
		    				// Delete the item
		    				if ($delete > 0)
		    				{
		    					// Delete any item discounts
		    					$itemDiscountObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Discount')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
		    					foreach ($itemDiscountObjects as $itemDiscountObject)
		    					{
			    					$em->remove($itemDiscountObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any item notes
		    					$itemNoteObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Note')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
		    					foreach ($itemNoteObjects as $itemNoteObject)
		    					{
			    					$em->remove($itemNoteObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete any item products
		    					$itemProductObjects = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Product')->findBy(array($this->settings['singleClass'].'Id' => $itemId));
		    					foreach ($itemProductObjects as $itemProductObject)
		    					{
			    					$em->remove($itemProductObject);
			    					$em->flush();
		    					}
		    					
		    					// Delete the item index
		    					$em->remove($itemObject);
		    					$em->flush();
				    		} else {
					    		$itemStatus = $status[$itemId];
					    		$itemObject->setStatus($itemStatus);
				    			$em->persist($itemObject);
				    			$em->flush();
				    			
				    			// Update the order documents
				    			$service->generateOrderDocuments($itemId);
				    		}
		    			}
	    			}
	    		} else {
		    		// Notify user
		    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
	    		}
	    		    		
	    		// Notify user
	    		if ($delete > 0)
		    	{
	    			$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been deleted.');
	    		} else {
		    		$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been updated.');
	    		}
    		
	    		// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
	    	}
    	}
		
		// Setup filter
    	$sessionFilter = $this->get('session')->get('filter');
		if (isset($sessionFilter['admin'][$this->settings['singleClass']]))
		{
			$filter = $sessionFilter['admin'][$this->settings['singleClass']];
			$this->filter = $filter;
		} else {
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
		// Check for the quick search and update the filters
		if ($this->listing['search'])
		{
			if (is_numeric($this->listing['search']))
			{
				$filter['id'] = $this->listing['search'];
		    	$filter['customer'] = '';
		    	$filter['emailAddress'] = '';
			} else if (strpos($this->listing['search'], '@') !== false) {
				$filter['id'] = '';
		    	$filter['customer'] = '';
		    	$filter['emailAddress'] = $this->listing['search'];
			} else {
				$filter['id'] = '';
		    	$filter['customer'] = $this->listing['search'];
		    	$filter['emailAddress'] = '';
			}
	    	$filter['statuses'] = '';
	    	$filter['paymentTypes'] = '';
	    	$filter['deliveryTypes'] = '';
	    	$filter['totalFrom'] = 1;
	    	$filter['totalTo'] = 10000;
	    	$filter['dateFrom'] = '';
	    	$filter['dateFromFormatted'] = '';
	    	$filter['dateTo'] = '';
	    	$filter['dateToFormatted'] = '';
			$filter['empty'] = 1;
			$this->filter = $filter;
			$sessionFilter['admin'][$this->settings['singleClass']] = $this->filter;
			$this->get('session')->set('filter', $sessionFilter);
		}
		
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['statistics'] = array();
    	    	    	    	
    	// Get the number of items
    	$qb = $em->createQueryBuilder();
    	$qb->select($qb->expr()->count("i.id"));
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	if ($this->filter['id'])
    	{
    		$qb->andWhere($qb->expr()->like('i.id', $qb->expr()->literal('%'.$this->filter['id'].'%')));
    	}
    	if ($this->filter['customer'])
    	{
    		$customerNames = explode(' ', $this->filter['customer']);
    		foreach ($customerNames as $customerName)
    		{
	    		$qb->andWhere($qb->expr()->orx(
		    		$qb->expr()->like('i.firstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.lastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.organisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingOrganisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryOrganisationName', $qb->expr()->literal('%'.$customerName.'%'))
		    	));
		    }
    	}
    	if ($this->filter['emailAddress'])
    	{
    		$qb->andWhere($qb->expr()->like('i.emailAddress', $qb->expr()->literal('%'.$this->filter['emailAddress'].'%')));
    	}
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['paymentTypes'])
    	{
    		$option = $this->filter['paymentTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.paymentType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.paymentType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['deliveryTypes'])
    	{
    		$option = $this->filter['deliveryTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.deliveryType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.deliveryType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['dateFromFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->gte('i.createdAt', $qb->expr()->literal($this->filter['dateFromFormatted']." 00:00:00")));
    	}
    	if ($this->filter['dateToFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->lte('i.createdAt', $qb->expr()->literal($this->filter['dateToFormatted']." 23:59:59")));
    	}
		$itemCount = $qb->getQuery()->getSingleScalarResult();
		$this->listing['itemCount'] = $itemCount;
		$data['statistics']['selected']['count'] = $itemCount;
				
		// Get the pagination
    	if ($itemCount <= $this->listing['maxResults'])
    	{
    		$pagination = 1;
    	} else {
	    	$pagination = ceil($itemCount / $this->listing['maxResults']);
    	}
    	$this->listing['pagination'] = $pagination;
    	$this->listing['previousPage'] = $this->listing['currentPage'] - 1;
    	$this->listing['nextPage'] = $this->listing['currentPage'] + 1;
    	$this->listing['firstResult'] = ($this->listing['currentPage'] - 1) * $this->listing['maxResults'];
    	
		// Get the items
		$qb = $em->createQueryBuilder();
    	$qb->select('i');
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	if ($this->filter['id'])
    	{
    		$qb->andWhere($qb->expr()->like('i.id', $qb->expr()->literal('%'.$this->filter['id'].'%')));
    	}
    	if ($this->filter['customer'])
    	{
    		$customerNames = explode(' ', $this->filter['customer']);
    		foreach ($customerNames as $customerName)
    		{
	    		$qb->andWhere($qb->expr()->orx(
		    		$qb->expr()->like('i.firstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.lastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.organisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingOrganisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryOrganisationName', $qb->expr()->literal('%'.$customerName.'%'))
		    	));
		    }
    	}
    	if ($this->filter['emailAddress'])
    	{
    		$qb->andWhere($qb->expr()->like('i.emailAddress', $qb->expr()->literal('%'.$this->filter['emailAddress'].'%')));
    	}
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['paymentTypes'])
    	{
    		$option = $this->filter['paymentTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.paymentType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.paymentType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['deliveryTypes'])
    	{
    		$option = $this->filter['deliveryTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.deliveryType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.deliveryType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['totalFrom'] > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('i.total', $qb->expr()->literal($this->filter['totalFrom'])));
    	}
    	if ($this->filter['totalTo'] > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('i.total', $qb->expr()->literal($this->filter['totalTo'])));
    	}
    	if ($this->filter['dateFromFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->gte('i.createdAt', $qb->expr()->literal($this->filter['dateFromFormatted']." 00:00:00")));
    	}
    	if ($this->filter['dateToFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->lte('i.createdAt', $qb->expr()->literal($this->filter['dateToFormatted']." 23:59:59")));
    	}
	    $qb->addOrderBy('i.'.$this->listing['sort'], $this->listing['order']);
    	$qb->setFirstResult($this->listing['firstResult']);
	   	$qb->setMaxResults($this->listing['maxResults']);
		$items = $qb->getQuery()->getResult();
		$data['items'] = $items;
		
		// Get the quick stats
		$statistic = array();
		$statistic['count'] = 0;
		$statistic['total'] = 0;
		$statistic['totalNett'] = 0;
		$statistic['averageOrderValue'] = 0;
		$statistic['averageOrderValueNett'] = 0;
		$qb = $em->createQueryBuilder();
    	$qb->select('i');
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
    	if ($this->filter['id'])
    	{
    		$qb->andWhere($qb->expr()->like('i.id', $qb->expr()->literal('%'.$this->filter['id'].'%')));
    	}
    	if ($this->filter['customer'])
    	{
    		$customerNames = explode(' ', $this->filter['customer']);
    		foreach ($customerNames as $customerName)
    		{
	    		$qb->andWhere($qb->expr()->orx(
		    		$qb->expr()->like('i.firstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.lastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.organisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.billingOrganisationName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryFirstName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryLastName', $qb->expr()->literal('%'.$customerName.'%')),
		    		$qb->expr()->like('i.deliveryOrganisationName', $qb->expr()->literal('%'.$customerName.'%'))
		    	));
		    }
    	}
    	if ($this->filter['emailAddress'])
    	{
    		$qb->andWhere($qb->expr()->like('i.emailAddress', $qb->expr()->literal('%'.$this->filter['emailAddress'].'%')));
    	}
    	if ($this->filter['statuses'])
    	{
    		$option = $this->filter['statuses'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.status', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['paymentTypes'])
    	{
    		$option = $this->filter['paymentTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.paymentType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.paymentType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['deliveryTypes'])
    	{
    		$option = $this->filter['deliveryTypes'];
    		$options = explode('|', $option);
    		if (sizeof($options) > 1)
    		{
    			$qb->andWhere($qb->expr()->in('i.deliveryType', $options));
    		} else {
    			$qb->andWhere($qb->expr()->eq('i.deliveryType', $qb->expr()->literal($option)));
    		}
    	}
    	if ($this->filter['totalFrom'] > 0)
    	{
    		$qb->andWhere($qb->expr()->gte('i.total', $qb->expr()->literal($this->filter['totalFrom'])));
    	}
    	if ($this->filter['totalTo'] > 0)
    	{
    		$qb->andWhere($qb->expr()->lte('i.total', $qb->expr()->literal($this->filter['totalTo'])));
    	}
    	if ($this->filter['dateFromFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->gte('i.createdAt', $qb->expr()->literal($this->filter['dateFromFormatted']." 00:00:00")));
    	}
    	if ($this->filter['dateToFormatted'] != '')
    	{
    		$qb->andWhere($qb->expr()->lte('i.createdAt', $qb->expr()->literal($this->filter['dateToFormatted']." 23:59:59")));
    	}
    	$qb->andWhere($qb->expr()->neq('i.status', $qb->expr()->literal('Open Payment')));
    	$qb->andWhere($qb->expr()->neq('i.status', $qb->expr()->literal('Payment Failed')));
    	$qb->andWhere($qb->expr()->neq('i.status', $qb->expr()->literal('Cancelled')));
    	foreach ($qb->getQuery()->getResult() as $order)
    	{
	    	$statistic['count']++;
	    	$statistic['total'] = $statistic['total'] + $order->getTotal();
    	}
    	$statistic['totalNett'] = $statistic['total'] / 1.2;
    	if ($statistic['count'] > 0)
    	{
			$statistic['averageOrderValue'] = $statistic['total'] / $statistic['count'];
			$statistic['averageOrderValueNett'] = $statistic['totalNett'] / $statistic['count'];
		}
		$data['statistics']['selected'] = $statistic;
		
		// Get the new order stats
		$data['statistics']['new'] = $service->getNewStatistics();
		
		/*
		// Get todays stats
		$data['statistics']['today'] = $service->getStatistics('today');
				
		// Get this weeks stats
		$data['statistics']['week'] = $service->getStatistics('week');

		// Get this months stats
		$data['statistics']['month'] = $service->getStatistics('month');
		
		// Get this quarters stats
		$data['statistics']['quarter'] = $service->getStatistics('quarter');
		
		// Get this years stats
		$data['statistics']['year'] = $service->getStatistics('year');*/
		
		// Get the listing
		$data['listing'] = $this->listing;
		
		// Get the filter
		$data['filter'] = $this->filter;
		
		// Get the documents
		$data['document'] = $document;
		
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':index.html.twig', array('data' => $data));
    }
    
    // Update listing
    public function updateListingAction(Request $request)
    {
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get listings data
    		$search = $request->request->get('search');
    		$sortOrder = $request->request->get('sort-order');
    		$sortOrderParts = explode(':', $sortOrder);
    		$sort = $sortOrderParts[0];
    		$order = $sortOrderParts[1];
    		$maxResults = $request->request->get('max-results');
    		$currentPage = $request->request->get('current-page');
    		
    		// Update the listing session
    		$sessionListing = $this->get('session')->get('listing');
    		$sessionListing['admin'][$this->settings['singleClass']]['search'] = $search;
    		$sessionListing['admin'][$this->settings['singleClass']]['sortOrder'] = $sortOrder;
    		$sessionListing['admin'][$this->settings['singleClass']]['sort'] = $sort;
    		$sessionListing['admin'][$this->settings['singleClass']]['order'] = $order;
    		$sessionListing['admin'][$this->settings['singleClass']]['maxResults'] = $maxResults;
    		$sessionListing['admin'][$this->settings['singleClass']]['currentPage'] = $currentPage;
			$this->get('session')->set('listing', $sessionListing);    
			
    		// Get filters data
    		$emptyFilters = true;
    		$filters = $request->request->get('filters');
    		$sessionFilter = $this->get('session')->get('filter');
    		$sessionFilter['admin'][$this->settings['singleClass']]['empty'] = 1;
    		foreach ($filters as $index => $filter)
    		{
    			if ($index != 'empty')
    			{
    				$filter = trim($filter);
	    			$sessionFilter['admin'][$this->settings['singleClass']][$index] = $filter;
		    		if ($filter != '')
		    		{
			    		$emptyFilters = false;
			    	}
	    		}
    		}
    		if (!$emptyFilters)
    		{
	    		$sessionFilter['admin'][$this->settings['singleClass']]['empty'] = 0;
    		}
    		
    		// Update the filter session
			$this->get('session')->set('filter', $sessionFilter);    		
    	}
		
		// Forward
    	return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    }
    
    // Print orders
    public function printOrdersAction(Request $request)
    {
    	// Get the orders
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get the services
    		$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    		$systemService = $this->container->get('web_illumination_admin.system_service');
    		
    		// Get submitted data
    		$select = $request->request->get('select');
    		
    		// Get the orders
    		if (sizeof($select) > 0)
    		{
    			$orders = array();
	    		foreach ($select as $itemId => $item)
	    		{		
			    	$orders[] = $service->getOrder($itemId);
			    }
			    $orderHtml = $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewOrders.html.twig', array('orders' => $orders));
			    
			    $ordersHtmlFileName = 'orders-'.date('dmYHis').'.html';
			    $ordersHtmlFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/temporary/'.$ordersHtmlFileName;
			    $ordersPdfFileName = 'orders-'.date('dmYHis').'.pdf';
			    $ordersPdfFilePath = $this->get('kernel')->getRootdir().'/../web/uploads/documents/order/'.$ordersPdfFileName;
				$fileHandle = fopen($ordersHtmlFilePath, 'w');
				fwrite($fileHandle, $orderHtml);
				fclose($fileHandle);
				$systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$ordersHtmlFilePath.' '.$ordersPdfFilePath.' 2>&1');
				unlink($ordersHtmlFilePath);

				// Forward
				return $this->redirect('/uploads/documents/order/'.$ordersPdfFileName);
			}
		}
		
		// Notify user
		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
		
		// Forward
		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    }
    
    // Process deliveries
    public function processDeliveriesAction(Request $request)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
				
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$courier = $request->request->get('courier');
    		$numberOfPackages = $request->request->get('number-of-packages');
    		$trackingNumber = $request->request->get('tracking-number');
    		$sendReviewRequest = $request->request->get('send-review-request');
    		$deliveryService = $request->request->get('delivery-service');
    		$deliveryDateFrom = $request->request->get('delivery-date-from');
    		$deliveryDateTo = $request->request->get('delivery-date-to');
    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			// Setup DPD import file
    			$dpdImportFile = "Account|AddressCode|Name|Address 1|Address 2|Town|County|PostCode|Service|Qty of Labels|Contact|Telephone|Email|Email2|Additional Info\n";
    			
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($itemId);
	    			if ($itemObject)
	    			{
	    				// Update object
			    		$itemCourier = $courier[$itemId];
			    		$itemNumberOfPackages = $numberOfPackages[$itemId];
			    		$itemTrackingNumber = '';
			    		if (isset($trackingNumber[$itemId]))
			    		{
			    			$itemTrackingNumber = $trackingNumber[$itemId];
			    		}
			    		$itemSendReviewRequest = 0;
			    		if (isset($sendReviewRequest[$itemId]))
			    		{
			    			$itemSendReviewRequest = $sendReviewRequest[$itemId];
			    		}
			    		$itemDeliveryService = '';
			    		if (isset($deliveryService[$itemId]))
			    		{
			    			$itemDeliveryService = $deliveryService[$itemId];
			    		}
			    		$itemDeliveryDateFrom = '';
			    		if (isset($deliveryDateFrom[$itemId]))
			    		{
			    			$itemDeliveryDateFrom = $deliveryDateFrom[$itemId];
			    		}
			    		$itemDeliveryDateTo = '';
			    		if (isset($deliveryDateTo[$itemId]))
			    		{
			    			$itemDeliveryDateTo = $deliveryDateTo[$itemId];
			    		}
				    	$itemObject->setCourier($itemCourier);
			    		$itemObject->setNumberOfPackages($itemNumberOfPackages);
			    		$itemObject->setTrackingNumber($itemTrackingNumber);
			    		$itemObject->setSendReviewRequest($itemSendReviewRequest);
			    		$em->persist($itemObject);
			    		$em->flush();
			    		
			    		// Get the admin
			    		$admin = $this->get('session')->get('admin');
			    		
			    		// Update the order according to the courier		
			    		switch ($itemCourier)
			    		{
			    			case 'Royal Mail':			    							    				
			    				// Add the new note
			    				if ($itemTrackingNumber != '')
			    				{
				    				$htmlNote = "Your item has been dispatched for recorded delivery with Royal Mail. Your consignment number is ".$itemTrackingNumber.".\n\n";
				    				$htmlNote .= "<a href=\"http://track2.royalmail.com/portal/rm/track?trackNumber=".$itemTrackingNumber."\">Click here to track your delivery.</a>";
				    				$plainTextNote = "Your item has been dispatched for recorded delivery with Royal Mail. Your consignment number is ".$itemTrackingNumber.".\n\n";
				    				$plainTextNote .= "Go to http://track2.royalmail.com/portal/rm/track?trackNumber=".$itemTrackingNumber." to track your delivery.";
				    			} else {
					    			$htmlNote = "Your item has been dispatched for standard delivery with Royal Mail.\n\n";
				    				$htmlNote .= "There is no consignment number provided for standard delivery, so there is no tracking information available.";
				    				$plainTextNote = "Your item has been dispatched for standard delivery with Royal Mail.\n\n";
				    				$plainTextNote .= "There is no consignment number provided for standard delivery, so there is no tracking information available.";
				    			}
						    	$orderNoteObject = new OrderNote();
						    	$orderNoteObject->setOrderId($itemObject->getId());
						    	$orderNoteObject->setNoteType('customer');
						    	$orderNoteObject->setNotified(1);
						    	$orderNoteObject->setNote($plainTextNote);
						    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
						    	$em->persist($orderNoteObject);
							    $em->flush();
							    
							    // Update notes count on order
							    $itemObject->setNotesCount(intval($itemObject->getNotesCount()) + 1);
			    				$em->persist($itemObject);
			    				$em->flush();
						    
							    // Send the email
								try
								{
									$email = \Swift_Message::newInstance();
						        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
						        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
						        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
						        	if ($itemObject->getSendReviewRequest() > 0)
						        	{
						        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
						        	}
						        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
									$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
						    		$this->get('mailer')->send($email);
						    		
						    		// Set the review as requested
								    $itemObject->setReviewRequested(1);
				    				$em->persist($itemObject);
				    				$em->flush();
								} catch (Exception $exception) {
									error_log('Error sending email!');
								}
								
								// Update the order status
			    				$itemObject->setStatus('Order Completed');
			    				$itemObject->setLabelsPrinted(1);
			    				$em->persist($itemObject);
			    				$em->flush();
			    				break;
			    			case 'DPD':
			    				// Account
								$dpdImportFile .= '"'.$itemObject->getId().'"|';
								// AddressCode
								$dpdImportFile .= '0|';
								// Name
								$dpdImportFile .= '"'.strtoupper($itemObject->getDeliveryLastName()).'"|';
								if ($itemObject->getDeliveryOrganisationName() != '')
								{
									// Company
									$dpdImportFile .= '"'.($itemObject->getDeliveryOrganisationName()?strtoupper($itemObject->getDeliveryOrganisationName()):' ').'"|';
									// Address 1
									$dpdImportFile .= '"'.($itemObject->getDeliveryAddressLine1()?strtoupper($itemObject->getDeliveryAddressLine1()):' ').'"|';
									// Address 2
									$dpdImportFile .= '"'.($itemObject->getDeliveryAddressLine2()?strtoupper($itemObject->getDeliveryAddressLine2()):' ').'"|';
									// Town
									$dpdImportFile .= '"'.($itemObject->getDeliveryCountyState()?strtoupper($itemObject->getDeliveryCountyState()):' ').'"|';
									// PostCode
									$dpdImportFile .= '"'.($itemObject->getDeliveryPostZipCode()?str_replace(' ', '', strtoupper($itemObject->getDeliveryPostZipCode())):' ').'"|';
								} else {
									// Address 1
									$dpdImportFile .= '"'.($itemObject->getDeliveryAddressLine1()?strtoupper($itemObject->getDeliveryAddressLine1()):' ').'"|';
									// Address 2
									$dpdImportFile .= '"'.($itemObject->getDeliveryAddressLine2()?strtoupper($itemObject->getDeliveryAddressLine2()):' ').'"|';
									// Town
									$dpdImportFile .= '"'.($itemObject->getDeliveryTownCity()?strtoupper($itemObject->getDeliveryTownCity()):' ').'"|';
									// County
									$dpdImportFile .= '"'.($itemObject->getDeliveryCountyState()?strtoupper($itemObject->getDeliveryCountyState()):' ').'"|';
									// PostCode
									$dpdImportFile .= '"'.($itemObject->getDeliveryPostZipCode()?str_replace(' ', '', strtoupper($itemObject->getDeliveryPostZipCode())):' ').'"|';
								}
								// Service
								$dpdImportFile .= '12|';
								// Qty of Labels
								$dpdImportFile .= '"'.($itemObject->getNumberOfPackages() > 0?$itemObject->getNumberOfPackages():'1').'"|';
								// Contact
								$dpdImportFile .= '" "|';
								// Telephone
								$dpdImportFile .= '"'.($itemObject->getTelephoneDaytime()?str_replace(array(' ', '-'), '', $itemObject->getTelephoneDaytime()):' ').'"|';
								// Email
								$dpdImportFile .= '" "|';
								// Email2
								$dpdImportFile .= '"'.($itemObject->getMobile()?str_replace(array(' ', '-'), '', $itemObject->getMobile()):' ').'"|';
								$dpdImportFile .= '"FRAGILE HANDLE WITH CARE"';
								$dpdImportFile .= "\n";
								
								// Update the order status
			    				$itemObject->setStatus('Order with Delivery Company');
			    				$itemObject->setLabelsPrinted(1);
			    				$em->persist($itemObject);
			    				$em->flush();
			    				break;
			    			case 'Parcelforce':			    							    				
			    				// Add the new note
			    				$htmlNote = "Your item has been dispatched for signed delivery with Parcelforce. Your consignment number is ".$itemTrackingNumber.".\n\n";
			    				$htmlNote .= "<a href=\"http://www.parcelforce.com/track-trace?trackNumber=".$itemTrackingNumber."\">Click here to track your delivery.</a>\n\n";
			    				$htmlNote .= "Tracking will be active after 5.30pm today.";
			    				$plainTextNote = "Your item has been dispatched for signed delivery with Parcelforce. Your consignment number is ".$itemTrackingNumber.".\n\n";
			    				$plainTextNote .= "Go to http://www.parcelforce.com/track-trace?trackNumber=".$itemTrackingNumber." to track your delivery.";
			    				$plainTextNote .= "Tracking will be active after 5.30pm today.";
						    	$orderNoteObject = new OrderNote();
						    	$orderNoteObject->setOrderId($itemObject->getId());
						    	$orderNoteObject->setNoteType('customer');
						    	$orderNoteObject->setNotified(1);
						    	$orderNoteObject->setNote($plainTextNote);
						    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
						    	$em->persist($orderNoteObject);
							    $em->flush();
							    
							    // Update notes count on order
							    $itemObject->setNotesCount(intval($itemObject->getNotesCount()) + 1);
			    				$em->persist($itemObject);
			    				$em->flush();
						    
							    // Send the email
								try
								{
									$email = \Swift_Message::newInstance();
						        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
						        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
						        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
						        	if ($itemObject->getSendReviewRequest() > 0)
						        	{
						        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
						        	}
						        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
									$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
						    		$this->get('mailer')->send($email);
						    		
						    		// Set the review as requested
								    $itemObject->setReviewRequested(1);
				    				$em->persist($itemObject);
				    				$em->flush();
								} catch (Exception $exception) {
									error_log('Error sending email!');
								}
								
								// Update the order status
			    				$itemObject->setStatus('Order Completed');
			    				$itemObject->setLabelsPrinted(1);
			    				$em->persist($itemObject);
			    				$em->flush();
			    				break;
			    			case 'Palletways':		
			    				// Check a service has been selected
			    				if ($itemDeliveryService != '')
			    				{	    							    				
				    				// Add the new note
				    				if ($itemDeliveryService == 'Arranged')
				    				{
					    				$htmlNote = "Your item has been dispatched for delivery with Palletways.\n\n";
					    				$htmlNote .= "Palletways will call you <strong>1 hour</strong> before delivery.";
					    				if ($itemDeliveryDateFrom && $itemDeliveryDateTo)
					    				{
					    					$htmlNote .= "\n\nYour delivery has been arranged for between <strong>".$itemDeliveryDateFrom."</strong> and <strong>".$itemDeliveryDateTo."</strong>.";
					    				}
					    				$plainTextNote = "Your item has been dispatched for delivery with Palletways.\n\n";
					    				$plainTextNote .= "Palletways will call you <strong>1 hour</strong> before delivery.";
					    				if ($itemDeliveryDateFrom && $itemDeliveryDateTo)
					    				{
					    					$plainTextNote .= "\n\nYour delivery has been arranged for between ".$itemDeliveryDateFrom." and ".$itemDeliveryDateTo.".";
					    				}
					    			} else {
						    			$htmlNote = "Your item has been dispatched for delivery with Palletways.\n\n";
					    				$htmlNote .= "Palletways will call you within <strong>24-48 hours</strong> to arrange delivery delivery.";
					    				$plainTextNote = "Your item has been dispatched for delivery with Palletways.\n\n";
					    				$plainTextNote .= "Palletways will call you within <strong>24-48 hours</strong> to arrange delivery delivery.";
					    			}
							    	$orderNoteObject = new OrderNote();
							    	$orderNoteObject->setOrderId($itemObject->getId());
							    	$orderNoteObject->setNoteType('customer');
							    	$orderNoteObject->setNotified(1);
							    	$orderNoteObject->setNote($plainTextNote);
							    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
							    	$em->persist($orderNoteObject);
								    $em->flush();
								    
								    // Update notes count on order
								    $itemObject->setNotesCount(intval($itemObject->getNotesCount()) + 1);
				    				$em->persist($itemObject);
				    				$em->flush();
							    
								    // Send the email
									try
									{
										$email = \Swift_Message::newInstance();
							        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
							        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
							        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
							        	if ($itemObject->getSendReviewRequest() > 0)
							        	{
							        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
							        	}
							        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
										$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
							    		$this->get('mailer')->send($email);
							    		
							    		// Set the review as requested
									    $itemObject->setReviewRequested(1);
					    				$em->persist($itemObject);
					    				$em->flush();
									} catch (Exception $exception) {
										error_log('Error sending email!');
									}
									
									// Update the order status
				    				$itemObject->setStatus('Order Completed');
				    				$itemObject->setLabelsPrinted(1);
				    				$em->persist($itemObject);
				    				$em->flush();
				    			}
			    				break;
			    			case 'GHD Transport':			    							    				
			    				// Add the new note
			    				
			    				$htmlNote = "GHD Transport Limited will be contacting you with your delivery date soon.\n\n";
			    				$htmlNote .= "For Delivery Enquiries Tel: 0115 944 3702 (GHD Transport Limited).\n\n";
			    				$htmlNote .= "Please check all items before signing. Thank you.";
			    				$plainTextNote = "GHD Transport Limited will be contacting you with your delivery date soon.\n\n";
			    				$plainTextNote .= "For Delivery Enquiries Tel: 0115 944 3702 (GHD Transport Limited).\n\n";
			    				$plainTextNote .= "Please check all items before signing. Thank you.";
						    	$orderNoteObject = new OrderNote();
						    	$orderNoteObject->setOrderId($itemObject->getId());
						    	$orderNoteObject->setNoteType('customer');
						    	$orderNoteObject->setNotified(1);
						    	$orderNoteObject->setNote($plainTextNote);
						    	$orderNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
						    	$em->persist($orderNoteObject);
							    $em->flush();
							    
							    // Update notes count on order
							    $itemObject->setNotesCount(intval($itemObject->getNotesCount()) + 1);
			    				$em->persist($itemObject);
			    				$em->flush();
						    
							    // Send the email
								try
								{
									$email = \Swift_Message::newInstance();
						        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
						        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
						        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
						        	if ($itemObject->getSendReviewRequest() > 0)
						        	{
						        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
						        	}
						        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
									$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
						    		$this->get('mailer')->send($email);
						    		
						    		// Set the review as requested
								    $itemObject->setReviewRequested(1);
				    				$em->persist($itemObject);
				    				$em->flush();
								} catch (Exception $exception) {
									error_log('Error sending email!');
								}
								
								// Update the order status
			    				$itemObject->setStatus('Order Completed');
			    				$itemObject->setLabelsPrinted(1);
			    				$em->persist($itemObject);
			    				$em->flush();
			    				break;
			    		}
	    			}
    			}
    			
    			// Check if we need to save the DPD import file
    			if ($dpdImportFile != "Account|AddressCode|Name|Address 1|Address 2|Town|County|PostCode|Service|Qty of Labels|Contact|Telephone|Email|Email2|Additional Info\n")
    			{
	    			$dpdImportFileName = '/var/www/vhosts/kitchenappliancecentre.co.uk/webapps/web/uploads/imports/dpd/import-'.date('dmYHis').'.txt';
					$fileHandle = fopen($dpdImportFileName, 'w');
					fwrite($fileHandle, $dpdImportFile);
					fclose($fileHandle);
					
					// Notify user
		    		$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been updated and '.sizeof($select).' DPD '.(sizeof($select) == 1?'order has':'orders have').' have been sent to the label printer.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_process_deliveries'));
    			} else {
	    			// Notify user
		    		$this->get('session')->getFlashBag()->add('success', 'The selected '.$this->settings['multipleDescription'].' have been updated.');
		    		
		    		// Forward
		    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_process_deliveries'));
    			}
    		} else {
	    		// Notify user
	    		$this->get('session')->getFlashBag()->add('notice', 'You did not select any '.$this->settings['multipleDescription'].' to update.');
	    		
	    		// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_process_deliveries'));
    		}
    	}
				
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	    	    	    	    	
    	// Get the items
		$qb = $em->createQueryBuilder();
    	$qb->select('i');
    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'], 'i');
	    $qb->addOrderBy('i.createdAt', 'DESC');
    	$qb->andWhere($qb->expr()->neq('i.deliveryType', $qb->expr()->literal('Collection')));
    	$qb->andWhere($qb->expr()->eq('i.status', $qb->expr()->literal('Processing Your Order')));
		$items = $qb->getQuery()->getResult();
		$data['items'] = $items;
						
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':processDeliveries.html.twig', array('data' => $data));
    }
    
    // Import tracking
    public function importTrackingAction(Request $request)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Set the number of orders updated
		$ordersUpdated = 0;
		
   		// Get tracking data
		$trackingFileName = '/var/www/vhosts/kitchenappliancecentre.co.uk/webapps/web/uploads/exports/dpd/EXPORT.TXT';
		$renamedTrackingFileName = '/var/www/vhosts/kitchenappliancecentre.co.uk/webapps/web/uploads/exports/dpd/export-'.date("dmYHis").'.txt';
		if (file_exists($trackingFileName))
		{
			$fileHandle = fopen($trackingFileName, "r");
			$trackingFileContents = fread($fileHandle, filesize($trackingFileName));
			foreach (explode("\n", $trackingFileContents) as $line)
			{
				$orderInfo = explode(",", $line);
				if (sizeof($orderInfo) > 1)
				{
					$orderId = $orderInfo[3];
					
					// Get the item
					$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($orderId);
	    			if ($itemObject)
	    			{
	    				// Get the new tracking number
	    				$trackingNumber = $orderInfo[0].$orderInfo[1];
	    				
	    				// Make sure there is no tracking number already set
	    				if (($itemObject->getTrackingNumber() == '') || ($itemObject->getTrackingNumber() != $trackingNumber))
	    				{
		    				// Update the tracking number
		    				$itemObject->setTrackingNumber($trackingNumber);
		    				$itemObject->setStatus('Order Completed');
		    				$em->persist($itemObject);
		    				$em->flush();
		    				
		    				// Get the admin
		    				$admin = $this->get('session')->get('admin');
		    				
		    				// Add the new note
		    				$htmlNote = "Your item has been dispatched for signed delivery with DPD. Your consignment number is ".$trackingNumber.".\n\n";
		    				$htmlNote .= "<a href=\"http://www.dpd.co.uk/service/tracking?parcel=".$trackingNumber."\">Click here to track your delivery.<a>\n\n";
		    				$htmlNote .= "Tracking will be active after 5.30pm today.";
		    				$plainTextNote = "Your item has been dispatched for signed delivery with DPD. Your consignment number is ".$trackingNumber.".\n\n";
		    				$plainTextNote .= "Go to http://www.dpd.co.uk/service/tracking?parcel=".$trackingNumber." to track your delivery.\n\n";
		    				$plainTextNote .= "Tracking will be active after 5.30pm today.";
					    	$orderNoteObject = new OrderNote();
					    	$orderNoteObject->setOrderId($itemObject->getId());
					    	$orderNoteObject->setNoteType('customer');
					    	$orderNoteObject->setNotified(1);
					    	$orderNoteObject->setNote($plainTextNote);
					    	$orderNoteObject->setCreator('Automated');
					    	$em->persist($orderNoteObject);
						    $em->flush();
						    
						    // Update notes count on order
						    $itemObject->setNotesCount(intval($itemObject->getNotesCount()) + 1);
		    				$em->persist($itemObject);
		    				$em->flush();
						    
						    // Send the email
							try
							{
								$email = \Swift_Message::newInstance();
					        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
					        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
					        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
					        	if ($itemObject->getSendReviewRequest() > 0)
					        	{
					        		$email->setBcc(array('0cbe3042@trustpilotservice.com'));
					        	}
					        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
								$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
					    		$this->get('mailer')->send($email);
					    		
					    		// Set the review as requested
							    $itemObject->setReviewRequested(1);
			    				$em->persist($itemObject);
			    				$em->flush();
							} catch (Exception $exception) {
								error_log('Error sending email!');
							}
		    				
		    				// Set that importing has occurred
		    				$ordersUpdated++;
	    				}
	    			
	    			}
	    		}
			}
			
			// Rename the tracking import file
			if ($ordersUpdated > 0)
			{
				rename($trackingFileName, $renamedTrackingFileName);
			}
			fclose($fileHandle);
		}
				
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['ordersUpdated'] = $ordersUpdated;
    	    	    	    	    							
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':importTracking.html.twig', array('data' => $data));
    }
    
    // Add
    public function addAction(Request $request)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	$seoService = $this->get('web_illumination_admin.seo_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
    	// Add
    	if ($request->getMethod() == 'POST')
    	{
    		// Get submitted data
    		$parentId = $request->request->get('parent-id');
    		$status = $request->request->get('status');
    		$departmentPath = $parentId;
    		$hidePrices = 0;
    		$showPricesOutOfHours = 0;
    		$membershipCardDiscountAvailable = 0;
    		$maximumMembershipCardDiscount = 0.0000;
    		$deliveryBand = 0.0000;
    		$parentDepartmentIndexObject = $em->getRepository('WebIlluminationAdminBundle:DepartmentIndex')->findOneBy(array('departmentId' => $parentId, 'locale' => 'en'));
    		$checkDeliveryBand = $parentDepartmentIndexObject->getCheckDeliveryBand();
    		$inheritedDeliveryBand = $parentDepartmentIndexObject->getInheritedDeliveryBand();
    		$displayOrder = 999999;
    		$locale = 'en';
    		$name = trim($request->request->get('name'));
    		$description = $seoService->cleanHtml($request->request->get('description'));
    		$menuTitle = $seoService->getMenuTitle($name);
    		$pageTitle = $name;
    		$header = $name;
    		$metaDescription = $seoService->shortenContent($description, 160);
    		$metaKeywords = $seoService->generateKeywords($name.' '.$description);
    		$searchWords = $metaKeywords;
    		$googleDepartment = $request->request->get('google-department');
    		$ebayDepartment = '';
    		$amazonDepartment = '';
    		$url = $seoService->generateUrl($pageTitle);
    		$addAnother = $request->request->get('add-another');
    		
    		// Add object
    		$object = new Department();
    		$object->setParentId($parentId);
    		$object->setStatus($status);
    		$object->setDepartmentPath($departmentPath);
    		$object->setHidePrices($hidePrices);
    		$object->setShowPricesOutOfHours($showPricesOutOfHours);
    		$object->setMembershipCardDiscountAvailable($membershipCardDiscountAvailable);
    		$object->setMaximumMembershipCardDiscount($maximumMembershipCardDiscount);
    		$object->setDeliveryBand($deliveryBand);
    		$object->setCheckDeliveryBand($checkDeliveryBand);
    		$object->setInheritedDeliveryBand($inheritedDeliveryBand);
    		$object->setDisplayOrder($displayOrder);
    		$em->persist($object);
    		$em->flush();
    		$id = $object->getId();
    		
    		// Add object description
    		$objectDescription = new DepartmentDescription();
    		$objectDescription->setDepartmentId($id);
    		$objectDescription->setLocale($locale);
    		$objectDescription->setName($name);
    		$objectDescription->setDescription($description);
    		$objectDescription->setMenuTitle($menuTitle);
    		$objectDescription->setPageTitle($pageTitle);
    		$objectDescription->setPageTitleTemplate('');
    		$objectDescription->setHeader($header);
    		$objectDescription->setMetaDescription($metaDescription);
    		$objectDescription->setMetaDescriptionTemplate('');
    		$objectDescription->setMetaKeywords($metaKeywords);
    		$objectDescription->setSearchWords($searchWords);
    		$objectDescription->setGoogleDepartment($googleDepartment);
    		$objectDescription->setEbayDepartment($ebayDepartment);
    		$objectDescription->setAmazonDepartment($amazonDepartment);
    		$em->persist($objectDescription);
    		$em->flush();
    		
    		// Rebuild path
    		$service->rebuildPath($id);
    		
    		// Get the parent routing
    		$parentRoutingObject = $em->getRepository('WebIlluminationAdminBundle:Routing')->findOneBy(array('objectId' => $parentId, 'objectType' => 'department'));
    		
    		// Setup the routing
    		if ($parentRoutingObject)
    		{
	    		$routingUrl = $seoService->createUrl($parentRoutingObject->getUrl().'/'.$url);
    		} else {
	    		$routingUrl = $seoService->createUrl($url);
    		}
    		$routingObject = new Routing();
    		$routingObject->setObjectId($id);
    		$routingObject->setObjectType('department');
    		$routingObject->setLocale($locale);
    		$routingObject->setUrl($routingUrl);
    		$em->persist($routingObject);
    		$em->flush();
    		
    		// Rebuild the object indexes
    		$service->rebuildDepartmentIndexObject($id, $locale);
    		if ($parentId > 0)
    		{
    			$service->rebuildDepartmentIndexObject($parentId, $locale);
    		}
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$name.'"</strong> has been added.');
    		
    		// Forward
    		if ($addAnother > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_add'));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_add');
    	$data['parentId'] = $parentId;
    	$data['mode'] = 'add';
    	
    	// Get the departments
    	$departments = $service->getFullDepartmentList();
    	$data['departments'] = $departments;
    	
    	// Get the taxonomy
    	$taxonomy = array();
    	$taxonomyGoogle = $em->getRepository('WebIlluminationAdminBundle:Taxonomy')->findBy(array('objectType' => 'google', 'locale' => 'en'), array('name' => 'ASC'));
    	$taxonomy['google'] = $taxonomyGoogle;
    	$data['taxonomy'] = $taxonomy;
    	    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }
    
    // Update
    public function updateAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
		
    	// Update
    	if ($request->getMethod() == 'POST')
    	{   
    		// Get the item
    		$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
			$itemDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Description')->findOneBy(array($this->settings['singleClass'].'Id' => $id));
			if (!$itemObject || !$itemDescriptionObject)
			{
				// Notify user
				$this->get('session')->getFlashBag()->add('error', 'Sorry, there was a problem saving the '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong>. Please try again.');
    		
				// Forward
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id)));
    		}
			
    		// Get the existing information
    		$existingParentId = $itemObject->getParentId();
    		
    		// Get submitted data
    		$parentId = $request->request->get('parent-id');
    		if ($parentId == $id)
    		{
	    		$parentId = $existingParentId;
    		}
    		$status = $request->request->get('status');
    		$name = $request->request->get('name');
    		$existingName = $itemDescriptionObject->getName();
    		$existingPageTitle = $itemDescriptionObject->getPageTitle();
    		$description = $seoService->cleanHtml($request->request->get('description'));
    		$metaDescription = $itemDescriptionObject->getMetaDescription();
    		$goBack = $request->request->get('go-back');
    		    		
    		// Update object
    		$itemObject->setParentId($parentId);
    		$itemObject->setStatus($status);
    		$em->persist($itemObject);
    		$em->flush();
    		$itemDescriptionObject->setName($name);
    		$itemDescriptionObject->setDescription($description);
    		if (!$metaDescription)
    		{
	    		$metaDescription = $seoService->shortenContent($description, 160);
	    		$itemDescriptionObject->setMetaDescription($metaDescription);
    		}
    		$em->persist($itemDescriptionObject);
    		$em->flush();
    		
    		// Rebuild the path
    		$service->rebuildPath($id);
    		
    		// Rebuild the routing
    		$service->rebuildRouting($id, 'en');
    		
    		// Check to see if the paths need updating
    		if ($parentId != $existingParentId)
    		{
    			// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the paths (need to do all paths first before building routes as routes are based on paths)
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildPath($relatedIndexObject->getDepartmentId());
	    			}
	    		}
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
	    		
	    		// Rebuild the existing and new parent department indexes
	    		if ($parentId > 0)
	    		{
	    			$service->rebuildDepartmentIndexObject($parentId, 'en');
	    		}
	    		if ($existingParentId > 0)
	    		{
	    			$service->rebuildDepartmentIndexObject($existingParentId, 'en');
	    		}
    		}
    		    		
    		// Check to see if the page title needs changing
    		if (($existingName == $existingPageTitle) && ($name != $existingName))
    		{
    			// Update the page title
	    		$itemDescriptionObject->setPageTitle($name);
	    		$em->persist($itemDescriptionObject);
	    		$em->flush();
	    		
	    		// Get all related departments
	    		$relatedIndexObjects = $em->createQuery("SELECT di FROM WebIlluminationAdminBundle:DepartmentIndex di WHERE di.departmentPath LIKE '%|".$id."|%' AND di.departmentId != '".$id."' ORDER BY di.departmentPath ASC")->getResult();
	    		
	    		// Rebuild the routes and the indexes
	    		foreach ($relatedIndexObjects as $relatedIndexObject)
	    		{
	    			if ($relatedIndexObject)
	    			{
		    			$service->rebuildRouting($relatedIndexObject->getDepartmentId(), 'en');
		    			$service->rebuildDepartmentIndexObject($relatedIndexObject->getDepartmentId(), 'en');
	    			}
	    		}
    		}
    		
    		// Rebuild the index
    		$service->rebuildDepartmentIndexObject($id, 'en');
    		
    		// Notify user
    		$this->get('session')->getFlashBag()->add('success', 'The '.$this->settings['singleDescription'].' <strong>"'.$itemIndexObject->getName().'"</strong> has been updated.');
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update', array('id' => $id));
    	$data['mode'] = 'update';
    	
        return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':item.html.twig', array('data' => $data));
    }
    
    // Update notes
    public function updateNotesAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
    	    	
    	// Get the entity manager
		$em = $this->getDoctrine()->getEntityManager();
		
		// Get the item
		$itemObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'])->find($id);
				
		// Update
    	if ($request->getMethod() == 'POST')
    	{ 
    		// Get submitted data
    		$select = $request->request->get('select');
    		$addItem = $request->request->get('add-item');
    		$addNoteType = $request->request->get('add-note-type');
    		$addNotified = $request->request->get('add-notified');
    		$addNote = $request->request->get('add-note');
    		$goBack = $request->request->get('go-back');
    		$delete = $request->request->get('delete');
											    		    		
    		// Run through all selected items
    		if (sizeof($select) > 0)
    		{
    			foreach ($select as $itemId => $item)
    			{
	    			// Get the item
	    			$itemNoteObject = $em->getRepository('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Note')->find($itemId);
	    			if ($itemNoteObject)
	    			{
	    				// Delete the item
	    				if ($delete > 0)
	    				{
	    					$em->remove($itemNoteObject);
			    			$em->flush();
			    		}
	    			}
    			}
    		}
    		
    		// Run through all added items
    		if (sizeof($addItem) > 0)
    		{
    			// Get the admin
			    $admin = $this->get('session')->get('admin');
			    		
    			foreach ($addItem as $itemId => $item)
    			{
    				$itemNoteType = $addNoteType[$itemId];
				    $itemNotified = 0;
				    if (isset($addNotified[$itemId]))
				    {
					    $itemNotified = $addNotified[$itemId];
				    }
				    $itemNote = $addNote[$itemId];
				    if ($itemNote)
				    {
					    $itemNoteObject = new OrderNote();
				    	$itemNoteObject->setOrderId($itemObject->getId());
				    	$itemNoteObject->setNoteType($itemNoteType);
				    	$itemNoteObject->setNotified($itemNotified);
				    	$itemNoteObject->setNote($itemNote);
				    	$itemNoteObject->setCreator($admin['contact']['firstName'].' '.$admin['contact']['lastName']);
				    	$em->persist($itemNoteObject);
					    $em->flush();
					    
					    // Send an email if customer notification is requested
					    if (($itemNotified > 0) && ($itemNoteType == 'customer'))
					    {
							try
							{
								$email = \Swift_Message::newInstance();
					        	$email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$itemObject->getId());
					        	$email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
					        	$email->setTo(array($itemObject->getEmailAddress() => $itemObject->getFirstName().' '.$itemObject->getLastName()));
					        	$email->setBody($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.html.twig', array('order' => $itemObject, 'note' => $htmlNote)), 'text/html');
								$email->addPart($this->renderView('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':message.txt.twig', array('order' => $itemObject, 'note' => $plainTextNote)), 'text/plain');
					    		$this->get('mailer')->send($email);				    		
							} catch (Exception $exception) {
								error_log('Error sending email!');
							}
						}
		    		}
    			}
    			
    			// Update items count
    			$qb = $em->createQueryBuilder();
		    	$qb->select($qb->expr()->count("i.id"));
		    	$qb->from('WebIlluminationAdminBundle:'.$this->settings['singleModel'].'Note', 'i');
	    		$qb->andWhere($qb->expr()->eq('i.orderId', $qb->expr()->literal($id)));
    			$itemObject->setNotesCount($qb->getQuery()->getSingleScalarResult());
    			$em->persist($itemObject);
			    $em->flush();
    		}
    		 
    		// Notify user
    		if ($delete > 0)
	    	{
    			$this->get('session')->getFlashBag()->add('success', 'The selected product features have been deleted.');
    		} else {
	    		$this->get('session')->getFlashBag()->add('success', 'The selected product features have been updated.');
    		}
    		
    		// Forward
    		if ($goBack > 0)
    		{
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath']));
    		} else {
	    		return $this->redirect($this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_notes', array('id' => $id)));
    		}
    	}
    	
    	// Setup the data
    	$data = array();
    	$data['settings'] = $this->settings;
    	$data['item'] = $itemObject;
    	$data['formAction'] = $this->get('router')->generate('admin_'.$this->settings['multiplePath'].'_update_notes', array('id' => $id));
    	$data['mode'] = 'update';
    	
    	// Get the items
		$data['items'] = $em->getRepository('WebIlluminationAdminBundle:OrderNote')->findBy(array('orderId' => $id), array('createdAt' => 'DESC'));
		
		return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':itemNotes.html.twig', array('data' => $data));    	    	    	
    }
    
    // View copy order
    public function viewCopyOrderAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
	    	    	
	    // Get the order
	    $item = $service->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewCopyOrder.html.twig', array('order' => $item));
    }
    
    // View delivery note
    public function viewDeliveryNoteAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
	    
	    // Get the order
	    $item = $service->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewDeliveryNote.html.twig', array('order' => $item));
    }
    
    // View invoice
    public function viewInvoiceAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
	    
	    // Get the order
	    $item = $service->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewInvoice.html.twig', array('order' => $item));
    }
    
    // View order
    public function viewOrderAction(Request $request, $id)
    {
    	// Get the services
    	$service = $this->get('web_illumination_admin.'.$this->settings['singleClass'].'_service');
	    
	    // Get the order
	    $item = $service->getOrder($id);
    	
    	return $this->render('WebIlluminationAdminBundle:'.$this->settings['multipleModel'].':viewOrder.html.twig', array('order' => $item));
    }     
}