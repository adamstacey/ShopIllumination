<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Palletways extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'Palletways';
    }

    function process(Order $order, &$data, ContainerInterface $container)
    {
        // Check a service has been selected
//        if ($itemDeliveryService != '')
//        {
//            // Add the new note
//            if ($itemDeliveryService == 'Arranged')
//            {
//                $htmlNote = "Your item has been dispatched for delivery with Palletways.\n\n";
//                $htmlNote .= "Palletways will call you <strong>1 hour</strong> before delivery.";
//                if ($itemDeliveryDateFrom && $itemDeliveryDateTo)
//                {
//                    $htmlNote .= "\n\nYour delivery has been arranged for between <strong>".$itemDeliveryDateFrom."</strong> and <strong>".$itemDeliveryDateTo."</strong>.";
//                }
//                $plainTextNote = "Your item has been dispatched for delivery with Palletways.\n\n";
//                $plainTextNote .= "Palletways will call you <strong>1 hour</strong> before delivery.";
//                if ($itemDeliveryDateFrom && $itemDeliveryDateTo)
//                {
//                    $plainTextNote .= "\n\nYour delivery has been arranged for between ".$itemDeliveryDateFrom." and ".$itemDeliveryDateTo.".";
//                }
//            } else {
        $htmlNote = "Your item has been dispatched for delivery with Palletways.\n\n";
        $htmlNote .= "Palletways will call you within <strong>24-48 hours</strong> to arrange delivery delivery.";
        $plainTextNote = "Your item has been dispatched for delivery with Palletways.\n\n";
        $plainTextNote .= "Palletways will call you within <strong>24-48 hours</strong> to arrange delivery delivery.";
//            }

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

        // Update the order status
        $order->setStatus('Order Completed');
        $order->setLabelsPrinted(1);
    }
}