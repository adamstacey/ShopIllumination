<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class RebuildDepartmentTreeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:rebuild:departmentTree')
            ->setDescription('Rebuilds the department tree.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         * @var $repository DepartmentRepository
         */
        $em = $this->getContainer()->get('doctrine')->getManager();
        $level = 0;
        $nodeCount = 1;
        $displayOrder = 1;
        $rootDepartment = $em->createQuery("SELECT d FROM KAC\SiteBundle\Entity\Department d WHERE d.parent IS NULL")->getSingleResult();
        $rootDepartment->setLvl($level);
        $rootDepartment->setLft($nodeCount);
        $rootDepartment->setDisplayOrder($displayOrder);
        $this->updateChildren($rootDepartment, $nodeCount, $displayOrder, $level + 1, $output);
        $nodeCount++;
        $rootDepartment->setRgt($nodeCount);
        $em->persist($rootDepartment);
        $em->flush();
        $output->writeln('Finished!');
    }

    private function updateChildren(Department $department, &$nodeCount, &$displayOrder, $level, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        foreach ($department->getChildren() as $child)
        {
            $output->writeln('Updating: '.$child->getDescription()->getName());
            $output->writeln('-------> Level: '.$level);
            $nodeCount++;
            $displayOrder++;
            $child->setParent($department);
            $child->setLvl($level);
            $child->setLft($nodeCount);
            $child->setDisplayOrder($displayOrder);
            $this->updateChildren($child, $nodeCount, $displayOrder, $level + 1, $output);
            $nodeCount++;
            $child->setRgt($nodeCount);
            $em->persist($child);
            $em->flush();
        }
    }
}