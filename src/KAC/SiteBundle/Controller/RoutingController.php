<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/")
 */
class RoutingController extends Controller
{
    /**
     * @Route("/{url}", name = "routing", requirements = {"url": ".+"})
     * @Method({"GET"})
     */
    public function routingAction(Request $request, $url)
    {
        // Tidy up URL
        $url = trim($url);

        // Try and find the routing
        $routingObject = $this->getDoctrine()->getRepository('KACSiteBundle:Routing')->findOneBy(array('url' => $url, 'locale' => 'en'));
        if (!$routingObject)
        {
            $redirectObject = $this->getDoctrine()->getRepository('KACSiteBundle:Redirect')->findOneBy(array('redirectFrom' => $url));
            if ($redirectObject)
            {
                return $this->redirect($this->get('router')->generate('routing', array('url' => $redirectObject->getRedirectTo())), $redirectObject->getRedirectCode());
            }
        }

        // Forward to the relevant area
        if ($routingObject)
        {
            switch (get_class($routingObject))
            {
                case 'KAC\SiteBundle\Entity\Department\ProductRouting':
                    return $this->forward('KACSiteBundle:Product:index', array('id' => $routingObject->getObjectId()));
                    break;
                case 'KAC\SiteBundle\Entity\Department\DepartmentRouting':
                    return $this->forward('KACSiteBundle:Listing:index', array('departmentId' => $routingObject->getObjectId()));
                    break;
                case 'KAC\SiteBundle\Entity\Department\BrandRouting':
                    return $this->forward('KACSiteBundle:Listing:index', array('brandId' => $routingObject->getObjectId()));
                    break;
            }
        }

        return $this->redirect($this->get('router')->generate('homepage'));
    }
}
