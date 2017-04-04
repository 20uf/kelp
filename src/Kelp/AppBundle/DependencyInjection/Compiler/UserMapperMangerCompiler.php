<?php
namespace Kelp\AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class UserMapperMangerCompiler implements CompilerPassInterface
{
    const MANAGER_ID = 'kelp.user.mapper_manager';

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(self::MANAGER_ID)) {
            throw new \LogicException(sprintf('%s', self::MANAGER_ID));
        }

        $managerDefinition = $container->getDefinition(self::MANAGER_ID);

        $mappers = $container->findTaggedServiceIds('kelp_app.user_mapper');

        foreach ($mappers as $mapperId => $mapperTags) {
            foreach ($mapperTags as $tag) {
                if (isset($tag['type'])) {
                    $managerDefinition->addMethodCall(
                        'addMapper',
                        [$tag['type'], new Reference($mapperId)]
                    );
                }
            }
        }
    }
}
