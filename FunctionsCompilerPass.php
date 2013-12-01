<?php

namespace CL\CLSymfonyDoctrineSearchFunctions;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Add customs function to DQL
 * 
 * TODO !!
 *
 * @author julien.fastre@champs-libres.coop
 */
class FunctionsCompilerPass implements CompilerPassInterface {
    
    private $connections;
    private $container;
    private $Managers;
    private $managerTemplate;
    private $tagPrefix;

    /**
     * Constructor.
     *
     * @param string $connections     Parameter ID for connections
     * @param string $managerTemplate sprintf() template for generating the event
     *                                manager's service ID for a connection name
     * @param string $tagPrefix Tag prefix for listeners and subscribers
     */
    public function __construct($connections, $managerTemplate, $tagPrefix)
    {
        $this->connections = $connections;
        $this->managerTemplate = $managerTemplate;
        $this->tagPrefix = $tagPrefix;
    }
    
    
    public function process(ContainerBuilder $container) {
        if (!$container->hasParameter($this->connections)) {
            return;
        }

        $this->container = $container;
        $this->connections = $container->getParameter($this->connections);
        
        
        
        
    }

    private function getManager($name) {
        if (null === $this->Managers) {
            $this->Managers = array();
            foreach ($this->connections as $n => $id) {
                $this->Managers[$n] = $this->container->getDefinition(sprintf($this->managerTemplate, $n));
            }
        }

        return $this->Managers[$name];
    }

}
