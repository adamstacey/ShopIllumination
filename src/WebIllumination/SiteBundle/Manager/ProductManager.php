<?php
namespace WebIllumination\SiteBundle\Manager;

use WebIllumination\SiteBundle\Entity\Product;

class ProductManager
{
    public function createProduct()
    {
        $product = new Product();

        return $product;
    }
}