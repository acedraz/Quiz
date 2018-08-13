<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:37
 */

namespace Quiz\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Question;

class QuestionFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return Question
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new Question();
    }
}