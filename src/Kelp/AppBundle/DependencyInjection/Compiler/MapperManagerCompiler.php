<?php
namespace Kelp\AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MapperManagerCompiler implements CompilerPassInterface
{
    const MANAGER_ID = 'kelp.mapper_manager';

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(self::MANAGER_ID)) {
            throw new \LogicException(sprintf('%s', self::MANAGER_ID));
        }

        $managerDefinition = $container->getDefinition(self::MANAGER_ID);

        $mappers = $container->findTaggedServiceIds('kelp_app.mapper');
var_dump(1);die;
        foreach ($mappers as $mapperId => $mapperTags) {
            foreach ($mapperTags as $tag) {
                if (isset($tag['type']) and isset($tag['class'])) {
                    $managerDefinition->addMethodCall(
                        'addMapper',
                        [$tag['type'],$tag['class'], new Reference($mapperId)]
                    );
                }
            }
        }
    }
}
