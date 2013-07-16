<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class FixTempCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:temp')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Delete all the old products
        $oldProducts = $em->getRepository('KAC\SiteBundle\Entity\Product')->createQueryBuilder('p')
            ->where('p.brand = 15')
            ->andWhere('p.template = \'maia\'')
            ->getQuery()
            ->execute();
        foreach($oldProducts as $oldProduct)
        {
            \Doctrine\Common\Util\Debug::dump($oldProduct->getId());
            $em->remove($oldProduct);
            $em->flush();
        }
        $output->writeln('Deleted old products');

        $output->writeln('Finished!');
    }
}