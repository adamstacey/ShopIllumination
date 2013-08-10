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
}