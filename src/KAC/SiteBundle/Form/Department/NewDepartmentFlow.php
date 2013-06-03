<?php

namespace KAC\SiteBundle\Form\Department;

use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Manager\SeoManager;
use Symfony\Component\Form\FormTypeInterface;

class NewDepartmentFlow extends FormFlow
{
    /**
     * @var FormTypeInterface
     */
    protected $formType;
    protected $allowDynamicStepNavigation = true;

    private $seoManager;

    public function __construct($doctrine, SeoManager $seoManager)
    {
        $this->seoManager = $seoManager;
    }

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
            array(
                'label' => '3. Delivery Options',
                'type' => $this->formType,
            ),
            array(
                'label' => '4. Feature Templates',
                'type' => $this->formType,
            ),
            array(
                'label' => '5. Product Templates',
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

        if ($step == 2)
        {
            if (!$formData->getDescription()->getHeader())
            {
                $formData->getDescription()->setHeader($formData->getDescription()->getName());
            }
            if (!$formData->getDescription()->getMenuTitle())
            {
                $formData->getDescription()->setMenuTitle($formData->getDescription()->getName());
            }
            if (!$formData->getDescription()->getPageTitle())
            {
                $formData->getDescription()->setPageTitle($formData->getDescription()->getName());
            }
            if (!$formData->getDescription()->getMetaDescription())
            {
                $formData->getDescription()->setMetaDescription($this->seoManager->removeHtml($formData->getDescription()->getDescription()));
            }
            if (!$formData->getDescription()->getMetaKeywords())
            {
                $formData->getDescription()->setMetaKeywords($this->seoManager->generateKeywords($formData->getDescription()->getName().' '.$formData->getDescription()->getDescription()));
            }
            if (!$formData->getRouting()->getUrl())
            {
                $formData->getRouting()->setUrl($this->seoManager->createUrl($formData->getDescription()->getPageTitle()));
            }
        }

        if ($step == 4)
        {
            // Sort the features in their display order
            $sortedFeatures = array();
            foreach ($formData->getFeatures() as $feature)
            {
                $sortedFeatures[$feature->getDisplayOrder()] = $feature;
                $formData->removeFeature($feature);
            }
            ksort($sortedFeatures);
            foreach ($sortedFeatures as $feature)
            {
                $formData->addFeature($feature);
            }
        }

        return $options;
    }

    public function getName()
    {
        return 'site_new_department';
    }
}
