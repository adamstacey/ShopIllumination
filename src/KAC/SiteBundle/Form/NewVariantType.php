<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

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
                    'type' => new ProductFeatureType($options['departmentId']),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 3:
                $builder->add('prices', 'collection', array(
                    'type' => new ProductPriceType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));

                break;
            case 4:
                $builder->add('images', 'hidden');

                break;
            case 5:
                $builder->add('weight', 'text');
                $builder->add('length', 'text');
                $builder->add('width', 'text');
                $builder->add('height', 'text');

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
