<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\Brand;
use KAC\SiteBundle\Entity\BrandToDepartment;
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
         * @var $brand Brand
         * @var $departmentJoin BrandToDepartment
         */
        $em = $this->getContainer()->get('doctrine')->getManager();
        $seo = $this->getContainer()->get('kac_site.manager.seo');

        $i = 0;
        $batchSize = 20;

        // TODO: Check that department has at least 1 route
        // TODO: Check that brand has at least 1 route
        // TODO: Check that product has at least 1 route

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
                    $route->setUrl($seo->generateUrl('brand/'.$brand->getDescription()->getHeader().'/'.$department->getRouting()->getUrl()));

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