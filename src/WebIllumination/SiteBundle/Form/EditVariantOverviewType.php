<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class EditVariantOverviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('status', 'choice', array(
            'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
        ));
        $builder->add('productCode');
        $builder->add('mpn');
        $builder->add('ean');
        $builder->add('upc');
        $builder->add('jan');
        $builder->add('isbn');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product',
        ));
    }

    public function getName()
    {
        return 'site_edit_product_overview';
    }
}
