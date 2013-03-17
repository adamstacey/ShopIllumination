<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DepartmentDescriptionSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pageTitle', 'text', array(
            'required'  => true,
            'label' => 'Page Title',
            'attr' => array(
                'class' => 'fill',
                'help' => '<span class="important">VERY IMPORTANT:</span> The page title is the title used in the Browser window and more importantly the title in search engine results pages (SERPs). This should be more specific than the header.',
            ),
        ));
        $builder->add('header', 'text', array(
            'required'  => true,
            'label' => 'Header',
            'attr' => array(
                'class' => 'fill',
                'help' => '<span class="important">VERY IMPORTANT:</span> The header is the main header used in listings and on the pages in the site. This should exclude specifics and be more general than the page title.',
            ),
        ));
        $builder->add('menuTitle', 'text', array(
            'required'  => true,
            'label' => 'Menu Title',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter the name of the department',
            ),
        ));

        $builder->add('metaDescription', 'textarea', array(
            'required'  => true,
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter the name of the department',
            ),
        ));
        $builder->add('metaKeywords', 'textarea', array(
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter the name of the department',
            ),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Department\Description'
        ));
    }

    public function getName()
    {
        return 'site_department_description_seo';
    }
}
