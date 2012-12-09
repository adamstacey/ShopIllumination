<?php
namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WebIlluminationAdminBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function testingAction()
    {
        return $this->render('WebIlluminationAdminBundle:Default:testing.html.twig');
    }
}
