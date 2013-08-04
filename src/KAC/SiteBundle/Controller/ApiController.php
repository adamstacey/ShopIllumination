<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\Pagination\AbstractPagination;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/features/{featureGroupId}.{_format}", name="api_features", defaults={"_format":"json"}, requirements={"_format":"json|xml"})
     * @Method({"GET"})
     */
    public function getFeaturesAction(Request $request, $featureGroupId, $_format)
    {
        $em = $this->getDoctrine()->getManager();

        $features = $em->getRepository("KAC\SiteBundle\Entity\Product\Feature")->findBy(array('featureGroup' => $featureGroupId), array('name' => 'ASC'));

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(
            'features' => $features,
        ), $_format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$_format);
        return $response;
    }

    /**
     * @Secure({"ROLE_ADMIN"})
     * @Route("/users.{_format}", name="api_users", defaults={"_format":"json"}, requirements={"_format":"json|xml"})
     * @Method({"GET"})
     */
    public function getUsersAction(Request $request, $_format)
    {
        /**
         * @var $em EntityManager
         * @var $pagination AbstractPagination
         */
        $em = $this->getDoctrine()->getManager();
        if($request->query->get('q', null)) {
            $query = $em->createQuery("SELECT u FROM KAC\UserBundle\Entity\User u WHERE u.id = ?1 OR u.email LIKE ?2");
            $query->setParameter(1, $request->query->get('q', null));
            $query->setParameter(2, "%" . $request->query->get('q', null) . "%");

            // Get the paginator results
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 20, array('distinct' => false));

            $serializer = $this->get('serializer');
            $data = $serializer->serialize(array(
                'total' => $pagination->getTotalItemCount(),
                'users' => $pagination->getItems(),
            ), $_format);
        } else {
            $serializer = $this->get('serializer');
            $data = $serializer->serialize(array(
                'total' => 0,
                'users' => array(),
            ), $_format);
        }

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$_format);
        return $response;
    }

    /**
     * @Secure({"ROLE_ADMIN"})
     * @Route("/users/{id}.{format}", name="api_users_get_user", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     */
    public function getUserAction(Request $request, $id, $format)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository("KAC\UserBundle\Entity\User")->find($id);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($user, $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }
}
