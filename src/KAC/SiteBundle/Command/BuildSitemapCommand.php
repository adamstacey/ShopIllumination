<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BuildSitemapCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:build:sitemap')
            ->setDescription('Build the sitemap')
            ->addArgument('host', InputArgument::REQUIRED, 'The host to be used for the URLs')
            ->addArgument('filename', InputArgument::OPTIONAL, 'The file to be written to. Path should be relative to the document root', 'web/sitemap.xml')
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

        $xmlWriter->startElement('urlset');
        $xmlWriter->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        // Add all dynamic routes
        $routeManager = $this->getContainer()->get('kac_site.manager.routing');
        $result = $em->createQuery("SELECT r FROM KAC\\SiteBundle\\Entity\Routing r")->iterate();
        while (($row = $result->next()) !== false) {
            $route = $row[0];

            // Fetch the relevant object
            try {
                $object = $routeManager->getObject($route);

                $lastmodd = $object->getUpdatedAt()->format('Y-m-d');

                // Calculate priority
                if (get_class($route) === 'KAC\\SiteBundle\\Entity\\Brand\\Routing' ||
                    get_class($route) === 'KAC\\SiteBundle\\Entity\\Product\\Routing' ||
                    get_class($route) === 'KAC\\SiteBundle\\Entity\\Product\\Variant\\Routing')
                {
                    $priority = '1.0';
                } else {
                    $priority = '0.8';
                }
            } catch (\Exception $e) {
//                var_dump($e);die();
//                break;
            }

            // Build url
            $xmlWriter->startElement('url');
            $xmlWriter->writeElement('loc', $router->generate('routing', array(
                'url' => $route->getUrl(),
            ), true));
            $xmlWriter->writeElement('lastmod', $lastmodd);
            $xmlWriter->writeElement('changefreq', 'weekly');
            $xmlWriter->writeElement('priority', $priority);
            $xmlWriter->endElement();

            if (($i % $batchSize) === 0) {
//                file_put_contents($filename, $xmlWriter->flush(true), FILE_APPEND);
            }

            $em->detach($row[0]);
            ++$i;
        }

        // Add misc urls
        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_the_shop', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_contact_us', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_how_to_find_us', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_returns', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_installation_guides', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_water_pressure_information', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_privacy_policy', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_terms_and_conditions', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_delivery', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_security', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', $router->generate('content_fraud_prevention', array(), true));
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();

        $xmlWriter->startElement('url');
        $xmlWriter->writeElement('loc', 'http://' . $input->getArgument('host') . '/blog/');
        $xmlWriter->writeElement('lastmod', '2012-05-01');
        $xmlWriter->writeElement('changefreq', 'weekly');
        $xmlWriter->writeElement('priority', '0.4');
        $xmlWriter->endElement();


        $xmlWriter->endElement(); // Close urlset

        file_put_contents($filename, $xmlWriter->flush(true), FILE_APPEND);
    }
}