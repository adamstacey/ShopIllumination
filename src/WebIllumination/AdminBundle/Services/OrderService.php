<?php

namespace WebIllumination\AdminBundle\Services;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class OrderService {

    protected $container;
    protected $singleItemTitle;
    protected $multipleItemsTitle;
    protected $singleItemDescription;
    protected $multipleItemsDescription;
    protected $singleItemClass;
    protected $multipleItemsClass;
    protected $singleItemPath;
    protected $multipleItemsPath;
    protected $singleItemModel;
    protected $multipleItemsModel;
    protected $listingSortOrder;
    protected $listingSort;
    protected $listingOrder;
    protected $listingMaxResults;
    protected $pdfUrl;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->singleItemTitle = 'Order';
        $this->multipleItemsTitle = 'Orders';
        $this->singleItemDescription = 'order';
        $this->multipleItemsDescription = 'orders';
        $this->singleItemClass = 'order';
        $this->multipleItemsClass = 'orders';
        $this->singleItemPath = 'order';
        $this->multipleItemsPath = 'orders';
        $this->singleItemModel = 'Order';
        $this->multipleItemsModel = 'Orders';
        $this->listingSortOrder = 'createdAt:DESC';
        $this->listingSort = 'createdAt';
        $this->listingOrder = 'DESC';
        $this->listingMaxResults = 20;
        $this->pdfUrl = $this->container->getParameter('cdn_host');
    }

    // Initialise the admin order session
    public function initialiseAdminOrderSession()
    {
        // Get the settings session
        $sessionSettings = $this->container->get('session')->get('settings');
        if (!isset($sessionSettings['admin']['orders']))
        {
            // Setup the settings
            $settings = array();
            $settings['singleItemTitle'] = $this->singleItemTitle;
            $settings['multipleItemsTitle'] = $this->multipleItemsTitle;
            $settings['singleItemDescription'] = $this->singleItemDescription;
            $settings['multipleItemsDescription'] = $this->multipleItemsDescription;
            $settings['singleItemClass'] = $this->singleItemClass;
            $settings['multipleItemsClass'] = $this->multipleItemsClass;
            $settings['singleItemPath'] = $this->singleItemPath;
            $settings['multipleItemsPath'] = $this->multipleItemsPath;
            $settings['singleItemModel'] = $this->singleItemModel;
            $settings['multipleItemsModel'] = $this->multipleItemsModel;
            $settings['listingSortOrder'] = $this->listingSortOrder;
            $settings['listingSort'] = $this->listingSort;
            $settings['listingOrder'] = $this->listingOrder;
            $settings['listingMaxResults'] = $this->listingMaxResults;
        } else {
            $settings = $sessionSettings['admin']['orders'];
        }

        // Get the filters session
        $sessionFilters = $this->container->get('session')->get('filters');
        if (!isset($sessionFilters['admin']['orders']))
        {
            // Setup the filters
            $filters = array();
            $filters['orderId'] = '';
            $filters['customer'] = '';
            $filters['emailAddress'] = '';
            $filters['status'] = '';
            $filters['paymentType'] = '';
            $filters['deliveryType'] = '';
            $filters['totalFrom'] = 0;
            $filters['totalTo'] = 0;
            $filters['dateFrom'] = '';
            $filters['dateTo'] = '';
        } else {
            $filters = $sessionFilters['admin']['orders'];
        }

        // Update the session
        $sessionSettings['admin']['orders'] = $settings;
        $sessionFilters['admin']['orders'] = $filters;
        $this->container->get('session')->set('settings', $sessionSettings);
        $this->container->get('session')->set('filters', $sessionFilters);

        return true;
    }

    // Initialise the order session
    public function initialiseOrderSession()
    {
        // Check if there is a basket session
        $order = $this->container->get('session')->get('order');

        // If there is no order setup the session
        if (!is_array($order))
        {
            // Setup the order
            $order = array();

            // Setup the order
            $order['userId'] = 0;
            $order['orderNumber'] = 0;
            $order['paymentType'] = '';
            $order['paymentAttempt'] = 1;
            $order['firstName'] = '';
            $order['lastName'] = '';
            $order['organisationName'] = '';
            $order['emailAddress'] = '';
            $order['telephoneDaytime'] = '';
            $order['telephoneEvening'] = '';
            $order['mobile'] = '';
            $order['billingFirstName'] = '';
            $order['billingLastName'] = '';
            $order['billingOrganisationName'] = '';
            $order['billingAddressLine1'] = '';
            $order['billingAddressLine2'] = '';
            $order['billingTownCity'] = '';
            $order['billingCountyState'] = '';
            $order['billingPostZipCode'] = '';
            $order['billingCountryCode'] = 'GB';
            $order['sameDeliveryAddress'] = 1;
            $order['deliveryFirstName'] = '';
            $order['deliveryLastName'] = '';
            $order['deliveryOrganisationName'] = '';
            $order['deliveryAddressLine1'] = '';
            $order['deliveryAddressLine2'] = '';
            $order['deliveryTownCity'] = '';
            $order['deliveryCountyState'] = '';
            $order['deliveryPostZipCode'] = '';
            $order['deliveryCountryCode'] = 'GB';
            $order['paymentProcesses'] = array();
        } else {
            // Check that all items are setup
            if (!isset($order['userId']))
            {
                $order['userId'] = 0;
            }
            if (!isset($order['orderNumber']))
            {
                $order['orderNumber'] = 0;
            }
            if (!isset($order['paymentType']))
            {
                $order['paymentType'] = '';
            }
            if (!isset($order['paymentAttempt']))
            {
                $order['paymentAttempt'] = 1;
            }
            if (!isset($order['firstName']))
            {
                $order['firstName'] = '';
            }
            if (!isset($order['lastName']))
            {
                $order['lastName'] = '';
            }
            if (!isset($order['organisationName']))
            {
                $order['organisationName'] = '';
            }
            if (!isset($order['emailAddress']))
            {
                $order['emailAddress'] = '';
            }
            if (!isset($order['telephoneDaytime']))
            {
                $order['telephoneDaytime'] = '';
            }
            if (!isset($order['telephoneEvening']))
            {
                $order['telephoneEvening'] = '';
            }
            if (!isset($order['mobile']))
            {
                $order['mobile'] = '';
            }
            if (!isset($order['billingFirstName']))
            {
                $order['billingFirstName'] = '';
            }
            if (!isset($order['billingLastName']))
            {
                $order['billingLastName'] = '';
            }
            if (!isset($order['billingOrganisationName']))
            {
                $order['billingOrganisationName'] = '';
            }
            if (!isset($order['billingAddressLine1']))
            {
                $order['billingAddressLine1'] = '';
            }
            if (!isset($order['billingAddressLine2']))
            {
                $order['billingAddressLine2'] = '';
            }
            if (!isset($order['billingTownCity']))
            {
                $order['billingTownCity'] = '';
            }
            if (!isset($order['billingCountyState']))
            {
                $order['billingCountyState'] = '';
            }
            if (!isset($order['billingPostZipCode']))
            {
                $order['billingPostZipCode'] = '';
            }
            if (!isset($order['billingCountryCode']))
            {
                $order['billingCountryCode'] = 'GB';
            }
            if (!isset($order['sameDeliveryAddress']))
            {
                $order['sameDeliveryAddress'] = 1;
            }
            if (!isset($order['deliveryFirstName']))
            {
                $order['deliveryFirstName'] = '';
            }
            if (!isset($order['deliveryLastName']))
            {
                $order['deliveryLastName'] = '';
            }
            if (!isset($order['deliveryOrganisationName']))
            {
                $order['deliveryOrganisationName'] = '';
            }
            if (!isset($order['deliveryAddressLine1']))
            {
                $order['deliveryAddressLine1'] = '';
            }
            if (!isset($order['deliveryAddressLine2']))
            {
                $order['deliveryAddressLine2'] = '';
            }
            if (!isset($order['deliveryTownCity']))
            {
                $order['deliveryTownCity'] = '';
            }
            if (!isset($order['deliveryCountyState']))
            {
                $order['deliveryCountyState'] = '';
            }
            if (!isset($order['deliveryPostZipCode']))
            {
                $order['deliveryPostZipCode'] = '';
            }
            if (!isset($order['deliveryCountryCode']))
            {
                $order['deliveryCountryCode'] = 'GB';
            }
            if (!is_array($order['paymentProcesses']))
            {
                $order['paymentProcesses'] = array();
            }
        }

        // Update the session
        $this->container->get('session')->set('order', $order);

        return true;
    }

    // Reset the order session
    public function resetOrderSession()
    {
        // Clear order session
        $this->container->get('session')->set('order', false);

        // Initialise the order session
        $this->initialiseOrderSession();

        return true;
    }

    // Fraud Check: Customer Ordered
    public function getFraudCheckCustomerOrdered($emailAddress)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select($qb->expr()->count("o.id"));
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->where($qb->expr()->eq('o.emailAddress', $qb->expr()->literal($emailAddress)));
        $query = $qb->getQuery();

        // Get the number of orders
        $orderCount = $query->getSingleScalarResult();

        if ($orderCount > 0)
        {
            return 1;
        }

        return 0;
    }

    // Fraud Check: Name Used On Different Order
    public function getFraudCheckNameUsedOnDifferentOrder($emailAddress, $firstName, $lastName)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select($qb->expr()->count("o.id"));
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->where($qb->expr()->orx(
            $qb->expr()->andx(
                $qb->expr()->like('o.firstName', $qb->expr()->literal('%'.$firstName.'%')),
                $qb->expr()->like('o.lastName', $qb->expr()->literal('%'.$lastName.'%'))
            ),
            $qb->expr()->andx(
                $qb->expr()->like('o.billingFirstName', $qb->expr()->literal('%'.$firstName.'%')),
                $qb->expr()->like('o.billingLastName', $qb->expr()->literal('%'.$lastName.'%'))
            ),
            $qb->expr()->andx(
                $qb->expr()->like('o.billingFirstName', $qb->expr()->literal('%'.$firstName.'%')),
                $qb->expr()->like('o.billingLastName', $qb->expr()->literal('%'.$lastName.'%'))
            )
        ));
        $qb->andWhere($qb->expr()->neq('o.emailAddress', $qb->expr()->literal($emailAddress)));
        $query = $qb->getQuery();

        // Get the number of orders
        $orderCount = $query->getSingleScalarResult();

        if ($orderCount > 0)
        {
            return 1;
        }

        return 0;
    }

    // Fraud Check: Post Zip Code Used On Different Order
    public function getFraudCheckPostZipCodeUsedOnDifferentOrder($emailAddress, $postZipCode)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select($qb->expr()->count("o.id"));
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->where($qb->expr()->orx(
            $qb->expr()->andx(
                $qb->expr()->like('o.billingPostZipCode', $qb->expr()->literal('%'.$postZipCode.'%')),
                $qb->expr()->like('o.deliveryPostZipCode', $qb->expr()->literal('%'.$postZipCode.'%'))
            ),
            $qb->expr()->andx(
                $qb->expr()->like('o.billingPostZipCode', $qb->expr()->literal('%'.$postZipCode.'%')),
                $qb->expr()->like('o.deliveryPostZipCode', $qb->expr()->literal('%'.$postZipCode.'%'))
            )
        ));
        $qb->andWhere($qb->expr()->neq('o.emailAddress', $qb->expr()->literal($emailAddress)));
        $query = $qb->getQuery();

        // Get the number of orders
        $orderCount = $query->getSingleScalarResult();

        if ($orderCount > 0)
        {
            return 1;
        }

        return 0;
    }

    // Fraud Check: Telephone Used On Different Order
    public function getFraudCheckTelephoneUsedOnDifferentOrder($emailAddress, $telephone)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select($qb->expr()->count("o.id"));
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->where($qb->expr()->orx(
            $qb->expr()->like('o.telephoneDaytime', $qb->expr()->literal('%'.$telephone.'%')),
            $qb->expr()->like('o.telephoneEvening', $qb->expr()->literal('%'.$telephone.'%')),
            $qb->expr()->like('o.mobile', $qb->expr()->literal('%'.$telephone.'%'))
        ));
        $query = $qb->getQuery();

        // Get the number of orders
        $orderCount = $query->getSingleScalarResult();

        if ($orderCount > 0)
        {
            return 1;
        }

        return 0;
    }

    public function generateOrderDocuments($id)
    {
        // Get the services
        $systemService = $this->container->get('web_illumination_admin.system_service');

        // Create the PDF documents
        $orderDocument = $this->getUploadRootDir().'/order-'.$id.'.pdf';
        $copyOrderDocument = $this->getUploadRootDir().'/copy-order-'.$id.'.pdf';
        $invoiceDocument = $this->getUploadRootDir().'/invoice-'.$id.'.pdf';
        $deliveryNoteDocument = $this->getUploadRootDir().'/delivery-note-'.$id.'.pdf';
        $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-amd64 '.$this->pdfUrl.'/admin/orders/viewOrder/'.$id.' '.$orderDocument.' 2>&1 > /dev/null 2>/dev/null &');
        $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-amd64 '.$this->pdfUrl.'/admin/orders/viewCopyOrder/'.$id.' '.$copyOrderDocument.' 2>&1 > /dev/null 2>/dev/null &');
        $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-amd64 '.$this->pdfUrl.'/admin/orders/viewInvoice/'.$id.' '.$invoiceDocument.' 2>&1 > /dev/null 2>/dev/null &');
        $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-amd64 '.$this->pdfUrl.'/admin/orders/viewDeliveryNote/'.$id.' '.$deliveryNoteDocument.' 2>&1 > /dev/null 2>/dev/null &');
        return true;
    }

    public function generateBulkOrdersForPrint($ids)
    {
        // Get the services
        $systemService = $this->container->get('web_illumination_admin.system_service');

        // Create the PDF documents
        $invoicesDocument = $this->getUploadRootDir().'/orders-'.str_replace(',', '-', $ids).'.pdf';
        $systemService->pipeExec('/usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewOrders/'.$ids.' '.$invoicesDocument.' 2>&1 > /dev/null 2>/dev/null &');

        return '/'.$this->getUploadDir().'/orders-'.str_replace(',', '-', $ids).'.pdf';
    }

    public function generateBulkDeliveryNotesForPrint($ids)
    {
        // Get the services
        $systemService = $this->container->get('web_illumination_admin.system_service');

        // Create the PDF documents
        $deliveryNotesDocument = $this->getUploadRootDir().'/delivery-notes-'.str_replace(',', '-', $ids).'.pdf';
        $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewDeliveryNotes/'.$ids.' '.$deliveryNotesDocument.' 2>&1 > /dev/null 2>/dev/null &');

        return '/'.$this->getUploadDir().'/delivery-notes-'.str_replace(',', '-', $ids).'.pdf';
    }

    // Process the order
    public function processOrder()
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the order
        $order = $this->container->get('session')->get('order');

        // Get the basket
        $basket = $this->container->get('session')->get('basket');

        // Save the order
        $orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($order['orderNumber']);
        if (!$orderObject)
        {
            $orderObject = new Order();
            $orderObject->setStatus('Open Payment');
            $orderObject->setOrderPrinted(0);
            $orderObject->setDeliveryNotePrinted(0);
            $orderObject->setActioned(0);
            $orderObject->setPaymentResponse('');
            $orderObject->setDiscountsCount(0);
            $orderObject->setDonationsCount(0);
            $orderObject->setNotesCount(0);
        } else {
            // Clear the existing order products
            $orderProducts = $em->getRepository('KAC\SiteBundle\Entity\Order\Product')->findBy(array('order' => $order['orderNumber']));
            foreach ($orderProducts as $orderProduct)
            {
                $em->remove($orderProduct);
                $em->flush();
            }

            // Clear any existing order discounts
            $orderDiscounts = $em->getRepository('KAC\SiteBundle\Entity\Order\Discount')->findBy(array('order' => $order['orderNumber']));
            foreach ($orderDiscounts as $orderDiscount)
            {
                $em->remove($orderDiscount);
                $em->flush();
            }

            // Clear any existing order donations
            $orderDonations = $em->getRepository('KAC\SiteBundle\Entity\Order\Donation')->findBy(array('order' => $order['orderNumber']));
            foreach ($orderDonations as $orderDonation)
            {
                $em->remove($orderDonation);
                $em->flush();
            }

            // Clear any existing order notes
            $orderNotes = $em->getRepository('KAC\SiteBundle\Entity\Order\Note')->findBy(array('order' => $order['orderNumber']));
            foreach ($orderNotes as $orderNote)
            {
                $em->remove($orderNote);
                $em->flush();
            }
        }
        $orderObject->setUserId($order['userId']);
        $orderObject->setPaymentType($order['paymentType']);
        $orderObject->setDeliveryType($basket['delivery']['service']);
        switch ($basket['delivery']['service'])
        {
            default:
                $orderObject->setCourier('');
                break;
        }
        $orderObject->setNumberOfPackages(1);
        $orderObject->setTrackingNumber('');
        $orderObject->setLabelsPrinted(0);
        $orderObject->setSendReviewRequest(1);
        $orderObject->setReviewRequested(0);
        $orderObject->setEstimatedDeliveryDaysStart($basket['estimatedDeliveryDays']['start']);
        $orderObject->setEstimatedDeliveryDaysEnd($basket['estimatedDeliveryDays']['end']);
        $orderObject->setItems($basket['totals']['items']);
        $orderObject->setSubTotal($basket['totals']['subTotal']);
        $orderObject->setDeliveryCharge($basket['totals']['deliveryCharge']);
        $orderObject->setDiscount($basket['totals']['discount']);
        $orderObject->setVat($basket['totals']['vat']);
        $orderObject->setTotal($basket['totals']['total']);
        $orderObject->setPossibleDiscount($basket['possibleDiscount']);
        $orderObject->setFirstName($order['billingFirstName']);
        $orderObject->setLastName($order['billingLastName']);
        $orderObject->setOrganisationName($order['organisationName']);
        $orderObject->setEmailAddress($order['emailAddress']);
        $orderObject->setTelephoneDaytime($order['telephoneDaytime']);
        $orderObject->setTelephoneEvening($order['telephoneEvening']);
        $orderObject->setMobile($order['mobile']);
        $orderObject->setBillingFirstName($order['billingFirstName']);
        $orderObject->setBillingLastName($order['billingLastName']);
        $orderObject->setBillingOrganisationName($order['billingOrganisationName']);
        $orderObject->setBillingAddressLine1($order['billingAddressLine1']);
        $orderObject->setBillingAddressLine2($order['billingAddressLine2']);
        $orderObject->setBillingTownCity($order['billingTownCity']);
        $orderObject->setBillingCountyState($order['billingCountyState']);
        $orderObject->setBillingPostZipCode($order['billingPostZipCode']);
        $orderObject->setBillingCountryCode($order['billingCountryCode']);
        $orderObject->setDeliveryFirstName($order['deliveryFirstName']);
        $orderObject->setDeliveryLastName($order['deliveryLastName']);
        $orderObject->setDeliveryOrganisationName($order['deliveryOrganisationName']);
        $orderObject->setDeliveryAddressLine1($order['deliveryAddressLine1']);
        $orderObject->setDeliveryAddressLine2($order['deliveryAddressLine2']);
        $orderObject->setDeliveryTownCity($order['deliveryTownCity']);
        $orderObject->setDeliveryCountyState($order['deliveryCountyState']);
        $orderObject->setDeliveryPostZipCode($order['deliveryPostZipCode']);
        $orderObject->setDeliveryCountryCode($order['deliveryCountryCode']);
        $orderObject->setFraudCheckCustomerOrdered($this->getFraudCheckCustomerOrdered($order['emailAddress']));
        $orderObject->setFraudCheckAddressMatch($order['sameDeliveryAddress']);
        $orderObject->setFraudCheckNameUsedOnDifferentOrder($this->getFraudCheckNameUsedOnDifferentOrder($order['emailAddress'], $order['firstName'], $order['lastName']));
        $orderObject->setFraudCheckPostZipCodeUsedOnDifferentOrder($this->getFraudCheckPostZipCodeUsedOnDifferentOrder($order['emailAddress'], $order['firstName'], $order['lastName']));
        $orderObject->setFraudCheckTelephoneUsedOnDifferentOrder($this->getFraudCheckTelephoneUsedOnDifferentOrder($order['emailAddress'], $order['firstName'], $order['lastName']));
        $em->persist($orderObject);
        $em->flush();

        // Get the order number
        $order['orderNumber'] = $orderObject->getId();

        // Save the order session
        $this->container->get('session')->set('order', $order);

        // Save the order products
        foreach ($basket['products'] as $product)
        {
            // Get variant
            $variant = $em->getRepository('KAC\SiteBundle\Entity\Product\Variant')->find($product['variantId']);
            if(!$variant) {
                break;
            }

            $orderProductObject = new Order\Product();
            $orderProductObject->setOrder($orderObject);
            $orderProductObject->setBasketItemId($product['basketItemId']);
            $orderProductObject->setProduct($variant->getProduct());
            $orderProductObject->setVariant($variant);
            $orderProductObject->setUrl($product['url']);
            $orderProductObject->setName($product['header']);
            $orderProductObject->setProductCode($product['productCode']);
            $orderProductObject->setBrand($product['brand']['brand']);
            $orderProductObject->setDescription($product['shortDescription']);
            $orderProductObject->setUnitCost($product['unitCost']);
            $orderProductObject->setRecommendedRetailPrice($product['recommendedRetailPrice']);
            $orderProductObject->setDiscount($product['discount']);
            $orderProductObject->setSavings($product['savings']);
            $orderProductObject->setVat($product['vat']);
            $orderProductObject->setQuantity($product['quantity']);
            $orderProductObject->setSubTotal($product['subTotal']);
            $orderProductObject->setSelectedOptions($product['selectedOptions']);
            $orderProductObject->setSelectedOptionLabels(join('|', $product['selectedOptionLabels']));
            $em->persist($orderProductObject);
            $em->flush();
        }

        // Save the order notes
        $numberOfNotes = 0;
        if ($basket['delivery']['requestedDeliveryDate'] != '')
        {
            $orderNoteObject = new Order\Note();
            $orderNoteObject->setOrder($orderObject);
            $orderNoteObject->setNoteType('customer');
            $orderNoteObject->setNotified(0);
            if ($basket['delivery']['service'] == 'Collection')
            {
                $orderNoteObject->setNote('Requested Collection Date: '.$basket['delivery']['requestedDeliveryDate']);
            } else {
                $orderNoteObject->setNote('Requested Delivery Date: '.$basket['delivery']['requestedDeliveryDate']);
            }
            $orderNoteObject->setCreator($order['firstName'].' '.$order['lastName']);
            $em->persist($orderNoteObject);
            $em->flush();
            $numberOfNotes++;
        }
        if ($basket['delivery']['notes'] != '')
        {
            $orderNoteObject = new Order\Note();
            $orderNoteObject->setOrder($orderObject);
            $orderNoteObject->setNoteType('customer');
            $orderNoteObject->setNotified(0);
            $orderNoteObject->setNote($basket['delivery']['notes']);
            $orderNoteObject->setCreator($order['firstName'].' '.$order['lastName']);
            $em->persist($orderNoteObject);
            $em->flush();
            $numberOfNotes++;
        }
        $orderObject->setNotesCount($numberOfNotes);
        $em->persist($orderObject);
        $em->flush();

        // Save the discounts
        $basketDiscountsCount = 0;
        foreach ($basket['discounts'] as $discount)
        {
            if (($discount['discount'] > 0) && ($discount['description'] != ''))
            {
                $orderDiscountObject = new Order\Discount();
                $orderDiscountObject->setOrder($orderObject);
                $orderDiscountObject->setVoucherCode('');
                $orderDiscountObject->setGiftVoucherCode('');
                $orderDiscountObject->setDescription(($discount['description']?$discount['description']:''));
                $orderDiscountObject->setDiscount(($discount['discount']?$discount['discount']:0));
                $em->persist($orderDiscountObject);
                $em->flush();
                $basketDiscountsCount++;
            }
        }
        $orderObject->setDiscountsCount($basketDiscountsCount);
        $em->persist($orderObject);
        $em->flush();

        // Save the donations
        $basketDonationsCount = 0;
        foreach ($basket['donations'] as $donation)
        {
            if (($donation['donation'] > 0) && ($donation['description'] != ''))
            {
                $orderDonationObject = new Order\Donation();
                $orderDonationObject->setOrder($orderObject);
                $orderDonationObject->setDescription(($donation['description']?$donation['description']:''));
                $orderDonationObject->setDonation(($donation['donation']?$donation['donation']:0));
                $em->persist($orderDonationObject);
                $em->flush();
                $basketDonationsCount++;
            }
        }
        $orderObject->setDonationsCount($basketDonationsCount);
        $em->persist($orderObject);
        $em->flush();

        // Get the payment processes
        $sagePayService = $this->container->get('web_illumination_admin.sage_pay_service');
        $sagePayService->getPaymentProcess();

        // Create the PDF documents
        $this->generateOrderDocuments($order['orderNumber']);
    }

    // Get listing
    public function getListing($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo, $sort, $order, $page, $maxResults)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');
        $systemService = $this->container->get('web_illumination_admin.system_service');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Calculate the first result
        $firstResult = ($page - 1) * $maxResults;

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('o');
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        if ($orderId)
        {
            $qb->andWhere($qb->expr()->like('o.id', $qb->expr()->literal('%'.$orderId.'%')));
        }
        if ($customer)
        {
            $qb->andWhere($qb->expr()->orx(
                $qb->expr()->like('o.firstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.lastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.organisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingOrganisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryOrganisationName', $qb->expr()->literal('%'.$customer.'%'))
            ));
        }
        if ($emailAddress)
        {
            $qb->andWhere($qb->expr()->like('o.emailAddress', $qb->expr()->literal('%|'.$emailAddress.'|%')));
        }
        if ($status)
        {
            $statuses = explode('|', $status);
            if (sizeof($statuses) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.status', $statuses));
            } else {
                $qb->andWhere($qb->expr()->eq('o.status', $qb->expr()->literal($status)));
            }
        }
        if ($paymentType)
        {
            $paymentTypes = explode('|', $paymentType);
            if (sizeof($paymentTypes) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.paymentType', $paymentTypes));
            } else {
                $qb->andWhere($qb->expr()->eq('o.paymentType', $qb->expr()->literal($paymentType)));
            }
        }
        if ($deliveryType)
        {
            $deliveryTypes = explode('|', $deliveryType);
            if (sizeof($deliveryTypes) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.deliveryType', $deliveryTypes));
            } else {
                $qb->andWhere($qb->expr()->eq('o.deliveryType', $qb->expr()->literal($deliveryType)));
            }
        }
        if ($totalFrom > 0)
        {
            $qb->andWhere($qb->expr()->gte('o.total', $qb->expr()->literal($totalFrom)));
        }
        if ($totalTo > 0)
        {
            $qb->andWhere($qb->expr()->lte('o.total', $qb->expr()->literal($totalTo)));
        }
        if ($dateFrom)
        {
            $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal($dateFrom." 00:00:00")));
        }
        if ($dateTo)
        {
            $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal($dateTo." 23:59:59")));
        }
        $qb->addOrderBy('o.'.$sort, $order);
        $qb->setFirstResult($firstResult);
        $qb->setMaxResults($maxResults);
        $query = $qb->getQuery();

        // Get the orders
        $orders = $query->getResult();

        /*foreach ($orders as $order)
        {
            // Generate PDF documents if the don't already exist
            $orderDocument = $this->getUploadRootDir().'/order-'.$order->getId().'.pdf';
            $copyOrderDocument = $this->getUploadRootDir().'/copy-order-'.$order->getId().'.pdf';
            $invoiceDocument = $this->getUploadRootDir().'/invoice-'.$order->getId().'.pdf';
            $deliveryNoteDocument = $this->getUploadRootDir().'/delivery-note-'.$order->getId().'.pdf';
            if (!file_exists($invoiceDocument))
            {
                $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewOrder/'.$id.' '.$orderDocument.' 2>&1 > /dev/null 2>/dev/null &');
            }
            if (!file_exists($copyInvoiceDocument))
            {
                $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewCopyOrder/'.$id.' '.$copyOrderDocument.' 2>&1 > /dev/null 2>/dev/null &');
            }
            if (!file_exists($invoiceDocument))
            {
                $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewInvoice/'.$id.' '.$invoiceDocument.' 2>&1 > /dev/null 2>/dev/null &');
            }
            if (!file_exists($deliveryNoteDocument))
            {	
                $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-i386 '.$this->pdfUrl.'/admin/orders/viewDeliveryNote/'.$id.' '.$deliveryNoteDocument.' 2>&1 > /dev/null 2>/dev/null &');
            }
        }*/

        return $orders;
    }

    // Get listing count
    public function getListingCount($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select($qb->expr()->count("o.id"));
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        if ($orderId != '')
        {
            $qb->andWhere($qb->expr()->like('o.id', $qb->expr()->literal('%'.$orderId.'%')));
        }
        if ($customer != '')
        {
            $qb->andWhere($qb->expr()->orx(
                $qb->expr()->like('o.firstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.lastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.organisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingOrganisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryOrganisationName', $qb->expr()->literal('%'.$customer.'%'))
            ));
        }
        if ($emailAddress != '')
        {
            $qb->andWhere($qb->expr()->like('o.emailAddress', $qb->expr()->literal('%|'.$emailAddress.'|%')));
        }
        if ($status != '')
        {
            $options = explode('|', $status);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.status', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.status', $qb->expr()->literal($status)));
            }
        }
        if ($paymentType != '')
        {
            $options = explode('|', $paymentType);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.paymentType', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.paymentType', $qb->expr()->literal($paymentType)));
            }
        }
        if ($deliveryType != '')
        {
            $options = explode('|', $deliveryType);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.deliveryType', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.deliveryType', $qb->expr()->literal($deliveryType)));
            }
        }
        if ($totalFrom != '')
        {
            $qb->andWhere($qb->expr()->gte('o.total', $qb->expr()->literal($totalFrom)));
        }
        if ($totalTo != '')
        {
            $qb->andWhere($qb->expr()->lte('o.total', $qb->expr()->literal($totalTo)));
        }
        if ($dateFrom != '')
        {
            $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal($dateFrom." 00:00:00")));
        }
        if ($dateTo != '')
        {
            $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal($dateTo." 23:59:59")));
        }
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Open Payment')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Payment Failed')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Cancelled')));
        $query = $qb->getQuery();

        // Get the listing count
        $listingCount = $query->getSingleScalarResult();

        return $listingCount;
    }

    // Get listing statistics
    public function getListingStatistics($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('o');
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        if ($orderId != '')
        {
            $qb->andWhere($qb->expr()->like('o.id', $qb->expr()->literal('%'.$orderId.'%')));
        }
        if ($customer != '')
        {
            $qb->andWhere($qb->expr()->orx(
                $qb->expr()->like('o.firstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.lastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.organisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.billingOrganisationName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryFirstName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryLastName', $qb->expr()->literal('%'.$customer.'%')),
                $qb->expr()->like('o.deliveryOrganisationName', $qb->expr()->literal('%'.$customer.'%'))
            ));
        }
        if ($emailAddress != '')
        {
            $qb->andWhere($qb->expr()->like('o.emailAddress', $qb->expr()->literal('%|'.$emailAddress.'|%')));
        }
        if ($status != '')
        {
            $options = explode('|', $status);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.status', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.status', $qb->expr()->literal($status)));
            }
        }
        if ($paymentType != '')
        {
            $options = explode('|', $paymentType);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.paymentType', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.paymentType', $qb->expr()->literal($paymentType)));
            }
        }
        if ($deliveryType != '')
        {
            $options = explode('|', $deliveryType);
            if (sizeof($options) > 1)
            {
                $qb->andWhere($qb->expr()->in('o.deliveryType', $options));
            } else {
                $qb->andWhere($qb->expr()->eq('o.deliveryType', $qb->expr()->literal($deliveryType)));
            }
        }
        if ($totalFrom != '')
        {
            $qb->andWhere($qb->expr()->gte('o.total', $qb->expr()->literal($totalFrom)));
        }
        if ($totalTo != '')
        {
            $qb->andWhere($qb->expr()->lte('o.total', $qb->expr()->literal($totalTo)));
        }
        if ($dateFrom != '')
        {
            $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal($dateFrom." 00:00:00")));
        }
        if ($dateTo != '')
        {
            $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal($dateTo." 23:59:59")));
        }
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Open Payment')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Payment Failed')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Cancelled')));
        $query = $qb->getQuery();

        // Get the orders
        $orders = $query->getResult();

        // Setup the statistics
        $statistics = array();
        $statistics['total'] = 0;
        $statistics['averageOrderValue'] = 0;
        foreach ($orders as $order)
        {
            $statistics['total'] = $statistics['total'] + $order->getTotal();
        }
        $statistics['averageOrderValue'] = number_format($statistics['total'] / sizeof($orders), 2);
        $statistics['total'] = number_format($statistics['total'], 2);

        return $statistics;
    }

    // Get listing pagination
    public function getListingPagination($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo, $maxResults)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Get the number of results
        $listingCount = $this->getListingCount($orderId, $customer, $emailAddress, $status, $paymentType, $deliveryType, $totalFrom, $totalTo, $dateFrom, $dateTo);

        // Check if there is only one page of results
        if ($listingCount <= $maxResults)
        {
            return 1;
        }

        // Calculate the number of pages
        $pagination = ceil($listingCount / $maxResults);

        return $pagination;
    }

    // Get orders
    public function getOrders()
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the query builder
        $qb = $em->createQueryBuilder();

        // Build the query
        $qb->select('o');
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->addOrderBy('o.createdAt', 'DESC');

        $query = $qb->getQuery();

        $orders = $query->getResult();

        return $orders;
    }

    // Get an order
    public function getOrder($id)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Setup the order
        $order = array();

        // Get the order
        $orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($id);
        $orderProducts = $em->getRepository('KAC\SiteBundle\Entity\Order\Product')->findBy(array('order' => $id), array('name' => 'ASC'));
        $orderDiscounts = $em->getRepository('KAC\SiteBundle\Entity\Order\Discount')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        $orderDonations = $em->getRepository('KAC\SiteBundle\Entity\Order\Donation')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        $orderNotes = $em->getRepository('KAC\SiteBundle\Entity\Order\Note')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        if (!$orderObject)
        {
            return false;
        }

        // Setup the order
        $order['orderNumber'] = $orderObject->getId();
        $order['orderDate'] = $orderObject->getCreatedAt();
        $order['status'] = $orderObject->getStatus();
        $order['orderPrinted'] = $orderObject->getOrderPrinted();
        $order['deliveryNoteNotPrinted'] = $orderObject->getDeliveryNotePrinted();
        $order['actioned'] = $orderObject->getActioned();
        $order['notesCount'] = $orderObject->getNotesCount();
        $order['discountsCount'] = $orderObject->getDiscountsCount();
        $order['paymentResponse'] = $orderObject->getPaymentResponse();
        $order['paymentType'] = $orderObject->getPaymentType();
        $order['deliveryType'] = $orderObject->getDeliveryType();
        $order['estimatedDeliveryDaysStart'] = $orderObject->getEstimatedDeliveryDaysStart();
        $order['estimatedDeliveryDaysEnd'] = $orderObject->getEstimatedDeliveryDaysEnd();
        $order['items'] = $orderObject->getItems();
        $order['subTotal'] = $orderObject->getSubTotal();
        $order['deliveryCharge'] = $orderObject->getDeliveryCharge();
        $order['discount'] = $orderObject->getDiscount();
        $order['vat'] = $orderObject->getVat();
        $order['total'] = $orderObject->getTotal();
        $order['possibleDiscount'] = $orderObject->getPossibleDiscount();
        $order['firstName'] = $orderObject->getFirstName();
        $order['lastName'] = $orderObject->getLastName();
        $order['organisationName'] = $orderObject->getOrganisationName();
        $order['emailAddress'] = $orderObject->getEmailAddress();
        $order['telephoneDaytime'] = $orderObject->getTelephoneDaytime();
        $order['telephoneEvening'] = $orderObject->getTelephoneEvening();
        $order['mobile'] = $orderObject->getMobile();
        $order['billingFirstName'] = $orderObject->getBillingFirstName();
        $order['billingLastName'] = $orderObject->getBillingLastName();
        $order['billingOrganisationName'] = $orderObject->getBillingOrganisationName();
        $order['billingAddressLine1'] = $orderObject->getBillingAddressLine1();
        $order['billingAddressLine2'] = $orderObject->getBillingAddressLine2();
        $order['billingTownCity'] = $orderObject->getBillingTownCity();
        $order['billingCountyState'] = $orderObject->getBillingCountyState();
        $order['billingPostZipCode'] = $orderObject->getBillingPostZipCode();
        $order['billingCountryCode'] = $orderObject->getBillingCountryCode();
        $order['deliveryFirstName'] = $orderObject->getDeliveryFirstName();
        $order['deliveryLastName'] = $orderObject->getDeliveryLastName();
        $order['deliveryOrganisationName'] = $orderObject->getDeliveryOrganisationName();
        $order['deliveryAddressLine1'] = $orderObject->getDeliveryAddressLine1();
        $order['deliveryAddressLine2'] = $orderObject->getDeliveryAddressLine2();
        $order['deliveryTownCity'] = $orderObject->getDeliveryTownCity();
        $order['deliveryCountyState'] = $orderObject->getDeliveryCountyState();
        $order['deliveryPostZipCode'] = $orderObject->getDeliveryPostZipCode();
        $order['deliveryCountryCode'] = $orderObject->getDeliveryCountryCode();
        $order['fraudCheckCustomerOrdered'] = $orderObject->getFraudCheckCustomerOrdered();
        $order['fraudCheckAddressMatch'] = $orderObject->getFraudCheckAddressMatch();
        $order['fraudCheckNameUsedOnDifferentOrder'] = $orderObject->getFraudCheckNameUsedOnDifferentOrder();
        $order['fraudCheckPostZipCodeUsedOnDifferentOrder'] = $orderObject->getFraudCheckPostZipCodeUsedOnDifferentOrder();
        $order['fraudCheckTelephoneUsedOnDifferentOrder'] = $orderObject->getFraudCheckTelephoneUsedOnDifferentOrder();

        // Setup the order products
        $products = array();
        foreach ($orderProducts as $orderProductObject)
        {
            $newProduct = array();
            $newProduct['basketItemId'] = $orderProductObject->getBasketItemId();
            $newProduct['productId'] = $orderProductObject->getProduct()->getId();
            if($orderProductObject->getVariant())
            {
                $newProduct['variantId'] = $orderProductObject->getVariant()->getId();
            }
            $newProduct['product'] = $orderProductObject->getProduct();
            $newProduct['url'] = $orderProductObject->getUrl();
            $newProduct['header'] = $orderProductObject->getName();
            $newProduct['productCode'] = $orderProductObject->getProductCode();
            $newProduct['brand'] = $orderProductObject->getBrand();
            $newProduct['shortDescription'] = $orderProductObject->getDescription();
            $newProduct['quantity'] = $orderProductObject->getQuantity();
            $newProduct['unitCost'] = $orderProductObject->getUnitCost();
            $newProduct['recommendedRetailPrice'] = $orderProductObject->getRecommendedRetailPrice();
            $newProduct['discount'] = $orderProductObject->getDiscount();
            $newProduct['savings'] = $orderProductObject->getSavings();
            $newProduct['subTotal'] = $orderProductObject->getVat();
            $newProduct['subTotal'] = $orderProductObject->getSubTotal();
            $newProduct['selectedOptions'] = $orderProductObject->getSelectedOptions();
            $newProduct['selectedOptionLabels'] = explode('|', $orderProductObject->getSelectedOptionLabels());
            $products[] = $newProduct;
        }
        $order['products'] = $products;

        // Setup the order discounts
        $discounts = array();
        foreach ($orderDiscounts as $orderDiscountObject)
        {
            $newDiscount = array();
            $newDiscount['voucherCode'] = $orderDiscountObject->getVoucherCode();
            $newDiscount['giftVoucherCode'] = $orderDiscountObject->getGiftVoucherCode();
            $newDiscount['description'] = $orderDiscountObject->getDescription();
            $newDiscount['discount'] = $orderDiscountObject->getDiscount();
            $discounts[] = $newDiscount;
        }
        $order['discounts'] = $discounts;

        // Setup the order donations
        $donations = array();
        foreach ($orderDonations as $orderDonationObject)
        {
            $newDonation = array();
            $newDonation['description'] = $orderDonationObject->getDescription();
            $newDonation['donation'] = $orderDonationObject->getDonation();
            $donations[] = $newDonation;
        }
        $order['donations'] = $donations;

        // Setup the order notes
        $customerNotes = array();
        $staffNotes = array();
        foreach ($orderNotes as $orderNoteObject)
        {
            $newNote = array();
            $newNote['id'] = $orderNoteObject->getId();
            $newNote['orderId'] = $orderNoteObject->getOrder()->getId();
            $newNote['creator'] = $orderNoteObject->getCreator();
            $newNote['noteType'] = $orderNoteObject->getNoteType();
            $newNote['notified'] = $orderNoteObject->getNotified();
            $newNote['note'] = $orderNoteObject->getNote();
            $newNote['createdAt'] = $orderNoteObject->getCreatedAt();
            if ($newNote['noteType'] == 'customer')
            {
                $customerNotes[] = $newNote;
            } elseif ($newNote['noteType'] == 'staff') {
                $staffNotes[] = $newNote;
            }
        }
        $order['customerNotes'] = $customerNotes;
        $order['staffNotes'] = $staffNotes;

        return $order;
    }

    // Delete an order
    public function deleteOrder($id)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the order details
        $orderObject = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($id);
        $orderProducts = $em->getRepository('KAC\SiteBundle\Entity\Order\Product')->findBy(array('order' => $id), array('name' => 'ASC'));
        $orderDiscounts = $em->getRepository('KAC\SiteBundle\Entity\Order\Discount')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        $orderDonations = $em->getRepository('KAC\SiteBundle\Entity\Order\Donation')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        $orderNotes = $em->getRepository('KAC\SiteBundle\Entity\Order\Note')->findBy(array('order' => $id), array('createdAt' => 'DESC'));
        if (!$orderObject)
        {
            return false;
        }

        // Delete the products
        foreach ($orderProducts as $orderProductObject)
        {
            $em->remove($orderProductObject);
            $em->flush();
        }

        // Delete the discounts
        foreach ($orderDiscounts as $orderDiscountObject)
        {
            $em->remove($orderDiscountObject);
            $em->flush();
        }

        // Delete the donations
        foreach ($orderDonations as $orderDonationObject)
        {
            $em->remove($orderDonationObject);
            $em->flush();
        }

        // Delete the notes
        foreach ($orderNotes as $orderNoteObject)
        {
            $em->remove($orderNoteObject);
            $em->flush();
        }

        // Delete the order
        $em->remove($orderObject);
        $em->flush();


        return true;
    }

    // Get new statistics
    public function getNewStatistics()
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get statistics
        $statistics = array();
        $statistics['count'] = 0;
        $statistics['total'] = 0;
        $statistics['totalNett'] = 0;
        $statistics['averageOrderValue'] = 0;
        $statistics['averageOrderValueNett'] = 0;
        $qb = $em->createQueryBuilder();
        $qb->select('o');
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        $qb->andWhere($qb->expr()->eq('o.status', $qb->expr()->literal('Payment Received')));
        foreach ($qb->getQuery()->getResult() as $order)
        {
            $statistics['count']++;
            $statistics['total'] = $statistics['total'] + $order->getTotal();
        }
        $statistics['totalNett'] = $statistics['total'] / 1.2;
        if ($statistics['count'] > 0)
        {
            $statistics['averageOrderValue'] = $statistics['total'] / $statistics['count'];
            $statistics['averageOrderValueNett'] = $statistics['totalNett'] / $statistics['count'];
        }

        return $statistics;
    }

    // Get statistics
    public function getStatistics($timeFrame)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get statistics
        $statistics = array();
        $statistics['count'] = 0;
        $statistics['total'] = 0;
        $statistics['totalNett'] = 0;
        $statistics['averageOrderValue'] = 0;
        $statistics['averageOrderValueNett'] = 0;
        $statistics['projectedTotal'] = 0;
        $statistics['projectedTotalNett'] = 0;
        $qb = $em->createQueryBuilder();
        $qb->select('o');
        $qb->from('KAC\SiteBundle\Entity\Order', 'o');
        switch ($timeFrame)
        {
            default:
            case 'today':
                $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y-m-d")." 00:00:00")));
                $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y-m-d")." 23:59:59")));
                break;
            case 'week':
                $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y-m-d", strtotime("monday this week"))." 00:00:00")));
                $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y-m-d", strtotime("sunday this week"))." 23:59:59")));
                break;
            case 'month':
                $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y-m-d", strtotime("first day of this month"))." 00:00:00")));
                $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y-m-d", strtotime("last day of this month"))." 23:59:59")));
                break;
            case 'quarter':
                if ((date("n") >= 1) && (date("n") <= 3))
                {
                    $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y")."-01-01 00:00:00")));
                    $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y")."-03-31 23:59:59")));
                    $currentQuarter = 1;
                } else if ((date("n") > 3) && (date("n") <= 6)) {
                    $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y")."-04-01 00:00:00")));
                    $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y")."-06-30 23:59:59")));
                    $currentQuarter = 2;
                } else if ((date("n") > 6) && (date("n") <= 9)) {
                    $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y")."-07-01 00:00:00")));
                    $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y")."-09-30 23:59:59")));
                    $currentQuarter = 3;
                } else {
                    $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y")."-10-01 00:00:00")));
                    $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y")."-12-31 23:59:59")));
                    $currentQuarter = 4;
                }
                break;
            case 'year':
                $qb->andWhere($qb->expr()->gte('o.createdAt', $qb->expr()->literal(date("Y")."-01-01 00:00:00")));
                $qb->andWhere($qb->expr()->lte('o.createdAt', $qb->expr()->literal(date("Y")."-12-31 23:59:59")));
                break;
        }
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Open Payment')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Payment Failed')));
        $qb->andWhere($qb->expr()->neq('o.status', $qb->expr()->literal('Cancelled')));
        $orders = $qb->getQuery()->getResult();
        foreach ($orders as $order)
        {
            $statistics['count']++;
            $statistics['total'] = $statistics['total'] + $order->getTotal();
        }
        $statistics['totalNett'] = $statistics['total'] / 1.2;
        if ($statistics['count'] > 0)
        {
            $statistics['averageOrderValue'] = $statistics['total'] / $statistics['count'];
            $statistics['averageOrderValueNett'] = $statistics['totalNett'] / $statistics['count'];
        }
        switch ($timeFrame)
        {
            default:
            case 'today':
                $statistics['projectedTotal'] = ($statistics['total'] / (date("G") + 1)) * 24;
                break;
            case 'week':
                $statistics['projectedTotal'] = ($statistics['total'] / date("N")) * 7;
                break;
            case 'month':
                $statistics['projectedTotal'] = ($statistics['total'] / date("j")) * date("t");
                break;
            case 'quarter':
                $statistics['projectedTotal'] = ($statistics['total'] / ((date("n") % 3) + 1)) * 3;
                break;
            case 'year':
                $statistics['projectedTotal'] = ($statistics['total'] / date("n")) * 12;
                break;
        }
        $statistics['projectedTotalNett'] = $statistics['projectedTotal'] / 1.2;

        // Get the top brands and products stats
        $topBrandAndProductStatistics = $this->getTopBrandsAndProducts($orders);
        $statistics['topBrandsByQuantity'] = $topBrandAndProductStatistics['topBrandsByQuantity'];
        $statistics['topBrandsByTotal'] = $topBrandAndProductStatistics['topBrandsByTotal'];
        $statistics['topProductsByQuantity'] = $topBrandAndProductStatistics['topProductsByQuantity'];
        $statistics['topProductsByTotal'] = $topBrandAndProductStatistics['topProductsByTotal'];

        return $statistics;
    }

    // Sort the brands by quantity
    public function getTopBrandsAndProducts($orders)
    {
        // Get the services
        $doctrineService = $this->container->get('doctrine');

        // Get the entity manager
        $em = $doctrineService->getManager();

        // Get the statistics
        $brands = array();
        $products = array();
        $statistics = array();
        $statistics['topBrandsByQuantity'] = array();
        $statistics['topBrandsByTotal'] = array();
        $statistics['topProductsByQuantity'] = array();
        $statistics['topProductsByTotal'] = array();

        // Get the brands and products
        foreach ($orders as $order)
        {
            $orderProductObjects = $em->getRepository('KAC\SiteBundle\Entity\Order\Product')->findBy(array('order' => $order->getId()));
            foreach ($orderProductObjects as $orderProductObject)
            {
                if ($orderProductObject)
                {
                    // Get the brands
                    if (!isset($brands[$orderProductObject->getBrand()]))
                    {
                        $brands[$orderProductObject->getBrand()] = array();
                        $brands[$orderProductObject->getBrand()]['brand'] = $orderProductObject->getBrand();
                        $brands[$orderProductObject->getBrand()]['quantity'] = $orderProductObject->getQuantity();
                        $brands[$orderProductObject->getBrand()]['total'] = $orderProductObject->getSubTotal();
                    } else {
                        $brands[$orderProductObject->getBrand()]['quantity'] += $orderProductObject->getQuantity();
                        $brands[$orderProductObject->getBrand()]['total'] += $orderProductObject->getSubTotal();
                    }

                    // Get the products
                    if (!isset($products[$orderProductObject->getProduct()->getId()]))
                    {
                        $products[$orderProductObject->getProduct()->getId()] = array();
                        $products[$orderProductObject->getProduct()->getId()]['product'] = $orderProductObject->getName();
                        $products[$orderProductObject->getProduct()->getId()]['quantity'] = $orderProductObject->getQuantity();
                        $products[$orderProductObject->getProduct()->getId()]['total'] = $orderProductObject->getSubTotal();
                    } else {
                        $products[$orderProductObject->getProduct()->getId()]['quantity'] += $orderProductObject->getQuantity();
                        $products[$orderProductObject->getProduct()->getId()]['total'] += $orderProductObject->getSubTotal();
                    }
                }
            }
        }

        // Get the top brands by quantity
        $count = 0;
        usort($brands, array($this, "sortBrandsByQuantity"));
        foreach ($brands as $brand)
        {
            $count++;
            if ($count > 5)
            {
                break;
            }
            $statistics['topBrandsByQuantity'][$count] = $brand;
        }

        // Get the top brands by quantity
        $count = 0;
        usort($brands, array($this, "sortBrandsByTotal"));
        foreach ($brands as $brand)
        {
            $count++;
            if ($count > 5)
            {
                break;
            }
            $statistics['topBrandsByTotal'][$count] = $brand;
        }

        // Get the top products by quantity
        $count = 0;
        usort($products, array($this, "sortProductsByQuantity"));
        foreach ($products as $product)
        {
            $count++;
            if ($count > 5)
            {
                break;
            }
            $statistics['topProductsByQuantity'][$count] = $product;
        }

        // Get the top products by quantity
        $count = 0;
        usort($products, array($this, "sortProductsByTotal"));
        foreach ($products as $product)
        {
            $count++;
            if ($count > 5)
            {
                break;
            }
            $statistics['topProductsByTotal'][$count] = $product;
        }

        return $statistics;
    }

    // Sort the brands by quantity
    static function sortBrandsByQuantity($a, $b)
    {
        return $a['quantity']<$b['quantity'];
    }

    // Sort the brands by total
    static function sortBrandsByTotal($a, $b)
    {
        return $a['total']<$b['total'];
    }

    // Sort the products by quantity
    static function sortProductsByQuantity($a, $b)
    {
        return $a['quantity']<$b['quantity'];
    }

    // Sort the products by total
    static function sortProductsByTotal($a, $b)
    {
        return $a['total']<$b['total'];
    }

    // Get the root upload directory
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    // Get the upload directory
    public function getUploadDir()
    {
        return 'uploads/documents/order';
    }
}