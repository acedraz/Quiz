<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:01
 */

namespace Painel\Controller;

use Interop\Container\ContainerInterface;
use Painel\Model\AnswerRepository;
use Painel\Model\QuestionRepository;
use Painel\Model\QuizRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class AnswerController extends AbstractActionController
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
        /* $quiz_id = $this->params()->fromRoute('id');
         $questions=$this->containerInterface->get(QuestionRepository::class)->select(['quiz_id'=>$quiz_id]);
         foreach ($questions as $question){
             $question->toArray();
             $answer[$question] = $this->containerInterface->get(AnswerRepository::class)->select(['question_id'=>$question['id']]);
         }
         //var_dump($answer);*/
        $view = new ViewModel();
        $view->setTemplate('painel/index');
        return $view;
    }

}