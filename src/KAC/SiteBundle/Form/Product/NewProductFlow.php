<?php

namespace KAC\SiteBundle\Form\Product;

use KAC\SiteBundle\ThirdParty\Google\Google;
use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\Variant\Description;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Manager\SeoManager;
use KAC\SiteBundle\Manager\ProductManager;

class NewProductFlow extends FormFlow
{
    protected $seoManager;
    protected $productManager;
    protected $googleApi;

    protected $maxSteps = 11;
    protected $allowDynamicStepNavigation = true;

    function __construct(SeoManager $seoManager, ProductManager $productManager, Google $googleApi)
    {
        $this->seoManager = $seoManager;
        $this->productManager = $productManager;
        $this->googleApi = $googleApi;
    }

    protected function loadStepDescriptions() {
        return array(
            '1. Overview',
            '2. Build Combinations',
            '3. Prices',
            '4. Delivery',
            '5. Unique Identifiers',
            '6. Features',
            '7. Descriptions',
            '8. SEO',
            '9. Uploads',
            '10. Images',
            '11. Links'
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
            // Go through the variants and update any zero recommended retail prices
            foreach ($formData->getVariants() as $variant)
            {
                if ($variant)
                {
                    foreach ($variant->getPrices() as $price)
                    {
                        if ($price)
                        {
                            if ($price->getRecommendedRetailPrice() < 0.01)
                            {
                                $price->setRecommendedRetailPrice($price->getListPrice());
                            }
                        }
                    }
                }
            }
        }

        if ($step == 3)
        {
            // Generate combinations
            $combinations = array();

            // Sort features into groups
            $productFeatures = array();
            foreach ($formData->getFeatures() as $productFeature)
            {
                if ($productFeature->getFeature() && $productFeature->getFeatureGroup())
                {
                    $productFeatures[$productFeature->getFeatureGroup()->getId()][] = $productFeature->getFeature();
                }
            }

            // Create array containing each combination of the features
            foreach ($productFeatures as $features)
            {
                // If variations is empty create the first variations
                if (empty($combinations))
                {
                    foreach ($features as $feature)
                    {
                        $combinations[] = array($feature);
                    }
                } else {
                    // Create new variations based on the previous variation with the extra features
                    $combinationCount = count($combinations);
                    for ($combinationLoop = 0; $combinationLoop < $combinationCount; $combinationLoop++)
                    {
                        if ($features)
                        {
                            $variant = array_pop($combinations);
                            foreach ($features as $feature)
                            {
                                $variantTmp = $variant;
                                $variantTmp[] = $feature;
                                array_unshift($combinations, $variantTmp);
                            }
                        }
                    }
                }
            }

            // Get the combination groups to check against
            $combinationGroups = array();
            foreach ($combinations as $combination)
            {
                foreach ($combination as $feature)
                {
                    if (!in_array($feature->getFeatureGroup()->getId(), $combinationGroups))
                    {
                        $combinationGroups[] = $feature->getFeatureGroup()->getId();
                    }
                }
            }
            sort($combinationGroups);

            // Build a list of the feature ids from the combinations to check
            $combinationsToCheck = array();
            foreach ($combinations as $combination)
            {
                $combinationToCheck = array();
                foreach ($combination as $feature)
                {
                    $combinationToCheck[$feature->getFeatureGroup()->getId()] = $feature->getId();
                }
                ksort($combinationToCheck);
                $combinationsToCheck[] = $combinationToCheck;
            }

            // Build a list of the feature ids from the variants to check against
            $variantsToCheck = array();
            foreach ($formData->getVariants() as $variant)
            {
                if ($variant)
                {
                    $variantToCheck = array();
                    foreach ($variant->getFeatures() as $variantFeature)
                    {
                        if ($variantFeature->getFeatureGroup() && $variantFeature->getFeature())
                        {
                            if (in_array($variantFeature->getFeatureGroup()->getId(), $combinationGroups))
                            {
                                $variantToCheck[$variantFeature->getFeatureGroup()->getId()] = $variantFeature->getFeature()->getId();
                            }
                        }
                    }
                    ksort($variantToCheck);
                    $variantsToCheck[] = $variantToCheck;
                }
            }

            // Get the default delivery band for the variants to inherit
            $deliveryBand = null;
            if ($productToDepartment = $formData->getDepartment())
            {
                if ($department = $productToDepartment->getDepartment())
                {
                    if ($department->getDeliveryBand() > 0)
                    {
                        $deliveryBand = $department->getDeliveryBand();
                    } elseif ($department->getInheritedDeliveryBand() > 0) {
                        $deliveryBand = $department->getInheritedDeliveryBand();
                    }
                }
            }

            // Check to see if a variant exists and add if required
            foreach ($combinationsToCheck as $index => $combinationToCheck)
            {
                $variantExists = false;
                foreach ($variantsToCheck as $variantToCheck)
                {
                    if ($combinationToCheck === $variantToCheck)
                    {
                        $variantExists = true;
                        break;
                    }
                }
                if (!$variantExists)
                {
                    $variant = new Variant();
                    foreach ($combinations[$index] as $feature)
                    {
                        $variantToFeature = new VariantToFeature();
                        $variantToFeature->setVariant($variant);
                        $variantToFeature->setFeatureGroup($feature->getFeatureGroup());
                        $variantToFeature->setFeature($feature);
                        $variant->addFeature($variantToFeature);
                    }

                    $variant->setDeliveryBand($deliveryBand);
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
                $variant->setDeliveryBand($deliveryBand);
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
            // Sort the variants in their display order
            if (sizeof($formData->getVariants()) > 1)
            {
                $sortedVariants = array();
                foreach ($formData->getVariants() as $variant)
                {
                    if ($variant)
                    {
                        $displayOrder = $variant->getDisplayOrder();
                        while (isset($sortedVariants[$displayOrder]))
                        {
                            $displayOrder++;
                        }
                        $sortedVariants[$displayOrder] = $variant;
                        $formData->removeVariant($variant);
                    }
                }
                ksort($sortedVariants);
                foreach ($sortedVariants as $variant)
                {
                    $formData->addVariant($variant);
                }
            }
        }

        if ($step == 5)
        {
            // Attempt to load variant UIDs from google
            foreach ($formData->getVariants() as $variant)
            {
                $result = $this->googleApi->findProductUids($variant->getProductCode());

                if (isset($result["items"][0]["product"]["mpns"][0]))
                {
                    $variant->setMpn($result["items"][0]["product"]["mpns"][0]);
                }
                if (isset($result["items"][0]["product"]["gtins"]))
                {
                    foreach($result["items"][0]["product"]["gtins"] as $gtin)
                    {
                        if(strlen($gtin) === 12)
                        {
                            $variant->setUpc($gtin);
                        } elseif(strlen($gtin) === 14) {
                            $variant->setEan($gtin);
                        } elseif(strlen($gtin) === 10) {
                            $variant->setIsbn($gtin);
                        } elseif(strlen($gtin) === 13) {
                            $variant->setEan($gtin);
                            $variant->setJan($gtin);
                            $variant->setIsbn($gtin);
                        } else {
                            $variant->setUpc($gtin);
                            $variant->setEan($gtin);
                            $variant->setJan($gtin);
                            $variant->setIsbn($gtin);
                        }

                    }
                }
            }
        }

        if ($step == 6)
        {
            // Get the department features
            $departmentFeatures = $formData->getDepartment()->getDepartment()->getFeatures();

            // Go through the variants
            foreach ($formData->getVariants() as $variant)
            {
                if ($variant)
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
        }

        if (($step == 8) || ($step == 9))
        {
            // Update the variant descriptions
            foreach ($formData->getVariants() as $variant)
            {
                $this->productManager->updateVariantDescription($variant->getDescription());
            }

            // Update the product description
            foreach ($formData->getDescriptions() as $description)
            {
                $this->productManager->updateProductDescription($description);
            }

            // Check the URLs
            $duplicateUrlsCheck = array();

            // Check the variant URLs
            foreach ($formData->getVariants() as $variant)
            {
                foreach ($variant->getRoutings() as $routing)
                {
                    $url = $this->seoManager->createUrl($routing->getUrl());
                    $duplicateCount = 0;
                    while (in_array($url, $duplicateUrlsCheck))
                    {
                        $duplicateCount++;
                        $url = $this->seoManager->createUrl($url.'-'.$duplicateCount);
                    }
                    $duplicateUrlsCheck[] = $url;
                    $routing->setUrl($url);
                }
            }

            // Check the product URLs
            foreach ($formData->getRoutings() as $routing)
            {
                $url = $this->seoManager->createUrl($routing->getUrl());
                $duplicateCount = 0;
                while (in_array($url, $duplicateUrlsCheck))
                {
                    $duplicateCount++;
                    $url = $this->seoManager->createUrl($url.'-'.$duplicateCount);
                }
                $duplicateUrlsCheck[] = $url;
                $routing->setUrl($url);
            }
        }

        return $options;
    }
}
