<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\PopIn;

interface PopInRegistryInterface
{
    /**
     * Sets a popin identify by an alias.
     *
     * @param string         $alias : The alias.
     * @param PopInInterface $popIn : The Pop In.
     *
     * @return PopInRegistryInterface
     */
    public function setPopIn($alias, PopInInterface $popIn);

    /**
     * Return all popins respecting their own rules
     *
     * @return array
     */
    public function getPopIns();

}