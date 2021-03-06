<?php

  //include_once = '/../config/config.php';
  class DB {
    //private $host = 'mysql:host=localhost;dbname=camagru';
    //private $user = 'root';
    //private $password = '20121994';

    private static $_instance = null;
    private $_pdo, $_query, $_error = false, $_result, $_count = 0, $_lastInsertID = null;

    private function __construct() {
      try {
        //$this->_pdo = new PDO('mysql:host=localhost;dbname=camagru', 'root', '20121994');
        $this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
      } catch(PDOException $e) {
        die($e->getMessage());
      }
  }

  public static function getInstance() {
    if(!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }

  public function query($sql, $params = []) {
    $this->_error = false;
    if($this->_query = $this->_pdo->prepare($sql)) {
      $x = 1;
      if(count($params)) {
        foreach($params as $param) {
          $this->_query->bindValue($x, $param);
          $x++;
        }
      }
      if($this->_query->execute()) {
        if (substr($sql, 0, 6) == "SELECT")
          $this->_result = $this->_query->fetchALL(PDO::FETCH_OBJ);
        else
          $this->_result= [];
        $this->_count = $this->_query->rowCount();
        $this->_lastInstertID = $this->_pdo->lastInsertID();
      } else {
        $this->_error = true;
      }
    }
    return $this;
  }

  public function insert($table, $fields = []) {
    $fieldString = '';
    $valueString = '';
    $values = [];

    foreach($fields as $field => $value) {
      $fieldString .= '`' .$field . '`,';
      $valueString .= '?,';
      $values[] = $value;
    }
    
    $fieldString = rtrim($fieldString, ',');
    $valueString = rtrim($valueString, ',');
    $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
    //dnd($sql);
    if(!$this->query($sql, $values)->error()) {
      return true;
    }
    return false;
  }

  public function error() {
    return $this->_error;
  }
}
