<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:29
 */

namespace Quiz\Form\Factory;

use Psr\Container\ContainerInterface;
use Quiz\Form\CreatQuizForm;
use Zend\Db\Adapter\AdapterInterface;

class CreatQuizFormFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return CreatQuizForm
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        /** @var TYPE_NAME $containerInterface */
        return new CreatQuizForm($containerInterface);
    }
}