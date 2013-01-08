<?php

namespace WebIllumination\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WebIlluminationUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
