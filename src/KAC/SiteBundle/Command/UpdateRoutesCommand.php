<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\BrandToDepartment;
use KAC\SiteBundle\Entity\Product\Routing;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
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
                    $route->setUrl($seo->generateUrl('brand/'.$brand->getRouting()->getUrl().'/'.$department->getRouting()->getUrl()));

                    $em->persist($route);

                    $i++;
                }

                if (($i % $batchSize) === 0) {
                    $em->flush();
                }
            }
        }
    }
}