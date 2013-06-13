<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Form\Department\EditDepartmentDeliveryType;
use KAC\SiteBundle\Form\Department\EditDepartmentOverviewType;
use KAC\SiteBundle\Form\Department\EditDepartmentProductTemplatesType;
use KAC\SiteBundle\Form\Department\EditDepartmentSeoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Solarium_Query_Select;
use KAC\SiteBundle\Form\Department\EditDepartmentFeaturesType;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\Department\Description;
use KAC\SiteBundle\Manager\DepartmentManager;
use KAC\SiteBundle\Manager\SeoManager;

/**
 * @Route("/")
 */
class DepartmentController extends Controller
{
    /**
     * @Route("/admin/departments", name="departments_index")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository("KAC\\SiteBundle\\Entity\\Department");
        $departments = $repo->findAll();


        // parameters to template
        return $this->render('KACSiteBundle:Department:index.html.twig', array('departments' => $departments));
    }

    /**
     * @Route("/admin/departments/new", name="departments_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();

        $department = $manager->createDepartment();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('kac_site.form.flow.new_department');
        $flow->bind($department);

        // Get current form step
        $form = $flow->createForm();

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm();
            } else {
                // Update the department path
                $manager->updateDepartmentPath($department);

                // Update the object links
                $manager->updateObjectLinks($department);

                // Update the database
                $em->persist($department);
                $em->flush();

                $flow->reset();

                // Notify user
                $this->get('session')->setFlash('notice', 'The new department "'.$department->getName().'" has been added.');

                // Check if request is modal
                if ($request->query->get('modal') == true)
                {
                    // Break out the modal
                    return $this->render('KACSiteBundle:Includes:modalBreakout.html.twig');
                } else {
                    // Forward
                    return $this->redirect($this->get('router')->generate('homepage'));
                }

            }
        }

        return $this->render('KACSiteBundle:Department:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    public function baseEditAction(Request $request, $departmentId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();

        $department = $em->getRepository("KAC\SiteBundle\Entity\Department")->find($departmentId);
        if(!$department)
        {
            throw new NotFoundHttpException("Department not found");
        }

        // Clone features
        $originalFeatures = array();
        foreach($department->getFeatures() as $feature)
        {
            $originalFeatures[] = $feature;
        }

        $form = $this->createForm($formClass, $department);

        if ($request->isMethod('POST'))
        {
            $form->submit($request);
            if ($form->isValid())
            {

                // Update the department path
                $manager->updateDepartmentPath($department);

                // Update the features
                $manager->updateFeatures($originalFeatures, $department);

                // Update the object links
                $manager->updateObjectLinks($department);

                // Update the database
                $em->persist($department);
                $em->flush();

                // Notify user
                $this->get('session')->getFlashBag()->all('notice', 'The department "'.$department->getName().'" has been updated.');

                // Check if request is modal
                if ($request->query->get('modal') == true)
                {
                    // Break out the modal
                    return $this->render('KACSiteBundle:Includes:modalBreakout.html.twig');
                } else {
                    // Forward
                    return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                        'departmentId' => $department->getId(),
                    )));
                }
            }
        }

        return $this->render($template, array(
            'department' => $department,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/departments/{departmentId}/edit", name="departments_edit")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(Request $request, $departmentId)
    {
        return $this->redirect($this->generateUrl('departments_edit_overview', array(
            'departmentId' => $departmentId
        )));
    }

    /**
     * @Route("/admin/departments/{departmentId}/overview", name="departments_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $departmentId)
    {
        return $this->baseEditAction($request, $departmentId, 'KACSiteBundle:Department:edit_overview.html.twig', new EditDepartmentOverviewType());
    }

    /**
     * @Route("/admin/departments/{departmentId}/seo", name="departments_edit_seo")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editSeoAction(Request $request, $departmentId)
    {
        return $this->baseEditAction($request, $departmentId, 'KACSiteBundle:Department:edit_seo.html.twig', new EditDepartmentSeoType());
    }

    /**
     * @Route("/admin/departments/{departmentId}/delivery", name="departments_edit_delivery")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDeliveryAction(Request $request, $departmentId)
    {
        return $this->baseEditAction($request, $departmentId, 'KACSiteBundle:Department:edit_delivery.html.twig', new EditDepartmentDeliveryType());
    }

    /**
     * @Route("/admin/departments/{departmentId}/features", name="departments_edit_features")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editFeaturesAction(Request $request, $departmentId)
    {
        return $this->baseEditAction($request, $departmentId, 'KACSiteBundle:Department:edit_features.html.twig', new EditDepartmentFeaturesType());
    }

    /**
     * @Route("/admin/departments/{departmentId}/products", name="departments_edit_product_templates")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editProductTemplatesAction(Request $request, $departmentId)
    {
        return $this->baseEditAction($request, $departmentId, 'KACSiteBundle:Department:edit_product_templates.html.twig', new EditDepartmentProductTemplatesType());
    }

    /**
     * @Route("/admin/departments/{departmentId}/delete", name="departments_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction(Request $request, $departmentId)
    {
        $em = $this->getDoctrine()->getManager();

        $department = $em->getRepository("KAC\\SiteBundle\\Entity\\Department")->find($departmentId);
        if(!$department)
        {
            throw new NotFoundHttpException("Department not found");
        }

        $em->remove($department);
        $em->flush();

        return $this->redirect($this->generateUrl('departments_index'));
    }

    /**
     * Fetch project manager from container
     *
     * @return \KAC\SiteBundle\Manager\DepartmentManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.department');
    }
}
