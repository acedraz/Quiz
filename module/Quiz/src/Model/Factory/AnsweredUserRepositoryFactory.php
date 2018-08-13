<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Quiz\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Answer;
use Quiz\Model\AnsweredUser;
use Quiz\Model\AnsweredUserRepository;
use Quiz\Model\AnswerRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class AnsweredUserRepositoryFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return AnswerRepository
     * @internal param $ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(AnsweredUser::class));
        return new AnsweredUserRepository(new TableGateway('tbl_answered_user',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}