<?php

require 'connexion.php';

// Vérification de l'envoi du formulaire + update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    // recuperation du mot de passe actuel 
    $stmt = $idcon->prepare("SELECT password FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'utilisateur existe et si le mot de passe actuel est correct
    if ($user && password_verify($currentPassword, $user['password'])) {
       
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Mise à jour 
        $updateStmt = $idcon->prepare("UPDATE users SET username = :username, phone = :phone, address = :address, password = :newPassword WHERE email = :email");
        $updateStmt->bindParam(':email', $email);
        $updateStmt->bindParam(':phone', $phone);
        $updateStmt->bindParam(':address', $address);
        $updateStmt->bindParam(':newPassword', $hashedPassword);
        $updateStmt->bindParam(':username', $username);

        // Exécution 
        if ($updateStmt->execute()) {
            echo '<script>alert("Les informations ont été mises à jour avec succès.");
            window.location.href = "../acceuil/acceuil.php";</script>';
            
            exit();
        } else {
            echo "Une erreur est survenue lors de la mise à jour des informations.";
        }
    } else {
        echo '<script>alert("Le nom d\'utilisateur n\'existe pas ou le mot de passe actuel est incorrect.")
        ;window.location.href = "../account settings/account settings.html";</script>';

    }
}
//  la suppression
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {

    $email = $_POST['email'];

    //  requête de suppression 
    $deleteStmt = $idcon->prepare("DELETE FROM users WHERE email = :email");
    $deleteStmt->bindParam(':email', $email);

    // Exécution 
    if ($deleteStmt->execute()) {
        echo '<script>alert("Votre compte a été supprimé avec succès."); window.location.href = "../login/login.html";</script>';
        exit();
    } else {
        echo "Une erreur est survenue lors de la suppression du compte.";
    }
}
?>
