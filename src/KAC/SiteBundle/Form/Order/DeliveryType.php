<?php
namespace KAC\SiteBundle\Form\Order;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeliveryType extends AbstractType {
    private $couriers;

    function __construct($couriers)
    {
        $this->couriers = $couriers;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('deliveryFirstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
        ));
        $builder->add('deliveryLastName', 'text', array(
            'label' => 'Last Name',
            'required' => true,
        ));
        $builder->add('deliveryOrganisationName', 'text', array(
            'label' => 'Organisation',
            'required' => false,
        ));
        $builder->add('deliveryAddressLine1', 'text', array(
            'label' => 'Address Line 1',
            'required' => true,
        ));
        $builder->add('deliveryAddressLine2', 'text', array(
            'label' => 'Address Line 2',
            'required' => false,
        ));
        $builder->add('deliveryTownCity', 'text', array(
            'label' => 'Town/City',
            'required' => true,
        ));
        $builder->add('deliveryCountyState', 'text', array(
            'label' => 'County',
            'required' => true,
        ));
        $builder->add('deliveryPostZipCode', 'text', array(
            'label' => 'Post Code',
            'required' => true,
        ));
        $builder->add('deliveryCountryCode', 'country', array(
            'label' => 'Country',
            'required' => true,
            'preferred_choices' => array(
                'GB'
            )
        ));

        $builder->add('courier', 'choice', array(
            'choices' => $this->couriers,
            'expanded' => true,
            'multiple' => false,
        ));
        $builder->add('numberOfPackages', 'text', array(
            'label' => 'Number Of Packages',
            'required' => true,
        ));
        $builder->add('trackingNumber', 'text', array(
            'label' => 'Tracking Number',
            'required' => true,
        ));
        $builder->add('labelsPrinted', 'text', array(
            'label' => 'Labels Printed',
            'required' => true,
        ));
        $builder->add('sendReviewRequest', 'text', array(
            'label' => 'Review?',
            'required' => true,
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
        return 'checkout_delivery_address';
    }
}