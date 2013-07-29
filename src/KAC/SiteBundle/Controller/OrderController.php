<?php
namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\Order\DeliveryType;
use KAC\SiteBundle\Form\Order\PaymentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders", name="orders_index")
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

        // Add filters for any flags that the user has set
        $filters = $request->query->get('filter', array());
        $flags = array('id', 'name', 'email', 'status', 'deliveryType');
        foreach ($flags as $flag)
        {
            if (array_key_exists($flag, $filters))
            {
                $filter = $filters[$flag];
                if (is_array($filter))
                {
                    $qb2 = $em->createQueryBuilder();
                    array_walk($filter, function(&$item) use ($flag, $qb2) {
                        if (!empty($item))
                        {
                            $qb2->andWhere($qb2->expr()->eq($flag, $qb2->expr()->literal(":$flag")));
                            $qb2->setParameter($flag, $item);
                        }
                    });
                    $qb->andWhere($qb2->getDQL());
                } else {
                    if (!empty($filter))
                    {
                        if($flag === 'name')
                        {
                            $qb->andWhere($qb->expr()->eq($qb->expr()->concat('o.firstName', $qb->expr()->concat($qb->expr()->literal(' '), 'o.lastName')), $qb->expr()->literal(":$flag")));
                            $qb->setParameter($flag, $filter);
                        } else {
                            $qb->andWhere($qb->expr()->eq($flag, $qb->expr()->literal(":$flag")));
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
            'pagination' => $pagination
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit", name="orders_edit")
     */
    public function baseEditAction(Request $request, $id, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();

        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if(!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        $form = $this->createForm($formClass, $order);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $em->persist($order);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'id' => $order->getId(),
                )));
            }
        }

        return $this->render($template, array(
            'order' => $order,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/orders/{id}/edit", name="orders_edit")
     */
    public function editAction($id)
    {
        return $this->redirect($this->generateUrl('orders_edit_delivery', array(
            'id' => $id
        )));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/delivery", name="orders_edit_delivery")
     */
    public function viewDeliveryAction(Request $request, $id)
    {
        $deliveryManager = $this->get('kac_site.manager.delivery');
        $em = $this->getDoctrine()->getManager();

        /**
         * @var $order Order
         */
        $order = $em->getRepository("KAC\SiteBundle\Entity\Order")->find($id);
        if(!$order)
        {
            throw new NotFoundHttpException("Order not found");
        }

        $zone = $deliveryManager->calculateZone($order->getDeliveryCountryCode(), $order->getDeliveryPostZipCode());
        $band = $deliveryManager->calculateBand($deliveryManager->calculateWeighting($order->getProducts()));

        $form = $this->createForm(new DeliveryType($deliveryManager->getCouriers($order->getDeliveryType())), $order);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $em->persist($order);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'id' => $order->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Order:edit_delivery.html.twig', array(
            'order' => $order,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/payment", name="orders_edit_payment")
     */
    public function viewPaymentAction(Request $request, $id)
    {
        return $this->baseEditAction($request, $id, 'KACSiteBundle:Order:edit_payment.html.twig', new PaymentType());
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/products", name="orders_edit_products")
     */
    public function viewProductsAction($id)
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

        return $this->render('KACSiteBundle:Order:edit_products.html.twig', array(
            'order' => $order
        ));
    }

    /**
     * @Secure(roles="ROLE_ADMIN")
     * @Route("/orders/{id}/edit/documents", name="orders_edit_documents")
     */
    public function viewDocumentsAction($id)
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
     * @Route("/orders/{id}/edit/notes", name="orders_edit_notes")
     */
    public function viewNotesAction($id)
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

        return $this->render('KACSiteBundle:Order:edit_notes.html.twig', array(
            'order' => $order
        ));
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

    public function deleteAction($id)
    {

    }
}