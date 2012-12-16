<?php
namespace WebIllumination\SiteBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use WebIllumination\SiteBundle\Indexer\ProductIndexer;
use WebIllumination\SiteBundle\Entity\Product;

class ProductListener
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

        if($entity instanceof Product)
        {
            $this->indexer->index($entity);
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if($entity instanceof Product)
        {
            $this->indexer->delete($entity);
        }
    }
}