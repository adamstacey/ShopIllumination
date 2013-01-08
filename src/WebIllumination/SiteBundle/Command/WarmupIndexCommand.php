<?php
namespace WebIllumination\SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use WebIllumination\SiteBundle\Indexer\ProductIndexer;

class WarmupIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:index:warmup')
            ->setDescription('Load data into Solr index')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        gc_enable();
        // Load products
        $em = $this->getContainer()->get('doctrine')->getManager();
        $products = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->findAll();
        $productIndexer = new ProductIndexer($this->getContainer()->get('solarium.client.product'), $this->getContainer()->get('doctrine'));

        //Clear product index
        $productIndexer->delete();

        $i = 0;
        foreach($products as $product)
        {
//            if($i >= 20) break;
            $productIndexer->index($product);
            gc_collect_cycles();
            $i++;
        }

        $output->writeln("Product indexes created");

        $output->writeln('Finished!');
        gc_disable();
    }
}