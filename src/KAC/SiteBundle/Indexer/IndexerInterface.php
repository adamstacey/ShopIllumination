<?php
namespace KAC\SiteBundle\Indexer;

use Doctrine\Bundle\DoctrineBundle\Registry;

interface IndexerInterface
{
    function index($entity);
    function delete($entity=null);
}
