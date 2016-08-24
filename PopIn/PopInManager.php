<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\PopIn;

use IDCI\Bundle\PopInMessageBundle\DisplayRule\DisplayRuleManager;

class PopInManager
{
    /**
     * @var PopInRegistryInterface
     */
    private $registry;

    /**
     * @var DisplayRuleManager
     */
    private $displayRuleManager;

    /**
     * Constructor
     *
     * @param PopInRegistryInterface $registry
     * @param DisplayRuleManager     $displayRuleManager
     */
    public function __construct(PopInRegistryInterface $registry, DisplayRuleManager $displayRuleManager)
    {
        $this->registry           = $registry;
        $this->displayRuleManager = $displayRuleManager;
    }

    /**
     * Get pop ins respecting display rules.
     *
     * @return array
     */
    public function getAvailablePopIns()
    {
        /**
         * @var PopIn[]
         */
        $popInsToDisplay = array();

        foreach ($this->registry->getPopIns() as $popIn) {
            if ($this->match($popIn)) {
                $popInsToDisplay[] = $popIn;
            }
        }

        return $popInsToDisplay;
    }

    /**
     * Match pop in rules.
     *
     * @param PopInInterface $popIn
     *
     * @return boolean
     */
    public function match(PopInInterface $popIn)
    {
        foreach ($popIn->getRules() as $rule) {
            foreach ($rule as $alias => $parameters) {
                if (!$this->displayRuleManager->match($alias, $parameters)) {
                    return false;
                }
            }
        }

        return true;
    }
}