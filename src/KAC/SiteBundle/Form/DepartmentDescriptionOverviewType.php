<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentDescriptionOverviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'required'  => true,
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter the name of the department',
            ),
        ));
        $builder->add('description', 'ckeditor', array(
            'label' =>'Description',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter a detailed description about the department',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department\Description'
        ));
    }

    public function getName()
    {
        return 'site_department_description_overview';
    }
}
