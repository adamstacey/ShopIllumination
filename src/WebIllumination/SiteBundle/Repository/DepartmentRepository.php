<?php
namespace WebIllumination\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DepartmentRepository extends EntityRepository
{
    public function findAllAsTree()
    {
        $departments = $this->getEntityManager()
            ->createQuery('
                SELECT d, dd
                FROM WebIllumination\SiteBundle\Entity\Department d
                JOIN d.descriptions dd
            ')
            ->getResult();

        $departmentTree = array();
        foreach($departments as $department)
        {
            if($department->getParent() !== null)
            {
                $departmentTree = array_merge($departmentTree, $this->getChildDepartments($department));
            }
        }

        return $departmentTree;
    }

    private function getChildDepartments($parent, $level=0)
    {
        $departments = array();

        $parent->setLevel($level);
        $departments[] = $parent;

        if(count($parent->getChildren()) > 0)
        {
            $level++;
            foreach($parent->getChildren() as $child)
            {
                $child->setLevel($level);
                $departments = array_merge($departments, $this->getChildDepartments($child));
            }
        }

        return $departments;
    }
}