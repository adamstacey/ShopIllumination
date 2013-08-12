<?php
namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\Order\AddressesType;
use KAC\SiteBundle\Form\Order\DeliveryType;
use KAC\SiteBundle\Form\Order\EditOrderType;
use KAC\SiteBundle\Form\Order\NewOrderType;
use KAC\SiteBundle\Form\Order\NotesType;
use KAC\SiteBundle\Form\Order\OrderFilterType;
use KAC\SiteBundle\Form\Order\OrderType;
use KAC\SiteBundle\Form\Order\PaymentType;
use KAC\SiteBundle\Form\Order\OverviewType;
use KAC\SiteBundle\Form\Order\ProcessDeliveryType;
use KAC\SiteBundle\Form\Order\ProductsType;
use KAC\SiteBundle\Manager\Delivery\Courier\Dpd;
use KAC\SiteBundle\Manager\Delivery\Courier\RoyalMail;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders", name="orders_index")
     */
    public function indexAction(Request $request)
    {
        $queue = $this->container->get('kac_site.manager.order_queue');

        /**
         * @var $em EntityManager
         */
        $em    = $this->getDoctrine()->getManager();
        $qb    = $em->createQueryBuilder();
        $qb->select('o')
            ->from('KAC\SiteBundle\Entity\Order', 'o');

        $form = $this->createFormBuilder(array('filters' => array()))
            ->add('filters', new OrderFilterType())
            ->add('queue', 'submit')
            ->add('update', 'submit')
            ->add('selected', 'collection', array(
                'type' => 'text',
                'allow_add' => true,
            ))->getForm();

        $form->submit($request);
        if($form->isValid()) {
            $data = $form->getData();

            if($form->get('update')->isClicked())
            {
                $filters = $data['filters'];
                // Add filters for any flags that the user has set
                foreach ($filters as $flag => $filter)
                {
                    if (is_array($filter))
                    {
                        $parts = array();
                        $i=0;
                        array_walk($filter, function(&$item) use ($flag, $qb, &$parts, &$i) {
                            if (!empty($item))
                            {
                                if($flag === 'paymentType')
                                {
                                    $parts[] = $qb->expr()->like('o.'.$flag, ":lc$flag$i");
                                    $qb->setParameter('lc'.$flag.$i, strtolower($item));
                                }
                                $parts[] = $qb->expr()->like('o.'.$flag, ":$flag$i");
                                $qb->setParameter($flag.$i, $item);
                            }
                            $i++;
                        });
                        if(count($parts) > 0)
                        {
                            $qb->andWhere(call_user_func_array(array($qb->expr(), 'orX'), $parts));
                        }
                    } else {
                        if (!empty($filter))
                        {
                            if($flag === 'name')
                            {
                                $qb->andWhere($qb->expr()->like($qb->expr()->concat('o.firstName', $qb->expr()->concat($qb->expr()->literal(' '), 'o.lastName')), ":$flag"));
                                $qb->setParameter($flag, $filter);
                            } elseif($flag === 'createdAtFrom') {
                                $qb->andWhere($qb->expr()->gte('o.createdAt', ":$flag"));
                                $qb->setParameter($flag, $filter);
                            } elseif($flag === 'createdAtTo') {
                                $qb->andWhere($qb->expr()->lte('o.createdAt', ":$flag"));
                                $qb->setParameter($flag, $filter);
                            } else {
                                $qb->andWhere($qb->expr()->like('o.'.$flag, ":$flag"));
                                $qb->setParameter($flag, $filter);
                            }
                        }
                    }
                }
            }

            // Add orders to the processing queue
            if($form->get('queue')->isClicked())
            {
                foreach($data['selected'] as $selectedId)
                {
                    // Ensure that the order exists
                    if(null !== $order = $em->getRepository('KACSiteBundle:Order')->find($selectedId))
                    {
                        $queue[] = intval($selectedId);
                    }
                }

                return $this->redirect($this->generateUrl('orders_queue'));
            }
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->get('request')->query->get('page', 1),
            20
        );
        $pagination->setTemplate('KACSiteBundle:Includes:pagination.html.twig');
        $pagination->setSortableTemplate('KACSiteBundle:Includes:sortable.html.twig');

        return $this->render('KACSiteBundle:Order:index.html.twig', array(
            'pagination' => $pagination,
            'queue' => $queue->all(),
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/queue", name="orders_queue")
     */
    public function queueAction(Request $request)
    {
        $queue = $this->container->get('kac_site.manager.order_queue');

        $form = $this->createFormBuilder()
            ->add('action', 'choice', array(
                'choices' => array(
                    'deliveries' => 'Process Deliveries',
                    'document-print-order' => 'Print Orders',
                    'document-print-copyorder' => 'Print Copy Orders',
                    'document-print-deliverynote' => 'Print Delivery Notes',
                    'document-print-invoice' => 'Print Customer Orders',
                    'document-email-invoice' => 'Email Customer Orders',
                )
            ))
            ->add('clear', 'checkbox', array(
                'label' => 'Clear queue after processing',
            ))
            ->getForm();

        $form->submit($request);
        if($form->isValid()) {
            $data = $form->getData();

            return $this->redirect($this->generateUrl('orders_process', array(
                'action' => $data['action'],
                'clear' => $data['clear'],
            )));
        }

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();
        if(count($queue->all()) == 0)
        {
            $orders = array();
        } else {
            $qb = $em->createQueryBuilder();
            $orders = $qb->select('o')
                ->from('KAC\SiteBundle\Entity\Order', 'o')
                ->andWhere($qb->expr()->in('o.id', '?1'))
                ->setParameter(1, $queue->all())
                ->getQuery()
                ->execute();
        }

        return $this->render('KACSiteBundle:Order:queue.html.twig', array(
            'orders' => $orders,
            'form' => $form->createView()
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/process", name="orders_process")
     */
    public function processAction(Request $request)
    {
        $queue = $this->container->get('kac_site.manager.order_queue');

        if(!$request->query->get('action'))
        {
            throw $this->createNotFoundException();
        }

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        // If the user choose to process deliveries then create the form and show the user the template
        $action = explode('-', $request->query->get('action'));

        if($action[0] === 'deliveries')
        {
            /**
             * @var $orders Order[]
             */
            if(count($queue->all()) === 0)
            {
                $orders = array();
            } else {
                $qb = $em->createQueryBuilder();
                $orders = $qb->select('o')
                    ->from('KAC\SiteBundle\Entity\Order', 'o')
                    ->andWhere($qb->expr()->neq('o.deliveryType', $qb->expr()->literal('Collection')))
                    ->andWhere($qb->expr()->eq('o.status', $qb->expr()->literal('Processing Your Order')))
                    ->andWhere($qb->expr()->in('o.id', '?1'))
                    ->setParameter(1, $queue->all())
                    ->getQuery()
                    ->execute();
            }

            $form = $this->createForm(new ProcessDeliveryType($this->get('kac_site.manager.delivery')), array('orders' => $orders));

            $form->handleRequest($request);
            if($form->isValid()) {
                // Setup processing data
                $data = array();
                $data['dpdImportFile'] = "Account|AddressCode|Name|Address 1|Address 2|Town|County|PostCode|Service|Qty of Labels|Contact|Telephone|Email|Email2|Additional Info\n";
                $data['dpdImportFileName'] = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/imports/dpd/import-'.date('dmYHis').'.txt';
                $data['dpdLabels'] = 0;
                $data['royalMailImportFileName'] = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/imports/royal-mail/Data.txt';
                $data['royalMailLockFileName'] = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/imports/royal-mail/Lock.txt';
                $data['royalMailImportLine'] = 1;

                foreach($orders as $order)
                {
                    $courier = $order->getCourierObject();
                    $courier->process($order, $data, $this->container);

                    $em->persist($order);
                }
                $em->flush();
                
                // Final processing + label printing
                $this->get('session')->getFlashBag()->add('success', 'The orders have been successfully processed.');

                // Check if we need to save the DPD import file
                if ($data['dpdLabels'] > 0)
                {
                    $fileHandle = fopen($data['dpdImportFileName'], 'w');
                    fwrite($fileHandle, $data['dpdImportFile']);
                    fclose($fileHandle);

                    // Notify user
                    $this->get('session')->getFlashBag()->add('success', ' '.$data['dpdLabels'].' DPD '.($data['dpdLabels'] == 1?'order has':'orders have').' been sent to the label printer.');
                }

                // Check if we need to save the Royal Mail import file
                if ($data['royalMailLabels'] > 0)
                {
                    $fileHandle = fopen($data['royalMailImportFileName'], 'a');
                    fwrite($fileHandle, $data['royalMailImportFile']);
                    fclose($fileHandle);

                    // Also generate lock file for Royal Mail
                    $fileHandle = fopen($data['royalMailLockFileName'], 'w');
                    fwrite($fileHandle, "1");
                    fclose($fileHandle);

                    // Notify user
                    $this->get('session')->getFlashBag()->add('success', ' '.$data['royalMailLabels'].' Royal Mail '.($data['royalMailLabels'] == 1?'order has':'orders have').' been sent to the label printer.');
                }

                $this->get('session')->getFlashBag()->add('success', 'The orders have been successfully processed.');

                return $this->redirect($this->generateUrl('orders_queue'));
            }

            return $this->render('KACSiteBundle:Order:processDeliveries.html.twig', array(
                'orders' => $orders,
                'form' => $form->createView()
            ));
            // If the user choose to generate a document then ensure the file is generated and show the user the resulting file
        } elseif($action[0] === 'tracking') {
            // Setup processing data
            $data = array();
            $data['ordersUpdated'] = 0;

            RoyalMail::processTracking($data, $this->container);
            Dpd::processTracking($data, $this->container);

            return $this->render('KACSiteBundle:Order:importTracking.html.twig', $data);
        } elseif($action[0] === 'document') {
            if(count($queue->all()) == 0)
            {
                $orders = array();
            } else {
                $qb = $em->createQueryBuilder();
                $orders = $qb->select('o')
                    ->from('KAC\SiteBundle\Entity\Order', 'o')
                    ->andWhere($qb->expr()->in('o.id', '?1'))
                    ->setParameter(1, $queue->all())
                    ->getQuery()
                    ->execute();
            }

            /**
             * @var $order Order
             */
            foreach($orders as $order)
            {
                // Update the order
                switch($action[2])
                {
                    case 'order':
                        if ($order->getStatus() == 'Payment Received') $order->setStatus('Processing Your Order');
                        if ($order->getDeliveryTypeObject() && $order->getDeliveryTypeObject()->getType() === 'Royal Mail') $order->setDeliveryNotePrinted(true);
                        $order->setOrderPrinted(true);
                        break;
                    case 'deliverynote':
                        $order->setDeliveryNotePrinted(true);
                        break;
                }

                $em->persist($order);
            }
            $em->flush();

            $generator = $this->get('kac_site.manager.order_document_generator');
            try {
                if($action[1] === 'email')
                {
                    foreach($orders as $order)
                    {
                        // Send the email
                        try
                        {
                            $outputFile = $generator->generateSingleDocument($action[2], $orders);

                            $email = \Swift_Message::newInstance();
                            $email->setSubject('Your Order with Kitchen Appliance Centre: '.$order->getId());
                            $email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
                            $email->setTo(array($order['emailAddress'] => $order->getFirstName().' '.$order->getLastName()));
                            $email->setBody($this->renderView('WebIlluminationShopBundle:Checkout:invoice.html.twig', array('order' => $order)), 'text/html');
                            $email->addPart($this->renderView('WebIlluminationShopBundle:Checkout:invoice.txt.twig', array('order' => $order)), 'text/plain');
                            $email->attach(\Swift_Attachment::fromPath($outputFile)->setFilename('kitchen-appliance-centre-invoice-'.$order->getId().'.pdf'));
                            $this->get('mailer')->send($email);
                        } catch (\Exception $exception) {
                            $this->get('session')->getFlashBag()->add('error', 'There was an error sending an email');
                        }
                    }

                    $this->get('session')->getFlashBag()->add('success', 'The emails have been succesfully sent');
                } else {
                    $generator = $this->get('kac_site.manager.order_document_generator');

                    $outputFile = $generator->generateBulkDocument($action[2], $orders);

                    $this->get('session')->getFlashBag()->add('success', sprintf(
                        'The order document has been generated. <a href="%s">Click here</a> to view it.',
                        $this->get('templating.helper.assets')->getUrl('/uploads/documents/order' . $outputFile)
                    ));
                }
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error', 'There was an error generating the order documents');
            }
        }

        return $this->redirect($this->generateUrl('orders_queue'));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/queue/{id}/remove", name="orders_queue_remove")
     */
    public function queueRemoveAction(Request $request, $id)
    {
        $queue = $this->container->get('kac_site.manager.order_queue');
        unset($queue[$id]);

        $this->redirect($this->generateUrl('orders_queue'));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/queue/clear", name="orders_queue_clear")
     */
    public function queueClearAction(Request $request, $id)
    {
        $queue = $this->container->get('kac_site.manager.order_queue');
        $queue->clear();

        $this->redirect($this->generateUrl('orders_queue'));
    }

    /**
     * @Route("/admin/orders/new", name="orders_new")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $order = new Order();
        $deliveryMethods = DeliveryFactory::getAllMethodNames();
        $form = $this->createForm(new NewOrderType($deliveryMethods), $order);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                foreach($order->getProducts() as $orderProduct)
                {
                    $orderProduct->setProduct($orderProduct->getVariant()->getProduct());
                }
                $this->getManager()->updateProductInfo($order);
                $this->getManager()->updateDeliveryInfo($order);

                $em->persist($order);
                $em->flush();

                return $this->redirect($this->generateUrl('orders_view', array(
                    'id' => $order->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Order:new.html.twig', array(
            'order' => $order,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/orders/{id}", name="orders_view")
     */
    public function viewAction($id)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if (!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        return $this->render('KACSiteBundle:Order:view.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Route("/admin/orders/{id}/edit", name="orders_edit")
     */
    public function editAction(Request $request, $id)
    {
        $originalNotes = array();
        $originalProducts = array();

        $em = $this->getDoctrine()->getManager();
        $deliveryManager = $this->get('kac_site.manager.delivery');

        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if(!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        foreach($order->getNotes() as $note)
        {
            $originalNotes[] = $note;
        }
        foreach($order->getProducts() as $product)
        {
            $originalProducts[] = $product;
        }


        $deliveryMethods = DeliveryFactory::getAllMethodNames();
        $form = $this->createForm(new EditOrderType($deliveryManager), $order);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Remove all notes from the to delete array that have not been deleted
                foreach($order->getNotes() as $note) {
                    foreach ($originalNotes as $key => $toDel) {
                        if ($toDel->getId() === $note->getId()) {
                            unset($originalNotes[$key]);
                        }
                    }

                    $note->setOrder($order);
                }

                foreach ($originalNotes as $note) {
                    $em->remove($note);
                }
                foreach($order->getProducts() as $product) {
                    foreach ($originalProducts as $key => $toDel) {
                        if ($toDel->getId() === $product->getId()) {
                            unset($originalProducts[$key]);
                        }
                    }

                    $product->setProduct($product->getVariant()->getProduct());
                }

                foreach ($originalProducts as $product) {
                    $em->remove($product);
                }

                $this->getManager()->updateProductInfo($order);
                $this->getManager()->updateDeliveryInfo($order);

                $em->persist($order);
                $em->flush();

                return $this->redirect($this->generateUrl('orders_view', array(
                    'id' => $order->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Order:edit.html.twig', array(
            'order' => $order,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/orders/{id}/payment", name="orders_edit_payment")
     */
    public function editPaymentAction(Request $request, $id)
    {
        return $this->baseEditAction($request, $id, 'KACSiteBundle:Order:edit_payment.html.twig', new OverviewType());
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/documents", name="orders_edit_documents")
     */
    public function editDocumentsAction($id)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if (!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        return $this->render('KACSiteBundle:Order:edit_documents.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/documents", name="orders_edit_documents")
     */
    public function generateDocumentsAction($id)
    {
        die("Not yet implemented. Sorry.");

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if (!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        return $this->render('KACSiteBundle:Order:edit_documents.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/{id}/refund", name="orders_refund")
     */
    public function refundAction($id)
    {
        die("Not yet implemented. Sorry.");
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/admin/orders/{id}/delete", name="orders_delete")
     */
    public function deleteAction($id)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if (!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        $em->remove($order);
        $em->flush();

        $this->redirect($this->generateUrl('orders_index'));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/orders/{id}/view.html", name="orders_customer_view")
     */
    public function viewCustomerAction($id)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if (!$order)
        {
            throw new NotFoundHttpException("Address not found");
        }

        return $this->render('KACSiteBundle:Order:view_customer.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Route("/orders/track.html", name="orders_track")
     */
    public function trackAction(Request $request)
    {
        if(!$request->query->get('id') || !$request->query->get('email'))
        {
            $form = $this->container->get('form.factory')->createNamedBuilder('', 'form', null, array(
                'csrf_protection' => false
            ))
                ->add('id', 'text', array(
                    'label' => 'Order ID',
                    'attr' => array('class' => 'fill'),
                    'required' => true,
                ))
                ->add('email', 'email', array(
                    'label' => 'E-Mail Address',
                    'attr' => array('class' => 'fill'),
                    'required' => true,
                ))
                ->getForm();

            return $this->render('KACSiteBundle:Order:track_order_form.html.twig', array(
                'form' => $form->createView()
            ));
        }

        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Order $order
         */
        $orders = $em->getRepository("KAC\SiteBundle\Entity\Order")->findBy(array(
            'id' => $request->query->get('id'),
            'emailAddress' => $request->query->get('email'),
        ));
        if (!$orders || count($orders) !== 1)
        {
            throw new NotFoundHttpException("Address not found");
        }

        return $this->render('KACSiteBundle:Order:track_order.html.twig', array(
            'order' => $orders[0]
        ));
    }

    private function getManager()
    {
        return $this->get('kac_site.manager.order');
    }
}