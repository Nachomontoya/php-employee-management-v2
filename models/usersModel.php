<?php

require_once(MODELS . '/entities/userList.php');

class UsersModel extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getAll(): UserList
    {
        try {
            $query = $this->db->connect()->query("SELECT * FROM users");
            $userList = new UserList();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $user = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['password']
                );
                $userList->add($user);
            }

            return $userList;
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
}
