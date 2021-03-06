<?php

namespace KAC\SiteBundle\Form\Product;

use KAC\SiteBundle\Entity\Product\VariantToFeature;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class ProductFeatureCombinationType extends AbstractType
{
    private $departmentId;

    public function __construct($departmentId=null)
    {
        $this->departmentId = $departmentId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $departmentId = $this->departmentId;
        $factory = $builder->getFormFactory();

        $builder->add('featureGroup', 'entity', array(
            'required'  => true,
            'empty_value' => '- Select a Group -',
            'class' => 'KAC\SiteBundle\Entity\Product\FeatureGroup',
            'data_class' => null,
            'query_builder' => function(EntityRepository $er) use ($departmentId) {
                $qb = $er->createQueryBuilder('fg');
                $qb2 = $er->createQueryBuilder('fg2');
                $qb2->select('fg2.id')
                    ->from('KAC\SiteBundle\Entity\DepartmentToFeature', 'df')
                    ->where('df.featureGroup = fg2')
                    ->orderBy('df.displayOrder');
                $qb->andWhere($qb->expr()->in('fg.id', $qb2->getDQL()));
                return $qb;
            },
            'attr' => array(
                'class' => 'feature-group fill',
                'data-placeholder' => '- Select a Group -',
                'placeholder' => '- Select a Group -',
                'data-help' => 'Select a feature group.',
            ),
        ));

        $builder->add('feature', 'choice', array(
            'required' => true,
            'empty_value' => '- Select a Group First -',
            'choices' => array(),
            'attr' => array(
                'class' => 'feature fill',
                'data-placeholder' => '- Select a Group First -',
                'placeholder' => '- Select a Group First -',
                'data-help' => 'Select a corresponding feature.',
            ),
        ));

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data VariantToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();
            if ($data && $data->getFeatureGroup())
            {
                if ($data->getFeatureGroup()->getId() > 0)
                {
                    $form->remove('feature');
                    $form->add($factory->createNamed('feature', 'entity', null, array(
                        'auto_initialize' => false,
                        'required'  => true,
                        'empty_value' => '- Select a Feature -',
                        'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                        'query_builder' => function(EntityRepository $er) use ($data) {
                            $qb = $er->createQueryBuilder('f');
                            $qb->add('where', $qb->expr()->eq('f.featureGroup', $data->getFeatureGroup()->getId()));
                            $qb->orderBy('f.name');
                            return $qb;
                        },
                        'attr' => array(
                            'class' => 'feature fill',
                            'data-placeholder' => '- Select a Feature -',
                            'placeholder' => '- Select a Feature -',
                        ),
                    )));
                }
            }
        });

        $builder->addEventListener(FormEvents::PRE_BIND, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data VariantToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();

            if ($data && isset($data['featureGroup']))
            {
                if ($data['featureGroup'] > 0)
                {
                    $form->remove('feature');
                    $form->add($factory->createNamed('feature', 'entity', null, array(
                        'auto_initialize' => false,
                        'required'  => true,
                        'empty_value' => '- Select a Feature -',
                        'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                        'query_builder' => function(EntityRepository $er) use ($data) {
                            $qb = $er->createQueryBuilder('f');
                            $qb->add('where', $qb->expr()->eq('f.featureGroup', $data['featureGroup']));
                            $qb->orderBy('f.name');
                            return $qb;
                        },
                        'attr' => array(
                            'class' => 'feature fill',
                            'data-placeholder' => '- Select a Feature -',
                            'placeholder' => '- Select a Feature -',
                        ),
                    )));
                }
            }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\VariantToFeature'
        ));
    }

    public function getName()
    {
        return 'site_product_feature_combination';
    }
}
