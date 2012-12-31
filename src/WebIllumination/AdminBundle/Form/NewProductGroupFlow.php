<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Craue\FormFlowBundle\Form\FormFlow;
use WebIllumination\SiteBundle\Entity\Product\Feature;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

class NewProductGroupFlow extends FormFlow
{
    protected $maxSteps = 4;
    protected $allowDynamicStepNavigation = true;

    public function getFormOptions($formData, $step, array $options = array())
    {
        $options = parent::getFormOptions($formData, $step, $options);

        if($step > 1)
        {
            if($formData->getType() === 's')
            {
                $this->addSkipStep(array(3, 4));
            }
        }
        if ($step > 2)
        {
            $options['departments'] = $formData->getDepartments();
            $options['department'] = (isset($options['departments']) && count($options['departments']) > 0) ? $options['departments'][0]->getDepartment()->getId() : null;
        }
        if($step > 3)
        {
            set_time_limit(100);
            // Generate variations
            $options['variants'] = array();

            /**
             * @var \WebIllumination\SiteBundle\Entity\Product $formData
             * @var \WebIllumination\SiteBundle\Entity\Product\FeatureGroup $featureGroup
             */
            foreach($formData->getFeatureGroups() as $featureGroup)
            {
                // If variations is empty create the first variations
                if(empty($options['variants']))
                {
                    foreach($featureGroup->getProductFeature()->getFeatures() as $feature)
                    {
                        $options['variants'][] = array($feature);
                    }
                } else {
                    // Create new variations based on the previous variation with the extra features
                    $count = count($options['variants']);
                    for($i=0;$i<$count;$i++)
                    {
                        $variant = array_pop($options['variants']);

                        foreach($featureGroup->getProductFeature()->getFeatures() as $feature)
                        {
                            $variantTmp = $variant;
                            $variantTmp[] = $feature;
                            array_unshift($options['variants'], $variantTmp);
                        }
                    }
                }
            }

            foreach($options['variants'] as $variantFeatures)
            {
                $variant = new Variant();
                foreach($variantFeatures as $feature)
                {
                    $productToFeature = new ProductToFeature();
                    $productToFeature->setVariant($variant);
                    $productToFeature->setProductFeature($feature->getProductFeatureGroup());
                    $productToFeature->setDefaultFeature($feature);
                    $variant->addFeature($productToFeature);
                }
                $formData->addVariant($variant);
            }

        }

        return $options;
    }

    protected function loadStepDescriptions() {
        return array(
            'Choose Product Type',
            'Enter Product Details',
            'Choose Features',
            'Edit Product Variations',
        );
    }
}
