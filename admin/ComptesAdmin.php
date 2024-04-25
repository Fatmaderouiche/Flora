<?php
include 'connexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone = $_POST['phone'];

        $typeString = '';
        if ($type == 1) {
            $typeString = 'administrateur';
        } elseif ($type == 2) {
            $typeString = 'utilisateur';
        }

        if (empty($username) || empty($email) || empty($password) || empty($phone)) {
            echo "All fields are required.";
            exit();
        }
try{
        $stmt = $idcon->prepare("INSERT INTO users (type, username, email, password, phone) VALUES (:type, :username, :email, :password, :phone)");
        $stmt->bindParam(':type', $typeString);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();

        echo "<script>alert('Compte ajouté avec succès.'); window.location.href='../indexADMIN.html';</script>";
    } 
 catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$idcon = null;
    }
?> 