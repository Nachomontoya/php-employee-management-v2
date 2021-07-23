<?php

require_once(CONTROLLERS . '/errorController.php');
require_once(LIBS . '/timeout.php');

class Router
{
    protected $uri;
    protected $controller;
    protected $method;
    protected $param;

    function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();

        $this->loadUriRequest();
    }

    function setUri()
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $this->uri = explode("/", $url);
    }

    function setController()
    {
        $this->controller = isset($this->uri[2]) ? $this->uri[2] : '';
    }

    function setMethod()
    {
        $this->method = isset($this->uri[3]) ? $this->uri[3] : 'render';
    }

    function setParam()
    {
        $this->param = isset($this->uri[4]) ? $this->uri[4] : '';
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function loadUriRequest()
    {
        // There is no controller
        if (empty($this->controller)) {
            $fileController = CONTROLLERS . '/' . 'loginController.php';
            require_once($fileController);

            $controller = new LoginController();
            $controller->loadModel('loginModel');
            $controller->render();
            return;
        }

        // check user timeout
        if ($this->controller !== "login") {
            $fileController = CONTROLLERS . '/' . 'loginController.php';
            require_once($fileController);

            $this->timeOut = new Timeout();

            if ($this->timeOut->checkUserTime()) {
                $this->login = new LoginController();
                $this->login->signOut();
                return;
            }
        }

        $fileController = CONTROLLERS . '/' . $this->controller . 'Controller.php';
        $classController =  ucfirst($this->controller) . 'Controller';

        if (file_exists($fileController)) {
            require_once($fileController);
            $controller = new $classController;
            $controller->loadModel($this->controller);

            try {
                if (!empty($this->method)) {
                    $controller->{$this->method}($this->param);
                }
            } catch (Throwable $th) {
                $controller = new errorController(
                    'Error loading method ' . $this->method
                );
            }
        } else {
            $controller = new errorController(
                'Error loading controller ' . $this->controller
            );
        }
    }
}
