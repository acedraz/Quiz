<?php
/**
 * Created by PhpStorm.
 * User: aisla
 * Date: 11/08/2018
 * Time: 16:01
 */

namespace Quiz\Controller;

use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;

class QuizController extends AbstractActionController
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

    public function indexAction()
    {
        $this->layout('layout/index');
    }

}