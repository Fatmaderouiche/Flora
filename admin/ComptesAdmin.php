<?php

require_once 'connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs requis sont définis et non vides
    if (isset($_POST['type']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['phone'])) {
        
        // Récupérer les données du formulaire
        $type = $_POST['type'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $phone = $_POST['phone'];
        
        // Valider les données
        // Vous pouvez ajouter ici des validations supplémentaires
        
        // Vérifier si les mots de passe correspondent
        if ($password != $password2) {
            echo "Les mots de passe ne correspondent pas.";
            exit(); // Arrêter l'exécution du script
        }
        
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql_check_email = "SELECT COUNT(*) AS num FROM users WHERE email = :email";
        $stmt_check_email = $idcon->prepare($sql_check_email);
        $stmt_check_email->bindParam(':email', $email);
        $stmt_check_email->execute();
        $row = $stmt_check_email->fetch(PDO::FETCH_ASSOC);
        
        if ($row['num'] > 0) {
            echo '<script>alert("Cette adresse e-mail est déjà utilisée.");
            window.location.href = "../admin/ComptesAdmin.html";</script>';
            

            exit(); // Arrêter l'exécution du script
        }
        
        // Préparer la requête SQL pour insérer les données dans la base de données
        $sql = "INSERT INTO users (type, username, email, password, phone) VALUES (:type, :username, :email, :password, :phone)";
        
        // Préparer la déclaration PDO
        $stmt = $idcon->prepare($sql);
        
        // Liaison des paramètres avec les valeurs
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':phone', $phone);
        
        // Exécution de la requête
        if ($stmt->execute()) {
            echo '<script>alert("Compte ajouté avec succées");
            window.location.href = "../admin/ComptesAdmin.html";</script>';
        } else {
            echo '<script>alert("Erreur lors de l\'ajout du compte.);
            window.location.href = "../admin/ComptesAdmin.html";</script>';
        }
}
}
?>