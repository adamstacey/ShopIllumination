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
use KAC\SiteBundle\Entity\Product\Feature;
use KAC\SiteBundle\Entity\Product\Price;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Product\VariantDescription;
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