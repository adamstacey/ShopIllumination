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
        if ($alias == 'VariantToFeature')
        {
            if ($object->getVariant())
            {
                $featureId = 0;
                foreach ($object->getVariant()->getFeatures() as $feature)
                {
                    if ($feature->getFeatureGroup()->getId() == $id)
                    {
                        $featureId = $feature->getFeature()->getId();
                        break;
                    }
                }
            }
            $feature = $this->em->getRepository('KAC\SiteBundle\Entity\Product\Feature')->find($featureId);

            if ($feature) {
                return $feature;
            }
        }

        return false;
    }
}