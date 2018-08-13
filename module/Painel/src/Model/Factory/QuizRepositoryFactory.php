<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:39
 */

namespace Painel\Model\Factory;


use Interop\Container\ContainerInterface;
use Quiz\Model\Quiz;
use Quiz\Model\QuizRepository;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class QuizRepositoryFactory
{
    /**
     * @param ContainerInterface $containerInterface
     * @return QuizRepository
     * @internal param $ContainerInterface $
     */
    function __invoke(ContainerInterface $containerInterface)
    {
        $resultPrototype = new ResultSet();
        $resultPrototype->setArrayObjectPrototype($containerInterface->get(Quiz::class));
        return new QuizRepository(new TableGateway('tbl_quiz',$containerInterface->get(AdapterInterface::class),null,$resultPrototype));
    }
}