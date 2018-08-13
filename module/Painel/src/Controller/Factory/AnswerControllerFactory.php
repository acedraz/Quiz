<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:02
 */

namespace Painel\Controller\Factory;

use Interop\Container\ContainerInterface;
use Painel\Controller\PainelController;

class AnswerControllerFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return PainelController
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        /** @var TYPE_NAME $containerInterface */
        return new PainelController($containerInterface);
    }
}