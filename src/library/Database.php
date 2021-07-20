<?php

require_once '../../config/db.php';

class Database{
  private $host;
  private $db;
  private $charset;
  private $user;
  private $password;

  public function __construct(){
    $this->host = HOST;
    $this->db = DATABASE;
    $this->user = User;
    $this->password = Password;

    try {
      $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=UTF8";
      $result = new PDO($dsn, $this->user, $this->password);
      var_dump($result);
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  // function connect() {

  // }
    
    
    
}

$dbConnect = new Database();
// $dbConnect->connect();