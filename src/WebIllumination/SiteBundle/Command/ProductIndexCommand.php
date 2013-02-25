<?php
namespace WebIllumination\SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use WebIllumination\SiteBundle\Indexer\ProductIndexer;

class ProductIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:index:product')
            ->setDescription('Load data into Solr index')
            ->addArgument('id');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        // Load products
        $em = $this->getContainer()->get('doctrine')->getManager();

        $images = $em->getRepository('WebIllumination\SiteBundle\Entity\Image')->findBy(array(
            'objectType' => 'variant',
            'imageType' => 'variant',
            'objectId' => 5586
        ));
        \Doctrine\Common\Util\Debug::dump(count($images));

        die();
        $product = $em->getRepository('WebIllumination\SiteBundle\Entity\Product')->find($id);
        $productIndexer = new ProductIndexer($this->getContainer()->get('solarium.client.product'), $this->getContainer()->get('doctrine'));

        $productIndexer->index($product);

        $output->writeln('Finished!');
    }
}