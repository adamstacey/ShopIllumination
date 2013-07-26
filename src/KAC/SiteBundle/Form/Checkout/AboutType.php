<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AboutType extends AbstractType {
    private $deliveryOptions;

    function __construct($deliveryOptions)
    {
        $this->deliveryOptions = $deliveryOptions;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
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
        return 'checkout_about';
    }

    private function getDeliveryChoices()
    {
        $services = array_map(function($element) {
            return $element['service'];
        }, $this->deliveryOptions);

        return array_combine($services, $services);
    }
}