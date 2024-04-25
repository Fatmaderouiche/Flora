<?php
// Connexion 
require ('connexion.php');

// Vérification de l'envoi du formulaire

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations d'identification

    $sql = "SELECT * FROM Users WHERE username = :admin AND password = :adminadmin";
    $stmt = $idcon->prepare($sql);
    $stmt->bindParam(':admin', $username);
    $stmt->bindParam(':adminadmin', $password);
    
    try {
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            // Authentification réussie, rediriger vers le tableau de bord de l'administrateur
            header("Location: indexADMIN.html");
            exit();
        } else {
            // Identifiants incorrects, afficher un message d'erreur
            echo "Nom d'utilisateur ou mot de passe incorrect!";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
