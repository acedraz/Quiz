<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Painel\Model\Answeredinfo;
use Painel\Model\AnsweredinfoRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class AnsweredinfoRepositoryFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return AnsweredinfoRepository
     * @internal param $ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Answeredinfo::class));
        return new AnsweredinfoRepository(new TableGateway('tbl_answered_info',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}