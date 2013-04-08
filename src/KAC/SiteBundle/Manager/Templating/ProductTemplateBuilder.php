<?php
namespace KAC\SiteBundle\Manager\Templating;

use Symfony\Component\Form\Util\PropertyPath;

class ProductTemplateBuilder extends TemplateBuilder
{
    protected $aliases = array(
        'brand' => 'variant.product.brand.description.name',
        'productCode' => 'variant.productCode',
        'department' => 'variant.product.department.description.name',
    );

    function getEntity($object, $alias, $id)
    {
        return false;
    }
}