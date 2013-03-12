<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Manager\ProductManager;

class ProductListener
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

        if($entity instanceof Product)
        {
            foreach($entity->getDescriptions() as $description)
            {

                $this->manager->updateProductDescription($description);
            }

            foreach($entity->getVariants() as $variant)
            {
                foreach($variant->getDescriptions() as $description)
                {
                    $this->manager->updateVariantDescription($description);
                }
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Product)
        {
            foreach($entity->getDescriptions() as $description)
            {

                $this->manager->updateProductDescription($description);
            }
            foreach($entity->getVariants() as $variant)
            {
                foreach($variant->getDescriptions() as $description)
                {
                    $this->manager->updateVariantDescription($description);
                }
            }
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Product)
        {
            $this->manager->addRoute($entity);

            $this->indexer->index($entity);
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Product)
        {
            $this->indexer->index($entity);
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof Product)
        {
            $this->indexer->delete($entity);
        }
    }
}