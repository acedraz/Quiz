<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:37
 */

namespace Quiz\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Answer;
use Quiz\Model\AnsweredUser;

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