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
use KAC\SiteBundle\Form\Order\ProductsType;
use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
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
        /**
         * @var $em EntityManager
         */
        $em    = $this->getDoctrine()->getManager();
        $qb    = $em->createQueryBuilder();
        $qb->select('o')
            ->from('KAC\SiteBundle\Entity\Order', 'o');

        $form = $this->createForm(new OrderFilterType(), array());

        $form->submit($request);
        if($form->isValid()) {
            // Add filters for any flags that the user has set
            $filters = $form->getData();
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

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->get('request')->query->get('page', 1),
            20
        );

        return $this->render('KACSiteBundle:Order:index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/orders/new", name="orders_new")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $order = new Order();
        $deliveryMethods = DeliveryMethodFactory::getAllMethodNames();
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


        $deliveryMethods = DeliveryMethodFactory::getAllMethodNames();
        $form = $this->createForm(new EditOrderType($deliveryMethods), $order);

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