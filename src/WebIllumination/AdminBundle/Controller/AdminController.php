<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function cameraAction()
    {
    	return $this->render('WebIlluminationAdminBundle:Admin:camera.html.twig');
    }
}
