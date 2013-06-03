<?php

namespace KAC\SiteBundle\Form\Variant;

use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product;
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
                'label' => 'Enter Variant Details',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Choose features',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Enter Prices',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Images',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Enter Dimensions',
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

        return $options;
    }

    public function getName()
    {
        return 'site_new_variant';
    }
}
