<?php

namespace Auth;


use Auth\Form\Factory\LoginFilterFactory;
use Auth\Form\Factory\CreatQuizFormFactory;
use Auth\Form\Factory\LoginFormFactory;
use Auth\Form\LoginFilter;
use Auth\Form\LoginForm;
use Auth\Model\Factory\UsersFactory;
use Auth\Model\Factory\UsersRepositoryFacotry;
use Auth\Model\Users;
use Auth\Model\UsersRepository;
use Auth\Storage\Authenticate;
use Auth\Storage\Factory\AuthenticateFactory;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Users::class=>UsersFactory::class,
                LoginForm::class=>LoginFormFactory::class,
                LoginFilter::class=>LoginFilterFactory::class,
                UsersRepository::class=>UsersRepositoryFacotry::class,
                Authenticate::class=>AuthenticateFactory::class
            ]
        ];

    }
}