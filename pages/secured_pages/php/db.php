<?php
class Database
{
  private static $instance = null;
  public $conn;

  private function __construct()
  {
    $this->conn = new PDO("mysql:host=118.139.179.166;dbname=home_harmony", "jericho", "Quest35#");
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance->conn;
  }
}
