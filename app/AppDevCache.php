<?php

require_once __DIR__.'/AppKernel.php';

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

class AppDevCache extends HttpCache
{
    protected function getOptions()
    {
        return array(
            'debug' => true,
        );
    }
}
