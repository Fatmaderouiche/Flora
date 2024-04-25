<?php
// Inclure le fichier de connexion
require 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'email et les mots de passe du formulaire
    $email = $_POST['email'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    // Préparer la requête pour vérifier si l'email existe et récupérer le mot de passe
    $stmt = $idcon->prepare("SELECT password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() == 1) {
        // Récupérer le mot de passe de la base de données
        $row = $stmt->fetch();
        $password= $row['password'];
        
        // Vérifier si le mot de passe actuel est correct
        if ($currentPassword == $password) {
            // Préparer la requête pour mettre à jour le mot de passe
            $updateStmt = $idcon->prepare("UPDATE users SET password = :newPassword WHERE email = :email");
            $updateStmt->bindParam(':newPassword', $newPassword);
            $updateStmt->bindParam(':email', $email);
            
            // Exécuter la requête de mise à jour
            if ($updateStmt->execute()) {
                header('Location: indexADMIN.html');
                exit;
            } else {
                // Afficher un message d'erreur sans changer de page
                echo "<script>alert('Erreur lors de la mise à jour du mot de passe.');
                 window.location.href=window.location.href;</script>";
            }
        } else {
            // Afficher un message d'erreur sans changer de page
            echo "<script>alert('Le mot de passe actuel est incorrect.'); window.location.href=window.location.href;</script>";
        }
    } else {
        // Afficher un message d'erreur sans changer de page
        echo "<script>alert('Aucun utilisateur trouvé avec cet email.'); window.location.href=window.location.href;</script>";
    }
}
?>
