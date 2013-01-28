<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Form\DataTransformer\FeatureGroupTransformer;

class ProductFeatureGroupType extends AbstractType
{
    private $department;

    public function __construct($department)
    {
        $this->department = $department;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $department = $this->department;

        $builder->add('productFeature', 'entity', array(
            'required'  => false,
            'empty_value' => 'Select a feature to add.',
            'class' => 'WebIllumination\SiteBundle\Entity\Product\FeatureGroup',
            'query_builder' => function(EntityRepository $er) use ($department) {
                $qb = $er->createQueryBuilder('fg');
                $qb2 = $er->createQueryBuilder('fg2');

                $qb->andWhere($qb->expr()->in('fg.id',
                    $qb2->select('fg2.id')
                        ->from('WebIllumination\SiteBundle\Entity\DepartmentToFeature', 'df')
                        ->where($qb2->expr()->eq('df.department', $department))
                        ->andWhere('df.productFeature = fg2')
                        ->getDQL()
                ));

                return $qb;
            },
        ));
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebIllumination\SiteBundle\Entity\ProductToFeature'
        ));
    }

    public function getName()
    {
        return 'site_product_feature';
    }
}
