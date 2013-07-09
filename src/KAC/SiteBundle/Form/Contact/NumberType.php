<?php
namespace KAC\SiteBundle\Form\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NumberType extends AbstractType
{
    private $name;
    private $type;

    function __construct($name=null, $type=null)
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
                'class' => 'KAC\SiteBundle\Entity\Contact\NumberType',
            ));
        }
        $builder->add('number', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Contact\Number',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'contact_number';
    }
}