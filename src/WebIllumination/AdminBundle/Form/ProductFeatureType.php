<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\AdminBundle\Form\DataTransformer\FeatureGroupTransformer;

class ProductFeatureType extends AbstractType
{
    private $department;

    public function __construct($department)
    {
        $this->department = $department;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $department = $this->department;
        $transformer = new FeatureGroupTransformer();

        $builder->add('productFeature', 'entity', array(
            'required'  => false,
            'empty_value' => 'Select a feature to add.',
            'class' => 'WebIllumination\SiteBundle\Entity\Product\FeatureGroup',
            'query_builder' => function(EntityRepository $er) use ($department) {
                $qb = $er->createQueryBuilder('f');
                $qb2 = $er->createQueryBuilder('fg')
                       ->from('WebIllumination\SiteBundle\Entity\DepartmentToFeature', 'df')
                       ->andWhere($qb->expr()->eq('df.productFeature', 'fg.id'))
                       ->andWhere($qb->expr()->eq('df.department', $department));

                $qb->add('where', $qb->expr()->exists($qb2->getDQL()));

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
        return 'admin_product_feature';
    }
}
