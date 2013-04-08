<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Form\ProductFeatureGroupType;
use KAC\SiteBundle\Repository\DepartmentRepository;
use KAC\SiteBundle\Entity\Product\Feature;

class NewProductFeaturesType extends AbstractType
{
    private $departmentId;

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $departmentId = $this->departmentId;

        $builder->add('features', 'collection', array(
            'type' => new NewProductFeatureType($departmentId),
            'allow_add' => true,
            'allow_delete' => true,
        ));
    }

    public function getName()
    {
        return 'site_new_product_features';
    }
}
