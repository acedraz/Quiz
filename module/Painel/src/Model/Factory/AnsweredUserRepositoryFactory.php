<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Painel\Model\Answer;
use Painel\Model\AnsweredUser;
use Painel\Model\AnsweredUserRepository;
use Painel\Model\AnswerRepository;
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