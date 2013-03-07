<?php

namespace KAC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\AdminBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class NewProductType extends AbstractType
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
                $builder->add('productCode');

                $builder->add('brand', 'entity', array(
                    'class' => 'KAC\SiteBundle\Entity\Brand',
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
                $builder->add('availableForPurchase', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('featureComparison', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('downloadable', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('specialOffer', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('recommended', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('accessory', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('new', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));

                // Prices
                $builder->add('hidePrice', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('showPriceOutOfHours', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('membershipCardDiscountAvailable', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                $builder->add('maximumMembershipCardDiscount', 'choice', array(
                    'choices' => array(true => 'Yes', false => 'No'),
                    'required' => false,
                    'expanded' => true,
                    'multiple' => false
                ));
                if($options['type'] === 's')
                {
                    $builder->add('prices', 'collection', array(
                        'type' => new ProductPriceType(),
                    ));
                }


                break;
            case 3:
                $builder->add('features', 'collection', array(
                    'type' => new ProductFeatureGroupType($options['department']),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 4:
                $featuresBuilder = $builder->create('features', 'collection', array(
                    'property_path' => 'features',
                    'compound' => true,
                ));
                $subscriber = new AddFeaturesFieldSubscriber($featuresBuilder->getFormFactory());
                $featuresBuilder->addEventSubscriber($subscriber);
                $builder->add($featuresBuilder);

                break;
            case 5:
                $featuresBuilder = $builder->create('features', 'collection', array(
                    'property_path' => 'features',
                    'compound' => true,
                ));
                $subscriber = new AddFeaturesFieldSubscriber($featuresBuilder->getFormFactory());
                $featuresBuilder->addEventSubscriber($subscriber);
                $builder->add($featuresBuilder);

                break;
            case 6:
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
            'data_class' => 'KAC\SiteBundle\Entity\Product',

            'type' => 's',
            'variants' => array(),
            'departments' => array(),
            'department' => null,
        ));
    }

    public function getName()
    {
        return 'admin_new_product';
    }
}
