<?php
namespace WebIllumination\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use WebIllumination\SiteBundle\Entity\Department;
use WebIllumination\SiteBundle\Entity\DepartmentTmp;
use WebIllumination\SiteBundle\Indexer\ProductIndexer;
use WebIllumination\SiteBundle\Repository\DepartmentRepository;

class DepartmentTreeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:departments')
            ->setDescription('Fix departments structure')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ALTER TABLE departments ADD lft INT NOT NULL, ADD lvl INT NOT NULL, ADD rgt INT NOT NULL, ADD root INT DEFAULT NULL;
        // CREATE TABLE departments_tmp LIKE departments; INSERT departments_tmp SELECT * FROM departments;
        // TRUNCATE TABLE departments_tmp;
        /**
         * @var $em EntityManager
         * @var $repository DepartmentRepository
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

//        $em->getConnection()->exec("ALTER TABLE departments ADD lft INT NOT NULL, ADD lvl INT NOT NULL, ADD rgt INT NOT NULL, ADD root INT DEFAULT NULL");
//        $em->getConnection()->exec("DROP TABLE IF EXISTS departments_tmp");
//        $em->getConnection()->exec("CREATE TABLE departments_tmp LIKE departments; INSERT departments_tmp SELECT * FROM departments;");
//        $em->getConnection()->exec("ALTER TABLE  `departments_tmp` CHANGE  `id`  `id` INT( 11 ) NOT NULL");

        $repository = $em->getRepository("WebIllumination\SiteBundle\Entity\Department");
        $departments = $em->createQuery("SELECT d, dc FROM WebIllumination\SiteBundle\Entity\Department d JOIN d.children dc WHERE d.parent is null ORDER BY d.displayOrder ASC")->execute();

        foreach($departments as $department) {
            $newDepartment = $this->createTempDepartment($department, null);
            $em->persist($newDepartment);

            $this->persistChildren($newDepartment, $department);
        }

        $em->flush();

//        $em->getConnection()->exec("UPDATE departments d, departments_tmp t SET d.lft = t.lft, d.lvl = t.lvl, d.rgt = t.rgt, d.root = t.root WHERE d.id = t.id;");

        $output->writeln('Finished!');
    }

    private function persistChildren($newParent, $parent) {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $children = $em->createQuery("SELECT d, dc FROM WebIllumination\SiteBundle\Entity\Department d JOIN d.children dc WHERE d.parent = ?1 ORDER BY d.displayOrder ASC")
            ->setParameter(1, $parent)
            ->execute();

        foreach($children as $child) {
            $newDepartment = $this->createTempDepartment($child, $newParent);
            $em->persist($newDepartment);

            if(count($child->getChildren()) > 0) {
                $this->persistChildren($newDepartment, $child);
            }
        }
    }
    
    private function createTempDepartment(Department $department, $parent) {
        $new = new DepartmentTmp();
        
        $new->setId($department->getId());
        $new->setParent($parent);
        $new->setStatus($department->getStatus());
        $new->setDepartmentPath($department->getDepartmentPath());
        $new->setHidePrices($department->getHidePrices());
        $new->setShowPricesOutOfHours($department->getShowPricesOutOfHours());
        $new->setMembershipCardDiscountAvailable($department->getMembershipCardDiscountAvailable());
        $new->setMaximumMembershipCardDiscount($department->getMaximumMembershipCardDiscount());
        $new->setDeliveryBand($department->getDeliveryBand());
        $new->setCheckDeliveryBand($department->getCheckDeliveryBand());
        $new->setInheritedDeliveryBand($department->getInheritedDeliveryBand());
        $new->setDisplayOrder($department->getDisplayOrder());
        $new->setCreatedAt($department->getCreatedAt());
        $new->setUpdatedAt($department->getUpdatedAt());
        
        return $new;
    }
}