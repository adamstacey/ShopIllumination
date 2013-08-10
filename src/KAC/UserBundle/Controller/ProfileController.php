<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KAC\UserBundle\Controller;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use KAC\SiteBundle\Entity\Contact;
use KAC\SiteBundle\Form\Contact\AddressType;
use KAC\UserBundle\Entity\User;
use KAC\UserBundle\Form\Type\EditProfileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;

class ProfileController extends Controller
{
    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile.html", name="profile_overview")
     */
    public function overviewAction()
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Fetch orders
        $qb = $em->createQueryBuilder();
        $orders = $qb->select('o')
            ->from('KAC\SiteBundle\Entity\Order', 'o')
            ->where($qb->expr()->eq('o.user', '?1'))
            ->andWhere($qb->expr()->in('o.status', '?2'))
            ->setParameter(1, $user->getId())
            ->setParameter(2, array('Order Completed', 'Payment Received', 'Processing Your Order', 'Cancelled', 'Refunded', 'Order Ready for Collection', 'Order with Delivery Company', 'Part Delivered'))
            ->setMaxResults(5)
            ->getQuery()
            ->execute();

        return $this->render('KACUserBundle:Profile:overview.html.twig', array(
            'orders' => $orders,
            'user' => $user,
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile-orders.html", name="profile_orders")
     */
    public function ordersAction()
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Fetch orders
        $qb = $em->createQueryBuilder();
        $query = $qb->select('o')
            ->from('KAC\SiteBundle\Entity\Order', 'o')
            ->where($qb->expr()->eq('o.user', '?1'))
            ->andWhere($qb->expr()->in('o.status', '?2'))
            ->setParameter(1, $user->getId())
            ->setParameter(2, array('Order Completed', 'Payment Received', 'Processing Your Order', 'Cancelled', 'Refunded', 'Order Ready for Collection', 'Order with Delivery Company', 'Part Delivered'));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 10);

        return $this->render('KACUserBundle:Profile:orders.html.twig', array(
            'pagination' => $pagination,
            'user' => $user,
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile/edit.html", name="profile_edit")
     */
    public function editAction(Request $request)
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $form = $this->createForm(new EditProfileType(), $user);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('profile_edit'));
        }

        return $this->render('KACUserBundle:Profile:edit.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile/addresses.html", name="profile_addresses")
     */
    public function addressesAction()
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Ensure that the user has a contact entity
        if($user->getContact() === null)
        {
            $user->setContact(new Contact());
            $em->persist($user);
            $em->flush();
        }

        return $this->render('KACUserBundle:Profile:addresses.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile/addresses/new.html", name="profile_new_address")
     */
    public function newAddressAction(Request $request)
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        // Ensure that the user has a contact entity
        if($user->getContact() === null)
        {
            $user->setContact(new Contact());
            $em->persist($user);
            $em->flush();
        }

        // Create address entity
        $address = new Contact\Address();

        $form = $this->createForm(new AddressType(), $address);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $user->getContact()->addAddress($address);
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('profile_addresses'));
        }

        return $this->render('KACUserBundle:Profile:new_address.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile/addresses/{id}/edit.html", name="profile_edit_address")
     */
    public function editAddressAction(Request $request, $id)
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Contact\Address $address
         */
        $address = $em->getRepository("KAC\SiteBundle\Entity\Contact\Address")->find($id);
        if (!$address)
        {
            throw new NotFoundHttpException("Address not found");
        }

        $form = $this->createForm(new AddressType(), $address);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $em->persist($address);
            $em->flush();

            return $this->redirect($this->generateUrl('profile_addresses'));
        }

        return $this->render('KACUserBundle:Profile:edit_address.html.twig', array(
            'address' => $address,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Secure(roles="ROLE_USER")
     * @Route("/profile/addresses/{id}/delete.html", name="profile_delete_address")
     */
    public function deleteAddressAction(Request $request, $id)
    {
        /**
         * @var $em EntityManager
         * @var $user User
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Contact\Address $address
         */
        $address = $em->getRepository("KAC\SiteBundle\Entity\Contact\Address")->find($id);
        if (!$address)
        {
            throw new NotFoundHttpException("Address not found");
        }

        $em->remove($address);
        $em->flush();

        return $this->redirect($this->generateUrl('profile_addresses'));
    }
}