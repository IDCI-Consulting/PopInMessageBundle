<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

interface DisplayRuleRegistryInterface
{
    /**
     * Sets a display rule identify by a alias.
     *
     * @param string                $alias       : The alias.
     * @param DisplayRuleInterface  $displayRule : The display rule.
     *
     * @return DisplayRuleRegistryInterface
     */
    public function setDisplayRule($alias, DisplayRuleInterface $displayRule);

    /**
     * Returns a display rule by alias.
     *
     * @param string $alias : The alias of the display rule.
     *
     * @return DisplayRuleInterface.
     */
    public function getDisplayRule($alias);

    /**
     * Returns whether the given display rule is supported.
     *
     * @param string $alias : The alias of the display rule.
     *
     * @return bool Whether the display rule is supported.
     */
    public function hasDisplayRule($alias);
}