<?php

namespace KAC\SiteBundle\Form\Brand;

use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use KAC\SiteBundle\Form\Product\ProductVariantImagesType;
use KAC\SiteBundle\Form\Product\ProductVariantOverviewType;
use KAC\SiteBundle\Form\Product\ProductVariantUidType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product;

class NewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptions', 'collection', array(
            'block_name' => 'descriptions',
            'type' => new DescriptionType(),
            'required'  => false,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
        $builder->add('status', 'choice', array(
            'label' => 'Status',
            'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
            'required' => true,
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Select the status of the brand.',
            ),
        ));
        $builder->add('template', 'choice', array(
            'label' => 'Template',
            'choices' => array('default' => 'Standard Template'),
            'required' => true,
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Select the template the product will use when a user visits the product.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Brand',
        ));
    }

    public function getName()
    {
        return 'brand_new';
    }
}
