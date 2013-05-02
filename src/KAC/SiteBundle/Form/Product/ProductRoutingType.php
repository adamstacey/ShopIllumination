<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductRoutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', 'text', array(
            'required'  => true,
            'label' => 'Internal Web Address',
            'attr' => array(
                'class' => 'fill routing',
                'data-help' => 'The internal web address is automatically generated and is kept up-to-date by the rules setup in the system. However, you can make any changes to enhance the internal web address here.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Routing'
        ));
    }

    public function getName()
    {
        return 'site_product_routing';
    }
}
