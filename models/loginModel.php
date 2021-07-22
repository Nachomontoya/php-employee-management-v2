<?php

require_once(MODELS . '/entities/users.php');

class LoginModel extends Model{

  function __construct()
    {
        parent::__construct();
    }
  
  public function checkUser($params)
  {
        $email = $params['email'];
        $password = $params['password'];
        try {
            $items = [];
            $query = $this->db->connect()->query("SELECT * FROM users WHERE email = '{$email}'");
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['password']
                );

                $items[] = $item;
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
  }
}