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

        // Delete all the old products
        $qb = $em->createQueryBuilder();

        $variants = $qb->select('v')
            ->from('KAC\SiteBundle\Entity\Product\Variant', 'v')
            ->join('v.product', 'p')
            ->where('p.template = \'maia\'')
            ->getQuery()
            ->execute();

        // Get types
        $types = $em->getRepository('KACSiteBundle:Type')->findAll();

        foreach($variants as $variant)
        {
            /**
             * @var $variant Variant
             */
            if($variant->getDescription())
            {
                if(strpos($variant->getDescription()->getHeader(), 'Breakfast Bar') !== false) {
                    $variant->setType($types[2]);
                } elseif(strpos($variant->getDescription()->getHeader(), 'Island Worktop') !== false) {
                    $variant->setType($types[3]);
                } elseif(strpos($variant->getDescription()->getHeader(), 'Sink Module') !== false) {
                    $variant->setType($types[4]);
                } elseif(strpos($variant->getDescription()->getHeader(), 'Edging') !== false) {
                    $variant->setType($types[5]);
                } elseif(strpos($variant->getDescription()->getHeader(), 'Worktop') !== false) {
                    $variant->setType($types[1]);
                }  elseif(strpos($variant->getDescription()->getHeader(), 'Chopping Board') !== false || strpos($variant->getDescription()->getHeader(), 'Hot Rod') !== false) {
                    $variant->setType($types[6]);
                } else {
                    $variant->setType($types[0]);
                }
                $em->persist($variant);
                $em->flush();
            }
        }

        $output->writeln('Finished!');
    }
}