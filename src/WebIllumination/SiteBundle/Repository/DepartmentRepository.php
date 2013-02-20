<?php
namespace WebIllumination\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class DepartmentRepository extends NestedTreeRepository
{
    public function findActiveDepartment($id)
    {
        $query = $this->getEntityManager()->createQuery('
                SELECT d, dd, dc, dp
                FROM WebIllumination\SiteBundle\Entity\Department d
                LEFT JOIN d.descriptions dd
                LEFT JOIN d.children dc
                LEFT JOIN d.parent dp
                WHERE d.status = :status AND d.id = :id
                ORDER BY d.displayOrder ASC
            ')->setParameters(array(
                'id'     => $id,
                'status' => 'a'
            ));

        return $query->getSingleResult();
    }

    public function findActiveDepartments()
    {
        $query = $this->getEntityManager()->createQuery('
                SELECT d, dd, dc
                FROM WebIllumination\SiteBundle\Entity\Department d
                LEFT JOIN d.descriptions dd
                LEFT JOIN d.children dc
                WHERE d.status = :status
                ORDER BY d.displayOrder ASC
            ')->setParameter('status', 'a');

        return $query->getResult();
    }

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