<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 11:16
 */

namespace Auth\Storage;

use Zend\Authentication\Storage\Session as SessionStorage;

class AuthStorage extends SessionStorage
{
    protected $session;

    /**
     * @param int $rememberMe
     * @param int $time
     */
    public function setRememberMe($rememberMe =  0, $time = 1209600){
        if($rememberMe == 1){
            $this->session->getManager()->rememberMe($time);
        }
    }

    public function forgetMe(){
        $this->session->getManager()->forgetMe();
    }

    public function getSessionId(){
        return $this->session->getManager()->getId();
    }
}