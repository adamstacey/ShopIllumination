<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditProductSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptions', 'collection', array(
            'block_name' => 'descriptions_seo',
            'type' => new ProductDescriptionSeoType(),
            'required'  => false,
            'allow_add' => true,
            'allow_delete' => true,
        ));
        $builder->add('routings', 'collection', array(
            'block_name' => 'descriptions_routing',
            'type' => new ProductRoutingType(),
            'required'  => false,
            'allow_add' => true,
            'allow_delete' => true,
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
        return 'site_edit_product_seo';
    }
}
