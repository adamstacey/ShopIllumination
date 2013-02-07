<?php

namespace WebIllumination\SiteBundle\Form;

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
use WebIllumination\SiteBundle\Entity\Product\Feature;
use WebIllumination\SiteBundle\Entity\Product\Price;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Entity\Product\VariantDescription;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

class NewVariantFlow extends FormFlow
{


    protected $maxSteps = 5;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            'Enter Variant Details',
            'Enter Descriptions',
            'Enter Dimensions',
            'Enter Prices',
            'Choose features',
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
