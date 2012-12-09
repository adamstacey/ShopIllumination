<?php

namespace WebIllumination\AdminBundle\Extensions;

class TwigExtensions extends \Twig_Extension
{
	/**
     * Return the name of this extension.
     *
     * @return string
     */
    public function getName()
    {
        return 'twig_extensions';
    }
    
    /**
     * Define the set of filters made available by this extension.
     */
    public function getFilters()
    {
    	$filters = array(
            'print_r'  => new \Twig_Filter_Method($this, 'filter_print_r'),
            'explode'  => new \Twig_Filter_Method($this, 'filter_explode'),
        );

        return $filters;
    }
    
    /**
     * Print_r
     */
    public function filter_print_r($array)
    {
        return print_r($array);
    }
    
    /**
     * Explode a string into a list.
     */
    public function filter_explode($string, $delim = ' ')
    {
        return explode($delim, $string);
    }

}