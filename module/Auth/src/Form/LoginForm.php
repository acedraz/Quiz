<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:29
 */

namespace Auth\Form;


use Psr\Container\ContainerInterface;
use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct(ContainerInterface $containerInterface, $name = null, array $options = [])
    {
        parent::__construct($name, $options);
        $this->setInputFilter($containerInterface->get(LoginFilter::class));
        $this->setAttribute('action','login');
        $this->setAttribute('class','login-form-1');
        $this->add(['name'=>'login',
            'type'=>'text',
            'options'=>[
                'label'=>'Login',
            ],
                'attributes'=>[
                    'id'=>'login',
                    'class'=>'form-control',
                    'placeholder'=>'Enter your login',
                    'required'=>true
                ]]);

        $this->add(['name'=>'password',
            'type'=>'password',
            'options'=>[
                'label'=>'password',
            ],
            'attributes'=>[
                'id'=>'password',
                'class'=>'form-control',
                'placeholder'=>'Enter your password',
                'required'=>true
            ]]);
    }

}