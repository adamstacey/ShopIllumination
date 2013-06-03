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
use KAC\SiteBundle\Entity\Document;
use KAC\SiteBundle\Manager\DocumentManager;

/**
 * @Route("/api/documents")
 */
class DocumentApiController extends Controller
{
    /**
     * @Route("/.{format}", name="api_documents_get", defaults={"format":"json"}, requirements={"format":"json|xml"})
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
     * @Route("/{id}.{format}", name="api_documents_get_document", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function getDocumentAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();
        $serializer = $this->get('serializer');
        $data = $serializer->serialize(array(), $format);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * @Route("/multiple/{ids}.{format}", name="api_documents_get_multiple", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"GET"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function getMultipleAction(Request $request, $ids, $format)
    {
        $filesArray = array();
        $em = $this->getDoctrine()->getManager();
        $documents = $em->createQuery("SELECT d FROM KAC\SiteBundle\Entity\Document d WHERE d.id IN (?1)")
            ->setParameter(1, explode(',', $ids))
            ->execute();

        /**
         * @var $document Document
         */
        foreach ($documents as $document)
        {
            $filesArray[] = array(
                'id' => $document->getId(),
                'type' => $document->getDocumentType(),
                'title' => ($document->getTitle()?$document->getTitle():basename($document->getPath())),
                'url' => $document->getPath(),
                'delete_url' => $this->generateUrl('api_documents_delete_document', array('id' => $document->getId())),
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
     * @Route("/.{format}", name="api_documents_post_document", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"POST"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function postAction(Request $request, $format)
    {
        $objectType = $this->get('request')->request->get('objectType');
        $manager = $this->get('kac_site.manager.document');
        $document = $manager->createDocument($objectType);
        $filesArray = array();

        /**
         * @var $form FormInterface
         */
        $form = $this->get('form.factory')->createNamedBuilder(null, 'form', $document, array('csrf_protection' => false))
            ->add('file', 'file')
            ->add('objectType', 'text', array('mapped' => false))
            ->add('title', 'text')
            ->getForm();
        $form->bind($request);

        if ($form->isValid())
        {
            /**
             * @var $file UploadedFile
             */
            $file = $document->getFile();
            $em = $this->getDoctrine()->getManager();
            if (!$document->getTitle())
            {
                $document->setTitle($file->getClientOriginalName());
            }
            $document->setFileExtension($file->guessExtension());
            $document->setFileSize($file->getSize());
            $em->persist($document);
            $em->flush();
            $filesArray[] = array(
                'id' => $document->getId(),
                'type' => $document->getDocumentType(),
                'title' => $document->getTitle(),
                'fileType' => 'image',
                'url' => $document->getPath(),
                'delete_url' => $this->generateUrl('api_documents_delete_document', array('id' => $document->getId())),
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
     * @Route("/delete/{id}.{format}", name="api_documents_delete_document", defaults={"format":"json"}, requirements={"format":"json|xml"})
     * @Method({"DELETE"})
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteDocumentAction(Request $request, $id, $format)
    {
        $em = $this->getDoctrine()->getManager();
        $document = $em->getRepository("KAC\SiteBundle\Entity\Document")->find($id);
        if (!$document)
        {
            throw new NotFoundHttpException("The document was not found.");
        }
        $em->remove($document);
        $em->flush();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/'.$format);
        return $response;
    }

    /**
     * Fetch project manager from container
     *
     * @return \KAC\SiteBundle\Manager\DocumentManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.document');
    }
}
