<?php
namespace WebIllumination\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Solarium_Query_Select;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Form\EditVariantDescriptionsType;
use WebIllumination\SiteBundle\Form\EditVariantDimensionsType;
use WebIllumination\SiteBundle\Form\EditVariantFeaturesType;
use WebIllumination\SiteBundle\Form\EditVariantOverviewType;
use WebIllumination\SiteBundle\Form\EditVariantPricesType;

class VariantController extends Controller {
    /**
     * @Route("/admin/products/{productId}/variants/new", name="variants_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        /**
         * @var $product Product
         */
        $product = $em->getRepository("WebIllumination\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $variant = $this->getManager()->createVariant($product);

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('web_illumination_site.form.flow.new_variant');
        $flow->bind($variant);

        // Get current form step
        $form = $flow->createForm($variant, array(
            'departmentId' => $product->getDepartment()->getDepartment()->getId(),
        ));

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData();

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm($variant);
            } else {
                // Add the variant to each feature
                foreach($variant->getFeatures() as $feature)
                {
                    $feature->setVariant($variant);
                }
                $em->persist($variant);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('products_edit_variants', array(
                    'productId' => $variant->getProduct()->getId()
                )));
            }
        }

        return $this->render('WebIlluminationSiteBundle:Variant:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    public function editAction(Request $request, $variantId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("WebIllumination\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        $form = $this->createForm($formClass, $variant);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl('edit_product_variants'));
            }
        }

        return $this->render($template, array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/edit", name="variants_edit")
     * @Route("/admin/products/{productId}/variants/{variantId}/overview", name="variants_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_overview.html.twig', new EditVariantOverviewType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/descriptions", name="variants_edit_descriptions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionsAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_descriptions.html.twig', new EditVariantDescriptionsType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/dimensions", name="variants_edit_dimensions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDimensionsAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_dimensions.html.twig', new EditVariantDimensionsType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/prices", name="variants_edit_prices")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editPricesAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_prices.html.twig', new EditVariantPricesType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/features", name="variants_edit_features")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editFeaturesAction(Request $request, $variantId)
    {
        /**
         * @var $variant Variant
         * @var $em EntityManager
         */
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("WebIllumination\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }
        $form = $this->createForm(new EditVariantFeaturesType(), $variant, array(
            'departmentId' => $variant->getProduct()->getDepartment()->getDepartment()->getId()
        ));

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl('edit_product_variants'));
            }
        }

        return $this->render('WebIlluminationSiteBundle:Variant:edit_features.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/delete", name="variants_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($variantId)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("WebIllumination\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $em->remove($variant);
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