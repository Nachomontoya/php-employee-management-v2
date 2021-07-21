<?php

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

        if ($this->checkLogin()) {
            $this->loadUriRequest();
        }
    }

    function setUri()
    {
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $this->uri = explode("/", $url);
    }

    function setController()
    {
        $this->controller = isset($this->uri[3]) ? $this->uri[3] : '';
    }

    function setMethod()
    {
        $this->method = isset($this->uri[4]) ? $this->uri[4] : '';
    }

    function setParam()
    {
        $this->param = isset($this->uri[5]) ? $this->uri[5] : '';
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function loadUriRequest()
    {
        if (empty($this->controller)) {
            $fileController = CONTROLLERS . '/' . 'employeesController.php';
            require_once($fileController);

            $controller = new EmployeesController();
            $controller->loadModel('employeesModel');
            $controller->render();
            return;
        }

        $fileController = CONTROLLERS . '/' . $this->controller . 'Controller.php';
        $classController =  ucfirst($this->controller) . 'Controller';

        if (file_exists($fileController)) {
            require_once($fileController);

            $controller = new $classController;
            $controller->loadModel($this->controller);
            $controller->{$this->method}($this->param);
        } else {
            // Handle Errors
            echo "Error loading controller";
            // $controller = new FailureController();
        }
    }

    public function checkLogin() {
        if(!isset($_SESSION['logged'])) {
            $fileController = CONTROLLERS . '/loginController.php';
            $classController =  'LoginController';

            if (file_exists($fileController)) {
                require_once($fileController);
    
                $controller = new $classController;
                $controller->loadModel($this->controller);
                $controller->{$this->method}($this->param);
            } else {
                // Handle Errors
                echo "Error loading controller";
                // $controller = new FailureController();
            }
            return false;
        }   else {
            return true;
        }
    }
}
