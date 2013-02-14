<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductVariantImagesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('images', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product\Variant'
        ));
    }

    public function getName()
    {
        return 'site_product_variant_images';
    }
}