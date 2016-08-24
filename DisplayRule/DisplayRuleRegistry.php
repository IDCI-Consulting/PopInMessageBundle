<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

class DisplayRuleRegistry implements DisplayRuleRegistryInterface
{
    /**
     * @var DisplayRuleInterface[]
     */
    private $displayRules = array();

    /**
     * {@inheritdoc}
     */
    public function setDisplayRule($alias, DisplayRuleInterface $displayRule)
    {
        $this->displayRules[$alias] = $displayRule;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDisplayRule($alias)
    {
        if (!is_string($alias)) {
            throw new \InvalidArgumentException('The alias must be a string');
        }

        if (!isset($this->displayRules[$alias])) {
            throw new \InvalidArgumentException(sprintf('Could not load display rule %s', $alias));
        }

        return $this->displayRules[$alias];
    }

    /**
     * {@inheritdoc}
     */
    public function hasDisplayRule($alias)
    {
        if (!isset($this->displayRules[$alias])) {
            return false;
        }

        return true;
    }
}