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
use WebIllumination\SiteBundle\Form\EditVariantFeaturesType;
use WebIllumination\SiteBundle\Form\EditVariantOverviewType;

class VariantController extends Controller {
    /**
     * @Route("/admin/variants/new", name="variants_new")
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

        return $this->render('WebIlluminationSiteBundle:Variant:new.html.twig', array(
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
     * @Route("/admin/variants/{variantId}/edit", name="variants_edit")
     * @Route("/admin/variants/{variantId}/overview", name="variants_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_overview.html.twig', new EditVariantOverviewType());
    }

    /**
     * @Route("/admin/variants/{variantId}/descriptions", name="variants_edit_descriptions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionsAction(Request $request, $variantId)
    {
        return $this->editAction($request, $variantId, 'WebIlluminationSiteBundle:Variant:edit_descriptions.html.twig', new EditVariantDescriptionsType());
    }

    /**
     * @Route("/admin/variants/{variantId}/features", name="variants_edit_features")
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
            'departmentId' => $variant->getProduct()->getDepartment()->getId(),
        ));

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl('edit_product_variants'));
            }
        }

//        \Doctrine\Common\Util\Debug::dump($form->createView()->children['features']->vars['prototype']);die();

        return $this->render('WebIlluminationSiteBundle:Variant:edit_features.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/variants/{variantId}/delete", name="variants_delete")
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