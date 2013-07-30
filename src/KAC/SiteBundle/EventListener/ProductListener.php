<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use KAC\SiteBundle\Entity\ProductToDepartment;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
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

        if($entity instanceof ProductToDepartment
            || $entity instanceof Product\Description
            || $entity instanceof Product\Routing
            || $entity instanceof Product\Image
            || $entity instanceof Product\Document
            || $entity instanceof Product\Link
            || $entity instanceof Variant)
        {
            $entity = $entity->getProduct();
        } elseif($entity instanceof Product\VariantToFeature
            || $entity instanceof Variant\Description
            || $entity instanceof Variant\Routing
            || $entity instanceof Variant\Image
            || $entity instanceof Variant\Document
            || $entity instanceof Product\Price
            || $entity instanceof Variant\Link)
        {
            $entity = $entity->getVariant()->getProduct();
        }

        if($entity instanceof Product)
        {
            // Ensure that there is at least one description
            if (!$entity->getDescription()) $entity->addDescription(new Product\Description());
            foreach($entity->getDescriptions() as $description)
            {
                $this->manager->updateProductDescription($description);
            }

            foreach($entity->getVariants() as $variant)
            {
                if (!$variant->getDescription()) $variant->addDescription(new Variant\Description());
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

        if($entity instanceof ProductToDepartment
            || $entity instanceof Product\Description
            || $entity instanceof Product\Routing
            || $entity instanceof Product\Image
            || $entity instanceof Product\Document
            || $entity instanceof Product\Link
            || $entity instanceof Variant)
        {
            $entity = $entity->getProduct();
        } elseif($entity instanceof Product\VariantToFeature
            || $entity instanceof Variant\Description
            || $entity instanceof Variant\Routing
            || $entity instanceof Variant\Image
            || $entity instanceof Variant\Document
            || $entity instanceof Product\Price
            || $entity instanceof Variant\Link)
        {
            $entity = $entity->getVariant()->getProduct();
        }

        if($entity instanceof Product)
        {
            // Ensure that there is at least one description
            if (!$entity->getDescription()) $entity->addDescription(new Product\Description());

            foreach($entity->getDescriptions() as $description)
            {
                $this->manager->updateProductDescription($description);
            }
            foreach($entity->getVariants() as $variant)
            {
                // Ensure that there is at least one description
                if (!$variant->getDescription()) $variant->addDescription(new Variant\Description());
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

        if($entity instanceof ProductToDepartment
            || $entity instanceof Product\Description
            || $entity instanceof Product\Routing
            || $entity instanceof Product\Image
            || $entity instanceof Product\Document
            || $entity instanceof Product\Link
            || $entity instanceof Variant)
        {
            $entity = $entity->getProduct();
        } elseif($entity instanceof Product\VariantToFeature
            || $entity instanceof Variant\Description
            || $entity instanceof Variant\Routing
            || $entity instanceof Variant\Image
            || $entity instanceof Variant\Document
            || $entity instanceof Product\Price
            || $entity instanceof Variant\Link)
        {
            $entity = $entity->getVariant()->getProduct();
        }

        if($entity instanceof Product)
        {
            $this->indexer->index($entity);
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if($entity instanceof ProductToDepartment
            || $entity instanceof Product\Description
            || $entity instanceof Product\Routing
            || $entity instanceof Product\Image
            || $entity instanceof Product\Document
            || $entity instanceof Product\Link
            || $entity instanceof Variant)
        {
            $entity = $entity->getProduct();
        } elseif($entity instanceof Product\VariantToFeature
            || $entity instanceof Variant\Description
            || $entity instanceof Variant\Routing
            || $entity instanceof Variant\Image
            || $entity instanceof Variant\Document
            || $entity instanceof Product\Price
            || $entity instanceof Variant\Link)
        {
            $entity = $entity->getVariant()->getProduct();
        }

        if($entity instanceof Product)
        {
            $this->indexer->index($entity);
        }
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if($entity instanceof Product)
        {
            $this->indexer->delete($entity);
        } else {
            $entity = $args->getEntity();

            if($entity instanceof ProductToDepartment
                || $entity instanceof Product\Description
                || $entity instanceof Product\Routing
                || $entity instanceof Product\Image
                || $entity instanceof Product\Document
                || $entity instanceof Product\Link
                || $entity instanceof Variant)
            {
                $entity = $entity->getProduct();
            } elseif($entity instanceof Product\VariantToFeature
                || $entity instanceof Variant\Description
                || $entity instanceof Variant\Routing
                || $entity instanceof Variant\Image
                || $entity instanceof Variant\Document
                || $entity instanceof Product\Price
                || $entity instanceof Variant\Link)
            {
                $entity = $entity->getVariant()->getProduct();
            }

            if($entity instanceof Product)
            {
                $this->indexer->index($entity);
            }
        }
    }
}