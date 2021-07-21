<?php
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

    public function getAllUsers()
    {
      $data = $this->model->getAll();
      //TODO Esto convierte el objeto en array. Hay que hacer el login del check, generar una variable de session para que te muestre el contenido o no.
      $myArray = json_decode(json_encode($data[0]), true);
      var_dump($myArray);
      http_response_code(200);
    }

    // public function getEmployeeById(int $id)
    // {
    //     echo '<pre>';
    //     var_dump($this->model->getById($id));
    //     echo '</pre>';
    // }
}