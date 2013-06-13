<?php
namespace KAC\SiteBundle\Manager;

use KAC\SiteBundle\Entity\Product;

class RoutingManager extends Manager
{
    public function __construct($doctrine)
    {
        parent::__construct($doctrine);
    }

    public function getClassName($objectType)
    {
        switch ($objectType)
        {
            case 'brand':
                return "KAC\\SiteBundle\\Entity\\Brand\\Routing";
            case 'brand_with_department':
                return "KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting";
            case 'department':
                return "KAC\\SiteBundle\\Entity\\Department\\Routing";
            case 'product_variant':
                return "KAC\\SiteBundle\\Entity\\Product\\Variant\\Routing";
            case 'product':
                return "KAC\\SiteBundle\\Entity\\Product\\Routing";
            default:
                return false;
        }
    }

    public function getObject($route)
    {
        switch (get_class($route))
        {
            case 'KAC\\SiteBundle\\Entity\\Brand\\Routing':
                return $route->getBrand();
            case 'KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting':
                return $route->getBrand();
            case 'KAC\\SiteBundle\\Entity\\Department\\Routing':
                return $route->getDepartment();
            case 'KAC\\SiteBundle\\Entity\\Product\\Variant\\Routing':
                return $route->getVariant();
            case 'KAC\\SiteBundle\\Entity\\Product\\Routing':
                return $route->getProduct();
            default:
                return null;
        }
    }
}