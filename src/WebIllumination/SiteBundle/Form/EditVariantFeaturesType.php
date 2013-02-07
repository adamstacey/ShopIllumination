<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Entity\ProductToFeature;
use WebIllumination\SiteBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class EditVariantFeaturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $featuresBuilder = $builder->create('features', 'collection', array(
//            'compound' => true,
//            'allow_add' => true,
//            'allow_delete' => true,
//        ));
//        $subscriber = new AddFeaturesFieldSubscriber($featuresBuilder->getFormFactory());
//        $featuresBuilder->addEventSubscriber($subscriber);
//        $builder->add($featuresBuilder);
        $builder->add('features', 'collection', array(
            'type' => new ProductFeatureType($options['departmentId']),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product\Variant',
        ));
        $resolver->setRequired(array('departmentId'));
    }

    public function getName()
    {
        return 'site_edit_variant_features';
    }
}