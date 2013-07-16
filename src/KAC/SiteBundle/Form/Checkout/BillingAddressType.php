<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BillingAddressType extends AbstractType {
    private $deliveryOptions;

    function __construct($deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        $builder->add('deliveryType', 'choice', array(
            'choices' => $this->getDeliveryChoices(),
            'expanded' => true,
            'multiple' => false,
        ));
        $builder->add('updateDelivery', 'submit');
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
        return 'checkout_billing_address';
    }

    private function getDeliveryChoices()
    {
        $services = array_map(function($element) {
            return $element['service'];
        }, $this->deliveryOptions);

        return array_combine($services, $services);
    }
}