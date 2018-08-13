<?php
namespace Auth;

use Auth\Controller\Factory\AuthControllerFactory;
use Auth\Controller\Factory\LoginControllerFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'auth' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/auth[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\AuthController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'login' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AuthController::class => AuthControllerFactory::class,
            Controller\LoginController::class => LoginControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'my_auth_services' => AuthenticationService::class,
        ],
    ],
    'view_manager' => [
        'template_map' => array(
            'login' => __DIR__ . '/../view/auth/login/login.phtml',
            'dashboard' => __DIR__ . './../Application/view/layout/admin.phtml',
        ),
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
