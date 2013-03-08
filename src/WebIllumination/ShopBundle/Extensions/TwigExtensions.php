<?php

namespace WebIllumination\AdminBundle\Extensions;

class TwigExtensions extends \Twig_Extension {

    public function getFilters() {
        return array(
            'print_r' => new \Twig_Filter_Function('print_r'),
            'number_format' => new \Twig_Filter_Function('number_format'),
            'str_replace' => new \Twig_Filter_Function('str_replace'),
        );
    }

    public function getName()
    {
        return 'twig_extensions';
    }
}