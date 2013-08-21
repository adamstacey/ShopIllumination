<?php

namespace KAC\SiteBundle\Form\Brand;

use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use KAC\SiteBundle\Form\Product\ProductVariantImagesType;
use KAC\SiteBundle\Form\Product\ProductVariantOverviewType;
use KAC\SiteBundle\Form\Product\ProductVariantUidType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product;

class EditSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('descriptions', 'collection', array(
            'type' => new SeoType(),
            'required'  => false,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
        $builder->add('routings', 'collection', array(
            'type' => new RoutingType(),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Brand',
        ));
    }

    public function getName()
    {
        return 'brand_edit_seo';
    }
}
