<?php
// Connexion 
require('connexion.php');

// Vérification de l'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM users WHERE email = :email ";
    $stmt = $idcon->prepare($sql);
    $stmt->bindParam(':email', $email);
    
    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user['password'])) {
                // Authentification réussie, rediriger vers la page d'accueil
                header("Location: ../acceuil/acceuil.php");
                exit();
            } else {
                // Mot de passe incorrect, afficher un message d'erreur
                echo "Mot de passe incorrect!";
            }
        } else {
            // Aucun utilisateur trouvé avec cet e-mail, afficher un message d'erreur
            echo "Aucun utilisateur trouvé avec cet e-mail!";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
