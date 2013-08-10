<?php
namespace KAC\SiteBundle\Manager\Delivery\Courier;

interface CourierInterface
{
    /**
     * Get the name of the courier
     *
     * @return string
     */
    function getName();

    /**
     * Get the description of the courier
     *
     * @return string
     */
    function getDescription();
}