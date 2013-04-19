<?php

namespace KAC\SiteBundle\Form\Variant;

use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product;

class NewVariantFlow extends FormFlow
{


    protected $maxSteps = 5;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            'Enter Variant Details',
            'Choose features',
            'Enter Prices',
            'Images',
            'Enter Dimensions',
        );
    }

    /**
     * @param $formData Variant
     * @param $step
     * @param array $options
     * @return array
     */
    public function getFormOptions($formData, $step, array $options = array())
    {
        $options = parent::getFormOptions($formData, $step, $options);

        $options['cascade_validation'] = true;
        $options['departmentId'] = $formData->getProduct()->getDepartment()->getDepartment()->getId();

        return $options;
    }
}
