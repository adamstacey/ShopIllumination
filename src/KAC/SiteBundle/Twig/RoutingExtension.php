<?php
namespace KAC\SiteBundle\Twig;

use Doctrine\Bundle\DoctrineBundle\Registry;
use KAC\SiteBundle\Manager\RoutingManager;
use Symfony\Component\Routing\Router;

class RoutingExtension extends \Twig_Extension
{
    private $doctrine;
    private $router;
    private $manager;

    public function __construct(Registry $doctrine, Router $router, RoutingManager $manager)
    {
        $this->doctrine = $doctrine;
        $this->router = $router;
        $this->manager = $manager;
    }

    public function getFunctions()
    {
        return array(
            'get_listing_url' => new \Twig_Function_Method($this, 'getListingUrl'),
        );
    }

    public function getListingUrl($objectType, $objectId, $secondaryId=null)
    {
        $em = $this->doctrine->getManager();
        $route = null;

        if($objectType === 'brand_with_department')
        {
            if($secondaryId !== null)
            {
                $route = $em->getRepository($this->manager->getClassName($objectType))->findOneBy(array(
                    'objectId' => $objectId,
                    'secondaryId' => $secondaryId,
                ));
            }
        } else {
            $route = $em->getRepository($this->manager->getClassName($objectType))->findOneBy(array(
                'objectId' => $objectId,
            ));
        }

        if($route !== null)
        {
            return $route->getUrl();
        } else {
            return null;
        }
    }

    public function getName()
    {
        return 'kac_routing_extension';
    }
}