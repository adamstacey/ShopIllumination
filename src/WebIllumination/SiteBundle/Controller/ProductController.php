<?php
namespace WebIllumination\SiteBundle\Controller;

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
use WebIllumination\AdminBundle\Form\EditProductOverviewType;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Description;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

/**
 * @Route("/products")
 */
class ProductController extends Controller {
    /**
     * @Route("/new", name="products_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId=null, $brandId=null, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $this->getManager()->createProduct();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('web_illumination_admin.form.flow.new_product');
        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm($product);

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($product);
            } else {
                if($product->getType() === 's')
                {
                    // Create variant for single product
                    $variant = new Variant();
                    $variant->setProductCode($product->getProductCode());
                    foreach($product->getPrices() as $price)
                    {
                        $variant->addPrice($price);
                    }
                    foreach($product->getFeatureGroups() as $productToFeature)
                    {
                        $variant->addFeature($productToFeature);
                    }
                    $product->addVariant($variant);
                }

                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('listing_products_admin'));
            }
        }

        return $this->render('WebIlluminationSiteBundle:Product:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    /**
     * @Route("/edit", name="products_edit")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($id);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $form = $this->createForm(new EditProductOverviewType(), $product);
        $form ->bind($request);

        if($form->isValid()) {
            $em->persist($product);
            $em->flush();

            return $this->redirect($this->generateUrl('listing_products'));
        }

        return $this->render('WebIlluminationSiteBundle:Product:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}/delete", name="products_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($id);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $em->remove($product);
        $em->flush();

        return $this->redirect($this->generateUrl('listing_products'));
    }

    /**
     * Fetch project manager from container
     *
     * @return \WebIllumination\SiteBundle\Manager\ProductManager
     */
    private function getManager()
    {
        return $this->get('web_illumination_site.manager.product');
    }
}