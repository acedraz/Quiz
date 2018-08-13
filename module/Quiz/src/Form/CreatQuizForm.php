<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:29
 */

namespace Quiz\Form;


use Psr\Container\ContainerInterface;
use Quiz\Model\QuestionRepository;
use Quiz\Model\QuizRepository;
use Zend\Form\Form;

/**
 * @property  containerInterface
 */
class CreatQuizForm extends Form
{
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface, $name = null, array $options = [])
    {
        parent::__construct($name, $options);
        $this->containerInterface = $containerInterface;
        $this->setAttribute('action','createquiz');
        //$this->setAttribute('class','login-form-1');
        $this->add(['name'=>'quiz name',
            'type'=>'text',
            'options'=>[
                'label'=>'Name',
            ],
                'attributes'=>[
                    'id'=>'name_quiz',
                    'class'=>'form-control',
                    'placeholder'=>'Enter quiz name',
                    'required'=>true
                ]]);

        $this->add(['name'=>'quiz description',
            'type'=>'text',
            'options'=>[
                'label'=>'Description',
            ],
            'attributes'=>[
                'id'=>'description_quiz',
                'class'=>'form-control',
                'placeholder'=>'Enter quiz description',
                'required'=>true
            ]]);

        $this->add(['name'=>'question subject',
            'type'=>'text',
            'options'=>[
                'label'=>'subject',
            ],
            'attributes'=>[
                'id'=>'subject_question',
                'class'=>'form-control',
                'placeholder'=>'Enter question subject',
                'required'=>true
            ]]);

        $this->add(['name'=>'question type',
            'type'=>'select',
            'options'=>[
                'label'=>'Select question type',
                'value_options' => array(
                    '0' => 'Multiple Choice',
                    '1' => 'True/False',
                    '2' => 'Text',
                ),
            ],
            'attributes'=>[
                'id'=>'type_question',
                'class'=>'form-control',
                'placeholder'=>'Enter question type',
                'required'=>true
            ]]);

        $this->add(['name'=>'asnwer subject',
            'type'=>'text',
            'options'=>[
                'label'=>'answer',
            ],
            'attributes'=>[
                'id'=>'subject_answer',
                'class'=>'form-control',
                'placeholder'=>'Enter amswer subject',
                'required'=>true
            ]]);

        $this->add(['name'=>'answer correct',
            'type'=>'select',
            'options'=>[
                'label'=>'Correct answer',
                'value_options' => array(
                    '0' => 'False',
                    '1' => 'True',
                ),
            ],
            'attributes'=>[
                'id'=>'answer_correct',
                'class'=>'form-control',
                'placeholder'=>'Enter if answer correct',
                'required'=>true
            ]]);

        $this->add(['name'=>'question id quiz',
            'type'=>'select',
            'options'=>[
                'label'=>'Select id quiz',
                'value_options' => $this->getQuiz(),
            ],
            'attributes'=>[
                'id'=>'question_id_quiz',
                'class'=>'form-control',
                'placeholder'=>'Enter quiz id',
                'required'=>true
            ]]);

        $this->add(['name'=>'answer id question',
            'type'=>'select',
            'options'=>[
                'label'=>'Select id question',
                'value_options' => $this->getQuestions(),
            ],
            'attributes'=>[
                'id'=>'answer_id_question',
                'class'=>'form-control',
                'placeholder'=>'Enter question id',
                'required'=>true
            ]]);
    }

    /**
     * @return mixed
     */
    public function getQuiz(){
        $quizs = $this->containerInterface->get(QuizRepository::class)->select();
        foreach($quizs as $quiz){
            $extract = $quiz->toArray();
            $result[$extract['id']] = $extract['id'];
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getQuestions(){
        $quizs = $this->containerInterface->get(QuestionRepository::class)->select(['type' => 0]);
        foreach($quizs as $quiz){
            $extract = $quiz->toArray();
            $result[$extract['id']] = $extract['id']." - ".$extract['subject'];
        }
        return $result;
    }
}