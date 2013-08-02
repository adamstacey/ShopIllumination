<?php
namespace KAC\SiteBundle\Manager\Delivery;

interface ShippableInterface {
    function getQuantity();
    function getWeight();
    function getBaseDeliveryBand();
} 