<?php

namespace KAC\SiteBundle\Form\NewProduct;

use KAC\SiteBundle\Form\NewProduct\ProductDepartmentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('brand', 'entity', array(
            'class' => 'KAC\SiteBundle\Entity\Brand',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('b')
                    ->addSelect('bd')
                    ->leftJoin('b.descriptions', 'bd')
                    ->orderBy('bd.name');
            },
            'label' => 'Brand',
            'attr' => array(
                'class' => 'fill no-uniform select-brand',
                'data-help' => 'Select the brand you want this product to fall under.',
                'data-placeholder' => '- Select a Brand -',
                'placeholder' => '- Select a Brand -',
            ),
            'required' => true,
            'empty_value' => '- Select a Brand -',
        ), array());

        $builder->add('departments', 'collection', array(
            'type' => new ProductDepartmentType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product',
            'type' => 's',
            'variants' => array(),
            'departments' => array(),
            'departmentId' => null,
        ));
    }

    public function getName()
    {
        return 'site_new_product';
    }
}
