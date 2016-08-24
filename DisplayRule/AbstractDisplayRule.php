<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractDisplayRule implements DisplayRuleInterface
{
    /**
     * Do match the rule using parameters
     *
     * @param array $parameters : The parameters to match.
     *
     * @return boolean True if the given parameters fit, false otherwise.
     */
    abstract public function doMatch(array $parameters = array());

    /**
     * Set default parameters
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultParameters(OptionsResolverInterface $resolver)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function match(array $parameters = array())
    {
        $resolver = new OptionsResolver();
        $this->setDefaultParameters($resolver);
        $resolvedParameters = $resolver->resolve($parameters);

        return $this->doMatch($resolvedParameters);
    }
}