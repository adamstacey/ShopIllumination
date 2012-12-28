<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class DepartmentType extends AbstractType
{
    /**
     * @var ManagerRegistry
     */
    protected $registry;

    /**
     * @var array
     */
    private $choiceListCache = array();

    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $registry = $this->registry;
        $choiceListCache =& $this->choiceListCache;

        $choiceList = function (Options $options) use (&$choiceListCache) {
            $labelHash = is_object($options['label'])
                ? spl_object_hash($options['label'])
                : $options['label'];
            $valueHash = is_object($options['value'])
                ? spl_object_hash($options['value'])
                : $options['value'];
            $groupByHash = is_object($options['group_by'])
                ? spl_object_hash($options['group_by'])
                : $options['group_by'];
            $choiceHashes = $options['choices'];
            $preferredChoiceHashes = $options['preferred_choices'];

            $hash = md5(json_encode(array(
                $labelHash,
                $valueHash,
                $groupByHash,
                $choiceHashes,
                $preferredChoiceHashes,
            )));

            if (!isset($choiceListCache[$hash])) {
                $choiceListCache[$hash] = new ObjectChoiceList(
                    $options['choices'],
                    $options['label'],
                    $options['preferred_choices'],
                    $options['group_by'],
                    $options['value']
                );
            }

            return $choiceListCache[$hash];
        };

        $resolver->setDefaults(array(
            'em'                => null,
            'label'             => null,
            'value'             => null,
            'query_builder'    => null,
            'choices'           => $this->loadDepartments(),
            'choice_list'      => $choiceList,
            'group_by'          => null,
        ));
    }

    private function loadDepartments()
    {
        $getChildDepartments = function ($parent, $level=0) use(&$getChildDepartments)
        {
            $departments = array();

            $parent->setLevel($level);
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

        $em = $this->registry->getManager();
        $departments = $em->getRepository('WebIllumination\SiteBundle\Entity\Department')->createQueryBuilder('d')
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

        return $departmentTree;
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'department';
    }
}
