<?php
namespace KAC\SiteBundle\Form\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmailAddressType extends AbstractType
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
                'class' => 'KAC\SiteBundle\Entity\Contact\EmailAddressType',
            ));
        }
        $builder->add('email');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Contact\EmailAddress',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'contact_email_address';
    }
}