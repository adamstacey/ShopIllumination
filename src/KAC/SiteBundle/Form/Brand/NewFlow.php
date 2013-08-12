<?php

namespace KAC\SiteBundle\Form\Brand;

use Craue\FormFlowBundle\Form\FormFlowInterface;
use KAC\SiteBundle\ThirdParty\Google\Google;
use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantToFeature;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\Variant\Description;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Manager\SeoManager;
use KAC\SiteBundle\Manager\ProductManager;
use Symfony\Component\Form\FormTypeInterface;

class NewFlow extends FormFlow
{
    protected $seoManager;
    protected $productManager;
    protected $googleApi;

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
                'label' => '2. SEO',
                'type' => $this->formType,
            ),
        );
    }

    public function getFormOptions($step, array $options = array())
    {
        $options = parent::getFormOptions($step, $options);
        $options['cascade_validation'] = true;
        $options['flowStep'] = $step;

        /**
         * @var $formData Product
         */
        $formData = $this->getFormData();

        return $options;
    }

    public function getName()
    {
        return 'site_new_product';
    }
}
