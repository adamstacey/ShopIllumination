<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;

class UpdateProductCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:product:update')
            ->setDescription('Update a product.')
            ->addArgument('id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $productManager = $this->getContainer()->get('kac_site.manager.product');

        $id = $input->getArgument('id');

        // Fetch the product
        /**
         * @var $product Product
         */
        $product = $em->getRepository("KAC\\SiteBundle\\Entity\\Product")->find($id);
        if ($product)
        {
            $output->writeln('Updating Product: '.$id);
            $em->persist($product);
            $em->flush();
        }
        $output->writeln('Finished!');
    }
}