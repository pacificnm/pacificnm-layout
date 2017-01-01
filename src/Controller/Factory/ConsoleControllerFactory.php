<?php

namespace Pacificnm\Layout\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Controller\ConsoleController;

class ConsoleControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Layout\Controller\ConsoleContorller
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Layout\Service\ServiceInterface');

        $console = $realServiceLocator->get('console');

        return new ConsoleController($service, $console);
    }


}

