<?php

namespace Pacificnm\Layout\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Adapter\AdapterInterface;
use Pacificnm\Layout\Service\ServiceInterface;

class ConsoleController extends AbstractActionController
{

    protected $service = null;

    protected $console = null;

    /**
     * @param ServiceInterface $service
     * @param AdapterInterface $console
     */
    public function __construct(ServiceInterface $service, AdapterInterface $console)
    {
        $this->service = $service;

        $this->console = $console;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
    }


}

