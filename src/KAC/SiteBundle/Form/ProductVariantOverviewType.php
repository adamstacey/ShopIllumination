<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductVariantOverviewType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productCode', 'text', array(
            'attr' => array(
                'size' => 10,
                'data-help' => 'Enter the unique product code supplied by the manufacturer or supplier.',
                'class' => 'tac fill uppercase',
            ),
        ));
        $builder->add('ean', 'text', array(
            'attr' => array(
                'size' => 10,
                'data-help' => 'Enter the products EAN number',
                'class' => 'tac fill uppercase',
            ),
        ));
        $builder->add('prices', 'collection', array(
            'type' => new ProductPriceType(),
            'allow_add' => true,
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
        return 'site_product_variant_overview';
    }
}