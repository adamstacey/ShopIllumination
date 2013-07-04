<?php

namespace KAC\SiteBundle\Form\Basket;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BasketItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        return 'site_basket_item';
    }
}