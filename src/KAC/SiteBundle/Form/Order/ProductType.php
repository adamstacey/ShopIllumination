<?php
namespace KAC\SiteBundle\Form\Order;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('variant', 'entity_id', array(
            'class' => 'KAC\SiteBundle\Entity\Product\Variant',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('v')
                    ->where("v.id = ?1")
                    ->setParameter(1, $id);
            },
            'attr' => array(
                'class' => 'fill no-uniform select-product',
                'data-placeholder' => '- Select a Product -',
                'placeholder' => '- Select a Product -',
            ),
            'required' => true,
        ));
        $builder->add('quantity', 'text', array(
            'required' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Order\Product',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'order_product';
    }
}