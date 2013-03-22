<?php
namespace KAC\SiteBundle\Command;

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
            ->setDescription('Load data into Solr index')
            ->addOption('start', null, InputOption::VALUE_REQUIRED);
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        gc_enable();
        // Load products
        $em = $this->getContainer()->get('doctrine')->getManager();
        $products = $em->getRepository('KAC\SiteBundle\Entity\Product')->findAll();
        $productIndexer = new ProductIndexer($this->getContainer()->get('solarium.client.product'), $this->getContainer()->get('doctrine'));

        //Clear product index
        if($input->getOption('start') === null)
        {
            $productIndexer->delete();
        }
        unset($productIndexer);

        $totalProducts = count($products);
        $startI = $input->getOption('start') == null ? count($products) - 1 : $input->getOption('start');

        for($i = $startI; $i >= 0; $i--)
        {
            $output->writeln("Writing index for product ".$i." of ".$totalProducts."...");
            $product = $products[$i];
            unset($products[$i]);
            $productIndexer = new ProductIndexer($this->getContainer()->get('solarium.client.product'), $this->getContainer()->get('doctrine'));
            $productIndexer->index($product);

            gc_collect_cycles();
        }

        $output->writeln("Product indexes created");

        $output->writeln('Finished!');
    }
}