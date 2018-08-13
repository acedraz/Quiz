<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:37
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Painel\Model\Answer;
use Painel\Model\AnsweredUser;

class AnsweredUserFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return Answer
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new AnsweredUser();
    }
}