<?php

namespace KAC\SiteBundle\Form;

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
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\Variant\Description;
use KAC\SiteBundle\Entity\Product;

class NewProductFlow extends FormFlow
{
    protected $maxSteps = 6;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            '1. Overview',
            '2. Build Combinations',
            '3. Prices',
            '4. Features',
            '5. Images',
            '6. Links'
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

        if ($step > 1)
        {
            $departments = $formData->getDepartments();
            if (count($departments) > 0 && $departments[0]->getDepartment() !== null) {
                $options['departmentId'] = $departments[0]->getDepartment()->getId();
            } else {
                $options['departmentId'] = null;
            }
        }

        if ($step > 2)
        {
            // Generate variations
            $options['variants'] = array();

            // Sort features into groups
            $featureGroups = array();
            foreach ($formData->getFeatures() as $featureGroup)
            {
                if ($featureGroup->getFeature() && $featureGroup->getFeatureGroup())
                {
                    $featureGroups[$featureGroup->getFeatureGroup()->getId()][] = $featureGroup->getFeature();
                }
            }

            // Create array containing each combination of the features
            foreach ($featureGroups as $featureGroup)
            {
                // If variations is empty create the first variations
                if (empty($options['variants']))
                {
                    foreach ($featureGroup as $featureGroupId => $feature)
                    {
                        $options['variants'][] = array($feature);
                    }
                } else {
                    // Create new variations based on the previous variation with the extra features
                    $count = count($options['variants']);
                    for ($i = 0; $i < $count; $i++)
                    {
                        if ($featureGroup)
                        {
                            $variant = array_pop($options['variants']);

                            foreach ($featureGroup as $feature)
                            {
                                $variantTmp = $variant;
                                $variantTmp[] = $feature;
                                array_unshift($options['variants'], $variantTmp);
                            }
                        }
                    }
                }
            }

            // Build the existing combinations to check
            $existingCombinations = array();
            foreach ($formData->getVariants() as $existingVariant)
            {
                $existingCombination = array();
                foreach ($existingVariant->getFeatures() as $variantFeatureGroup)
                {
                    if ($variantFeatureGroup->getFeatureGroup() && $variantFeatureGroup->getFeature())
                    {
                        $existingCombination[] = array('featureGroupId' => $variantFeatureGroup->getFeatureGroup()->getId(), 'featureId' => $variantFeatureGroup->getFeature()->getId());
                    }
                }
                $existingCombinations[] = $existingCombination;
            }

            // Create the variant entities
            foreach ($options['variants'] as $variantFeatures)
            {
                // Build the combinations to check
                $combination = array();
                foreach ($variantFeatures as $feature)
                {
                    $combination[] = array('featureGroupId' => $feature->getFeatureGroup()->getId(), 'featureId' => $feature->getId());
                }

                // Check if the combinations exist already
                $variantExists = false;
                foreach ($existingCombinations as $existingCombination)
                {
                    if ($existingCombination === $combination)
                    {
                        $variantExists = true;
                    }
                }

                if (!$variantExists)
                {
                    $variant = new Variant();
                    foreach ($variantFeatures as $feature)
                    {
                        $variantToFeature = new VariantToFeature();
                        $variantToFeature->setVariant($variant);
                        $variantToFeature->setFeatureGroup($feature->getFeatureGroup());
                        $variantToFeature->setFeature($feature);
                        $variant->addFeature($variantToFeature);
                    }

                    $variant->setProduct($formData);
                    $variant->addPrice(new Price());
                    foreach ($formData->getDescriptions() as $description)
                    {
                        $variantDescription = new Description();
                        $variantDescription->setLocale($description->getLocale());
                        $variantDescription->setDescription($description->getDescription());
                        $variant->addDescription($variantDescription);
                    }
                    $formData->addVariant($variant);
                }
            }

            // Add a single variant if no combinations are set
            if (sizeof($formData->getVariants()) < 1)
            {
                $variant = new Variant();
                $variant->setProduct($formData);
                $variant->addPrice(new Price());
                foreach ($formData->getDescriptions() as $description)
                {
                    $variantDescription = new Description();
                    $variantDescription->setLocale($description->getLocale());
                    $variantDescription->setDescription($description->getDescription());
                    $variant->addDescription($variantDescription);
                }
                $formData->addVariant($variant);
            }
        }

        if ($step == 4)
        {
            // Get the department features
            $departmentFeatures = $formData->getDepartment()->getDepartment()->getFeatures();

            // Go through the variants
            foreach ($formData->getVariants() as $variant)
            {
                // Go through all the default features of the main department
                foreach ($departmentFeatures as $departmentToFeature)
                {
                    // Check if the feature was already added as part of generating the combinations
                    $featureExists = false;
                    foreach ($variant->getFeatures() as $variantToFeature)
                    {
                        if ($variantToFeature->getFeatureGroup()->getId() == $departmentToFeature->getFeatureGroup()->getId())
                        {
                            $featureExists = true;
                        }
                    }

                    // If the feature does not exist add it to the variant
                    if (!$featureExists)
                    {
                        $variantToFeature = new VariantToFeature();
                        $variantToFeature->setVariant($variant);
                        $variantToFeature->setFeatureGroup($departmentToFeature->getFeatureGroup());
                        if ($departmentToFeature->getFeature())
                        {
                            $variantToFeature->setFeature($departmentToFeature->getFeature());
                        }
                        $variant->addFeature($variantToFeature);
                    }
                }
            }
        }

        return $options;
    }
}
