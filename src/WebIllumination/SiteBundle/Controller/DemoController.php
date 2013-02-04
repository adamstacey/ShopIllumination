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
}
