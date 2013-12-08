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

        // Check for any maia routes first
        if (strpos($url, 'maia-amm') !== false)
        {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-ammonite')), '301');
        } elseif (strpos($url, 'maia-cal') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-calcite')), '301');
        } elseif (strpos($url, 'maia-fos') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-fossil')), '301');
        } elseif (strpos($url, 'maia-met') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-meteorite')), '301');
        } elseif (strpos($url, 'maia-pea') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-pearlstone')), '301');
        } elseif (strpos($url, 'maia-san') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-sandstone')), '301');
        } elseif (strpos($url, 'maia-gal') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-galaxy')), '301');
        } elseif (strpos($url, 'maia-cap') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-cappuccino')), '301');
        } elseif (strpos($url, 'maia-cri') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-cristallo')), '301');
        } elseif (strpos($url, 'maia-ice') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-iceberg')), '301');
        } elseif (strpos($url, 'maia-lat') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-latte')), '301');
        } elseif (strpos($url, 'maia-lav') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-lava')), '301');
        } elseif (strpos($url, 'maia-moc') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-mocha')), '301');
        } elseif (strpos($url, 'maia-van') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-vanilla')), '301');
        } elseif (strpos($url, 'maia-vul') !== false) {
            return $this->redirect($this->get('router')->generate('routing', array('url' => 'maia-vulcano')), '301');
        }

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
            if ($this->isObjectViewable($routingObject))
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
                        if ($all)
                        {
                            // All flag should be ignored for the product view page
                            $twig = $this->container->get('templating');
                            $content = $twig->render('KACSiteBundle:Includes:error404.html.twig');
                            return new Response($content, 404, array('Content-Type', 'text/html'));
                        }

                        return $this->forward('KACSiteBundle:Product:view', array('id' => $routingObject->getObjectId()), $request->query->all());
                        break;
                    case 'KAC\SiteBundle\Entity\Product\Variant\Routing':
                        if ($all)
                        {
                            // All flag should be ignored for the product view page
                            $twig = $this->container->get('templating');
                            $content = $twig->render('KACSiteBundle:Includes:error404.html.twig');
                            return new Response($content, 404, array('Content-Type', 'text/html'));
                        }
                        return $this->forward('KACSiteBundle:Product:viewWithVariant', array('id' => $routingObject->getVariant()->getId()), $request->query->all());
                        break;
                    default:
                        $redirectObject = $this->getDoctrine()->getRepository('KACSiteBundle:Redirect')->findOneBy(array('redirectFrom' => $url));
                        if ($redirectObject)
                        {
                            return $this->redirect($this->get('router')->generate('routing', array('url' => $redirectObject->getRedirectTo())), $redirectObject->getRedirectCode());
                        }
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
