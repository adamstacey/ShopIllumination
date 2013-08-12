<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Parcelforce extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Parcelforce';
    }

    function process(Order $order, &$data, ContainerInterface $container)
    {
        // Add the new note
        $htmlNote = "Your item has been dispatched for signed delivery with Parcelforce. Your consignment number is ".$order->getTrackingNumber().".\n\n";
        $htmlNote .= "<a href=\"http://www.parcelforce.com/track-trace?trackNumber=".$order->getTrackingNumber()."\">Click here to track your delivery.</a>\n\n";
        $htmlNote .= "Tracking will be active after 5.30pm today.";
        $plainTextNote = "Your item has been dispatched for signed delivery with Parcelforce. Your consignment number is ".$order->getTrackingNumber().".\n\n";
        $plainTextNote .= "Go to http://www.parcelforce.com/track-trace?trackNumber=".$order->getTrackingNumber()." to track your delivery.";
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
    }
}