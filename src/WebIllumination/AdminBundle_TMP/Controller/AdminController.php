<?php

namespace WebIllumination\AdminBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function cameraAction()
    {
        $em = $this->get('doctrine')->getManager();
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();

        foreach($products as $product)
        {
            $this->index($product);
        }
    }

    public function index($product)
    {
        try {
        $update = $this->get('solarium.client.product')->createUpdate();
        $helper = $update->getHelper();
        $document = $update->createDocument();

        //Get department
        $departments = $product->getDepartments();
        foreach($departments as $productToDepartment)
        {
            if($productToDepartment->getDisplayOrder() == 1)
            {
                $department = $productToDepartment->getDepartment()->getDescription()->getName();
                break;
            }
        }

        $prices = $product->getPrices();

        $document->setField('id', $product->getId());
        $document->setField('brand_id', $product->getBrand()->getId());
        $document->setField('group_id', $product->getProductGroupId());
        foreach($departments as $department)
        {
            $document->addField('document_id', $department->getId());
        }

        $document->setField('status', $product->getStatus());
        $document->setField('locale', $product->getDescription()->getLocale());
        $document->setField('tagline', $product->getDescription()->getTagline());
        $document->setField('header', $product->getDescription()->getHeader());
        $document->setField('page_title', $product->getDescription()->getPageTitle());
        $document->setField('short_description', $product->getDescription()->getShortDescription());
        $document->setField('tagline', $product->getDescription()->getTagline());

        $productCodes = explode(',', $product->getAlternativeProductCodes());
        array_unshift($productCodes, $product->getProductCode());
        foreach($productCodes as $productCode)
        {
            $document->addField('product_code', $productCode);
        }
//        foreach(explode(',', $product->getDescription()->getSearchWords()) as $searchWord)
//        {
//            $document->addField('search_words', $searchWord);
//        }
//
//        $document->setField('brand', $product->getBrand()->getDescription()->getName());
//        $document->setField('department', $department);


//        $document->setField('available_for_purchase', $product->getAvailableForPurchase());
//        $document->setField('special_offer', $product->getSpecialOffer());
//        $document->setField('recommended', $product->getRecommended());
//        $document->setField('accessory', $product->getAccessory());
//        $document->setField('new', $product->getNew());
//        $document->setField('hide_price', $product->getHidePrice());
//        $document->setField('show_price_out_of_hours', $product->getShowPriceOutOfHours());
//
//        $document->setField('membership_discount_available', $product->getMembershipCardDiscountAvailable());
//        $document->setField('membership_maximum_discount', $product->getMaximumMembershipCardDiscount());

//        $document->setField('delivery_band', $product->getDeliveryBand());
//        $document->setField('inherited_delivery_band', $product->getInheritedDeliveryBand());
//        $document->setField('delivery_cost', $product->getDeliveryCost());
//        $document->setField('weight', $product->getWeight());
//        $document->setField('height', $product->getHeight());

//        $document->setField('cost_price', $prices[0]->getCostPrice());
//        $document->setField('rrp', $prices[0]->getRecommendedRetailPrice());
//        $document->setField('list_price', $prices[0]->getListPrice());
//
//        $document->setField('created_at', $helper->formatDate($product->getCreatedAt()));
//        $document->setField('updated_at', $helper->formatDate($product->getUpdatedAt()));

        $update->addDocument($document);
        $update->addCommit();
        $this->get('solarium.client.product')->update($update);
        }catch(\Solarium_Exception $e){
            var_dump($e);
        }
        die();

        return new Response("");
//    	return $this->render('WebIlluminationAdminBundle:Admin:camera.html.twig');
    }
}
