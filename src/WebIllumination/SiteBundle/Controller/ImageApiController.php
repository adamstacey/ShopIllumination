<?php

namespace WebIllumination\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/api/images")
 */
class ImageApiController extends Controller
{
    /**
     * @Route("/.{format}", name="api_images_get", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     */
    public function getAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(), $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * @Route("/{id}.{format}", name="api_images_get_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     */
    public function getImageAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(), $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * @Route("/.{format}", name="api_images_post", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"POST"})
     */
    public function postAction(Request $request, $format)
    {
        $em = $this->getDoctrine()->getManager();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(), $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }
}
