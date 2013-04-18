<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductVariantUidType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('mpn', 'text', array(
            'label' => 'MPN',
            'attr' => array(
                'size' => 50,
                'data-help' => 'Manufacturer Part Number (MPN): The code used by the manufacturer of a product if it is different to the product code. This could be a catalogue number.',
                'class' => 'fill uppercase',
            ),
        ));

        $builder->add('ean', 'text', array(
            'label' => 'EAN',
            'attr' => array(
                'size' => 14,
                'data-help' => 'International Article Number (EAN): Used to be known as the European Article Number, but now International Article Number keeping the original abbreviation. The EAN is a 13 or 14 digit barcode.',
                'class' => 'fill integer',
            ),
        ));

        $builder->add('upc', 'text', array(
            'label' => 'UPC',
            'attr' => array(
                'size' => 12,
                'data-help' => 'Universal Product Code (UPC): Used in North America a UPC is a 12 digit barcode.',
                'class' => 'fill integer',
            ),
        ));

        $builder->add('jan', 'text', array(
            'label' => 'JAN',
            'attr' => array(
                'size' => 13,
                'data-help' => 'Japanese Article Number (JAN): Used in Japan only and is an 8 or 13 digit barcode.',
                'class' => 'fill integer',
            ),
        ));

        $builder->add('isbn', 'text', array(
            'label' => 'ISBN',
            'attr' => array(
                'size' => 13,
                'data-help' => 'International Standard Book Number (ISBN): Used to identify books only and is a 10 or 13 digit number.',
                'class' => 'fill integer',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Variant'
        ));
    }

    public function getName()
    {
        return 'site_product_variant_uid';
    }
}