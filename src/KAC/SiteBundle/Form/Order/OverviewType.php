<?php
namespace KAC\SiteBundle\Form\Order;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OverviewType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
        ));
        $builder->add('lastName', 'text', array(
            'label' => 'Last Name',
            'required' => true,
        ));
        $builder->add('emailAddress', 'repeated', array(
            'type' => 'email',
            'invalid_message' => 'Your emails must match.',
            'required' => true,
            'first_options'  => array('label' => 'Email Address'),
            'second_options' => array('label' => 'Confirm Email Address'),
        ));
        $builder->add('telephoneDaytime', 'text', array(
            'label' => 'Telephone (Daytime)',
            'required' => true,
        ));

        $builder->add('telephoneEvening', 'text', array(
            'label' => 'Telephone (Evening)',
            'required' => false,
        ));

        $builder->add('mobile', 'text', array(
            'label' => 'Mobile',
            'required' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Order',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'order_overview';
    }
}