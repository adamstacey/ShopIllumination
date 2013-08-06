<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Repository\DepartmentRepository;


class NewProductFeatureGroupsType extends AbstractType
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
            'type' => new NewProductFeatureGroupType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));

        $builder->add('department', 'entity', array(
            'property' => 'indentedName',
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
            'label' => 'Apply to Department',
            'required' => false,
            'empty_value' => '- Apply to Department -',
            'data' => ($department instanceof Department?$department:null),
            'attr' => array(
                'class' => 'select-department fill no-uniform',
                'data-help' => 'Select a department you want to apply the new feature group to.',
                'data-placeholder' => '- Apply to Department -',
                'placeholder' => '- Apply to Department -',
            ),
        ));

        $builder->add('product', 'entity_id', array(
            'class' => 'KAC\SiteBundle\Entity\Product',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('p')
                    ->where("p.id = ?1")
                    ->setParameter(1, $id);
            },
            'label' => 'Apply to Product',
            'required' => false,
            'attr' => array(
                'class' => 'select-product fill no-uniform',
                'data-help' => 'Select a product you want to apply the new feature group to.',
                'data-placeholder' => '- Apply to Product -',
                'placeholder' => '- Apply to Product -',
            ),
        ));
    }

    public function getName()
    {
        return 'site_new_product_feature_groups';
    }
}
