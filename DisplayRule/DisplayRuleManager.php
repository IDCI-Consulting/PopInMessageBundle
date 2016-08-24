<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

class DisplayRuleManager
{
    /**
     * @var DisplayRuleRegistryInterface
     */
    private $registry;

    /**
     * Constructor.
     *
     * @param DisplayRuleRegistryInterface $registry
     */
    public function __construct(DisplayRuleRegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Run match function of given display rule by its alias
     *
     * @param string $alias      : The display rule alias.
     * @param array  $parameters : The parameters to fit.
     *
     * @return boolean True if parameters fit the rule, false otherwise.
     */
    public function match($alias, array $parameters = array())
    {
        $displayRule = $this->registry->getDisplayRule($alias);

        return $displayRule->match($parameters);
    }
}