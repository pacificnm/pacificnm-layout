<?php

namespace Pacificnm\Layout\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Controller\RestController;

class RestControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Layout\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Layout\Service\ServiceInterface');

        return new RestController($service);
    }


}

