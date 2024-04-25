<?php

require('connexion.php');

//  POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // non vides
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Hacher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //  requête d'insertion
        $sql = "INSERT INTO Users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $idcon->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        try {
            $stmt->execute();
            echo '<script>alert("Bienvenue !! Connectez-vous pour découvrir les merveilles de notre boutique florale.");
                 window.location.href = "../login/login.html";</script>';
            
            exit();
          

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo '<script>alert("Veuillez remplir tous les champs du formulaire.");
                 window.location.href = "../login/login.html";</script>';
    }
}
?>
