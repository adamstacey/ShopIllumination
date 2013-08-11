<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Dpd extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'DPD';
    }

    function process(Order $order, &$data, ContainerInterface $container)
    {
        // Account
        $data['dpdImportFile'] .= '"'.$order->getId().'"|';
        // AddressCode
        $data['dpdImportFile'] .= '0|';
        // Name
        $data['dpdImportFile'] .= '"'.strtoupper($order->getDeliveryLastName()).'"|';
        if ($order->getDeliveryOrganisationName() != '')
        {
            // Company
            $data['dpdImportFile'] .= '"'.($order->getDeliveryOrganisationName()?strtoupper($order->getDeliveryOrganisationName()):' ').'"|';
            // Address 1
            $data['dpdImportFile'] .= '"'.($order->getDeliveryAddressLine1()?strtoupper($order->getDeliveryAddressLine1()):' ').'"|';
            // Address 2
            $data['dpdImportFile'] .= '"'.($order->getDeliveryAddressLine2()?strtoupper($order->getDeliveryAddressLine2()):' ').'"|';
            // Town
            $data['dpdImportFile'] .= '"'.($order->getDeliveryCountyState()?strtoupper($order->getDeliveryCountyState()):' ').'"|';
            // PostCode
            $data['dpdImportFile'] .= '"'.($order->getDeliveryPostZipCode()?str_replace(' ', '', strtoupper($order->getDeliveryPostZipCode())):' ').'"|';
        } else {
            // Address 1
            $data['dpdImportFile'] .= '"'.($order->getDeliveryAddressLine1()?strtoupper($order->getDeliveryAddressLine1()):' ').'"|';
            // Address 2
            $data['dpdImportFile'] .= '"'.($order->getDeliveryAddressLine2()?strtoupper($order->getDeliveryAddressLine2()):' ').'"|';
            // Town
            $data['dpdImportFile'] .= '"'.($order->getDeliveryTownCity()?strtoupper($order->getDeliveryTownCity()):' ').'"|';
            // County
            $data['dpdImportFile'] .= '"'.($order->getDeliveryCountyState()?strtoupper($order->getDeliveryCountyState()):' ').'"|';
            // PostCode
            $data['dpdImportFile'] .= '"'.($order->getDeliveryPostZipCode()?str_replace(' ', '', strtoupper($order->getDeliveryPostZipCode())):' ').'"|';
        }
        // Service
        $data['dpdImportFile'] .= '12|';
        // Qty of Labels
        $data['dpdImportFile'] .= '"'.($order->getNumberOfPackages() > 0?$order->getNumberOfPackages():'1').'"|';
        // Contact
        $data['dpdImportFile'] .= '" "|';
        // Telephone
        $data['dpdImportFile'] .= '"'.($order->getTelephoneDaytime()?str_replace(array(' ', '-'), '', $order->getTelephoneDaytime()):' ').'"|';
        // Email
        $data['dpdImportFile'] .= '" "|';
        // Email2
        $data['dpdImportFile'] .= '"'.($order->getMobile()?str_replace(array(' ', '-'), '', $order->getMobile()):' ').'"|';
        $data['dpdImportFile'] .= '"FRAGILE HANDLE WITH CARE"';
        $data['dpdImportFile'] .= "\n";
        $data['dpdLabels']++;

        // Update the order status
        $order->setStatus('Order with Delivery Company');
        $order->setLabelsPrinted(1);
    }
}