<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class DataController extends Controller
{
    public function indexAction()
    {
    	// TODO: Need to make a basic product dashboard with specific product warnings
    	//$this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
    	//return $this->redirect($this->generateUrl('WebIlluminationAdminBundle_products', array('name'  => 'bla bla bla!')));
        return $this->forward('WebIlluminationAdminBundle:Products:view');
    }
   
    public function legacyImportAction()
    {
    	
    	return $this->render('WebIlluminationAdminBundle:Data:legacyImport.html.twig');
    }
    
    public function ajaxLoadLegacyImportDataAction()
    {
    	// TODO: get the data from the existing site
    	return $this->render('WebIlluminationAdminBundle:Data:ajaxLoadLegacyImportData.html.twig');
    }
}
