<?php

namespace Iris\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IrisUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
