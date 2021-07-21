<?php

require_once '../libs/classes/controller.php';

class LoginController extends Controller{

  function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        //
        $this->view->render('login/index');
    }



    // public function getAllEmployees()
    // {
    //     echo '<pre>';
    //     var_dump($this->model->getAll());
    //     echo '</pre>';
    // }

    // public function getEmployeeById(int $id)
    // {
    //     echo '<pre>';
    //     var_dump($this->model->getById($id));
    //     echo '</pre>';
    // }
}