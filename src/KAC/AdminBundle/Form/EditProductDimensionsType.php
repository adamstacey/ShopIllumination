<?php

namespace KAC\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\AdminBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class EditProductDimensionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('weight', 'text');
        $builder->add('length', 'text');
        $builder->add('width', 'text');
        $builder->add('height', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product',
        ));
    }

    public function getName()
    {
        return 'admin_edit_product_dimensions';
    }
}
