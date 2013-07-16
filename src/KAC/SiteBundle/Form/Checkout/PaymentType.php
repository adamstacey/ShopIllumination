<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentType extends AbstractType {
    private $deliveryOptions;

    function __construct($deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paymentType', 'choice', array(
            'choices' => array(
                'sagepay' => 'Credit/Debit Card',
                'paypal' => 'Paypal'
            ),
            'label' => 'Payment Method',
            'required' => true,
        ));
        $builder->add('card', new CardType());

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
        return 'checkout_payment';
    }

    private function getDeliveryChoices()
    {
        $services = array_map(function($element) {
            return $element['service'];
        }, $this->deliveryOptions);

        return array_combine($services, $services);
    }
}