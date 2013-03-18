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
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Manager\SeoManager;

class NewDepartmentFlow extends FormFlow
{
    protected $maxSteps = 3;
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
            '3. Delivery Options'
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

        return $options;
    }
}
