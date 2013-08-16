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
use KAC\SiteBundle\Manager\ProductManager;
use KAC\SiteBundle\Manager\SeoManager;
use KAC\SiteBundle\Form\NewProduct\ProductsType;

class NewProductController extends Controller {
    /**
     * @Route("/admin/newProducts/newProducts", name="new_products_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newProductsAction(Request $request, $departmentId = null, $admin = false)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();

        $form = $this->createForm(new ProductsType());

        if ($request->isMethod('POST'))
        {
            $form->submit($request);
            if ($form->isValid())
            {
                // Do something: wew ill get to that!
            }
        }

        return $this->render('KACSiteBundle:NewProduct:newProducts.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Fetch product manager from container
     *
     * @return \KAC\SiteBundle\Manager\ProductManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.product');
    }

    /**
     * Fetch image manager from container
     *
     * @return \KAC\SiteBundle\Manager\ImageManager
     */
    private function getImageManager()
    {
        return $this->get('kac_site.manager.image');
    }

    /**
     * Fetch document manager from container
     *
     * @return \KAC\SiteBundle\Manager\DocumentManager
     */
    private function getDocumentManager()
    {
        return $this->get('kac_site.manager.document');
    }
}