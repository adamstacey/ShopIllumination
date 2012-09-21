<?php 

namespace WebIllumination\AdminBundle\Services;

use Symfony\Component\HttpFoundation\Request;

class PayPalService {

	protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}