<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class DepartmentDescriptionSeoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pageTitle', 'text', array(
            'required'  => true,
            'label' => '<span class="important">Page Title</span>',
            'attr' => array(
                'class' => 'fill recommended-characters',
                'help' => 'VERY IMPORTANT: The page title is the title used in the Browser window and more importantly the title in search engine results pages (SERPs). This should be more specific than the header.',
                'characterHelp' => 70,
            ),
        ));

        $builder->add('header', 'text', array(
            'required'  => true,
            'label' => '<span class="important">Header</span>',
            'attr' => array(
                'class' => 'fill',
                'help' => 'VERY IMPORTANT: The header is the main header used in listings and on the pages in the site. This should exclude specifics and be more general than the page title.',
            ),
        ));

        $builder->add('metaDescription', 'textarea', array(
            'required'  => true,
            'label' => '<span class="important">Meta Description</span>',
            'attr' => array(
                'class' => 'fill recommended-characters',
                'help' => 'VERY IMPORTANT: Your Advert in organic search results. You need to include keywords, but primarily the meta description needs to entice people to click through by using a call to action with benefits (e.g. lowest price, in stock, free delivery, etc).',
                'characterHelp' => 160,
            ),
        ));

        $builder->add('googleDepartment', 'entity_id', array(
            'required'  => true,
            'label' => 'Google Department',
            'class' => 'KAC\SiteBundle\Entity\Taxonomy',
            'query_builder' => function(EntityRepository $er, $id) {
                return $er->createQueryBuilder('t')
                    ->where("t.id = :id")
                    ->andWhere('t.objectType = :objectType')
                    ->setParameter('id', $id)
                    ->setParameter('objectType', 'google');
            },
            'attr' => array(
                'class' => 'select-google-department fill no-uniform',
                'help' => 'Select the equivalent Google department that matches this department. This is very important as Google require this for the Google products feed.',
            ),
        ));

        $builder->add('menuTitle', 'text', array(
            'required'  => true,
            'label' => 'Menu Title',
            'attr' => array(
                'class' => 'fill',
                'help' => 'This will usually be the same as the name, but if the name needs to appear different on the menu (e.g. shorter) then this can be set here.',
            ),
        ));

        $builder->add('metaKeywords', 'textarea', array(
            'label' => 'Search Words',
            'attr' => array(
                'class' => 'fill',
                'help' => 'Enter any alternative words to be found by (separated by a comma). This could be slight differences in wording or phrasing and should include all keywords used in the page title.',
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
