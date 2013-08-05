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
use Symfony\Component\HttpFoundation\Request;

class BuildGoogleProductFeedCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:build:googlefeed')
            ->setDescription('Build the google product feed')
            ->addArgument('host', InputArgument::REQUIRED, 'The host to be used for the URLs')
            ->addArgument('filename', InputArgument::OPTIONAL, 'The file to be written to. Path should be relative to the document root', 'web/google-products.xml')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get filename
        $filename = $this->getContainer()->get('kernel')->getRootDir() . '/../' . $input->getArgument('filename');

        $this->getContainer()->enterScope('request');
        $this->getContainer()->set('request', new Request(), 'request');

        /**
         * @var $em EntityManager
         * @var $product Product
         * @var $variant Variant
         */
        $em = $this->getContainer()->get('doctrine')->getManager();
        $router = $this->getContainer()->get('router');
        $router->getContext()->setHost($input->getArgument('host'));

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
        $xmlWriter->writeCdata($router->generate('homepage', array(), true));
        $xmlWriter->endElement();

        $xmlWriter->startElement('description');
        $xmlWriter->writeCdata('Kitchen Appliance Centre - A wide selection of kitchen appliances including Kitchen Sinks, Range Cookers, Fridges, Freezers, Dishwashers, Washing Machines, Worktops, Ovens and Hobs, all at low affordable prices.');
        $xmlWriter->endElement();

        // Add items
        $xmlWriter->startElement('items');

        // Get the products
        $result = $em->createQuery("SELECT p FROM KAC\\SiteBundle\\Entity\Product p WHERE p.status = 'a'")->iterate();
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
                $xmlWriter->writeCdata($router->generate('routing', array(
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
                if($product->getImage())
                {
                    $xmlWriter->writeElement('g:image_link', $this->getContainer()->get('templating.helper.assets')->getUrl($product->getImage()->getPublicPath()));
                }

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

                // Adword labels
                // Delivery
                switch ($variant->getDeliveryBand())
                {
                    case 1:
                        $xmlWriter->writeElement('g:adwords_labels', 'small package');
                        break;
                    case 2:
                        $xmlWriter->writeElement('g:adwords_labels', 'medium package');
                        break;
                    case 3:
                    case 4:
                        $xmlWriter->writeElement('g:adwords_labels', 'large package');
                        break;
                    case 5:
                    case 6:
                        $xmlWriter->writeElement('g:adwords_labels', 'extra large package');
                        break;
                }

                if($variant->getDeliveryCost() == 0)
                {
                    $xmlWriter->writeElement('g:adwords_labels', 'free delivery');
                }

                // Departments
                foreach(array_slice($product->getDepartments()->toArray(), 0, 4) as $department)
                {
                    $xmlWriter->writeElement('g:adwords_labels', strtolower($department->getDepartment()->getDescription()->getHeader()));
                }

                // Features
                foreach (array_slice($variant->getFeatures()->toArray(), 0, 4) as $feature)
                {
                    if($feature->getFeatureGroup() !== null && $feature->getFeature() !== null && is_object($feature->getFeatureGroup()) && is_object($feature->getFeature()))
                    {
                        $xmlWriter->writeElement('g:adwords_labels', strtolower($feature->getFeatureGroup()->getName() . ' ' . $feature->getFeature()->getName()));
                    }
                }

                // Price
                if ($variant->getPrice()->getListPrice() > 0 && $variant->getPrice()->getListPrice() <= 50)
                {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 1-50');
                } elseif ($variant->getPrice()->getListPrice() > 50 && $variant->getPrice()->getListPrice() <= 100) {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 51-100');
                } elseif ($variant->getPrice()->getListPrice() > 100 && $variant->getPrice()->getListPrice() <= 200) {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 101-200');
                } elseif ($variant->getPrice()->getListPrice() > 200 && $variant->getPrice()->getListPrice() <= 500) {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 201-500');
                } elseif ($variant->getPrice()->getListPrice() > 500 && $variant->getPrice()->getListPrice() <= 1000) {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 501-1000');
                } elseif ($variant->getPrice()->getListPrice() > 1000) {
                    $xmlWriter->writeElement('g:adwords_labels', 'price 1000+');
                }
                if ($variant->getPrice()->getRecommendedRetailPrice() > $variant->getPrice()->getListPrice())
                {
                    $xmlWriter->writeElement('g:adwords_labels', 'special offer');
                }

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