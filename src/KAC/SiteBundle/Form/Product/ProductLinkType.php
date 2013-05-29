<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProductLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('linkedProduct', 'entity_id', array(
            'class' => 'KAC\SiteBundle\Entity\Product',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('p')
                    ->where("p.id = ?1")
                    ->setParameter(1, $id);
            },
            'attr' => array(
                'class' => 'fill no-uniform select-product',
                'data-placeholder' => '- Select a Product -',
                'placeholder' => '- Select a Product -',
            ),
            'required' => true,
        ));
        $builder->add('linkType', 'choice', array(
            'choices' => array(
                'cheaper' => 'Cheaper Alternative',
                'related' => 'Related Product',
                'series' => 'Series',
            ),
            'attr' => array(
                'class' => 'fill',
                'data-placeholder' => '- Select a Link Type -',
                'placeholder' => '- Select a Link Type -',
            ),
            'required' => true,
            'empty_value' => '- Select a Link Type -',
        ));
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Link'
        ));
    }

    public function getName()
    {
        return 'site_product_link';
    }
}