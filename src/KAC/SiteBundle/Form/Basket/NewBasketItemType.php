<?php

namespace KAC\SiteBundle\Form\Basket;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewBasketItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productId', 'entity_id', array(
            'class' => 'KAC\SiteBundle\Entity\Product',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('p')->andWhere('p.status = \'a\'');
            },
        ));
        $builder->add('variantId', 'entity_id', array(
            'class' => 'KAC\SiteBundle\Entity\Product\Variant',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('v')->andWhere('v.status = \'a\'');
            },
        ));
        $builder->add('quantity', 'integer');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Model\BasketItem',
            'csrf_protection'   => false,
        ));
    }

    public function getName()
    {
        return 'site_new_basket_item';
    }
}