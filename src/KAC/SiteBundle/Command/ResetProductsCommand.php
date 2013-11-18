<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;

class ResetProductsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:products:reset')
            ->setDescription('Reset the products.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $productManager = $this->getContainer()->get('kac_site.manager.product');
        $productCount = 1;

        // Fetch the products
        $products = $em->getRepository("KAC\\SiteBundle\\Entity\\Product")->findAll();
        $totalNumberOfProducts = count($products);
        foreach ($products as $product)
        {
            $resetProduct = false;
            $percentage = number_format(($productCount / $totalNumberOfProducts) * 100, 1);
            $output->writeln($percentage.'% - Checking Product: '.$product->getId().' ('.$productCount.' of '.$totalNumberOfProducts.')');
            if ($product->getDescription())
            {
                if ($product->getDescription()->getOverride() > 0)
                {
                    $resetProduct = true;
                }
            }
            if (!$resetProduct)
            {
                foreach ($product->getVariants() as $variant)
                {
                    if ($variant)
                    {
                        if ($variant->getDescription())
                        {
                            if ($variant->getDescription()->getOverride() > 0)
                            {
                                $resetProduct = true;
                                break;
                            }
                        }
                    }
                }
            }
            if ($resetProduct)
            {
                if ($product->getDescription())
                {
                    $product->getDescription()->setOverride(0);
                }
                foreach ($product->getVariants() as $variant)
                {
                    if ($variant)
                    {
                        if ($variant->getDescription())
                        {
                            $variant->getDescription()->setOverride(0);
                        }
                    }
                }
            }
            $em->persist($product);
            $em->flush();
            $productManager->updateProduct($product);
            $em->persist($product);
            $em->flush();
            $productCount++;
        }
        $output->writeln('Finished!');
    }
}