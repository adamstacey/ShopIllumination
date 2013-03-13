<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Repository\DepartmentRepository;

class NewDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('parent', 'entity', array(
                    'property' => 'indentedName',
                    'class' => 'KAC\SiteBundle\Entity\Department',
                    'query_builder' => function(DepartmentRepository $er) {
                        $rootNodes = $er->getRootNodes();
                        if(count($rootNodes) != 1) {
                            return new $er->createQueryBuilder('d');
                        } else {
                            return $er->childrenQueryBuilder($rootNodes[0])
                                ->addSelect('d')
                                ->leftJoin('node.descriptions', 'd');
                        }
                    },
                    'attr' => array(
                        'class' => 'select-department fill no-uniform',
                    ),
                ), array());
                $builder->add('status', 'choice', array(
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
                ));

                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Department',

            'type' => 's',
            'variants' => array(),
            'departments' => array(),
            'departmentId' => null,
        ));
    }

    public function getName()
    {
        return 'site_new_department';
    }
}
