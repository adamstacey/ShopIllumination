<?php
namespace KAC\SiteBundle\Form\Brand;

use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Order;
use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryCourierSubscriber;
use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryMethodSubscriber;
use KAC\SiteBundle\Form\EventListener\Order\UpdateDeliveryTrackingSubscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescriptionType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
            'required'  => true,
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter the name of the brand.',
            ),
        ));
        $builder->add('description', 'ckeditor', array(
            'label' =>'Description',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter a detailed description about the brand.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Brand\Description',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'brand_description';
    }
}