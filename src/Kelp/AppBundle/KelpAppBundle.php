<?php

namespace Kelp\AppBundle;

use Kelp\AppBundle\DependencyInjection\Compiler\UserMapperManagerCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KelpAppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new UserMapperManagerCompiler()
        );
    }
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
