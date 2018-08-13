<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 09:46
 */

namespace Auth\Model\Factory;


use Auth\Model\Users;
use Psr\Container\ContainerInterface;

class UsersFactory
{
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new Users();
    }
}