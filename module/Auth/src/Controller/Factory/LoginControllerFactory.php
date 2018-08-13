<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 23:52
 */

namespace Auth\Controller\Factory;

use Auth\Controller\LoginController;
use Interop\Container\ContainerInterface;

class LoginControllerFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return LoginController
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new LoginController($containerInterface);
    }
}