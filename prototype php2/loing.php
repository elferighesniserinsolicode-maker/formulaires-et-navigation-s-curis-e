<?php
session_start();

include "data.php";  

$message = "";

if(isset($_POST['login'])){

    $nom = $_POST['nom'];
    $pass = $_POST['password'];

    $found = false;

    foreach($users as $user){

        if($user['name'] == $nom && $user['password'] == $pass){

            $found = true;

            if($user['active'] == true){

                $_SESSION['user'] = $user;
                header("Location: profile.php");
                exit();

            } else {
                $message = " Compte désactivé";
            }
        }
    }

    if($found == false){
        $message = " Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login</h2>

<form method="post">
    <input type="text" name="nom" placeholder="Nom"><br><br>
    <input type="password" name="password" placeholder="Mot de passe"><br><br>
    <button type="submit" name="login">Se connecter</button>
</form>

<p><?php echo $message; ?></p>

</body>
</html>
