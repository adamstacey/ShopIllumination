<?php

namespace KAC\SiteBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class NewProductFeatureType extends AbstractType
{
    private $departmentId;

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $departmentId = $this->departmentId;

        $builder->add('featureGroup', 'entity', array(
            'required'  => true,
            'empty_value' => '- Select a Feature Group -',
            'class' => 'KAC\SiteBundle\Entity\Product\FeatureGroup',
            'data_class' => null,
            'query_builder' => function(EntityRepository $er) use ($departmentId) {
                $qb = $er->createQueryBuilder('fg');
                $qb2 = $er->createQueryBuilder('fg2');
                $qb2->select('fg2.id')
                    ->from('KAC\SiteBundle\Entity\DepartmentToFeature', 'df')
                    ->where('df.featureGroup = fg2');
                if ($departmentId > 0) {
                    $qb2->andWhere($qb2->expr()->eq('df.department', $departmentId));
                }
                $qb->andWhere($qb->expr()->in('fg.id', $qb2->getDQL()));
                return $qb;
            },
            'attr' => array(
                'class' => 'fill',
            ),
        ));

        $builder->add('name', 'text', array(
            'required'  => true,
            'label' => 'Name',
            'attr' => array(
                'class' => 'fill',
                'data-help' => 'Enter the name of the product feature.',
                'placeholder' => 'Feature',
            ),
            'constraints' => array(
                new NotBlank(array('message' => 'Enter a name for the feature.')),
            ),
        ));

        $builder->add('active', 'checkbox', array(
            'required' => false,
            'label' => 'Active',
            'attr' => array(
                'data-help' => 'Is the feature active?',
                'data-container-class' => 'tac',
            ),
            'data' => true,
        ));

        $builder->add('filter', 'checkbox', array(
            'required' => false,
            'label' => 'Filter',
            'attr' => array(
                'data-help' => 'Can you filter by the feature?',
                'data-container-class' => 'tac',
            ),
            'data' => true,
        ));
     }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\Feature',
        ));
    }

    public function getName()
    {
        return 'site_new_product_feature';
    }
}
