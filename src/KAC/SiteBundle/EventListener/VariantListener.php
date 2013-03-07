<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Manager\ProductManager;

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

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Variant)
        {
            $this->indexer->index($entity->getProduct());
        }
    }
}