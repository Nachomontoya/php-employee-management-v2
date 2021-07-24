<?php

class UsersController extends Controller
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
        $this->view->render('users/index');
    }

    public function getAllUsers()
    {
        // HTTP_X_REQUESTED_WITH: "XMLHttpRequest"
        $users = $this->model->getAll();
        echo json_encode($users);
    }

    public function addUser()
    {
        try {
            if ($this->model->insert($_POST)) {
                http_response_code(200);
                echo json_encode(['message' => 'User inserted']);
            };
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => $th->getMessage()]);
        }
    }
}
