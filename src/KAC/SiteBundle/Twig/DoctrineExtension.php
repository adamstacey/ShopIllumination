<?php
namespace KAC\SiteBundle\Twig;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;

class DoctrineExtension extends \Twig_Extension
{
    /**
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected $doctrine;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getFilters()
    {
        return array(
            'detach' => new \Twig_Filter_Method($this, 'detach'),
        );
    }

    public function detach($object)
    {
        $this->doctrine->getManager()->detach($object);
    }

    public function getName()
    {
        return 'doctrine_extension';
    }
}