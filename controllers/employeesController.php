<?php

class EmployeesController extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        //
        $this->view->render('employees/index');
    }

    public function getAllEmployees()
    {
        echo '<pre>';
        var_dump($this->model->getAll());
        echo '</pre>';
    }

    public function getEmployeeById(int $id)
    {
        echo '<pre>';
        var_dump($this->model->getById($id));
        echo '</pre>';
    }
}
