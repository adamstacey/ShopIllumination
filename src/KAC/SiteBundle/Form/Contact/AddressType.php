<?php
namespace KAC\SiteBundle\Form\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('displayName', 'text', array(
            'label' => 'Display Name',
            'required' => true,
        ));
        $builder->add('firstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
        ));
        $builder->add('lastName', 'text', array(
            'label' => 'Last Name',
            'required' => true,
        ));
        $builder->add('organisationName', 'text', array(
            'label' => 'Organisation',
            'required' => false,
        ));
        $builder->add('addressLine1', 'text', array(
            'label' => 'Address Line 1',
            'required' => true,
        ));
        $builder->add('addressLine2', 'text', array(
            'label' => 'Address Line 2',
            'required' => false,
        ));
        $builder->add('townCity', 'text', array(
            'label' => 'Town/City',
            'required' => true,
        ));
        $builder->add('countyState', 'text', array(
            'label' => 'County',
            'required' => true,
        ));
        $builder->add('postZipCode', 'text', array(
            'label' => 'Post Code',
            'required' => true,
        ));
        $builder->add('countryCode', 'country', array(
            'label' => 'Country',
            'required' => true,
            'preferred_choices' => array(
                'GB'
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Contact\Address',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'contact_address';
    }
}