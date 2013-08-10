<?php

namespace KAC\SiteBundle\Form\Order;

use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryCourierSubscriber;
use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryTrackingSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcessDeliveryItemType extends AbstractType {
    private $deliveryManager;

    function __construct($deliveryManager)
    {
        $this->deliveryManager = $deliveryManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numberOfPackages', 'quantity');
        $builder->add('sendReviewRequest', 'checkbox');
        $builder->addEventSubscriber(new UpdateDeliveryTrackingSubscriber($builder->getFormFactory(), $this->deliveryManager));
        $builder->addEventSubscriber(new UpdateDeliveryCourierSubscriber($builder->getFormFactory(), $this->deliveryManager));
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
        return 'order_process_delivery_item';
    }
}