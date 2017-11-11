<?php
require_once 'dbConnect.php';
session_start();

class mySqlHelper
{
  public $mysql;

  function __construct()
  {
    $dbClass = new dbConnect();
    $this->mysql = $dbClass->getDb();
  }

  public function AddUserInDB($name, $surname, $email, $comment = null, $avatar)
  {

    try {
      $stmt = $this->mysql->prepare("CALL AddUser(?, ?, ?, ?, ?)");
      $stmt->bindParam(1, $name, PDO::PARAM_STR);
      $stmt->bindParam(2, $surname, PDO::PARAM_STR);
      $stmt->bindParam(3, $email, PDO::PARAM_STR);
      $stmt->bindParam(4, $comment, PDO::PARAM_STR);
      $stmt->bindParam(5, $avatar, PDO::PARAM_STR);

      $stmt->execute();

      if ($row = $stmt->fetch()) {
        return $row;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

  }

  public function GetUserById($id)
  {
    try {
      $stmt = $this->mysql->prepare("SELECT * FROM user WHERE id=:id");
      $stmt->execute(array(":id" => $id));
      return $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function login($name, $surname, $email)
  {
    try {
      $stmt = $this->mysql->prepare("SELECT id FROM user WHERE name =:name AND surname=:surname AND email=:email LIMIT 1");
      $stmt->execute(array(':name' => $name, ':surname' => $surname, ':email' => $email));
      $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($userRow) {
        $_SESSION['user_session'] = $userRow['id'];

      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function is_loggedin()
  {
    if (isset($_SESSION['user_session'])) {
      return true;
    }
  }

  public function redirect($url)
  {
    header("Location: $url");
  }

  public function logout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }
}