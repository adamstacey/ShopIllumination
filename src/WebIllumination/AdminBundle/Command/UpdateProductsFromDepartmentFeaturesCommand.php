<?php
namespace WebIllumination\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use WebIllumination\AdminBundle\Entity\ProductToFeature;

class UpdateProductsFromDepartmentFeaturesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:updateProductsFromDepartmentFeaturesCommand')
            ->setDescription('Updates the products according to the features set out in the department features.')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'If set, this will only output the results and not make any updates to the database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	ini_set('memory_limit','4000M');
    	
    	// Set the lcoale
    	$locale = 'en';
    	
    	// Get the entity manager
   		$em = $this->getContainer()->get('doctrine')->getEntityManager();
   		
   		// Get the departments
   		$departmentCount = 1;
		$departmentIndexObjects = $em->getRepository('WebIlluminationAdminBundle:DepartmentIndex')->findBy(array('locale' => $locale));
		$departmentTotal = sizeof($departmentIndexObjects);
		foreach ($departmentIndexObjects as $departmentIndexObject)
		{
			// Output		    
	    	$output->writeln($departmentCount.' of '.$departmentTotal.': Getting product features for the department: "<fg=yellow;options=bold>'.$departmentIndexObject->getName().'</fg=yellow;options=bold>"...');
	    	
	    	// Get the department features
			$departmentToFeatureObjects = $em->getRepository('WebIlluminationAdminBundle:DepartmentToFeature')->findBy(array('departmentId' => $departmentIndexObject->getDepartmentId()), array('displayOrder' => 'ASC'));
			$departmentToFeatureProductFeatureGroupIds = array();
			foreach ($departmentToFeatureObjects as $departmentToFeatureObject)
			{
				$departmentToFeatureProductFeatureGroupIds[] = $departmentToFeatureObject->getProductFeatureGroupId();
			}
	    	
			// Get the products
			$productCount = 1;
	    	$productToDepartmentObjects = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('departmentId' => $departmentIndexObject->getDepartmentId(), 'displayOrder' => 1));
	    	$productTotal = sizeof($productToDepartmentObjects);
	    	foreach ($productToDepartmentObjects as $productToDepartmentObject)
	    	{
	    		// Get the product objects
	    		$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $productToDepartmentObject->getProductId(), 'locale' => $locale));
	    		$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $productToDepartmentObject->getProductId(), 'locale' => $locale));
	    		if ($productIndexObject && $productDescriptionObject)
	    		{	
	    			// Output		    
	    			$output->writeln('  -  '.$productCount.' of '.$productTotal.': Checking if an update is required for the product: "<fg=yellow;options=bold>'.$productIndexObject->getPageTitle().'</fg=yellow;options=bold>"...');
	    			
	    			// Set the bullets
					$bullets = array();
					
					// Set the filters
					$filters = array();
					
					// Update the product features
					foreach ($departmentToFeatureObjects as $departmentToFeatureObject)
					{
						if ($departmentToFeatureObject)
						{
							// Get the equivalent product feature
							$productToFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findOneBy(array('productId' => $productIndexObject->getProductId(), 'productFeatureGroupId' => $departmentToFeatureObject->getProductFeatureGroupId()));
							if ($productToFeatureObject)
							{
								// Get the product feature group and product feature
								$productFeatureGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->findOneBy(array('id' => $productToFeatureObject->getProductFeatureGroupId(), 'locale' => $locale));
								$productFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeature')->findOneBy(array('id' => $productToFeatureObject->getProductFeatureId(), 'locale' => $locale));
								
								// Check for bullets and filters
								if (($productFeatureGroupObject) && ($productFeatureObject))
								{
									$productFeatureGroup = trim($productFeatureGroupObject->getProductFeatureGroup());
									$productFeature = trim($productFeatureObject->getProductFeature());
									
									if ((strtoupper($productFeature) != '*** NOT SET ***') && (strtoupper($productFeature) != 'UNKNOWN') && (strtoupper($productFeature) != ''))
									{
										// Check for a bullet
										if ($departmentToFeatureObject->getDisplayOnListing() > 0)
										{
											$bulletClass = 'bullet';
											if (strtoupper(trim($productFeatureObject->getProductFeature())) == 'YES')
											{
												$bulletClass = 'green-tick';
											} elseif (strtoupper(trim($productFeatureObject->getProductFeature())) == 'NO') {
												$bulletClass = 'red-cross';
											}
											$bullets[] = '<li class="'.$bulletClass.'">'.trim($productFeatureGroupObject->getProductFeatureGroup()).': <strong>'.trim($productFeatureObject->getProductFeature()).'</strong></li>';
										}
									
										// Check for a filter
										if (($departmentToFeatureObject->getDisplayOnFilter() > 0) || ($productToFeatureObject->getProductFeatureGroupId() == 2))
										{
											$filters[] = trim($productFeatureGroupObject->getProductFeatureGroup()).':'.trim($productFeatureObject->getProductFeature());
										}
									}
								}
								
								// Check the sort order of the product feature
								if (($departmentToFeatureObject->getDisplayOrder() != $productToFeatureObject->getDisplayOrder()) && ($productFeatureGroupObject))
								{
									$output->writeln('       -  '.$productFeatureGroupObject->getProductFeatureGroup().': Updated sort order from "<fg=yellow;options=bold>'.$productToFeatureObject->getDisplayOrder().'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$departmentToFeatureObject->getDisplayOrder().'</fg=green;options=bold>"');
									if (!$input->getOption('dry-run'))
									{
										$productToFeatureObject->setDisplayOrder($departmentToFeatureObject->getDisplayOrder());
										$em->persist($productToFeatureObject);
									}
								}

								// Clear memory
							    unset($productFeatureGroupObject);
							    unset($productFeatureObject);
								
							} else {
								$productFeatureGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->findOneBy(array('id' => $departmentToFeatureObject->getProductFeatureGroupId(), 'locale' => $locale));
								if ($productFeatureGroupObject)
								{
									$output->writeln('       -  '.$productFeatureGroupObject->getProductFeatureGroup().': <fg=green;options=bold>Added to the product</fg=green;options=bold>');
								}
								if (!$input->getOption('dry-run'))
								{
									$productToFeatureObject = new ProductToFeature();
									$productToFeatureObject->setActive(1);
									$productToFeatureObject->setProductId($productIndexObject->getProductId());
									$productToFeatureObject->setProductFeatureGroupId($departmentToFeatureObject->getProductFeatureGroupId());
									if ($departmentToFeatureObject->getDisplayOrder() > 0)
									{
										$productToFeatureObject->setProductFeatureId($departmentToFeatureObject->getDefaultProductFeatureId());
									} else {
										$productToFeatureObject->setProductFeatureId(3759);	
									}
									$productToFeatureObject->setDisplayOrder($departmentToFeatureObject->getDisplayOrder());
									$em->persist($productToFeatureObject);
								}
								
								// Clear memory
							    unset($productFeatureGroupObject);
							}
							
							// Clear memory
							unset($productToFeatureObject);
						}
					}
					
					// Check to see if any features need removing
					$productToFeatureObjects = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findBy(array('productId' => $productIndexObject->getProductId()));
					foreach ($productToFeatureObjects as $productToFeatureObject)
					{
						if (!in_array($productToFeatureObject->getProductFeatureGroupId(), $departmentToFeatureProductFeatureGroupIds))
						{
							$productFeatureGroupObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->findOneBy(array('id' => $productToFeatureObject->getProductFeatureGroupId(), 'locale' => $locale));
							$output->writeln('       -  '.$productFeatureGroupObject->getProductFeatureGroup().': <fg=white;bg=red;options=bold>REMOVED from the product</fg=white;bg=red;options=bold>');
							if (!$input->getOption('dry-run'))
							{
								$em->remove($productToFeatureObject);
							}
						}
					}
					
					// Update the bullets
					if (sizeof($bullets) > 0)
					{
						$bullets = '<ul>'.implode('', $bullets).'</ul>';
						$output->writeln('       - <fg=green;options=bold>The bullets were updated</fg=green;options=bold>');
						if (!$input->getOption('dry-run'))
						{
							$productIndexObject->setDescription($bullets);
						}
					}
					
					// Update the filters
					if (sizeof($filters) > 0)
					{
						$filters = '|'.implode('|', $filters).'|';
						$output->writeln('       - <fg=green;options=bold>The filters were updated</fg=green;options=bold>');
						if (!$input->getOption('dry-run'))
						{
							$productIndexObject->setProductFeatures($filters);
						}
					}
					
					// Save any changes to the product index
					if (!$input->getOption('dry-run'))
					{
						$em->persist($productIndexObject);
					}
					
	    		}
	    		
	    		// Next product
			    $productCount++;
			    
			    // Clear memory
			    unset($productDescriptionObject);
			    unset($productIndexObject);	    		
			}	
			
			// Next department
			$departmentCount++;
			
			// Clear memory
			unset($departmentIndexObject);
		}
		
		$output->writeln('Memory Used: <fg=white;bg=yellow;options=bold>'.memory_get_usage().'</fg=white;bg=yellow;options=bold>');
		
		if (!$input->getOption('dry-run'))
		{
			// Output
			$output->writeln('Please wait, updating the database...'); 
			
			// Update the database
		    $em->flush();
		}
	    	    
	    // Output
        $output->writeln('Finished!');    			    	
    }
}