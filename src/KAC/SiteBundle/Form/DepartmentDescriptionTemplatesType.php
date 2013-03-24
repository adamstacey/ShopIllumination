<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentDescriptionTemplatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pageTitleTemplate', 'hidden');

        $builder->add('headerTemplate', 'hidden');

        $builder->add('metaDescriptionTemplate', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department\Description'
        ));
    }

    public function getName()
    {
        return 'site_department_description_templates';
    }
}
