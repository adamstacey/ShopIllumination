<?php

namespace KAC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('department', 'entity', array(
            'property' => 'indentedName',
            'class' => 'KAC\SiteBundle\Entity\Department',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('d')
                    ->addSelect('dd')
                    ->leftJoin('d.descriptions', 'dd')
                    ->orderBy('d.displayOrder', 'ASC');
            },
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
        return 'admin_product_department';
    }
}
