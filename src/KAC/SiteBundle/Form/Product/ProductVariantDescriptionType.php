<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductVariantDescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('extraKeywords', 'text', array(
            'required'  => false,
            'label' => 'Extra Keywords',
            'attr' => array(
                'class' => 'fill ui-corner-none-br',
                'data-apply-to-all' => 'extraKeywords',
                'data-help' => 'You can use the extra keywords to provide any brand-specific keywords that are associated with the product eg. Series 3, Classixx, MaxiSense, etc.',
            ),
        ));

        $builder->add('keyMessage', 'text', array(
            'required'  => false,
            'label' => 'Key Message',
            'attr' => array(
                'class' => 'fill ui-corner-none-br',
                'data-apply-to-all' => 'keyMessage',
                'data-help' => 'This is a message that can contain any key selling point about the product or an important message eg. Min 0.3 Bar Pressure Required, No Handle, etc',
            ),
        ));

        $builder->add('description', 'ckeditor', array(
            'label' => 'Description',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter a description about the product. This should be from a selling perspective, so sell all the benefits and key selling points of the product.',
            ),
        ));

        $builder->add('brandDescription', 'ckeditor', array(
            'label' => 'Brand Description',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter a brand description about the product. This should be from a brand perspective, so describe all the technical elements and key features of the product.',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant\Description'
        ));
    }

    public function getName()
    {
        return 'site_product_variant_description';
    }
}
