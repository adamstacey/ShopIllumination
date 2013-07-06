<?php
namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    private $type;

    function __construct($type)
    {
        $this->type = $type;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
        $builder->add('company', 'text');
        $builder->add('line1', 'text');
        $builder->add('line2', 'text');
        $builder->add('townCity', 'text');
        $builder->add('county', 'text');
        $builder->add('postZipCode', 'text');
        $builder->add('country', 'country');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->type,
        ));
    }

    public function getName()
    {
        return 'address';
    }
}