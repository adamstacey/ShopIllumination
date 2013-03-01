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

                foreach($product->getLinks() as $link) {
                    $link->setProduct($product);
                }

                $em->persist($product);
                $em->flush();

                // Link images
                $this->persistImages($product, 'product');
                foreach($product->getVariants() as $variant)
                {
                    $this->persistImages($variant, 'variant');
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

    public function baseEditAction(Request $request, $productId, $template, $formClass)
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
     */
    public function editAction($productId)
    {
        return $this->redirect($this->generateUrl('products_edit_overview', array(
            'productId' => $productId
        )));
    }

    /**
     * @Route("/admin/products/{productId}/overview", name="products_edit_overview")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editOverviewAction(Request $request, $productId)
    {
        return $this->baseEditAction($request, $productId, 'WebIlluminationSiteBundle:Product:edit_overview.html.twig', new EditProductOverviewType());
    }

    /**
     * @Route("/admin/products/{productId}/descriptions", name="products_edit_descriptions")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionsAction(Request $request, $productId)
    {
        return $this->baseEditAction($request, $productId, 'WebIlluminationSiteBundle:Product:edit_descriptions.html.twig', new EditProductDescriptionsType());
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

    private function persistImages($entity, $entityType) {
        $em = $this->getDoctrine()->getManager();
        $i = 0;
        $imageIds = explode(',', $entity->getImages());

        // If no images were added add a blank image
        if(count($imageIds) == 0) {
            $image = new Image();
            $image->setLocale('en');
            $image->setTitle($entity->getDescription()->getHeader());
            $image->setAlignment('');
            $image->setDescription('');
            $image->setLink('');
            $image->setObjectType($entityType);
            $image->setImageType($entityType);
            $image->setObjectId($entity->getId());
            $image->setDisplayOrder(1);
            $image->setOriginalPath('/images/no-image.jpg');
            $image->setPublicPath('/images/no-image.jpg');
            $em->persist($image);
        } else {
            // Link each image to the variant
            foreach($imageIds as $imageId)
            {
                /**
                 * @var $image Image
                 */
                $image = $em->getRepository("WebIllumination\SiteBundle\Entity\Image")->find($imageId);
                if($image)
                {
                    $image->setObjectId($entity->getId());
                    $image->setObjectType($entityType);
                    $image->setImageType($entityType);

                    $image->setTitle($entity->getDescription()->getHeader());
                    $image->setDisplayOrder($i);
                    $image->setPublicPath(/*Set this field to a blank value so it can be changed in the listener*/"");

                    $i++;

                    $em->persist($image);
                }
            }
        }
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