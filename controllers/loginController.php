<?php
class LoginController extends Controller{

  public function __construct()
    {
        parent::__construct();
        $this->view->error = '';
    }

    public function render()
    {
        //
        $this->view->render('login/index');
    }

    public function signIn() {
      $result = $this->model->checkUser($_POST);
      if (!$result) {
        $this->view->error = "Email does not exist";
        $this->render('');
      }
      // echo json_encode($result);
    }
}