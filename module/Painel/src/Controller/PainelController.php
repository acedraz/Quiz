<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:01
 */

namespace Painel\Controller;

use Interop\Container\ContainerInterface;
use Painel\Model\AnsweredinfoRepository;
use Painel\Model\AnsweredUserRepository;
use Painel\Model\AnswerRepository;
use Painel\Model\QuestionRepository;
use Painel\Model\QuizRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class PainelController extends AbstractActionController
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
        $id = $this->params()->fromRoute('id');
        if($id){
            $getquiz = true;
            $view = new ViewModel(compact(['getquiz']));
            $view->setTemplate('index');
        }
        else {
            //$quizs=$this->containerInterface->get(QuizRepository::class)->select(['status'=>1]);
            $quizs = $this->containerInterface->get(QuizRepository::class)->select();
            $view = new ViewModel(compact(['quizs']));
            $view->setTemplate('painel/index');
        }
        return $view;
    }

    /**
     * @return \Zend\Http\Response
     */
    public function getquizAction(){
        $dataform = [
            'quiz_id' => $this->getRequest()->getPost('quiz_id'),
        ];
        $questions=$this->containerInterface->get(QuestionRepository::class)->select(['quiz_id'=>$dataform['quiz_id']]);
        $html = "";
        $count = 0;
        foreach ($questions as $question){
            $value = ($question->toArray());
            $html = $html."<div class=\"col-mds-6\"><div class=\"box box-default\">
            <div class=\"box-header with-border\">
              <h3 class=\"box-title\">".$value['subject']."</h3>

              <div class=\"box-tools pull-right\">
                <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-minus\"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class=\"box-body\">";
            if($value['type']==2){
                $html = $html."<label>Escreva</label><textarea scale=\"".$count."\" name=".$value['id']." class=\"form-control\"></textarea>";
            }
            else{
                $answers = $this->containerInterface->get(AnswerRepository::class)->select(['question_id'=>$value['id']]);
                foreach($answers as $answer){
                    $value2 = ($answer->toArray());
                    $html = $html."<div class=\"input-group\"><span class=\"input-group-addon\"><input scale=\"".$count."\" type=\"radio\" name=\"".$value['id']."\" value=\"".$value2['id']."\"></span><input type=\"text\" class=\"form-control\" readonly=\"\" value=\"".$value2['answer']."\"></div>";
                }
            }

            $html = $html."</div>
            <!-- /.box-body -->
          </div></div>";
            $count++;
            //$answer[$question] = $this->containerInterface->get(AnswerRepository::class)->select(['question_id'=>$question['id']]);
        }
        $html = $html."<div class=\"row\"><div class=\"col-md-12\" align=\"center\"><a id=\"".$dataform['quiz_id']."\" timestamp=\"".date('Y-m-d H:i:s', time())."\" class=\"btn btn-app\" style=\"height: auto;\">
                <i class=\"fa fa-send\"></i> Enviar
              </a></div><div>      	</div></div>";
        $script = "
        <script>
        $(document).ready(function(){
        var question_id=[];
        var answer_id=[];
         $('input:radio').change(function(){
             question_id[$(this).attr('scale')] = $(this).attr('name');
             answer_id[$(this).attr('scale')] = $(this).attr('value');
            });      
               
        $('.btn-app').on('click', function(){
            $('#contentquiz').LoadingOverlay(\"show\");
            $.ajax({
                type: \"POST\",
                url:\"./painel/saveanswer\",
                data: { 
                    'quiz_id': $(this).attr('id'), 
                    'questions_id': question_id,
                    'answer_id':  answer_id,
                    'initial_time': $(this).attr('timestamp'),
                    'name': $(name_user).val(),
                    'email': $(email).val(),
                },
                dataType:   'json', 
                async:      true,
                success: function(response) {    
                    
                    ///*
                    if(response){
                        $('#contentquiz').html(response);
                        $('#contentquiz').LoadingOverlay(\"hide\");
                    }
                     else{
                        $(\"#modal-creat-question .modal-body\").html(\"Error in operation\");
                     }
                $(\".modal-body\").html(response);
                },
                error: function(jqXHR, textStatus, errorThrown){ 
                   // console.log('my message:' + err); 
                   // $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
                }
            }); 
            
        });
        });
        </script>";
        $html = $html.$script;
        $jsonData[0] = $html;
        $view = new JsonModel($jsonData);
        $view->setTerminal(true);
        return $view;
        //return $this->redirect()->toRoute('painel',['action' => 'index', 'id'=>$id]);
    }

    public function saveanswerAction(){
        $data_answereduser = [
            'name' => $this->getRequest()->getPost('name'),
            'email' => $this->getRequest()->getPost('email'),
            'quiz_id' => $this->getRequest()->getPost('quiz_id'),
            'created_at' => $this->getRequest()->getPost('initial_time'),
        ];
        //$this->containerInterface->get(AnsweredUserRepository::class)->insert($data_answereduser);
        $var_questions = $this->getRequest()->getPost('questions_id');
        $var_values = $this->getRequest()->getPost('answer_id');
        for ($i = 0; $i < count($var_questions); $i++) {
            $data_answeredinfo = [
                'id_quiz' => $this->getRequest()->getPost('quiz_id'),
                'id_question' => $var_questions[$i],
                'id_answered' => $var_values[$i],
            ];
            $this->containerInterface->get(AnsweredinfoRepository::class)->insert($data_answeredinfo);
        }
        $html = "CADASTRADO COM SUCESSO";
        $jsonData[0] = $html;
        $view = new JsonModel($jsonData);
        $view->setTerminal(true);
        return $view;
    }

}