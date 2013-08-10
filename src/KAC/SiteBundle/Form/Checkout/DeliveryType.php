<?php
namespace KAC\SiteBundle\Form\Checkout;

use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryMethodSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DeliveryType extends AbstractType
{
    private $deliveryManager;

    function __construct($deliveryManager)
    {
        $this->deliveryManager = $deliveryManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('deliveryType', 'choice');
        $builder->addEventSubscriber(new UpdateDeliveryMethodSubscriber($builder->getFormFactory(), $this->deliveryManager));
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
        return 'checkout_delivery';
    }
}