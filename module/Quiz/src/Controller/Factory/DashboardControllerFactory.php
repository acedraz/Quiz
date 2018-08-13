<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:02
 */

namespace Quiz\Controller\Factory;

use Interop\Container\ContainerInterface;
use Quiz\Controller\DashboardController;

class DashboardControllerFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return DashboardController
     */
    public function __invoke(ContainerInterface $containerInterface)
    {
        return new DashboardController($containerInterface);
    }
}