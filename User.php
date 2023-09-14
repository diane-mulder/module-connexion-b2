<?php
require_once "Database.php";

class User extends Database{
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=moduleconnexionb2",'root','Dyane198124//');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function register($login,$firstname, $lastname, $password, $confirm_password) {
        try {

            // Vérifier que les mots de passe correspondent
            if ($password != $confirm_password) {
                echo "Les mots de passe ne correspondent pas";
                exit;
            }

            // Vérifier les contraintes du mot de passe
            if (
                strlen($password) < 8 ||
                !preg_match('/[A-Z]/', $password) ||
                !preg_match('/[a-z]/', $password) ||
                !preg_match('/\d/', $password) ||
                !preg_match('/[^A-Za-z\d]/', $password)
            ) {
                echo "Le mot de passe ne respecte pas les contraintes";
                exit;
            }

            // Vérifier si le login existe déjà
            $stmt = $this->db->prepare("SELECT * FROM user WHERE login = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Ce login est déjà utilisé";
                exit;
            }

            // Hacher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base de données
            $stmt = $this->db->prepare("INSERT INTO user (login, firstname, lastname, password) VALUES (:login, :firstname, :lastname, :password)");
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':password', $hashed_password);
            // faire une condition avec des if

            if ($stmt->execute()) {
                // Redirection vers la page de connexion
                header("Location: connexion.php");
                exit;
            } else {
                echo "Erreur lors de l'inscription";
            }
        } catch(PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    }
}


// try {
//      /*Include "db.php"; // Fichier contenant les informations de connexion à la base de données*/
//      $db = new Database("localhost", "root", "Dyane198124//", "moduleconnexionb2");
//      $user = new User($db);

//      if ($_SERVER['REQUEST_METHOD'] === 'POST') {         $login = $_POST['login'];
//         $password = $_POST['password'];
//         $confirm_password = $_POST['confirmation_password'];

//         $user->register($login, $fistname, $lastname, $password, $confirm_password);
//     }

//      $db->closeConnection();
//  } catch (Exception $e) 
//  {
//     echo "Erreur : " . $e->getMessage();
// }

?>
