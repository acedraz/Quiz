<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:30
 */

namespace Painel\Model;

use Zend\Hydrator\ClassMethods;

class Answer

{
    protected $id;
    protected $answer;
    protected $is_correct;
    protected $question_id;
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
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getisCorrect()
    {
        return $this->is_correct;
    }

    /**
     * @param mixed $is_correct
     */
    public function setIsCorrect($is_correct)
    {
        $this->is_correct = $is_correct;
    }

    /**
     * @return mixed
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param mixed $question_id
     */
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;
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