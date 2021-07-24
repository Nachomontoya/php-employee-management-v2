<?php

require_once(MODELS . '/entities/users.php');

class LoginModel extends Model{

  function __construct()
    {
        parent::__construct();
    }
  
  public function get($params)
  {
        $email = $params['email'];
        // $password = $params['password'];
        try {
            $item = [];
            $query = $this->db->connect()->query("SELECT * FROM users WHERE email = '{$email}'");
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['password']
                );

                // $items[] = $item;
            }
            return $item;

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
  }
}