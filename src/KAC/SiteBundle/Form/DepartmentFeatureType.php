<?php

namespace KAC\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use KAC\SiteBundle\Entity\Department\Feature;

class DepartmentFeatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $factory = $builder->getFormFactory();

        $builder->add('featureGroup', 'entity', array(
            'required'  => false,
            'empty_value' => '- Select a Group -',
            'class' => 'KAC\SiteBundle\Entity\Product\FeatureGroup',
            'data_class' => null,
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('fg')
                    ->orderBy('fg.name', 'ASC');
            },
            'attr' => array(
                'class' => 'feature-group fill',
            ),
        ));

        $builder->add('feature', 'choice', array(
            'required' => false,
            'empty_value' => '- Select a Group First -',
            'choices' => array(),
            'attr' => array(
                'class' => 'feature fill',
            ),
        ));

        $builder->add('displayOnFilter', 'checkbox', array(
            'required'  => false,
            'attr' => array(
                'containerClass' => 'tac',
            ),
        ));

        $builder->add('displayOnListing', 'checkbox', array(
            'required'  => false,
            'attr' => array(
                'containerClass' => 'tac',
            ),
        ));

        $builder->add('displayOnProduct', 'checkbox', array(
            'required'  => false,
            'attr' => array(
                'containerClass' => 'tac',
            ),
        ));

        $builder->add('displayOrder', 'hidden');

        $builder->addEventListener(FormEvents::SET_DATA, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data DepartmentToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();
            if ($data && $data->getFeatureGroup() !== null) {
                $form->offsetSet('feature', $factory->createNamed('feature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => 'No Default Feature',
                    'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.featureGroup', $data->getFeatureGroup()->getId()));
                        $qb->orderBy('f.name');
                        return $qb;
                    },
                    'attr' => array(
                        'class' => 'feature fill',
                    ),
                )));
            }
        });
        $builder->addEventListener(FormEvents::PRE_BIND, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data DepartmentToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();

            if ($data && isset($data['featureGroup'])) {
                $form->offsetSet('feature', $factory->createNamed('feature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => 'No Default Feature',
                    'class' => 'KAC\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.featureGroup', $data['featureGroup']));
                        $qb->orderBy('f.name');
                        return $qb;
                    },
                    'attr' => array(
                        'class' => 'feature fill',
                    ),
                )));
            }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KAC\SiteBundle\Entity\DepartmentToFeature'
        ));
    }

    public function getName()
    {
        return 'site_department_feature';
    }
}
