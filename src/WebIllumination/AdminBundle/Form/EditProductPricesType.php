<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\AdminBundle\Form\EventListener\AddFeaturesFieldSubscriber;

class EditProductPricesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prices', 'collection', array(
            'type' => new ProductPriceType(),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product',
        ));
    }

    public function getName()
    {
        return 'admin_edit_product_prices';
    }
}
