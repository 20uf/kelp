<?php

namespace Kelp\AppBundle;

use Kelp\AppBundle\DependencyInjection\Compiler\MapperManagerCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class KelpAppBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(
            new MapperManagerCompiler()
        );
    }
        public function getParent()
        {
            return 'FOSUserBundle';
        }
}
