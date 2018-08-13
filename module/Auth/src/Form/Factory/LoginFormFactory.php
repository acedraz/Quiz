<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:29
 */

namespace Auth\Form\Factory;


use Auth\Form\LoginForm;
use Psr\Container\ContainerInterface;

class LoginFormFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return LoginForm
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        /** @var TYPE_NAME $containerInterface */
        return new LoginForm($containerInterface);
    }
}