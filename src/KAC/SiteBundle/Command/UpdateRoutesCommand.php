<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\Brand\Routing as BrandRouting;
use KAC\SiteBundle\Entity\Brand\DepartmentRouting as BrandDepartmentRouting;
use KAC\SiteBundle\Entity\Department\Routing as DepartmentRouting;
use KAC\SiteBundle\Entity\BrandToDepartment;
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
        $output->writeln('####################################');
        $output->writeln('UPDATE THE BRAND ROUTES');
        $output->writeln('####################################');
        // Fetch the brands
        $brands = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand")->findAll();
        foreach ($brands as $brand)
        {
            // Check if a route already exists
            $route = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\Routing")->findOneBy(array(
                'brand' => $brand,
            ));

            // If no routes were found create a new route
            if (!$route)
            {
                $route = new BrandRouting();
                $route->setBrand($brand);
                $route->setLocale('en');
                $route->setUrl($seo->generateUrl($brand->getDescription()->getPageTitle()));
                $em->persist($route);
                $em->flush();
            }
            $output->writeln('Updated route for: '.$route->getUrl());
        }

        // Generate the department routes
        $output->writeln('####################################');
        $output->writeln('UPDATE THE DEPARTMENT ROUTES');
        $output->writeln('####################################');
        // Fetch the departments
        $departments = $em->getRepository("KAC\\SiteBundle\\Entity\\Department")->findAll();
        foreach ($departments as $department)
        {
            // Check if a route already exists
            $route = $em->getRepository("KAC\\SiteBundle\\Entity\\Department\\Routing")->findOneBy(array(
                'department' => $department,
            ));
            // If no routes were found create a new route
            if (!$route)
            {
                $url = $seo->createUrl($department->getDescription()->getPageTitle());
                $route = new DepartmentRouting();
                $route->setDepartment($department);
                $route->setLocale('en');
                $route->setUrl($url);
                $em->persist($route);
                $em->flush();
            }
            $output->writeln('Updated route for: '.$route->getUrl());
        }

        // Generate the brands_with_departments routes
        $output->writeln('####################################');
        $output->writeln('UPDATING BRANDS WITH DEPARTMENTS ROUTES');
        $output->writeln('####################################');
        // Remove the routes to start with
        $routes = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting")->findAll();
        foreach ($routes as $route)
        {
            $em->remove($route);
        }
        $redirects = $em->getRepository("KAC\\SiteBundle\\Entity\\Redirect")->findBy(array(
            'object_type' => 'brand_with_department',
        ));
        foreach ($redirects as $redirect)
        {
            $em->remove($redirect);
        }
        $em->flush();
        // Fetch the brands
        $brands = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand")->findAll();
        foreach ($brands as $brand)
        {
            $products = $em->getRepository("KAC\\SiteBundle\\Entity\\Product")->findBy(array(
                'brand' => $brand,
            ));
            foreach ($products as $product)
            {
                $department = false;
                if ($product->getDepartment())
                {
                    $department = $product->getDepartment()->getDepartment();
                }

                if ($department)
                {
                    // Check if a route already exists
                    $route = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting")->findOneBy(array(
                        'brand' => $brand,
                        'department' => $department,
                    ));

                    // If no routes were found create a new route
                    if ($route)
                    {
                        $url = $seo->generateUrl($brand->getRouting()->getUrl().'/'.$department->getRouting()->getUrl());
                        $route = new BrandDepartmentRouting();
                        $route->setBrand($brand);
                        $route->setDepartment($department);
                        $route->setLocale('en');
                        $route->setUrl($url);
                        $output->writeln('Adding Brand Department Route: '.$url);
                        $em->persist($route);

                        $redirect = new Redirect();
                        $redirect->setObjectId($brand->getId());
                        $redirect->setSecondaryId($department->getId());
                        $redirect->setObjectType('brand_with_department');
                        $redirect->setRedirectCode(301);
                        $redirect->setRedirectFrom('brand/'.$url);
                        $redirect->setRedirectTo($url);
                        $em->flush();

                        $em->persist($redirect);

                        $i++;
                    }
                }
            }
        }

        // Cleanse the routing
        $output->writeln('####################################');
        $output->writeln('CLEANING THE CURRENT REDIRECTS');
        $output->writeln('####################################');
        $redirects = $em->getRepository("KAC\\SiteBundle\\Entity\\Redirect")->findAll();
        foreach ($redirects as $redirect)
        {
            $output->writeln('Checking redirect for: '.$redirect->getRedirectTo());
            $route = $em->getRepository("KAC\\SiteBundle\\Entity\\Routing")->findOneBy(array(
                'url' => $redirect->getRedirectTo(),
            ));
            if (!$route)
            {
                $output->writeln('Removing redirect for: '.$redirect->getRedirectTo());
                $em->remove($redirect);
            }
            $em->flush();
        }
        
        $em->flush();
    }
}