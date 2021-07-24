<?php

class UsersModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        try {
            $query = $this->db->connect()->query("SELECT * FROM users");

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function insert($user)
    {
        try {
            $userPass = password_hash($user['password'], PASSWORD_DEFAULT);
            $query = $this->db->connect()->query("INSERT INTO users 
            ( name, email, password ) 
            VALUES ( '{$user['name']}', '{$user['email']}', '{$userPass}' )");

            return True;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    // public function getById(int $id)
    // {
    //     try {
    //         $query = $this->db->connect()->query("SELECT * FROM employees WHERE id=$id");
    //         $row = $query->fetch(PDO::FETCH_ASSOC);
    //         $item = new Employee(
    //             $row['id'],
    //             $row['name'],
    //             $row['lastname'],
    //             $row['email'],
    //             $row['gender'],
    //             $row['age'],
    //             $row['address'],
    //             $row['city'],
    //             $row['state'],
    //             $row['postal_code'],
    //             $row['phone_number']
    //         );
    //         return $item;
    //     } catch (PDOException $e) {
    //         throw new Exception($e->getMessage());
    //     }
    // }

    // public function update(int $id, $data)
    // {
    //     try {
    //         $this->db->connect()->query("UPDATE employees SET 
    //     name = '{$data['name']}', 
    //     lastName = '{$data['lastName']}', 
    //     email = '{$data['email']}', 
    //     gender = '{$data['gender']}', 
    //     age = '{$data['age']}', 
    //     address = '{$data['streetAddress']}', 
    //     city='{$data['city']}', 
    //     state='{$data['state']}', 
    //     postal_code='{$data['postalCode']}', 
    //     phone_number='{$data['phoneNumber']}' 
    //     WHERE id = $id ");
    //         return true;
    //     } catch (PDOException $e) {
    //         throw new Exception($e->getMessage());
    //     }
    // }

    // public function delete(int $id)
    // {
    //     $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id = :id");
    //     try {
    //         $query->execute([
    //             'id' => $id
    //         ]);
    //         return true;
    //     } catch (PDOException $e) {
    //         throw new Exception($e->getMessage());
    //     }
    // }
}
