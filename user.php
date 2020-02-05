<?php
class User
{

  private $id=0; //Définition d'une variable attribut privée ID
  public $login="";
  public $email="";
  public $firstname="";
  public $lastname="";

  public function register($login, $password, $email, $firstname, $lastname)
  {
    $db = mysqli_connect('localhost', 'root', '', 'utilisateurs');
    $login = mysqli_real_escape_string($db, $login);
    $password = password_hash(mysqli_real_escape_string($db, $password), PASSWORD_BCRYPT);
    $email = mysqli_real_escape_string($db, $email);
    $firstname = mysqli_real_escape_string($db, $firstname);
    $lastname = mysqli_real_escape_string($db, $lastname);
    $error = mysqli_query($db,"INSERT INTO users (login, password, email, firstname, lastname) VALUES ('$login','$password', '$email', '$firstname', '$lastname')");
    var_dump($error);
  }
  public function connect($login, $password)
  {

  }
  public function disconnect(){

  }
  public function delete()
  {

  }
  public function update($login, $email, $firstname, $lastname)
  {

  }
  public function isConnected()
  {

  }
  public function getAllInfos()
  {

  }
  public function getLogin()
  {

  }
  public function getEmail()
  {

  }
  public function getFirstname()
  {

  }
  public function getLastname()
  {

  }
  public function refresh()
  {

  }

}
 ?>
