<?php

class Router
{
    public $uri;
    public $controller;
    public $method;
    public $param;

    function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    function setUri()
    {
        $this->uri = explode("/", $_SERVER['REQUEST_URI']);
    }

    function setController()
    {
        $this->controller = $this->uri[3] ?: '';
    }

    function setMethod()
    {
        $this->method = $this->uri[4] ?: '';
    }

    function setParam()
    {
        $this->param = $this->uri[5] ?: '';
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}
