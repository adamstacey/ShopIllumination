<?php

namespace KAC\AdminBundle\Form;

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
use KAC\SiteBundle\Entity\ProductToFeature;

class NewProductFlow extends FormFlow implements EventSubscriberInterface
{


    protected $maxSteps = 6;
    protected $allowDynamicStepNavigation = true;

    protected function loadStepDescriptions() {
        return array(
            'Choose Product Type',
            'Enter Product Details',
            'Select Feature Groups',
            'Select Features',
            'Select Features',
            'Edit Product Variations',
        );
    }

    /**
     * {@inheritDoc}
     */
    public function setEventDispatcher(EventDispatcherInterface $dispatcher)
    {
        parent::setEventDispatcher($dispatcher);
        $dispatcher->addSubscriber($this);
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FormFlowEvents::PRE_BIND => 'onPreBind',
            FormFlowEvents::POST_VALIDATE => 'onPostValidate',
        );
    }

    public function getFormOptions($formData, $step, array $options = array())
    {
        $options = parent::getFormOptions($formData, $step, $options);

        $options['cascade_validation'] = true;

        if($step > 1)
        {
            $options['type'] = $formData->getType();
        }
        if($step > 2)
        {
            $options['departments'] = $formData->getDepartments();
            $options['department'] = (isset($options['departments']) && count($options['departments']) > 0) ? $options['departments'][0]->getDepartment()->getId() : null;
        }
        if($step > 5)
        {
            // Generate variations
            $options['variants'] = array();

            // Sort features into groups
            $featureGroups = array();
            foreach($formData->getFeatureGroups() as $featureGroup)
            {
                if($featureGroup->getDefaultFeature())
                {
                    $featureGroups[$featureGroup->getProductFeature()->getId()][] = $featureGroup->getDefaultFeature();
                }
            }

            // Create array containing each combination of the features
            foreach($featureGroups as $featureGroup)
            {
                // If variations is empty create the first variations
                if(empty($options['variants']))
                {
                    foreach($featureGroup as $feature)
                    {
                        $options['variants'][] = array($feature);
                    }
                } else {
                    // Create new variations based on the previous variation with the extra features
                    $count = count($options['variants']);
                    for($i=0;$i<$count;$i++)
                    {
                        if($featureGroup->getDefaultFeature())
                        {
                            $variant = array_pop($options['variants']);

                            foreach($featureGroup as $feature)
                            {
                                $variantTmp = $variant;
                                $variantTmp[] = $feature;
                                array_unshift($options['variants'], $variantTmp);
                            }
                        }
                    }
                }
            }

            // Create the variant entities
            foreach($options['variants'] as $variantFeatures)
            {
                $variant = new Variant();
                foreach($variantFeatures as $feature)
                {
                    $productToFeature = new ProductToFeature();
                    $productToFeature->setVariant($variant);
                    $productToFeature->setProductFeature($feature->getProductFeatureGroup());
                    $productToFeature->setDefaultFeature($feature);
                    $variant->addFeature($productToFeature);
                }
                $variant->setProduct($formData);
                $variant->setProductCode($formData->getProductCode());
                $variant->addPrice(new Price());
                foreach($formData->getDescriptions() as $description)
                {
                    $variantDescription = new VariantDescription();
                    $variantDescription->setLocale($description->getLocale());
                    $variantDescription->setDescription($description->getDescription());
                    $variant->addDescription($variantDescription);
                }
                $formData->addVariant($variant);
            }

        }

        return $options;
    }

    /**
     * {@inheritDoc}
     */
    public function reset() {
        parent::reset();
        $this->removeProductType();
    }

    /**
     * {@inheritDoc}
     */
    public function createForm($formData, array $options = array()) {
        if ($this->currentStep === 1) {
            $this->removeSkipStep(array(4,5,6));
        }

        return parent::createForm($formData, $options);
    }

    protected function getTempProductTypeSessionKey() {
        return $this->id . '_isSingleProduct';
    }

    protected function setTempProductType($type='s') {
        $this->storage->set($this->getTempProductTypeSessionKey(), $type);
    }

    protected function getProductType() {
        return $this->storage->get($this->getTempProductTypeSessionKey(), 's');
    }

    protected function removeProductType() {
        $this->storage->remove($this->getTempProductTypeSessionKey());
    }

    public function onPreBind(PreBindEvent $event) {
        if ($this->getProductType() === 's') {
            $this->removeSkipStep(array(4));
            $this->addSkipStep(array(5,6));
        } else {
            $this->removeSkipStep(array(5,6));
            $this->addSkipStep(array(4));
        }
    }

    public function onPostValidate(PostValidateEvent $event) {
        $formData = $event->getFormData();

        if (empty($formData)) {
            return;
        }

        if ($this->currentStep >= 1) {
            if ($formData->getType() === 's') {
                $this->setTempProductType('s');
                $this->removeSkipStep(array(4));
                $this->addSkipStep(array(5,6));
            } else {
                $this->setTempProductType('g');
                $this->removeSkipStep(array(5,6));
                $this->addSkipStep(array(4));
            }
        }
    }
}
