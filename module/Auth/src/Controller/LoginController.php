<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 23:52
 */

namespace Auth\Controller;


use Auth\Form\LoginForm;
use Auth\Storage\Authenticate;
use Auth\Storage\Result;
use Psr\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    protected $authenticate;

    /**
     * @return mixed
     */
    public function getAuthenticate()
    {
        $this->authenticate =$this->containerInterface->get(Authenticate::class);
        return $this->authenticate;
    }
    /**
     * @var ContainerInterface
     */
    private $containerInterface;

    /**
     * LoginController constructor.
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        $this->containerInterface = $containerInterface;
    }

    /**
     * @return ViewModel
     */
    public function loginAction(){
        $auth = $this->getAuthenticate();
        if($auth->hasIdentity()){
            return $this->redirect()->toRoute('dashboard');
        }
        $form=$this->containerInterface->get(LoginForm::class);
        if($this->params()->fromPost()):
            $form->setData($this->params()->fromPost());
        if(!$form->isValid()){
                $dataform = $form->getData();
                $result = $auth->login(
                    $dataform['login'],
                    md5($dataform['password']),
                    $this->getRequest()->getServer('HTTP_USER_AGENT'),
                    $this->getRequest()->getServer('REMOTE_ADDR'));
                $messagesResult = new Result($result->getcode(),$result->getIdentity());
                if($result->isValid()){
                    //$request['message'] = $messagesResult->getMessage();
                    //$request['success'] = $result->getCode();
                    //$request['redirect'] = "/admin";
                    return $this->redirect()->toRoute('dashboard');
                }
            }
            else{
                //echo "<script>alert()</script>";
            }
        endif;
        return new ViewModel(compact('form'));
    }

    public function logoutAction(){
        if($this->getAuthenticate()->hasIdentity()){
            $this->getAuthenticate()->logout();
        }
        return $this->redirect()->toRoute('login');
    }
}