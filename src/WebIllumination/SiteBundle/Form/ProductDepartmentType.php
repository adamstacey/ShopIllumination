<?php

namespace WebIllumination\SiteBundle\Form;

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
            'class' => 'WebIllumination\SiteBundle\Entity\Department',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('d')
                    ->addSelect('dd')
                    ->leftJoin('d.descriptions', 'dd')
                    ->where('d.root != d.id')
                    ->orderBy('d.root', 'ASC')
                    ->addOrderBy('d.lft', 'ASC');
            },
            'required' => true,
            'attr' => array(
                'class' => 'fill',
            ),
            'empty_value' => '- Select a Department -',
        ), array());
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\ProductToDepartment'
        ));
    }

    public function getName()
    {
        return 'site_product_department';
    }
}
