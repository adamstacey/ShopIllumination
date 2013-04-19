<?php

namespace KAC\SiteBundle\Form\Department;

use Craue\FormFlowBundle\Form\FormFlow;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Manager\SeoManager;

class NewDepartmentFlow extends FormFlow
{
    protected $maxSteps = 5;
    protected $allowDynamicStepNavigation = true;

    private $seoManager;

    public function __construct($doctrine, SeoManager $seoManager)
    {
        $this->seoManager = $seoManager;
    }

    protected function loadStepDescriptions() {
        return array(
            '1. Overview',
            '2. SEO',
            '3. Delivery Options',
            '4. Feature Templates',
            '5. Product Templates'
        );
    }

    /**
     * @param $formData Department
     * @param $step
     * @param array $options
     * @return array
     */
    public function getFormOptions($formData, $step, array $options = array())
    {
        $options = parent::getFormOptions($formData, $step, $options);

        $options['cascade_validation'] = true;

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
}
