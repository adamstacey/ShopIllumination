<?php

namespace KAC\SiteBundle\Form\Department;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EditDepartmentDeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('deliveryBand', 'choice', array(
            'label' => 'Delivery Band',
            'choices' => array(0 => '- Not Set -', 1 => 'Delivery Band 1', 2 => 'Delivery Band 2', 3 => 'Delivery Band 3', 4 => 'Delivery Band 4', 5 => 'Delivery Band 5', 6 => 'Delivery Band 6'),
            'attr' => array(
                'data-help' => 'Select the delivery band for the department. Leave it as "Not Set" if you want the delivery band to be inherited from the department this department falls under.',
            ),
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
        return 'site_edit_department_delivery';
    }
}