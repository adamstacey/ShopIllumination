<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Ghd extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'GHD Transport';
    }

    function process(Order $order, &$data, ContainerInterface $container)
    {
        $htmlNote = "GHD Rob Dexter will be contacting you with your delivery date soon.\n\n";
        $htmlNote .= "For Delivery Enquiries Tel: 0115 930 9337 (GHD Rob Dexter).\n\n";
        $htmlNote .= "Please check all items before signing. Thank you.";
        $plainTextNote = "GHD Rob Dexter will be contacting you with your delivery date soon.\n\n";
        $plainTextNote .= "For Delivery Enquiries Tel: 0115 930 9337 (GHD Rob Dexter).\n\n";
        $plainTextNote .= "Please check all items before signing. Thank you.";

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