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
        try {
            //code...
            $data = $this->model->getAll();
            http_response_code(200);
            echo json_encode($data);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => $th->getMessage()]);
        }
    }

    public function getEmployeeById(int $id)
    {
        $this->model->getById($id);
    }
}
