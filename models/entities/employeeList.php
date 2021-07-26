<?php

require_once(MODELS . '/entities/employee.php');

class EmployeeList
{

    private $list;

    function __construct(Employee ...$employee)
    {
        $this->list = $employee;
    }

    public function add(Employee $employee): void
    {
        $this->list[] = $employee;
    }

    public function all(): array
    {
        return $this->list;
    }
}
