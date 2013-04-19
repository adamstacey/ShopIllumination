<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class EditProductOverviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
            'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
            'label'  => 'Due Date',
        ));
        $builder->add('availableForPurchase');
        $builder->add('featureComparison');
        $builder->add('downloadable');
        $builder->add('specialOffer');
        $builder->add('recommended');
        $builder->add('accessory');
        $builder->add('new');

        // Prices
        $builder->add('hidePrice');
        $builder->add('showPriceOutOfHours');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product',
        ));
    }

    public function getName()
    {
        return 'site_edit_product_overview';
    }
}
