<?php

abstract class Controller
{

    function __construct()
    {
        $this->view = new View();
    }

    //abstract classes
    public abstract function render();

    function loadModel($model)
    {
        $url = MODELS . '/' . $model . 'Model.php';

        if (file_exists($url)) {
            require $url;

            $modelName = ucfirst($model) . 'Model';
            $this->model = new $modelName();
        }
    }
}
