<?php

namespace KAC\SiteBundle\Form\Variant;

use KAC\AdminBundle\Form\ProductFeatureType;
use KAC\SiteBundle\Form\Product\ProductFeatureCombinationType;
use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditVariantFeaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('features', 'collection', array(
            'block_name' => 'variants_features',
            'type' => new ProductFeatureCombinationType($options['departmentId']),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant',
        ));
        $resolver->setRequired(array('departmentId'));
    }

    public function getName()
    {
        return 'site_edit_variant_features';
    }
}