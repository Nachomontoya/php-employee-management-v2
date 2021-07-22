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
            $data = $this->model->getAll();
            http_response_code(200);
            echo json_encode($data);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => $th->getMessage()]);
        }
    }

    public function renderEmployee($id)
    {
        $this->view->id = $id;
        $this->view->render('employees/employee');
    }

    public function getEmployeeById($id)
    {
        try {
            $result = $this->model->getById($id);
            $this->view->id = $id;
            echo json_encode($result);
            http_response_code(200);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => $th->getMessage()]);
        }
    }

    public function deleteEmployee($id)
    {
        try {
            parse_str(file_get_contents("php://input"), $_DELETE);
            $id = $_DELETE['id'];
            $this->model->delete($id);
            http_response_code(200);
            echo json_encode(['message' =>  "employee {$_DELETE['name']} deleted"]);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' =>  "Error deleting {$_DELETE['name']}:" . $th->getMessage()]);
        }
    }
}
