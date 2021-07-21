<?php

require_once '../config/db.php';

class Database{
  private $host;
  private $db;
  private $user;
  private $password;

  public function __construct(){
    $this->host = HOST;
    $this->db = DATABASE;
    $this->user = User;
    $this->password = Password;
  }

  function connect() {
    try {
      $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];

      $pdo = new PDO($connection, $this->user, $this->password, $options);
      //! This is just an echo to know that we are correctly connected;
      echo "Succesfully connected to te database";
      return $pdo;
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }  
}

$connect = new Database();
$connect->connect();
