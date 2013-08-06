<?php

namespace KAC\SiteBundle\Form\Product;

use KAC\SiteBundle\Form\Product\ProductFeatureCombinationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductVariantFeaturesType extends AbstractType
{
    private $departmentId;

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('features', 'collection', array(
            'type' => new ProductFeatureCombinationType($this->departmentId),
            'allow_add' => true,
            'allow_delete' => false,
            'by_reference' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant'
        ));
    }

    public function getName()
    {
        return 'site_product_variant_features';
    }
}