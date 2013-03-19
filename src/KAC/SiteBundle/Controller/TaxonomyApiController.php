<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gedmo\Exception\UploadableMaxSizeException;
use Knp\Component\Pager\Pagination\AbstractPagination;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KAC\SiteBundle\Entity\Taxonomy;

/**
 * @Route("/api/taxonomies")
 */
class TaxonomyApiController extends Controller
{
    /**
     * @Route(".{format}", name="api_taxonomies_get", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     */
    public function getAction(Request $request, $format)
    {
        /**
         * @var $em EntityManager
         * @var $pagination AbstractPagination
         */
        $em = $this->getDoctrine()->getManager();
        if ($request->query->get('q', null)) {
            $query = $em->createQuery("SELECT t FROM KAC\SiteBundle\Entity\Taxonomy t WHERE t.name LIKE ?1");
            $query->setParameter(1, "%" . $request->query->get('q', null) . "%");
        } else {
            $query = $em->createQuery("SELECT t FROM KAC\SiteBundle\Entity\Taxonomy t");
        }

        // Get the paginator results
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $this->get('request')->query->get('page', 1), 20, array('distinct' => false));

        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(
            'total' => $pagination->getTotalItemCount(),
            'taxonomies' => $pagination->getItems(),
        ), $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * @Route("/{id}.{format}", name="api_taxonomies_get_taxonomy", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     */
    public function getTaxonomyAction(Request $request, $id, $format)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        $taxonomy = $em->getRepository("KAC\SiteBundle\Entity\Taxonomy")->find($id);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($taxonomy, $format);

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

}
