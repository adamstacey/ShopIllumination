<?php

namespace KAC\SiteBundle\Manager\Delivery\Courier;

class Dpd extends AbstractCourier
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName()
    {
        return 'DPD';
    }
}