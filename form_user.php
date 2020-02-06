<?php
session_start();
include ('user.php');
$greg = new User();
if (isset($_POST['valider'])) {
    $greg->register($_POST['login'] , $_POST['password'] , $_POST['email'] , $_POST['firstname'] , $_POST['lastname']);

}
?>

<html>
<head>
    <title>classes</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="post" action="">
        <label>Login</label></br>
        <input type="text" name="login"></br>
        <label>Mot de passe</label></br>
        <input type="text" name="password"></br>
        <label>Mot de passe</label></br>
        <input type="text" name="password2"></br>
        <label>Email</label></br>
        <input type="mail" name="email" ></br>
        <label>Firstname</label></br>
        <input type="text" name="firstname"></br>
        <label>Lastname</label></br>
        <input type="text" name="lastname"></br>
        <input type="submit" name="valider">
    </form>
    <?php

        $greg = new User();

        if (isset($_POST['connexion'])) {
        $login=$_POST['login'];
        $password=$_POST['password'];
            $greg->connect($login , $password);

}
?>

            <h1>Connexion</h1>
    <form method="post" action="">
        <label>Login</label></br>
        <input type="text" name="login"></br>
        <label>Mot de passe</label></br>
        <input type="text" name="password"></br>
        <input type="submit" name="connexion">
    </form>

    <?php
    if (isset($_POST['deconnexion'])) {
        $greg->disconnect();
        echo "vous êtes deconecter";
    }
    ?>
            <h1>Déconnexion</h1>
    <form method="post"><input type="submit" name="deconnexion"></form>



      <?php
    if (isset($_POST['effacer'])) {
        $greg->delete();
        session_unset();
        echo "vous êtes supprimé";
    }
    ?>
            <h1>Supprimé l utilisateur</h1>
    <form method="post"><input type="submit" name="effacer"></form>

    <?php
    if (isset($_POST['modifier'])) {
            $login=$_POST['login'];
            $password= password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email=$_POST['email'];
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];


         $greg->update($login , $password , $email , $firstname , $lastname);
         echo "Votre profil est modifié";


    }
    ?>
      <h1>Modifier</h1>
    <form method="post" action="">
        <label>Login</label></br>
        <input type="text" name="login"></br>
        <label>Mot de passe</label></br>
        <input type="text" name="password"></br>
        <label>Email</label></br>
        <input type="mail" name="email" ></br>
        <label>Firstname</label></br>
        <input type="text" name="firstname"></br>
        <label>Lastname</label></br>
        <input type="text" name="lastname"></br>
        <input type="submit" name="modifier">
    </form>


    <?php
    if ($_SESSION['login']) {
         echo $greg->isConnected();

     }
    ?>

</body>
</html>
