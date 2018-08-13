<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 09:47
 */

namespace Auth\Model\Factory;


use Auth\Model\Users;
use Auth\Model\UsersRepository;
use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class UsersRepositoryFacotry
{
    /**
     * @param ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Users::class));
        return new UsersRepository(new TableGateway('tbl_users',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}