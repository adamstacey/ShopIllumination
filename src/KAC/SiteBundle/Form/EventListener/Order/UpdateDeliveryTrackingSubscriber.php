<?php

namespace KAC\SiteBundle\Form\EventListener\Order;

use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Manager\Delivery\Courier\CourierInterface;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use KAC\SiteBundle\Manager\Delivery\Method\DeliveryMethodInterface;
use KAC\SiteBundle\Manager\DeliveryManager;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormInterface;

class UpdateDeliveryTrackingSubscriber implements EventSubscriberInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $factory;

    /**
     * @var DeliveryManager
     */
    private $deliveryManager;

    public function __construct(FormFactoryInterface $factory, DeliveryManager $deliveryManager)
    {
        $this->factory = $factory;
        $this->deliveryManager = $deliveryManager;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
        );
    }

    /**
     * @param FormEvent $event
     */
    public function preSetData(FormEvent $event)
    {
        /**
         * @param Order $order
         */
        $order = $event->getData();
        $form = $event->getForm();

        if(null === $order) {
            return;
        }

        // Only continue if the delivery type was set
        $deliveryType = $order->getDeliveryType();
        if (null === $deliveryType) {
            return;
        }

        $method = DeliveryFactory::getMethod($deliveryType);
        if($method === null) {
            return;
        }

        $this->customizeForm($form, $method);
    }

    protected function customizeForm(FormInterface $form, DeliveryMethodInterface $method)
    {
        // If the method is royal mail or parcel then add a field for the tracking information
        if($method->getType() === 'Royal Mail' || $method->getType() === 'Parcel')
        {
            $form->add($this->factory->createNamed('trackingNumber', 'text', null, array(
                'auto_initialize' => false,
                'attr' => array('class' => 'fill')
            )));
        }
    }
}