<?php
namespace KAC\SiteBundle\Form\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    private $name;
    private $type;

    function __construct($name=false, $type=false)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if($this->name)
        {
            $builder->add('displayName', 'text');
        }
        if($this->type)
        {
            $builder->add('type', 'entity', array(
                'class' => 'KAC\SiteBundle\Entity\Contact\AddressType',
            ));
        }
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
        $builder->add('company', 'text');
        $builder->add('line1', 'text');
        $builder->add('line2', 'text');
        $builder->add('townCity', 'text');
        $builder->add('countyState', 'text');
        $builder->add('postZipCode', 'text');
        $builder->add('countryCode', 'country');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Contact\Address',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'contact_address';
    }
}