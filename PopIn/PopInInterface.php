<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\PopIn;

interface PopInInterface
{
    /**
     * Returns the pop in name.
     *
     * @return string
     */
    public function getName();

    /**
     * Returns title.
     *
     * @return string
     */
    public function getTitle();

    /**
     * Returns content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Returns footer.
     *
     * @return string
     */
    public function getFooter();

    /**
     * Returns the rules.
     *
     * @return array
     */
    public function getRules();
}