<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

interface DisplayRuleInterface
{
    /**
     * Match the rule using parameters
     *
     * @param array $parameters : The parameters to match
     *
     * @return boolean True if the given parameters fit, false otherwise.
     */
    public function match(array $parameters = array());
}