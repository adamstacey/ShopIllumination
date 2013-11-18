<?php
namespace KAC\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use KAC\SiteBundle\Form\Product\EditProductDepartmentsType;
use KAC\SiteBundle\Form\Product\EditProductDocumentsType;
use KAC\SiteBundle\Form\Product\EditProductImagesType;
use KAC\SiteBundle\Form\Product\EditProductDescriptionType;
use KAC\SiteBundle\Form\Product\EditProductSeoType;
use KAC\SiteBundle\Model\ImportPriceData;
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
use KAC\SiteBundle\Form\Product\EditProductLinksType;
use KAC\SiteBundle\Form\Product\EditProductOverviewType;
use KAC\SiteBundle\Form\Product\NewProductFeatureGroupsType;
use KAC\SiteBundle\Form\Product\NewProductFeaturesType;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Description;
use KAC\SiteBundle\Entity\Product\FeatureGroup;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Manager\ProductManager;
use KAC\SiteBundle\Manager\SeoManager;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ProductController extends Controller {
    public function viewAction(Request $request, $id, $variant=null)
    {
        /**
         * @var EntityManager $em
         */
        $em = $this->getDoctrine()->getManager();

        /**
         * @var \KAC\SiteBundle\Entity\Product $product
         */
        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($id);
        if (!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }
        // Check if product is enabled
        if ($product->getStatus() !== 'a' && !$this->get('security.context')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirect($this->generateUrl('routing', array(
                'url' => $product->getDepartment()->getDepartment()->getUrl()
            )));
        }

        $cheapestVariant = null;
        $lowestPrice = null;
        $highestPrice = null;
        $commonFeatures = array();
        $differentiatingFeatures = array();
        $variantFeatures = array();

        foreach ($product->getVariants() as $entity)
        {
            $variantFeatures[$entity->getId()] = array();

            // Calculate price range
            foreach ($entity->getPrices() as $price)
            {
                if ($lowestPrice === null || $price->getListPrice() < $lowestPrice->getListPrice())
                {
                    $lowestPrice = $price;
                    $cheapestVariant = $entity;
                }
                if ($highestPrice === null || $price->getListPrice() > $highestPrice->getListPrice())
                {
                    $highestPrice = $price;
                }
            }

            // Get features
            /** @var $feature VariantToFeature */
            foreach ($entity->getFeatures() as $feature)
            {
                if ($feature && $feature->getFeatureGroup() && $feature->getFeature())
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
                    if ($departmentToFeature && count($departmentToFeature) >= 1 && $departmentToFeature[0]->getDisplayOnProduct())
                    {
                        if(!array_key_exists($feature->getFeatureGroup()->getName(), $commonFeatures))
                        {
                            $commonFeatures[$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        }
                        else if ($commonFeatures[$feature->getFeatureGroup()->getName()] != $feature->getFeature()->getName())
                        {
                            unset ($commonFeatures[$feature->getFeatureGroup()->getName()]);
                        }
                    } elseif (!$departmentToFeature || count($departmentToFeature) <= 0) {
                        if(!array_key_exists($feature->getFeatureGroup()->getName(), $commonFeatures))
                        {
                            $commonFeatures[$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        }
                        else if ($commonFeatures[$feature->getFeatureGroup()->getName()] != $feature->getFeature()->getName())
                        {
                            unset ($commonFeatures[$feature->getFeatureGroup()->getName()]);
                        }
                    }

                    if ($departmentToFeature && count($departmentToFeature) >= 1 && $departmentToFeature[0]->getDisplayOnProduct())
                    {
                        $variantFeatures[$entity->getId()][$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        if (!isset($differentiatingFeatures[$feature->getFeatureGroup()->getName()]))
                        {
                            $differentiatingFeatures[$feature->getFeatureGroup()->getName()] = array();
                        }
                        $differentiatingFeatures[$feature->getFeatureGroup()->getName()][] = $feature->getFeature()->getName();
                    } elseif (!$departmentToFeature || count($departmentToFeature) <= 0) {
                        $variantFeatures[$entity->getId()][$feature->getFeatureGroup()->getName()] = $feature->getFeature()->getName();
                        if (!isset($differentiatingFeatures[$feature->getFeatureGroup()->getName()]))
                        {
                            $differentiatingFeatures[$feature->getFeatureGroup()->getName()] = array();
                        }
                        $differentiatingFeatures[$feature->getFeatureGroup()->getName()][] = $feature->getFeature()->getName();
                    }
                }
            }
        }

        // Calculate the differentiating features
        foreach ($differentiatingFeatures as $key => &$features)
        {
            $features = array_unique($features);
            if (count($features) <= 1)
            {
                unset($differentiatingFeatures[$key]);
            }
        }

        $guarantees = $em->getRepository("KAC\SiteBundle\Entity\Guarantee")->findBy(array(
            'objectId' => $product->getId(),
            'objectType' => 'product'
        ), array(
            'displayOrder' => 'ASC'
        ));
        if (!$guarantees)
        {
            if ($product->getBrand())
            {
                $guarantees = $em->getRepository("KAC\SiteBundle\Entity\Guarantee")->findBy(array(
                    'objectId' => $product->getBrand()->getId(),
                    'objectType' => 'brand'
                ), array(
                    'displayOrder' => 'ASC'
                ));
            }
        }

        // Get all images
        $galleryImages = array();
        $productImages = array();

        $images = $em->getRepository("KAC\SiteBundle\Entity\Product\Image")->findBy(array(
            'objectId' => $id
        ), array(
            'displayOrder' => 'ASC'
        ));

        if ($variant)
        {
            $images = array_merge($em->getRepository("KAC\SiteBundle\Entity\Product\Variant\Image")->findBy(array(
                'objectId' => $variant->getId()
            ), array(
                'displayOrder' => 'ASC'
            )), $images);
        }

        if ($variant) {
            $deliveryBand = intval($variant->getDeliveryBand());
        } else {
            $deliveryBand = intval($product->getVariant()->getDeliveryBand());
        }
        switch ($deliveryBand) {
            case 1:
                $deliveryDays = 1;
                break;
            case 2:
                $deliveryDays = 2;
                break;
            case 3:
            case 4:
            case 5:
                $deliveryDays = 1;
                break;
            case 6:
            default:
                $deliveryDays = 5;
                break;
        }

        if (date("G") > 12)
        {
            $deliveryDays++;
        }
        $deliveryFromDate = date('Y-m-d', strtotime("+".$deliveryDays." Weekday"));
        $deliveryFromDate = date('D jS F', strtotime($deliveryFromDate));

        /**
         * @var Image $image
         */
        foreach ($images as $image)
        {
            // Get the gallery images
            if($image->getImageType() === 'gallery')
            {
                $galleryImages[] = $image;
            // Get the thumbnail image
            } else if ($image->getImageType() === 'product') {
                $productImages[] = $image;
            }
        }

        // Find template from the departments
        $template = 'standard';
        $departments = array();
        if ($product->getTemplate() && $product->getTemplate() !== 'default')
        {
            $template = $product->getTemplate();
        } elseif($product->getDepartment()) {
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

        // Create variant array
        $variants = array();
        foreach($product->getVariants() as $entity)
        {
            $array = array(
                'productId' => $product->getId(),
                'variantId' => $entity->getId(),
                'url' => $entity->getUrl(),
                'features' => $commonFeatures,
            );
            foreach ($entity->getFeatures() as $vtf)
            {
                if ($vtf && $vtf->getFeatureGroup() && $vtf->getFeature())
                {
                    $array['features'][$vtf->getFeatureGroup()->getName()] = $vtf->getFeature()->getName();
                }
            }
            $variants[] = $array;
        }

        // Work out the related products
        $usedIds = array();
        $usedIds[] = $product->getId();
        $relatedProducts = array();
        foreach ($product->getRelatedProducts() as $relatedProduct)
        {
            if (!in_array($relatedProduct->getId(), $usedIds))
            {
                $usedIds[] = $relatedProduct->getId();
                $relatedProducts[] = $relatedProduct;
            }
        }
        $relatedProductTotal = 20 - count($relatedProducts);
        if ($relatedProductTotal > 0)
        {
            $brandDepartmentProductsQuery = $em->createQuery("SELECT p, pd FROM KAC\SiteBundle\Entity\Product p JOIN p.departments pd WHERE p.brand = :brand AND pd.department = :department AND p.id != :id")
                ->setParameter('brand', $product->getBrand())
                ->setParameter('department', $product->getDepartment()->getDepartment())
                ->setParameter('id', $product->getId())
                ->setMaxResults($relatedProductTotal);
            $brandDepartmentProducts = $brandDepartmentProductsQuery->getResult();
            if ($brandDepartmentProducts)
            {
                foreach ($brandDepartmentProducts as $brandDepartmentProduct)
                {
                    if (!in_array($brandDepartmentProduct->getId(), $usedIds))
                    {
                        $usedIds[] = $brandDepartmentProduct->getId();
                        $relatedProducts[] = $brandDepartmentProduct;
                    }
                }
                $relatedProductTotal = 20 - count($relatedProducts);
                if ($relatedProductTotal > 0)
                {
                    $departmentProductsQuery = $em->createQuery("SELECT p, pd FROM KAC\SiteBundle\Entity\Product p JOIN p.departments pd WHERE pd.department = :department AND p.id != :id")
                        ->setParameter('department', $product->getDepartment()->getDepartment())
                        ->setParameter('id', $product->getId())
                        ->setMaxResults($relatedProductTotal);
                    $departmentProducts = $departmentProductsQuery->getResult();
                    if ($departmentProducts)
                    {
                        foreach ($departmentProducts as $departmentProduct)
                        {
                            if (!in_array($departmentProduct->getId(), $usedIds))
                            {
                                $usedIds[] = $departmentProduct->getId();
                                $relatedProducts[] = $departmentProduct;
                            }
                        }
                    }
                } elseif ($relatedProductTotal < 0) {
                    $relatedProducts = array_slice($relatedProducts, 0, 10);
                }
            }
        } elseif ($relatedProductTotal < 0) {
            $relatedProducts = array_slice($relatedProducts, 0, 10);
        }

        $hobDepartmentIds = array(936, 937, 1120, 939, 940, 951, 952, 1123, 1124, 953, 1125, 948, 1126, 949, 950, 1127, 1056, 177, 66, 941, 942, 943, 944, 68, 1057, 1058, 67, 80, 92, 1170);
        $panOfferAvaliable = false;
        $panOffers = false;
        foreach ($product->getDepartments() as $department) {
            if (in_array($department->getDepartment()->getId(), $hobDepartmentIds))
            {
                $panOfferAvaliable = true;
                break;
            }
        }
        if ($panOfferAvaliable)
        {
            $panOffers = array();
            $panOffers[] = $em->getRepository("KAC\SiteBundle\Entity\Product")->find(5068);
            $panOffers[] = $em->getRepository("KAC\SiteBundle\Entity\Product")->find(5069);
        }

        return $this->render('KACSiteBundle:Product:Templates/'.$template.'.html.twig', array(
            'product' => $product,
            'departments' => $departments,
            'guarantees' => $guarantees,
            'gallery_images' => $galleryImages,
            'product_images' => $productImages,
            'lowest_price' => $lowestPrice,
            'highest_price' => $highestPrice,
            'common_features' => $commonFeatures,
            'variant_features' => $variantFeatures,
            'differentiating_features' => $differentiatingFeatures,
            'related_products' => $relatedProducts,
            'variants' => $variants,
            'variant' => $variant,
            'delivery_band' => $deliveryBand,
            'delivery_from_date' => $deliveryFromDate,
            'pan_offers' => $panOffers,
        ));
    }

    /**
     * @Route("/products/view/variant/{id}", name="products_variant_view")
     */
    public function viewWithVariantAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $variant = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->find($id);
        if (!$variant)
        {
            throw new NotFoundHttpException("Variant not found");
        }

        return $this->viewAction($request, $variant->getProduct()->getId(), $variant);
    }

    /**
     * @Route("/admin/products/new", name="products_new")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newAction(Request $request, $departmentId = null, $brandId = null, $admin = false)
    {
        $em = $this->getDoctrine()->getManager();

        $manager = $this->getManager();

        $product = $manager->createProduct();

        $flow = $this->get('kac_site.form.flow.new_product');
        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm();

        if ($flow->isValid($form))
        {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm();
            } else {
                $em->persist($product);
                $em->flush();

                // Update the images
                $manager->updateImages($product);
                // Update the documents
                $manager->updateDocuments($product);
                // Update the variant order based on the product code
                $manager->updateVariantOrder($product);

                $manager->updateProduct($product);

                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('routing', array(
                    'url' => $product->getUrl(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:new.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }

    /**
     * @Route("/admin/products/{productId}/clone", name="products_clone")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function cloneAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->getManager();

        $originalProduct = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$originalProduct)
        {
            throw new NotFoundHttpException("Product not found");
        }

        /**
         * @var $product Product
         */
        $product = clone $originalProduct;

        $flow = $this->get('kac_site.form.flow.clone_product');

        $flow->bind($product);

        // Get current form step
        $form = $flow->createForm();

        if ($flow->isValid($form))
        {
            $flow->saveCurrentStepData($form);

            if ($flow->nextStep())
            {
                // Get next form step
                $form = $flow->createForm();
            } else {
                // Update the images
                $manager->updateImages($product);
                // Update the documents
                $manager->updateDocuments($product);
                // Update the variant order based on the product code
                $manager->updateVariantOrder($product);

                $manager->updateProduct($product);

                $em->persist($product);
                $em->flush();

                $flow->reset();

                return $this->redirect($this->generateUrl('routing', array(
                    'url' => $product->getUrl(),
                )));            }
        }

        return $this->render('KACSiteBundle:Product:clone.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
            'originalProduct' => $originalProduct,
        ));
    }

    /**
     * @Route("/admin/products/newFeatureGroups", name="products_new_feature_groups")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newFeatureGroupsAction(Request $request, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        // Setup the department and product objects
        $department = null;
        $product = null;

        // Check for a department
        if ($request->query->has('departmentId'))
        {
            $department = $em->getRepository("KAC\SiteBundle\Entity\Department")->find($request->query->get('departmentId'));
        }

        // Check for a product
        if ($request->query->has('productId'))
        {
            $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($request->query->get('productId'));
        }

        $form = $this->createForm(new NewProductFeatureGroupsType($department));

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {

                // Get the data
                $featureGroups = $form->get('features')->getData();

                // Check if new feature groups need to be applied to a department
                $department = $form->get('department')->getData();

                // Check if new feature groups need to be applied to a product
                $product = $form->get('product')->getData();

                // Add the new feature groups
                foreach ($featureGroups as $featureGroup)
                {
                    // Update the database
                    $em->persist($featureGroup);

                    // Check if we need to assign the features to a department
                    if ($department)
                    {
                        // Get the other feature groups
                        $departmentToFeatures = $em->getRepository("KAC\SiteBundle\Entity\DepartmentToFeature")->findBy(array('department' => $department));

                        // Assign the feature to the department
                        $departmentToFeature = new DepartmentToFeature();
                        $departmentToFeature->setDepartment($department);
                        $departmentToFeature->setFeatureGroup($featureGroup);
                        $departmentToFeature->setDisplayOnFilter($featureGroup->getFilter());
                        $departmentToFeature->setDisplayOnListing(true);
                        $departmentToFeature->setDisplayOnProduct(true);
                        $departmentToFeature->setDisplayOrder(sizeof($departmentToFeatures) + 1);
                        $em->persist($departmentToFeature);
                    }

                    // Check if we need to assign the features to a product
                    if ($product)
                    {
                        // Go through the variants of the product
                        $variants = $em->getRepository("KAC\SiteBundle\Entity\Product\Variant")->findBy(array('product' => $product));
                        foreach ($variants as $entity)
                        {
                            // Get the other feature groups
                            $variantToFeatures = $em->getRepository("KAC\SiteBundle\Entity\Product\VariantToFeature")->findBy(array('variant' => $entity));

                            // Assign the feature to the variant
                            $variantToFeature = new VariantToFeature();
                            $variantToFeature->setVariant($entity);
                            $variantToFeature->setFeatureGroup($featureGroup);
                            $variantToFeature->setDisplayOrder(sizeof($variantToFeatures) + 1);
                            $em->persist($variantToFeature);
                        }
                    }

                    // Flush the database
                    $em->flush();
                }

                // Notify user
                $this->get('session')->getFlashBag()->add('notice', sizeof($featureGroups).' new feature group'.(sizeof($featureGroups) == 1?' has':'s have').' been added.');

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

        return $this->render('KACSiteBundle:Product:newFeatureGroups.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/newFeatures", name="products_new_features")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function newFeaturesAction(Request $request, $admin=false)
    {
        $em = $this->getDoctrine()->getManager();

        $departmentId = 0;

        // Check for a department ID
        if ($request->query->has('departmentId'))
        {
            $departmentId = $request->query->get('departmentId');
        }

        $form = $this->createForm(new NewProductFeaturesType($departmentId));

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {

                // Get the data
                $features = $form->get('features')->getData();

                // Add the new features
                foreach ($features as $feature)
                {
                    // Update the database
                    $em->persist($feature);

                    // Flush the database
                    $em->flush();
                }

                // Notify user
                $this->get('session')->getFlashBag()->add('notice', sizeof($features).' new feature'.(sizeof($features) == 1?' has':'s have').' been added.');

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

        return $this->render('KACSiteBundle:Product:newFeatures.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/admin/products/importPrices", name="products_import_prices")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function importPricesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $data = new ImportPriceData();
        $priceIssuesFound = array();
        $noUpdatesRequired = array();
        $pricesNeedConfirmation = array();
        $pricesUpdated = array();
        $totalImports = 0;
        $processed = false;
        $requiresConfirmation = false;

        $form = $this->createFormBuilder($data)
            ->add('file', 'file', array(
                'label' => 'Upload File',
                'attr' => array(
                    'class' => 'fill',
                    'data-help' => 'Upload a CSV or TXT file',
                )
            ))
            ->add('action', 'choice', array(
                'label' => 'Action',
                'choices' => array(
                    'check' => 'Check Prices',
                    'update' => 'Update Prices'
                ),
                'required' => true,
                'attr' => array(
                    'class' => 'fill',
                    'data-help' => 'Select the action of the import.',
                ),
            ))
            ->add('rrp', 'checkbox', array(
                'required' => false,
                'label' => 'Reset RRP',
                'attr' => array(
                    'data-help' => 'Do you want to reset the RRP?',
                ),
            ))
            ->add('confirm', 'submit', array(
                'label' => 'Confirm',
                'attr' => array(
                    'class' => 'button button-green icon-white fr',
                    'data-icon-secondary' => 'icon-1118',
                )
            ))
            ->add('save', 'submit', array(
                'label' => 'Import',
                'attr' => array(
                    'class' => 'button button-green icon-white fr',
                    'data-icon-secondary' => 'icon-1118',
                )
            ))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Read file
                $file = $data->getFile()->openFile();
                $file->setFlags(\SplFileObject::READ_CSV);
                foreach ($file as $line) {
                    if (sizeof($line) >= 2)
                    {
                        $importContent = array();
                        $importContent['productCode'] = $line[0];
                        $importContent['newPrice'] = number_format(floatval($line[1]), 4, '.', '');
                        if ($importContent['productCode'] && ($importContent['newPrice'] > 0))
                        {
                            $totalImports++;

                            /**
                             * @var $variant Variant
                             */
                            $variant = $em->getRepository('KAC\SiteBundle\Entity\Product\Variant')->findOneBy(array('productCode' => $importContent['productCode']));
                            if ($variant)
                            {
                                $importContent['productId'] = $variant->getId();
                                $importContent['pageTitle'] = $variant->getDescription()->getPageTitle();
                                $importContent['existingPrice'] = $variant->getPrice()->getListPrice();

                                if ($importContent['existingPrice'] == $importContent['newPrice'])
                                {
                                    $noUpdatesRequired[] = $importContent;
                                } elseif ($importContent['existingPrice'] > $importContent['newPrice'] && !$form->get('confirm')->isClicked()) {
                                    $pricesNeedConfirmation[] = $importContent;
                                    if($data->getAction() == 'update')
                                    {
                                        $requiresConfirmation = true;
                                    }
                                } else {
                                    $pricesUpdated[] = $importContent;

                                    // Check if prices need to be updated
                                    if ($data->getAction() == 'update')
                                    {
                                        $variant->getPrice()->setListPrice($importContent['newPrice']);
                                        if ($data->getRrp())
                                        {
                                            $variant->getPrice()->setRecommendedRetailPrice($importContent['newPrice']);
                                        }

                                        $em->persist($variant);
                                        $em->flush();
                                    }
                                    }
                            } else {
                                $priceIssuesFound[] = $importContent;
                            }
                        }
                    }
                }

                $processed = true;
            }
        }

        return $this->render('KACSiteBundle:Product:importPrices.html.twig', array(
            'form' => $form->createView(),
            'processed' => $processed,
            'requiresConfirmation' => $requiresConfirmation,
            'totalImports' => $totalImports,
            'priceIssuesFound' => $priceIssuesFound,
            'noUpdatesRequired' => $noUpdatesRequired,
            'pricesNeedConfirmation' => $pricesNeedConfirmation,
            'pricesUpdated' => $pricesUpdated,
        ));
    }

    /**
     * @Route("/admin/products/exportVisualSoftProducts", name="products_export_visual_soft_products")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function exportVisualSoftProductAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $brands = $em->getRepository("KAC\SiteBundle\Entity\Brand\Description")->findBy(array(), array('name' => 'ASC'));

        $brandId = $request->query->get('brandId');
        if ($brandId)
        {
            $brand = $em->getRepository("KAC\SiteBundle\Entity\Brand")->find($brandId);
        }
        if ($brand)
        {
            $productsQuery = $em->createQuery("SELECT p FROM KAC\SiteBundle\Entity\Product p WHERE p.brand = :brand")
                ->setParameter('brand', $brand);
            $products = $productsQuery->getResult();
            $seoManager = $this->getSeoManager();
            $csv = "VS Parent ID,VS Child ID,,Parent Reference,Child Reference,,Parent Product Title,Child Product Title,Product Subtitle,Product Summary,Product Description,,Brand,,Categories,,Tag 1 (Finish),,Model Number,EAN,MPN,ISBN,UPC,,Price (Inc VAT),Sale Price (Inc VAT),RRP Price (Inc VAT),Cost Price (Inc VAT),VAT Rate,Display On Sale Page,,Stock Value,Stock Message,Weight (in KGs),Export Weight (in KGs),Child Active,Parent Active,Archive (Delete),,Meta Title,Meta Keywords,Meta Description,,Upselling 1 (Related Products),Upselling 2 (Other Colours)\n";
            foreach ($products as $product)
            {
                if (($product->getStatus() == 'a') || ($product->getStatus() == 'h'))
                {
                    $colour = false;
                    $materialFinish = false;
                    $bullets = array();
                    foreach ($product->getVariant()->getFeatures() as $variantToFeature)
                    {
                        foreach ($product->getDepartment()->getDepartment()->getFeatures() as $departmentToFeature)
                        {
                            if ($departmentToFeature->getFeatureGroup()->getId() == $variantToFeature->getFeatureGroup()->getId())
                            {
                                if ($departmentToFeature->getDisplayOnListing())
                                {
                                    if ($variantToFeature->getFeature())
                                    {
                                        $featureName = $variantToFeature->getFeature()->getName();
                                        if (($featureName != 'N/A') && ($featureName != '*** NOT SET ***') && ($featureName != ''))
                                        {
                                            $bullets[] = str_replace('"', '', '<strong>'.$variantToFeature->getFeatureGroup()->getName().':</strong> '.$featureName);
                                        }
                                    }
                                }
                            }
                        }
                        if ($variantToFeature->getFeatureGroup()->getName() == 'Colour')
                        {
                            if ($variantToFeature->getFeature())
                            {
                                $featureName = $variantToFeature->getFeature()->getName();
                                if (($featureName != 'N/A') && ($featureName != '*** NOT SET ***') && ($featureName != ''))
                                {
                                    $colour = str_replace('"', '', $variantToFeature->getFeature()->getName());
                                }
                            }
                        }
                        if ($variantToFeature->getFeatureGroup()->getName() == 'Material Finish')
                        {
                            if ($variantToFeature->getFeature())
                            {
                                $featureName = $variantToFeature->getFeature()->getName();
                                if (($featureName != 'N/A') && ($featureName != '*** NOT SET ***') && ($featureName != ''))
                                {
                                    $materialFinish = str_replace('"', '', $variantToFeature->getFeature()->getName());
                                }
                            }
                        }
                    }
                    if (count($bullets) > 1)
                    {
                        $bullets = '<ul><li>'.join('</li><li>', $bullets).'</li></ul>';
                    } else {
                        $bullets = false;
                    }
                    $departments = array();
                    $department = $product->getDepartment()->getDepartment();
                    $departments[] = $department->getDescription()->getMenuTitle();
                    while ($department->getParent())
                    {
                        $department = $department->getParent();
                        array_unshift($departments, $department->getDescription()->getMenuTitle());
                    }
                    if (count($departments) > 0)
                    {
                        $departments = str_replace('Root Department > ', '', join(' > ', $departments));
                    } else {
                        $departments = false;
                    }
                    $productCode = str_replace('"', '', $product->getVariant()->getProductCode());
                    $productPrice = $product->getVariant()->getPrice();
                    $listPrice = $productPrice->getListPrice();
                    $recommendedRetailPrice = $productPrice->getRecommendedRetailPrice();
                    $costPrice = $productPrice->getCostPrice();
                    $displayOnSalePage = 'N';
                    $description = str_replace('"', '', $seoManager->cleanHtml($product->getVariant()->getDescription()->getDescription()));
                    $brandName = str_replace('"', '', $product->getBrand()->getDescription()->getName());
                    if (!$description)
                    {
                        $description = str_replace('"', '', $seoManager->cleanHtml($product->getDescription()->getDescription()));
                    }
                    $pageTitle = str_replace('"', '', $product->getVariant()->getDescription()->getPageTitle());
                    if (!$pageTitle)
                    {
                        $pageTitle = str_replace('"', '', $product->getDescription()->getPageTitle());
                    }
                    $cleansedPageTitle = str_replace($brandName, '', $pageTitle);
                    $cleansedPageTitle = str_replace($productCode, '', $cleansedPageTitle);
                    $cleansedPageTitle = str_replace('  ', ' ', trim($cleansedPageTitle));
                    $header = str_replace('"', '', $product->getVariant()->getDescription()->getHeader());
                    if (!$header)
                    {
                        $header = str_replace('"', '', $product->getDescription()->getHeader());
                    }
                    $cleansedHeader = str_replace($brandName, '', $header);
                    $cleansedHeader = str_replace($productCode, '', $cleansedHeader);
                    $cleansedHeader = str_replace('  ', ' ', trim($cleansedHeader));
                    $keyMessage = str_replace('"', '', $product->getVariant()->getDescription()->getKeyMessage());
                    $metaDescription = str_replace('"', '', $product->getVariant()->getDescription()->getMetaDescription());
                    if (!$metaDescription)
                    {
                        $metaDescription = str_replace('"', '', $product->getDescription()->getMetaDescription());
                    }
                    $metaKeywords = str_replace('"', '', $product->getVariant()->getDescription()->getMetaKeywords());
                    if (!$metaKeywords)
                    {
                        $metaKeywords = str_replace('"', '', $product->getDescription()->getMetaKeywords());
                    }
                    $relatedProducts = array();
                    if ($product->getCheaperAlternative())
                    {
                        $relatedProducts[] = $product->getCheaperAlternative()->getVariant()->getProductCode();
                    }
                    foreach ($product->getRelatedProducts() as $relatedProduct)
                    {
                        $relatedProducts[] = $relatedProduct->getVariant()->getProductCode();
                    }
                    if (count($relatedProducts) > 0)
                    {
                        $relatedProducts = join(', ', $relatedProducts);
                    } else {
                        $relatedProducts = false;
                    }
                    $csv .= ','; // VS Parent ID
                    $csv .= ','; // VS Child ID
                    $csv .= ','; // -
                    $csv .= '"'.$productCode.'",'; // Parent Reference
                    $csv .= '"'.$productCode.'",'; // Child Reference
                    $csv .= ','; // -
                    $csv .= '"'.$cleansedPageTitle.'",'; // Parent Product Title
                    $csv .= '"'.$cleansedHeader.'",'; // Child Product Title
                    $csv .= ($keyMessage ? '"'.$keyMessage.'"' : '').','; // Product Subtitle
                    $csv .= ($bullets ? '"'.$bullets.'"' : '').','; // Product Summary
                    $csv .= '"'.$description.'",'; // Product Description
                    $csv .= ','; // -
                    $csv .= '"'.$brandName.'",'; // Brand
                    $csv .= ','; // -
                    $csv .= ($departments ? '"'.$departments.'"' : '').','; // Categories
                    $csv .= ','; // -
                    $csv .= ($materialFinish ? '"'.$materialFinish.'"' : '').','; // Tag 1 (Finish)
                    $csv .= ','; //
                    $csv .= '"'.$productCode.'",'; // Model Number
                    $csv .= '"'.str_replace('"', '', $product->getVariant()->getEan()).'",'; // EAN
                    $csv .= '"'.$productCode.'",'; // MPN
                    $csv .= ','; // ISBN
                    $csv .= ','; // UPC
                    $csv .= ','; // -
                    if (($recommendedRetailPrice > 0) && ($recommendedRetailPrice > $listPrice))
                    {
                        $csv .= $recommendedRetailPrice.','; // Price (Inc VAT)
                        $csv .= $listPrice.','; // Sale Price (Inc VAT)
                        $csv .= '0,'; // RRP Price (Inc VAT)
                        $displayOnSalePage = 'Y';
                    } else {
                        $csv .= $listPrice.','; // Price (Inc VAT)
                        $csv .= $listPrice.','; // Sale Price (Inc VAT)
                        $csv .= '0,'; // RRP Price (Inc VAT)
                    }
                    $csv .= ','; // Cost Price (Inc VAT)
                    $csv .= '20,'; // VAT Rate
                    $csv .= '"'.$displayOnSalePage.'",'; // Display On Sale Page
                    $csv .= ','; // -
                    $csv .= '-1,'; // Stock Value
                    $csv .= ','; // Stock Message
                    $csv .= '0,'; // Weight (in KGs)
                    $csv .= '0,'; // Export Weight (in KGs)
                    $csv .= '"Y",'; // Child Active
                    $csv .= '"Y",'; // Parent Active
                    $csv .= '"N",'; // Archive (Delete)
                    $csv .= ','; // -
                    $csv .= '"'.$pageTitle.'",'; // Meta Title
                    $csv .= '"'.$metaKeywords.'",'; // Meta Keywords
                    $csv .= '"'.$metaDescription.'",'; // Meta Description
                    $csv .= ','; // -
                    $csv .= ($relatedProducts ? '"'.$relatedProducts.'"' : '').','; // Upselling 1 (Related Products)
                    $csv .= ''; // Upselling 2 (Other Colours)
                    $csv .= "\n";
                }
            }

            $response = new Response();
            $filename = $brand->getUrl().'-vs-export-'.date("Y-m-d-His").'.csv';
            $response->setStatusCode(200);
            $response->setCharset('UTF-8');
            $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
            $response->headers->set('Content-Description', 'Visual Soft Export');
            $response->headers->set('Content-Disposition', 'attachment;filename='.$filename);
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
            $response->setContent($csv);
            return $response;
        }

        return $this->render('KACSiteBundle:Product:exportVisualSoftProducts.html.twig', array('brands' => $brands));
    }

    public function baseEditAction(Request $request, $productId, $template, $formClass)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->get('kac_site.manager.product');

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if (!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $form = $this->createForm($formClass, $product);

        if ($request->isMethod('POST'))
        {
            $form->submit($request);
            if ($form->isValid())
            {
                $manager->updateProduct($product);

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
        $em = $this->getDoctrine()->getManager();
        $manager = $this->getManager();

        /**
         * @var $product Product
         */
        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        if (count($product->getDepartments()) > 0)
        {
            $product->setMainDepartment($product->getDepartments()[0]);
        }

        $form = $this->createForm(new EditProductOverviewType(), $product);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                if($product->getMainDepartment())
                {
                    $depAlreadyExists = false;
                    // Check to see if the department already exists in the departments collection
                    foreach($product->getDepartments() as $department)
                    {
                        if($department == $product->getMainDepartment())
                        {
                            $department->setDepartment($product->getMainDepartment()->getDepartment());
                            $depAlreadyExists = true;
                        }
                    }

                    if(!$depAlreadyExists)
                    {
                        $product->addDepartment($product->getMainDepartment());
                    }
                }

                $manager->updateProduct($product);

                $em->persist($product);
                $em->flush();
                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:edit_overview.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/description", name="products_edit_description")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDescriptionAction(Request $request, $productId)
    {
        return $this->baseEditAction($request, $productId, 'KACSiteBundle:Product:edit_description.html.twig', new EditProductDescriptionType());
    }

    /**
     * @Route("/admin/products/{productId}/departments", name="products_edit_departments")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDepartmentsAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->getManager();
        $originalDepartments = array();

        /**
         * @var $product Product
         */
        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        foreach($product->getDepartments() as $department)
        {
            $originalDepartments[] = $department;
        }

        $form = $this->createForm(new EditProductDepartmentsType(), $product);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                // Remove all links from the to delete array that have not been deleted
                foreach($product->getDepartments() as $department) {
                    foreach ($originalDepartments as $key => $toDel) {
                        if ($toDel->getId() === $department->getId()) {
                            unset($originalDepartments[$key]);
                        }
                    }

                    $department->setProduct($product);
                }

                foreach ($originalDepartments as $department) {
                    $em->remove($department);
                }

                $manager->updateProduct($product);

                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:edit_departments.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/admin/products/{productId}/seo", name="products_edit_seo")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editSeoAction(Request $request, $productId)
    {
        return $this->baseEditAction($request, $productId, 'KACSiteBundle:Product:edit_seo.html.twig', new EditProductSeoType());
    }

    /**
     * @Route("/admin/products/{productId}/images", name="products_edit_images")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editImagesAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();
        $manager = $this->getManager();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $product->setTemporaryImages(join(',', array_map(function($image) {
            return $image->getId();
        }, $product->getImages()->toArray())));


        $form = $this->createForm(new EditProductImagesType(), $product);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $this->getImageManager()->persistImages($product, 'product');

                $manager->updateProduct($product);

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
     * @Route("/admin/products/{productId}/documents", name="products_edit_documents")
     * @Secure(roles="ROLE_ADMIN")
     */
    public function editDocumentsAction(Request $request, $productId)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository("KAC\SiteBundle\Entity\Product")->find($productId);
        if(!$product)
        {
            throw new NotFoundHttpException("Product not found");
        }

        $product->setTemporaryDocuments(join(',', array_map(function($document) {
            return $document->getId();
        }, $product->getDocuments()->toArray())));


        $form = $this->createForm(new EditProductDocumentsType(), $product);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if($form->isValid()) {
                $this->getManager()->updateDocuments($product);

                $this->getManager()->updateProduct($product);

                $em->persist($product);
                $em->flush();

                return $this->redirect($this->generateUrl($request->attributes->get('_route'), array(
                    'productId' => $product->getId(),
                )));
            }
        }

        return $this->render('KACSiteBundle:Product:edit_documents.html.twig', array(
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
            $form->submit($request);
            if($form->isValid()) {
                $i = 0;
                // Remove all links from the to delete array that have not been deleted
                foreach($product->getLinks() as $link) {
                    foreach ($originalLinks as $key => $toDel) {
                        if ($toDel->getId() === $link->getId()) {
                            unset($originalLinks[$key]);
                        }
                    }

                    $link->setProduct($product);
                    $link->setDisplayOrder($i);

                    $i++;
                }

                foreach ($originalLinks as $link) {
                    $em->remove($link);
                }

                $this->getManager()->updateProduct($product);

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

        $this->getManager()->updateVariantOrder($product);
        $this->getManager()->updateProduct($product);

        $em->persist($product);
        $em->flush();

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
        $this->get('kac_site.indexer.product')->deleteById($productId);

        return $this->redirect($this->generateUrl('listing_products'));
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

    /**
     * Fetch seo manager from container
     *
     * @return \KAC\SiteBundle\Manager\SeoManager
     */
    private function getSeoManager()
    {
        return $this->get('kac_site.manager.seo');
    }
}