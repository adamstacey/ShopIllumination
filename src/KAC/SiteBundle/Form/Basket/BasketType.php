<?php

namespace KAC\SiteBundle\Form\Basket;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class BasketType extends AbstractType
{
    private $deliveryMethods;

    function __construct($deliveryMethods)
    {
        $this->deliveryMethods = $deliveryMethods;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('items', 'collection', array(
            'type' => new BasketItemType(),
        ));
        $builder->add('delivery', new BasketDeliveryType($this->deliveryMethods));
        $builder->add('updateBasket', 'button');
        $builder->add('updateDelivery', 'button');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Model\Basket',
        ));
    }

    public function getName()
    {
        return 'site_basket';
    }
}