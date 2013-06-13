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
     * @Route("/{url}.html", name = "routing_html", requirements = {"url": ".+"})
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
            // If no route was found check to see if the user should be redirected
            $redirectObject = $this->getDoctrine()->getRepository('KACSiteBundle:Redirect')->findOneBy(array('redirectFrom' => $url));
            if ($redirectObject)
            {
                return $this->redirect($this->get('router')->generate('routing', array('url' => $redirectObject->getRedirectTo())), $redirectObject->getRedirectCode());
            }
        } else {
            if($this->isObjectViewable($routingObject))
            {
                // Forward request to relevant controller
                switch (get_class($routingObject))
                {
                    case 'KAC\SiteBundle\Entity\Brand\Routing':
                        return $this->forward('KACSiteBundle:Listing:index', array('brandId' => $routingObject->getObjectId()));
                        break;
                    case 'KAC\SiteBundle\Entity\Brand\DepartmentRouting':
                        return $this->forward('KACSiteBundle:Listing:index', array('brandId' => $routingObject->getObjectId(), 'departmentId' => $routingObject->getSecondaryId()));
                        break;
                    case 'KAC\SiteBundle\Entity\Department\Routing':
                        return $this->forward('KACSiteBundle:Listing:index', array('departmentId' => $routingObject->getObjectId()));
                        break;
                    case 'KAC\SiteBundle\Entity\Product\Routing':
                        return $this->forward('KACSiteBundle:Product:view', array('id' => $routingObject->getObjectId()));
                        break;
                }
            }
        }

        // If no route was found return a 404 error
        throw $this->createNotFoundException();
    }

    /**
     * Check that the object is not disabled
     * @param $object The object to check
     * @return bool
     */
    private function isObjectViewable($object)
    {
        // Check if the object is available
        if(method_exists($object, 'getStatus') && $object->getStatus() !== 'a') {
            return false;
        }

        return true;
    }
}
