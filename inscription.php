<?php
require_once "User.php";
$User = new User; /* Cette ligne crée une nouvelle instance de la classe "User" en utilisant le mot-clé "new". 
La variable $User stocke cette instance, ce qui signifie que vous pouvez maintenant accéder aux propriétés 
et méthodes de la classe "User" à travers cette variable. */
// $User->register($login,$firstname, $lastname, $password, $confirm_password);
var_dump($_POST);
if(isset($_POST['submit'])){
    $User->register($_POST['login'],$_POST['firstname'],$_POST['lastname'],$_POST['password'], $_POST['confirm_password']);
    var_dump($_POST);
    
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
</head>

<body>
    <div class='formulaire'>
        <h1>Inscription</h1>
        <form method="POST" action="inscription.php">
            <div class='inscription'>
                <div class='champs'>
                    <label for="login">Login :</label><br>
                    <input type="text" id="login" name="login" required><br>
                    <label for="firstname">Nom :</label><br>
                    <input type="firstname" id="firstname" name="firstname" required><br>
                    <label for="lastname">Prenom :</label><br>
                    <input type="lastname" id="lastname" name="lastname" required><br>
                    <label for="password">Mot de passe :</label><br>
                    <input type="password" id="password" name="password" required><br>
                    <label for="confirmation_password">Confirmation du mot de passe :</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
            </div>    
                <div class='valider'>
                <input type="submit" value="VALIDER" name='submit' class="button"><br>
                </div>   
        </form>
    </div>
</body>
</html>
