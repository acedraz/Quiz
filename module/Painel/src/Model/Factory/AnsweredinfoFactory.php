<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:37
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Painel\Model\Answeredinfo;

class AnsweredinfoFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return Answeredinfo
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new Answeredinfo();
    }
}