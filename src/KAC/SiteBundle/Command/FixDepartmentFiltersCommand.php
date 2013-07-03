<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class FixDepartmentFiltersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:department_filters')
            ->setDescription('Fix department filters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         * @var $repository DepartmentRepository
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Update DepartmentToFeature entity to include common features
        $departments = $em->createQuery("SELECT d FROM KAC\SiteBundle\Entity\Department d WHERE d.parent IS NULL ORDER BY d.displayOrder ASC")->execute();

        $func = function(Department $department) use (&$func, $em) {
            if(count($department->getChildren()) > 0)
            {
                $commonFeatures = array();

                foreach($department->getChildren() as $child)
                {
                    $func($child);

                    // FInd common filter features
                    $departmentToFeatures = $em->createQuery("
                        SELECT dtf
                        FROM KAC\SiteBundle\Entity\DepartmentToFeature dtf
                        WHERE dtf.department = ?1")
                        ->setParameter(1, $child->getId())
                        ->execute();

                    foreach($departmentToFeatures as $departmentToFeature)
                    {
                        /**
                         * @var $departmentToFeature DepartmentToFeature
                         */
                        if($departmentToFeature->getDisplayOnListing())
                        {
                            $departmentToFeature = $departmentToFeatures[0];
                            if(!array_key_exists($departmentToFeature->getFeatureGroup()->getName(), $commonFeatures))
                            {
                                $commonFeatures[$departmentToFeature->getFeatureGroup()->getName()] = $departmentToFeature;
                            }
                            else if ($commonFeatures[$departmentToFeature->getFeatureGroup()->getName()] != $departmentToFeature)
                            {
                                unset ($commonFeatures[$departmentToFeature->getFeatureGroup()->getName()]);
                            }
                        }
                    }
                }

                $i = 0;
                // Ensure a DepartmentToFeature entity exists for each common feature
                /**
                 * @var $commonFeature DepartmentToFeature
                 */
                foreach($commonFeatures as $commonFeature)
                {
                    $departmentToFeatures = $em->createQuery("
                        SELECT dtf
                        FROM KAC\SiteBundle\Entity\DepartmentToFeature dtf
                        WHERE dtf.featureGroup = ?1 AND dtf.department = ?2")
                        ->setParameter(1, $commonFeature->getFeatureGroup()->getId())
                        ->setParameter(2, $department->getId())
                        ->execute();
                    // Check if an existing entity exists. If so update that entity
                    if($departmentToFeatures && count($departmentToFeatures) >= 1)
                    {
                        $departmentToFeature = $departmentToFeatures[0];
                        $departmentToFeature->setDisplayOnFilter(true);
                        $em->persist($departmentToFeature);
                    } else {
                        // Otherwise create a new DepartmentToFeature entity
                        $departmentToFeature = new DepartmentToFeature();
                        $departmentToFeature->setDepartment($department);
                        $departmentToFeature->setFeatureGroup($commonFeature->getFeatureGroup());
                        $departmentToFeature->setFeature($commonFeature->getFeature());
                        $departmentToFeature->setDisplayOnFilter(true);
                        $departmentToFeature->setDisplayOnListing(false);
                        $departmentToFeature->setDisplayOnProduct(false);
                        $departmentToFeature->setDisplayOrder($i);
                        $departmentToFeature->setActive(true);
                        $em->persist($departmentToFeature);
                    }
                    $i++;
                }

                $em->persist($department);
            }
        };

        foreach($departments as $department)
        {
            $func($department);
        }
        $em->flush();


        $output->writeln('Finished!');
    }
}