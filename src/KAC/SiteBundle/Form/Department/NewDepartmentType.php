<?php

namespace KAC\SiteBundle\Form\Department;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Repository\DepartmentRepository;

class NewDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flowStep']) {
            case 1:
                $builder->add('parent', 'entity', array(
                    'label' => 'Department',
                    'property' => 'indentedName',
                    'class' => 'KAC\SiteBundle\Entity\Department',
                    'query_builder' => function(DepartmentRepository $er) {
                        $rootNodes = $er->getRootNodes();
                        if(count($rootNodes) != 1) {
                            return $er->createQueryBuilder('d');
                        } else {
                            return $er->childrenQueryBuilder($rootNodes[0])
                                ->addSelect('d')
                                ->leftJoin('node.descriptions', 'd');
                        }
                    },
                    'attr' => array(
                        'class' => 'select-department fill no-uniform',
                        'data-help' => 'Select the department you want this department to fall under.',
                    ),
                ));

                $builder->add('status', 'choice', array(
                    'label' => 'Status',
                    'choices' => array('a' => 'Available', 'h' => 'Hidden', 'd' => 'Disabled'),
                    'attr' => array(
                        'data-help' => 'Select the status of the department. Any sub-departments will also inherit this status.',
                    ),
                ));

                $builder->add('descriptions', 'collection', array(
                    'type' => new DepartmentDescriptionOverviewType(),
                ));
                break;
            case 2:
                $builder->add('descriptions', 'collection', array(
                    'type' => new DepartmentDescriptionSeoType(),
                ));

                $builder->add('routings', 'collection', array(
                    'type' => new DepartmentRoutingType(),
                ));
                break;
            case 3:
                $builder->add('deliveryBand', 'choice', array(
                    'label' => 'Delivery Band',
                    'choices' => array(0 => '- Not Set -', 1 => 'Delivery Band 1', 2 => 'Delivery Band 2', 3 => 'Delivery Band 3', 4 => 'Delivery Band 4', 5 => 'Delivery Band 5', 6 => 'Delivery Band 6'),
                    'attr' => array(
                        'data-help' => 'Select the delivery band for the department. Leave it as "Not Set" if you want the delivery band to be inherited from the department this department falls under.',
                    ),
                ));
                break;
            case 4:
                $builder->add('features', 'collection', array(
                    'type' => new DepartmentFeatureType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                ));
                break;
            case 5:
                $builder->add('descriptions', 'collection', array(
                    'type' => new DepartmentDescriptionTemplatesType(),
                ));
                break;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flowStep' => 1,
            'data_class' => 'KAC\SiteBundle\Entity\Department',
            'type' => 's',
            'descriptions' => array(),
        ));
    }

    public function getName()
    {
        return 'site_new_department';
    }
}
