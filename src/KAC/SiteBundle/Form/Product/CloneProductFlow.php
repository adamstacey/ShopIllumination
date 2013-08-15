<?php

namespace KAC\SiteBundle\Form\Product;

use Craue\FormFlowBundle\Form\FormFlowInterface;
use KAC\SiteBundle\ThirdParty\Google\Google;
use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\Variant\Description;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Manager\SeoManager;
use KAC\SiteBundle\Manager\ProductManager;
use Symfony\Component\Form\FormTypeInterface;

class CloneProductFlow extends NewProductFlow
{
    public function getName()
    {
        return 'site_clone_product';
    }
}
