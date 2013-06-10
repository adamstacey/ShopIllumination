<?php

namespace KAC\SiteBundle\Form\Department;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditDepartmentSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptions', 'collection', array(
            'type' => new DepartmentDescriptionSeoType(),
        ));

        $builder->add('routings', 'collection', array(
            'type' => new DepartmentRoutingType(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department',
        ));
    }

    public function getName()
    {
        return 'site_edit_department_features';
    }
}