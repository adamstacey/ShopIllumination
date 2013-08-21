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

class RoutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', 'text', array(
            'required'  => true,
            'label' => 'Internal Web Address',
            'attr' => array(
                'class' => 'fill routing',
                'data-help' => 'The internal web address is automatically generated and is kept up-to-date by the rules setup in the system. However, you can make any changes to enhance the internal web address here.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Brand\Routing',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'brand_routing';
    }
}