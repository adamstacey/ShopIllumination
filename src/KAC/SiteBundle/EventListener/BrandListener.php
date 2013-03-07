<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use KAC\SiteBundle\Indexer\Brandndexer;
use KAC\SiteBundle\Entity\Brand;

class BrandListener
{
    protected $indexer;

    public function __construct(ProductIndexer $indexer)
    {
        $this->indexer = $indexer;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $em = $args->getEntityManager();

        if($entity instanceof Brand)
        {
            $this->indexer->index($entity);
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if($entity instanceof Brand)
        {
            $this->indexer->delete($entity);
        }
    }
}