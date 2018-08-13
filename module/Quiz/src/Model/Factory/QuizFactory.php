<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:37
 */

namespace Quiz\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Quiz;

class QuizFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return Quiz
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new Quiz();
    }
}