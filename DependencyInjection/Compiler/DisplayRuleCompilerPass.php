<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class DisplayRuleCompilerPass implements CompilerPassInterface
{
    /**
     * @{inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('idci_pop_in_message.display_rule_registry')) {
            return;
        }

        $registryDefinition = $container->getDefinition('idci_pop_in_message.display_rule_registry');
        foreach ($container->findTaggedServiceIds('idci_pop_in_message.display_rule') as $id => $tags) {
            foreach ($tags as $attributes) {
                $alias = isset($attributes['alias']) ? $attributes['alias'] : $id;

                $registryDefinition->addMethodCall(
                    'setDisplayRule',
                    array($alias, new Reference($id))
                );
            }
        }
    }

}