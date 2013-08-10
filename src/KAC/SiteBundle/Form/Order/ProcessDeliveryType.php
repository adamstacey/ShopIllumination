<?php

namespace KAC\SiteBundle\Form\Order;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcessDeliveryType extends AbstractType {
    private $deliveryManager;

    function __construct($deliveryManager)
    {
        $this->deliveryManager = $deliveryManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('orders', 'collection', array(
            'type' => new ProcessDeliveryItemType($this->deliveryManager),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'order_process_delivery';
    }
}