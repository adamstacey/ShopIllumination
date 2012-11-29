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
   		$commonWordsSearch = array(' The ', ' Be ', ' To ', ' Of ', ' And ', ' A ', ' In ', ' That ', ' Have ', ' It ', ' For ', ' Not ', ' On ', ' With ', ' He ', ' As ', ' You ', ' Do ', ' At ', ' This ', ' But ', ' His ', ' By ', ' From' , ' They ', ' We ', ' Say ', ' Her ', ' She ', ' Or ', ' An ', ' Will ', ' My ', ' One ', ' All ', ' Would ', ' There ', ' Their ', ' What ', ' So ', ' Up ', ' Out ', ' If ', ' About ', ' Who ', ' Get ', ' Which ', ' Go ', ' Me ', ' When ', ' Make ', ' Can ', ' Like ', ' Just ', ' Him ', ' Know ', ' Take ', ' Into ', ' Your ', ' Some ', ' Could ', ' Them ', ' See ',  ' Other ', ' Than ', ' Then ', ' Now ', ' Look ', ' Only ', ' Come ', ' Its ', ' Also ', ' Back ', ' After ', ' Use ', ' How ', ' Our ', ' Work ', ' Well ', ' Way ', ' New ', ' Want ', ' Because ', ' Any ', ' These ', ' Give ', ' Most ', ' Us ', ' Per ', 'Pvc', 'Led', 'Hd', 'Lcd', 'Lpg', 'Usb', 'N/a', 'Max.', 'Min.', 'Maximum', 'Minimum', 'Ise6445hj', 'Bb', 'Aaa', 'Aa', '(if Above May Require Pressure Reducing Valve)', ' Cubic Metres', '°c', 'Co²');
   		$commonWordsReplace = array(' the ', ' be ', ' to ', ' of ', ' & ', ' a ', ' in ', ' that ', ' have ', ' it ', ' for ', ' not ', ' on ', ' with ', ' he ', ' as ', ' you ', ' do ', ' at ', ' this ', ' but ', ' his ', ' by ', ' from' , ' they ', ' we ', ' say ', ' her ', ' she ', ' or ', ' an ', ' will ', ' my ', ' one ', ' all ', ' would ', ' there ', ' their ', ' what ', ' so ', ' up ', ' out ', ' if ', ' about ', ' who ', ' get ', ' which ', ' go ', ' me ', ' when ', ' make ', ' can ', ' like ', ' just ', ' him ', ' know ', ' take ', ' into ', ' your ', ' some ', ' could ', ' them ', ' see ',  ' other ', ' than ', ' then ', ' now ', ' look ', ' only ', ' come ', ' its ', ' also ', ' back ', ' after ', ' use ', ' how ', ' our ', ' work ', ' well ', ' way ', ' new ', ' want ', ' because ', ' any ', ' these ', ' give ', ' most ', ' us ', ' per ', 'PVC', 'LED', 'HD', 'LCD', 'LPG', 'USB', 'N/A', 'Max', 'Min', 'Max', 'Min', 'ISE6445HJ', 'BB', 'AAA', 'AA', '(if above may require pressure reducing valve)', 'm³', '°C', 'CO²');
   		
		// Replacements
	  	$search = array();
	  	$replace = array();
  	
	  	// Tidy up amps
	  	$search[] = "/([0-9]+)[\s\-]?[Aa][mp]?/";
	  	$replace[] = "$1A";
	  	
	  	// Tidy up CAP codes
	  	$search[] = "/[Cc][Aa][Pp]([0-9]+)[Cc][Ff]/";
	  	$replace[] = "CAP$1CF";
	  	
	  	// Tidy up CHA codes
	  	$search[] = "/[Cc][Hh][Aa]([0-9]+)/";
	  	$replace[] = "CHA$1";
	  	
	  	// Tidy up CHARFILTERRND codes
	  	$search[] = "/[Cc][Hh][Aa][Rr][Ff][Ii][Ll][Tt][Ee][Rr][Rr][Nn][Dd]([0-9]+)/";
	  	$replace[] = "CHARFILTERRND$1";
	  	
	  	// Tidy up CHARFILTERSQUARE codes
	  	$search[] = "/[Cc][Hh][Aa][Rr][Ff][Ii][Ll][Tt][Ee][Rr][Ss][Qq][Uu][Aa][Rr][Ee]([0-9]+)/";
	  	$replace[] = "CHARFILTERSQUARE$1";
	  	
	  	// Tidy up anti
	  	$search[] = "/([Aa])nti ([a-zA-Z])/";
	  	$replace[] = "$1nti-".strtolower("$2");
	  	
	  	// Tidy up auto
	  	$search[] = "/([Aa])uto ([a-zA-Z])/";
	  	$replace[] = "$1uto-".strtolower("$2");
	  	
	  	// Tidy up cut out
	  	$search[] = "/[Cc]ut[\s\-]?[Oo]ut/";
	  	$replace[] = "Cut-out";
	  	
	  	// Tidy up fluid ounces
	  	$search[] = "/[Ff][Ll].?\s?[Oo][Zz]/";
	  	$replace[] = "fl oz";
		
		// Tidy up rpm
	  	$search[] = "/[Rr][Pp][Mm]/";
	  	$replace[] = "rpm";
	  	
	  	// Tidy up Maxi-sense
	  	$search[] = "/[Mm]axi[\s\-]?[Ss]ense/";
	  	$replace[] = "Maxi-sense";
	  	
	  	// Tidy up Side-by-side
	  	$search[] = "/[Ss]ide[\s\-]?[Bb]y[\s\-]?[Ss]ide/";
	  	$replace[] = "Side-by-side";
	  	
	  	// Tidy up Side-by-side
	  	$search[] = "/[Xx][Ll]{l}/";
	  	$replace[] = "Extra Large";
	  	
	  	// Tidy up D-radius
	  	$search[] = "/[Dd][\s\-]?[Rr]adius/";
	  	$replace[] = "D-radius";
	  			
		// Tidy up 1.75 Bowl
	  	$search[] = "/1[\s]?3\/4\s[Bb]owl/";
	  	$replace[] = "1.75 Bowl";
		
		// Tidy up 1.5 Bowl
	  	$search[] = "/1[\s]?(and|&|&amp;)?[\s]?1\/2\s[Bb]owl/";
	  	$replace[] = "1.5 Bowl";
		
		// Tidy up Half Bowl
	  	$search[] = "/0\.5\s[Bb]owl/";
	  	$replace[] = "Half Bowl";
	  	
	  	// Tidy up Single Bowl
	  	$search[] = "/1\s[Bb]owl/";
	  	$replace[] = "Single Bowl";
	  	
	  	// Tidy up Double Bowl
	  	$search[] = "/2\s[Bb]owl/";
	  	$replace[] = "Double Bowl";
	  	
		// Tidy up In-column
	  	$search[] = "/[Ii]n[\s\-]?[Cc]olum[n]?/";
	  	$replace[] = "In-column";
	  	
	  	// Tidy up Bean-to-cup
	  	$search[] = "/[Bb]ean[\s\-]?[Tt]o[\s\-]?[Cc]up/";
	  	$replace[] = "Bean-to-cup";
	  	
	  	// Tidy up kW
	  	$search[] = "/[Kk][Ww]/";
	  	$replace[] = "kW";
	  	
	  	// Tidy up Built-in
	  	$search[] = "/[Bb]uilt[\s\-]?[Ii]n/";
	  	$replace[] = "Built-in";
	  	
	  	// Tidy up Built-under
	  	$search[] = "/[Bb]uilt[\s\-]?[Uu]nder/";
	  	$replace[] = "Built-under";
	  	
	  	// Tidy up Under-counter
	  	$search[] = "/$[Uu]nder[\s\-]?[Cc]ounter/";
	  	$replace[] = "Under-counter";
	  	
	  	// Tidy up Under-cabinet
	  	$search[] = "/[Uu]nder[\s\-]?[Cc]abinet/";
	  	$replace[] = "Under-cabinet";
	  	
	  	// Tidy up integrated
	  	$search[] = "/[\s][\-]?[Ii]ntegrated/";
	  	$replace[] = "-integrated";
	  	
	  	// Tidy up Semi-integrated
	  	$search[] = "/[Ss]emi[\s\-]?[Ii]ntegrated/";
	  	$replace[] = "Semi-integrated";
	  	
	  	// Tidy up Fully-integrated
	  	$search[] = "/[Ff]ully[\s\-]?[Ii]ntegrated/";
	  	$replace[] = "Fully-integrated";
	  	
	  	// Tidy up Semi-automatic
	  	$search[] = "/[Ss]emi[\s\-]?[Aa]utomatic/";
	  	$replace[] = "Semi-automatic";
	  	
	  	// Tidy up Fully-automatic
	  	$search[] = "/[Ff]ully[\s\-]?[Aa]utomatic/";
	  	$replace[] = "Fully-automatic";
	  	
	  	// Tidy up Pull-out
	  	$search[] = "/[Pp]ull[\s\-]?[Oo]ut/";
	  	$replace[] = "Pull-out";
	  		  	
	  	// Tidy up ?-piece
	  	$search[] = "/([2345TtYy])[\s\-]?[Pp]iece/";
	  	$replace[] = "$1-piece";
	  	
	  	// Tidy up ?-spout
	  	$search[] = "/([CcUu])[\s\-]?[Ss]pout/";
	  	$replace[] = "$1-spout";
	  	
	  	// Tidy up ?-end
	  	$search[] = "/([Cc])[\s\-]?[Ee]nd/";
	  	$replace[] = "$1-end";
	  	
	  	// Tidy up Brushed Steel
	  	$search[] = "/[Bb][\-\/][Ss]teel/";
	  	$replace[] = "Brushed Steel";
	  	
	  	// Tidy up Stainless Steel
	  	$search[] = "/[Ss][\-\/][Ss]teel/";
	  	$replace[] = "Stainless Steel";
	  	
	  	// Tidy up Silk Steel
	  	$search[] = "/[Ss]ilk[\s]?[Ss]teel/";
	  	$replace[] = "Silk Steel";
	  		  	
	  	// Replace long dashes
	  	$search[] = "/–/";
	  	$replace[] = "-";
	  	
	  	// Replace single quotes
	  	$search[] = "/’/";
	  	$replace[] = "'";
	  	
	  	// Replace single quotes
	  	$search[] = "/`/";
	  	$replace[] = "'";
	  	
	  	// Tidy up m
	  	$search[] = "/[\s]?[Mm]etre/";
	  	$replace[] = "m";
	  	
	  	// Tidy up W
	  	$search[] = "/([0-9]+)[\s]?[Ww]$/";
	  	$replace[] = "$1W";
	  	
	  	// Tidy up dB
	  	$search[] = "/([0-9]+)[\s]?[Dd][Bb]$/";
	  	$replace[] = "$1dB";
	  	
	  	// Tidy up V
	  	$search[] = "/([0-9]+)[\s]?[Vv]$/";
	  	$replace[] = "$1V";
	  	
	  	// Tidy up bar
	  	$search[] = "/([0-9]+)[\s]?[Bb][Aa][Rr]/";
	  	$replace[] = "$1bar";
	  		  	
	  	// Tidy up -
	  	$search[] = "/([0-9]+)[\s]?[\-][\s]?([0-9]+)/";
	  	$replace[] = "$1-$2";
	  	
	  	// Tidy up m3
	  	$search[] = "/([0-9]+)[\s]?[Mm]3/";
	  	$replace[] = "$1m³;";
	  		  	
	  	// Tidy up to in between numbers
	  	$search[] = "/([0-9]+)[\s]?to[\s]?([0-9]+)/";
	  	$replace[] = "$1-$2";
	  	
	  	// Tidy up l
	  	$search[] = "/[\s]?[Ll]itre/";
	  	$replace[] = "l";
	  	
  		// Tidy up -in
	  	$search[] = "/\-[Ii]n/";
	  	$replace[] = "-in";
	  	
	  	// Tidy up including
	  	$search[] = "/[Ii]nc\s/";
	  	$replace[] = "including "; 
	  	
	  	// Tidy up Push/pull
	  	$search[] = "/[Pp]ush\/[Pp]ull/";
	  	$replace[] = "Push/pull";
	  	
	  	// Tidy up +
	  	$search[] = "/\s\+\s/";
	  	$replace[] = " & ";
	  	
	  	// Tidy up *
	  	$search[] = "/\* /";
	  	$replace[] = "";
	  	
	  	// Tidy up &amp;
	  	$search[] = "/\s&amp;\s/";
	  	$replace[] = " & ";
	  	
	  	// Tidy up mm
	  	$search[] = "/M[Mm]/";
	  	$replace[] = "mm";
	  	
	  	// Tidy up mm
	  	$search[] = "/\/[Hh][Rr]/";
	  	$replace[] = "/h";
	  	
	  	// Tidy up ize to ise
	  	$search[] = "/([a-zA-Z]{2})ize/";
	  	$replace[] = "$1ise";
	  	
	  	// Tidy up izer to iser
	  	$search[] = "/([a-zA-Z]{2})izer/";
	  	$replace[] = "$1iser";
	  	
	  	// Tidy up yze to yse
	  	$search[] = "/([a-zA-Z]{2})yze/";
	  	$replace[] = "$1yse";
	  	
	  	// Tidy up ization to isation
	  	$search[] = "/([a-zA-Z]{2})ization/";
	  	$replace[] = "$1isation";
	  	
	  	// Tidy up times symbol
	  	$search[] = "/$([0-9]+[0-9A-Za-z]+)\s*[Xx×]\s*([0-9]+[0-9A-Za-z]+)$/";
	  	$replace[] = "$1 × $2";
	  	$search[] = "/$([0-9]+[0-9A-Za-z]+)\s*[Xx×]\s*([0-9]+[0-9A-Za-z]+)\s*[Xx×]\s*([0-9]+[0-9A-Za-z]+)$/";
	  	$replace[] = "$1 × $2 × $2";
	  	
	  	// Tidy up worktop
	  	$search[] = "/Worktop\s*([0-9])/";
	  	$replace[] = "Worktop - $1";
	  	
	  	// Tidy up upstand
	  	$search[] = "/Upstand\s*([0-9])/";
	  	$replace[] = "Upstand - $1";
	  	
	  	// Tidy up inches
	  	$search[] = "/([0-9])\s*[Ii]nches/";
	  	$replace[] = "$1\"";
	  	
	  	// Tidy up inch
	  	$search[] = "/([0-9])\s*[Ii]nch/";
	  	$replace[] = "$1\"";
	  	
	  	// Tidy up (single)
	  	$search[] = "/\(single\)/";
	  	$replace[] = "(Single)";
	  	
	  	// Tidy up (pack of 2)
	  	$search[] = "/\(pack of 2\)/";
	  	$replace[] = "(Pack of 2)";
	  	
	  	// Tidy up spin
	  	$search[] = "/([0-9])\s?[Ss]pin/";
	  	$replace[] = "$1rpm";
	  		  	
	  	// Remove any spaces around slashes
	  	$search[] = "/\s*\/\s* /";
	  	$replace[] = "/";
	  	
	  	// Remove any new lines or tabs
	  	$search[] = "/[\r\n\t]/";
	  	$replace[] = "";
	  	
	  	// Update FA
	  	$search[] = "/$[Ff][Aa]$/";
	  	$replace[] = "FA";
	  	
	  	// Remove any extra spaces
		$search[] = "/\s{2,}/";
	  	$replace[] = " ";		
    	
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
		    
		    // Make the replacements
		    $newProductFeatureGroup = str_replace($commonWordsSearch, $commonWordsReplace, $newProductFeatureGroup);
		    $newProductFeatureGroup = preg_replace($search, $replace, $newProductFeatureGroup);
		    $newProductFeatureGroup = str_replace('**not Set ***', '*** NOT SET ***', $newProductFeatureGroup);
		    		    
		    // Output		    
		    $output->writeln($productFeatureGroupCount.' of '.$productFeatureGroupTotal.': Feature Group changed from "<fg=yellow;options=bold>'.$existingProductFeatureGroup.'</fg=yellow;options=bold>" to "<fg=green;options=bold>'.$newProductFeatureGroup.'</fg=green;options=bold>"');
		    
		    // Update the product feature group
		    if (!$input->getOption('dry-run'))
		    {
		    	$productFeatureGroupObject->setProductFeatureGroup($newProductFeatureGroup);
		    	$em->persist($productFeatureGroupObject);
		    }
		    
		    // Next product feature group
		    $productFeatureGroupCount++;
		    
		    // Clear memory
		    unset($productFeatureGroupObject);
		    unset($existingProductFeatureGroup);
		    unset($newProductFeatureGroup);
	    }
	    
	    // Update the database
	    $em->flush();
	    	    
        $output->writeln('Finished!');
    }
}