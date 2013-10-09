<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Entity\Department\Description as DepartmentDescription;
use KAC\SiteBundle\Entity\Department\Routing as DepartmentRouting;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\Form;

class DepartmentManager extends Manager
{
    private $seoManager;

    public function __construct($doctrine, SeoManager $seoManager)
    {
        parent::__construct($doctrine);

        $this->seoManager = $seoManager;
    }

    public function createDepartment()
    {
        $department = new Department();
        $department->addDescription(new DepartmentDescription());
        $department->addRouting(new DepartmentRouting());

        return $department;
    }

    public function rebuildDepartmentTree()
    {
        $em = $this->doctrine->getManager();
        $level = 0;
        $nodeCount = 1;
        $displayOrder = 1;
        $rootDepartment = $em->createQuery("SELECT d FROM KAC\SiteBundle\Entity\Department d WHERE d.parent IS NULL")->getSingleResult();
        $rootDepartment->setLvl($level);
        $rootDepartment->setLft($nodeCount);
        $rootDepartment->setDisplayOrder($displayOrder);
        $this->updateChildren($rootDepartment, $nodeCount, $displayOrder, $level + 1);
        $nodeCount++;
        $rootDepartment->setRgt($nodeCount);
        $em->persist($rootDepartment);
        $em->flush();
        return true;
    }

    private function updateChildren(Department $department, &$nodeCount, &$displayOrder, $level)
    {
        $em = $this->doctrine->getManager();
        foreach ($department->getChildren() as $child)
        {
            $nodeCount++;
            $displayOrder++;
            $child->setParent($department);
            $child->setLvl($level);
            $child->setLft($nodeCount);
            $child->setDisplayOrder($displayOrder);
            $this->updateChildren($child, $nodeCount, $displayOrder, $level + 1);
            $nodeCount++;
            $child->setRgt($nodeCount);
            $em->persist($child);
            $em->flush();
        }
    }

    public function updateDisplayOrders()
    {
        $em = $this->doctrine->getManager();
        $displayOrder = 1;
        $rootDepartment = $em->createQuery("SELECT d FROM KAC\SiteBundle\Entity\Department d WHERE d.parent IS NULL")->getSingleResult();
        $rootDepartment->setDisplayOrder($displayOrder);
        $this->updateChildrenDisplayOrder($rootDepartment, $displayOrder);
        $em->persist($rootDepartment);
        $em->flush();
        return true;
    }

    private function updateChildrenDisplayOrder(Department $department, &$displayOrder)
    {
        $em = $this->doctrine->getManager();
        foreach ($department->getChildren() as $child)
        {
            $displayOrder++;
            $child->setDisplayOrder($displayOrder);
            $this->updateChildrenDisplayOrder($child, $displayOrder);
            $em->persist($child);
            $em->flush();
        }
    }

    public function updateDepartmentPath(Department $department)
    {
        $departmentPath = array();

        // Get the ids of parent departments
        $parentDepartments = $department->getParents();
        $parentDepartments = array_reverse($parentDepartments);
        foreach ($parentDepartments as $parentDepartment)
        {
            $departmentPath[] = $parentDepartment->getId();
        }
        $departmentPath[] = $department->getId();
        $departmentPath = implode('|', $departmentPath);

        // Update the department path
        $department->setDepartmentPath($departmentPath);
    }

    public function updateFeatures($originalFeatures, Department $department)
    {
        $em = $this->doctrine->getManager();

        // Check the features
        foreach ($department->getFeatures() as $feature)
        {
            foreach ($originalFeatures as $key => $originalFeature)
            {
                if ($originalFeature->getId() === $feature->getId())
                {
                    unset($originalFeatures[$key]);
                }
            }
        }

        // Remove any features that have been removed
        foreach ($originalFeatures as $originalFeature) {
            $department->removeFeature($originalFeature);
            $em->remove($originalFeature);
        }
    }

    public function updateObjectLinks(Department $department)
    {
        // Update the descriptions
        foreach ($department->getDescriptions() as $description)
        {
            $description->setDepartment($department);
        }

        // Update the features
        foreach ($department->getFeatures() as $feature)
        {
            $feature->setDepartment($department);
        }

        // Update the routings
        foreach ($department->getRoutings() as $routing)
        {
            $routing->setDepartment($department);
        }
    }

    public function updateDescription(DepartmentDescription $description)
    {
        if(!$description->getDepartment()) return;

        // TODO: Write update stuff
    }
}