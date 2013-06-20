<?php

namespace KAC\SiteBundle\Controller;

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
     * @Route("/maia-worktops.html", name="demo_maia_worktops")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/ammonite.html", name="demo_maia_worktops_ammonite")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsAmmoniteAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/calcite.html", name="demo_maia_worktops_calcite")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsCalciteAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/fossil.html", name="demo_maia_worktops_fossil")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsFossilAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/meteorite.html", name="demo_maia_worktops_meteorite")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsMeteoriteAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/pearlstone.html", name="demo_maia_worktops_pearlstone")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsPearlstoneAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/sandstone.html", name="demo_maia_worktops_sandstone")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsSandstoneAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/cappucino.html", name="demo_maia_worktops_cappuccino")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsCappuccinoAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/cristallo.html", name="demo_maia_worktops_cristallo")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsCristalloAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/galaxy.html", name="demo_maia_worktops_galaxy")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsGalaxyAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/iceberg.html", name="demo_maia_worktops_iceberg")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsIcebergAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/latte.html", name="demo_maia_worktops_latte")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsLatteAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/lava.html", name="demo_maia_worktops_lava")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsLavaAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/mocha.html", name="demo_maia_worktops_mocha")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsMochaAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/vanilla.html", name="demo_maia_worktops_vanilla")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsVanillaAction(Request $request)
    {

    }

    /**
     * @Route("/maia-worktops/vulcano.html", name="demo_maia_worktops_vulcano")
     * @Method({"GET"})
     * @Template()
     */
    public function maiaWorktopsVulcanoAction(Request $request)
    {

    }

    /**
     * @Route("/product", name="demo_product")
     * @Method({"GET"})
     * @Template()
     */
    public function productAction(Request $request)
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
     * @Method({"GET"})
     * @Template()
     */
    public function uploadAction(Request $request)
    {

    }

    /**
     * @Route("/image/{id}", name="demo_image")
     * @Method({"GET"})
     * @Template()
     */
    public function imageAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($id);
        if(!$image)
        {
            throw new NotFoundHttpException("Image not found");
        }

        return array(
            'image' => $image,
        );
    }

    /**
     * @Route("/test", name="demo_test")
     * @Method({"GET"})
     */
    public function testAction(Request $request)
    {
        $api = $this->get('kac_site.google.google');
        //\Doctrine\Common\Util\Debug::dump($api->findMoreExpensiveProducts('SMS40C02GB', '280', 5)["items"], 5);
        //die();
    }
}
