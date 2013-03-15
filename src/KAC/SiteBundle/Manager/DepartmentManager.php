<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Department\Description as DepartmentDescription;
use KAC\SiteBundle\Entity\Department\Routing as DepartmentRouting;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\Routing;

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

    public function updateDescription(DepartmentDescription $description)
    {
        if(!$description->getDepartment()) return;

        // TODO: Write update stuff
    }
}