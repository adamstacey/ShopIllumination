<?php

namespace KAC\SiteBundle\Form\Product;

use KAC\SiteBundle\Form\Product\ProductVariantFeaturesType;
use KAC\SiteBundle\Form\Product\ProductVariantImagesType;
use KAC\SiteBundle\Form\Product\ProductVariantOverviewType;
use KAC\SiteBundle\Form\Product\ProductVariantUidType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product;

class NewProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('brand', 'entity', array(
                    'class' => 'KAC\SiteBundle\Entity\Brand',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('b')
                            ->addSelect('bd')
                            ->leftJoin('b.descriptions', 'bd')
                            ->orderBy('bd.name');
                    },
                    'label' => 'Brand',
                    'attr' => array(
                        'class' => 'fill no-uniform select-brand',
                        'data-help' => 'Select the brand you want this product to fall under.',
                        'data-placeholder' => '- Select a Brand -',
                        'placeholder' => '- Select a Brand -',
                    ),
                    'required' => true,
                    'empty_value' => '- Select a Brand -',
                ), array());
                $builder->add('mainDepartment', new ProductDepartmentType());
                $builder->add('status', 'choice', array(
                    'label' => 'Status',
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
                    'required' => true,
                    'attr' => array(
                        'data-help' => 'Select the status of the department. Any sub-departments will also inherit this status.',
                    ),
                ));
                $builder->add('template', 'choice', array(
                    'label' => 'Template',
                    'choices' => array('default' => 'Standard Product Template', 'ducting' => 'Ducting Product Template', 'lighting' => 'Lighting Product Template', 'worktop' => 'Worktop Product Template'),
                    'required' => true,
                    'attr' => array(
                        'class' => 'fill',
                        'data-help' => 'Select the template the product will use when a user visits the product.',
                    ),
                ));
                $builder->add('featureComparison', 'checkbox', array(
                    'required' => false,
                    'label' => 'Feature Comparison',
                    'attr' => array(
                        'data-help' => 'Include in feature comparison?',
                    ),
                ));
                $builder->add('downloadable', 'checkbox', array(
                    'required' => false,
                    'label' => 'Downloadable',
                    'attr' => array(
                        'data-help' => 'Is the product a download?',
                    ),
                ));
                $builder->add('specialOffer', 'checkbox', array(
                    'required' => false,
                    'label' => 'Special Offer',
                    'attr' => array(
                        'data-help' => 'Is the product a special offer?',
                    ),
                ));
                $builder->add('recommended', 'checkbox', array(
                    'required' => false,
                    'label' => 'Recommended',
                    'attr' => array(
                        'data-help' => 'Do you want to recommend?',
                    ),
                ));
                $builder->add('accessory', 'checkbox', array(
                    'required' => false,
                    'label' => 'Accessory',
                    'attr' => array(
                        'data-help' => 'Is the product an accessory?',
                    ),
                ));
                $builder->add('new', 'checkbox', array(
                    'required' => false,
                    'label' => 'New',
                    'attr' => array(
                        'data-help' => 'Is the product new?',
                    ),
                ));

                break;
            case 2:
                $builder->add('departments', 'collection', array(
                    'type' => new ProductDepartmentType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                break;
            case 3:
                $builder->add('features', 'collection', array(
                    'type' => new ProductFeatureCombinationType($options['departmentId']),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 4:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_overview',
                    'type' => new ProductVariantOverviewType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 5:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_delivery',
                    'type' => new ProductVariantDeliveryType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 6:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_uid',
                    'type' => new ProductVariantUidType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 7:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_features',
                    'type' => new ProductVariantFeaturesType($options['departmentId']),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 8:
                $builder->add('descriptions', 'collection', array(
                    'block_name' => 'descriptions',
                    'type' => new ProductDescriptionType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_descriptions',
                    'type' => new ProductVariantDescriptionsType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 9:
                $builder->add('descriptions', 'collection', array(
                    'block_name' => 'descriptions_seo',
                    'type' => new ProductDescriptionSeoType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_seo',
                    'type' => new ProductVariantSeoType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));

                break;
            case 10:
                $builder->add('imageUploads', 'hidden');
                $builder->add('documentUploads', 'hidden');
                break;
            case 11:
                $builder->add('temporaryImages', 'hidden');

                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_images',
                    'type' => new ProductVariantImagesType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                break;
            case 12:
                $builder->add('temporaryDocuments', 'hidden');

                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_documents',
                    'type' => new ProductVariantDocumentsType(),
                    'required'  => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                break;
            case 13:
                $builder->add('links', 'collection', array(
                    'type' => new ProductLinkType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ));
                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
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
