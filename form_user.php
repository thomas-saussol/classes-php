<?php
  include('user.php');
  if(isset($_POST['register']))
  {
    $user = new User;
    $user->register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
  }

 
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
  </head>
  <body>
    <form action="form_user.php" method="post">

      <label>Login :</label><input type="text" name="login" required>
      <label>Mot de passe :</label><input type="password" name="password" required>
      <label>Email:</label><input type="email" name="email" required>
      <label>Firstname:</label><input type="text" name="firstname" required>
      <label>Lastname:</label><input type="text" name="lastname" required>


      <input class="buttonOK" type="submit" name="register">
    </form>
  </body>
</html>
