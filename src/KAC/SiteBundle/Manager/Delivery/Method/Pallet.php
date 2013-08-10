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
}