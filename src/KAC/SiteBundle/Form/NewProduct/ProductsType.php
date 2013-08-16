<?php

namespace KAC\SiteBundle\Form\NewProduct;

use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use KAC\SiteBundle\Form\Product\ProductVariantImagesType;
use KAC\SiteBundle\Form\Product\ProductVariantOverviewType;
use KAC\SiteBundle\Form\Product\ProductVariantUidType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('products', 'collection', array(
            'type' => new ProductType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product',
            'type' => 's',
            'variants' => array(),
            'departments' => array(),
            'departmentId' => null,
        ));
    }

    public function getName()
    {
        return 'site_new_product';
    }
}
