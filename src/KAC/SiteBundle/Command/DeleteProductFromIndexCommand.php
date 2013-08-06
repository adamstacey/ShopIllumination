<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\EventListener\ImageListener;
use KAC\SiteBundle\Indexer\ProductIndexer;

class DeleteProductFromIndexCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:index:deleteProduct')
            ->setDescription('Delete product from Solr index')
            ->addArgument('id');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $solariumProductClient = $this->getContainer()->get('solarium.client.products');

        $delete = $solariumProductClient->createUpdate();
        $delete->addDeleteById($id);
        $delete->addCommit();

        $solariumProductClient->update($delete);

        $output->writeln('Finished!');
    }
}