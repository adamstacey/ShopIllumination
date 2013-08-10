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

    protected function getCourierClasses()
    {
        return array_merge(parent::getCourierClasses(), array(
           'KAC\SiteBundle\Manager\Delivery\Courier\Dpd',
           'KAC\SiteBundle\Manager\Delivery\Courier\Parcelforce',
        ));
    }
}