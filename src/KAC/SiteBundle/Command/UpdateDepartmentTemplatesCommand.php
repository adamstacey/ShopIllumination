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

class UpdateDepartmentTemplatesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('admin:updateDepartmentTemplates')->setDescription('Update department templates.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $departments = $em->getRepository("KAC\SiteBundle\Entity\Department")->findAll();

        $patterns = array('/productFeatureGroup\|([0-9]*)/', '/freeText\|(.[^\^]*)/');
        $replacements = array('@VariantToFeature|$1|name', '"$1"');

        $departmentCount = 0;
        $numberOfDepartments = sizeof($departments);
        foreach ($departments as $department)
        {
            $departmentCount++;
            $percentageComplete = '...'.number_format(($departmentCount / $numberOfDepartments) * 100, 1).'% complete!';
            $output->writeln('Looking at department '.$departmentCount.' of '.$numberOfDepartments);
            $output->writeln('');
            if ($department->getDescription())
            {
                $pageTitleTemplate = $department->getDescription()->getPageTitleTemplate();
                $newPageTitleTemplate = preg_replace($patterns, $replacements, $pageTitleTemplate);
                if (!$newPageTitleTemplate)
                {
                    $newPageTitleTemplate = 'brand^productCode^department^extraProductKeyword';
                }
                $output->writeln('PAGE TITLE TEMPLATE:');
                $output->writeln('------------------------------------------------');
                $output->writeln('-> '.$pageTitleTemplate);
                $output->writeln('-> '.$newPageTitleTemplate);
                $output->writeln('');
                $department->getDescription()->setPageTitleTemplate($newPageTitleTemplate);

                $headerTemplate = $department->getDescription()->getHeaderTemplate();
                $newHeaderTemplate = preg_replace($patterns, $replacements, $headerTemplate);
                if (!$newHeaderTemplate)
                {
                    $newHeaderTemplate = 'brand^productCode^department^extraProductKeyword';
                }
                $output->writeln('HEADER TEMPLATE:');
                $output->writeln('------------------------------------------------');
                $output->writeln('-> '.$headerTemplate);
                $output->writeln('-> '.$newHeaderTemplate);
                $output->writeln('');
                $department->getDescription()->setHeaderTemplate($newHeaderTemplate);

                $metaDescriptionTemplate = $department->getDescription()->getMetaDescriptionTemplate();
                $newMetaDescriptionTemplate = str_replace('^"available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."', '^" available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."', preg_replace($patterns, $replacements, $metaDescriptionTemplate));
                if (!$newMetaDescriptionTemplate)
                {
                    $newMetaDescriptionTemplate = '"Find out more about the amazing "^brand^productExtraKeyword^productCode^@VariantToFeature|2|name^department^" available to buy securely and safely online for fast UK home delivery only with Kitchen Appliance Centre."';
                }
                $output->writeln('META DESCRIPTION TEMPLATE:');
                $output->writeln('------------------------------------------------');
                $output->writeln('-> '.$metaDescriptionTemplate);
                $output->writeln('-> '.$newMetaDescriptionTemplate);
                $output->writeln('');
                $department->getDescription()->setMetaDescriptionTemplate($newMetaDescriptionTemplate);
            } else {
                $output->writeln('No templates found for this department!');
            }
            $output->writeln('');
            $output->writeln('###############################################');
            $output->writeln($percentageComplete);
            $output->writeln('###############################################');
            $output->writeln('');
            $em->persist($department);
        }
        $em->flush();

        $output->writeln('Finished!');
    }
}