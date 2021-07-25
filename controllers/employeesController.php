<?php
require_once(LIBS . '/session.php');

class EmployeesController extends Controller
{

    function __construct()
    {
        parent::__construct();

        $this->session = new Session();
        $this->session->init();

        if (empty($this->session->get('email')))
            header('Location:' . BASE_URL);
    }

    public function render()
    {
        if ($this->isAdmin())
            $this->view->isAdmin = true;

        $this->view->render('employees/index');
    }

    public function getAllEmployees()
    {
        try {
            $employeeList = $this->model->getAll();
            echo json_encode($employeeList->all());
            http_response_code(200);
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

    public function updateEmployee(int $id)
    {
        try {
            parse_str(file_get_contents("php://input"), $_UPDATE);
            $id = $_UPDATE['id'];
            $this->model->update($id, $_UPDATE);
            echo json_encode(['message' =>  "employee {$_UPDATE['id']} updated successfully"]);
            http_response_code(200);
        } catch (Throwable $th) {
            echo json_encode(['message' =>  "Error updating {$_UPDATE['id']}:" . $th->getMessage()]);
            http_response_code(400);
        }
    }

    public function deleteEmployee($id)
    {
        try {
            parse_str(file_get_contents("php://input"), $_DELETE);
            $id = $_DELETE['id'];
            $this->model->delete($id);
            echo json_encode(['message' =>  "employee {$_DELETE['name']} deleted"]);
            http_response_code(200);
        } catch (Throwable $th) {
            echo json_encode(['message' =>  "Error deleting {$_DELETE['name']}:" . $th->getMessage()]);
            http_response_code(400);
        }
    }

    public function employeeForm()
    {
        $this->view->render('employees/newEmployee');
    }

    public function insertEmployeeByPost()
    {
        //TODO needs to validate forms fields;
        try {
            $this->model->insert($_POST);
            http_response_code(200);
            header('Location:' . BASE_URL);
            echo json_encode(['message' =>  "employee {$_POST['name']} created"]);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' =>  "Error creating {$_POST['name']}:" . $th->getMessage()]);
        }
    }

    public function insertEmployeeByAjax()
    {
        try {
            parse_str(file_get_contents("php://input"), $_POST);
            $this->model->insert($_POST);
            http_response_code(200);
            echo json_encode(['message' =>  "employee {$_POST['name']} created"]);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' =>  "Error creating {$_POST['name']}:" . $th->getMessage()]);
        }
    }
}
