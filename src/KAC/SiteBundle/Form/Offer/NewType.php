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
                    'label' => 'Status',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Select the status of this offer',
                    ),
                ));
                $builder->add('type', 'choice', array(
                    'choices' => array('p' => 'Percentage Off', 'a' => 'Fixed Amount Off', 'r' => 'Replaces Value', 'd' => 'Free Delivery', 'm' => 'Free Membership Card'),
                    'label' => 'Type',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Select the type of this offer',
                    ),
                ));
                $builder->add('discount', null, array(
                    'required'  => false,
                    'label' => 'Discount',
                    'attr' => array(
                        'class' => 'fill',
                        'help' => 'Enter the amount to be discounted.',
                    ),
                ));

                break;
            case 2:
                $builder->add('conditions', 'collection', array(
                    'type' => new ConditionType(),
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
