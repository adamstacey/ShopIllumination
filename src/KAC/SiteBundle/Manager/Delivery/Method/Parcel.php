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

    function getCouriers()
    {
        return array_merge(parent::getCouriers(), array(
           'KAC\SiteBundle\Manager\Delivery\Courier\Dpd',
           'KAC\SiteBundle\Manager\Delivery\Courier\Parcelforce',
        ));
    }
}