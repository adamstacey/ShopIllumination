<?php

namespace KAC\SiteBundle\Form\Offer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class NewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('descriptions', 'collection', array(
                    'type' => new DescriptionType(),
                ));
                $builder->add('status', 'choice', array(
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
                    'required'  => true,
                    'label' => 'Status',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Select the status of this offer',
                    ),
                ));
                $builder->add('type', 'choice', array(
                    'choices' => array('p' => 'Money Off', 'r' => 'Replaces Value', 'd' => 'Free Delivery', 'm' => 'Free Membership Card'),
                    'required'  => true,
                    'label' => 'Status',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Select the type of this offer',
                    ),
                ));
                $builder->add('percentDiscount', null, array(
                    'required'  => true,
                    'label' => 'Percentage Discount',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Enter the percentage to be discounted',
                    ),
                ));
                $builder->add('fixedDiscount', null, array(
                    'required'  => true,
                    'label' => 'Fixed Discount',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Enter the amount of money to be discounted',
                    ),
                ));

                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Offer',
        ));
    }

    public function getName()
    {
        return 'site_new_offer';
    }
}
