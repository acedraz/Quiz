<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Answer;
use Quiz\Model\AnswerRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class AnswerRepositoryFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return AnswerRepository
     * @internal param $ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Answer::class));
        return new AnswerRepository(new TableGateway('tbl_answer',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}