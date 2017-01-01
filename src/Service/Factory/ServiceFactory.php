<?php

namespace Pacificnm\Layout\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pacificnm\Layout\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\Layout\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

