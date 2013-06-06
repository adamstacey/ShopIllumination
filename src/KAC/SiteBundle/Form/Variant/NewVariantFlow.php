<?php

namespace KAC\SiteBundle\Form\Variant;

use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use Symfony\Component\Form\FormTypeInterface;

class NewVariantFlow extends FormFlow
{
    /**
     * @var FormTypeInterface
     */
    protected $formType;
    protected $allowDynamicStepNavigation = true;

    public function setFormType(FormTypeInterface $formType) {
        $this->formType = $formType;
    }

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => '1. Overview',
                'type' => $this->formType,
            ),
            array(
                'label' => '2. Features',
                'type' => $this->formType,
            ),
            array(
                'label' => '3. Descriptions',
                'type' => $this->formType,
            ),
            array(
                'label' => '4. SEO',
                'type' => $this->formType,
            ),
            array(
                'label' => '5. Prices',
                'type' => $this->formType,
            ),
            array(
                'label' => '6. Delivery',
                'type' => $this->formType,
            ),
            array(
                'label' => '7. Uploads',
                'type' => $this->formType,
            ),
            array(
                'label' => '8. Images',
                'type' => $this->formType,
            ),
            array(
                'label' => '9. Documents',
                'type' => $this->formType,
            ),
        );
    }

    public function getFormOptions($step, array $options = array())
    {
        $options = parent::getFormOptions($step, $options);
        $options['cascade_validation'] = true;
        $options['flowStep'] = $step;

        $formData = $this->getFormData();

        $options['departmentId'] = $formData->getProduct()->getDepartment()->getDepartment()->getId();

        if ($step == 2)
        {
            // Get the department features
            $departmentFeatures = $formData->getProduct()->getDepartment()->getDepartment()->getFeatures();

            // Go through the variants
            // Go through all the default features of the main department
            foreach ($departmentFeatures as $departmentToFeature)
            {
                // Check if the feature was already added as part of generating the combinations
                $featureExists = false;
                foreach ($formData->getFeatures() as $variantToFeature)
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
                    $variantToFeature->setVariant($formData);
                    $variantToFeature->setFeatureGroup($departmentToFeature->getFeatureGroup());
                    if ($departmentToFeature->getFeature())
                    {
                        $variantToFeature->setFeature($departmentToFeature->getFeature());
                    }
                    $formData->addFeature($variantToFeature);
                }
            }
        }

        return $options;
    }

    public function getName()
    {
        return 'site_new_variant';
    }
}
