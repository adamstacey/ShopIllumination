<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

abstract class Pallet extends AbstractDeliveryMethod
{
    /**
     * @inherit
     */
    function getType()
    {
        return 'Pallet';
    }

    protected function getCourierClasses()
    {
        return array_merge(parent::getCourierClasses(), array(
            'KAC\SiteBundle\Manager\Delivery\Courier\Palletways',
        ));
    }
}