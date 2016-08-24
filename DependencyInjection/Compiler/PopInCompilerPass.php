<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;

class PopInCompilerPass implements CompilerPassInterface
{
    /**
     * @{inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('idci_pop_in_message.pop_in_registry') ||
            !$container->hasDefinition('idci_pop_in_message.pop_in')) {
            return;
        }

        $registryDefinition = $container->getDefinition('idci_pop_in_message.pop_in_registry');
        $configuration = $container->getParameter('idci_pop_in_message.configuration');

        foreach ($configuration['pop_ins'] as $name => $popInConfiguration) {
            $serviceDefinition = new DefinitionDecorator('idci_pop_in_message.pop_in');
            $serviceName = sprintf('idci_pop_in_message.pop_in.%s', $name);

            $serviceDefinition->isAbstract(false);
            $serviceDefinition->replaceArgument(0, $name);
            $serviceDefinition->replaceArgument(1, $popInConfiguration['title']);
            $serviceDefinition->replaceArgument(2, $popInConfiguration['content']);
            $serviceDefinition->replaceArgument(3, $popInConfiguration['footer']);
            $serviceDefinition->replaceArgument(4, $popInConfiguration['display_rules']);

            $container->setDefinition($serviceName, $serviceDefinition);

            $registryDefinition->addMethodCall(
                'setPopIn',
                array($name, new Reference($serviceName))
            );
        }
    }

}