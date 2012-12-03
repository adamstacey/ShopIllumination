<?php
namespace WebIllumination\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateProductsFromDepartmentTemplatesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:updateProductsFromDepartmentTemplatesCommand')
            ->setDescription('Updates the products according to the templates set out in the department template.')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'If set, this will only output the results and not make any updates to the database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	ini_set('memory_limit','1024M');
    	
    	// Get the entity manager
   		$em = $this->getContainer()->get('doctrine')->getEntityManager();
   		
   		// Get the departments
   		$departmentCount = 1;
		$departmentIndexObjects = $em->getRepository('WebIlluminationAdminBundle:DepartmentIndex')->findBy(array('locale' => 'en'));
		$departmentTotal = sizeof($departmentIndexObjects);
		foreach ($departmentIndexObjects as $departmentIndexObject)
		{
			// Output		    
	    	$output->writeln($departmentCount.' of '.$departmentTotal.': Getting products for the department: "<fg=yellow;options=bold>'.$departmentIndexObject->getName().'</fg=yellow;options=bold>"...');
	    	
	    	// Get the templates
	    	$templates = array();
			$templates['page-title'] = $departmentIndexObject->getPageTitleTemplate();
			$templates['header'] = $departmentIndexObject->getHeaderTemplate();
			$templates['meta-description'] = $departmentIndexObject->getMetaDescriptionTemplate();
			
			// Get the template parts
			$templateParts = array();
			$templateParts['page-title'] = explode('^', $templates['page-title']);
			$templateParts['header'] = explode('^', $templates['header']);
			$templateParts['meta-description'] = explode('^', $templates['meta-description']);
	    	
			// Get the products
			$productCount = 1;
	    	$productToDepartmentObjects = $em->getRepository('WebIlluminationAdminBundle:ProductToDepartment')->findBy(array('departmentId' => $departmentIndexObject->getDepartmentId(), 'displayOrder' => 1));
	    	$productTotal = sizeof($productToDepartmentObjects);
	    	foreach ($productToDepartmentObjects as $productToDepartmentObject)
	    	{
	    		// Get the product objects
	    		$productIndexObject = $em->getRepository('WebIlluminationAdminBundle:ProductIndex')->findOneBy(array('productId' => $productToDepartmentObject->getProductId(), 'locale' => 'en'));
	    		$productDescriptionObject = $em->getRepository('WebIlluminationAdminBundle:ProductDescription')->findOneBy(array('productId' => $productToDepartmentObject->getProductId(), 'locale' => 'en'));
	    		if ($productIndexObject && $productDescriptionObject)
	    		{	
	    			// Output		    
	    			$output->writeln('  -  '.$productCount.' of '.$productTotal.': Checking if an update is required for the product: "<fg=yellow;options=bold>'.$productIndexObject->getPageTitle().'</fg=yellow;options=bold>"...');
		    		foreach ($templates as $templateField => $template)
		    		{
		    			// Get the preview
			    		$templatePreview = array();
						foreach ($templateParts[$templateField] as $templatePart)
						{
							switch ($templatePart)
							{
								case 'brand':
									if ($productIndexObject->getBrand() != '')
									{
										$templatePreview[] = trim($productIndexObject->getBrand());
									}
									break;
								case 'productCode':
									if ($productIndexObject->getProductCode() != '')
									{
										$templatePreview[] = trim($productIndexObject->getProductCode());
									}
									break;
								case 'department':
									if ($departmentIndexObject->getName() != '')
									{
										$templatePreview[] = trim($departmentIndexObject->getName());
									}
									break;
								case 'productExtraKeyword':
									if ($productIndexObject->getPrefix() != '')
									{
										$templatePreview[] = trim($productIndexObject->getPrefix());
									}
									break;
								case 'keyMessage':
									if ($productIndexObject->getTagline() != '')
									{
										$templatePreview[] = trim($productIndexObject->getTagline());
									}
									break;
								default:
									$templatePartParts = explode('|', $templatePart);
									$templatePartName = false;
									$templatePartValue = false;
									if (isset($templatePartParts[0]))
									{
										$templatePartName = $templatePartParts[0];
									}
									if (isset($templatePartParts[1]))
									{
										$templatePartValue = $templatePartParts[1];
									}
									if ($templatePartName && $templatePartValue)
									{
										if ($templatePartName == 'productFeatureGroup')
										{
											$productToFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductToFeature')->findOneBy(array('productFeatureGroupId' => $templatePartValue, 'productId' => $productIndexObject->getProductId()));
											if ($productToFeatureObject)
											{
												$productFeatureObject = $em->getRepository('WebIlluminationAdminBundle:ProductFeature')->find($productToFeatureObject->getProductFeatureId());
												if ($productFeatureObject)
												{
													$productFeatureValue = $productFeatureObject->getProductFeature();
													if (($productFeatureValue != '') && (strtoupper($productFeatureValue) != '*** NOT SET ***') && (strtoupper($productFeatureValue) != 'YES') && (strtoupper($productFeatureValue) != 'NO') && (strtoupper($productFeatureValue) != 'UNKNOWN'))
													{
														$templatePreview[] = trim($productFeatureValue);
													}
												}
											}
										} elseif ($templatePartName == 'freeText') {
											$templatePreview[] = trim($templatePartValue);
										}
									}
									break;
							}
						}
						$templatePreview = implode(' ', $templatePreview);
						
						// Check if an update is required
						switch ($templateField)
						{
							case 'page-title':
								if ($productIndexObject->getPageTitle() != $templatePreview)
								{
									$output->writeln('       -  Updated page title from "<fg=yellow;options=bold>'.$productIndexObject->getPageTitle().'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$templatePreview.'</fg=green;options=bold>"');
									if (!$input->getOption('dry-run'))
									{
										$productIndexObject->setPageTitle($templatePreview);
										$em->persist($productIndexObject);
										$productDescriptionObject->setPageTitle($templatePreview);
										$em->persist($productDescriptionObject);
									}
								}
								break;
							case 'header':
								if ($productIndexObject->getHeader() != $templatePreview)
								{
									$output->writeln('       -  Updated header from "<fg=yellow;options=bold>'.$productIndexObject->getHeader().'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$templatePreview.'</fg=green;options=bold>"');
									if (!$input->getOption('dry-run'))
									{
										$productIndexObject->setHeader($templatePreview);
										$em->persist($productIndexObject);
										$productDescriptionObject->setHeader($templatePreview);
										$em->persist($productDescriptionObject);
									}
								}
								break;
							case 'meta-description':
								if ($productIndexObject->getShortDescription() != $templatePreview)
								{
									$output->writeln('       -  Updated meta description from "<fg=yellow;options=bold>'.$productIndexObject->getShortDescription().'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$templatePreview.'</fg=green;options=bold>"');
									if (!$input->getOption('dry-run'))
									{
										$productIndexObject->setShortDescription($templatePreview);
										$em->persist($productIndexObject);
										$productDescriptionObject->setMetaDescription($templatePreview);
										$em->persist($productDescriptionObject);
									}
								}
								break;
						}
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