<?php
namespace KAC\SiteBundle\Manager\Templating;

use Symfony\Component\Form\Util\PropertyPath;

class VariantTemplateBuilder extends TemplateBuilder
{
    protected $aliases = array(
        'brand' => 'variant.product.brand.description.name',
        'productCode' => 'variant.productCode',
        'department' => 'variant.product.department.description.name',
    );

    function getEntity($object, $alias, $id)
    {
        if($alias === 'VariantToFeature')
        {
            $query = $this->em->createQuery("SELECT f FROM KAC\SiteBundle\Entity\Product\Feature f WHERE f = (SELECT IDENTITY(vtf.feature) FROM KAC\SiteBundle\Entity\Product\VariantToFeature vtf WHERE vtf.featureGroup = ?1 AND vtf.variant = ?2)");
            $query->setParameter(1, $id);
            $query->setParameter(2, $object->getVariant()->getId());
            $objects = $query->execute();

            if($objects) {
                return $objects[0];
            }
        }

        return false;
    }
}