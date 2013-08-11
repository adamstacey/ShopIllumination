<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

abstract class RoyalMail extends AbstractDeliveryMethod
{
    /**
     * @inherit
     */
    function getType()
    {
        return 'Royal Mail';
    }

    protected function getCourierClasses()
    {
        return array_merge(parent::getCourierClasses(), array(
            'KAC\SiteBundle\Manager\Delivery\Courier\RoyalMail',
        ));
    }
}