<?php

namespace Painel;

use Painel\Controller\AnswerController;
use Painel\Controller\Factory\AnswerControllerFactory;
use Painel\Controller\Factory\PainelControllerFactory;
use Painel\Controller\PainelController;
use Painel\Model\Answer;
use Painel\Model\Answeredinfo;
use Painel\Model\AnsweredinfoRepository;
use Painel\Model\AnsweredUser;
use Painel\Model\AnsweredUserRepository;
use Painel\Model\AnswerRepository;
use Painel\Model\Factory\AnsweredinfoFactory;
use Painel\Model\Factory\AnsweredinfoRepositoryFactory;
use Painel\Model\Factory\AnsweredUserFactory;
use Painel\Model\Factory\AnsweredUserRepositoryFactory;
use Painel\Model\Factory\AnswerFactory;
use Painel\Model\Factory\AnswerRepositoryFactory;
use Painel\Model\Factory\QuestionFactory;
use Painel\Model\Factory\QuestionRepositoryFactory;
use Painel\Model\Factory\QuizFactory;
use Painel\Model\Factory\QuizRepositoryFactory;
use Painel\Model\Question;
use Painel\Model\QuestionRepository;
use Painel\Model\Quiz;
use Painel\Model\QuizRepository;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{

    /**
     * @param ModuleManager $manager
     *
    public function init(ModuleManager $manager)
    {
        // Get event manager.
        $eventManager = $manager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Register the event listener method.
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch',
            [$this, 'onDispatch'], 100);
    }

    // Event listener method.

    /**
     * @param MvcEvent $event
     *
    public function onDispatch(MvcEvent $event)
    {
        // Get controller to which the HTTP request was dispatched.
        $controller = $event->getTarget();
        // Get fully qualified class name of the controller.
        $controllerClass = get_class($controller);
        // Get module name of the controller.
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $event->getViewModel();
            //$viewModel->setTemplate('layout/layout');
        }
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                AnswerController::class=>AnswerControllerFactory::class,
                PainelController::class=>PainelControllerFactory::class,
                Quiz::class=>QuizFactory::class,
                QuizRepository::class=>QuizRepositoryFactory::class,
                Question::class=>QuestionFactory::class,
                QuestionRepository::class=>QuestionRepositoryFactory::class,
                Answer::class=>AnswerFactory::class,
                AnswerRepository::class=>AnswerRepositoryFactory::class,
                AnsweredUser::class=>AnsweredUserFactory::class,
                AnsweredUserRepository::class=>AnsweredUserRepositoryFactory::class,
                Answeredinfo::class=>AnsweredinfoFactory::class,
                AnsweredinfoRepository::class=>AnsweredinfoRepositoryFactory::class,
            ]
        ];

    }
}