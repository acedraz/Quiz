<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:33
 */

namespace Quiz\Model;

use Zend\Db\TableGateway\TableGateway;

class AnsweredinfoRepository
{
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getTable()
    {
        return $this->tableGateway->getTable();
    }

    public function select($where = null)
    {
        return $this->tableGateway->select($where);
    }

    public function insert($set)
    {
        $this->tableGateway->insert($set);
        return $this->tableGateway->getLastInsertValue();
    }

    public function update($set, $where = null)
    {
        return $this->tableGateway->update($set,$where);
    }

    public function delete($where)
    {
        return $this->tableGateway->delete($where);
    }

}