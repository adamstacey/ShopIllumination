<?php
namespace KAC\SiteBundle\Form\Order;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NoteType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('creator', 'text', array(
            'label' => 'Creator',
            'required' => true,
            'attr' => array(
                'class' => 'fill'
            )
        ));
        $builder->add('notified', 'checkbox', array(
            'label' => 'Notify?',
        ));
        $builder->add('noteType', 'choice', array(
            'label' => 'Type',
            'required' => true,
            'choices' => array(
                'staff' => 'Staff',
                'customer' => 'Customer',
            ),
            'attr' => array(
                'class' => 'fill'
            )
        ));
        $builder->add('note', 'textarea', array(
            'label' => 'Note',
            'required' => true,
            'attr' => array(
                'class' => 'fill'
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Order\Note',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'order_note';
    }
}