<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Form\ProductFeatureGroupType;
use KAC\SiteBundle\Repository\DepartmentRepository;
use KAC\SiteBundle\Entity\Product\Feature;

class ProductFeatureGroupsType extends AbstractType
{
    private $department;

    public function __construct($department)
    {
        $this->department = $department;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $department = $this->department;

        $builder->add('features', 'collection', array(
            'type' => new ProductFeatureGroupType(),
            'allow_add' => true,
            'allow_delete' => true,
        ));

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
            'label' => 'Department',
            'required' => false,
            'empty_value' => '- Apply to Department -',
            'data' => $department,
            'attr' => array(
                'class' => 'select-department fill no-uniform',
                'help' => 'Select a department you want to apply the new feature group to.',
            ),
        ), array());
    }

    public function getName()
    {
        return 'site_product_feature_groups';
    }
}
