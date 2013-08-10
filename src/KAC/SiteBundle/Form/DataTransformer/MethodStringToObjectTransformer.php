<?php

namespace KAC\SiteBundle\Form\DataTransformer;

use KAC\SiteBundle\Manager\Delivery\Method\DeliveryMethodInterface;
use KAC\SiteBundle\Manager\Delivery\DeliveryFactory;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class MethodStringToObjectTransformer implements DataTransformerInterface
{
    /**
     * Transforms an string (method name) to an object (method).
     *
     * @param  string|null $methodName
     *
     * @throws TransformationFailedException
     *
     * @return DeliveryMethodInterface
     */
    public function transform($methodName)
    {
        if (null === $methodName || $methodName == '') {
            return null;
        }

        if(null === $method = DeliveryFactory::getMethod($methodName))
        {
            throw new TransformationFailedException(sprintf(
                'A method with the name "%s" does not exist',
                $methodName
            ));
        }

        return $method;
    }

    /**
     * Transforms an object (method) to a string (method name).
     *
     * @param  DeliveryMethodInterface $method
     *
     * @return string
     */
    public function reverseTransform($method)
    {
        if (!$method) {
            return null;
        }

        return $method->getName();
    }
}