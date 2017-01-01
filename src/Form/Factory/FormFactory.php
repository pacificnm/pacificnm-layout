<?php

namespace Pacificnm\Layout\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\Layout\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Layout\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('db2');
        
        return new Form($adapter);
    }


}

