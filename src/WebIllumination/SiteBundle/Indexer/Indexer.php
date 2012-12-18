<?php
namespace WebIllumination\SiteBundle\Indexer;

use Doctrine\Bundle\DoctrineBundle\Registry;

abstract class Indexer implements IndexerInterface
{
    /**
     * @var \Solarium_Client
     */
    private $solarium;

    function __construct(\Solarium_Client $solarium)
    {
        $this->solarium = $solarium;
    }

    /**
     * @return \Solarium_Client
     */
    public function getSolarium()
    {
        return $this->solarium;
    }
}
