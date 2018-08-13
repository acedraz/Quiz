<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:01
 */

namespace Quiz\Controller;

use Interop\Container\ContainerInterface;
use Quiz\Form\CreatQuizForm;
use Quiz\Model\AnsweredinfoRepository;
use Quiz\Model\AnsweredUserRepository;
use Quiz\Model\AnswerRepository;
use Quiz\Model\QuestionRepository;
use Quiz\Model\QuizRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class DashboardController extends AbstractActionController
{
    /**
     * @var ContainerInterface
     */
    private $containerInterface;

    /**
     * AuthController constructor.
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;

    }

    /**
     * @return \Zend\Http\Response|ViewModel
     */
    public function indexAction()
    {
        if(!$this->identity()){
            return $this->redirect()->toRoute('login');
        }
        $form=$this->containerInterface->get(CreatQuizForm::class);
        /** @var TYPE_NAME $quizs */
        $quizs=$this->containerInterface->get(QuizRepository::class)->select();
        $questions = $this->containerInterface->get(QuestionRepository::class)->select();
        $answers = $this->containerInterface->get(AnswerRepository::class)->select();
        $answersedusers = $this->containerInterface->get(AnsweredUserRepository::class)->select();
        $answersedinfos = $this->containerInterface->get(AnsweredinfoRepository::class)->select();
        //$this->layout('layout/dashboard');
        $view = new ViewModel(compact(['quizs','form','questions','answers','answersedusers','answersedinfos']));
        $view->setTemplate('layout/dashboard');
        return $view;

    }

    public function creatingquizAction(){
        //GET AJAX POST DATA FROM CREATING QUIZ
        $dataform = [
            'name' => $this->getRequest()->getPost('name_quiz'),
            'description' => $this->getRequest()->getPost('description_quiz')
            ];
        //$dataform['name'] = $this->getRequest()->getPost('name_quiz');
        //$dataform['description'] = $this->getRequest()->getPost('description_quiz');
        /*TEST VIA URL
        $request = $this->getRequest();
        $query = $request->getQuery();*/
        /*TEST VIA RESPONSE AJAX
        if ($request->isXmlHttpRequest() || $query->get('showJson') == 1) {
                $jsonData[0] = $dataform['description_quiz'];
            $view = new JsonModel($jsonData);
            $view->setTerminal(true);
        } else {
            $view = new ViewModel();
        }
        return $view;*/
        $insertvalue = $this->containerInterface->get(QuizRepository::class)->insert($dataform);
        //$jsonData[0] =$insertvalue;
        ///*
         if($insertvalue){
            $jsonData[0] = false;
        }
        else{
            $jsonData[0] = true;
        }//*/
        $view = new JsonModel($jsonData);
        $view->setTerminal(true);
        return $view;
        //return $this->redirect()->toRoute('dashboard');
}

    public function finalizeAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>0,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(QuizRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function openAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>1,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(QuizRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function deleteAction(){
        $id = $this->params()->fromRoute('id');
        $this->containerInterface->get(QuizRepository::class)->delete(['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    /**
     *
     */
    public function creatingquestionAction(){
        $dataform = [
            'subject' => $this->getRequest()->getPost('subject_question'),
            'type' => $this->getRequest()->getPost('type_question'),
            'quiz_id' => $this->getRequest()->getPost('id_quiz'),
            ];
            $insertvalue = $this->containerInterface->get(QuestionRepository::class)->insert($dataform);
        if($insertvalue){
            $jsonData[0] = false;
        }
        else{
            $jsonData[0] = true;
        }//*/
        $view = new JsonModel($jsonData);
        $view->setTerminal(true);
        return $view;
    }

    public function enablequestionAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>1,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(QuestionRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function disablequestionAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>0,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(QuestionRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function deletequestionAction(){
        $id = $this->params()->fromRoute('id');
        $this->containerInterface->get(QuestionRepository::class)->delete(['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function creatinganswerAction(){
        $dataform = [
            'answer' => $this->getRequest()->getPost('answer'),
            'is_correct' => $this->getRequest()->getPost('is_correct'),
            'question_id' => $this->getRequest()->getPost('question_id'),
        ];
        $insertvalue = $this->containerInterface->get(AnswerRepository::class)->insert($dataform);
        if($insertvalue){
            $jsonData[0] = false;
        }
        else{
            $jsonData[0] = true;
        }//*/
        $view = new JsonModel($jsonData);
        $view->setTerminal(true);
        return $view;
    }

    public function enableanswerAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>1,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(AnswerRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function disableanswerAction(){
        $id = $this->params()->fromRoute('id');
        $data = [
            'status'=>0,
            'updated_at'=>  date ('Y-m-d H:i:s', time())
        ];
        $this->containerInterface->get(AnswerRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }

    public function deleteanswerAction(){
        $id = $this->params()->fromRoute('id');
        $this->containerInterface->get(AnswerRepository::class)->delete(['id'=>$id]);
        return $this->redirect()->toRoute('dashboard');
    }
}