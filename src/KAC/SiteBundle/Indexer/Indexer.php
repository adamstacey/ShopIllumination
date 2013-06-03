<?php
namespace KAC\SiteBundle\Indexer;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class Indexer implements IndexerInterface
{
    /**
     * @var \Solarium_Client
     */
    private $solarium;

    /**
     * @var Registry $doctrine
     */
    private $doctrine;

    public function getProperty($object, $path, $default=null)
    {
        try {
            $accessor = PropertyAccess::createPropertyAccessor();
            return $accessor->getValue($object, $path);
        } catch(\Exception $e) {
            return $default;
        }
    }

    function __construct(\Solarium_Client $solarium, Registry $doctrine)
    {
        $this->solarium = $solarium;
        $this->doctrine = $doctrine;
    }

    /**
     * @return \Solarium_Client
     */
    public function getSolarium()
    {
        return $this->solarium;
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }
}
