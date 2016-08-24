<?php

/**
 * @author:  Brahim BOUKOUFALLAH <brahim.boukoufallah@idci-consulting.fr>
 * @license: MIT
 */

namespace IDCI\Bundle\PopInMessageBundle\Twig;

use IDCI\Bundle\PopInMessageBundle\PopIn\PopInManager;

class IncludePopInTwigExtension extends \Twig_Extension
{
    /**
     * @var PopInManager
     */
    private $popInManager;

    /**
     * Constructor
     *
     * @param PopInManager $popInManager
     */
    public function __construct(PopInManager $popInManager)
    {
        $this->popInManager = $popInManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'include_pop_in',
                array($this, 'includePopIn'),
                array('is_safe' => array('html', 'js'), 'needs_environment' => true)
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'idci_pop_in_message_twig_extension';
    }

    /**
     * Include Pop in template according to its rules
     *
     * @param \Twig_Environment $environment
     * @param string            $templatePath
     *
     * @return string
     */
    public function includePopIn(
        \Twig_Environment $environment,
        $templatePath = 'IDCIPopInMessageBundle:PopIn:message.html.twig'
    )
    {
        $renderedTemplate = '';

        foreach ($this->popInManager->getAvailablePopIns() as $popIn) {
            $renderedTemplate .= $environment->render(
                $templatePath,
                array(
                    'id'      => $popIn->getName(),
                    'title'   => $popIn->getTitle(),
                    'content' => $popIn->getContent(),
                    'footer'  => $popIn->getFooter(),
                )
            );
        }

        return $environment->render(
            'IDCIPopInMessageBundle::layout.html.twig',
            array(
                'pop_ins' => $renderedTemplate
            )
        );
    }
}