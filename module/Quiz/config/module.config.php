<?php

namespace Quiz;

use Quiz\Controller\Factory\DashboardControllerFactory;
use Quiz\Controller\Factory\QuizControllerFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'quiz' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/quiz[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\QuizController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'dashboard' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/dashboard[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\DashboardController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\QuizController::class => QuizControllerFactory::class,
            Controller\DashboardController::class=>DashboardControllerFactory::class
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'my_auth_services' => AuthenticationService::class,
        ],
    ],
    'view_manager' => array(
        /*'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/index.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),*/
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array('ViewJsonStrategy',),
    ),
];
