<?php
namespace KAC\SiteBundle\Command;

use Doctrine\ORM\EntityManager;
use KAC\SiteBundle\Entity\DepartmentToFeature;
use KAC\SiteBundle\Entity\Product;
use KAC\SiteBundle\Entity\Product\Variant;
use KAC\SiteBundle\Entity\ProductToDepartment;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use KAC\SiteBundle\Entity\Department;
use KAC\SiteBundle\Entity\DepartmentTmp;
use KAC\SiteBundle\Indexer\ProductIndexer;
use KAC\SiteBundle\Repository\DepartmentRepository;

class FixMaiaProductsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:fix:maia_products')
            ->setDescription('Fix Maia products')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var $em EntityManager
         * @var $repository DepartmentRepository
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        // Fetch Department
        $brand = $em->getRepository('KACSiteBundle:Brand')->find(15);
        $department = $em->getRepository('KACSiteBundle:Department')->find(41);
        $oldProducts = $em->getRepository('KAC\SiteBundle\Entity\Product')->findBy(array('brand' => 15));
        $colours = array();

        // Find colours
        /**
         * @var $oldProducts Product[]
         * @var $oldProduct Product
         * @var $vtf Product\VariantToFeature
         */
        foreach($oldProducts as $oldProduct)
        {
            if(!$oldProduct->getVariant())
            {
                continue;
            }

            foreach($oldProduct->getVariant()->getFeatures() as $vtf) {
                if($vtf->getFeatureGroup() && $vtf->getFeature())
                {
                    if($vtf->getFeatureGroup()->getName() === 'Colour' && array_search($vtf->getFeature()->getName(), $colours) === false) {
                        $colours[] = $vtf->getFeature()->getName();
                    }
                }
            }
        }

        // Create product for each colour
        foreach($colours as $colour)
        {
            $oldProducts = $em->getRepository('KAC\SiteBundle\Entity\Product')->createQueryBuilder('p')
                ->join('p.variants', 'v')
                ->join('v.features', 'vtf')
                ->join('vtf.featureGroup', 'fg')
                ->join('vtf.feature', 'f')
                ->where('fg.name = \'Colour\'')
                ->where('f.name = ?1')
                ->setParameter(1, $colour)
                ->getQuery()->execute();

            // Create the parent product
            $product = new Product();
            $product->setBrand($brand);
            $product->setStatus('a');
            $product->setAvailableForPurchase(true);
            $product->setSampleRequest(true);
            $product->setTemplate('maia');

            $pDepartment = new ProductToDepartment();
            $pDepartment->setProduct($product);
            $pDepartment->setDepartment($department);
            $pDepartment->setDisplayOrder(1);
            $product->addDepartment($pDepartment);

            // Build the product description
            $description = new Product\Description();
            $description->setProduct($product);
            $description->setOverride(true);
            $description->setDescription('Description');
            $description->setBrandDescription('Brand Description');
            $description->setPageTitle($colour);
            $description->setHeader('Maia Worktops in ' . $colour);
            $description->setMetaDescription('Meta Description');
            $description->setMetaKeywords('maia, worktop, ' . $colour);
            $product->addDescription($description);

            // Add route
            $url = $this->getContainer()->get('kac_site.manager.seo')->createUrl('maia-worktops/' . $colour);
            $routing = new Product\Routing();
            $routing->setProduct($product);
            $routing->setLocale('en');
            $routing->setUrl($url);
            $product->addRouting($routing);

            $output->writeln("Creating variants for " . $colour);
            // Create the variants
            $i=0;
//            \Doctrine\Common\Util\Debug::dump(count($oldProducts));die();
            foreach($oldProducts as $oldProduct)
            {
                $variant = $oldProduct->getVariant();

                // Update variant description
                $oldDescription = $oldProduct->getDescription();
                $description = new Variant\Description();
                $description->setVariant($variant);
                $description->setOverride(true);
                $description->setDescription($oldDescription->getDescription());
                $description->setBrandDescription($oldDescription->getBrandDescription());
                $description->setPageTitle($oldDescription->getPageTitle());
                $description->setHeader($oldDescription->getHeader());
                $description->setMetaDescription($oldDescription->getMetaDescription());
                $description->setMetaKeywords($oldDescription->getMetaKeywords());
                $variant->addDescription($description);

                $product->addVariant($variant);
                $i++;
            }

            $em->persist($product);
            $em->flush();
            die();
        }

        $output->writeln('Starting to delete old products');
        // Delete all the old products
//        $oldProducts = $em->getRepository('KAC\SiteBundle\Entity\Product')->createQueryBuilder('p')
//            ->where('p.brand = 15')
//            ->andWhere('p.template <> \'maia\'')
//            ->getQuery()
//            ->execute();
//
//        foreach($oldProducts as $oldProduct)
//        {
//            $em->remove($oldProduct);
//            $em->flush();
//        }
        $output->writeln('Deleted old products');

        $output->writeln('Finished!');
    }
}