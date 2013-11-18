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
        $variantCount = 1;

        // Check the products
        $productDescriptions = $em->getRepository("KAC\\SiteBundle\\Entity\\Product\\Description")->findBy(array('override' => 1));
        $totalNumberOfProducts = count($productDescriptions);
        $output->writeln('Checking Products...');
        foreach ($productDescriptions as $productDescription)
        {
            $percentage = number_format(($productCount / $totalNumberOfProducts) * 100, 1);
            $output->writeln($percentage.'% - Resetting Product: '.$productDescription->getId().' ('.$productCount.' of '.$totalNumberOfProducts.')');
            $product = $productDescription->getProduct();
            if ($product)
            {
                $productDescription->setOverride(0);
                $em->persist($productDescription);
                $em->flush();
                $productManager->updateProduct($product);
                $em->persist($product);
                $em->flush();
            }
            $productCount++;
        }

        // Check the variants
        $variantDescriptions = $em->getRepository("KAC\\SiteBundle\\Entity\\Product\\Variant\\Description")->findBy(array('override' => 1));
        $totalNumberOfVariants = count($variantDescriptions);
        $output->writeln('Checking Variants...');
        foreach ($variantDescriptions as $variantDescription)
        {
            $percentage = number_format(($variantCount / $totalNumberOfVariants) * 100, 1);
            $output->writeln($percentage.'% - Resetting Variant: '.$variantDescription->getId().' ('.$variantCount.' of '.$totalNumberOfVariants.')');
            $variant = $variantDescription->getVariant();
            if ($variant)
            {
                $product = $variant->getProduct();
                if ($product)
                {
                    $variantDescription->setOverride(0);
                    $em->persist($variantDescription);
                    $em->flush();
                    $productManager->updateProduct($product);
                    $em->persist($product);
                    $em->flush();
                }
            }
            $variantCount++;
        }

        $output->writeln('Finished!');
    }
}