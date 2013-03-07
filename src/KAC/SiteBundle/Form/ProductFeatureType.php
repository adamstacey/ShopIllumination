<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Product\Feature;

class ProductFeatureType extends AbstractType
{
    private $departmentId;

    public function __construct($departmentId)
    {
        $this->departmentId = $departmentId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $departmentId = $this->departmentId;
        $factory = $builder->getFormFactory();

        $builder->add('featureGroup', 'entity', array(
            'required'  => false,
            'empty_value' => '- Select a Group -',
            'class' => 'KAC\SiteBundle\Entity\Product\FeatureGroup',
            'data_class' => null,
            'query_builder' => function(EntityRepository $er) use ($departmentId) {
                $qb = $er->createQueryBuilder('fg');
                $qb2 = $er->createQueryBuilder('fg2');

                $qb2->select('fg2.id')
                    ->from('KAC\SiteBundle\Entity\DepartmentToFeature', 'df')
                    ->where('df.featureGroup = fg2');
                if($departmentId) {
                    $qb2->andWhere($qb2->expr()->eq('df.department', $departmentId));
                }

                $qb->andWhere($qb->expr()->in('fg.id', $qb2->getDQL()));

                return $qb;
            },
        ));

        $builder->add('feature', 'choice', array(
            'required' => false,
            'empty_value' => '- Select a Group First -',
            'choices' => array(),
        ));

        $builder->addEventListener(FormEvents::SET_DATA, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data VariantToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();
            if ($data && $data->getFeatureGroup() !== null) {
                $form->remove('feature');
                $form->add($factory->createNamed('feature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => '- Select a Feature -',
                    'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.featureGroup', $data->getFeatureGroup()->getId()));
                        $qb->orderBy('f.name');
                        return $qb;
                    },
                )));
            }
        });
        $builder->addEventListener(FormEvents::PRE_BIND, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data VariantToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();

            if ($data && isset($data['featureGroup'])) {
                $form->remove('feature');
                $form->add($factory->createNamed('feature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => '- Select a Feature -',
                    'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.featureGroup', $data['featureGroup']));
                        $qb->orderBy('f.name');
                        return $qb;
                    },
                )));
            }
        });
        $builder->add('displayOrder', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\Product\VariantToFeature'
        ));
    }

    public function getName()
    {
        return 'site_variant_feature';
    }
}
