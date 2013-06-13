<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\Internal\Hydration\IterableResult;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Indexer\ProductIndexer;

class WarmupIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:index:warmup')
            ->setDescription('Load data into Solr index');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $iterableResult IterableResult
         * @var $buffer \Solarium_Plugin_BufferedAdd
         */
        $em = $this->getContainer()->get('doctrine')->getManager();
        $solarium = $this->getContainer()->get('solarium.client.product');
        $productIndexer = new ProductIndexer($solarium, $this->getContainer()->get('doctrine'));
        $buffer = $solarium->getPlugin('bufferedadd');

        // Load products
        $query = $em->createQuery("SELECT p FROM KAC\\SiteBundle\\Entity\\Product p");
        $iterableResult = $query->iterate();

        // Index products
        while (($row = $iterableResult->next()) !== false) {
            try {
                $product = $row[0];

                // Create the document and populate the data
                $query = $solarium->createUpdate();
                $document = $productIndexer->createDocument($query, $product);
                if($document)
                {
                    $buffer->addDocument($document);
                }

                $em->detach($row[0]);
            } catch (\Exception $e) {
                $output->writeln("An error occurred");
            }
        }

        $output->writeln('Finished!');
    }
}