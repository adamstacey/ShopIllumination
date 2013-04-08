<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
                        'data-help' => 'Select the department you want this department to fall under.',
                        'data-placeholder' => '- Select a Brand -',
                        'placeholder' => '- Select a Brand -',
                    ),
                    'required' => true,
                    'empty_value' => '- Select a Brand -',
                ), array());
                $builder->add('departments', 'collection', array(
                    'type' => new ProductDepartmentType(),
                ));
                $builder->add('status', 'choice', array(
                    'label' => 'Status',
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
                    'required' => true,
                    'attr' => array(
                        'data-help' => 'Select the status of the department. Any sub-departments will also inherit this status.',
                    ),
                ));
                $builder->add('availableForPurchase', 'checkbox', array(
                    'required' => false,
                    'label' => 'Available',
                    'attr' => array(
                        'data-help' => 'Is the product available to purchase?',
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
                $builder->add('hidePrice', 'checkbox', array(
                    'required' => false,
                    'label' => 'Hide Price',
                    'attr' => array(
                        'data-help' => 'Hide price for this product?',
                    ),
                ));
                $builder->add('showPriceOutOfHours', 'checkbox', array(
                    'required' => false,
                    'label' => 'Show Price Out Of Hours',
                    'attr' => array(
                        'data-help' => 'Show price out of hours?',
                    ),
                ));

                break;
            case 2:
                $builder->add('features', 'collection', array(
                    'type' => new ProductFeatureCombinationType($options['departmentId']),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 3:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_overview',
                    'type' => new ProductVariantOverviewType(),
                    'required'  => false,
                    'allow_delete' => true,
                ));

                break;
            case 4:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_features',
                    'type' => new ProductVariantFeaturesType($options['departmentId']),
                    'required'  => false,
                    'allow_delete' => true,
                ));

                break;
            case 5:
                $builder->add('images', 'hidden');
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_images',
                    'type' => new ProductVariantImagesType(),
                    'required'  => false,
                    'allow_delete' => true,
                ));
                break;
            case 6:
                $builder->add('links', 'collection', array(
                    'type' => new ProductLinkType(),
                    'allow_add' => true,
                    'allow_delete' => true,
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
