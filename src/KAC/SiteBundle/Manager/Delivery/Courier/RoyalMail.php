<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RoyalMail extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Royal Mail';
    }

    function process(Order $order, &$data, ContainerInterface $container)
    {
        // TO DO: Move this, so the post code is cleaned at entry
        // Tidy up the post code
        $postCode = strtoupper($order->getDeliveryPostZipCode());
        if (strpos($postCode, ' ') === false)
        {
            if (strlen($postCode) == 6)
            {
                $postCode = substr($postCode, 0, 3).' '.substr($postCode, 3, 3);
            } elseif (strlen($postCode) == 7) {
                $postCode = substr($postCode, 0, 4).' '.substr($postCode, 4, 3);
            }
        }

        // Service Reference
        $data['royalMailImportFile'] .= 'SR1|';
        // Service
        $data['royalMailImportFile'] .= 'STANDARD|';
        // Service Enhancement
        $data['royalMailImportFile'] .= '|';
        // Service Format
        $data['royalMailImportFile'] .= 'N|';
        // Service Class
        $data['royalMailImportFile'] .= 'T|';
        // Recipient
        $data['royalMailImportFile'] .= strtoupper($order->getDeliveryFirstName().' '.$order->getDeliveryLastName()).'|';
        // Recipient Complementary Name
        $data['royalMailImportFile'] .= '|';
        if ($order->getDeliveryOrganisationName() != '')
        {
            // Recipient Address Line 1
            $data['royalMailImportFile'] .= ($order->getDeliveryOrganisationName()?strtoupper($order->getDeliveryOrganisationName()):'').'|';
            // Recipient Address Line 2
            $data['royalMailImportFile'] .= ($order->getDeliveryAddressLine1()?strtoupper($order->getDeliveryAddressLine1()):'').'|';
            // Recipient Address Line 3
            $data['royalMailImportFile'] .= ($order->getDeliveryAddressLine2()?strtoupper($order->getDeliveryAddressLine2()):'').'|';
            // Recipient Postcode
            $data['royalMailImportFile'] .= ($postCode?$postCode:'').'|';
            // Recipient Post Town
            $data['royalMailImportFile'] .= ($order->getDeliveryTownCity()?strtoupper($order->getDeliveryTownCity()):'').'|';
            // Recipient Country Code
            $data['royalMailImportFile'] .= ($order->getDeliveryCountryCode()?strtoupper($order->getDeliveryCountryCode()):'GB').'|';
        } else {
            // Recipient Address Line 1
            $data['royalMailImportFile'] .= ($order->getDeliveryAddressLine1()?strtoupper($order->getDeliveryAddressLine1()):'').'|';
            // Recipient Address Line 2
            $data['royalMailImportFile'] .= ($order->getDeliveryAddressLine2()?strtoupper($order->getDeliveryAddressLine2()):'').'|';
            // Recipient Address Line 3
            $data['royalMailImportFile'] .= '|';
            // Recipient Postcode
            $data['royalMailImportFile'] .= ($postCode?$postCode:'').'|';
            // Recipient Post Town
            $data['royalMailImportFile'] .= ($order->getDeliveryTownCity()?strtoupper($order->getDeliveryTownCity()):'').'|';
            // Recipient Country Code
            $data['royalMailImportFile'] .= ($order->getDeliveryCountryCode()?strtoupper($order->getDeliveryCountryCode()):'GB').'|';
        }
        // Recipient Zone Code
        $data['royalMailImportFile'] .= '|';
        // Recipient Contact Name
        $data['royalMailImportFile'] .= strtoupper($order->getDeliveryFirstName().' '.$order->getDeliveryLastName()).'|';
        // Recipient Tel #
        $data['royalMailImportFile'] .= ($order->getMobile()?str_replace(array(' ', '-'), '', $order->getMobile()):'').'|';
        // Recipient Email Address
        $data['royalMailImportFile'] .= ($order->getEmailAddress()?strtolower($order->getEmailAddress()):'').'|';
        // Shipping Date
        $data['royalMailImportFile'] .= date("dmY").'|';
        // Reference
        $data['royalMailImportFile'] .= $order->getId().'|';
        // Items
        $data['royalMailImportFile'] .= '1|';
        // Weight (kgs)
        $data['royalMailImportFile'] .= '1.0|';
        // Nature of goods
        $data['royalMailImportFile'] .= '|';
        // Safe Place
        $data['royalMailImportFile'] .= '|';
        // Signature
        $data['royalMailImportFile'] .= '';
        $data['royalMailImportFile'] .= "\n";
        $data['royalMailLabels']++;

        // Update the order status
        $order->setStatus('Order with Delivery Company');
        $order->setRoyalMailImportLine($data['royalMailImportLine']);
        $order->setLabelsPrinted(1);
    }
}