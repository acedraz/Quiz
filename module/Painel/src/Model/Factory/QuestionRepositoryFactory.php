<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Question;
use Quiz\Model\QuestionRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class QuestionRepositoryFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return QuestionRepository
     * @internal param $ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Question::class));
        return new QuestionRepository(new TableGateway('tbl_questions',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}