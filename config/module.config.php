<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'danauction' => __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'danauction' => 'DanAuction\Controller\AuctionController',
            'danauction-admin' => 'DanAuction\Controller\AdminController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'danauction' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/auction',
                    'defaults' => array(
                        'controller' => 'danauction',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'list' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:slug]',
                            'defaults' => array(
                                'controller' => 'danauction',
                                'action'     => 'single',
                            ),
                        ),
                    ),
                ),
            ),
            'danauction-admin' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/admin/auction',
                    'defaults' => array(
                        'controller' => 'danauction-admin',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'list' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/create',
                            'defaults' => array(
                                'controller' => 'danauction-admin',
                                'action'     => 'create',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);