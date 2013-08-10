<?php

namespace KAC\SiteBundle\Form\DataTransformer;

use KAC\SiteBundle\Manager\Delivery\Courier\CourierInterface;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class CourierStringToObjectTransformer implements DataTransformerInterface
{
    /**
     * Transforms an string (courier name) to an object (courier).
     *
     * @param  string|null $courierName
     *
     * @throws TransformationFailedException
     *
     * @return CourierInterface
     */
    public function transform($courierName)
    {
        if (null === $courierName || $courierName == '') {
            return null;
        }

        if(null === $courier = DeliveryFactory::getCourier($courierName))
        {
            throw new TransformationFailedException(sprintf(
                'A courier with the name "%s" does not exist',
                $courierName
            ));
        }

        return $courier;
    }

    /**
     * Transforms an object (courier) to a string (courier name).
     *
     * @param  CourierInterface $courier
     *
     * @return string
     */
    public function reverseTransform($courier)
    {
        if (!$courier) {
            return null;
        }

        return $courier->getName();
    }
}