<?php

namespace WebIllumination\SiteBundle\Controller;

use Gedmo\Exception\UploadableMaxSizeException;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Manager\ImageManager;

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
     * @Route("/.{format}", name="api_images_post_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"POST"})
     */
    public function postAction(Request $request, $format)
    {
        $manager = $this->get('web_illumination_site.manager.image');
        $image = $manager->createImage();
        $filesArray = array();

        /**
         * @var $form FormInterface
         */
        $form = $this->get('form.factory')->createNamedBuilder(null, 'form', $image, array(
            'csrf_protection'   => false
        ))
            ->add('file', 'file')
            ->getForm();
        $form->bind($request);

        if($form->isValid())
        {
            /**
             * @var $file UploadedFile
             */
            $file = $image->getFile();

            $em = $this->getDoctrine()->getManager();

            $em->persist($image);
            $em->flush();

            $filesArray[] = array(
                'id' => $image->getId(),
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'url' => $image->getUploadDir() . $image->getOriginalPath(),
                'delete_url' => $this->generateUrl('api_images_delete_image', array('id' => $image->getId())),
                'delete_type' => 'DELETE',
            );
        } else {
            $errors = $form->getErrors();
            $filesArray[] = array(
                'error' => count($errors) > 0 ? $errors[0] : 'That file was invalid',
            );
        }

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(array(
            'files' => $filesArray,
        ), $format);

        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }



    /**
     * @Route("/{id}.{format}", name="api_images_delete_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"DELETE"})
     */
    public function deleteImageAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();

        $image = $em->getRepository("WebIllumination\SiteBundle\Entity\Image")->find($id);
        if(!$image)
        {
            throw new NotFoundHttpException("Image not found");
        }

        $em->remove($image);
        $em->flush();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * Fetch project manager from container
     *
     * @return \WebIllumination\SiteBundle\Manager\ProductManager
     */
    private function getManager()
    {
        return $this->get('web_illumination_site.manager.image');
    }
}
