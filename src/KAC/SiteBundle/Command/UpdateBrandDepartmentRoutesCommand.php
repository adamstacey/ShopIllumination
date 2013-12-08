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

class UpdateBrandDepartmentRoutesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:brandDepartmentRoutes')
            ->setDescription('Generate brand department routes.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $seo = $this->getContainer()->get('kac_site.manager.seo');

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
            'objectType' => 'brand_with_department',
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
                if ($product->getDepartments())
                {
                    foreach ($product->getDepartments() as $productDepartment)
                    {
                        if ($productDepartment)
                        {
                            if ($productDepartment->getDepartment())
                            {
                                $productDepartmentDepartment = $productDepartment->getDepartment();
                                $departmentIds = explode('|', $productDepartmentDepartment->getDepartmentPath());
                                foreach ($departmentIds as $departmentId)
                                {
                                    $department = $em->getRepository("KAC\\SiteBundle\\Entity\\Department")->find($departmentId);
                                    if ($department)
                                    {
                                        // Check if a route already exists
                                        $route = $em->getRepository("KAC\\SiteBundle\\Entity\\Brand\\DepartmentRouting")->findOneBy(array(
                                            'brand' => $brand,
                                            'department' => $department,
                                        ));

                                        // If no routes were found create a new route
                                        if (!$route)
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
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $department = $product->getDepartment()->getDepartment();
                }
            }
        }

        $em->flush();
    }
}