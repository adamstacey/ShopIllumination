<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CheckoutType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
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
                break;
            case 2:
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
                break;
            case 3:
                $builder->add('paymentType', 'choice', array(
                    'choices' => array(
                        'card' => 'Credit/Debit Card',
                        'paypal' => 'Paypal'
                    ),
                    'label' => 'Payment Method',
                    'required' => true,
                ));
                $builder->add('paymentStatus', 'hidden');
                $builder->add('card', new CardType());
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
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

    private function getViableYears()
    {
        $yearChoices = array();
        $currentYear = (int) date("Y");

        for ($i = 0; $i <= 20; $i++) {
            $yearChoices[$currentYear + $i] = $currentYear + $i;
        }

        return $yearChoices;
    }
}