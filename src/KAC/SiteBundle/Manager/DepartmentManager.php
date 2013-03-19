<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Entity\Department\Description as DepartmentDescription;
use KAC\SiteBundle\Entity\Department\Routing as DepartmentRouting;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentToFeature;

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
        $department->addFeature(new DepartmentToFeature());
        $department->addRouting(new DepartmentRouting());

        return $department;
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

    public function updateObjectLinks(Department $department)
    {
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