<?php

namespace Quiz;

use Quiz\Controller\DashboardController;
use Quiz\Controller\Factory\DashboardControllerFactory;
use Quiz\Controller\Factory\QuizControllerFactory;
use Quiz\Controller\QuizController;
use Quiz\Form\CreatQuizForm;
use Quiz\Form\Factory\CreatQuizFormFactory;
use Quiz\Model\Answer;
use Quiz\Model\Answeredinfo;
use Quiz\Model\AnsweredinfoRepository;
use Quiz\Model\AnsweredUser;
use Quiz\Model\AnsweredUserRepository;
use Quiz\Model\AnswerRepository;
use Quiz\Model\Factory\AnsweredinfoFactory;
use Quiz\Model\Factory\AnsweredinfoRepositoryFactory;
use Quiz\Model\Factory\AnsweredUserFactory;
use Quiz\Model\Factory\AnsweredUserRepositoryFactory;
use Quiz\Model\Factory\AnswerFactory;
use Quiz\Model\Factory\AnswerRepositoryFactory;
use Quiz\Model\Factory\QuestionFactory;
use Quiz\Model\Factory\QuestionRepositoryFactory;
use Quiz\Model\Factory\QuizFactory;
use Quiz\Model\Factory\QuizRepositoryFactory;
use Quiz\Model\Question;
use Quiz\Model\QuestionRepository;
use Quiz\Model\Quiz;
use Quiz\Model\QuizRepository;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, ServiceProviderInterface
{

    /**
     * @param ModuleManager $manager
     */
    /*public function init(ModuleManager $manager)
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
     */
    /*public function onDispatch(MvcEvent $event)
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
            $viewModel->setTemplate('layout/dashboard');
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
                QuizController::class=>QuizControllerFactory::class,
                DashboardController::class=>DashboardControllerFactory::class,
                Quiz::class=>QuizFactory::class,
                QuizRepository::class=>QuizRepositoryFactory::class,
                CreatQuizForm::class=>CreatQuizFormFactory::class,
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