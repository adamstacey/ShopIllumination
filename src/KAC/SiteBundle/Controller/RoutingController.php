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
     * @Route("/all/{url}.html", name = "routing_all", requirements = {"url": ".+"})
     * @Method({"GET"})
     */
    public function routingAllAction(Request $request, $url)
    {
        return $this->routingAction($request, $url, true);
    }

    /**
     * @Route("/{url}.html", name = "routing", requirements = {"url": ".+"})
     * @Method({"GET"})
     */
    public function routingAction(Request $request, $url, $all=false)
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
                        return $this->forward('KACSiteBundle:Listing:index', array('brandId' => $routingObject->getObjectId(), 'all' => $all), $request->query->all());
                        break;
                    case 'KAC\SiteBundle\Entity\Brand\DepartmentRouting':
                        return $this->forward('KACSiteBundle:Listing:index', array('brandId' => $routingObject->getObjectId(), 'departmentId' => $routingObject->getSecondaryId(), 'all' => $all), $request->query->all());
                        break;
                    case 'KAC\SiteBundle\Entity\Department\Routing':
                        return $this->forward('KACSiteBundle:Listing:index', array('departmentId' => $routingObject->getObjectId(), 'all' => $all), $request->query->all());
                        break;
                    case 'KAC\SiteBundle\Entity\Product\Routing':
                        if($all)
                        {
                            // All flag should be ignored for the product view page
                            $twig = $this->container->get('templating');
                            $content = $twig->render('KACSiteBundle:Includes:error404.html.twig');
                            return new Response($content, 404, array('Content-Type', 'text/html'));
                        }

                        return $this->forward('KACSiteBundle:Product:view', array('id' => $routingObject->getObjectId()), $request->query->all());
                        break;
                    case 'KAC\SiteBundle\Entity\Product\Variant\Routing':
                        if($all)
                        {
                            // All flag should be ignored for the product view page
                            $twig = $this->container->get('templating');
                            $content = $twig->render('KACSiteBundle:Includes:error404.html.twig');
                            return new Response($content, 404, array('Content-Type', 'text/html'));
                        }

                        return $this->forward('KACSiteBundle:Product:view', array('id' => $routingObject->getVariant()->getProduct()->getId()), $request->query->all());
                        break;
                }
            }
        }

        // If no route was found return a hard 404 error
        $twig = $this->container->get('templating');
        $content = $twig->render('KACSiteBundle:Includes:error404.html.twig');
        return new Response($content, 404, array('Content-Type', 'text/html'));
    }

    /**
     * Check that the object is not disabled
     * @param $object The object to check
     * @return bool
     */
    private function isObjectViewable($object)
    {
        if($this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            return true;
        }

        // Check if the object is available
        if (method_exists($object, 'getStatus') && $object->getStatus() !== 'a')
        {
            return false;
        }

        return true;
    }
}
