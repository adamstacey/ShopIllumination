<?php
/*
// Load the settings from the database
mysql_connect($container->getParameter('database_host'), $container->getParameter('database_user'), $container->getParameter('database_password')) or die(mysql_error());
mysql_select_db($container->getParameter('database_name')) or die(mysql_error());
$result = mysql_query("SELECT * FROM brand_description;");
while ($setting = mysql_fetch_array($result))
{
	
}*/
$container->setParameter('setting_colour_red', '#F3B6B6');
$container->setParameter('setting_colour_amber', '#F9F299');
$container->setParameter('setting_colour_green', '#D4E19D');

$container->loadFromExtension('twig', array(
     'globals' => array(
         'setting_colour_red' => '#F3B6B6',
         'setting_colour_amber'  => '#F9F299',
         'setting_colour_green'  => '#D4E19D',
     ),
));