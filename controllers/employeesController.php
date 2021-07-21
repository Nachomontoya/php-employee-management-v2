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
        $data = $this->model->getAll();
        echo json_encode($data);
        http_response_code(200);
    }

    public function getEmployeeById(int $id)
    {
        $this->model->getById($id);
    }
}
