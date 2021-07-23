<?php

class EmployeesController extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('employees/index');
    }
}
