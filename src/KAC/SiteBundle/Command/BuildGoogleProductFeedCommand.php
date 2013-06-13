<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BuildGoogleProductFeedCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:build:googlefeed')
            ->setDescription('Build the google product feed')
            ->addArgument('filename', InputArgument::OPTIONAL, 'The file to be written to. Path should be relative to the document root', 'web/google-products.xml')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get filename
        $filename = $this->getContainer()->get('kernel')->getRootDir() . '/../' . $input->getArgument('filename');

        /**
         * @var $em EntityManager
         * @var $product Product
         * @var $variant Variant
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Clear file
        file_put_contents($filename, '');

        // Create XML writer
        $xmlWriter = new \XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startDocument('1.0', 'UTF-8');

        $batchSize = 20;
        $i = 0;

        $xmlWriter->startElement('rss');
        $xmlWriter->writeAttribute('xmlns:g', 'http://base.google.com/ns/1.0');
        $xmlWriter->writeAttribute('version', '2.0');

        $xmlWriter->startElement('channel');

        // Add shop info to feed
        $xmlWriter->startElement('title');
        $xmlWriter->writeCdata('Worktops, Charcoal Filters, Cooker Hoods, Built-in Microwaves, Integrated Dishwashers, Integrated Washing Machines, Refrigeration, Cleaning Products, Glass Splashbacks, Waste Disposer, Sinks, Taps, Plinth Heaters, Range Cookers, Ducting, Hobs, Ovens, Coffee Machines, Solid Surface Worktops, Kitchen Appliances');
        $xmlWriter->endElement();

        $xmlWriter->startElement('link');
        $xmlWriter->writeCdata($this->getContainer()->get('router')->generate('homepage', array(), true));
        $xmlWriter->endElement();

        $xmlWriter->startElement('description');
        $xmlWriter->writeCdata('Kitchen Appliance Centre - A wide selection of kitchen appliances including Kitchen Sinks, Range Cookers, Fridges, Freezers, Dishwashers, Washing Machines, Worktops, Ovens and Hobs, all at low affordable prices.');
        $xmlWriter->endElement();

        // Add items
        $xmlWriter->startElement('items');

        // Get the products
        $result = $em->createQuery("SELECT p FROM KAC\\SiteBundle\\Entity\Product p")->iterate();
        while (($row = $result->next()) !== false) {
            $product = $row[0];

            // Write each variant
            foreach($product->getVariants() as $variant)
            {
                if(!$product->getDescription() || !$variant->getDescription() || !$product->getDepartment())
                {
                    break;
                }

                // Build item
                $xmlWriter->startElement('item');

                $xmlWriter->startElement('title');
                $xmlWriter->writeCdata($variant->getDescription()->getPageTitle());
                $xmlWriter->endElement();
                $xmlWriter->startElement('link');
                $xmlWriter->writeCdata($this->getContainer()->get('router')->generate('routing', array(
                    'url' => $variant->getUrl() ? $variant->getUrl() : $product->getUrl(),
                ), true));
                $xmlWriter->endElement();
                $xmlWriter->startElement('description');
                $xmlWriter->writeCdata(
                    $variant->getDescription()->getHeader() . ' ' .
                    str_replace('|', ', ', str_replace(', ^, ', ', ', $product->getDepartment()->getDepartment()->getDepartmentPath())) . ' ' .
                    $variant->getProductCode() . ' ' .
                    $variant->getDescription()->getMetaDescription()
                );
                $xmlWriter->endElement();
                $xmlWriter->writeElement('g:id', $variant->getId());
                $xmlWriter->writeElement('g:condition', 'new');
                $xmlWriter->writeElement('g:price', number_format($variant->getPrice()->getListPrice(), 2));
                $xmlWriter->writeElement('g:availability', 'in stock');
                $xmlWriter->startElement('g:shipping');
                $xmlWriter->writeElement('g:country', 'GB');
                $xmlWriter->writeElement('g:service', 'Standard Delivery');
                $xmlWriter->writeElement('g:price', number_format($variant->getDeliveryCost(), 2));
                $xmlWriter->endElement();
                $xmlWriter->writeElement('g:shipping_weight', $variant->getWeight());
                $xmlWriter->writeElement('g:mpn', $variant->getProductCode());
                $xmlWriter->writeElement('g:brand', $product->getBrand()->getDescription()->getName());
                $xmlWriter->writeElement('g:google_product_category', $product->getDepartment()->getDepartment()->getDescription()->getGoogleDepartment()->getName());
                $xmlWriter->writeElement('g:product_type', $product->getDepartment()->getDepartment()->getDescription()->getName());

                $xmlWriter->endElement();
            }

            if (($i % $batchSize) === 0) {
                file_put_contents($filename, $xmlWriter->flush(true), FILE_APPEND);
            }

            $em->detach($row[0]);
            ++$i;
        }

        $xmlWriter->endElement(); // Close items

        $xmlWriter->endElement(); // Close channel
        $xmlWriter->endElement(); // Close rss

        file_put_contents($filename, $xmlWriter->flush(true), FILE_APPEND);
    }
}