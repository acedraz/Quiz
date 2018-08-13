<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:30
 */

namespace Auth\Form\Factory;


use Auth\Form\LoginFilter;
use Interop\Container\ContainerInterface;

class LoginFilterFactory
{
    /**
     * @param ContainerInterface $containerInterface
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new LoginFilter($containerInterface);
    }
}