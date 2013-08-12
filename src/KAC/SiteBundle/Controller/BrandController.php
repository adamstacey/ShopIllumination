<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class BrandController extends Controller
{
    /**
     * @Route("/admin/brands", name="brands_index")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('b')
            ->from('KAC\SiteBundle\Entity\Brand', 'b');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $this->get('request')->query->get('page', 1),
            20
        );
        $pagination->setTemplate('KACSiteBundle:Includes:pagination.html.twig');
        $pagination->setSortableTemplate('KACSiteBundle:Includes:sortable.html.twig');

        // parameters to template
        return $this->render('KACSiteBundle:Brand:index.html.twig', array('pagination' => $pagination));
    }

    /**
     * @Route("/admin/brands/new", name="brands_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request)
    {

    }

    /**
     * @Route("/admin/brands/{id}/edit", name="brands_edit")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(Request $request, $id)
    {

    }

    /**
     * @Route("/admin/brands/{id}/delete", name="brands_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $id)
    {

    }
} 