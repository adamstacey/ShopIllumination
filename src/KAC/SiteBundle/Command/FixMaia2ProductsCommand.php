<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\ProductToDepartment;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class FixMaia2ProductsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:maia_products2')
            ->setDescription('Fix Maia products 2')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         * @var $repository DepartmentRepository
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Fetch Department
        $brand = $em->getRepository('KACSiteBundle:Brand')->find(15);
        $department = $em->getRepository('KACSiteBundle:Department')->find(41);
        $oldProducts = $em->getRepository('KAC\SiteBundle\Entity\Product')->findBy(array('brand' => 15, 'template' => 'maia'));

        $output->writeln('Starting to delete old products');

        $output->writeln('Deleted old products');

        $output->writeln('Finished!');
    }
}