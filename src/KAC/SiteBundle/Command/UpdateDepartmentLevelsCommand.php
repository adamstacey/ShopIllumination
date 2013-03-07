<?php
namespace KAC\SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Indexer\ProductIndexer;

class UpdateDepartmentLevelsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:department:update_level')
            ->setDescription('Load data into Solr index')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $getChildDepartments = function ($parent, $level=0) use(&$getChildDepartments)
        {
            $departments = array();

//            $parent->setLevel($level);

            if(count($parent->getDescriptions()) > 0) {
                $departments[] = $parent;

                if(count($parent->getChildren()) > 1)
                {
                    $level = $level + 1;

                    foreach($parent->getChildren() as $child)
                    {
                        $departments = array_merge($departments, $getChildDepartments($child, $level));
                    }
                }
            }

            return $departments;
        };

        $em = $this->getContainer()->get('doctrine')->getManager();
        $departments = $em->getRepository('KAC\SiteBundle\Entity\Department')->createQueryBuilder('d')
            ->addSelect('dd')
            ->addSelect('dp')
            ->addSelect('dc')
            ->leftJoin('d.descriptions', 'dd')
            ->leftJoin('d.parent', 'dp')
            ->leftJoin('d.children', 'dc')
            ->orderBy('d.displayOrder', 'ASC')
            ->getQuery()->getResult();

        $departmentTree = array();
        foreach($departments as $department)
        {
            if($department->getParent() === null || $department->getParent() === 0)
            {
                $departmentTree = array_merge($departmentTree, $getChildDepartments($department));
            }
        }

        $output->writeln("Finished generating tree");

        $i = 1;
        foreach($departmentTree as $department)
        {
            $department->setDisplayOrder($i);
            $em->persist($department);
            $i++;
        }

        $em->flush();

        $output->writeln('Finished!');
    }
}