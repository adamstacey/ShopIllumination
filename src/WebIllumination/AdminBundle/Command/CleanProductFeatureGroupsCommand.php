<?php
namespace WebIllumination\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CleanProductFeatureGroupsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('admin:cleanProductFeatureGroups')
            ->setDescription('Cleans the product feature groups.')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'If set, this will only output the results and not make any updates to the database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	// Get the entity manager
   		$em = $this->getContainer()->get('doctrine')->getEntityManager();
   		
   		// Common words
   		$commonWordsSearch = array(' The ', ' Be ', ' To ', ' Of ', ' And ', ' A ', ' In ', ' That ', ' Have ', ' It ', ' For ', ' Not ', ' On ', ' With ', ' He ', ' As ', ' You ', ' Do ', ' At ', ' This ', ' But ', ' His ', ' By ', ' From' , ' They ', ' We ', ' Say ', ' Her ', ' She ', ' Or ', ' An ', ' Will ', ' My ', ' One ', ' All ', ' Would ', ' There ', ' Their ', ' What ', ' So ', ' Up ', ' Out ', ' If ', ' About ', ' Who ', ' Get ', ' Which ', ' Go ', ' Me ', ' When ', ' Make ', ' Can ', ' Like ', ' Just ', ' Him ', ' Know ', ' Take ', ' Into ', ' Your ', ' Some ', ' Could ', ' Them ', ' See ',  ' Other ', ' Than ', ' Then ', ' Now ', ' Look ', ' Only ', ' Come ', ' Its ', ' Also ', ' Back ', ' After ', ' Use ', ' How ', ' Our ', ' Work ', ' Well ', ' Way ', ' New ', ' Want ', ' Because ', ' Any ', ' These ', ' Give ', ' Most ', ' Us ', ' Per ');
   		$commonWordsReplace = array(' the ', ' be ', ' to ', ' of ', ' and ', ' a ', ' in ', ' that ', ' have ', ' it ', ' for ', ' not ', ' on ', ' with ', ' he ', ' as ', ' you ', ' do ', ' at ', ' this ', ' but ', ' his ', ' by ', ' from' , ' they ', ' we ', ' say ', ' her ', ' she ', ' or ', ' an ', ' will ', ' my ', ' one ', ' all ', ' would ', ' there ', ' their ', ' what ', ' so ', ' up ', ' out ', ' if ', ' about ', ' who ', ' get ', ' which ', ' go ', ' me ', ' when ', ' make ', ' can ', ' like ', ' just ', ' him ', ' know ', ' take ', ' into ', ' your ', ' some ', ' could ', ' them ', ' see ',  ' other ', ' than ', ' then ', ' now ', ' look ', ' only ', ' come ', ' its ', ' also ', ' back ', ' after ', ' use ', ' how ', ' our ', ' work ', ' well ', ' way ', ' new ', ' want ', ' because ', ' any ', ' these ', ' give ', ' most ', ' us ', ' per ');
   		
   		// Specific replacements
   		$search = array('13 Amp ', 'Anti Overflow', 'Auto Defrost', 'Auto Ignition', 'Auto Pan', 'Cut out', 'Maximum', 'Minimum', 'Led', 'Lcd', 'Lpg', 'Usb', ' and ');
		$replace = array('13A ', 'Anti-overflow', 'Auto-defrost', 'Auto-ignition', 'Auto-pan', 'Cut-out', 'Max', 'Min', 'LED', 'LCD', 'LPG', 'USB', ' & ');
    	
    	// Get the product group features
    	$productFeatureGroupCount = 1;
	    $productFeatureGroupObjects = $em->getRepository('WebIlluminationAdminBundle:ProductFeatureGroup')->findBy(array(), array('productFeatureGroup' => 'ASC'));
	    $productFeatureGroupTotal = sizeof($productFeatureGroupObjects);
	    foreach ($productFeatureGroupObjects as $productFeatureGroupObject)
	    {
		    $existingProductFeatureGroup = trim(strtoupper($productFeatureGroupObject->getProductFeatureGroup()));
		    $newProductFeatureGroup = $existingProductFeatureGroup;
		    
		    // Make lowercase
		    $newProductFeatureGroup = strtolower($newProductFeatureGroup);
		    
		    // Uppercase words
		    $newProductFeatureGroup = ucwords($newProductFeatureGroup);
		    
		    // Clean up common words
		    $newProductFeatureGroup = str_replace($commonWordsSearch, $commonWordsReplace, $newProductFeatureGroup);
		    
		    // Clean up specific replacements
		    $newProductFeatureGroup = str_replace($search, $replace, $newProductFeatureGroup);
		    
		    // Output		    
		    $output->writeln($productFeatureGroupCount.' of '.$productFeatureGroupTotal.': Feature Group changed from "<fg=yellow;options=bold>'.$existingProductFeatureGroup.'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$newProductFeatureGroup.'</fg=green;options=bold>"');
		    
		    // Update the product feature group
		    if (!$input->getOption('dry-run'))
		    {
		    	$productFeatureGroupObject->setProductFeatureGroup($newProductFeatureGroup);
		    	$em->persist($productFeatureGroupObject);
	    		$em->flush();
		    }
		    
		    // Next product feature group
		    $productFeatureGroupCount++;
		    
		    // Clear memory
		    unset($productFeatureGroupObject);
		    unset($existingProductFeatureGroup);
		    unset($newProductFeatureGroup);
	    }
	    	    
        $output->writeln('Finished!');
    }
}