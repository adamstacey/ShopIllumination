<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\BrandToDepartment;
use KAC\SiteBundle\Entity\Product\Routing;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\Redirect;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class UpdateRoutesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:routes')
            ->setDescription('Generate routes.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $department Department
         * @var $departmentJoin BrandToDepartment
         * @var $brand Brand
         * @var $product Product
         * @var $variant Variant
         */
        $em = $this->getContainer()->get('doctrine')->getManager();
        $seo = $this->getContainer()->get('kac_site.manager.seo');

        $i = 0;
        $batchSize = 20;

        // Generate the brand routes
        // Fetch the brands
        $brands = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand")->findAll();
        foreach($brands as $brand)
        {
            // Check if a route already exists
            $routes = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\Routing")->findBy(array(
                'brand' => $brand->getId(),
            ));

            // If no routes were found create a new route
            if(count($routes) <= 0)
            {
                $route = new Brand\Routing();
                $route->setBrand($brand);
                $route->setLocale('en');
                $route->setUrl($seo->generateUrl($brand->getDescription()->getPageTitle()));

                $em->persist($route);

                $i++;
            }

            if (($i % $batchSize) === 0) {
                $em->flush();
            }
        }

        // Generate the department routes
        // Fetch the brands
        $departments = $em->getRepository("KAC\\SiteBundle\\Entity\\Department")->findAll();
        foreach($departments as $department)
        {
            if($department->getStatus() !== 'a')
            {
                break;
            }

            // Check if a route already exists
            $routes = $em->getRepository("KAC\\SiteBundle\\Entity\\Department\\Routing")->findBy(array(
                'department' => $department->getId(),
            ));

            // If no routes were found create a new route
            if(count($routes) <= 0)
            {
                $route = new Department\Routing();
                $route->setDepartment($department);
                $route->setLocale('en');
                $route->setUrl($seo->createUrl($department->getDescription()->getPageTitle()));

                $em->persist($route);

                $i++;
            }

            if (($i % $batchSize) === 0) {
                $em->flush();
            }
        }

        // Generate the brands_with_departments routes
        // Fetch the brands
        $brands = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand")->findAll();
        foreach($brands as $brand)
        {
            foreach($brand->getDepartments() as $departmentJoin)
            {
                $department = $departmentJoin->getDepartment();

                // Check if a route already exists
                $routes = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting")->findBy(array(
                    'brand' => $brand->getId(),
                    'department' => $department->getId(),
                ));

                // If no routes were found create a new route
                if(count($routes) <= 0)
                {
                    $route = new Brand\DepartmentRouting();
                    $route->setBrand($brand);
                    $route->setDepartment($department);
                    $route->setLocale('en');
                    $route->setUrl($seo->generateUrl($brand->getRouting()->getUrl().'/'.$department->getRouting()->getUrl()));

                    $em->persist($route);

                    $i++;
                }

                if (($i % $batchSize) === 0) {
                    $em->flush();
                }
            }
        }

        /**
         * @var $route Brand\DepartmentRouting
         */
        // Add redirects for the brand_to_department urls
        $routes = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting")->findAll();
        foreach($routes as $route)
        {
            $brands = array();
            $departments = array();

            // Get all brand URLs
            foreach($route->getBrand()->getRoutings() as $brandRoute)
            {
                $brands[] = $brandRoute->getUrl();
            }
            $brandRedirects = $em->getRepository("KAC\\SiteBundle\\Entity\\Redirect")->findBy(array(
                'objectType' => 'brand',
                'objectId' => $route->getBrand()->getId()
            ));
            foreach($brandRedirects as $redirect)
            {
                $brands[] = $redirect->getRedirectFrom();
            }

            // Get all department URLs
            foreach($route->getDepartment()->getRoutings() as $departmentRoute)
            {
                $departments[] = $departmentRoute->getUrl();
            }
            $brandRedirects = $em->getRepository("KAC\\SiteBundle\\Entity\\Redirect")->findBy(array(
                'objectType' => 'department',
                'objectId' => $route->getDepartment()->getId()
            ));
            foreach($brandRedirects as $redirect)
            {
                $departments[] = $redirect->getRedirectFrom();
            }

            foreach($brands as $brandUrl)
            {
                foreach($departments as $departmentUrl)
                {
                    $url = $seo->generateUrl('brand/'.$brandUrl.'/'.$departmentUrl);

                    // Check if a redirect already exists
                    $redirects = $em->getRepository("KAC\\SiteBundle\\Entity\\Redirect")->findBy(array(
                        'redirectFrom' => $url,
                    ));

                    // If no routes were found create a new route
                    if(count($redirects) <= 0)
                    {
                        $redirect = new Redirect();
                        $redirect->setObjectId($route->getBrand()->getId());
                        $redirect->setSecondaryId($route->getDepartment()->getId());
                        $redirect->setObjectType($route->getObjectType());
                        $redirect->setRedirectCode(301);
                        $redirect->setRedirectFrom($url);
                        $redirect->setRedirectTo($route->getUrl());


                        $em->persist($redirect);

                        $i++;
                    }

                    if (($i % $batchSize) === 0) {
                        $em->flush();
                    }
                }
            }
        }

        $em->flush();
    }
}