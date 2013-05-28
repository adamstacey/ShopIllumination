<?php
namespace KAC\SiteBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use KAC\SiteBundle\Entity\Document;
use KAC\SiteBundle\Manager\DocumentManager;

class DocumentListener
{
    protected $manager;
    protected $indexer;

    public function __construct(DocumentManager $manager)
    {
        $this->manager = $manager;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->preUpload();
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->preUpload();
            $object = $this->manager->getObject($entity);
            if ($object)
            {
                $this->manager->process($entity, $object);
                $args->setNewValue('path', $entity->getPath());
            }
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->upload();
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->upload();
        }
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->storeFilenameForRemove();
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof Document)
        {
            $entity->removeUpload();
        }
    }
}