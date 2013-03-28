<?php

namespace KAC\SiteBundle\Form\Offer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', 'entity', array(
            'class' => 'KAC\SiteBundle\Entity\Offer\ConditionType',
            'label' => 'Type',
            'attr' => array(
                'class' => 'fill no-uniform select-condition',
                'help' => 'Select the condition type.',
            ),
            'required' => true,
            'empty_value' => '- Select a type -',
        ));
        $builder->add('parameters', 'collection', array(
            'type' => 'text',
        ));
        $builder->add('children', 'collection', array(
            'type' => new ConditionType(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Offer\Condition'
        ));
    }

    public function getName()
    {
        return 'site_offers_condition';
    }
}
