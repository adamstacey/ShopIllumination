<?php
namespace WebIllumination\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use WebIllumination\SiteBundle\Indexer\ProductIndexer;
use WebIllumination\SiteBundle\Entity\Product;
use WebIllumination\SiteBundle\Entity\Product\Variant;
use WebIllumination\SiteBundle\Manager\ProductManager;

class VariantListener
{
    protected $manager;
    protected $indexer;

    public function __construct(ProductManager $manager, ProductIndexer $indexer)
    {
        $this->indexer = $indexer;
        $this->manager = $manager;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            foreach($entity->getDescriptions() as $description)
            {
                $this->manager->updateVariantDescription($description);
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            foreach($entity->getDescriptions() as $description)
            {
                $this->manager->updateVariantDescription($description);
            }
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            $this->indexer->index($entity->getProduct());
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            $this->indexer->index($entity->getProduct());
        }
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            $this->indexer->index($entity->getProduct());
        }
    }
}