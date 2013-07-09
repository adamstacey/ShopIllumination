<?php
namespace KAC\SiteBundle\Form\Checkout;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use Symfony\Component\Form\FormTypeInterface;

class CheckoutFlow extends FormFlow {

    /**
     * @var FormTypeInterface
     */
    protected $formType;
    protected $allowDynamicStepNavigation = true;

    public function setFormType(FormTypeInterface $formType) {
        $this->formType = $formType;
    }

    public function getName() {
        return 'checkout';
    }

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'Delivery Info',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Payment Method',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Confirmation',
                'type' => $this->formType,
            ),
        );
    }

    public function getFormOptions($step, array $options = array()) {
        $options = parent::getFormOptions($step, $options);

        $options['flowStep'] = $step;

        return $options;
    }

}