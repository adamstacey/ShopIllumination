<?php
	$content = 'All Major AEG Appliances Sold By Us Come with a Minimum of one Years Parts and Labour Guarantee.All of our AEG Products are delivered direct from AEG by their own carriers usually within 3 to 4 working days.';
	
	// Replacements
	$content_replacements_from = array();
	$content_replacements_to = array();
	  	
	// Tidy up joined periods
  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})\s*[\.]{1}\s*([a-zA-Z0-9]{1})/";
  	$content_replacements_to[] = "$1. $2";
  	
  	// Tidy up joined commas
  	$content_replacements_from[] = "/([a-zA-Z0-9]{1})\s*[\,]{1}\s*([a-zA-Z0-9]{1})/";
  	$content_replacements_to[] = "$1, $2";
	
  	// Tidy up fluid ounces
  	$content_replacements_from[] = "/[Ff]{1}[Ll]{1}.?\s?[Oo]{1}[Zz]{1}/";
  	$content_replacements_to[] = "fl oz";
	
	// Tidy up rpm
  	$content_replacements_from[] = "/[Rr]{1}[Pp]{1}[Mm]{1}/";
  	$content_replacements_to[] = "rpm";
  	
  	// Tidy up Maxi-sense
  	$content_replacements_from[] = "/[Mm]{1}axi[\s\-]?[Ss]{1}ense/";
  	$content_replacements_to[] = "Maxi-sense";
  	
  	// Tidy up Side-by-side
  	$content_replacements_from[] = "/[Ss]{1}ide[\s\-]?[Bb]{1}y[\s\-]?[Ss]{1}ide/";
  	$content_replacements_to[] = "side-by-side";
  	
  	// Tidy up Side-by-side
  	$content_replacements_from[] = "/[Xx]{1}[Ll]{l}/";
  	$content_replacements_to[] = "extra large";
  	
  	// Tidy up D-radius
  	$content_replacements_from[] = "/[Dd]{1}[\s\-]?[Rr]{1}adius/";
  	$content_replacements_to[] = "D-radius";
  	
	// Tidy up 1.75 Bowl
  	$content_replacements_from[] = "/1[\s]?3\/4\s[Bb]{1}owl/";
  	$content_replacements_to[] = "1.75 bowl";
	
	// Tidy up 1.5 Bowl
  	$content_replacements_from[] = "/1[\s]?(and|&|&amp;)?[\s]?1\/2\s[Bb]{1}owl/";
  	$content_replacements_to[] = "1.5 bowl";
	
	// Tidy up Half Bowl
  	$content_replacements_from[] = "/0\.5\s[Bb]{1}owl/";
  	$content_replacements_to[] = "half bowl";
  	
  	// Tidy up Single Bowl
  	$content_replacements_from[] = "/1\s[Bb]{1}owl/";
  	$content_replacements_to[] = "single bowl";
  	
  	// Tidy up Double Bowl
  	$content_replacements_from[] = "/2\s[Bb]{1}owl/";
  	$content_replacements_to[] = "double bowl";
  	
	// Tidy up In-column
  	$content_replacements_from[] = "/[Ii]{1}n[\s\-]?[Cc]{1}olum[n]?/";
  	$content_replacements_to[] = "in-column";
  	
  	// Tidy up Bean-to-cup
  	$content_replacements_from[] = "/[Bb]{1}ean[\s\-]?[Tt]{1}o[\s\-]?[Cc]{1}up/";
  	$content_replacements_to[] = "bean-to-cup";
  	
  	// Tidy up kW
  	$content_replacements_from[] = "/[Kk]{1}[Ww]{1}/";
  	$content_replacements_to[] = "kW";
  	
  	// Tidy up Built-in
  	$content_replacements_from[] = "/[Bb]{1}uilt[\s\-]?[Ii]{1}n/";
  	$content_replacements_to[] = "built-in";
  	
  	// Tidy up Built-under
  	$content_replacements_from[] = "/[Bb]{1}uilt[\s\-]?[Uu]{1}nder/";
  	$content_replacements_to[] = "built-under";
  	
  	// Tidy up Under-counter
  	$content_replacements_from[] = "/[Uu]{1}nder[\s\-]?[Cc]{1}ounter/";
  	$content_replacements_to[] = "under-counter";
  	
  	// Tidy up Under-cabinet
  	$content_replacements_from[] = "/[Uu]{1}nder[\s\-]?[Cc]{1}abinet/";
  	$content_replacements_to[] = "under-cabinet";
  	
  	// Tidy up Semi-integrated
  	$content_replacements_from[] = "/[Ss]{1}emi[\s\-]?[Ii]{1}ntegrated/";
  	$content_replacements_to[] = "semi-integrated";
  	
  	// Tidy up Fully-integrated
  	$content_replacements_from[] = "/[Ff]{1}ully[\s\-]?[Ii]{1}ntegrated/";
  	$content_replacements_to[] = "fully-integrated";
  	
  	// Tidy up Semi-automatic
  	$content_replacements_from[] = "/[Ss]{1}emi[\s\-]?[Aa]{1}utomatic/";
  	$content_replacements_to[] = "semi-automatic";
  	
  	// Tidy up Fully-automatic
  	$content_replacements_from[] = "/[Ff]{1}ully[\s\-]?[Aa]{1}utomatic/";
  	$content_replacements_to[] = "fully-automatic";
  	
  	// Tidy up Pull-out
  	$content_replacements_from[] = "/[Pp]{1}ull[\s\-]?[Oo]{1}ut/";
  	$content_replacements_to[] = "pull-out";
  	
  	// Tidy up including
  	$content_replacements_from[] = "/\s[Ii]{1}nc\s/";
  	$content_replacements_to[] = " including ";
  	
  	// Tidy up use
  	$content_replacements_from[] = "/\s[Uu]{1}se\s/";
  	$content_replacements_to[] = " use ";
  	
  	// Tidy up ?-piece
  	$content_replacements_from[] = "/([2345TtYy]{1})[\s\-]?[Pp]{1}iece/";
  	$content_replacements_to[] = "$1-piece";
  	
  	// Tidy up ?-spout
  	$content_replacements_from[] = "/([Cc]{1})[\s\-]?[Ss]{1}pout/";
  	$content_replacements_to[] = "$1-spout";
  	
  	// Tidy up ?-end
  	$content_replacements_from[] = "/([Cc]{1})[\s\-]?[Ee]{1}nd/";
  	$content_replacements_to[] = "$1-end";
  	
  	// Tidy up Brushed Steel
  	$content_replacements_from[] = "/[Bb]{1}[\-\/]{1}[Ss]{1}teel/";
  	$content_replacements_to[] = "brushed steel";
  	
  	// Tidy up Stainless Steel
  	$content_replacements_from[] = "/[Ss]{1}[\-\/]{1}[Ss]{1}teel/";
  	$content_replacements_to[] = "stainless steel";
  	
  	// Remove trade marks
  	$content_replacements_from[] = "/™/";
  	$content_replacements_to[] = "";
  	
  	// Replace long dashes
  	$content_replacements_from[] = "/–/";
  	$content_replacements_to[] = "-";
  	
  	// Tidy up m
  	$content_replacements_from[] = "/[\s]?[Mm]{1}etre/";
  	$content_replacements_to[] = "m";
  	
  	// Tidy up l
  	$content_replacements_from[] = "/[\s]?[Ll]{1}itre/";
  	$content_replacements_to[] = "l";
  	
		// Tidy up -in
  	$content_replacements_from[] = "/\-[Ii]{1}n/";
  	$content_replacements_to[] = "-in";
		
		// Tidy up plus
  	$content_replacements_from[] = "/\s[Pp]{1}lus\s/";
  	$content_replacements_to[] = " plus ";
  	
  	// Tidy up including
  	$content_replacements_from[] = "/\s[Ii]{1}ncluding\s/";
  	$content_replacements_to[] = " including ";
  	
  	// Tidy up Push/pull
  	$content_replacements_from[] = "/[Pp]{1}ush\/[Pp]{1}ull/";
  	$content_replacements_to[] = "push/pull";
  	
  	// Tidy up +
  	$content_replacements_from[] = "/\s\+\s/";
  	$content_replacements_to[] = " and ";
  	
  	// Tidy up *
  	$content_replacements_from[] = "/\*/";
  	$content_replacements_to[] = "";
  	
  	// Tidy up "
  	$content_replacements_from[] = "/\"/";
  	$content_replacements_to[] = "&quot;";
  	
  	// Tidy up with
  	$content_replacements_from[] = "/\s[Ww]{1}ith\s/";
  	$content_replacements_to[] = " with ";
  	
  	// Tidy up in
  	$content_replacements_from[] = "/\s[Ii]{1}n\s/";
  	$content_replacements_to[] = " in ";
  	
  	// Tidy up of
  	$content_replacements_from[] = "/\s[Oo]{1}f\s/";
  	$content_replacements_to[] = " of ";
  	
  	// Tidy up for
  	$content_replacements_from[] = "/\s[Ff]{1}or\s/";
  	$content_replacements_to[] = " for ";
  	
  	// Tidy up or
  	$content_replacements_from[] = "/\s[Oo]{1}r\s/";
  	$content_replacements_to[] = " or ";
  	
  	// Tidy up and
  	$content_replacements_from[] = "/\s[Aa]{1}nd\s/";
  	$content_replacements_to[] = " and ";
  	
  	// Tidy up to
  	$content_replacements_from[] = "/\s[Tt]{1}o\s/";
  	$content_replacements_to[] = " to ";
  	
  	// Tidy up too
  	$content_replacements_from[] = "/\s[Tt]{1}oo\s/";
  	$content_replacements_to[] = " too ";
  	
  	// Tidy up &amp;
  	$content_replacements_from[] = "/\s&amp;\s/";
  	$content_replacements_to[] = " and ";
  	
  	// Tidy up &
  	$content_replacements_from[] = "/\s&\s/";
  	$content_replacements_to[] = " and ";
  	
  	// Tidy up mm
  	$content_replacements_from[] = "/M[Mm]{1}/";
  	$content_replacements_to[] = "mm";
  	
  	// Tidy up times symbol
  	$content_replacements_from[] = "/([0-9]{1})\s*[Xx]\s*([0-9]{1})/";
  	$content_replacements_to[] = "$1 &times; $2";
  	
  	// Tidy up spin
  	$content_replacements_from[] = "/([0-9]{1})\s?[Ss]{1}pin/";
  	$content_replacements_to[] = "$1rpm";
  	
  	// Remove any spaces around slashes
  	$content_replacements_from[] = "/\s*\/\s*/";
  	$content_replacements_to[] = "/";
  	
  	// Remove any new lines or tabs
  	$content_replacements_from[] = "/[\r\n\t]/";
  	$content_replacements_to[] = "";
  	
  	// Remove any extra spaces
	$content_replacements_from[] = "/\s{2,}/";
  	$content_replacements_to[] = " ";
  	
  	// Make the replacements
	$replaced_content = preg_replace($content_replacements_from, $content_replacements_to, $content);
	  	
	// Trim any surrounding spaces
	$replaced_content = trim($replaced_content);
	
	echo '<p>'.$content.'</p>';
	echo '<hr />';
	echo '<p>'.$replaced_content.'</p>';