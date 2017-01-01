<?php

namespace Pacificnm\Layout\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Controller\IndexController;

class IndexControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Layout\Controller\IndexController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Layout\Service\ServiceInterface');

        return new IndexController($service);
    }


}

