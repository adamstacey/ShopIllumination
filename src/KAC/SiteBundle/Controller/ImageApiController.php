<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Gedmo\Exception\UploadableMaxSizeException;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Manager\ImageManager;

/**
 * @Route("/api/images")
 */
class ImageApiController extends Controller
{
    /**
     * @Route("/.{format}", name="api_images_get", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     * @Secure(roles="ROLE_ADMIN")
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
     * @Secure(roles="ROLE_ADMIN")
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
     * @Route("/multiple/{ids}.{format}", name="api_images_get_multiple", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function getMultipleAction(Request $request, $ids, $format)
    {
        $filesArray = array();
        $em = $this->getDoctrine()->getManager();
        $images = $em->createQuery("SELECT i FROM KAC\SiteBundle\Entity\Image i WHERE i.id IN (?1)")
            ->setParameter(1, explode(',', $ids))
            ->execute();

        /**
         * @var $image Image
         */
        foreach ($images as $image)
        {
            $filesArray[] = array(
                'id' => $image->getId(),
                'type' => $image->getImageType(),
                'title' => ($image->getTitle()?$image->getTitle():basename($image->getOriginalPath())),
                'url' => $image->getOriginalPath(),
                'delete_url' => $this->generateUrl('api_images_delete_image', array('id' => $image->getId())),
                'delete_type' => 'DELETE',
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
     * @Route("/.{format}", name="api_images_new_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"POST"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $format)
    {
        $objectType = $this->get('request')->request->get('objectType');
        $manager = $this->get('kac_site.manager.image');
        $image = $manager->createImage($objectType);
        $filesArray = array();

        /**
         * @var $form FormInterface
         */
        $form = $this->get('form.factory')->createNamedBuilder(null, 'form', $image, array('csrf_protection' => false))
            ->add('file', 'file')
            ->add('objectType', 'text', array('mapped' => false))
            ->add('imageType', 'text')
            ->getForm();
        $form->bind($request);

        if ($form->isValid())
        {
            /**
             * @var $file UploadedFile
             */
            $file = $image->getFile();
            $em = $this->getDoctrine()->getManager();
            $image->setFileExtension($file->guessExtension());
            $image->setFileSize($file->getSize());

            $em->persist($image);
            $em->flush();

            $filesArray[] = array(
                'id' => $image->getId(),
                'type' => $image->getImageType(),
                'title' => $image->getTitle(),
                'url' => $image->getOriginalPath(),
                'delete_url' => $this->generateUrl('api_images_delete_image', array('id' => $image->getId())),
                'delete_type' => 'DELETE',
            );
        } else {
            $errors = $form->getErrors();
            $filesArray[] = array(
                'error' => (count($errors) > 0?$errors[0]:'The file was invalid.'),
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
     * @Route("/{id}.{format}", name="api_images_new_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"POST"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(Request $request, $format, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($id);
        if (!$image)
        {
            throw new NotFoundHttpException("The image was not found.");
        }

        $manager = $this->get('kac_site.manager.image');
        $filesArray = array();

        /**
         * @var $form FormInterface
         */
        $form = $this->get('form.factory')->createNamedBuilder(null, 'form', $image, array('csrf_protection' => false))
            ->add('imageType', 'text')
            ->getForm();
        $form->bind($request);

        if ($form->isValid())
        {            $em->persist($image);
            $em->flush();

            $filesArray[] = array(
                'id' => $image->getId(),
                'type' => $image->getImageType(),
                'title' => $image->getTitle(),
                'url' => $image->getOriginalPath(),
                'delete_url' => $this->generateUrl('api_images_delete_image', array('id' => $image->getId())),
                'delete_type' => 'DELETE',
            );
        } else {
            $errors = $form->getErrors();
            $filesArray[] = array(
                'error' => (count($errors) > 0?$errors[0]:'The file was invalid.'),
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
     * @Route("/delete/{id}.{format}", name="api_images_delete_image", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"DELETE"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteImageAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository("KAC\SiteBundle\Entity\Image")->find($id);
        if (!$image)
        {
            throw new NotFoundHttpException("The image was not found.");
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
     * @return \KAC\SiteBundle\Manager\ImageManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.image');
    }
}
