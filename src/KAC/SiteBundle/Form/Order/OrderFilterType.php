<?php

namespace KAC\SiteBundle\Form\Order;

use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\Form\FormBuilderInterface;

class OrderFilterType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id', 'text', array(
            'label' => 'Order ID',
            'required' => false,
            'attr' => array('class' => 'fill'),
        ));
        $builder->add('name', 'text', array(
            'label' => 'Customer',
            'required' => false,
            'attr' => array('class' => 'fill'),
        ));
        $builder->add('emailAddress', 'email', array(
            'label' => 'E-Mail',
            'required' => false,
            'attr' => array('class' => 'fill'),
        ));
        $builder->add('status', 'email', array(
            'label' => 'E-Mail',
            'required' => false,
            'attr' => array('class' => 'fill'),
        ));
        $builder->add('status', 'choice', array(
            'label' => 'Status',
            'choices' => array_combine(Order::getStatuses(), Order::getStatuses()),
            'multiple' => true,
            'required' => false,
        ));
        $builder->add('paymentType', 'choice', array(
            'label' => 'Payment Type',
            'choices' => array(
    		 'SagePay' =>' SagePay',
    		 'PayPal through SagePay' => 'PayPal through SagePay',
    		 'PayPal' =>'PayPal',
            ),
            'multiple' => true,
            'required' => false,
        ));
        $builder->add('deliveryType', 'choice', array(
            'label' => 'Delivery Method',
            'choice_list' => new ObjectChoiceList(array_combine(DeliveryFactory::getAllMethodNames(), DeliveryFactory::getAllMethods()), 'name', array(), null, 'name'),
            'multiple' => true,
            'required' => false,
        ));
        $builder->add('createdAtFrom', 'date', array(
            'label' => 'Date From',
            'required' => false,
            'widget' => 'single_text',
        ));
        $builder->add('createdAtTo', 'date', array(
            'label' => 'Date To',
            'required' => false,
            'widget' => 'single_text',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'order_note';
    }
} 