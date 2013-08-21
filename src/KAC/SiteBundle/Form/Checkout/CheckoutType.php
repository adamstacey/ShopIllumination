<?php
namespace KAC\SiteBundle\Form\Checkout;

use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryMethodSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CheckoutType extends AbstractType
{
    private $deliveryManager;

    function __construct($deliveryManager)
    {
        $this->deliveryManager = $deliveryManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // About customer
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
        $builder->add('useBillingAsDelivery', 'checkbox', array(
            'label' => 'Use billing address for delivery?',
            'required' => false,
            'attr' => array(
                'class' => 'billing-as-delivery-input'
            )
        ));

        $builder->add('deliveryType', 'choice');
        $builder->addEventSubscriber(new UpdateDeliveryMethodSubscriber($builder->getFormFactory(), $this->deliveryManager));

        $builder->add('card', new CardType());
        $builder->add('paymentType', 'choice', array(
            'choices' => array(
                'sagepay' => 'Credit/Debit Card',
                'paypal' => 'Paypal',
            ),
            'label' => 'Payment Method',
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
        return 'checkout';
    }
}