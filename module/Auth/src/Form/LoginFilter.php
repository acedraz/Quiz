<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 00:30
 */

namespace Auth\Form;


use Psr\Container\ContainerInterface;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;

class LoginFilter extends InputFilter
{
    /**
     * @var ContainerInterface
     */
    private $containerInterface;

    /**
     * LoginFilter constructor.
     * @param ContainerInterface $
     */
    public function __construct(ContainerInterface $containerInterface)
    {
        //LOGIN INFORMATION
        $this->add([
           'name'=>' login',
           'required'=>true,
           'filters'=>[
               ['name' => StripTags::class],
               ['name' => StringTrim::class],
           ],
            'validators' => [
                [
                    'name'=>NotEmpty::class,
                    'options'=>[
                        'messages' => [NotEmpty::IS_EMPTY => 'Obrigatory field']
                    ],
                ],
    ],
        ]);

        //PASSWORD INFORMATION
        $this->add([
            'name'=>'password',
            'required'=>true,
            'filters'=>[
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' =>[
                [
                    'name' => NotEmpty::class,
                    'options'=>[
                        'messages' => [NotEmpty::IS_EMPTY => 'Password required']
                    ],
                ],
            ],
        ]);
        $this->containerInterface = $containerInterface;


    }


}