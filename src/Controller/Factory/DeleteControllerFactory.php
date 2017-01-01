<?php

namespace Pacificnm\Layout\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Controller\DeleteController;

class DeleteControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Layout\Controller\DeleteController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Layout\Service\ServiceInterface');

        return new DeleteController($service);
    }


}

