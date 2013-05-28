<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use KAC\SiteBundle\Entity\Image;
use KAC\SiteBundle\Manager\ImageManager;

class ImageListener
{
    protected $manager;
    protected $indexer;

    public function __construct(ImageManager $manager)
    {
        $this->manager = $manager;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->preUpload();
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->preUpload();
            $object = $this->manager->getObject($entity);
            if ($object)
            {
                $this->manager->process($entity, $object);
                $args->setNewValue('publicPath', $entity->getPublicPath());
            }
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->upload();
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->upload();
        }
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->storeFilenameForRemove();
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Image)
        {
            $entity->removeUpload();
        }
    }
}