<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewSingleProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('product_type');
                break;
        }

        $builder
            ->add('price')
            ->add('status')
            ->add('checked')
            ->add('availableForPurchase')
            ->add('featureComparison')
            ->add('downloadable')
            ->add('specialOffer')
            ->add('recommended')
            ->add('accessory')
            ->add('new')
            ->add('sampleRequest')
            ->add('hidePrice')
            ->add('showPriceOutOfHours')
            ->add('membershipCardDiscountAvailable')
            ->add('maximumMembershipCardDiscount')
            ->add('deliveryBand')
            ->add('inheritedDeliveryBand')
            ->add('deliveryCost')
            ->add('lastChecked')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('brand')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'admin_new_single_product';
    }
}
