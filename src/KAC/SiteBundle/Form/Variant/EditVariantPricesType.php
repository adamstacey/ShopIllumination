<?php

namespace KAC\SiteBundle\Form\Variant;

use KAC\SiteBundle\Form\Product\ProductPriceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditVariantPricesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prices', 'collection', array(
            'type' => new ProductPriceType(),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant',
        ));
    }

    public function getName()
    {
        return 'site_edit_product_prices';
    }
}
