<?php

namespace KAC\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KACUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
