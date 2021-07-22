<?php

require_once './config/db.php';

class Database
{
  private $host;
  private $db;
  private $user;
  private $password;

  public function __construct()
  {
    $this->host = HOST;
    $this->db = DATABASE;
    $this->user = USER;
    $this->password = PASSWORD;
  }

  public function connect()
  {
    try {
      $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];

      $pdo = new PDO($connection, $this->user, $this->password, $options);
      //! This is just an echo to know that we are correctly connected;
      // echo "Succesfully connected to te database";
      return $pdo;
    } catch (PDOException $error) {
      // echo $error->getMessage();
      // http_response_code(400);
      // echo json_encode(['message' => $error->getMessage()]);
      throw new Exception($error->getMessage());
    }
  }
}

// $connect = new Database();
// $connect->connect();
