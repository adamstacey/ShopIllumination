<?php

namespace WebIllumination\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

class FeatureGroupType extends AbstractType
{
    /**
     * @var ManagerRegistry
     */
    protected $registry;

    /**
     * @var array
     */
    private $choiceListCache = array();

    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $registry = $this->registry;
        $choiceListCache =& $this->choiceListCache;
        $that = $this;

        $choiceList = function (Options $options) use (&$choiceListCache, &$that) {
            if($options['choices'] === null)
            {
                $choices = $that->loadFeatures($options);
            } else {
                $choices = $options['choices'];
            }

            $labelHash = is_object($options['label'])
                ? spl_object_hash($options['label'])
                : $options['label'];
            $valueHash = is_object($options['value'])
                ? spl_object_hash($options['value'])
                : $options['value'];
            $groupByHash = is_object($options['group_by'])
                ? spl_object_hash($options['group_by'])
                : $options['group_by'];
            $choiceHashes = $choices;
            $preferredChoiceHashes = $options['preferred_choices'];

            $hash = md5(json_encode(array(
                $labelHash,
                $valueHash,
                $groupByHash,
                $choiceHashes,
                $preferredChoiceHashes,
            )));

            if (!isset($choiceListCache[$hash])) {
                $choiceListCache[$hash] = new ObjectChoiceList(
                    $choices,
                    $options['label'],
                    $options['preferred_choices'],
                    $options['group_by'],
                    $options['value']
                );
            }

            return $choiceListCache[$hash];
        };

        $resolver->setRequired(array('department'));

        $resolver->setDefaults(array(
            'label'             => 'productFeature',
            'value'             => null,
            'query_builder'    => null,
            'choices'           => null,
            'choice_list'      => $choiceList,
            'group_by'          => null,
        ));
    }

    public function loadFeatures($department)
    {
        $em = $this->registry->getManager();
        $qb = $em->getRepository('WebIllumination\SiteBundle\Entity\DepartmentToFeature')->createQueryBuilder('fg')
            ->orderBy('fg.displayOrder', 'ASC');

        $qb->where('fg.department = :department');
        $qb->setParameter('department', $department);

        $featureGroups = $qb->getQuery()->getResult();

        return $featureGroups;
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'feature_group';
    }
}
