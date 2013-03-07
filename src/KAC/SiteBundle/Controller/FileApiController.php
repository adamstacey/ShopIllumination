<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/api/files")
 */
class FileApiController extends Controller
{
    public function getAction(Request $request, $id)
    {

    }

    /**
     * @Route("/.{_format}", name="api_files_post", defaults={"_format":"json"}, requirements={"_format":"json|xml"})
     * @Method({"GET"})
     */
    public function postAction(Request $request, $groupId, $_format)
    {
        $em = $this->getDoctrine()->getManager();

        $features = $em->getRepository("KAC\SiteBundle\Entity\Product\Feature")->findBy(array(
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
