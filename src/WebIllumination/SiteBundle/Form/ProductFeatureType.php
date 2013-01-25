<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Form\DataTransformer\FeatureGroupTransformer;

class ProductFeatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('defaultFeature', 'entity', array(
            'required'  => false,
            'empty_value' => 'Select a feature to add.',
            'class' => 'WebIllumination\SiteBundle\Entity\Product\Feature',
            'query_builder' => function(EntityRepository $er) use ($options) {
                $qb = $er->createQueryBuilder('f');

                if($options['group'])
                {
                    $qb->add('where', $qb->expr()->eq('f.productFeatureGroup', $options['group']->getId()));
                } else {
                    $qb->add('where', $qb->expr()->eq('1', '0'));
                }

                $qb->orderBy('f.productFeature');
                return $qb;
            },
        ));
//        $builder->add('productFeature', 'hidden');
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array(
           'group'
        ));

        $resolver->setDefaults(array(
            'group' => null,
            'data_class' => 'WebIllumination\SiteBundle\Entity\ProductToFeature'
        ));
    }

    public function getName()
    {
        return 'admin_product_feature';
    }
}
