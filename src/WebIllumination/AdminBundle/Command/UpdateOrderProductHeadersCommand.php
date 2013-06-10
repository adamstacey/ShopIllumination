<?php
namespace WebIllumination\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateOrderProductHeadersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:updateOrderProductHeaders')
            ->setDescription('Updates the headers on the order products, so the page title minus the product code is used.')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'If set, this will only output the results and not make any updates to the database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	ini_set('memory_limit','512M');
    	
    	// Get the entity manager
   		$em = $this->getContainer()->get('doctrine')->getManager();
   		    	
    	// Get the basket products
    	$orderProductCount = 1;
	    $orderProductObjects = $em->getRepository('KAC\SiteBundle\Entity\OrderProduct')->findBy(array(), array('productId' => 'ASC'));
	    $orderProductTotal = sizeof($orderProductObjects);
	    foreach ($orderProductObjects as $orderProductObject)
	    {
	    	// Get product index
	    	$productIndexObject = $em->getRepository('KAC\SiteBundle\Entity\ProductIndex')->findOneBy(array('productId' => $orderProductObject->getProductId(), 'locale' => 'en'));
	    	
	    	// Get the new header
	    	if ($productIndexObject)
	    	{
	    		$existingHeader = $orderProductObject->getHeader();
	    		$newHeader = str_replace(' '.$productIndexObject->getProductCode().' ', ' ', $productIndexObject->getPageTitle());
	    		
	    		// Output		    
	    		$output->writeln($orderProductCount.' of '.$orderProductTotal.': Header changed from "<fg=yellow;options=bold>'.$existingHeader.'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$newHeader.'</fg=green;options=bold>"');
	    		
	    		// Update the order product
			    if (!$input->getOption('dry-run'))
			    {
			    	$orderProductObject->setHeader($newHeader);
			    	$em->persist($orderProductObject);
			    }
			    
			    // Clear memory
			    unset($existingHeader);
		    	unset($newHeader);
		    
			} else {
				// Output		    
	    		$output->writeln($orderProductCount.' of '.$orderProductTotal.': <fg=white;bg=red;options=bold>Header not changed!</fg=white;bg=red;options=bold>"');
			}
		    
		    //$output->writeln('Memory Used: <fg=white;bg=yellow;options=bold>'.memory_get_usage().'</fg=white;bg=yellow;options=bold>');
		    
		    // Next order
		    $orderProductCount++;
		    
		    // Clear memory
		    unset($orderProductObject);
		    unset($productIndexObject);
	    }
	    
	    // Update the database
	    $em->flush();
	    	    
        $output->writeln('Finished!');
    }
}