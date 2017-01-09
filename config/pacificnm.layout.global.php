<?php 
return array(
    'module' => array(
        'Layout' => array(
            'name' => 'Layout',
            'version' => '1.0.1',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/layout.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\Layout\Controller\ConsoleController' => 'Pacificnm\Layout\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\Layout\Controller\CreateController' => 'Pacificnm\Layout\Controller\Factory\CreateControllerFactory',
            'Pacificnm\Layout\Controller\DeleteController' => 'Pacificnm\Layout\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\Layout\Controller\IndexController' => 'Pacificnm\Layout\Controller\Factory\IndexControllerFactory',
            'Pacificnm\Layout\Controller\RestController' => 'Pacificnm\Layout\Controller\Factory\RestControllerFactory',
            'Pacificnm\Layout\Controller\UpdateController' => 'Pacificnm\Layout\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\Layout\Controller\ViewController' => 'Pacificnm\Layout\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\Layout\Service\ServiceInterface' => 'Pacificnm\Layout\Service\Factory\ServiceFactory',
            'Pacificnm\Layout\Mapper\MysqlMapperInterface' => 'Pacificnm\Layout\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\Layout\Form\Form' => 'Pacificnm\Layout\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'layout-create' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/layout/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'layout-delete' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/layout/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'layout-index' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/layout',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'layout-rest' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/layout[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\RestController'
                    )
                )
            ),
            'layout-update' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/layout/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'layout-view' => array(
                'pageTitle' => 'Layout',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'layout-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/layout/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\Layout\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'layout-console-index' => array(
                    'options' => array(
                        'route' => 'layout',
                        'defaults' => array(
                            'controller' => 'Pacificnm\Layout\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\Layout' => true
        ),
        'template_map' => array(
            'pacificnm/layout/create/index' => __DIR__ . '/../view/layout/create/index.phtml',
            'pacificnm/layout/delete/index' => __DIR__ . '/../view/layout/delete/index.phtml',
            'pacificnm/layout/index/index' => __DIR__ . '/../view/layout/index/index.phtml',
            'pacificnm/layout/update/index' => __DIR__ . '/../view/layout/update/index.phtml',
            'pacificnm/layout/view/index' => __DIR__ . '/../view/layout/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'layout-create',
                'layout-delete',
                'layout-index',
                'layout-update',
                'layout-view'
            )
        )
    ),
    'menu' => array(
        'default' => array(
            array(
                'key' => 'admin',
                'name' => 'Admin',
                'icon' => 'fa fa-gear',
                'order' => 99,
                'active' => true,
                'location' => 'left',
                'items' => array(
                    array(
                        'key' => 'layout-index',
                        'name' => 'Layout',
                        'route' => 'layout-index',
                        'icon' => 'fa fa-gear',
                        'order' => 7,
                        'active' => true
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Layout',
                        'route' => 'layout-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'layout-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'layout-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'layout-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'layout-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);