<?php
namespace KAC\SiteBundle\Manager\Templating;

use Symfony\Component\PropertyAccess\PropertyPath;

class ProductTemplateBuilder extends TemplateBuilder
{
    protected $aliases = array(
        'brand' => 'product.brand.description.name',
        'productCode' => 'product.productCode',
        'department' => 'product.department.department.description.name',
    );

    function getEntity($object, $alias, $id)
    {
        return false;
    }
}