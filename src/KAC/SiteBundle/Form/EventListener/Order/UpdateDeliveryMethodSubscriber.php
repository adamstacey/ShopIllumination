<?php

namespace KAC\SiteBundle\Form\EventListener\Order;

use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\DataTransformer\CourierStringToObjectTransformer;
use KAC\SiteBundle\Form\DataTransformer\MethodStringToObjectTransformer;
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

class UpdateDeliveryMethodSubscriber implements EventSubscriberInterface
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
         * @var Order $order
         */
        $order = $event->getData();
        $form = $event->getForm();

        if(null === $order) {
            return;
        }

        $zone = $this->deliveryManager->calculateZone($order->getDeliveryCountryCode(), $order->getDeliveryPostZipCode());
        $band = $this->deliveryManager->calculateBand($order->getProducts());
        $methods = DeliveryFactory::getMethods($zone, $band);

        $this->customizeForm($form, $methods);
    }

    protected function customizeForm(FormInterface $form, $methods)
    {
        $methodBuilder = $this->factory->createNamedBuilder('deliveryType', 'choice', null, array(
            'choice_list' => new ObjectChoiceList(array_combine(array_map(function(DeliveryMethodInterface $method) {
                return $method->getName();
            }, $methods), $methods), 'name', array(), null, 'name'),
            'expanded' => true,
            'required' => false,
            'empty_value' => null,
            'auto_initialize' => false,
        ));
        $methodBuilder->addModelTransformer(new MethodStringToObjectTransformer());

        $form->remove('deliveryType');
        $form->add($methodBuilder->getForm());
    }
}