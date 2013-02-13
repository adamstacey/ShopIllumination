<?php

namespace WebIllumination\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/demo")
 */
class DemoController extends Controller
{
    /**
     * @Route("/gridsAndPortlets", name="demo_grids_and_portlets")
     * @Method({"GET"})
     * @Template()
     */
    public function gridsAndPortletsAction(Request $request)
    {

    }

    /**
     * @Route("/forms", name="demo_forms")
     * @Method({"GET"})
     * @Template()
     */
    public function formsAction(Request $request)
    {

    }

    /**
     * @Route("/icons", name="demo_icons")
     * @Method({"GET"})
     * @Template()
     */
    public function iconsAction(Request $request)
    {

    }

    /**
     * @Route("/buttons", name="demo_buttons")
     * @Method({"GET"})
     * @Template()
     */
    public function buttonsAction(Request $request)
    {

    }

    /**
     * @Route("/upload", name="demo_upload")
     * @Template()
     */
    public function uploadAction(Request $request)
    {

    }
}
