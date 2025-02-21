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

        if ($this->session->get('email') !== 'admin@assemblerschool.com')
            header('Location:' . BASE_URL); 

        if ($this->isAdmin())
            $this->view->isAdmin = true;
    }

    public function render()
    {
        $this->view->render('users/index');
    }

    public function getAllUsers()
    {
        try {
            $users = $this->model->getAll();
            foreach ($users->all() as $user) {
                if ($user->name == 'admin') {
                    $user->deletable = false;
                    continue;
                }
                $user->deletable = true;
            }

            echo json_encode($users->all());
            http_response_code(200);
        } catch (Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => $th->getMessage()]);
        }
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
