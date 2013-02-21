<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Entity\Product;

class NewProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('brand', 'entity', array(
                    'class' => 'WebIllumination\SiteBundle\Entity\Brand',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('b')
                            ->addSelect('bd')
                            ->leftJoin('b.descriptions', 'bd')
                            ->orderBy('bd.name');
                    },
                    'empty_value' => '- Select a Brand -',
                ), array());
                $builder->add('departments', 'collection', array(
                    'type' => new ProductDepartmentType(),
                    'required' => true,
                ));
                $builder->add('status', 'choice', array(
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
                ));
                $builder->add('availableForPurchase', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('featureComparison', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('downloadable', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('specialOffer', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('recommended', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('accessory', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('new', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('hidePrice', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('showPriceOutOfHours', 'checkbox', array(
                    'required' => false,
                ));

                break;
            case 2:
                $builder->add('features', 'collection', array(
                    'type' => new ProductFeatureType($options['departmentId']),
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
                    'type' => new ProductFeatureType($options['departmentId']),
                    'required'  => false,
                    'allow_delete' => true,
                ));

                break;
            case 5:
                $builder->add('variants', 'collection', array(
                    'block_name' => 'variants_images',
                    'type' => new ProductVariantImagesType(),
                    'required'  => false,
                    'allow_delete' => true,
                ));
                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product',

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
