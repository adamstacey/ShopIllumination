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

class RemoveGhostDepartmentsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:removeGhostDepartments')
            ->setDescription('Remove any ghost departments.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Go through the departments
        $em->getConnection()->exec("SET FOREIGN_KEY_CHECKS = 0;");
        $departments = $em->getRepository('KAC\SiteBundle\Entity\Department')->findAll();
        foreach ($departments as $department)
        {
            // Look for a description
            if (sizeof($department->getDescriptions()) < 1)
            {
                $output->writeln('Removing Department: '.$department->getId());
                $em->remove($department);
                $em->flush();
            }
        }

        $em->getConnection()->exec("SET FOREIGN_KEY_CHECKS = 1;");

        $output->writeln('Finished!');
    }
}