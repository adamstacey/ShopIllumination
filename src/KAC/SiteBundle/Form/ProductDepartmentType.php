<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Repository\DepartmentRepository;

class ProductDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('department', 'entity', array(
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
            'label' => 'Main Department',
            'required' => true,
            'attr' => array(
                'class' => 'select-department fill no-uniform',
                'help' => 'Select the department you want this department to fall under.',
            ),
        ), array());
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\ProductToDepartment'
        ));
    }

    public function getName()
    {
        return 'site_product_department';
    }
}
