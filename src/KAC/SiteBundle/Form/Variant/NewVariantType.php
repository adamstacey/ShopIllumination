<?php

namespace KAC\SiteBundle\Form\Variant;

use KAC\AdminBundle\Form\ProductFeatureType;
use KAC\SiteBundle\Form\Product\ProductFeatureCombinationType;
use KAC\SiteBundle\Form\Product\ProductPriceType;
use KAC\SiteBundle\Form\Product\ProductVariantDescriptionSeoType;
use KAC\SiteBundle\Form\Product\ProductVariantDescriptionType;
use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use KAC\SiteBundle\Form\Product\ProductVariantRoutingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class NewVariantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('status', 'choice', array(
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
                ));
                $builder->add('productCode');
                $builder->add('mpn');
                $builder->add('ean');
                $builder->add('upc');
                $builder->add('jan');
                $builder->add('isbn');

                break;
            case 2:
                $builder->add('features', 'collection', array(
                    'type' => new ProductFeatureCombinationType($options['departmentId']),
                    'allow_add' => true,
                    'allow_delete' => false,
                ));

                break;
            case 3:
                $builder->add('descriptions', 'collection', array(
                    'type' => new ProductVariantDescriptionType(),
                ));

                break;
            case 4:
                $builder->add('descriptions', 'collection', array(
                    'type' => new ProductVariantDescriptionSeoType(),
                ));

                $builder->add('routings', 'collection', array(
                    'type' => new ProductVariantRoutingType(),
                ));

                break;
            case 5:
                $builder->add('prices', 'collection', array(
                    'type' => new ProductPriceType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 6:
                $builder->add('deliveryBand', 'choice', array(
                    'label' => 'Delivery Band',
                    'choices' => array('1.0000' => 'Delivery Band 1', '2.0000' => 'Delivery Band 2', '3.0000' => 'Delivery Band 3', '4.0000' => 'Delivery Band 4', '5.0000' => 'Delivery Band 5', '6.0000' => 'Delivery Band 6'),
                    'required' => true,
                    'empty_value' => '- Select a Delivery Band -',
                    'attr' => array(
                        'class' => 'fill ui-corner-none-br',
                        'data-help' => 'Select the delivery band this product falls in.',
                        'data-apply-to-all' => 'deliveryBand',
                    ),
                ));
                break;

            case 7:
                $builder->add('imageUploads', 'hidden');
                $builder->add('documentUploads', 'hidden');

                break;

            case 8:
                $builder->add('temporaryImages', 'hidden');

                break;
            case 9:
                $builder->add('temporaryDocuments', 'hidden');

                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant',
            'departmentId' => null,
        ));
    }

    public function getName()
    {
        return 'site_new_variant';
    }
}
