<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\AdminBundle\Form\DataTransformer\FeatureGroupTransformer;

class NewProductVariantType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('productCode', 'text');
        $builder->add('prices', 'collection', array(
            'type' => new ProductPriceType(),
        ));
        $builder->add('descriptions', 'collection', array(
            'type' => new VariantDescriptionType(),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product\Variant'
        ));
    }

    public function getName()
    {
        return 'admin_product_variant';
    }
}