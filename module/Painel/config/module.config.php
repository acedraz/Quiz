<?php

namespace Painel;

use Painel\Controller\Factory\AnswerControllerFactory;
use Painel\Controller\Factory\PainelControllerFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'painel' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/painel[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\PainelController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PainelController::class=>PainelControllerFactory::class,
            Controller\AnswerController::class=>AnswerControllerFactory::class,
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
            'layout/layout/answerpag' => __DIR__ . '/../view/layout/layout/answerpag.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/layout/index.phtml',

        ),*/
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array('ViewJsonStrategy',),
    ),
];
