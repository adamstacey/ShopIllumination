<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentRoutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', 'text', array(
            'required'  => true,
            'label' => 'Internal Web Address',
            'attr' => array(
                'class' => 'fill routing',
                'help' => 'The internal web address is automatically generated and is kept up-to-date by the rules setup in the system. However, you can make any changes to enhance the internal web address here.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department\Routing'
        ));
    }

    public function getName()
    {
        return 'site_department_routing';
    }
}
