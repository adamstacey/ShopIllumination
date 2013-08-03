<?php
namespace KAC\SiteBundle\Form\Order;

use KAC\SiteBundle\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewOrderType extends AbstractType {
    private $deliveryMethods;

    function __construct($deliveryMethods)
    {
        $this->deliveryMethods = $deliveryMethods;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Customer Info
        $builder->add('firstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
        ));
        $builder->add('lastName', 'text', array(
            'label' => 'Last Name',
            'required' => true,
        ));
        $builder->add('emailAddress', 'email', array(
            'label' => 'Email Address',
            'required' => true,
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

        // Order info
        $builder->add('status', 'choice', array(
            'choices' => array_combine(Order::getStatuses(), Order::getStatuses()),
            'label' => 'Status',
            'required' => true,
        ));
        $builder->add('deliveryType', 'choice', array(
            'choices' => array_combine($this->deliveryMethods, $this->deliveryMethods),
            'label' => 'Delivery Method',
            'required' => true,
        ));


        // Billing address
        $builder->add('billingFirstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
        ));
        $builder->add('billingLastName', 'text', array(
            'label' => 'Last Name',
            'required' => true,
        ));
        $builder->add('billingOrganisationName', 'text', array(
            'label' => 'Organisation',
            'required' => false,
        ));
        $builder->add('billingAddressLine1', 'text', array(
            'label' => 'Address Line 1',
            'required' => true,
        ));
        $builder->add('billingAddressLine2', 'text', array(
            'label' => 'Address Line 2',
            'required' => false,
        ));
        $builder->add('billingTownCity', 'text', array(
            'label' => 'Town/City',
            'required' => true,
        ));
        $builder->add('billingCountyState', 'text', array(
            'label' => 'County',
            'required' => true,
        ));
        $builder->add('billingPostZipCode', 'text', array(
            'label' => 'Post Code',
            'required' => true,
        ));
        $builder->add('billingCountryCode', 'country', array(
            'label' => 'Country',
            'required' => true,
            'preferred_choices' => array(
                'GB'
            )
        ));
        $builder->add('useBillingAsDelivery', 'checkbox', array(
            'label' => 'Use billing address for delivery?',
            'required' => false,
        ));

        // Delivery address
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
        $builder->add('products', 'collection', array(
            'type' => new ProductType(),
            'allow_add' => true,
            'allow_delete' => true,
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