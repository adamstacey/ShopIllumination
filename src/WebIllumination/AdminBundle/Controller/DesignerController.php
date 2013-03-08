<?php
namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DesignerController extends Controller
{
    public function indexAction($id)
    {
    	// Setup the design data
    	$design_data = array();
		$design_data['canvas_width'] = 500;
		$design_data['canvas_height'] = 600;
		$design_data['canvas_margin_top'] = 20;
		$design_data['canvas_margin_right'] = 20;
		$design_data['canvas_margin_bottom'] = 20;
		$design_data['canvas_margin_left'] = 20;
		
        return $this->render('WebIlluminationAdminBundle:Designer:index.html.twig', array('id' => $id, 'design_data' => $design_data));
    }
}
