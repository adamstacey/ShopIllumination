<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class GenerateDocsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:generate:docs')
            ->addArgument('start', InputArgument::OPTIONAL, '');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         * @var $order Order
         */
        $em = $this->getContainer()->get('doctrine')->getManager();        // Get the services
        $systemService = $this->getContainer()->get('web_illumination_admin.system_service');
        $orderService = $this->getContainer()->get('web_illumination_admin.order_service');
        $pdfUrl = $this->getContainer()->getParameter('cdn_host');

        // Load orders
        $query = $em->createQuery("SELECT o FROM KAC\\SiteBundle\\Entity\\Order o");
        if($input->getArgument('start') && $input->getArgument('start') > 0)
        {
            $query->setFirstResult($input->getArgument('start'));
        }

        $iterableResult = $query->iterate();

        $i=0;
        try {
            while (($row = $iterableResult->next()) !== false) {
                $order = $row[0];

                // Create the PDF documents
                $orderDocument = $orderService->getUploadRootDir().'/order-'.$order->getId().'.pdf';
                $copyOrderDocument = $orderService->getUploadRootDir().'/copy-order-'.$order->getId().'.pdf';
                $invoiceDocument = $orderService->getUploadRootDir().'/invoice-'.$order->getId().'.pdf';
                $deliveryNoteDocument = $orderService->getUploadRootDir().'/delivery-note-'.$order->getId().'.pdf';

                if(!file_exists($orderDocument))
                {
                    $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf '.$pdfUrl.'/admin/orders/viewOrder/'.$order->getId().' '.$orderDocument.' 2>&1');
                    $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf '.$pdfUrl.'/admin/orders/viewInvoice/'.$order->getId().' '.$invoiceDocument.' 2>&1');
                    $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf '.$pdfUrl.'/admin/orders/viewCopyOrder/'.$order->getId().' '.$copyOrderDocument.' 2>&1');
                    $systemService->pipeExec('xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf '.$pdfUrl.'/admin/orders/viewDeliveryNote/'.$order->getId().' '.$deliveryNoteDocument.' 2>&1');
                }

                $em->detach($row[0]);
                $output->writeln($i);
                $i++;
            }
        } catch (\Exception $e) {
            $output->writeln("An error occurred");
        }

        $output->writeln('Finished!');
    }
}