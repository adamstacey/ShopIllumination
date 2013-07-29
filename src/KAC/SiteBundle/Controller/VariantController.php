<?php
namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Form\Product\ProductVariantDeliveryType;
use KAC\SiteBundle\Form\Product\ProductVariantDescriptionsType;
use KAC\SiteBundle\Form\Product\ProductVariantSeoType;
use KAC\SiteBundle\Form\Variant\EditVariantDocumentsType;
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
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Form\Variant\EditVariantDescriptionsType;
use KAC\SiteBundle\Form\Variant\EditVariantDimensionsType;
use KAC\SiteBundle\Form\Variant\EditVariantFeaturesType;
use KAC\SiteBundle\Form\Variant\EditVariantImagesType;
use KAC\SiteBundle\Form\Variant\EditVariantOverviewType;
use KAC\SiteBundle\Form\Variant\EditVariantPricesType;

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
        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $variant = $this->getManager()->createVariant($product);

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('kac_site.form.flow.new_variant');
        $flow->bind($variant);

        // Get current form step
        $form = $flow->createForm(array(
            'departmentId' => $product->getDepartment()->getDepartment()->getId(),
        ));

        if ($flow->isValid($form)) {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm();
            } else {
                // Add the variant to each feature
                foreach($variant->getFeatures() as $feature)
                {
                    $feature->setVariant($variant);
                }
                $em->persist($variant);
                $em->flush();

                $this->getManager()->updateVariantImages($variant);
                $this->getManager()->updateVariantDocuments($variant);

                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('products_edit_variants', array(
                    'productId' => $variant->getProduct()->getId()
                )));
            }
        }

        return $this->render('KACSiteBundle:Variant:new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    public function editBaseAction(Request $request, $variantId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();
        $productManger = $this->get('kac_site.manager.product');

        /**
         * @var $variant Variant
         */
        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        if(count($variant->getDescriptions()) === 0)
        {
            $variant->addDescription($variant->getDescription());
        }

        $form = $this->createForm($formClass, $variant);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Update the variant order based on the product code
                $productManger->updateVariantOrder($variant->getProduct());

                $em->persist($variant->getProduct());
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $variant->getProduct()->getId(),
                    'variantId' => $variant->getId(),
                )));
            }
        }

        return $this->render($template, array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/edit", name="variants_edit")
     */
    public function editAction($productId, $variantId)
    {
        return $this->redirect($this->generateUrl('variants_edit_overview', array(
            'productId' => $productId,
            'variantId' => $variantId,
        )));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/overview", name="variants_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $variantId)
    {
        return $this->editBaseAction($request, $variantId, 'KACSiteBundle:Variant:edit_overview.html.twig', new EditVariantOverviewType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/descriptions", name="variants_edit_descriptions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionsAction(Request $request, $variantId)
    {
        return $this->editBaseAction($request, $variantId, 'KACSiteBundle:Variant:edit_descriptions.html.twig', new ProductVariantDescriptionsType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/seo", name="variants_edit_seo")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editSeoAction(Request $request, $variantId)
    {
        return $this->editBaseAction($request, $variantId, 'KACSiteBundle:Variant:edit_seo.html.twig', new ProductVariantSeoType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/dimensions", name="variants_edit_dimensions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDimensionsAction(Request $request, $variantId)
    {
        return $this->editBaseAction($request, $variantId, 'KACSiteBundle:Variant:edit_dimensions.html.twig', new EditVariantDimensionsType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/delivery", name="variants_edit_delivery")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDeliveryAction(Request $request, $variantId)
    {
        return $this->editBaseAction($request, $variantId, 'KACSiteBundle:Variant:edit_delivery.html.twig', new ProductVariantDeliveryType());
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/prices", name="variants_edit_prices")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editPricesAction(Request $request, $variantId)
    {
        $em = $this->getDoctrine()->getManager();
        $originalPrices = array();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        foreach($variant->getPrices() as $price)
        {
            $originalPrices[] = $price;
        }

        $form = $this->createForm(new EditVariantPricesType(), $variant);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Remove all links from the to delete array that have not been deleted
                foreach($variant->getPrices() as $price) {
                    foreach ($originalPrices as $key => $toDel) {
                        if ($toDel->getId() === $price->getId()) {
                            unset($originalPrices[$key]);
                        }
                    }

                    $price->setVariant($variant);
                }

                foreach ($originalPrices as $price) {
                    $em->remove($price);
                }

                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $variant->getProduct()->getId(),
                    'variantId' => $variant->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Variant:edit_prices.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/features", name="variants_edit_features")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editFeaturesAction(Request $request, $variantId)
    {
        $em = $this->getDoctrine()->getManager();
        $originalFeatures = array();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        foreach($variant->getFeatures() as $feature)
        {
            $originalFeatures[] = $feature;
        }

        $form = $this->createForm(new EditVariantFeaturesType(), $variant, array(
            'departmentId' => $variant->getProduct()->getDepartment()->getDepartment()->getId()
        ));

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Remove all links from the to delete array that have not been deleted
                foreach($variant->getFeatures() as $feature) {
                    foreach ($originalFeatures as $key => $toDel) {
                        if ($toDel->getId() === $feature->getId()) {
                            unset($originalFeatures[$key]);
                        }
                    }

                    $feature->setVariant($variant);
                }

                foreach ($originalFeatures as $feature) {
                    $em->remove($feature);
                }

                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $variant->getProduct()->getId(),
                    'variantId' => $variant->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Variant:edit_features.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/images", name="variants_edit_images")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editImagesAction(Request $request, $variantId)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        $variant->setTemporaryImages(join(',', array_map(function($image) {
            return $image->getId();
        }, $variant->getImages()->toArray())));


        $form = $this->createForm(new EditVariantImagesType(), $variant);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $this->getImageManager()->persistImages($variant, 'product_variant');

                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'variantId' => $variant->getId(),
                    'productId' => $variant->getProduct()->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Variant:edit_images.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/documents", name="variants_edit_documents")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDocumentsAction(Request $request, $variantId)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        $variant->setTemporaryDocuments(join(',', array_map(function($document) {
            return $document->getId();
        }, $variant->getDocuments()->toArray())));


        $form = $this->createForm(new EditVariantDocumentsType(), $variant);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $this->getManager()->updateVariantDocuments($variant);

                $em->persist($variant);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'variantId' => $variant->getId(),
                    'productId' => $variant->getProduct()->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Variant:edit_documents.html.twig', array(
            'variant' => $variant,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants/{variantId}/delete", name="variants_delete")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function deleteAction($productId, $variantId)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($variantId);
        if(!$variant)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $em->remove($variant);
        $em->flush();

        return $this->redirect($this->generateUrl('products_edit_variants', array(
            'productId' => $productId
        )));
    }

    /**
     * Fetch project manager from container
     *
     * @return \KAC\SiteBundle\Manager\ProductManager
     */
    private function getManager()
    {
        return $this->get('kac_site.manager.product');
    }

    /**
     * Fetch project manager from container
     *
     * @return \KAC\SiteBundle\Manager\ImageManager
     */
    private function getImageManager()
    {
        return $this->get('kac_site.manager.image');
    }
}