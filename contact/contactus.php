
<?php
$servername = 'localhost'; 
$username = 'root'; 
$password = '';

try {
    $idcon = new PDO("mysql:host=$servername;dbname=flora", $username, $password);

    // On définit le mode d'erreur de PDO sur Exception
    $idcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO contact ( nom, email, message) VALUES ( :nom, :email, :message)";
        $stmt = $idcon->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }
} catch (PDOException $excp) {
    echo "Erreur : " . $excp->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌺Flora Boutique🌺</title>
    <link rel="stylesheet" href="style. (1).css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php require_once('../header.php');?>

    <div class="content">
        <section class="page">
            <h1>Contacter-nous</h1>
            <p>Besoin d'un renseignement sur votre commande ou sur la livraison ?<br>
            Vous pouvez nous contacter :</p>
            <section class="contact">
                <form name="contact" class="contact" id="contact" method="post">
                    <div class="form-name">
                        <input type="text" name="nom" id="nom" placeholder="Nom*" required>
                        <span>Champ Nom Obligatoire</span>
                    </div>
                    <div class="form-email">
                        <input type="email" name="email" id="email" placeholder="Email*" required>
                        <span>Champ Email Obligatoire</span>
                    </div>
                    <div class="form-message">
                        <input type="text" name="message" id="message" placeholder="Message" required>
                    </div>
                    <div class="button">
                        <input class="button" type="submit" value="Envoyer">
                    </div>
                </form>
            </section>
        </section>
    </div>

    <?php require_once('../footer.php'); ?>
</body>
</html>
