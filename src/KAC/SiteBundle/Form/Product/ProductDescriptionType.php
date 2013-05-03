<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ProductDescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description', 'ckeditor', array(
            'label' => 'Description',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter a description about the product. This should be from a selling perspective, so sell all the benefits and key selling points of the product.',
            ),
        ));

        $builder->add('brandDescription', 'ckeditor', array(
            'label' => 'Brand Description',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter a brand description about the product. This should be from a brand perspective, so describe all the technical elements and key features of the product.',
            ),
        ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Description'
        ));
    }

    public function getName()
    {
        return 'site_product_description';
    }
}
