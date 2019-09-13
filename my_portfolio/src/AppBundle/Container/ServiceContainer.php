<?php

namespace AppBundle\Container;

use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Description of ServiceContainer
 *
 */
class ServiceContainer
{
    /** @var ContainerInterface $container */
    private $container;
    
    /**
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

/**
     * @return \AppBundle\Service\MailerService
     */
    public function getMailer()
    {
        return $this->container->get(\AppBundle\Service\MailerService::class);
    }

    public function getTemplating() {
        return $this->container->get('templating');
    }
}