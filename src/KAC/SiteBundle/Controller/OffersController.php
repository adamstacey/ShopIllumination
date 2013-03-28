<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Solarium_Query_Select;
use KAC\SiteBundle\Form\EditDepartmentFeaturesType;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\Department\Description;
use KAC\SiteBundle\Manager\DepartmentManager;
use KAC\SiteBundle\Manager\SeoManager;

/**
 * @Route("/")
 */
class OffersController extends Controller
{
    /**
     * @Route("/admin/offers", name="admin_offers_index")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $offers = $em->getRepository('KAC\SiteBundle\Entity\Offer')->findBy(array());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $offers,
            $request->query->get('page', 1),
            $request->query->get('limit', 20)
        );

        return $this->render('KACSiteBundle:Offers:index.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * @Route("/admin/offers/new", name="admin_offers_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();
        $product = $manager->createOffer();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('kac_site.form.flow.new_offer');
        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm($product);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($product);
            } else {
                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_offers_index'));
            }
        }

        return $this->render('KACSiteBundle:Offers:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    /**
     * Fetch manager from container
     *
     * @return \KAC\SiteBundle\Manager\OfferManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.offer');
    }
}
