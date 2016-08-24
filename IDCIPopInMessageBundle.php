<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use IDCI\Bundle\PopInMessageBundle\DependencyInjection\Compiler\DisplayRuleCompilerPass;
use IDCI\Bundle\PopInMessageBundle\DependencyInjection\Compiler\PopInCompilerPass;

class IDCIPopInMessageBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PopInCompilerPass());
        $container->addCompilerPass(new DisplayRuleCompilerPass());
    }
}
