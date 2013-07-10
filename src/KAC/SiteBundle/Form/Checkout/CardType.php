<?php
namespace KAC\SiteBundle\Form\Checkout;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number', 'number', array(
            'label' => 'Card Number',
            'required' => true,
        ));
        $builder->add('expiryMonth','choice', array(
            'label' => 'Expiration Date(Month)',
            'required' => true,
            'choices' => array_combine(range(1,12), range(1,12)),
        ));
        $builder->add('expiryYear', 'choice', array(
            'label' => 'Expiration Date(Year)',
            'required' => true,
            'choices' => $this->getViableYears(),
        ));
        $builder->add('cvv', 'password', array(
            'label' => 'Security Code',
            'required' => true,
        ));
        $builder->add('issueNumber', 'text', array(
            'label' => 'Issue Number',
            'required' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Omnipay\Common\CreditCard',
            'error_bubbling' => true,
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'card';
    }

    private function getViableYears()
    {
        $yearChoices = array();
        $currentYear = (int) date("Y");

        for ($i = 0; $i <= 20; $i++) {
            $yearChoices[$currentYear + $i] = $currentYear + $i;
        }

        return $yearChoices;
    }
}