<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('costPrice', 'money');
        $builder->add('recommendedRetailPrice', 'money');
        $builder->add('listPrice', 'money');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\ProductToDepartment'
        ));
    }

    public function getName()
    {
        return 'admin_product_department';
    }
}
