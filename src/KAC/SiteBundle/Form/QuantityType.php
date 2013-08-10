<?php
namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuantityType extends AbstractType
{
    public function getParent()
    {
        return 'number';
    }

    public function getName()
    {
        return 'quantity';
    }
}