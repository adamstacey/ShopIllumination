<?php

namespace WebIllumination\SiteBundle\Form;

use Craue\FormFlowBundle\Event\PostBindRequestEvent;
use Craue\FormFlowBundle\Event\PostBindSavedDataEvent;
use Craue\FormFlowBundle\Event\PostValidateEvent;
use Craue\FormFlowBundle\Event\PreBindEvent;
use Craue\FormFlowBundle\Form\FormFlowEvents;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Craue\FormFlowBundle\Form\FormFlow;
use WebIllumination\SiteBundle\Entity\Product\Feature;
use WebIllumination\SiteBundle\Entity\Product\Price;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\Product\VariantDescription;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

class NewProductFlow extends FormFlow
{


    protected $maxSteps = 5;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            'Enter Product Details',
            'Select Features',
            'Edit Product Variations - Overview',
            'Edit Product Variations - Images',
            'Edit Product Variations - Prices',
        );
    }

    /**
     * @param $formData Product
     * @param $step
     * @param array $options
     * @return array
     */
    public function getFormOptions($formData, $step, array $options = array())
    {
        $options = parent::getFormOptions($formData, $step, $options);

        $options['cascade_validation'] = true;

        if($step > 1)
        {
            $departments = $formData->getDepartments();
            if(count($departments) > 0 && $departments[0]->getDepartment() !== null) {
                $options['departmentId'] = $departments[0]->getDepartment()->getId();
            } else {
                $options['departmentId'] = null;
            }
        }
        if($step > 2)
        {
            // Generate variations
            $options['variants'] = array();

            // Sort features into groups
            $featureGroups = array();
            foreach($formData->getFeatures() as $featureGroup)
            {
                if($featureGroup->getDefaultFeature())
                {
                    $featureGroups[$featureGroup->getProductFeature()->getId()][] = $featureGroup->getDefaultFeature();
                }
            }

            // Create array containing each combination of the features
            foreach($featureGroups as $featureGroup)
            {
                // If variations is empty create the first variations
                if(empty($options['variants']))
                {
                    foreach($featureGroup as $feature)
                    {
                        $options['variants'][] = array($feature);
                    }
                } else {
                    // Create new variations based on the previous variation with the extra features
                    $count = count($options['variants']);
                    for($i=0;$i<$count;$i++)
                    {
                        if($featureGroup)
                        {
                            $variant = array_pop($options['variants']);

                            foreach($featureGroup as $feature)
                            {
                                $variantTmp = $variant;
                                $variantTmp[] = $feature;
                                array_unshift($options['variants'], $variantTmp);
                            }
                        }
                    }
                }
            }

            // Create the variant entities
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
                $variant->setProduct($formData);
                $variant->addPrice(new Price());
                foreach($formData->getDescriptions() as $description)
                {
                    $variantDescription = new VariantDescription();
                    $variantDescription->setLocale($description->getLocale());
                    $variantDescription->setDescription($description->getDescription());
                    $variant->addDescription($variantDescription);
                }
                $formData->addVariant($variant);
            }
        }

        return $options;
    }
}
