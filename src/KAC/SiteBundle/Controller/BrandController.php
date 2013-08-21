<?php

namespace KAC\SiteBundle\Controller;

use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Form\Brand\NewType;
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

        $em = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->addDescription(new Brand\Description());

        $form = $this->createForm(new NewType(), $brand);
        $form->handleRequest($request);

        if ($form->isValid()) {
            // Ensure description is properly generated
            $brand->getDescription()->setPageTitle($brand->getDescription()->getName());
            $brand->getDescription()->setHeader($brand->getDescription()->getName());

            // Add logo image data
            $brand->getDescription()->getLogoImage()->setImageType('logo');
            $brand->getDescription()->getLogoImage()->setDescription($brand->getDescription()->getDescription());
            $brand->getDescription()->getLogoImage()->setFileExtension($brand->getDescription()->getLogoImage()->getFile()->guessExtension());
            $brand->getDescription()->getLogoImage()->setFileSize($brand->getDescription()->getLogoImage()->getFile()->getSize());

            // Add route
            $url = $this->get('kac_site.manager.seo')->createUrl($brand->getDescription()->getPageTitle(), '');
            $routing = new Brand\Routing();
            $routing->setBrand($brand);
            $routing->setUrl($url);
            $brand->addRouting($routing);

            $em->persist($brand);
            $em->flush();

            // Notify user
            $this->get('session')->getFlashBag()->add('notice', 'The new brand "'.$brand->getDescription()->getName().'" has been added.');

            // Forward
            return $this->redirect($this->get('router')->generate('homepage'));
        }

        return $this->render('KACSiteBundle:Brand:new.html.twig', array(
            'form' => $form->createView(),
        ));
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