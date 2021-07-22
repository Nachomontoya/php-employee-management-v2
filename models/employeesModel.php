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

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update(int $id, $data) {
        try {
        $this->db->connect()->query("UPDATE employees SET 
        name = '{$data['name']}', 
        lastName = '{$data['lastName']}', 
        email = '{$data['email']}', 
        gender = '{$data['gender']}', 
        age = '{$data['age']}', 
        address = '{$data['streetAddress']}', 
        city='{$data['city']}', 
        state='{$data['state']}', 
        postal_code='{$data['postalCode']}', 
        phone_number='{$data['phoneNumber']}' 
        WHERE id = $id ");

        return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
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
