<?php

namespace KAC\SiteBundle\Form\Product;

use KAC\SiteBundle\Form\Product\ProductPriceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductSeoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptions', 'collection', array(
            'type' => new ProductDescriptionSeoType(),
        ));

        $builder->add('routings', 'collection', array(
            'type' => new ProductRoutingType(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'site_product_seo';
    }
}