<?php

namespace KAC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\AdminBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class EditProductOverviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productCode');

        $builder->add('brand', 'entity', array(
            'class' => 'KAC\SiteBundle\Entity\Brand',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('b')
                    ->addSelect('bd')
                    ->leftJoin('b.descriptions', 'bd');
            },
        ), array());
        $builder->add('departments', 'collection', array(
            'type' => new ProductDepartmentType(),
        ));
        $builder->add('status', 'choice', array(
            'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
        ));
        $builder->add('availableForPurchase', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('featureComparison', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('downloadable', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('specialOffer', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('recommended', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('accessory', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('new', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));

        // Prices
        $builder->add('hidePrice', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('showPriceOutOfHours', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('membershipCardDiscountAvailable', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
        $builder->add('maximumMembershipCardDiscount', 'choice', array(
            'choices' => array(true => 'Yes', false => 'No'),
            'required' => false,
            'expanded' => true,
            'multiple' => false
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product',
        ));
    }

    public function getName()
    {
        return 'admin_edit_product_overview';
    }
}
