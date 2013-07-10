<?php
namespace KAC\SiteBundle\Form\Checkout;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Model\Basket;
use Omnipay\Common\CreditCard;
use Omnipay\Common\GatewayFactory;
use Omnipay\SagePay\DirectGateway;
use Symfony\Component\Form\FormTypeInterface;

class CheckoutFlow extends FormFlow {

    /**
     * @var FormTypeInterface
     */
    protected $formType;
    protected $basket;
    protected $allowDynamicStepNavigation = true;

    public function setFormType(FormTypeInterface $formType) {
        $this->formType = $formType;
    }

    public function setBasket(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function getName() {
        return 'checkout';
    }

    protected function loadStepsConfig() {
        return array(
            array(
                'label' => 'Billing Address',
                'type' => $this->formType,
            ),
            array(
                'label' => 'Delivery Address',
                'type' => $this->formType,
                'skip' => function($estimatedCurrentStepNumber, FormFlowInterface $flow) {
                    return $estimatedCurrentStepNumber > 1 && $flow->getFormData()->getUseBillingAsDelivery();
                },
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

        /**
         * @var $formData Order
         */
        $formData = $this->getFormData();
        $options['flowStep'] = $step;

        if($step === 2)
        {
            if($formData->getUseBillingAsDelivery())
            {
                $formData->setDeliveryFirstName($formData->getBillingFirstName());
                $formData->setDeliveryLastName($formData->getBillingLastName());
                $formData->setDeliveryOrganisationName($formData->getBillingOrganisationName());
                $formData->setDeliveryAddressLine1($formData->getBillingAddressLine1());
                $formData->setDeliveryAddressLine2($formData->getBillingAddressLine2());
                $formData->setDeliveryTownCity($formData->getBillingTownCity());
                $formData->setDeliveryCountyState($formData->getBillingCountyState());
                $formData->setDeliveryPostZipCode($formData->getBillingPostZipCode());
                $formData->setDeliveryCountryCode($formData->getBillingCountryCode());
            }
        }
        if($step == 3)
        {
            $formData->getCard()->setBillingFirstName($formData->getBillingFirstName());
            $formData->getCard()->setBillingLastName($formData->getBillingLastName());
            $formData->getCard()->setBillingCompany($formData->getBillingOrganisationName());
            $formData->getCard()->setBillingAddress1($formData->getBillingAddressLine1());
            $formData->getCard()->setBillingAddress2($formData->getBillingAddressLine2());
            $formData->getCard()->setBillingCity($formData->getBillingTownCity());
            $formData->getCard()->setBillingState($formData->getBillingCountyState());
            $formData->getCard()->setBillingPostCode($formData->getBillingPostZipCode());
            $formData->getCard()->setBillingCountry($formData->getBillingCountryCode());
            $formData->getCard()->setShippingFirstName($formData->getDeliveryFirstName());
            $formData->getCard()->setShippingLastName($formData->getDeliveryLastName());
            $formData->getCard()->setShippingCompany($formData->getDeliveryOrganisationName());
            $formData->getCard()->setShippingAddress1($formData->getDeliveryAddressLine1());
            $formData->getCard()->setShippingAddress2($formData->getDeliveryAddressLine2());
            $formData->getCard()->setShippingCity($formData->getDeliveryTownCity());
            $formData->getCard()->setShippingState($formData->getDeliveryCountyState());
            $formData->getCard()->setShippingPostCode($formData->getDeliveryPostZipCode());
            $formData->getCard()->setShippingCountry($formData->getDeliveryCountryCode());
        }

        return $options;
    }

}