<?php

namespace KAC\SiteBundle\Form\Basket;

use KAC\SiteBundle\Manager\Delivery\DeliveryMethodFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BasketDeliveryType extends AbstractType
{
    private $deliveryMethods;

    function __construct($deliveryMethods)
    {
        $this->deliveryMethods = $deliveryMethods;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('postZipCode', 'text');
        $builder->add('countryCode', 'country');
        $builder->add('method', 'choice', array(
            'choice_list' => new ObjectChoiceList($this->deliveryMethods, 'name')
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