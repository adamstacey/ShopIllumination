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
use WebIllumination\SiteBundle\Entity\Image;
use WebIllumination\SiteBundle\Form\EditProductDescriptionsType;
use WebIllumination\SiteBundle\Form\EditProductOverviewType;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Description;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\ProductToDepartment;
use WebIllumination\SiteBundle\Manager\ProductManager;
use WebIllumination\SiteBundle\Manager\SeoManager;

class ProductController extends Controller {
    /**
     * @Route("/admin/products/new", name="products_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId=null, $brandId=null, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $this->getManager()->createProduct();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('web_illumination_site.form.flow.new_product');
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
                // Update descriptions TODO: move to listener
                $manager = $this->container->get('web_illumination_site.manager.product');
                foreach($product->getDescriptions() as $description)
                {
                    $manager->updateProductDescription($description);
                }

                foreach($product->getVariants() as $variant)
                {
                    foreach($variant->getDescriptions() as $description)
                    {
                        $manager->updateVariantDescription($description);
                    }
                }

                $em->persist($product);
                $em->flush();

                /**
                 * Link image to variant
                 * @var $variant Variant
                 */
                foreach($product->getVariants() as $variant)
                {
                    $i = 0;

                    // Link each image to the variant
                    foreach(explode(',', $variant->getImages()) as $imageId)
                    {
                        /**
                         * @var $image Image
                         */
                        $image = $em->getRepository("WebIllumination\SiteBundle\Entity\Image")->find($imageId);
                        if($image)
                        {
                            $image->setObjectId($variant->getId());
                            $image->setObjectType('variant');
                            $image->setImageType('variant');

                            $image->setTitle($variant->getDescription()->getHeader());
                            $image->setDisplayOrder($i);

                            $i++;

                            $em->persist($image);
                        }
                    }
                }

                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_listing_products'));
            }
        }

        return $this->render('WebIlluminationSiteBundle:Product:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    public function editAction(Request $request, $productId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $form = $this->createForm($formClass, $product);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl('listing_products'));
            }
        }

        return $this->render($template, array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/edit", name="products_edit")
     * @Route("/admin/products/{productId}/overview", name="products_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $productId)
    {
        return $this->editAction($request, $productId, 'WebIlluminationSiteBundle:Product:edit_overview.html.twig', new EditProductOverviewType());
    }

    /**
     * @Route("/admin/products/{productId}/descriptions", name="products_edit_descriptions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionsAction(Request $request, $productId)
    {
        return $this->editAction($request, $productId, 'WebIlluminationSiteBundle:Product:edit_descriptions.html.twig', new EditProductDescriptionsType());
    }

    /**
     * @Route("/admin/products/{productId}/variants", name="products_edit_variants")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editVariantsAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        return $this->render('WebIlluminationSiteBundle:Product:edit_variants.html.twig', array(
            'product' => $product,
        ));
    }

    /**
     * @Route("/admin/products/{productId}/delete", name="products_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($productId);
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