<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class NewProductGroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('type', 'choice', array(
                    'choices' => array(
                        's' => 'Single Product',
                        'g' => 'Product Group',
                    )
                ));
                break;
            case 2:
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
                    'allow_add' => true,
                    'allow_delete' => true
                ));
                $builder->add('status', 'choice', array(
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled')
                ));
                $builder->add('availableForPurchase', null, array('required' => false));
                $builder->add('featureComparison', null, array('required' => false));
                $builder->add('downloadable', null, array('required' => false));
                $builder->add('specialOffer', null, array('required' => false));
                $builder->add('recommended', null, array('required' => false));
                $builder->add('accessory', null, array('required' => false));
                $builder->add('new', null, array('required' => false));
                $builder->add('hidePrice', null, array('required' => false));
                $builder->add('showPriceOutOfHours', null, array('required' => false));
                $builder->add('membershipCardDiscountAvailable', null, array('required' => false));
                $builder->add('maximumMembershipCardDiscount', null, array('required' => false));
                break;
            case 3:
                $builder->add('featureGroups', 'collection', array(
                    'type' => new ProductFeatureType($options['department']),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 4:
                $builder->add('variants', 'collection', array(
                    'type' => new NewProductVariantType(),
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

            'variants' => array(),
            'departments' => array(),
            'department' => null,
        ));
    }

    public function getName()
    {
        return 'admin_new_product_group';
    }
}
