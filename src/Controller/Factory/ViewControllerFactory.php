<?php

namespace Pacificnm\Layout\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Controller\ViewController;

class ViewControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\Layout\Controller\ViewController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\Layout\Service\ServiceInterface');

        return new ViewController($service);
    }


}

