<?php

namespace WebIllumination\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/features/{groupId}.{_format}", name="api_features", defaults={"_format":"json"}, requirements={"_format":"json|xml"})
     * @Method({"GET"})
     */
    public function getFeaturesAction(Request $request, $groupId, $_format)
    {
        $em = $this->getDoctrine()->getManager();

        $features = $em->getRepository("WebIllumination\SiteBundle\Entity\Product\Feature")->findBy(array(
            'featureGroup' => $groupId,
        ));

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(
            'features' => $features,
        ), $_format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$_format);
        return $response;
    }
}
