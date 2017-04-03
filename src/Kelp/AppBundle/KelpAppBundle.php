<?php

namespace Kelp\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class KelpAppBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
