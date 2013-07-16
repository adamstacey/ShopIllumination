<?php
namespace KAC\UserBundle\Form\Type;

use KAC\SiteBundle\Form\Contact\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text', array(
            'label' => 'First Name',
            'required' => false,
        ));
        $builder->add('lastName', 'text', array(
            'label' => 'Last Name',
            'required' => false,
        ));
        $builder->add('organisationName', 'text', array(
            'label' => 'Organisation',
            'required' => false,
        ));
        $builder->add('telephoneDaytime', new NumberType(), array(
            'label' => 'Telephone (Daytime)',
            'required' => false,
        ));
        $builder->add('telephoneEvening', new NumberType(), array(
            'label' => 'Telephone (Evening)',
            'required' => false,
        ));
        $builder->add('telephoneMobile', new NumberType(), array(
            'label' => 'Mobile',
            'required' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Contact',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'user_edit_contact';
    }
}