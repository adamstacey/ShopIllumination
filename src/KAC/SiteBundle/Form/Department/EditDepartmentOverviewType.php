<?php

namespace KAC\SiteBundle\Form\Department;

use KAC\SiteBundle\Repository\DepartmentRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditDepartmentOverviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('parent', 'entity', array(
            'label' => 'Parent Department',
            'property' => 'indentedNameWithRoot',
            'class' => 'KAC\SiteBundle\Entity\Department',
            'query_builder' => function(DepartmentRepository $er) {
                $rootNodes = $er->getRootNodes();
                if(count($rootNodes) != 1) {
                    return $er->createQueryBuilder('d');
                } else {
                    return $er->childrenQueryBuilder($rootNodes[0])
                        ->addSelect('d')
                        ->leftJoin('node.descriptions', 'd');
                }
            },
            'attr' => array(
                'class' => 'select-department fill no-uniform',
                'data-help' => 'Select the department you want this department to fall under.',
            ),
        ));

        $builder->add('status', 'choice', array(
            'label' => 'Status',
            'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
            'attr' => array(
                'data-help' => 'Select the status of the department. Any sub-departments will also inherit this status.',
            ),
        ));

        $builder->add('descriptions', 'collection', array(
            'type' => new DepartmentDescriptionOverviewType(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department',
        ));
    }

    public function getName()
    {
        return 'site_edit_department_overview';
    }
}