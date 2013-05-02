<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductDescriptionSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('override', 'checkbox', array(
            'required'  => false,
            'label' => 'Override',
            'attr' => array(
                'data-help' => 'The search engine optimisation is automatically generated. If you would like to override it tick here.',
            ),
        ));

        $builder->add('pageTitle', 'text', array(
            'required'  => true,
            'label' => '<span class="important">Page Title</span>',
            'attr' => array(
                'class' => 'fill recommended-characters',
                'data-help' => 'VERY IMPORTANT: The page title is the title used in the Browser window and more importantly the title in search engine results pages (SERPs). This should be more specific than the header.',
                'data-character-help' => 70,
            ),
        ));

        $builder->add('header', 'text', array(
            'required'  => true,
            'label' => '<span class="important">Header</span>',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'VERY IMPORTANT: The header is the main header used in listings and on the pages in the site. This should exclude specifics and be more general than the page title.',
            ),
        ));

        $builder->add('metaDescription', 'textarea', array(
            'required'  => true,
            'label' => '<span class="important">Meta Description</span>',
            'attr' => array(
                'class' => 'fill recommended-characters',
                'data-help' => 'VERY IMPORTANT: Your Advert in organic search results. You need to include keywords, but primarily the meta description needs to entice people to click through by using a call to action with benefits (e.g. lowest price, in stock, free delivery, etc).',
                'data-character-help' => 160,
                'rows' => 4,
            ),
        ));

        $builder->add('metaKeywords', 'textarea', array(
            'label' => 'Search Words',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter any alternative words to be found by (separated by a comma). This could be slight differences in wording or phrasing and should include all keywords used in the page title.',
                'rows' => 3,
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Description'
        ));
    }

    public function getName()
    {
        return 'site_product_description_seo';
    }
}
