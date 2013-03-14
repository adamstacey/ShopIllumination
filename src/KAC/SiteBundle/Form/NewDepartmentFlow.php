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

class NewDepartmentFlow extends FormFlow
{
    protected $maxSteps = 1;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            '1. Overview',
            '2. Build Combinations',
            '3. Prices',
            '4. Features',
            '5. Images',
            '6. Links'
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

        return $options;
    }
}
