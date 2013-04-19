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
        ));
        $builder->add('linkType', 'choice', array(
            'choices' => array(
                'related' => 'Related',
                'series' => 'Series',
            ),
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