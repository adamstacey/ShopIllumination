<?php

namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SystemController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Route("/index.php", name="indexphp")
     * @Template()
     */
	public function indexAction()
    {
        return array();
    }

    public function mainMenuAction($locale = 'en')
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        // Fetch departments
        $departments = $em->getRepository("KACSiteBundle:Department")->findBy(array('lvl' => 1, 'status' => 'a'), array('displayOrder' => 'ASC'));

        $brands = $em->getRepository("KACSiteBundle:Brand")->createQueryBuilder('b')
            ->leftJoin('b.descriptions', 'd')
            ->orderBy('d.name', 'asc')
            ->getQuery()
            ->getResult();

        $response = $this->render('KACSiteBundle:System:mainMenu.html.twig', array('departments' => $departments, 'brands' => $brands));
        $response->setSharedMaxAge(3600);
        return $response;
    }

    public function socialMediaInteractionsAction()
    {
        $response = $this->render('KACSiteBundle:Includes:socialMediaInteractions.html.twig');
        $response->setSharedMaxAge(3600);
        return $response;
    }

    /**
     * @Route("/admin-toggle", name="admin_toggle")
     */
    public function adminAction(Request $request, $admin=null)
    {
        // Ensure user has the correct permissions
        if ($this->get('security.context')->isGranted('ROLE_ADMIN') === false)
        {
            throw new AccessDeniedException();
        }

        // Set admin mode
        if($admin === null)
        {
            $admin = $this->get('session')->get('admin', true) ? false : true;
        }
        $this->get('session')->set('admin', $admin);

        // Redirect to page is specified else redirect to admin home page
        if($request->query->has('url'))
        {
            return $this->redirect($request->query->get('url'));
        } else {
            return $this->redirect($this->generateUrl('homepage'));
        }
    }

    /**
     * @Route("/routes.js", name="routes_script")
     */
    public function routesAction()
    {
        return $this->render('KACSiteBundle:System:routes.js.twig');
    }
}