<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SystemController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
	public function indexAction()
    {
        return array();
    }

    /**
     * @Template()
     */
    public function mainMenuAction($locale = 'en')
    {
        $em = $this->getDoctrine()->getManager();

        $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('lvl' => 1, 'status' => 'a'), array('displayOrder' => 'ASC'));
        $brands = $em->getRepository("KACSiteBundle:Brand")->findBy(array('status' => 'a'));

        return array('departments' => $departments, 'brands' => $brands);
    }
}