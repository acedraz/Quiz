<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 11:16
 */

namespace Auth\Storage;


use Zend\Authentication\AuthenticationService;

class Authenticate
{
    /**
     * Authenticate constructor.
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @param $identity
     * @param $credentials
     * @param $user_agent
     * @param $ip_adrees
     * @return \Zend\Authentication\Result
     */
    public function login($identity, $credentials, $user_agent, $ip_adrees){
        $this->getAuthService()->getAdapter()->setIdentity($identity)->setCredential($credentials);
        $result = $this->getAuthService()->authenticate();
        if($result->isValid()){
            $columnsToOmit = ['password'];
            $user = $this->getAuthService()->getAdapter()->getResultRowObject(null,$columnsToOmit);
            $user->ip_adress = $ip_adrees;
            $user->user_agent = $user_agent;
            $this->storeIdentity($user);
        }
        return $result;
    }

    public function logout(){
        $this->getAuthService()->getStorage()->clear();
    }

    public function hasIdentity(){
        return $this->getAuthService()->getStorage()->read();
    }

    public function toArray(){
        $hidraty = json_encode($this->hasIdentity());
        return json_decode($hidraty,true);
    }

    public function getAuthService()
    {
        return $this->authenticationService;
    }

    public function storeIdentity($identity)
    {
        $this->getAuthService()->getStorage()->write($identity);
    }


}