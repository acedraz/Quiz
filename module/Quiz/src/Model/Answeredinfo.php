<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 12/08/2018
 * Time: 01:30
 */

namespace Quiz\Model;

use Zend\Hydrator\ClassMethods;

class Answeredinfo

{
    protected $id;
    protected $id_quiz;
    protected $id_question;
    protected $id_answered;
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
    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    /**
     * @param mixed $id_quiz
     */
    public function setIdQuiz($id_quiz)
    {
        $this->id_quiz = $id_quiz;
    }

    /**
     * @return mixed
     */
    public function getIdQuestion()
    {
        return $this->id_question;
    }

    /**
     * @param mixed $id_question
     */
    public function setIdQuestion($id_question)
    {
        $this->id_question = $id_question;
    }

    /**
     * @return mixed
     */
    public function getIdAnswered()
    {
        return $this->id_answered;
    }

    /**
     * @param mixed $id_answered
     */
    public function setIdAnswered($id_answered)
    {
        $this->id_answered = $id_answered;
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