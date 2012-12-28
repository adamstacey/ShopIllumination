<?php
namespace WebIllumination\SiteBundle\Indexer;

use Doctrine\Bundle\DoctrineBundle\Registry;

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
