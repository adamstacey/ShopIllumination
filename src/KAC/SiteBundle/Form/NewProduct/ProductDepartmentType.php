<?php

namespace KAC\SiteBundle\Form\NewProduct;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
                if (count($rootNodes) != 1)
                {
                    return $er->createQueryBuilder('d');
                } else {
                    return $er->childrenQueryBuilder($rootNodes[0])
                        ->addSelect('d')
                        ->leftJoin('node.descriptions', 'd');
                }
            },
            'empty_value' => '- Select a Department -',
            'label' => 'Department',
            'required' => true,
            'attr' => array(
                'class' => 'fill no-uniform select-department',
                'data-help' => 'Select a department you want the product to fall under.',
            ),
        ));
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
