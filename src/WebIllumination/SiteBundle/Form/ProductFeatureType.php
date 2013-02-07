<?php

namespace WebIllumination\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use WebIllumination\SiteBundle\Entity\Product\Feature;
use WebIllumination\SiteBundle\Entity\ProductToFeature;

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

        $builder->add('productFeature', 'entity', array(
            'required'  => false,
            'empty_value' => 'Select a group.',
            'class' => 'WebIllumination\SiteBundle\Entity\Product\FeatureGroup',
            'data_class' => null,
            'query_builder' => function(EntityRepository $er) use ($departmentId) {
                $qb = $er->createQueryBuilder('fg');
                $qb2 = $er->createQueryBuilder('fg2');

                $qb2->select('fg2.id')
                    ->from('WebIllumination\SiteBundle\Entity\DepartmentToFeature', 'df')
                    ->where('df.productFeature = fg2');
                if($departmentId) {
                    $qb2->andWhere($qb2->expr()->eq('df.department', $departmentId));
                }

                $qb->andWhere($qb->expr()->in('fg.id', $qb2->getDQL()));

                return $qb;
            },
        ));
        $builder->add('defaultFeature', 'choice', array(
            'required' => false,
            'empty_value' => 'Please select a group first.',
            'choices' => array(),
        ));
        $builder->addEventListener(FormEvents::SET_DATA, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data ProductToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();
            if ($data && $data->getProductFeature() !== null) {
                $form->remove('defaultFeature');
                $form->add($factory->createNamed('defaultFeature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => 'Select a feature.',
                    'class' => 'WebIllumination\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.productFeatureGroup', $data->getProductFeature()->getId()));
                        $qb->orderBy('f.productFeature');
                        return $qb;
                    },
                )));
            }
        });
        $builder->addEventListener(FormEvents::PRE_BIND, function($event) use ($factory) {
            /**
             * @var $event FormEvent
             * @var $data ProductToFeature
             */
            $data = $event->getData();
            $form = $event->getForm();

            if ($data && isset($data['defaultFeature'])) {
//                \Doctrine\Common\Util\Debug::dump($data);die();
                $form->remove('defaultFeature');
                $form->add($factory->createNamed('defaultFeature', 'entity', null, array(
                    'required'  => false,
                    'empty_value' => 'Select a feature.',
                    'class' => 'WebIllumination\SiteBundle\Entity\Product\Feature',
                    'query_builder' => function(EntityRepository $er) use ($data) {
                        $qb = $er->createQueryBuilder('f');
                        $qb->add('where', $qb->expr()->eq('f.productFeatureGroup', $data['productFeature']));
                        $qb->orderBy('f.productFeature');
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
            'data_class' => 'WebIllumination\SiteBundle\Entity\ProductToFeature'
        ));
    }

    public function getName()
    {
        return 'site_product_feature';
    }
}
