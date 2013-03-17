<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
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
     * @Route("/admin/departments/new", name="departments_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId = null, $brandId = null, $admin = false)
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
        $form = $flow->createForm($department);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($department);
            } else {
                // Update descriptions TODO: move to listener
                /*$manager = $this->container->get('kac_site.manager.department');
                foreach ($department->getDescriptions() as $description)
                {
                    $manager->updateDescription($description);
                }*/

                // Update the department path
                $manager->updateDepartmentPath($department);

                // Update the database
                $em->persist($department);
                $em->flush();

                $flow->reset();

                // Notify user
                $this->get('session')->setFlash('notice', 'The new department "'.$department->getName().'" has been added.');

                // Forward
                return $this->redirect($this->get('router')->generate('homepage'));
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
