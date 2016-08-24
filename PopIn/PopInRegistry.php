<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\PopIn;

class PopInRegistry implements PopInRegistryInterface
{
    /**
     * @var PopInInterface[]
     */
    private $popIns = array();

    /**
     * {@inheritdoc}
     */
    public function setPopIn($alias, PopInInterface $popIn)
    {
        $this->popIns[$alias] = $popIn;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPopIns()
    {
        return $this->popIns;
    }

}