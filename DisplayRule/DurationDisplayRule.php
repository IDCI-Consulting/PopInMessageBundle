<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\DisplayRule;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DurationDisplayRule extends AbstractDisplayRule
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultParameters(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setRequired(array(
                'to',
                'from'
            ))
            ->setAllowedTypes('from', array('integer'))
            ->setAllowedTypes('to',   array('integer'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doMatch(array $parameters = array())
    {
        $now  = new \DateTime();

        $from = new \DateTime();
        $from->setTimestamp($parameters['from']);

        $to = new \DateTime();
        $to->setTimestamp($parameters['to']);

        return $now >= $from && $now <= $to;
    }

}