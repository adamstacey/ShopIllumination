<?php

namespace KAC\SiteBundle\Form\Basket;

use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BasketDeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('postZipCode', 'text');
        $builder->add('countryCode', 'country');
        $builder->add('method', 'choice', array(
            'choices' => array_combine(DeliveryMethodFactory::getAllMethodNames(), DeliveryMethodFactory::getAllMethodNames()),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Model\BasketDeliveryInfo',
        ));
    }

    public function getName()
    {
        return 'site_basket_item';
    }
}