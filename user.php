<?php

class User {
    private $id = '';
    public $login = '';
    public $email = '';
    public $firstname = '';
    public $lastname = '';


    public function register($login,$password,$email,$firstname,$lastname)
    {

        $connexion =  mysqli_connect("localhost","root","","classe");
        $password= password_hash($password, PASSWORD_DEFAULT);
        $requet="SELECT * FROM user WHERE login='".$login."'";
        $query2=mysqli_query($connexion,$requet);
        $resultat=mysqli_fetch_all($query2);
        $trouve=false;


        if(!empty($resultat[0]))
        {
           $trouve=true;
           echo "<p class='erreur'><b>Login déja existant!!</b></p>";
        }

       if ($trouve==false)
       {
            $sql = "INSERT INTO user (`id`, `login`, `password`, `email`, `firstname`, `lastname`) VALUES (NULL, '".$login."','".$password."','".$email."','".$firstname."','".$lastname."')";

            if(mysqli_query($connexion,$sql))
           {
                return array($login, $password, $email, $firstname, $lastname);
            }
        }

       else
       {
          echo "<p class='erreur'><b>Les mots de passe doivent être identique!</b></p>";
       }
    }

    public function connect($login, $password){

        if (!isset($_SESSION['login']))
    {
            if(isset($_POST['login']) && isset($_POST['password']))
        {
                $connexion = mysqli_connect ("localhost", "root", "", "classe");
                $login = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['login']));
                $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));

            if($login !== "" && $password !== "")
            {
                $requete = "SELECT count(*) FROM user WHERE login = '".$login."' ";
                $exec_requete = mysqli_query($connexion,$requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $count = $reponse['count(*)'];

                $requete4 = "SELECT * FROM user WHERE login='".$login."'";
                $exec_requete4 = mysqli_query($connexion,$requete4);
                $reponse4 = mysqli_fetch_array($exec_requete4);

                echo "vous etes bien connecté";
                if( $count!=0 && $login !== "" && password_verify($password, $reponse4[2]) )
                {

                $_SESSION['login'] = $_POST['login'];
                $utilisateurs = $_SESSION['login'];
                }
                else
                {
                header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }

        }

    }
}

    public function disconnect(){
           session_unset();
        }

    public function delete(){
      $connexion = mysqli_connect ("localhost", "root", "", "classe");
      $requete = "DELETE  FROM user WHERE login='".$_SESSION['login']."'";
      $query = mysqli_query($connexion,$requete);

    }
    public function update($login, $password, $email, $firstname,$lastname){
         $connexion = mysqli_connect ("localhost", "root", "", "classe");
          $password= password_hash($_POST["password"],PASSWORD_DEFAULT);
         $requete = "UPDATE user SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '".$_SESSION['login']."'";
         var_dump($requete);
         $query = mysqli_query($connexion,$requete);
         var_dump($query);
         $_SESSION['login'] = $login;
         header('Location: index.php');

    }


     public function isConnected(){
     	if (isset($_SESSION['login']))
     		return true;

     	else{
     		echo "vous devez vous connecter";
     		return false;

     	}
}

}


?>
