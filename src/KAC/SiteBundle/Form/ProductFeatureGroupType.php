<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Repository\DepartmentRepository;
use KAC\SiteBundle\Entity\Product\Feature;

class ProductFeatureGroupType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'required'  => true,
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter the name of the product feature group.',
                'placeholder' => 'Feature Group',
            ),
            'constraints' => array(
                new NotBlank(array('message' => 'Enter a name for the feature group.')),
            ),
        ));

        $builder->add('active', 'checkbox', array(
            'required' => false,
            'label' => 'Active',
            'attr' => array(
                'help' => 'Is the feature group active?',
                'containerClass' => 'tac',
            ),
            'data' => true,
        ));

        $builder->add('filter', 'checkbox', array(
            'required' => false,
            'label' => 'Filter',
            'attr' => array(
                'help' => 'Can you filter by the feature group?',
                'containerClass' => 'tac',
            ),
            'data' => true,
        ));
     }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\FeatureGroup',
        ));
    }

    public function getName()
    {
        return 'site_product_feature_group';
    }
}
