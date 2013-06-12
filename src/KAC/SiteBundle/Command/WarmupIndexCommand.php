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
        $em = $this->getContainer()->get('doctrine')->getManager();
        $productIndexer = new ProductIndexer($this->getContainer()->get('solarium.client.product'), $this->getContainer()->get('doctrine'));

        /**
         * Load products
         * @var IterableResult $iterableResult
         */
        $products = $em->getRepository('KAC\SiteBundle\Entity\Product')->findAll();
        $query = $em->createQuery("
            SELECT * FROM KAC\\SiteBundle\\Entity\\Product p
        ");
        $iterableResult = $query->iterate();


        //Clear product index
        if($input->getOption('start') === null)
        {
            $productIndexer->delete();
        }

        // Index products
        $i = 0;
        while (($row = $iterableResult->next()) !== false) {
            $output->writeln("Writing index for product ".$i."...");

            $product = $row[0];
            $productIndexer->index($product);
            $i++;

            $em->detach($product[0]);
        }

        $output->writeln("Product indexes created");

        $output->writeln('Finished!');
    }
}