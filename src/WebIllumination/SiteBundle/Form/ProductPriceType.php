<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('costPrice', 'money', array(
            'currency' => false,
            'attr' => array(
                'size' => 6,
            ),
        ));
        $builder->add('recommendedRetailPrice', 'money', array(
            'currency' => false,
            'attr' => array(
                'size' => 6,
            ),
        ));
        $builder->add('listPrice', 'money', array(
            'currency' => false,
            'attr' => array(
                'size' => 6,
            ),
        ));
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product\Price'
        ));
    }

    public function getName()
    {
        return 'site_product_price';
    }
}
