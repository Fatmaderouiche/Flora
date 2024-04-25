<?php
// Connexion 
require ('connexion.php');

// Vérification de l'envoi du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM Users WHERE username = :username AND type = 'administrateur'";
    
    $stmt = $idcon->prepare($sql);
    $stmt->bindParam(':username', $username);
    
    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe hashé
            if (password_verify($password, $user['password'])) {
                // Mot de passe correct
                header("Location: indexADMIN.html");
                exit();
            } else {
                // Mot de passe incorrect
                echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect!");
                window.location.href = "../admin/LoginAdmin.html";</script>';
            }
        } else {
            // Utilisateur non trouvé
            echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect!");
            window.location.href = "../admin/LoginAdmin.html";</script>';
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} elseif(isset($_POST['forgot_password'])) {
    echo '<script>alert("Impossible de changer le mot de passe. Veuillez contacter votre administration");
            window.location.href = "../admin/LoginAdmin.html";</script>';
}

?>
