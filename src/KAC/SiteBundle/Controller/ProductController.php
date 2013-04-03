<?php
namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
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
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Form\EditProductDescriptionsType;
use KAC\SiteBundle\Form\EditProductImagesType;
use KAC\SiteBundle\Form\EditProductLinksType;
use KAC\SiteBundle\Form\EditProductOverviewType;
use KAC\SiteBundle\Form\ProductFeatureGroupsType;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Description;
use KAC\SiteBundle\Entity\Product\FeatureGroup;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Manager\ProductManager;
use KAC\SiteBundle\Manager\SeoManager;

class ProductController extends Controller {
    public function viewAction(Request $request, $id)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Product $product
         */
        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($id);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $lowestPrice = null;
        $highestPrice = null;
        $commonFeatures = array();
        $variantFeatures = array();

        foreach($product->getVariants() as $variant)
        {
            $variantFeatures[$variant->getId()] = array();

            // Calculate price range
            foreach ($variant->getPrices() as $price) {
                if ($lowestPrice === null || $price->getListPrice() < $lowestPrice->getListPrice()) {
                }
                if ($highestPrice === null || $price->getListPrice() > $highestPrice->getListPrice()) {
                    $highestPrice = $price;
                }
            }

            // Get features
            /** @var $feature VariantToFeature */
            foreach ($variant->getFeatures() as $feature)
            {
                if($feature && $feature->getFeatureGroup() && $feature->getFeature())
                {
                    // Fetch the relevant department to feature entity
                    $departmentToFeature = $em->createQuery("
                            SELECT dtf
                            FROM KAC\SiteBundle\Entity\DepartmentToFeature dtf
                            WHERE dtf.featureGroup = ?1 AND dtf.department = ?2")
                        ->setParameter(1, $feature->getFeatureGroup()->getId())
                        ->setParameter(2, $product->getDepartments()->isEmpty() ? 0 : $product->getDepartments()->first()->getDepartment()->getId())
                        ->execute();

                    // Check for common features
                    if($departmentToFeature && count($departmentToFeature) >= 1 && $departmentToFeature[0]->getDisplayOnProduct())
                    {
                        if(!array_key_exists($feature->getFeatureGroup()->getName(), $commonFeatures))
                        {
                            $commonFeatures[$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        }
                        else if ($commonFeatures[$feature->getFeatureGroup()->getName()] != $feature->getFeature()->getName())
                        {
                            unset ($commonFeatures[$feature->getFeatureGroup()->getName()]);
                        }
                    }
                    if($departmentToFeature && count($departmentToFeature) >= 1 && $departmentToFeature[0]->getDisplayOnProduct())
                    {
                        $variantFeatures[$variant->getId()][$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                    }
                }
            }
        }

        // Get all images
        $galleryImages = array();
        $thumbnailImage = null;

        $images = $em->getRepository("KAC\SiteBundle\Entity\Image")->findBy(array(
            'objectId' => $id,
            'objectType' => 'product',
        ), array(
            'displayOrder' => 'ASC'
        ));

        /**
         * @var Image $image
         */
        foreach($images as $image)
        {
            // Get the gallery images
            if($image->getImageType() === 'gallery')
            {
                $galleryImages[] = $image;
            // Get the thumbnail image
            } else if ($image->getImageType() === 'product') {
                $thumbnailImage = $image;
            }
        }

        // Find template from the departments
        $template = 'default';
        $departments = array();
        if($product->getDepartment()) {
            // Check the department tree
            $currDepartment = $product->getDepartment()->getDepartment();
            do {
                $departments[] = $currDepartment;

                if($currDepartment->getTemplate() !== '' && $currDepartment->getTemplate() !== null) {
                    $template = $product->getDepartment()->getDepartment()->getTemplate();
                }

                $currDepartment = $currDepartment->getParent();
            } while ($currDepartment !== null);
        }

        return $this->render('KACSiteBundle:Product:view\\'.$template.'.html.twig', array(
            'product' => $product,
            'departments' => $departments,
            'gallery_images' => $galleryImages,
            'thumbnail_image' => $thumbnailImage,
            'lowest_price' => $lowestPrice,
            'highest_price' => $highestPrice,
            'common_features' => $commonFeatures,
            'variant_features' => $variantFeatures,
        ));
    }

    /**
     * @Route("/admin/products/new", name="products_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId=null, $brandId=null, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();
        $product = $manager->createProduct();

        /**
         * @var \Craue\FormFlowBundle\Form\FormFlow $flow
         */
        $flow = $this->get('kac_site.form.flow.new_product');
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
                // Update descriptions
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

                $manager->updateObjectLinks($product);

                $em->persist($product);
                $em->flush();

                // Link images
                $this->getImageManager()->persistImages($product, 'product');
                foreach($product->getVariants() as $variant)
                {
                    $this->getImageManager()->persistImages($variant, 'variant');
                }
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('admin_listing_products'));
            }
        }

        return $this->render('KACSiteBundle:Product:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    /**
     * @Route("/admin/products/newFeatureGroup", name="products_new_feature_group")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newFeatureGroupAction(Request $request, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        //$featureGroup = new FeatureGroup();

        $department = $em->getRepository("KAC\SiteBundle\Entity\Department")->find($request->query->get('departmentId'));

        $form = $this->createForm(new ProductFeatureGroupsType($department));

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {

                // Get the data
                $featureGroups = $form->get('features')->getData();

                // Update the database
                foreach ($featureGroups as $featureGroup)
                {
                    $em->persist($featureGroup);
                    $em->flush();
                }

                /*// Check if new feature group needs to be applied to a department
                $department = $form->get('department')->getData();
                if ($department)
                {
                    // Get the other feature groups
                    $departments = $em->getRepository("KAC\SiteBundle\Entity\DepartmentToFeature")->findBy(array('department' => $department));

                    // Add the department to feature
                    $departmentToFeature = new DepartmentToFeature();
                    $departmentToFeature->setDepartment($department);
                    $departmentToFeature->setFeatureGroup($featureGroup);
                    $departmentToFeature->setDisplayOnFilter($featureGroup->getFilter());
                    $departmentToFeature->setDisplayOnListing(true);
                    $departmentToFeature->setDisplayOnProduct(true);
                    $departmentToFeature->setDisplayOrder(sizeof($departments) + 1);
                    $em->persist($departmentToFeature);
                    $em->flush();
                }*/

                // Notify user
                $this->get('session')->setFlash('notice', 'The new feature group "'.$featureGroup->getName().'" has been added.');

                // Check if request is modal
                if ($request->query->get('modal') == true)
                {
                    // Break out the modal
                    return $this->render('KACSiteBundle:Includes:modalBreakout.html.twig');
                } else {
                    // Forward
                    return $this->redirect($this->get('router')->generate('homepage'));
                }
            }
        }

        return $this->render('KACSiteBundle:Product:newFeatureGroup.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function baseEditAction(Request $request, $productId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
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
                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
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
        return $this->baseEditAction($request, $productId, 'KACSiteBundle:Product:edit_overview.html.twig', new EditProductOverviewType());
    }

    /**
     * @Route("/admin/products/{productId}/images", name="products_edit_images")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editImagesAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        // Fetch the products images
        $images = $em->getRepository("KAC\SiteBundle\Entity\Image")->findBy(array(
            'objectId' => $product->getId(),
            'objectType' => 'product',
        ));
        $product->setImages(join(',', array_map(function($image) {
            return $image->getId();
        }, $images)));


        $form = $this->createForm(new EditProductImagesType(), $product);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                $this->getImageManager()->persistImages($product, 'product');

                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:edit_images.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/links", name="products_edit_links")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editLinksAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();
        $originalLinks = array();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        foreach($product->getLinks() as $link)
        {
            $originalLinks[] = $link;
        }

        $form = $this->createForm(new EditProductLinksType(), $product);

        if ($request->isMethod('POST')) {
            $form->bind($request);
            if($form->isValid()) {
                // Remove all links from the to delete array that have not been deleted
                foreach($product->getLinks() as $link) {
                    foreach ($originalLinks as $key => $toDel) {
                        if ($toDel->getId() === $link->getId()) {
                            unset($originalLinks[$key]);
                        }
                    }

                    $link->setProduct($product);
                }

                foreach ($originalLinks as $link) {
                    $em->remove($link);
                }

                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:edit_links.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/variants", name="products_edit_variants")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editVariantsAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        return $this->render('KACSiteBundle:Product:edit_variants.html.twig', array(
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

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
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