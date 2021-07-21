<?php

require_once(MODELS . '/entities/employee.php');

class EmployeesModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        try {
            $items = [];
            $query = $this->db->connect()->query("SELECT * FROM employees");

            while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {
                // $item = new Employee(
                //     $row['name'],
                //     $row['lastname'],
                //     $row['email'],
                //     $row['gender'],
                //     $row['age'],
                //     $row['address'],
                //     $row['city'],
                //     $row['state'],
                //     $row['postal_code'],
                //     $row['phone_number']
                // );

                // $items[] = $item;
                $items[] = $row;
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById(int $id)
    {
        try {
            $query = $this->db->connect()->query("SELECT * FROM employees WHERE id=$id");

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
