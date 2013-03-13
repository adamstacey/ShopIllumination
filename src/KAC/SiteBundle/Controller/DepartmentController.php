<?php

namespace KAC\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/")
 */
class DepartmentController extends Controller
{
    /**
     * @Route("/admin/departments/new", name="departments_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId = null, $brandId = null, $admin = false)
    {
        $em = $this->getDoctrine()->getManager();

        $department = $this->getManager()->createDepartment();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('kac_site.form.flow.new_department');
        $flow->bind($department);

        // Get current form step
        $form = $flow->createForm($department);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($department);
            } else {
                // Update descriptions TODO: move to listener
                $manager = $this->container->get('kac_site.manager.product');
                foreach ($department->getDescriptions() as $description)
                {
                    $manager->updateDescription($description);
                }

                // Update the database
                $em->persist($department);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_listing_products'));
            }
        }

        return $this->render('KACSiteBundle:Department:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    /**
     * @Method({"GET"})
     * @Template()
     */
    public function mainMenuAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('lvl' => 1, 'status' => 'a'), array('displayOrder' => 'ASC'));

        return array('departments' => $departments);
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
