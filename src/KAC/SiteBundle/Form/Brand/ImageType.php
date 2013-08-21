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

class ImageType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', 'file', array(
            'attr' => array('class' => 'fill')
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Brand\Image',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'brand_image';
    }
}