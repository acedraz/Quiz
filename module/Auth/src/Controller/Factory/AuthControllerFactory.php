<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 00:18
 */

namespace Auth\Controller\Factory;

use Auth\Controller\AuthController;
use Interop\Container\ContainerInterface;

class AuthControllerFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return AuthController
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new AuthController($containerInterface);
    }
}