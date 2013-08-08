<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\True;

class ConfirmationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('notes', 'collection', array(
            'type' => new NoteType(),
        ));
        $builder->add('terms', 'checkbox', array(
            'label' => 'I have read and agreed to your<br><a target="_blank" href="/terms-and-conditions.html">Terms and Conditions</a>.',
            'mapped' => false,
            'constraints' => new True(
                array(
                    'message' => "Please accept the Terms and conditions in order to register"
                )
            ),
        ));
        $builder->add('buy', 'button');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Order',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'checkout_confirmation';
    }
}