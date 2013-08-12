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

    public static function processTracking(&$data, ContainerInterface $container)
    {
        $em = $container->get('doctrine')->getManager();

        $royalMailTrackingFileName = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/exports/royal-mail/Result.txt';
        $renamedRoyalMailTrackingFileName = '/var/www/kitchenappliancecentre.co.uk/current/web/uploads/exports/royal-mail/export-'.date("dmYHis").'.txt';
        if (file_exists($royalMailTrackingFileName))
        {
            $fileHandle = fopen($royalMailTrackingFileName, "r");
            $trackingFileContents = fread($fileHandle, filesize($royalMailTrackingFileName));
            $lineCount = 1;
            $trackingNumbers = array();
            $errors = '';
            $statusCode = 0;
            foreach (explode("\n", $trackingFileContents) as $line)
            {
                if ($lineCount == 1)
                {
                    $statusCode = intval($line);
                }
                if ($lineCount == 2)
                {
                    if ($statusCode > 0)
                    {
                        $trackingNumbers[] = 'ERROR';
                        if ($statusCode == 99)
                        {
                            $lineCount = 0;
                            $statusCode = 0;
                        }
                    } else {
                        $trackingNumbers[] = $line;
                    }
                }
                if ($lineCount == 3)
                {
                    $lineCount = 0;
                    $statusCode = 0;
                }
                $lineCount++;
            }
            fclose($fileHandle);

            $trackingNumberCount = 1;
            foreach ($trackingNumbers as $trackingNumber)
            {
                // Get the item
                $order = $em->getRepository('KAC\SiteBundle\Entity\Order')->findOneBy(array('royalMailImportLine' => $trackingNumberCount));
                if ($order)
                {
                    // Make sure there is no tracking number already set
                    if ($trackingNumber == 'ERROR')
                    {
                        // Send an email
                        try
                        {
                            $email = \Swift_Message::newInstance();
                            $email->setSubject('An error occurred when importing the tracking information for order '.$order->getId().'.');
                            $email->setFrom(array('support@kitchenappliancecentre.co.uk' => 'Kitchen Appliance Centre'));
                            $email->setTo(array('me@adamstacey.co.uk' => 'Adam Stacey'));
                            $email->setBody('An error occurred when importing the tracking information for order '.$order->getId().'.');
                            $container->get('mailer')->send($email);

                            // Set the review as requested
                            $order->setReviewRequested(1);
                            $em->persist($order);
                            $em->flush();
                        } catch (\Exception $exception) {
                            error_log('Error sending email!');
                        }
                    } elseif (($order->getTrackingNumber() == '') || ($order->getTrackingNumber() != $trackingNumber)) {
                        // Update the tracking number
                        $order->setTrackingNumber($trackingNumber);
                        $order->setRoyalMailImportLine(0);
                        $order->setStatus('Order Completed');
                        $em->persist($order);
                        $em->flush();

                        $htmlNote = "Your item has been dispatched for recorded delivery with Royal Mail. Your consignment number is ".$trackingNumber.".\n\n";
                        $htmlNote .= "<a href=\"http://track2.royalmail.com/portal/rm/track?trackNumber=".$trackingNumber."\">Click here to track your delivery.</a>";
                        $plainTextNote = "Your item has been dispatched for recorded delivery with Royal Mail. Your consignment number is ".$trackingNumber.".\n\n";
                        $plainTextNote .= "Go to http://track2.royalmail.com/portal/rm/track?trackNumber=".$trackingNumber." to track your delivery.";

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
                            $email->setBody($container->get('templating')->render('KACSiteBundle:Order\Email:message.html.twig', array('order' => $order, 'note' => $htmlNote)), 'text/html');
                            $email->addPart($container->get('templating')->render('KACSiteBundle:Order\Email:message.txt.twig', array('order' => $order, 'note' => $plainTextNote)), 'text/plain');
                            $container->get('mailer')->send($email);

                            // Set the review as requested
                            $order->setReviewRequested(1);
                        } catch (\Exception $exception) {
                            error_log('Error sending email!');
                        }

                        // Update the order status
                        $order->setStatus('Order Completed');
                        $order->setLabelsPrinted(1);
                        $em->persist($order);
                        $em->flush();

                        $data['ordersUpdated']++;
                    }
                }
                $trackingNumberCount++;
            }

            // Rename the tracking import file
            rename($royalMailTrackingFileName, $renamedRoyalMailTrackingFileName);
        }
    }
}