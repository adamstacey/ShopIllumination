<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class NewProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('productCode');

                $builder->add('brand', 'entity', array(
                    'class' => 'WebIllumination\SiteBundle\Entity\Brand',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('b')
                            ->addSelect('bd')
                            ->leftJoin('b.descriptions', 'bd');
                    },
                ), array());
                $builder->add('departments', 'collection', array(
                    'type' => new ProductDepartmentType(),
                ));
                $builder->add('descriptions', 'collection', array(
                    'type' => new ProductDescriptionType(),
                    'allow_add' => true,
                    'allow_delete' => true,
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

                // Prices
                $builder->add('hidePrice', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('showPriceOutOfHours', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('membershipCardDiscountAvailable', 'checkbox', array(
                    'required' => false,
                ));
                $builder->add('maximumMembershipCardDiscount');

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
                    'type' => new ProductVariantType(),
                    'required'  => false,
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
