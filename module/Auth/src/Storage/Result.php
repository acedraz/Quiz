<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 12:01
 */

namespace Auth\Storage;


class Result
{
    protected $messages;
    const SUCCESS = 1;
    const FAILURE = 0;
    const FAILURE_IDENTITY_NOT_FOUND = -1;
    const FAILURE_IDENTITY_AMBIGUOUS = -2;
    const FAILURE_CREDENTIALS_INVALID = -3;
    const FAILURE_UNCATECORIZED = -4;
    /**
     * Result constructor.
     * @param $code
     * @param $identity
     * @param array $messages
     */
    public function __construct($code, $identity, array $messages = [
        0 => "OPERATION INCOMPLETE",
        1 => "WELLCOME",
        -1=> "USER NOT FOUND",
        -2=> "OPERATION INCOMPLETE",
        -3=> "INCORRECT PASSWORD",
        -4=> "OPERATION INCOMPLETE"
    ])
    {
        switch ($code){
            case Result::FAILURE:
                $this->setMessage("OPERATION INCOMPLETE","error");
                break;
            case Result::SUCCESS:
                $this->setMessage(sprintf($messages[$code],$identity),"success");
                break;
            case Result::FAILURE_IDENTITY_NOT_FOUND:
                $this->setMessage($messages[$code],"alert");
                break;
            case Result::FAILURE_IDENTITY_AMBIGUOUS:
                $this->setMessage($messages[$code],"alert");
                break;
            case Result::FAILURE_CREDENTIALS_INVALID:
                $this->setMessage($messages[$code],"alert");
                break;
            case Result::FAILURE_UNCATECORIZED:
                $this->setMessage($messages[$code],"alert");
                break;
            default:
                $this->setMessage("OPERATION ERROR","error");
                break;
        }

    }

    /**
     * @return mixed
     */
    public function getMessage(){
        return $this->messages;
    }

    /**
     * @param $message
     * @param string $class
     */
    public function setMessage($message, $class='success'){
        $icon['success'] = 'icon-checkmark-round';
        $icon['info'] = 'icon-information-circled';
        $icon['alert'] = 'icon-alert-circled';
        $icon['error'] = 'icon-close-circled';
        $this->messages = sprintf("<div class='alert alert_%s'<span>%s<i class='icone %s'></i> </span></div>",$class,$message,$icon[$class]);
    }
}