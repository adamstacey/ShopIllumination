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

    public function processTracking(&$data, ContainerInterface $container)
    {
        $em = $container->get('doctrine')->getManager();

        $dpdTrackingFileName = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/exports/dpd/EXPORT.TXT';
        $renamedDpdTrackingFileName = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/exports/dpd/export-'.date("dmYHis").'.txt';
        if (file_exists($dpdTrackingFileName))
        {
            $fileHandle = fopen($dpdTrackingFileName, "r");
            $trackingFileContents = fread($fileHandle, filesize($dpdTrackingFileName));
            foreach (explode("\n", $trackingFileContents) as $line)
            {
                $orderInfo = explode(",", $line);
                if (sizeof($orderInfo) > 1)
                {
                    $orderId = $orderInfo[3];

                    // Get the item
                    $order = $em->getRepository('KAC\SiteBundle\Entity\Order')->find($orderId);
                    if ($order)
                    {
                        // Get the new tracking number
                        $trackingNumber = $orderInfo[0].$orderInfo[1];

                        // Make sure there is no tracking number already set
                        if (($order->getTrackingNumber() == '') || ($order->getTrackingNumber() != $trackingNumber))
                        {
                            // Update the tracking number
                            $order->setTrackingNumber($trackingNumber);
                            $order->setStatus('Order Completed');
                            $em->persist($order);
                            $em->flush();

                            // Add the new note
                            $htmlNote = "Your item has been dispatched for signed delivery with DPD. Your consignment number is ".$trackingNumber.".\n\n";
                            $htmlNote .= "<a href=\"http://www.dpd.co.uk/service/tracking?parcel=".$trackingNumber."\">Click here to track your delivery.<a>\n\n";
                            $htmlNote .= "Tracking will be active after 5.30pm today.";
                            $plainTextNote = "Your item has been dispatched for signed delivery with DPD. Your consignment number is ".$trackingNumber.".\n\n";
                            $plainTextNote .= "Go to http://www.dpd.co.uk/service/tracking?parcel=".$trackingNumber." to track your delivery.\n\n";
                            $plainTextNote .= "Tracking will be active after 5.30pm today.";

                            $orderNote = new Order\Note();
                            $orderNote->setNoteType('customer');
                            $orderNote->setNotified(1);
                            $orderNote->setNote($plainTextNote);
                            $orderNote->setCreator('Admin');
                            $order->addNote($orderNote);

                            // Send the email
                            try
                            {
                                $email = \Swift_Message::newInstance();
                                $email->setSubject('You have a new Message from Kitchen Appliance Centre about your Order: '.$order->getId());
                                $email->setFrom(array('sales@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
                                $email->setTo(array($order->getEmailAddress() => $order->getFirstName().' '.$order->getLastName()));
                                if ($order->getSendReviewRequest() > 0)
                                {
                                    $email->setBcc(array('0cbe3042@trustpilotservice.com'));
                                }
                                $email->setBody($this->renderView('KACSiteBundle:Order\Email:message.html.twig', array('order' => $order, 'note' => $htmlNote)), 'text/html');
                                $email->addPart($this->renderView('KACSiteBundle:Order\Email:message.txt.twig', array('order' => $order, 'note' => $plainTextNote)), 'text/plain');
                                $container->get('mailer')->send($email);

                                // Set the review as requested
                                $order->setReviewRequested(1);
                            } catch (\Exception $exception) {
                                error_log('Error sending email!');
                            }

                            $data['ordersUpdated']++;
                        }
                    }
                }
            }

            // Rename the tracking import file
            rename($dpdTrackingFileName, $renamedDpdTrackingFileName);
            fclose($fileHandle);
        }
    }
}