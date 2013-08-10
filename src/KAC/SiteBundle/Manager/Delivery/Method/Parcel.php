<?php

namespace KAC\SiteBundle\Manager\Delivery\Method;

abstract class Parcel extends AbstractDeliveryMethod
{
    /**
     * @inherit
     */
    function getType()
    {
        return 'Parcel';
    }
}