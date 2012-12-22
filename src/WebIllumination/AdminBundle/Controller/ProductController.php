<?php

namespace WebIllumination\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProductController extends Controller
{
    /**
     * @Route("/", name="admin_products")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Get the filters session
        $filters = $this->get('session')->get('filters');
        // Get the settings session
        $settings = $this->get('session')->get('settings');

        // Fetch products
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();
        // Fetch brands
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->findAll();
        // Fetch departments
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $this->get('request')->query->get('page', 1),
            10
        );

        return array('filters' => $filters, 'settings' => $settings, 'pagination' => $pagination);
    }

    /**
     * @Route("/add", name="admin_product_add")
     * @Template()
     */
    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Get the filters session
        $filters = $this->get('session')->get('filters');
        // Get the settings session
        $settings = $this->get('session')->get('settings');

        // Fetch products
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();
        // Fetch brands
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->findAll();
        // Fetch departments
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $this->get('request')->query->get('page', 1),
            10
        );

        return array('filters' => $filters, 'settings' => $settings, 'pagination' => $paginator);
    }

    /**
     * @Route("/{id}/update", name="admin_products_update")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        // Get the filters session
        $filters = $this->get('session')->get('filters');
        // Get the settings session
        $settings = $this->get('session')->get('settings');

        // Fetch products
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();
        // Fetch brands
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Brand')->findAll();
        // Fetch departments
        $brands = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->findAll();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $this->get('request')->query->get('page', 1),
            10
        );

        return array('filters' => $filters, 'settings' => $settings, 'pagination' => $paginator);
    }
}
