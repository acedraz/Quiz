<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:30
 */

namespace Quiz\Model;

use Zend\Hydrator\ClassMethods;

class Question

{
    protected $id;
    protected $subject;
    protected $quiz_id;
    protected $type;
    protected $created_at;
    protected $update_at;
    protected $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getQuizId()
    {
        return $this->quiz_id;
    }

    /**
     * @param mixed $quiz_id
     */
    public function setQuizId($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param array $options
     */
    public function exchangeArray(array $options=[])
    {
        $hidrator = new ClassMethods();
        $hidrator->hydrate($options,$this);
    }

    /**
     * @return array
     */
    public function toArray(){
        $hidrator = new ClassMethods();
        return $hidrator->extract($this);
    }

}