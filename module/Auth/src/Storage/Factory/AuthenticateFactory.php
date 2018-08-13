<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 11:36
 */

namespace Auth\Storage\Factory;


use Auth\Storage\Authenticate;
use Auth\Storage\AuthStorage;
use Interop\Container\ContainerInterface;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;

use Zend\Authentication\AuthenticationService;
use Zend\Db\Adapter\AdapterInterface;

class AuthenticateFactory
{
    /**
     * @param ContainerInterface $container
     * @return Authenticate
     */
    public function __invoke(ContainerInterface $container)
        {
            //$myconfig = $container->get("ZF_CONFIG");
            $dbAdapter = $container->get(AdapterInterface::class);
            $dbTableAuthAdapter = new AuthAdapter($dbAdapter,
                'tbl_users',
                'login',
                'password',
                "MD5('senha') AND level = 1"
                );
            $authService = new AuthenticationService();
            /** @var TYPE_NAME $dbTableAuthAdapter */
            $authService->setAdapter($dbTableAuthAdapter);
            $authService->setStorage(new AuthStorage());
            return new Authenticate($authService);
        }
}