<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 10/08/2018
 * Time: 00:15
 */

namespace Auth\Controller;


use Auth\Model\UsersRepository;
use Psr\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
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
     *
     */
    public function indexAction()
    {
        if(!$this->identity()){
            return $this->redirect()->toRoute('login');
        }
        $users=$this->containerInterface->get(UsersRepository::class)->select();
        //$this->layout('layout/auth');
        return new ViewModel(compact(['users']));
    }

    public function createAction(){
        $name=date('H:i:s');
        $data = ['login'=>"{$name}@gmail.com",'password'=>md5('12345')];
        $this->containerInterface->get(UsersRepository::class)->insert($data);
        return $this->redirect()->toRoute('auth');
    }

    public function updateAction(){
        $id = $this->params()->fromRoute('id');
        //$name=date('H:i:s');
        $data = ['login'=>"trezo",'password'=>md5('senha')];
        $this->containerInterface->get(UsersRepository::class)->update($data,['id'=>$id]);
        return $this->redirect()->toRoute('auth');
    }

    public function deleteAction(){
        $id = $this->params()->fromRoute('id');
        $this->containerInterface->get(UsersRepository::class)->delete(['id'=>$id]);
        return $this->redirect()->toRoute('auth');
    }
}