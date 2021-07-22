<?php

require_once(MODELS . '/entities/employee.php');
require_once(CONTROLLERS . '/errorController.php');

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

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new Employee(
                    $row['id'],
                    $row['name'],
                    $row['lastname'],
                    $row['email'],
                    $row['gender'],
                    $row['age'],
                    $row['address'],
                    $row['city'],
                    $row['state'],
                    $row['postal_code'],
                    $row['phone_number']
                );

                $items[] = $item;
                // $items[] = $row;
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

            $row = $query->fetch(PDO::FETCH_ASSOC);
            $item = new Employee(
                $row['id'],
                $row['name'],
                $row['lastname'],
                $row['email'],
                $row['gender'],
                $row['age'],
                $row['address'],
                $row['city'],
                $row['state'],
                $row['postal_code'],
                $row['phone_number']
            );

            // $items[] = $item;
            // $items[] = $row;

            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function delete(int $id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id = :id");
        try {
            $query->execute([
                'id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            // return false;
            throw new Exception($e->getMessage());
        }
    }
}
